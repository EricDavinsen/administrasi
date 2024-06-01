@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatepegawai/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="formGroupNama">Nama</label>
                            <input type="text" class="form-control @error('NAMA_PEGAWAI') is-invalid @enderror" id="formGroupNama" placeholder="Masukan Nama Pegawai" name="NAMA_PEGAWAI" value="{{ old('NAMA_PEGAWAI', $pegawai->NAMA_PEGAWAI) }}">
                            @error('NAMA_PEGAWAI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNIK">NIK</label>
                            <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="formGroupNIK" name="NIK" placeholder="Masukan NIK" value="{{ old('NIK', $pegawai->NIK) }}">
                            @error('NIK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoKK">No Kartu Keluarga</label>
                            <input type="text" class="form-control @error('NO_KK') is-invalid @enderror" id="formGroupNoKK" name="NO_KK" placeholder="Masukan Nomor Keluarga" value="{{ old('NO_KK', $pegawai->NO_KK) }}">
                            @error('NO_KK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupTanggalLahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('TANGGAL_LAHIR') is-invalid @enderror" id="formGroupTanggalLahir" name="TANGGAL_LAHIR" value="{{ old('TANGGAL_LAHIR', $pegawai->TANGGAL_LAHIR) }}">
                            @error('TANGGAL_LAHIR')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupJenisKelamin">Jenis Kelamin</label>
                            <select class="form-control @error('JENIS_KELAMIN') is-invalid @enderror" name="JENIS_KELAMIN">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option {{ old('JENIS_KELAMIN', $pegawai->JENIS_KELAMIN) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option {{ old('JENIS_KELAMIN', $pegawai->JENIS_KELAMIN) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('JENIS_KELAMIN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupAgama">Agama</label>
                            <input type="text" class="form-control @error('AGAMA') is-invalid @enderror" id="formGroupAgama" name="AGAMA" placeholder="Masukan Agama" value="{{ old('AGAMA', $pegawai->AGAMA) }}">
                            @error('AGAMA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupInstansi">Instansi</label>
                            <input type="text" class="form-control @error('INSTANSI') is-invalid @enderror" id="formGroupInstansi" name="INSTANSI" placeholder="Masukan Instansi" value="{{ old('INSTANSI', $pegawai->INSTANSI) }}">
                            @error('INSTANSI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupUnit">Unit</label>
                            <input type="text" class="form-control @error('UNIT') is-invalid @enderror" id="formGroupUnit" name="UNIT" placeholder="Masukan Unit" value="{{ old('UNIT', $pegawai->UNIT) }}">
                            @error('UNIT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupSubUnit">Sub Unit</label>
                            <input type="text" class="form-control @error('SUB_UNIT') is-invalid @enderror" id="formGroupSubUnit" name="SUB_UNIT" placeholder="Masukan Sub Unit" value="{{ old('SUB_UNIT', $pegawai->SUB_UNIT) }}">
                            @error('SUB_UNIT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupJabatan">Jabatan</label>
                            <input type="text" class="form-control @error('JABATAN_PEGAWAI') is-invalid @enderror" id="formGroupJabatan" name="JABATAN_PEGAWAI" placeholder="Masukan Jabatan" value="{{ old('JABATAN_PEGAWAI', $pegawai->JABATAN_PEGAWAI) }}">
                            @error('JABATAN_PEGAWAI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="formGroupJenisPegawai">Jenis Pegawai</label>
                        <input type="text" class="form-control @error('JENIS_PEGAWAI') is-invalid @enderror" id="formGroupJenisPegawai" name="JENIS_PEGAWAI" placeholder="Masukan Jenis Pegawai" value="{{ old('JENIS_PEGAWAI', $pegawai->JENIS_PEGAWAI) }}">
                        @error('JENIS_PEGAWAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupPendidikanTerakhir">Pendidikan Terakhir</label>
                        <input type="text" class="form-control @error('PENDIDIKAN_TERAKHIR') is-invalid @enderror" id="formGroupPendidikanTerakhir" name="PENDIDIKAN_TERAKHIR" placeholder="Masukan Pendidikan" value="{{ old('PENDIDIKAN_TERAKHIR', $pegawai->PENDIDIKAN_TERAKHIR) }}">
                        @error('PENDIDIKAN_TERAKHIR')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupStatusPegawai">Status Pegawai</label>
                        <input type="text" class="form-control @error('STATUS_PEGAWAI') is-invalid @enderror" id="formGroupStatusPegawai" name="STATUS_PEGAWAI" placeholder="Masukan Status Pegawai" value="{{ old('STATUS_PEGAWAI', $pegawai->STATUS_PEGAWAI) }}">
                        @error('STATUS_PEGAWAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupKedudukan">Kedudukan</label>
                        <input type="text" class="form-control @error('KEDUDUKAN') is-invalid @enderror" id="formGroupKedudukan" name="KEDUDUKAN" placeholder="Masukan Kedudukan" value="{{ old('KEDUDUKAN', $pegawai->KEDUDUKAN) }}">
                        @error('KEDUDUKAN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupFoto">Foto</label>
                        <input type="file" class="form-control @error('FOTO_PEGAWAI') is-invalid @enderror" id="formGroupFoto" name="FOTO_PEGAWAI" placeholder="Masukan Foto">
                        @error('FOTO_PEGAWAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapegawai') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection