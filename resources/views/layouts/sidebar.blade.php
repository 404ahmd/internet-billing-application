<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav ">

                <li class="nav-item active">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Customer</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('add.customer.view') }}">
                                    <span class="sub-item">Add Customer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer.view') }}">
                                    <span class="sub-item">List Customer</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <ul class="nav nav-primary">

                    {{-- Internet Menu --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#internetMenu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-network-wired"></i>
                            <p>Internet</p>
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

                    {{-- Layanan Menu --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#layananMenu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-cogs"></i>
                            <p>Product</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="layananMenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('products.view') }}">
                                        <span class="sub-item">Manajemen Produk</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Pemberitahuan Menu --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#pemberitahuanMenu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <p>Pemberitahuan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="pemberitahuanMenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Invoice</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Jatuh Tempo</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">Total Pemasukan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
