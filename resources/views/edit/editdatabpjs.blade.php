@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedatabpjs/'. $databpjs->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nomor JKN</label>
                            <input type="text" class="form-control @error('NOMOR_JKN') is-invalid @enderror" id="formGroupExampleInput" name="NOMOR_JKN" placeholder="Masukan Nomor JKN" value="{{ old('NOMOR_JKN', $databpjs->NOMOR_JKN) }}">
                            @error('NOMOR_JKN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIK</label>
                            <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="formGroupExampleInput" name="NIK" placeholder="Masukan NIK" value="{{ old('NIK', $databpjs->NIK) }}">
                            @error('NIK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="formGroupExampleInput" name="NIP" placeholder="Masukan NIP" value="{{ old('NIP', $databpjs->NIP) }}">
                            @error('NIP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input type="text" class="form-control @error('NAMA_LENGKAP') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_LENGKAP" placeholder="Masukan Nama Lengkap" value="{{ old('NAMA_LENGKAP', $databpjs->NAMA_LENGKAP) }}">
                            @error('NAMA_LENGKAP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control @error('JENIS_KELAMIN') is-invalid @enderror" name="JENIS_KELAMIN">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option @if(old('JENIS_KELAMIN', $databpjs->JENIS_KELAMIN) == "Laki-Laki") selected @endif>Laki-Laki</option>
                                <option @if(old('JENIS_KELAMIN', $databpjs->JENIS_KELAMIN) == "Perempuan") selected @endif>Perempuan</option>
                            </select>
                            @error('JENIS_KELAMIN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status Kawin</label>
                            <select class="form-control @error('STATUS_KAWIN') is-invalid @enderror" name="STATUS_KAWIN">
                                <option value="" disabled selected hidden>Pilih Status Kawin</option>
                                <option @if(old('STATUS_KAWIN', $databpjs->STATUS_KAWIN) == "Kawin") selected @endif>Kawin</option>
                                <option @if(old('STATUS_KAWIN', $databpjs->STATUS_KAWIN) == "Tidak Kawin") selected @endif>Tidak Kawin</option>
                                <option @if(old('STATUS_KAWIN', $databpjs->STATUS_KAWIN) == "Cerai") selected @endif>Cerai</option>
                            </select>
                            @error('STATUS_KAWIN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Hubungan Keluarga</label>
                            <select class="form-control @error('HUBUNGAN_KELUARGA') is-invalid @enderror" name="HUBUNGAN_KELUARGA">
                                <option value="" disabled selected hidden>Pilih Hubungan Keluarga</option>
                                <option @if(old('HUBUNGAN_KELUARGA', $databpjs->HUBUNGAN_KELUARGA) == "Suami") selected @endif>Suami</option>
                                <option @if(old('HUBUNGAN_KELUARGA', $databpjs->HUBUNGAN_KELUARGA) == "Anak") selected @endif>Anak</option>
                                <option @if(old('HUBUNGAN_KELUARGA', $databpjs->HUBUNGAN_KELUARGA) == "Istri") selected @endif>Istri</option>
                                <option @if(old('HUBUNGAN_KELUARGA', $databpjs->HUBUNGAN_KELUARGA) == "Pekerja") selected @endif>Pekerja</option>
                                <option @if(old('HUBUNGAN_KELUARGA', $databpjs->HUBUNGAN_KELUARGA) == "Tanggungan") selected @endif>Tanggungan</option>
                            </select>
                            @error('HUBUNGAN_KELUARGA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="TANGGAL_LAHIR">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('TANGGAL_LAHIR') is-invalid @enderror" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="{{ old('TANGGAL_LAHIR', $databpjs->TANGGAL_LAHIR) }}">
                            @error('TANGGAL_LAHIR')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="TANGGAL_MULAI_TMT">Tanggal Mulai TMT</label>
                            <input type="date" class="form-control @error('TANGGAL_MULAI_TMT') is-invalid @enderror" id="TANGGAL_MULAI_TMT" name="TANGGAL_MULAI_TMT" value="{{ old('TANGGAL_MULAI_TMT', $databpjs->TANGGAL_MULAI_TMT) }}">
                            @error('TANGGAL_MULAI_TMT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="TANGGAL_SELESAI_TMT">Tanggal Selesai TMT</label>
                            <input type="date" class="form-control @error('TANGGAL_SELESAI_TMT') is-invalid @enderror" id="TANGGAL_SELESAI_TMT" name="TANGGAL_SELESAI_TMT" value="{{ old('TANGGAL_SELESAI_TMT', $databpjs->TANGGAL_SELESAI_TMT) }}">
                            @error('TANGGAL_SELESAI_TMT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gaji Pokok</label>
                            <input type="text" class="form-control @error('GAJI_POKOK') is-invalid @enderror" id="formGroupExampleInput" name="GAJI_POKOK" placeholder="Masukan Gaji Pokok" value="{{ old('GAJI_POKOK', $databpjs->GAJI_POKOK) }}">
                            @error('GAJI_POKOK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Faskes</label>
                            <input type="text" class="form-control @error('NAMA_FASKES') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_FASKES" placeholder="Masukan Nama Fasilitas Kesehatan" value="{{ old('NAMA_FASKES', $databpjs->NAMA_FASKES) }}">
                            @error('NAMA_FASKES')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">No Telepon</label>
                            <input type="text" class="form-control @error('NO_TELEPON') is-invalid @enderror" id="formGroupExampleInput" name="NO_TELEPON" placeholder="Masukan Nomor Telepon" value="{{ old('NO_TELEPON', $databpjs->NO_TELEPON) }}">
                            @error('NO_TELEPON')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/databpjs/'.$databpjs->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection