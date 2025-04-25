<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Package;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $packages = Package::all();
        return view('customer.activation-customer', compact(['customers', 'packages']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'invoice_number' => 'required|unique:invoices',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
            'tax_amount' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:paid,unpaid,overdue',
            'paid_at' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        try {
            Invoice::create([
                'customer_id' => $request->customer_id,
                'package_id' => $request->package_id,
                'invoice_number' => $request->invoice_number,
                'issue_date' => $request->issue_date,
                'due_date' => $request->due_date,
                'amount' => $request->amount,
                'tax_amount' => $request->tax_amount,
                'total_amount' => $request->total_amount,
                'status' => $request->status,
                'paid_at' => $request->paid_at,
                'notes' => $request->notes
            ]);

            return redirect()->back()->with('success', 'Berhasil diaktivasi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan invoice: ' . $e->getMessage())->withInput();

        }


    }
}
