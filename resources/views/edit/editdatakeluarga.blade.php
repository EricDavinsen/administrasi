@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedatakeluarga/'. $datakeluarga->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Keluarga</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NAMA_KELUARGA" placeholder="Masukan Nama Keluarga" value="{{ $datakeluarga->NAMA_KELUARGA }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" name="TANGGAL_LAHIR" placeholder="Masukan Tanggal Lahir" value="{{ $datakeluarga->TANGGAL_LAHIR }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status</label>
                            <select class="form-control" name="STATUS" value="{{ $datakeluarga->STATUS }}">
                                <option value="" disabled selected hidden>Pilih Status</option>
                                <option>Suami</option>
                                <option>Istri</option>
                                <option>Anak</option>
                                <option>Orang Tua</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Pekerjaan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="PEKERJAAN" placeholder="Masukan Pekerjaan" value="{{ $datakeluarga->PEKERJAAN }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datakeluarga/'.$datakeluarga->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection