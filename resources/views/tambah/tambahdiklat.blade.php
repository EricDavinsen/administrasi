@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddiklat/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Diklat</label>
                            <input type="text" class="form-control @error('NAMA_DIKLAT') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_DIKLAT" placeholder="Masukan Nama Diklat">
                            @error('NAMA_DIKLAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai</label>
                            <input type="date" class="form-control @error('TANGGAL_MULAI') is-invalid @enderror" id="formGroupExampleInput2" name="TANGGAL_MULAI" placeholder="Masukan Tanggal Mulai">
                            @error('TANGGAL_MULAI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('TANGGAL_SELESAI') is-invalid @enderror" id="formGroupExampleInput2" name="TANGGAL_SELESAI" placeholder="Masukan Tanggal Selesai">
                            @error('TANGGAL_SELESAI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jumlah Jam</label>
                            <input type="text" class="form-control @error('JUMLAH_JAM') is-invalid @enderror" id="formGroupExampleInput2" name="JUMLAH_JAM" placeholder="Masukan Jumlah Jam">
                            @error('JUMLAH_JAM')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Penyelenggara</label>
                            <input type="text" class="form-control @error('PENYELENGGARA') is-invalid @enderror" id="formGroupExampleInput2" name="PENYELENGGARA" placeholder="Masukan Penyelenggara">
                            @error('PENYELENGGARA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sertifikat</label>
                            <input type="file" class="form-control @error('SERTIFIKAT') is-invalid @enderror" id="formGroupExampleInput2" name="SERTIFIKAT" placeholder="Masukan Sertifikat">
                            @error('SERTIFIKAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/diklat/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection