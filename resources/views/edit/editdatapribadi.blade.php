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
        <div class="notification">
            <x-notify::notify />
        </div>
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

                    <form action="{{ url('/updatedatapribadi/'. $datapribadi->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">NO KTP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NO_KTP" placeholder="Masukan Nomor KTP" value="{{ $datapribadi->NO_KTP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO BPJS</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_BPJS" placeholder="Masukan Nomor BPJS" value="{{ $datapribadi->NO_BPJS }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO NPWP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_NPWP" placeholder="Masukan Nomor NPWP" value="{{ $datapribadi->NO_NPWP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tinggi Badan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TINGGI_BADAN" placeholder="Masukan Tinggi Badan" value="{{ $datapribadi->TINGGI_BADAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Berat Badan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="BERAT_BADAN" placeholder="Masukan Berat Badan" value="{{ $datapribadi->BERAT_BADAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Warna Kulit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="WARNA_KULIT" placeholder="Masukan Warna Kulit" value="{{ $datapribadi->WARNA_KULIT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Golongan Darah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="GOLONGAN_DARAH" placeholder="Masukan Golongan Darah" value="{{ $datapribadi->GOLONGAN_DARAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Alamat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="ALAMAT_RUMAH" placeholder="Masukan Alamat" value="{{ $datapribadi->ALAMAT_RUMAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kode Pos</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="KODE_POS" placeholder="Masukan Kode Pos" value="{{ $datapribadi->KODE_POS }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Telpon Rumah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TELPON_RUMAH" placeholder="Masukan Nomor Telpon Rumah" value="{{ $datapribadi->TELPON_RUMAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No. Hp</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_HP" placeholder="Masukan Nomor Handphone" value="{{ $datapribadi->NO_HP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="email" class="form-control" id="formGroupExampleInput2" name="EMAIL" placeholder="Masukan Email" value="{{ $datapribadi->EMAIL }}">
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapribadi/'.$pegawai->id) }}" class="btn btn-danger"> Kembali</a>
                    </form>
                </div>
            </div>
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/popper.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
        @include('sweetalert::alert')
        @notifyJs
    </body>
</html>