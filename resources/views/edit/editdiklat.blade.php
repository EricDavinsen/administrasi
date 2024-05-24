@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatediklat/'. $diklat->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Diklat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_DIKLAT" placeholder="Masukan Nama Sekolah" value="{{ $diklat->NAMA_DIKLAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" name="TANGGAL_MULAI" placeholder="Masukan Tanggal Mulai" value="{{ $diklat->TANGGAL_MULAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" name="TANGGAL_SELESAI" placeholder="Masukan Tanggal Selesai" value="{{ $diklat->TANGGAL_SELESAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jumlah Jam</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JUMLAH_JAM" placeholder="Masukan Jumlah Jam" value="{{ $diklat->JUMLAH_JAM }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Penyelenggara</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="PENYELENGGARA" placeholder="Masukan Tahun Lulus" value="{{ $diklat->PENYELENGGARA }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sertifikat</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="SERTIFIKAT"  value="{{ $diklat->SERTIFIKAT }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/diklat/'.$diklat->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection