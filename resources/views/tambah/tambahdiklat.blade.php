@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddiklat/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Diklat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_DIKLAT" placeholder="Masukan Nama Diklat">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_MULAI" placeholder="Masukan Tanggal Mulai">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tahun Selesai</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_SELESAI" placeholder="Masukan Tanggal Selesai">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jumlah Jam</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JUMLAH_JAM" placeholder="Masukan Jumlah Jam">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Penyelenggara</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="PENYELENGGARA" placeholder="Masukan Penyelenggara">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sertifikat</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="SERTIFIKAT" placeholder="Masukan Sertifikat">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/diklat/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection