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
                            <img src="{{ ('img/logo.png') }}" 
                                    style="width: 185px;" alt="logo">
                        </div>
                        <h2 class="sidebar-title">PUSDALOPS-PB</h2>
                        <ul class="list-unstyled components mb-5">
                             <li>
                                <a href="{{ url('dashboardpage') }}">Dashboard</a>
                            </li>

                            <li>
                                <a href="{{ url('datapegawai') }}">Pegawai</a>
                            </li>

                            <li>
                                <a href="{{ url('suratmasuk') }}">Surat Masuk</a>
                            </li>

                            <li class="nav-item active">
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
                <div class="notification">
                    <x-notify::notify />
                </div>
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('datapegawai') }}">Pegawai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('suratmasuk') }}">Surat Masuk</a>
                                </li>
                                <li class="nav-item active">
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
                    <h1 class="h3 mb-0 text-gray-800 mb-2">Surat Keluar</h1>
                    <form class="navbar-search" action="{{ url('/carisuratkeluar') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Surat" aria-label="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ url('/createsuratkeluar') }}" class="btn btn-md btn-success m-2"> Tambah</a>
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Tanggal Surat</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($suratkeluar as $item)
                            <tr>
                            <td>{{ $item->NOMOR_SURAT }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SURAT)->format('d-m-Y') }}</td>
                            <td>{{ $item->JENIS_SURAT }}</td>
                            <td>{{ $item->TUJUAN_SURAT }}</td>
                            <td>{{ $item->SIFAT_SURAT }}</td>
                            <td>{{ $item->PERIHAL_SURAT }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editsuratkeluar/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletesuratkeluar/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilsuratkeluar/'.$item->id) }}" class="btn btn-warning" style="color:white">Review</a> 
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $suratkeluar->links() !!}
                    </div>
                </div>
            </div>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        @notifyJs
    </body>
</html>