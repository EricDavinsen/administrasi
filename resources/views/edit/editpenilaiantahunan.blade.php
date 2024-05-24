@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatepenilaiantahunan/'. $penilaiantahunan->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tahun Penilaian</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="TAHUN_PENILAIAN" placeholder="Masukan Tahun Penilaian" value="{{ $penilaiantahunan->TAHUN_PENILAIAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">FILE PENILAIAN</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_PENILAIAN" placeholder="Masukan File" value="{{ $penilaiantahunan->FILE_PENILAIAN }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/penilaiantahunan/'.$penilaiantahunan->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection