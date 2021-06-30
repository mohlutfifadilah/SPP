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
                    <li class="nav-item {{ request()->is('siswa/dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="/siswa/dashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Data
                    </div>

                    <!-- Nav Item - Petugas -->
                    <li class="nav-item {{ request()->is('profile/' . Auth::user()->id . '/edit') ? 'active' : '' }}">
                        <a class="nav-link" href="/profile/{{ Auth::user()->id }}/edit">
                            <i class="fas fa-fw fa-user-tie"></i>
                            <span>Profil</span></a>
                    </li>

                    <!-- Nav Item - Petugas -->
                    <li class="nav-item {{ request()->is('kartu/' . Auth::user()->id) ? 'active' : '' }}">
                        <a class="nav-link" href="/kartu/{{ Auth::user()->id }}">
                            <i class="fas fa-fw fa-book"></i>
                            <span>Kartu SPP</span></a>
                    </li>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Pembayaran
                    </div>

                    <!-- Nav Item - Riwayat -->
                    <li class="nav-item {{ request()->is('riwayat/' . Auth::user()->id) ? 'active' : '' }}">
                        <a class="nav-link" href="/riwayat/{{ Auth::user()->id }}">
                            <i class="fas fa-fw fa-history"></i>
                            <span>Riwayat Pembayaran</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->
