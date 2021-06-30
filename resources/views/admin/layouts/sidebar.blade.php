                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">E-Moer <sup>2021</sup></div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/dashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Data
                    </div>

                    <!-- Nav Item - User -->
                    <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                        <a class="nav-link" href="/user">
                            <i class="fas fa-fw fa-user"></i>
                            <span>User</span></a>
                    </li>

                    <!-- Nav Item - Petugas -->
                    <li class="nav-item {{ request()->is('petugas') ? 'active' : '' }}">
                        <a class="nav-link" href="/petugas">
                            <i class="fas fa-fw fa-user-tie"></i>
                            <span>Petugas</span></a>
                    </li>

                    <!-- Nav Item - Siswa -->
                    <li class="nav-item {{ request()->is('siswa') ? 'active' : '' }}">
                        <a class="nav-link" href="/siswa">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Siswa</span></a>
                    </li>

                    <!-- Nav Item - Kelas -->
                    <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
                        <a class="nav-link" href="/kelas">
                            <i class="fas fa-fw fa-archway"></i>
                            <span>Kelas</span></a>
                    </li>

                    <!-- Nav Item - SPP -->
                    <li class="nav-item {{ request()->is('spp') ? 'active' : '' }}">
                        <a class="nav-link" href="/spp">
                            <i class="fas fa-fw fa-book-open"></i>
                            <span>SPP</span></a>
                    </li>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Transaksi
                    </div>

                    <!-- Nav Item - Pembayaran -->
                    <li class="nav-item {{ request()->is('pay') ? 'active' : '' }}">
                        <a class="nav-link" href="/pay">
                            <i class="fas fa-fw fa-cash-register"></i>
                            <span>Pembayaran</span></a>
                    </li>

                    <!-- Nav Item - Riwayat -->
                    <li class="nav-item {{ request()->is('history') ? 'active' : '' }}">
                        <a class="nav-link" href="/history">
                            <i class="fas fa-fw fa-history"></i>
                            <span>Riwayat</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->