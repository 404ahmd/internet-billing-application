@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="card-body">
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Package</th>
                            <th>group</th>
                            <th>join_date</th>
                            <th>status</th>
                            <th>last_payment_date</th>
                            <th>due_date</th>
                            <th>notes</th>
                            <th>Actions</th>
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
                            <td>{{ $customer->last_payment_date }}</td>
                            <td>{{ $customer->due_date }}</td>
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
