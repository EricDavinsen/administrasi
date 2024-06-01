@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addpegawai') }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Nama Pegawai" name="NAMA_PEGAWAI">
                            @error('NAMA_PEGAWAI')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NIK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NIK" placeholder="Masukan NIK">
                            @error('NIK')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO KARTU KELUARGA</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_KK" placeholder="Masukan Nomor Kartu Keluarga">
                            @error('NO_KK')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_LAHIR">
                            @error('TANGGAL_LAHIR')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="formGroupExampleInput2">Jenis Kelamin</label>
                        <select class="form-control" name="JENIS_KELAMIN">
                            <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                        @error('JENIS_KELAMIN')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Agama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="AGAMA" placeholder="Masukan Agama">
                            @error('AGAMA')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="formGroupExampleInput2">Instansi</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="INSTANSI" placeholder="Masukan Instansi">
                        @error('INSTANSI')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Unit</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="UNIT" placeholder="Masukan Unit">
                        @error('UNIT')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Sub Unit</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="SUB_UNIT" placeholder="Masukan Sub Unit">
                        @error('SUB_UNIT')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jabatan</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="JABATAN_PEGAWAI" placeholder="Masukan Jabatan">
                        @error('JABATAN_PEGAWAI')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jenis Pegawai</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="JENIS_PEGAWAI" placeholder="Masukan Jenis Pegawai">
                        @error('JENIS_PEGAWAI')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="PENDIDIKAN_TERAKHIR" placeholder="Masukan Pendidikan">
                        @error('PENDIDIKAN_TERAKHIR')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Status Pegawai</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="STATUS_PEGAWAI" placeholder="Masukan Status Pegawai">
                        @error('STATUS_PEGAWAI')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Kedudukan</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="KEDUDUKAN" placeholder="Masukan Kedudukan">
                        @error('KEDUDUKAN')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Foto</label>
                        <input type="file" class="form-control" id="formGroupExampleInput2" name="FOTO_PEGAWAI" placeholder="Masukan Foto">
                        @error('FOTO_PEGAWAI')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapegawai') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection