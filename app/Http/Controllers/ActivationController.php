<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Transaction;
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
        $validated = $request->validate([
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
            if ($validated['status'] == 'paid' && empty($validated['paid_at'])) {
                $validated['paid_at'] = now();
            }

            $invoice = Invoice::create($validated);

            //add due_date to model customer
            Customer::where('id', $validated['customer_id'])->update([
                'due_date' => $validated['due_date'],
            ]);

            //if invoice status is "paid"
            //transactions automaticly added
            if ($validated['status'] == 'paid') {

                Transaction::firstOrCreate([
                    'invoice_id' => $invoice->id,
                    'customer_id' => $validated['customer_id'],
                    'amount' => $validated['amount'],
                    'payment_date' => $validated['paid_at'],
                    'payment_method' => "Cash",
                    'reference' => '',
                    'notes' => 'Pembayan invoice nomor ' . $validated['invoice_number']
                ]);
            }
            return redirect()->back()->with('success', 'Berhasil diaktivasi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan invoice: ' . $e->getMessage())->withInput();
        }
    }
}
