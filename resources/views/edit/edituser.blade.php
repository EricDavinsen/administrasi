@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updateuser/' . $users->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Username" name="username" value="{{ $users->username }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Email" name="email" value="{{ $users->email }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Password" name="password" value="{{ $users->password }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/daftaruser') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection