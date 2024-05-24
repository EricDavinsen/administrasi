@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedatabpjs/'. $databpjs->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nomor JKN</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NOMOR_JKN" placeholder="Masukan Nomor JKN" value="{{ $databpjs->NOMOR_JKN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NIK" placeholder="Masukan NIK" value="{{ $databpjs->NIK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NIP" placeholder="Masukan NIP" value="{{ $databpjs->NIP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_LENGKAP" placeholder="Masukan Nama Lengkap" value="{{ $databpjs->NAMA_LENGKAP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control" name="JENIS_KELAMIN" value="{{ $databpjs->JENIS_KELAMIN }}">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status Kawin</label>
                            <select class="form-control" name="STATUS_KAWIN" value="{{ $databpjs->STATUS_KAWIN }}">
                                <option value="" disabled selected hidden>Pilih Status Kawin</option>
                                <option>Kawin</option>
                                <option>Tidak Kawin</option>
                                <option>Cerai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Hubungan Keluarga</label>
                            <select class="form-control" name="HUBUNGAN_KELUARGA" value="{{ $databpjs->HUBUNGAN_KELUARGA }}">
                                <option value="" disabled selected hidden>Pilih Hubungan Keluarga</option>
                                <option>Suami</option>
                                <option>Anak</option>
                                <option>Istri</option>
                                <option>Pekerja</option>
                                <option>Tanggungan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="{{ $databpjs->TANGGAL_LAHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai TMT</label>
                            <input type="date" class="form-control" id="TANGGAL_MULAI_TMT" name="TANGGAL_MULAI_TMT" value="{{ $databpjs->TANGGAL_MULAI_TMT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai TMT</label>
                            <input type="date" class="form-control" id="TANGGAL_SELESAI_TMT" name="TANGGAL_SELESAI_TMT" value="{{ $databpjs->TANGGAL_SELESAI_TMT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gaji Pokok</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="GAJI_POKOK" placeholder="Masukan Gaji Pokok" value="{{ $databpjs->GAJI_POKOK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Faskes</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_FASKES" placeholder="Masukan Nama Fasilitas Kesehatan" value="{{ $databpjs->NAMA_FASKES }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">No Telepon</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NO_TELEPON" placeholder="Masukan Nomor Telepon" value="{{ $databpjs->NO_TELEPON }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/databpjs/'.$databpjs->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection