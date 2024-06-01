@extends('layouts.app')

@section('content')
    <form action="{{ url('/updatesifatsurat/' . $sifatsurat->id) }}"method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="formGroupExampleInput3">Sifat Surat</label>
                <input type="text" class="form-control @error('SIFAT_SURAT') is-invalid @enderror" id="formGroupExampleInput3" placeholder="Masukan Sifat Surat" name="SIFAT_SURAT" value="{{ old('SIFAT_SURAT', $sifatsurat->SIFAT_SURAT) }}">
                @error('SIFAT_SURAT')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="{{ url('/sifatsurat') }}" class="btn btn-danger"> Kembali</a>
    </form>
@endsection