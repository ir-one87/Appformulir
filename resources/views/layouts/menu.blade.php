<!-- sidebar menu start -->
<div class="sidebar-menu">

    <ul>
        @if (Auth::user()->role == 'admin')
        <li class="header-menu">General</li>
        <li>
            <a href="{{ route('home') }}" class="current-page">
                <i class="icon-devices_other"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>
        <li class="header-menu">Data Master</li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="icon-edit1"></i>
                <span class="menu-text">Master Pendaftaran</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="{{ route('list_daftar') }}">List Pendaftar</a>
                    </li>
                    <li>
                        <a href="{{ route('sh_berkas') }}">Berkas TTE</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="icon-book"></i>
                <span class="menu-text">Master OPD</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="{{ route('sh_organisasi') }}">Data OPD</a>
                    </li>
                    <li>
                        <a href="{{ route('pengguna') }}">List Akun OPD</a>
                    </li>
                    <li>
                        <a href="{{ route('formRegis') }}">Register Akun OPD</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif

        <li class="header-menu">Formulir</li>
        <li>
            <a href="{{ route('sh_form') }}">
                <i class="icon-list2"></i>
                <span class="menu-text">Formulir</span>
            </a>
        </li>
        <li>
            <a href="{{ route('unduh_berkas') }}">
                <i class="icon-book"></i>
                <span class="menu-text">Berkas Persyaratan</span>
            </a>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="header-menu">Rekap</li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="icon-airplay"></i>
                <span class="menu-text">Rekap Pendaftaran</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="{{ route('ShowList') }}">List Pendaftaran Per OPD</a>
                    </li>
                    <li>
                        <a href="{{ route('rekap.opd') }}">Rekap Per OPD</a>
                    </li>
                    <li>
                        <a href="#">Rekap Status Pendaftaran</a>
                    </li>
                    <li>
                        <a href="#">Rekap Status Sertifikat</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
</div>
<!-- sidebar menu end -->