<nav id="sidebar">
    <div class="p-4 pt-5 ">
        <div class="sidebar-logo">
            <img src="{{ ('/img/logo.png') }}" 
                    style="width: 185px;" alt="logo">
        </div>
        <h2 class="sidebar-title">PUSDALOPS-PB</h2>
        <ul class="list-unstyled components mb-5">
        @if ($users->role == 'admin')
            <li class="{{ request()->is('dashboardpage') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-home"></i>
                    <a href="{{ url('dashboardpage') }}">Dashboard</a>
                </div>
            </li>

            <li class="{{ request()->is('suratmasuk','carisuratmasuk','createsuratmasuk','filter') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-envelope"></i>
                    <a href="{{ url('suratmasuk') }}">Surat Masuk</a>
                </div>
            </li>

            <li class="{{ request()->is('suratkeluar','carisuratkeluar','createsuratkeluar','filtersuratkeluar') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-envelope-open-text"></i>
                    <a href="{{ url('suratkeluar') }}">Surat Keluar</a>
                </div>
            </li>

            <li class="{{ request()->is('suratcuti','carisuratcuti', 'createsuratcuti') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-envelope-open"></i>
                    <a href="{{ url('suratcuti') }}">Surat Cuti</a>
                </div>
            </li>

            <li class="{{ request()->is('spt','carispt','createspt','filterspt') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-circle-exclamation"></i>
                    <a href="{{ url('spt') }}">SPT</a>
                </div>
            </li>

            <li class="{{ request()->is('disposisi','caridisposisi') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-envelopes-bulk"></i>
                    <a href="{{ url('disposisi') }}">Disposisi</a>
                </div>
            </li>

            <li class="mt-5 {{ request()->is('datapegawai','caripegawai','createpegawai') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-users"></i>
                    <a href="{{ url('datapegawai') }}">Daftar Pegawai</a>
                </div>
            </li>
            
            <li class="{{ request()->is('daftaruser','cariuser','createuser') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-user"></i>
                    <a href="{{ url('daftaruser') }}">Daftar User</a>
                </div>
            </li>
  
            <li class="{{ request()->is('events') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-calendar"></i>
                    <a href="{{ url('events') }}">Agenda</a>
                </div>
            </li>


            @else

            <li class="{{ request()->is('dashboardpage') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-home"></i>
                    <a href="{{ url('dashboardpage') }}">Dashboard</a>
                </div>
            </li>

            <li class="{{ request()->is('events') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-calendar"></i>
                    <a href="{{ url('events') }}">Agenda</a>
                </div>
            </li>
            
            @endif
        </ul>
        
            <a href="{{ url('logout') }}" class="btn-logout"> Logout </a>

    </div>              
</nav>