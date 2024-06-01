@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddatabpjs/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nomor JKN</label>
                            <input type="text" class="form-control @error('NOMOR_JKN') is-invalid @enderror" id="formGroupExampleInput" name="NOMOR_JKN" placeholder="Masukan Nomor JKN" value="{{ old('NOMOR_JKN') }}">
                            @error('NOMOR_JKN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIK</label>
                            <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="formGroupExampleInput" name="NIK" placeholder="Masukan NIK" value="{{ old('NIK') }}">
                            @error('NIK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="formGroupExampleInput" name="NIP" placeholder="Masukan NIP" value="{{ old('NIP') }}">
                            @error('NIP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input type="text" class="form-control @error('NAMA_LENGKAP') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_LENGKAP" placeholder="Masukan Nama Lengkap" value="{{ old('NAMA_LENGKAP') }}">
                            @error('NAMA_LENGKAP')
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
                            <label for="formGroupExampleInput2">Status Kawin</label>
                            <select class="form-control @error('STATUS_KAWIN') is-invalid @enderror" name="STATUS_KAWIN">
                                <option value="" disabled selected hidden>Pilih Status Kawin</option>
                                <option>Kawin</option>
                                <option>Tidak Kawin</option>
                                <option>Cerai</option>
                            </select>
                            @error('STATUS_KAWIN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Hubungan Keluarga</label>
                            <select class="form-control @error('HUBUNGAN_KELUARGA') is-invalid @enderror" name="HUBUNGAN_KELUARGA">
                                <option value="" disabled selected hidden>Pilih Hubungan Keluarga</option>
                                <option>Suami</option>
                                <option>Anak</option>
                                <option>Istri</option>
                                <option>Pekerja</option>
                                <option>Tanggungan</option>
                            </select>
                            @error('HUBUNGAN_KELUARGA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('TANGGAL_LAHIR') is-invalid @enderror" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR">
                            @error('TANGGAL_LAHIR')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai TMT</label>
                            <input type="date" class="form-control @error('TANGGAL_MULAI_TMT') is-invalid @enderror" id="TANGGAL_MULAI_TMT" name="TANGGAL_MULAI_TMT">
                            @error('TANGGAL_MULAI_TMT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai TMT</label>
                            <input type="date" class="form-control @error('TANGGAL_SELESAI_TMT') is-invalid @enderror" id="TANGGAL_SELESAI_TMT" name="TANGGAL_SELESAI_TMT">
                            @error('TANGGAL_SELESAI_TMT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gaji Pokok</label>
                            <input type="text" class="form-control @error('GAJI_POKOK') is-invalid @enderror" id="formGroupExampleInput" name="GAJI_POKOK" placeholder="Masukan Gaji Pokok">
                            @error('GAJI_POKOK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Faskes</label>
                            <input type="text" class="form-control @error('NAMA_FASKES') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_FASKES" placeholder="Masukan Nama Fasilitas Kesehatan">
                            @error('NAMA_FASKES')
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
                        <a href="{{ url('/databpjs/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection