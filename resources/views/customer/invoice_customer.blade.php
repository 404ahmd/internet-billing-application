@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="card-body">
            <h4>Daftar Invoice</h4>
            <div class="table-responsive" style="max-height: 600px">
                <table class="table table-bordered table-hover shadow-sm" style="min-width:900px">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ID Pelanggan</th>
                            <th>ID Paket</th>
                            <th>Nomor Invoice</th>
                            <th>Tanggal Penerbitan</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Jumlah</th>
                            <th>Jumlah Pajak</th>
                            <th>Jumlah Total</th>
                            <th>Status Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $index => $invoice)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $invoice->customer->name }}</td>
                            <td>{{ $invoice->package->name  }}</td>
                            <td>{{ $invoice->invoice_number  }}</td>
                            <td>{{ $invoice->issue_date  }}</td>
                            <td>{{ $invoice->due_date  }}</td>
                            <td>{{ $invoice->amount  }}</td>
                            <td>{{ $invoice->tax_amount  }}</td>
                            <td>{{ $invoice->total_amount  }}</td>
                            <td>{{ $invoice->status  }}</td>
                            <td>{{ $invoice->paid_at  }}</td>
                            <td>{{ $invoice->notes  }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
