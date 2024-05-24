<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PUSDALOPS-PB</title>
        @notifyCss
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <!-- Core theme CSS (includes Bootstrap)-->
            <!-- Font Awesome -->
            <link
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
                rel="stylesheet"
            />
            <!-- Google Fonts -->
            <link
                href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
                rel="stylesheet"
            />
            
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>

    <body class="dashboard-pic">
        <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="p-4 pt-5 ">
                        <div class="sidebar-logo">
                            <img src="{{ ('/img/logo.png') }}" 
                                    style="width: 185px;" alt="logo">
                        </div>
                        <h2 class="sidebar-title">PUSDALOPS-PB</h2>
                        <ul class="list-unstyled components mb-5">
                        <li class="nav-item active">
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-home"></i>
                                    <a href="{{ url('dashboardpage') }}">Dashboard</a>
                                </div>
                            </li>

                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-envelope"></i>
                                    <a href="{{ url('suratmasuk') }}">Surat Masuk</a>
                                </div>
                            </li>

                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-envelope-open-text"></i>
                                    <a href="{{ url('suratkeluar') }}">Surat Keluar</a>
                                </div>
                            </li>

                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-envelope-open"></i>
                                    <a href="{{ url('suratcuti') }}">Surat Cuti</a>
                                </div>
                            </li>

                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-circle-exclamation"></i>
                                    <a href="{{ url('spt') }}">SPT</a>
                                </div>
                            </li>

                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-envelopes-bulk"></i>
                                    <a href="{{ url('disposisi') }}">Disposisi</a>
                                </div>
                            </li>

                            <li class="mt-5">
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-users"></i>
                                    <a href="{{ url('datapegawai') }}">Daftar Pegawai</a>
                            </li>
                         
                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-user"></i>
                                    <a href="{{ url('daftaruser') }}">Daftar User</a>
                                </div>
                            </li>

                            <li>
                                <div class="sidebar-items d-flex align-items-center gap-3 w-100">
                                    <i class="fa-solid fa-xl fa-calendar"></i>
                                    <a href="{{ url('events') }}">Agenda</a>
                                </div>
                            </li>

                        </ul>
                        
                            <a href="{{ url('logout') }}" class="btn-logout"> Logout </a>

                    </div>
                </nav>

                <!-- Page Content  -->
                <div id="content" class="p-4 p-md-5">
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
                                <div class="card kategori_card">
                                    <a href="{{ url('/datapegawai')  }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-users"></i>
                                    <h5 class="text-center">DAFTAR PEGAWAI</h5>
                                    </a> 
                                </div>
                            </div>
                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/createdatapribadi/'.$pegawai->id)  }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-id-card"></i>
                                    <h5 class="text-center">DATA PRIBADI</h5>
                                    </a> 
                                </div>
                            </div>
                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/riwayatsk/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-user"></i>
                                    <h5 class="text-center">RIWAYAT SK</h5>
                                    </a> 
                                </div>
                            </div>
                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/riwayatpendidikan/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-user-graduate"></i>
                                    <h5 class="text-center">RIWAYAT PENDIDIKAN</h5>
                                    </a> 
                                </div>
                            </div>
                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/diklat/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-book"></i>
                                    <h5 class="text-center">DIKLAT</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/datakeluarga/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-house-chimney-window"></i>
                                    <h5 class="text-center">DATA KELUARGA</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/databpjs/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-user-doctor"></i>
                                    <h5 class="text-center">DATA BPJS</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/penilaiantahunan/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-file-lines"></i>
                                    <h5 class="text-center">PENILAIAN TAHUNAN</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/cetakinformasi/'.$pegawai->id) }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-print"></i>
                                    <h5 class="text-center">CETAK INFORMASI</h5>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    <div>
        @notifyJs
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>