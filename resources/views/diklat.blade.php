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
                <li class="nav-item active">
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

    <div class="surat_container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
        <h1 class="h3 mb-0 text-gray-800 mb-2">Diklat / Pelatihan</h1>
        <div class="d-flex w-100 justify-content-start pegawai-button gap-3 mb-3">
            <a href="{{ url('/creatediklat/'.$pegawai->id) }}" class="btn btn-md btn-success">
                <div class="d-flex gap-2">
                    <box-icon name='add-to-queue' animation='tada-hover' color='white'></box-icon>
                    Tambah
                </div>
            </a>
            <a href="{{ url('/exportdiklat/'.$pegawai->id) }}" class="btn btn-md btn-warning text-white">
                <div class="d-flex gap-2">
                    <box-icon name='export' animation='tada-hover' color='white'></box-icon>
                    Export
                </div>
            </a>
            <a href="{{ url('/dashboardpegawai/'.$pegawai->id) }}" class="btn btn-md btn-info">
                <div class="d-flex gap-2">
                    <box-icon name='arrow-back' color="white" animation='tada-hover'></box-icon>
                    <span>Kembali</span>
                </div>
            </a>
        </div>
    </div>
    @include ('tabel/tabeldiklat', $diklat)
    @foreach ($diklat as $data)
        <div class="modal fade" id="exampleModalCenters-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content vh-100">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sertifikat Diklat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="/document/{{$data->SERTIFIKAT}}" class="h-100 w-100 overflow-scroll"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <form action="{{ url('/deletediklat/'.$data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection