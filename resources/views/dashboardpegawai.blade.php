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
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="p-4 pt-5 ">
                        <div class="sidebar-logo">
                            <img src="{{ ('/img/logo.png') }}" 
                                    style="width: 185px;" alt="logo">
                        </div>
                        <h2 class="sidebar-title">PUSDALOPS-PB</h2>
                        <ul class="list-unstyled components mb-5">
                            <li>
                                <a href="{{ url('dashboardpage') }}">Dashboard</a>
                            </li>

                            <li class="nav-item active">
                                <a href="{{ url('datapegawai') }}">Pegawai</a>
                            </li>

                            <li>
                                <a href="{{ url('suratmasuk') }}">Surat Masuk</a>
                            </li>

                            <li>
                                <a href="{{ url('suratkeluar') }}">Surat Keluar</a>
                            </li>

                            <li>
                                <a href="{{ url('suratcuti') }}">Surat Cuti</a>
                            </li>

                            <li>
                                <a href="{{ url('spt') }}">SPT</a>
                            </li>

                            <li>
                                <a href="{{ url('disposisi') }}">Disposisi</a>
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('dashboardpage') }}">Dashboard</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('datapegawai') }}">Pegawai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('suratmasuk') }}">Surat Masuk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('suratkeluar') }}">Surat Keluar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('suratcuti') }}">Surat Cuti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('spt') }}">SPT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('disposisi') }}">Disposisi</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </nav>
                    
                    <div class="container-fluid category">
                        <h2 class="d-flex w-100 justify-content-center" style="font-weight: bold">Menu Pegawai</h2>
                        <div class="d-flex justify-content-center gap-5 w-100 mt-3 flex-wrap">
                        <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="{{ url('/datapegawai')  }}" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-users"></i>
                                    <h5 class="text-center">DATA PEGAWAI</h5>
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
                                    <a href="#/kategorialam" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-restroom"></i>
                                    <h5 class="text-center">DATA ISTRI/SUAMI</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="#/kategorialam" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-child"></i>
                                    <h5 class="text-center">DATA ANAK</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="#/kategorialam" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-user-group"></i>
                                    <h5 class="text-center">DATA ORANG TUA</h5>
                                    </a> 
                                </div>
                            </div>

                            <div class="kategori_items">
                                <div class="card kategori_card">
                                    <a href="#/kategorialam" class="nav-link d-flex justify-content-center flex-column align-items-center">
                                    <i class="kategori_icon fa-solid fa-file-lines"></i>
                                    <h5 class="text-center">PENILAIAN TAHUNAN</h5>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    <div>
        @notifyJs
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>