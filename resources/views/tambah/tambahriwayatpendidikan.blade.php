@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addriwayatpendidikan/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nama Sekolah</label>
                            <input type="text" class="form-control @error('NAMA_SEKOLAH') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_SEKOLAH" placeholder="Masukan Nama Sekolah">
                            @error('NAMA_SEKOLAH')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jurusan</label>
                            <input type="text" class="form-control @error('JURUSAN') is-invalid @enderror" id="formGroupExampleInput2" name="JURUSAN" placeholder="Masukan Jurusan">
                            @error('JURUSAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tahun Lulus</label>
                            <input type="text" class="form-control @error('TAHUN_LULUS') is-invalid @enderror" id="formGroupExampleInput2" name="TAHUN_LULUS" placeholder="Masukan Tahun Lulus">
                            @error('TAHUN_LULUS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">STTB</label>
                            <input type="text" class="form-control @error('STTB') is-invalid @enderror" id="formGroupExampleInput2" name="STTB" placeholder="Masukan STTB">
                            @error('STTB')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Ijazah</label>
                            <input type="file" class="form-control @error('IJAZAH_SEKOLAH') is-invalid @enderror" id="formGroupExampleInput2" name="IJAZAH_SEKOLAH" placeholder="Masukan Ijazah">
                            @error('IJAZAH_SEKOLAH')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatpendidikan/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection