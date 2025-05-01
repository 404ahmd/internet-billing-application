@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
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
        <div class="card-body">
            <h2>Edit Customer</h2>
            <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ $customer->username }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Package</label>
                    <input type="text" name="package" value="{{ $customer->package }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Group</label>
                    <input type="text" name="group" value="{{ $customer->group }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Join Date</label>
                    <input type="date" name="join_date" value="{{ $customer->join_date }}" class="form-control">
                </div>

                {{-- <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                </div> --}}


                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                        <option value="terminated">Dihentikan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Due Date</label>
                    <input type="date" name="due_date" value="{{ $customer->due_date }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Notes</label>
                    <textarea name="notes" class="form-control">{{ $customer->notes }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('customer.view') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
