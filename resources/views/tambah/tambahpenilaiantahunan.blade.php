@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addpenilaiantahunan/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput">Tahun Penilaian</label>
                            <input type="text" class="form-control @error('TAHUN_PENILAIAN') is-invalid @enderror" id="formGroupExampleInput" name="TAHUN_PENILAIAN" placeholder="Masukan Tahun Penilaian" value="{{ old('TAHUN_PENILAIAN') }}">
                            @error('TAHUN_PENILAIAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File Penilaian</label>
                            <input type="file" class="form-control @error('FILE_PENILAIAN') is-invalid @enderror" id="formGroupExampleInput2" name="FILE_PENILAIAN" placeholder="Masukan File Penilaian">
                            @error('FILE_PENILAIAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/penilaiantahunan/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection