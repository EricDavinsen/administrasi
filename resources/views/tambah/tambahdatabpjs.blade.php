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
                            <label>Nama Lengkap</label>
                            <select class="form-control mb-2 @error('keluarga_id') is-invalid @enderror" aria-label="Select Keluarga" name="keluarga_id" id="keluarga_id">
                                <option value="" hidden>Nama Lengkap</option>
                                @if ($datakeluarga->count() > 0)
                                    @foreach ($datakeluarga as $item)
                                        <option value="{{ $item->id }}" {{ old('keluarga_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->NAMA_KELUARGA }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>Tidak ada data</option>
                                @endif
                            </select>
                            @error('keluarga_id')
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
                
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/databpjs/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection