@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddatabpjs/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor JKN</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NOMOR_JKN" placeholder="Masukan Nomor JKN">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NIK" placeholder="Masukan NIK">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NIP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NIP" placeholder="Masukan NIP">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_LENGKAP" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control" name="JENIS_KELAMIN">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status Kawin</label>
                            <select class="form-control" name="STATUS_KAWIN">
                                <option value="" disabled selected hidden>Pilih Status Kawin</option>
                                <option>Kawin</option>
                                <option>Tidak Kawin</option>
                                <option>Cerai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Hubungan Keluarga</label>
                            <select class="form-control" name="HUBUNGAN_KELUARGA">
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
                            <input type="date" class="form-control" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai TMT</label>
                            <input type="date" class="form-control" id="TANGGAL_MULAI_TMT" name="TANGGAL_MULAI_TMT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai TMT</label>
                            <input type="date" class="form-control" id="TANGGAL_SELESAI_TMT" name="TANGGAL_SELESAI_TMT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gaji Pokok</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="GAJI_POKOK" placeholder="Masukan Gaji Pokok">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Faskes</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_FASKES" placeholder="Masukan Nama Fasilitas Kesehatan">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">No Telepon</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NO_TELEPON" placeholder="Masukan Nomor Telepon">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/databpjs/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection