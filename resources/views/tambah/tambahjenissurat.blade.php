@extends('layouts.app')

@section('content')
        <form action="{{ url('/addjenissurat') }}"method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="formGroupExampleInput2">Jenis Surat</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Jenis Surat" name="JENIS_SURAT">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
            <a href="{{ url('/jenissurat') }}" class="btn btn-danger"> Kembali</a>
        </form>
@endsection