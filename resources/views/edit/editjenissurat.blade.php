@extends('layouts.app')

@section('content')
    <form action="{{ url('/updatejenissurat/' . $jenissurat->id) }}"method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="formGroupExampleInput2">Jenis Surat</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Jenis Surat" name="JENIS_SURAT" value="{{ $jenissurat->JENIS_SURAT }}">
        </div>
        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        <a href="{{ url('/jenissurat') }}" class="btn btn-danger"> Kembali</a>
    </form>
@endsection