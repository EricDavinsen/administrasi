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
                        <a class="nav-link" href="{{ url('dashboardpage') }}">Dashboard</a>
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

        <div class="surat_container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="2000">
        <h1 class="h3 text-gray-800">Jenis Surat</h1>
            <div class="d-flex w-100">
                <div class="action-buttons mt-4 mb-3">
                    <a href="{{ url('/createjenissurat') }}" class="btn btn-md btn-success">
                        <div class="d-flex gap-2">
                            <box-icon name='add-to-queue' animation='tada-hover' color='white'></box-icon>
                            Tambah
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @include('tabel/tabeljenissurat',$jenissurat)
                
        @foreach ($jenissurat as $data)
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
                        <form action="{{ url('/deletejenissurat/'.$data->id) }}" method="POST">
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