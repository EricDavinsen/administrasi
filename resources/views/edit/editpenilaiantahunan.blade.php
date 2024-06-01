@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatepenilaiantahunan/'. $penilaiantahunan->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Tahun Penilaian</label>
                            <input type="text" class="form-control @error('TAHUN_PENILAIAN') is-invalid @enderror" id="formGroupExampleInput" name="TAHUN_PENILAIAN" placeholder="Masukan Tahun Penilaian" value="{{ old('TAHUN_PENILAIAN', $penilaiantahunan->TAHUN_PENILAIAN) }}">
                            @error('TAHUN_PENILAIAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">FILE PENILAIAN</label>
                            <input type="file" class="form-control @error('FILE_PENILAIAN') is-invalid @enderror" id="formGroupExampleInput2" name="FILE_PENILAIAN" placeholder="Masukan File">
                            @error('FILE_PENILAIAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/penilaiantahunan/'.$penilaiantahunan->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection