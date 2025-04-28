@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="card-body">
            <h4>Daftar Pelanggan</h4>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="table-responsive" style="max-height: 600px;">
                <table class="table table-bordered table-hover shadow-sm" style="min-width: 900px;">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
                            <th>Paket</th>
                            <th>Grup</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                            <th>Pembayaran Terbaru</th>
                            <th>Berlaku Sampai</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $index => $customer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->username }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->package }}</td>
                            <td>{{ $customer->group }}</td>
                            <td>{{ $customer->join_date }}</td>
                            <td>{{ $customer->status }}</td>
                            <td>{{ $customer->lastInvoices?->paid_at }}</td>
                            <td>{{ $customer->getDuedate?->due_date }}</td>
                            <td>{{ $customer->notes }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus customer ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="text-center text-muted">No customers found.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-2">

                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</div>
@endsection
