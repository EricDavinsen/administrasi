@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addriwayatsk/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                            <input type="text" class="form-control @error('JABATAN') is-invalid @enderror" id="formGroupExampleInput" name="JABATAN" placeholder="Masukan Jabatan">
                            @error('JABATAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor SK</label>
                            <input type="text" class="form-control @error('NOMOR_SK') is-invalid @enderror" id="formGroupExampleInput2" name="NOMOR_SK" placeholder="Masukan Nomor SK">
                            @error('NOMOR_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal SK</label>
                            <input type="date" class="form-control @error('TANGGAL_SK') is-invalid @enderror" id="formGroupExampleInput2" name="TANGGAL_SK" placeholder="Masukan Tanggal SK">
                            @error('TANGGAL_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">TMT</label>
                            <input type="date" class="form-control @error('TMT_SK') is-invalid @enderror" id="formGroupExampleInput2" name="TMT_SK" placeholder="Masukan TMT SK">
                            @error('TMT_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File SK</label>
                            <input type="file" class="form-control @error('FILE_SK') is-invalid @enderror" id="formGroupExampleInput2" name="FILE_SK" placeholder="Masukan File SK">
                            @error('FILE_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatsk/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection