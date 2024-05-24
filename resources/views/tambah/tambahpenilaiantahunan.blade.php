@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addpenilaiantahunan/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tahun Penilaian</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="TAHUN_PENILAIAN" placeholder="Masukan Tahun Penilaian">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File Penilaian</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_PENILAIAN" placeholder="Masukan File Penilaian">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/penilaiantahunan/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection