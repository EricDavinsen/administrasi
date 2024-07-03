<nav id="sidebar" class="no-print">
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

            <li class="{{ request()->is('disposisi','caridisposisi') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-list-check"></i>
                    <a href="{{ url('jenissurat') }}">Jenis Surat</a>
                </div>
            </li>

            <li class="{{ request()->is('disposisi','caridisposisi') ? 'nav-item active' : '' }}">
                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                    <i class="fa-solid fa-xl fa-list"></i>
                    <a href="{{ url('sifatsurat') }}">Sifat Surat</a>
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
        
        <a href="#" class="btn-logout d-flex align-items-center justify-content-center gap-2" data-toggle="modal" data-target="#logoutModal">
            <box-icon type='solid' name='log-out' animation='tada-hover' color='white'></box-icon>
            Logout
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: black">
                        Apakah Anda yakin ingin keluar dari sistem?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ url('logout') }}" class="btn btn-danger">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>              
</nav>