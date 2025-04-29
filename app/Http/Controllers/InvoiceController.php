<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Package;
use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.invoice_customer', compact('invoices'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'customer_name'=>'required|string|min:3'
        ]);

        
    }

    //get form invoice update
    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        $packages = Package::all();
        return view('invoice.update_invoice', [
            'invoice' => $invoice,
            'packages' => $packages,
            'customers' => $customers
        ]);
    }

    public function update(Request $request, Invoice $invoice)
    {

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'invoice_number' => 'required|unique:invoices,invoice_number,',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'amount' => 'required|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid,overdue',
            'paid_at' => $request->status == 'paid' ? 'required|date' : 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        if ($validated['status'] === 'paid' && empty($validated['paid_at'])) {
            $validated['paid_at'] = now();
        } elseif ($validated['status'] !== 'paid') {
            $validated['paid_at'] = null;
        }

        try {
            $invoice->update($validated);
            return redirect()->route('invoice.view')->with('success', 'data berhasil diperbarui');
        } catch (\Exception $e) {
           return redirect()->back()->with('error', 'gagal mengupdate data' . $e->getMessage())->withInput();
        }
    }
}
