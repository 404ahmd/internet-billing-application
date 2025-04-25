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
                <!-- FORM ADD NEW PACKAGE -->
                <div class="col-12 col-md-6">
                    <h4 class="text-center">Tambah Paket</h4>
                    <hr>
                    {{-- route to /package/store --}}
                    <form method="POST" action="{{ route('package.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Paket</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" id="price" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="cycle" class="form-label">Siklus</label>
                            <input type="text" id="cycle" name="cycle" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="pppoe">PPPoE</option>
                                <option value="hotspot">Hotspot</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="bandwidth" class="form-label">Bandwidth</label>
                            <input type="text" id="bandwidth" name="bandwidth" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="available">Tersedia</option>
                                <option value="unavailable">Tidak Tersedia</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    </form>
                </div>

                <!-- TABLE PACKAGE -->
                <div class="col-12 col-md-6 overflow-auto" style="max-height: 700px;">
                    <h4 class="text-center">Daftar Paket</h4>
                    <hr>
                    <div class="table-responsive" style="max-height: 600px;">

                        <table class="table table-bordered table-striped" style="min-width: 900px;">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Siklus</th>
                                    <th>Tipe</th>
                                    <th>Bandwidth</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- show all pacakge  --}}
                                @forelse ($packages as $index => $package)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->description }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td>{{ $package->cycle }}</td>
                                        <td>{{ ucfirst($package->type) }}</td>
                                        <td>{{ $package->bandwidth ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-{{ $package->status === 'available' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($package->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data produk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>

    @include('layouts.footer')
</div>
@endsection
