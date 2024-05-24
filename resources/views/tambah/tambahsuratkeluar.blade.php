@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addsuratkeluar') }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor Surat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nomor Surat" name="NOMOR_SURAT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Surat</label>
                            <input type="date" class="form-control" id="TANGGAL_SURAT" name="TANGGAL_SURAT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Surat</label>
                            <select class="form-control" name="JENIS_SURAT">
                                <option value="" disabled selected hidden>Pilih Jenis Surat</option>
                                <option>Undangan</option>
                                <option>Permohonan</option>
                                <option>Pemberitahuan</option>
                                <option>Laporan Kejadian</option>
                                <option>Surat Edaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tujuan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Tujuan" name="TUJUAN_SURAT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sifat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Sifat" name="SIFAT_SURAT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Perihal</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Perihal" name="PERIHAL_SURAT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SURAT">
                        </div>

                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratkeluar') }}" class="btn btn-danger"> Kembali</a>
                    </form>
                    
@endsection