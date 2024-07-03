@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updateuser/' . $users->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupUsername">Username</label>
                            <input type="text" class="form-control" id="formGroupUsername" placeholder="Masukan Username" name="username" value="{{ old('username', $users->username) }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupEmail">Email</label>
                            <input type="text" class="form-control" id="formGroupEmail" placeholder="Masukan Email" name="email" value="{{ old('email', $users->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupPassword">Password</label>
                            <input type="password" class="form-control" id="formGroupPassword" placeholder="Masukan Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/daftaruser') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection