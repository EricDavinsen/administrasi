@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddatakeluarga/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nama Keluarga</label>
                            <input type="text" class="form-control @error('NAMA_KELUARGA') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_KELUARGA" placeholder="Masukan Nama Keluarga">
                            @error('NAMA_KELUARGA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('TANGGAL_LAHIR') is-invalid @enderror" id="formGroupExampleInput2" name="TANGGAL_LAHIR" placeholder="Masukan Tanggal Lahir">
                            @error('TANGGAL_LAHIR')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control @error('JENIS_KELAMIN') is-invalid @enderror" name="JENIS_KELAMIN">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                            @error('JENIS_KELAMIN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status</label>
                            <select class="form-control @error('STATUS') is-invalid @enderror" name="STATUS">
                                <option value="" disabled selected hidden>Pilih Status</option>
                                <option @if(old('STATUS') == "Suami") selected @endif>Suami</option>
                                <option @if(old('STATUS') == "Istri") selected @endif>Istri</option>
                                <option @if(old('STATUS') == "Anak") selected @endif>Anak</option>
                                <option @if(old('STATUS') == "Orang Tua") selected @endif>Orang Tua</option>
                                <option @if(old('STATUS') == "Pekerja") selected @endif>Pekerja</option>
                                <option @if(old('STATUS') == "Tanggungan") selected @endif>Tanggungan</option>
                            </select>
                            @error('STATUS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Pekerjaan</label>
                            <input type="text" class="form-control @error('PEKERJAAN') is-invalid @enderror" id="formGroupExampleInput2" name="PEKERJAAN" placeholder="Masukan Pekerjaan">
                            @error('PEKERJAAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">No Telepon</label>
                            <input type="text" class="form-control @error('NO_TELEPON') is-invalid @enderror" id="formGroupExampleInput" name="NO_TELEPON" placeholder="Masukan Nomor Telepon">
                            @error('NO_TELEPON')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datakeluarga/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection