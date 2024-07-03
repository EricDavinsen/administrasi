@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adduser') }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupUsername">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="formGroupUsername" placeholder="Masukan Username" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupEmail">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="formGroupEmail" placeholder="Masukan Email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupPassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="formGroupPassword" placeholder="Masukan Password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/daftaruser') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection