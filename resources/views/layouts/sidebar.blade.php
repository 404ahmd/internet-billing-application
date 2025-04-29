<!-- Tambahkan ini di <style> atau file CSS kamu -->
    <style>
        .sidebar .nav .nav-item a p,
        .sidebar .nav .nav-item a span,
        .sidebar .nav .nav-item i {
            font-size: 16px !important; /* Atur ukuran teks lebih besar */
        }
    </style>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-primary">

                    <!-- Customer Menu -->
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Layanan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="dashboard">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('add.customer.view') }}">
                                        <span class="sub-item">Tambah Pelanggan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.view') }}">
                                        <span class="sub-item">Daftar Pelanggan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.activation') }}">
                                        <span class="sub-item">Aktivasi Pelanggan</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <!-- Internet Menu -->
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#internetMenu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-network-wired"></i>
                            <p>Jaringan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="internetMenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Router</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">IP Pool</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Paket Menu: Diubah jadi langsung link -->
                    <li class="nav-item">
                        <a href="{{ route('package.view') }}">
                            <i class="fas fa-cogs"></i>
                            <p>Manajemen Paket</p>
                        </a>
                    </li>

                    <!-- Pemberitahuan Menu -->
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#pemberitahuanMenu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <p>Kirim Pesan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="pemberitahuanMenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Satu Pelanggan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Banyak Pelanggan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Laporan Menu -->
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#laporanMenu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="laporanMenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Laporan Harian</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('invoice.view') }}">
                                        <span class="sub-item">Lihat Invoice</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transaction.view') }}">
                                        <span class="sub-item">Riwayat Transaksi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
