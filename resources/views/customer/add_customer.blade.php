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
            <div class="row">
                <div class="col-12 col-md-6">

                    {{-- FORM ADD NEW CUSTOMER --}}
                    <h4 class="text-center">Tambah Pelanggan</h4>
                    <hr>
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Telpon</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="group" class="form-label">Grup</label>
                            <input type="text" id="group" name="group" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="package" class="form-label">Paket</label>
                            <select name="package" id="package" class="form-control-sm w-100">
                                {{-- SHOW ALL AVAILABLE PACAKGE --}}
                                <option value="">-- Pilih Paket --</option>
                                @forelse($packages as $index => $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>

                                @empty

                                @endforelse
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="join_date" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" id="join_date" name="join_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                                <option value="terminated">Dihentikan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan</label>
                            <input type="text" id="notes" name="notes" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footer')

    </div>
    @endsection
