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

                            <li>
                                <a href="{{ url('daftaruser') }}">Daftar User</a>
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

                    <form action="{{ url('/updatepegawai/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Nama Pegawai" name="NAMA_PEGAWAI" value="{{ $pegawai->NAMA_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NIK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NIK" placeholder="Masukan NIK" value="{{ $pegawai->NIK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No Kartu Keluarga</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_KK" placeholder="Masukan Nomor Keluarga" value="{{ $pegawai->NO_KK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_LAHIR" value="{{ $pegawai->TANGGAL_LAHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control" name="JENIS_KELAMIN" value="{{ $pegawai->JENIS_KELAMIN }}">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Agama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="AGAMA" placeholder="Masukan Agama" value="{{ $pegawai->AGAMA }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Instansi</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="INSTANSI" placeholder="Masukan Instansi" value="{{ $pegawai->INSTANSI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Unit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="UNIT" placeholder="Masukan Unit" value="{{ $pegawai->UNIT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sub Unit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="SUB UNIT" placeholder="Masukan Sub Unit" value="{{ $pegawai->SUB_UNIT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jabatan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JABATAN" placeholder="Masukan Jabatan" value="{{ $pegawai->JABATAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Pegawai</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JENIS_PEGAWAI" placeholder="Masukan Jenis Pegawai" value="{{ $pegawai->JENIS_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="PENDIDIKAN_TERAKHIR" placeholder="Masukan Pendidikan" value="{{ $pegawai->PENDIDIKAN_TERAKHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status Pegawai</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="STATUS_PEGAWAI" placeholder="Masukan Status Pegawai" value="{{ $pegawai->STATUS_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kedudukan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="KEDUDUKAN" placeholder="Masukan Kedudukan" value="{{ $pegawai->KEDUDUKAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Foto</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FOTO_PEGAWAI" placeholder="Masukan Foto" value="{{ $pegawai->FOTO_PEGAWAI }}">
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapegawai') }}" class="btn btn-danger"> Kembali</a>
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