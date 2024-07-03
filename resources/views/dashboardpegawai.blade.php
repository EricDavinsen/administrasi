@extends('layouts.appdashboard')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/dashboardpegawai/'.$pegawai->id) }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/datapribadi/'.$pegawai->id) }}">Data Pribadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/riwayatsk/'.$pegawai->id) }}">Riwayat SK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/riwayatpendidikan/'.$pegawai->id) }}">Riwayat Pendidikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/diklat/'.$pegawai->id) }}">Diklat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/datakeluarga/'.$pegawai->id) }}">Data Keluarga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/databpjs/'.$pegawai->id) }}">Data BPJS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/penilaiantahunan/'.$pegawai->id) }}">Penilaian Tahunan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cetakinformasi/'.$pegawai->id) }}">Cetak Informasi</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid category" data-aos="fade-right" data-aos-delay="50" data-aos-duration="2000">
        <h2 class="d-flex w-100 justify-content-center" style="font-weight: bold; color: white">Detail Pegawai : {{$pegawai->NAMA_PEGAWAI}}</h2>
        <div class="d-flex justify-content-center gap-5 w-100 mt-3 flex-wrap">
            <div class="kategori_items">
                <a href="{{ url('/datapegawai')  }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-users"></i>
                        <h5 class="text-center">DAFTAR PEGAWAI</h5>
                    </div>
                </a> 
            </div>
            <div class="kategori_items">
                <a href="{{ url('/createdatapribadi/'.$pegawai->id)  }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-id-card"></i>
                        <h5 class="text-center">DATA PRIBADI</h5>
                    </div>
                </a> 
            </div>
            <div class="kategori_items">
                <a href="{{ url('/riwayatsk/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-user"></i>
                        <h5 class="text-center">RIWAYAT SK</h5>
                    </div>
                </a> 
            </div>
            <div class="kategori_items">
                <a href="{{ url('/riwayatpendidikan/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-user-graduate"></i>
                        <h5 class="text-center">RIWAYAT PENDIDIKAN</h5>
                    </div>
                </a> 
            </div>
            <div class="kategori_items">
                <a href="{{ url('/diklat/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-book"></i>
                        <h5 class="text-center">DIKLAT</h5>
                    </div>
                </a> 
            </div>

            <div class="kategori_items">
                <a href="{{ url('/datakeluarga/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-house-chimney-window"></i>
                        <h5 class="text-center">DATA KELUARGA</h5>
                    </div>
                </a> 
            </div>

            <div class="kategori_items">
                <a href="{{ url('/databpjs/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-user-doctor"></i>
                        <h5 class="text-center">DATA BPJS</h5>
                    </div>
                </a> 
            </div>

            <div class="kategori_items">
                <a href="{{ url('/penilaiantahunan/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-file-lines"></i>
                        <h5 class="text-center">PENILAIAN TAHUNAN</h5>
                    </div>
                </a> 
            </div>

            <div class="kategori_items">
                <a href="{{ url('/cetakinformasi/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                    <div class="card kategori_card">
                        <i class="kategori_icon fa-solid fa-print"></i>
                        <h5 class="text-center">CETAK INFORMASI</h5>
                    </div>
                </a> 
            </div>
        </div>
    </div>
@endsection