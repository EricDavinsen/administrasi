@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updateriwayatsk/'. $riwayatsk->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Jabatan</label>
                            <input type="text" class="form-control @error('JABATAN') is-invalid @enderror" id="formGroupExampleInput" name="JABATAN" placeholder="Masukan Jabatan" value="{{ old('JABATAN', $riwayatsk->JABATAN) }}">
                            @error('JABATAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor SK</label>
                            <input type="text" class="form-control @error('NOMOR_SK') is-invalid @enderror" id="formGroupExampleInput2" name="NOMOR_SK" placeholder="Masukan Nomor SK" value="{{ old('NOMOR_SK', $riwayatsk->NOMOR_SK) }}">
                            @error('NOMOR_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal SK</label>
                            <input type="date" class="form-control @error('TANGGAL_SK') is-invalid @enderror" id="formGroupExampleInput2" name="TANGGAL_SK" placeholder="Masukan Tanggal SK" value="{{ old('TANGGAL_SK', $riwayatsk->TANGGAL_SK) }}">
                            @error('TANGGAL_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">TMT</label>
                            <input type="date" class="form-control @error('TMT_SK') is-invalid @enderror" id="formGroupExampleInput2" name="TMT_SK" placeholder="Masukan TMT" value="{{ old('TMT_SK', $riwayatsk->TMT_SK) }}">
                            @error('TMT_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">FILE SK</label>
                            <input type="file" class="form-control @error('FILE_SK') is-invalid @enderror" id="formGroupExampleInput2" name="FILE_SK" placeholder="Masukan File">
                            @error('FILE_SK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/riwayatsk/'.$riwayatsk->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection