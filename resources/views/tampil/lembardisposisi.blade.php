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
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('disposisi') }}">Disposisi</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </nav>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th colspan="12" class="text-center"><b style="font-size:18px;">LEMBAR DISPOSISI<b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" >Kode Surat: </br> {{ $disposisi->surat->KODE_SURAT }}</td>
                                <td colspan="4" >Sifat Surat: </br> {{ $disposisi->surat->sifat->SIFAT_SURAT }}</td>
                                <td colspan="4" >Jenis Surat: </br> {{ $disposisi->surat->jenis->JENIS_SURAT }}</td>
                            </tr>
                            <tr>
                                <td colspan="12" >Perihal: </br>{{ $disposisi->surat->PERIHAL_SURAT }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" >Asal: </br>{{ $disposisi->surat->ASAL_SURAT }}</td>
                                <td colspan="4" >Tanggal: </br> {{ \Carbon\Carbon::parse($disposisi->surat->TANGGAL_SURAT)->format('d-m-Y') }}</td>
                                <td colspan="4" >Nomor Surat: </br>{{ $disposisi->surat->NOMOR_SURAT }}</td>
                            </tr>
                            <tr>
                                <td colspan="12">Nama : 
                                    @foreach ($disposisi->pegawais as $pegawai)
                                        {{ $pegawai->NAMA_PEGAWAI }}@if (!$loop->last), @endif
                                    @endforeach
                                    <br>
                                    Instruksi : {{ $disposisi->INSTRUKSI }}
                                </td>
                            </tr>
                        </tbody>    
                    </table>
                    <button type="submit" class="btn btn-info no-print" value="print" onclick="window.print()">
                        <div class="d-flex gap-2">
                            <box-icon name='printer' animation='tada-hover' color='white'></box-icon>
                            <span>Print</span>
                        </div>
                    </button>
                    <a href="{{ url('/disposisi') }}" class="btn btn-danger no-print">
                        <div class="d-flex gap-2">
                            <box-icon name='arrow-back' color="white" animation='tada-hover'></box-icon>
                            <span>Kembali</span>
                        </div>
                    </a>
@endsection