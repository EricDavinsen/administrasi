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
                    <li class="nav-item active">
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
    <h1 class="h3 text-gray-800">Surat Masuk</h1>
        <div class="d-flex w-100 justify-content-between mb-3">
            <div class="action-buttons mt-4">
                <a href="{{ url('/createsuratmasuk') }}" class="btn btn-md btn-success">Tambah</a>
                &nbsp;
                <a href="{{ url('/exportsuratmasuk') }}" class="btn btn-md btn-info">Export</a>
            </div>
            <form method="GET" action="/filter">
                <div class="d-flex item-content-center gap-3">
                    <div class="start_data">
                        <label> Start Date: </label>
                        <input type="date" name="start_date" class="form-control">
                    </div>

                    <div class="end_date">
                        <label> End Date: </label>
                        <div class="d-flex gap-3">
                            <input type="date" name="end_date" class="form-control">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>      
    @include('tabel/tabelsuratmasuk', $suratmasuk)
    @foreach ($suratmasuk as $data)
        <div class="modal fade" id="exampleModalCenters-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content vh-100">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">File Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="/document/{{$data->FILE_SURAT}}" class="h-100 w-100 overflow-scroll"></iframe>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{ url('/deletesuratmasuk/'.$data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach   
@endsection