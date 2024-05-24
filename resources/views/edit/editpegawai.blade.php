@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatepegawai/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Nama Pegawai" name="NAMA_PEGAWAI" value="{{ $pegawai->NAMA_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NIK</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NIK" placeholder="Masukan NIK" value="{{ $pegawai->NIK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No Kartu Keluarga</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_KK" placeholder="Masukan Nomor Keluarga" value="{{ $pegawai->NO_KK }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_LAHIR" value="{{ $pegawai->TANGGAL_LAHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kelamin</label>
                            <select class="form-control" name="JENIS_KELAMIN" value="{{ $pegawai->JENIS_KELAMIN }}">
                                <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Agama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="AGAMA" placeholder="Masukan Agama" value="{{ $pegawai->AGAMA }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Instansi</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="INSTANSI" placeholder="Masukan Instansi" value="{{ $pegawai->INSTANSI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Unit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="UNIT" placeholder="Masukan Unit" value="{{ $pegawai->UNIT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sub Unit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="SUB UNIT" placeholder="Masukan Sub Unit" value="{{ $pegawai->SUB_UNIT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jabatan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JABATAN_PEGAWAI" placeholder="Masukan Jabatan" value="{{ $pegawai->JABATAN_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Pegawai</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="JENIS_PEGAWAI" placeholder="Masukan Jenis Pegawai" value="{{ $pegawai->JENIS_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="PENDIDIKAN_TERAKHIR" placeholder="Masukan Pendidikan" value="{{ $pegawai->PENDIDIKAN_TERAKHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status Pegawai</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="STATUS_PEGAWAI" placeholder="Masukan Status Pegawai" value="{{ $pegawai->STATUS_PEGAWAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kedudukan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="KEDUDUKAN" placeholder="Masukan Kedudukan" value="{{ $pegawai->KEDUDUKAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Foto</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FOTO_PEGAWAI" placeholder="Masukan Foto" value="{{ $pegawai->FOTO_PEGAWAI }}">
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapegawai') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection