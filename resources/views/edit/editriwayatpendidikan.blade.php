@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updateriwayatpendidikan/'. $riwayatpendidikan->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Sekolah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_SEKOLAH" placeholder="Masukan Nama Sekolah" value="{{ $riwayatpendidikan->NAMA_SEKOLAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jurusan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JURUSAN" placeholder="Masukan Jurusan" value="{{ $riwayatpendidikan->JURUSAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tahun Lulus</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TAHUN_LULUS" placeholder="Masukan Tahun Lulus" value="{{ $riwayatpendidikan->TAHUN_LULUS }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">STTB</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="STTB" placeholder="Masukan STTB" value="{{ $riwayatpendidikan->STTB }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">IJAZAH SEKOLAH</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="IJAZAH_SEKOLAH" placeholder="Masukan Ijazah" value="{{ $riwayatpendidikan->IJAZAH_SEKOLAH }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatpendidikan/'.$riwayatpendidikan->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection