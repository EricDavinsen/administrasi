@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedatakeluarga/'. $datakeluarga->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Nama Keluarga</label>
                            <input type="text" class="form-control @error('NAMA_KELUARGA') is-invalid @enderror" id="formGroupExampleInput" name="NAMA_KELUARGA" placeholder="Masukan Nama Keluarga" value="{{ old('NAMA_KELUARGA', $datakeluarga->NAMA_KELUARGA) }}">
                            @error('NAMA_KELUARGA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('TANGGAL_LAHIR') is-invalid @enderror" id="formGroupExampleInput" name="TANGGAL_LAHIR" placeholder="Masukan Tanggal Lahir" value="{{ old('TANGGAL_LAHIR', $datakeluarga->TANGGAL_LAHIR) }}">
                            @error('TANGGAL_LAHIR')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Status</label>
                            <select class="form-control @error('STATUS') is-invalid @enderror" name="STATUS">
                                <option value="" disabled selected hidden>Pilih Status</option>
                                <option @if(old('STATUS', $datakeluarga->STATUS) == "Suami") selected @endif>Suami</option>
                                <option @if(old('STATUS', $datakeluarga->STATUS) == "Istri") selected @endif>Istri</option>
                                <option @if(old('STATUS', $datakeluarga->STATUS) == "Anak") selected @endif>Anak</option>
                                <option @if(old('STATUS', $datakeluarga->STATUS) == "Orang Tua") selected @endif>Orang Tua</option>
                            </select>
                            @error('STATUS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Pekerjaan</label>
                            <input type="text" class="form-control @error('PEKERJAAN') is-invalid @enderror" id="formGroupExampleInput2" name="PEKERJAAN" placeholder="Masukan Pekerjaan" value="{{ old('PEKERJAAN', $datakeluarga->PEKERJAAN) }}">
                            @error('PEKERJAAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datakeluarga/'.$datakeluarga->pegawai_id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection