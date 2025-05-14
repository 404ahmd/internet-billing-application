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
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <!-- Modal Tambah Router -->
                            <div class="modal fade" id="tambahRouterModal" tabindex="-1"
                                aria-labelledby="tambahRouterLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('router.store') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahRouterLabel">Tambah Router</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nama Router</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="ip_address" class="form-label">Alamat IP</label>
                                                    <input type="text" id="ip_address" name="ip_address"
                                                        class="form-control" required>
                                                </div>

                                                {{-- <div class="mb-3">
                                                    <label for="api_port" class="form-label">Port API (default:
                                                        8728)</label>
                                                    <input type="text" id="api_port" name="api_port"
                                                        class="form-control" required>
                                                </div> --}}

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">User</label>
                                                    <input type="text" id="username" name="username"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Tombol trigger modal -->
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahRouterModal">
                                + Tambah Router
                            </button>

                            <h4 class="text-center mb-3">Daftar Router</h4>
                            <hr>
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table class="table table-bordered table-striped table-hover" style="min-width: 900px;">
                                    <thead class="table-light sticky-top">
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama</th>
                                            <th class="text-nowrap">Alamat IP</th>
                                            <th class="text-nowrap">API Port</th>
                                            <th class="text-nowrap">Username</th>
                                            <th class="text-nowrap">Password</th>
                                            <th class="text-nowrap">Status Aktif</th>
                                            <th class="text-nowrap">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($routers as $index => $router)
                                        @if (is_object($router))
                                        <tr>
                                            <td>{{ (int)$index + 1 }}</td>
                                            <td>{{ $router->name }}</td>
                                            <td>{{ $router->ip_address }}</td>
                                            <td>{{ $router->api_port }}</td>
                                            <td>{{ $router->username }}</td>
                                            <td>{{ $router->password }}</td>
                                            <td>{{ $router->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                            <td class="text-nowrap">
                                                <a href="#" class="btn btn-sm btn-warning mb-1">Edit</a>
                                                <form action="{{ route('router.destroy', $router->id) }}" method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus router ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger mb-1">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data router.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection
