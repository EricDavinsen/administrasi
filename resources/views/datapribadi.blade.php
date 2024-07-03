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
                <li class="nav-item active">
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
    <div class="surat_container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
        <h1 class="h3 mb-0 text-gray-800 mb-2 no-print">Data Pribadi</h1>
        <div class="d-flex w-100 justify-content-end pegawai-button mb-3 gap-3">
            <button type="submit" class="btn btn-success no-print" value="print" onclick="window.print()">
                <div class="d-flex gap-2">
                    <box-icon name='printer' animation='tada-hover' color='white'></box-icon>
                    <span>Print</span>
                </div>
            </button>
            <a href="{{ url('/editdatapribadi/' . $datapribadi->pegawai_id) }}" class="btn btn-md btn-warning no-print" style="color:white">
                <div class="d-flex gap-2">
                    <box-icon type='solid' name='edit' color="white" animation='tada-hover'></box-icon>
                    <span>Edit</span>
                </div>
            </a>
            <a class="btn btn-danger text-white no-print" data-toggle="modal" data-target="#deleteModal{{$datapribadi->id}}">
                <div class="d-flex gap-2">
                    <box-icon type='solid' name='trash-alt' color="white" animation='tada-hover'></box-icon>
                    <span>Hapus</span>
                </div>
            </a>
            <a href="{{ url('/dashboardpegawai/' . $datapribadi->pegawai_id) }}" class="btn btn-md btn-info no-print" style="color:white">
                <div class="d-flex gap-2">
                    <box-icon name='arrow-back' color="white" animation='tada-hover'></box-icon>
                    <span>Kembali</span>
                </div>
            </a>
        </div>
    </div>
    @include ('tabel/tabeldatapribadi', $datapribadi)
    <div class="modal fade" id="deleteModal{{$datapribadi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <form action="{{ url('/deletedatapribadi/'.$datapribadi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection