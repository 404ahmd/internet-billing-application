<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invoices = Invoice::where('status', 'paid')->get();
        if ($invoices->isEmpty()) {
            $this->command->warn('No paid invoices found, plaese make invoice seeder sek');
        }

        foreach ($invoices as $invoice) {
            Transaction::create([
                'invoice_id'     => $invoice->id,
                'customer_id'    => $invoice->customer_id,
                'amount'         => $invoice->amount,
                'payment_date'   => $invoice->paid_at ?? Carbon::now(),
                'payment_method' => 'Cash',   // Bisa disesuaikan
                'reference'      => 'INV-' . $invoice->invoice_number,
                'notes'          => 'Pembayaran untuk invoice ' . $invoice->invoice_number
            ]);

            $this->command->info('transactions seeded success');
        }
    }
}
