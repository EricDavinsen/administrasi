@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updateriwayatsk/'. $riwayatsk->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="JABATAN" placeholder="Masukan Jabatan" value="{{ $riwayatsk->JABATAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor SK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NOMOR_SK" placeholder="Masukan Nomor SK" value="{{ $riwayatsk->NOMOR_SK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal SK</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_SK" placeholder="Masukan Tanggal SK" value="{{ $riwayatsk->TANGGAL_SK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">TMT</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TMT_SK" placeholder="Masukan TMT" value="{{ $riwayatsk->TMT_SK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">FILE SK</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SK" placeholder="Masukan File" value="{{ $riwayatsk->FILE_SK }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatsk/'.$riwayatsk->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection