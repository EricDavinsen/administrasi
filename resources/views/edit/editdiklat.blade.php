@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatediklat/'. $diklat->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nama Diklat</label>
                            <input type="text" class="form-control @error('NAMA_DIKLAT') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_DIKLAT" placeholder="Masukan Nama Sekolah" value="{{ old('NAMA_DIKLAT', $diklat->NAMA_DIKLAT) }}">
                            @error('NAMA_DIKLAT')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Mulai</label>
                            <input type="date" class="form-control @error('TANGGAL_MULAI') is-invalid @enderror" id="formGroupExampleInput" name="TANGGAL_MULAI" placeholder="Masukan Tanggal Mulai" value="{{ old('TANGGAL_MULAI', $diklat->TANGGAL_MULAI) }}">
                            @error('TANGGAL_MULAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('TANGGAL_SELESAI') is-invalid @enderror" id="formGroupExampleInput" name="TANGGAL_SELESAI" placeholder="Masukan Tanggal Selesai" value="{{ old('TANGGAL_SELESAI', $diklat->TANGGAL_SELESAI) }}">
                            @error('TANGGAL_SELESAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jumlah Jam</label>
                            <input type="text" class="form-control @error('JUMLAH_JAM') is-invalid @enderror" id="formGroupExampleInput2" name="JUMLAH_JAM" placeholder="Masukan Jumlah Jam" value="{{ old('JUMLAH_JAM', $diklat->JUMLAH_JAM) }}">
                            @error('JUMLAH_JAM')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Penyelenggara</label>
                            <input type="text" class="form-control @error('PENYELENGGARA') is-invalid @enderror" id="formGroupExampleInput2" name="PENYELENGGARA" placeholder="Masukan Tahun Lulus" value="{{ old('PENYELENGGARA', $diklat->PENYELENGGARA) }}">
                            @error('PENYELENGGARA')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sertifikat</label>
                            <input type="file" class="form-control @error('SERTIFIKAT') is-invalid @enderror" id="formGroupExampleInput2" name="SERTIFIKAT">
                            @error('SERTIFIKAT')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/diklat/'.$diklat->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection