@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddatakeluarga/'. $pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Keluarga</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_KELUARGA" placeholder="Masukan Nama Keluarga">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_LAHIR" placeholder="Masukan Tanggal Lahir">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status</label>
                            <select class="form-control" name="STATUS">
                                <option value="" disabled selected hidden>Pilih Status</option>
                                <option>Suami</option>
                                <option>Istri</option>
                                <option>Anak</option>
                                <option>Orang Tua</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Pekerjaan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="PEKERJAAN" placeholder="Masukan Pekerjaan">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datakeluarga/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection