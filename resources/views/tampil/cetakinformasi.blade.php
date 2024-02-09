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

                    <div class="surat_container"  data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
                    <div class="cetak-informasi w-100 text-center justify-content-center align-item-center">
                        <h3 class="cetak-title">BIODATA PUSDALOPS</h3>
                        <h3 class="cetak-subtitle">PEMERINTAH DAERAH DAERAH ISTIMEWA YOGYAKARTA</h3>
                        <hr class="garis_title">
                    </div>

                    <div class="d-flex w-100 position-relative">
                        <div class="informasi-data" style="margin-right: 60px">
                            <h5>Nama Lengkap</h5>
                            <h5>NIK</h5>
                            <h5>Tanggal Lahir</h5>
                            <h5>Jenis Kelamin</h5>
                            <h5>Agama</h5>
                            <h5>Instansi</h5>
                            <h5>Unit</h5>
                            <h5>Sub Unit</h5>
                            <h5>Jabatan</h5>
                            <h5>Jenis Pegawai</h5>
                            <h5>Pendidikan Terakhir</h5>
                            <h5>Status Pegawai</h5>
                            <h5>Kedudukan</h5>
                        </div>

                        <div class="informasi-item">
                            <h5>: {{ $pegawai->NAMA_PEGAWAI }}</h5>
                            <h5>: {{ $pegawai->NIK }}</h5>
                            <h5>: {{ \Carbon\Carbon::parse($pegawai->TANGGAL_LAHIR)->format('d-m-Y') }}</h5>
                            <h5>: {{ $pegawai->JENIS_KELAMIN }}</h5>
                            <h5>: {{ $pegawai->AGAMA }}</h5>
                            <h5>: {{ $pegawai->INSTANSI }}</h5>
                            <h5>: {{ $pegawai->UNIT }}</h5>
                            <h5>: {{ $pegawai->SUB_UNIT }}</h5>
                            <h5>: {{ $pegawai->JABATAN }}</h5>
                            <h5>: {{ $pegawai->JENIS_PEGAWAI }}</h5>
                            <h5>: {{ $pegawai->PENDIDIKAN_TERAKHIR }}</h5>
                            <h5>: {{ $pegawai->STATUS_PEGAWAI }}</h5>
                            <h5>: {{ $pegawai->KEDUDUKAN }}</h5>
                        </div>
                        <div class ="foto-pegawai" style="position:absolute; right:0; top:0;">
                            <img src="/document/{{$pegawai->FOTO_PEGAWAI}}" alt="fotopengawai" style="width: 200px; height: 200px;">
                        </div>
                        
                    </div>

                    <h5 style="font-weight:bold">Riwayat SK</h5>
                    <table class="table table-bordered" style="margin-bottom:35px;">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Nomor SK</th>
                            <th scope="col">Tanggal SK</th>
                            <th scope="col">TMT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($riwayatsk as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->JABATAN }}</td>
                            <td>{{ $item->NOMOR_SK }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SK)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TMT_SK)->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h5 style="font-weight:bold">Riwayat Pendidikan Umum</h5>
                    <table class="table table-bordered" style="margin-bottom:35px;">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Tahun Lulus</th>
                            <th scope="col">STTB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($riwayatpendidikan as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NAMA_SEKOLAH }}</td>
                            <td>{{ $item->JURUSAN }}</td>
                            <td>{{ $item->TAHUN_LULUS }}</td>
                            <td>{{ $item->STTB }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h5 style="font-weight:bold">Diklat/Pelatihan</h5>
                    <table class="table table-bordered" style="margin-bottom:35px;">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Diklat</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Jumlah Jam</th>
                            <th scope="col">Penyelenggara</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($diklat as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NAMA_DIKLAT }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
                            <td>{{ $item->JUMLAH_JAM }}</td>
                            <td>{{ $item->PENYELENGGARA }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h5 style="font-weight:bold">Riwayat Keluarga</h5>
                    <table class="table table-bordered" style="margin-bottom:35px;">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($datakeluarga as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NAMA_KELUARGA }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y') }}</td>
                            <td>{{ $item->STATUS }}</td>
                            <td>{{ $item->PEKERJAAN }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th colspan="2">DATA PRIBADI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col" width="30%">KTP</th>
                                <td>{{ $datapribadi->NO_KTP }}</td>
                            </tr>
                            <tr>
                                <td scope="col">BPJS</th>
                                <td>{{ $datapribadi->NO_BPJS }}</td>
                            </tr>
                            <tr>
                                <td scope="col">NPWP</th>
                                <td>{{ $datapribadi->NO_NPWP }}</td>
                            </tr>
                            <tr>
                                <td scope="col">TINGGI BADAN</th>
                                <td>{{ $datapribadi->TINGGI_BADAN }}</td>
                            </tr>
                            <tr>
                                <td scope="col">BERAT BADAN</th>
                                <td>{{ $datapribadi->BERAT_BADAN }}</td>
                            </tr>
                            <tr>
                                <td scope="col">WARNA KULIT</th>
                                <td>{{ $datapribadi->WARNA_KULIT }}</td>
                            </tr>
                            <tr>
                                <td scope="col">GOLONGAN DARAH</th>
                                <td>{{ $datapribadi->GOLONGAN_DARAH }}</td>
                            </tr>
                            <tr>
                                <td scope="col">ALAMAT RUMAH</th>
                                <td>{{ $datapribadi->ALAMAT_RUMAH }}</td>
                            </tr>
                            <tr>
                                <td scope="col">KODE POS</th>
                                <td>{{ $datapribadi->KODE_POS }}</td>
                            </tr>
                            <tr>
                                <td scope="col">TELPON RUMAH</th>
                                <td>{{ $datapribadi->TELPON_RUMAH }}</td>
                            </tr>
                            <tr>
                                <td scope="col">NO HP</th>
                                <td>{{ $datapribadi->NO_HP }}</td>
                            </tr>
                            <tr>
                                <td scope="col">EMAIL</th>
                                <td>{{ $datapribadi->EMAIL }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-info no-print" value="print" onclick="window.print()">Print</button>
                    <a href="{{ url('/dashboardpegawai/'.$pegawai->id) }}" class="btn btn-danger no-print"> Kembali</a>
                    </div>
                </div>
            </div>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        @notifyJs
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>