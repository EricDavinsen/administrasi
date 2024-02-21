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

                    <form action="{{ url('/updatedatabpjs/'. $databpjs->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nomor JKN</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NOMOR_JKN" placeholder="Masukan Nomor JKN" value="{{ $databpjs->NOMOR_JKN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NIK" placeholder="Masukan NIK" value="{{ $databpjs->NIK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NIP" placeholder="Masukan NIP" value="{{ $databpjs->NIP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_LENGKAP" placeholder="Masukan Nama Lengkap" value="{{ $databpjs->NAMA_LENGKAP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control" name="JENIS_KELAMIN" value="{{ $databpjs->JENIS_KELAMIN }}">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status Kawin</label>
                            <select class="form-control" name="STATUS_KAWIN" value="{{ $databpjs->STATUS_KAWIN }}">
                                <option value="" disabled selected hidden>Pilih Status Kawin</option>
                                <option>Kawin</option>
                                <option>Tidak Kawin</option>
                                <option>Cerai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Hubungan Keluarga</label>
                            <select class="form-control" name="HUBUNGAN_KELUARGA" value="{{ $databpjs->HUBUNGAN_KELUARGA }}">
                                <option value="" disabled selected hidden>Pilih Hubungan Keluarga</option>
                                <option>Suami</option>
                                <option>Anak</option>
                                <option>Istri</option>
                                <option>Pekerja</option>
                                <option>Tanggungan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="{{ $databpjs->TANGGAL_LAHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai TMT</label>
                            <input type="date" class="form-control" id="TANGGAL_MULAI_TMT" name="TANGGAL_MULAI_TMT" value="{{ $databpjs->TANGGAL_MULAI_TMT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai TMT</label>
                            <input type="date" class="form-control" id="TANGGAL_SELESAI_TMT" name="TANGGAL_SELESAI_TMT" value="{{ $databpjs->TANGGAL_SELESAI_TMT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gaji Pokok</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="GAJI_POKOK" placeholder="Masukan Gaji Pokok" value="{{ $databpjs->GAJI_POKOK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Faskes</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_FASKES" placeholder="Masukan Nama Fasilitas Kesehatan" value="{{ $databpjs->NAMA_FASKES }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">No Telepon</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NO_TELEPON" placeholder="Masukan Nomor Telepon" value="{{ $databpjs->NO_TELEPON }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/databpjs/'.$databpjs->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
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