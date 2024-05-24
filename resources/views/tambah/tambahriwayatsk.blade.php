@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addriwayatsk/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="JABATAN" placeholder="Masukan Jabatan">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor SK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NOMOR_SK" placeholder="Masukan Nomor SK">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal SK</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_SK" placeholder="Masukan Tanggal SK">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">TMT</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TMT_SK" placeholder="Masukan TMT SK">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File SK</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SK" placeholder="Masukan File SK">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatsk/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection