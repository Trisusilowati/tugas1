<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ url('backend/assets/img/kaiadmin/logo_light.svg')}}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                    <a href="{{ route('user') }}">
                        <i class="fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('students*') ? 'active' : '' }}">
                    <a href="{{ route('students') }}">
                        <i class="fas fa-user-graduate"></i>
                        <p>Data Siswa</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('teacher*') ? 'active' : '' }}">
                    <a href="{{ route('teacher') }}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Data Guru</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('mapel*') ? 'active' : '' }}">
                    <a href="{{ route('mapel') }}">
                        <i class="fas fa-book"></i>
                        <p>Mata Pelajaran</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('nilai*') ? 'active' : '' }}">
                    <a href="{{ route('nilai') }}">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Nilai</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('create*') ? 'active' : '' }}">
                    <a href="{{ route('pendaftaran') }}">
                        <i class="fas fa-registered"></i>
                        <p>Pendaftaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Log Out</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
