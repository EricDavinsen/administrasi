@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adduser') }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Password" name="password">
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/daftaruser') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection