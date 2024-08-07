@extends('layouts.appdashboard')

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
                    @if ($users->role == 'admin')
                    <li class="nav-item active">
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('datapegawai') }}">Daftar Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('datapegawai') }}">Daftar User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('events') }}">Agenda</a>
                    </li>

                    @else

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('dashboardpage') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('events') }}">Agenda</a>
                    </li>
                    
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="notification">
    <x-notify::notify />
    </div>
    <div class="container-fluid" data-aos="fade-down" data-aos-delay="50" data-aos-duration="2000">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 font-weight-bold" style="font-size: 35px; color:white">Dashboard</h1>
    <h5 class="mb-0" style="color:#2dcc14; font-weight: bold">User : {{ $users->username }}</h5>
    </div>

    @if ($users->role == 'admin')
    <!-- Content Row -->
    <div class="row">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 p-3">
            <a href="{{ url('events') }}" class="agenda-card-link">
                <div class="agenda_card card p-5" style="background-color: #343a40; color: white;">
                    <div class="d-flex justify-content-between">
                        <box-icon name='calendar-exclamation' size='lg' color='white' animation='tada-hover'></box-icon>
                        <h3 class="text-center" style="font-weight:bold; color: white">Agenda Harian</h3>
                        <box-icon name='bell' type='solid' size='lg' color='white' animation='tada-hover'></box-icon>
                    </div>
                    <hr class="garis_title">
                    <div class="card-body row">
                        @if (count($events) == 0)
                        <h5 class="text-center" style="color: white">~ Tidak ada agenda pada hari ini ~</h5>
                        @endif
                        @foreach($events as $event)
                        <div class="event-list col-6 mb-3">
                            <p style="font-size: 18px;">
                                <strong>{{ $loop->iteration }}.</strong> <br>
                                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }} s.d {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }} <br>
                                <strong>Acara:</strong> {{ $event->title }} <br>
                                <strong>Waktu:</strong> {{ $event->start_time }} - {{ $event->end_time }} <br>
                                <strong>Tempat:</strong> {{ $event->location }} <br>
                                <strong>Disposisi:</strong> {{ $event->disposition }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('suratmasuk') }}">
                <div class="surat_card card">
                        <div class="item_container">
                            <div class="jumlah_item">{{ $suratmasuk }}</div>
                        </div>

                    <div class="card-body text-center">
                        <i class="fa-solid fa-envelope fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Surat Masuk</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu surat masuk.</p>
                    </div>
                </div>                         
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('suratkeluar') }}">
                <div class="surat_card card">
                    <div class="jumlah_item">{{ $suratkeluar }}</div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-envelope-open-text fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Surat Keluar</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu surat keluar.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('suratcuti') }}">
                <div class="surat_card card">
                <div class="jumlah_item">{{ $suratcuti }}</div>
                    <div class="card-body text-center">
                        <i class="fa-regular fa-envelope-open fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Surat Cuti</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu surat cuti.</p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('spt') }}">
                <div class="surat_card card">
                <div class="jumlah_item">{{ $spt }}</div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-circle-exclamation fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Surat Perintah Tugas</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu surat spt.</p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('disposisi') }}">
                <div class="surat_card card">
                <div class="jumlah_item">{{ $disposisi}}</div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-envelopes-bulk fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Disposisi</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu disposisi.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('datapegawai') }}">
                <div class="surat_card card">
                <div class="jumlah_item">{{ $pegawai }}</div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-users fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Daftar Pegawai</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu pegawai.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('daftaruser') }}">
                <div class="surat_card card">
                <div class="jumlah_item">{{ $user }}</div>
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Daftar User</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu daftar user.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('events') }}">
                <div class="surat_card card">    
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Agenda</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu agenda.</p>
                    </div>
                </div>
            </a>
        </div>
        @else

        <div class="col-xs-12 col-sm-12 col-md-12 p-3">
            <div class="agenda_card card p-5" style="background-color: #343a40; color: white;">
                <div class="d-flex justify-content-between">
                    <i class="fa-solid fa-calendar-days text-gray-300" style="font-size: 50px"></i>
                    <h3 class="text-center" style="font-weight:bold; color: white">Agenda Mingguan</h3>
                    <i class="fa-solid fa-calendar-days text-gray-300" style="font-size: 50px"></i>
                </div>
                <hr class="garis_title">
                <div class="card-body row">
                    @if (count($events) == 0)
                        <h5 class="text-center" style="color: #00ff15">~ Tidak ada agenda minggu ini ~</h5>
                    @endif
                    @foreach($events as $event)
                        <div class="event-list col-6 mb-3">
                            <p style="font-size: 18px;">
                                <strong>{{ $loop->iteration }}.</strong> <br>
                                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }} s.d {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }} <br>
                                <strong>Acara:</strong> {{ $event->title }} <br>
                                <strong>Waktu:</strong> {{ $event->start_time }} - {{ $event->end_time }} <br>
                                <strong>Tempat:</strong> {{ $event->location }} <br>
                                <strong>Disposisi:</strong> {{ $event->disposition }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 p-3">
            <a href = "{{ url('events') }}">
                <div class="surat_card card">    
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar fa-2x text-gray-300" style="font-size: 130px"></i>
                        <h4 class="card-title">Agenda</h4>
                        <p class="card-text p-3">Tekan untuk menuju ke menu agenda.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
@endsection