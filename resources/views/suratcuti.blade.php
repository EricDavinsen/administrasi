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
                <li class="nav-item active">
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
        <h1 class="h3 text-gray-800 ">Surat Cuti</h1>
        <div class="d-flex w-100 mb-3">
            <div class="action-buttons mt-4">
                <a href="{{ url('/createsuratcuti') }}" class="btn btn-md btn-success">
                    <div class="d-flex gap-2">
                        <box-icon name='add-to-queue' animation='tada-hover' color='white'></box-icon>
                        Tambah
                    </div>
                </a>
                &nbsp;
                <a href="{{ url('/exportsuratcuti') }}" class="btn btn-md btn-info">
                    <div class="d-flex gap-2">
                        <box-icon name='export' animation='tada-hover' color='white'></box-icon>
                        Export
                    </div>
                </a>

                <button class="ml-2 btn btn-dark" onclick="showConfirmationModal()" style="color:white; width: 230px; font-size: 15px; text-center">
                    <div class="d-flex gap-2">
                        <box-icon name='reset' color="white" animation='tada-hover'></box-icon>
                        <span>Reset Sisa Cuti Pegawai</span>
                    </div>
                </button> 
            </div>
        </div>
    </div>
    @include('tabel/tabelsuratcuti', $suratcuti)       
    @foreach ($suratcuti as $data)
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <form action="{{ url('/deletesuratcuti/'.$data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda ingin mereset jumlah cuti tahunan semua pegawai?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="confirmResetBtn">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showConfirmationModal() {
                $('#confirmationModal').modal('show');
            }

            $('#confirmResetBtn').click(function() {
                window.location.href = "{{ url('/resetall') }}";
            });
        </script>
    @endforeach
@endsection