@extends('layouts.app')

@section('content')
        <form action="{{ url('/addsifatsurat') }}"method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="formGroupExampleInput2">Sifat Surat</label>
                <input type="text" class="form-control @error('SIFAT_SURAT') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Masukan Sifat Surat" name="SIFAT_SURAT" value="{{ old('SIFAT_SURAT') }}">
                @error('SIFAT_SURAT')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
            <a href="{{ url('/sifatsurat') }}" class="btn btn-danger"> Kembali</a>
        </form>
@endsection