@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updateriwayatpendidikan/'. $riwayatpendidikan->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nama Sekolah</label>
                            <input type="text" class="form-control @error('NAMA_SEKOLAH') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_SEKOLAH" placeholder="Masukan Nama Sekolah" value="{{ old('NAMA_SEKOLAH', $riwayatpendidikan->NAMA_SEKOLAH) }}">
                            @error('NAMA_SEKOLAH')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jurusan</label>
                            <input type="text" class="form-control @error('JURUSAN') is-invalid @enderror" id="formGroupExampleInput2" name="JURUSAN" placeholder="Masukan Jurusan" value="{{ old('JURUSAN', $riwayatpendidikan->JURUSAN) }}">
                            @error('JURUSAN')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput3">Tahun Lulus</label>
                            <input type="text" class="form-control @error('TAHUN_LULUS') is-invalid @enderror" id="formGroupExampleInput3" name="TAHUN_LULUS" placeholder="Masukan Tahun Lulus" value="{{ old('TAHUN_LULUS', $riwayatpendidikan->TAHUN_LULUS) }}">
                            @error('TAHUN_LULUS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput4">No STTB</label>
                            <input type="text" class="form-control @error('STTB') is-invalid @enderror" id="formGroupExampleInput4" name="STTB" placeholder="Masukan STTB" value="{{ old('STTB', $riwayatpendidikan->STTB) }}">
                            @error('STTB')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput5">IJAZAH SEKOLAH</label>
                            <input type="file" class="form-control @error('IJAZAH_SEKOLAH') is-invalid @enderror" id="formGroupExampleInput5" name="IJAZAH_SEKOLAH" placeholder="Masukan Ijazah">
                            @error('IJAZAH_SEKOLAH')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatpendidikan/'.$riwayatpendidikan->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection