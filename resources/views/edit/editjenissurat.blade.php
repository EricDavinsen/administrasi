@extends('layouts.app')

@section('content')
    <form action="{{ url('/updatejenissurat/' . $jenissurat->id) }}"method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="formGroupExampleInput2">Jenis Surat</label>
            <input type="text" class="form-control @error('JENIS_SURAT') is-invalid @enderror" id="formGroupExampleInput3" placeholder="Masukan Jenis Surat" name="JENIS_SURAT" value="{{ old('JENIS_SURAT', $jenissurat->JENIS_SURAT) }}">
            @error('JENIS_SURAT')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="{{ url('/jenissurat') }}" class="btn btn-danger"> Kembali</a>
    </form>
@endsection