@extends('layouts.app')

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
                            <li class="nav-item">
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/cetakinformasi/'.$pegawai->id) }}">Cetak Informasi</a>
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
                            <h5>: {{ $pegawai->JABATAN_PEGAWAI }}</h5>
                            <h5>: {{ $pegawai->JENIS_PEGAWAI }}</h5>
                            <h5>: {{ $pegawai->PENDIDIKAN_TERAKHIR }}</h5>
                            <h5>: {{ $pegawai->STATUS_PEGAWAI }}</h5>
                            <h5>: {{ $pegawai->KEDUDUKAN }}</h5>
                        </div>
                        <div class="foto-pegawai" style="position:absolute; right:0; top:0;">
                            <img src="{{ asset('images/' . $pegawai->FOTO_PEGAWAI) }}" alt="fotopegawai" style="width: 200px; height: 200px;">
                        </div> 
                    </div>

                    @if($riwayatsk != null && count($riwayatsk) > 0)
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
                    @endif

                    @if($riwayatpendidikan != null && count($riwayatpendidikan) > 0)
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
                    @endif

                    @if($diklat != null && count($diklat) > 0)
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
                    @endif

                    @if($datakeluarga != null && count($datakeluarga) > 0)
                        <h5 style="font-weight:bold">Riwayat Keluarga</h5>
                        <table class="table table-bordered" style="margin-bottom:35px;">
                            <thead class="text-center">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">No. Telepon</th>
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
                                <td>{{ $item->JENIS_KELAMIN }}</td>
                                <td>{{ $item->STATUS }}</td>
                                <td>{{ $item->PEKERJAAN }}</td>
                                <td>{{ $item->NO_TELEPON }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if($datapribadi != null)
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
                    @endif

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-info no-print" value="print" onclick="window.print()">
                            <div class="d-flex gap-2">
                                <box-icon name='printer' animation='tada-hover' color='white'></box-icon>
                                <span>Print</span>
                            </div>
                        </button>
                        <a href="{{ url('/dashboardpegawai/'.$pegawai->id) }}" class="btn btn-danger no-print">
                        <div class="d-flex gap-2">
                                <box-icon name='arrow-back' color="white" animation='tada-hover'></box-icon>
                                <span>Kembali</span>
                            </div>
                        </a>
                    </div>
@endsection