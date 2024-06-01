@extends('layouts.app')

@section('content')
        <form action="{{ url('/addjenissurat') }}"method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="formGroupExampleInput2">Jenis Surat</label>
                <input type="text" class="form-control @error('JENIS_SURAT') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Masukan Jenis Surat" name="JENIS_SURAT" value="{{ old('JENIS_SURAT') }}">
                @error('JENIS_SURAT')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
            <a href="{{ url('/jenissurat') }}" class="btn btn-danger"> Kembali</a>
        </form>
@endsection