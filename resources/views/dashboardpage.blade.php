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

    <body>
        <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="p-4 pt-5 ">
                        <div class="sidebar-logo">
                            <img src="{{ ('img/logo.png') }}" 
                                    style="width: 185px;" alt="logo">
                        </div>
                        <h2 class="sidebar-title">PUSDALOPS-PB</h2>
                        <ul class="list-unstyled components mb-5">
                            <li class="nav-item active">
                                <a href="{{ url('dashboardpage') }}">Dashboard</a>
                            </li>

                            <li>
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
                <div id="content" class="p-4 p-md-5" style="background-color: #878c94">
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
                                    <a class="nav-link" href="{{ url('dashboardpage') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
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

                    <div class="notification">
                            <x-notify::notify />
                        </div>
                    <div class="container-fluid" data-aos="fade-down" data-aos-delay="50" data-aos-duration="2000">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 font-weight-bold" style="font-size: 35px; color:white">Dashboard</h1>
                        <h5 class="mb-0" style="color:#2dcc14; font-weight: bold">User : {{ $admin->USERNAME }}</h5>
                        </div>
                       
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 p-3">
                                <a href = "{{ url('suratmasuk') }}">
                                    <div class="frontside">
                                        <div class="surat_card card">
                                                <div class="item_container">
                                                    <div class="jumlah_item">{{ $suratmasuk }}</div>
                                                </div>

                                            <div class="card-body text-center">
                                                <i class="fa-solid fa-envelope fa-2x text-gray-300" style="font-size: 130px"></i>
                                                <h4 class="card-title">Surat Masuk</h4>
                                                <p class="card-text p-3">Tekan untuk menuju ke menu surat masuk.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 p-3">
                                <a href = "{{ url('suratkeluar') }}">
                                    <div class="frontside">
                                        <div class="surat_card card">
                                            <div class="jumlah_item">{{ $suratkeluar }}</div>
                                            <div class="card-body text-center">
                                                <i class="fa-solid fa-envelope-open-text fa-2x text-gray-300" style="font-size: 130px"></i>
                                                <h4 class="card-title">Surat Keluar</h4>
                                                <p class="card-text p-3">Tekan untuk menuju ke menu surat keluar.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xs-12 col-sm- col-md-4 p-3">
                                <a href = "{{ url('suratcuti') }}">
                                    <div class="frontside">
                                        <div class="surat_card card">
                                        <div class="jumlah_item">{{ $suratcuti }}</div>
                                            <div class="card-body text-center">
                                                <i class="fa-regular fa-envelope fa-2x text-gray-300" style="font-size: 130px"></i>
                                                <h4 class="card-title">Surat Cuti</h4>
                                                <p class="card-text p-3">Tekan untuk menuju ke menu surat cuti.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-xs-12 col-sm-6 col-md-4 p-3">
                                <a href = "{{ url('spt') }}">
                                    <div class="frontside">
                                        <div class="surat_card card">
                                        <div class="jumlah_item">{{ $spt }}</div>
                                            <div class="card-body text-center">
                                                <i class="fa-solid fa-circle-exclamation fa-2x text-gray-300" style="font-size: 130px"></i>
                                                <h4 class="card-title">Surat Perintah Tugas (SPT)</h4>
                                                <p class="card-text p-3">Tekan untuk menuju ke menu surat spt.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-xs-12 col-sm-6 col-md-4 p-3">
                                <a href = "{{ url('datapegawai') }}">
                                    <div class="frontside">
                                        <div class="surat_card card">
                                        <div class="jumlah_item">{{ $pegawai }}</div>
                                            <div class="card-body text-center">
                                                <i class="fa-solid fa-users fa-2x text-gray-300" style="font-size: 130px"></i>
                                                <h4 class="card-title">Data Pegawai</h4>
                                                <p class="card-text p-3">Tekan untuk menuju ke menu pegawai.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        @notifyJs
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>