@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatespt/' . $spt->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                        <label for="NO_SPT">No SPT</label>
                        <input type="text" class="form-control @error('NO_SPT') is-invalid @enderror" id="NO_SPT" placeholder="Masukan Nomor Surat" name="NO_SPT" value="{{ old('NO_SPT', $spt->NO_SPT) }}">
                        @error('NO_SPT')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="TANGGAL_SPT">Tanggal SPT</label>
                        <input type="date" class="form-control @error('TANGGAL_SPT') is-invalid @enderror" id="TANGGAL_SPT" name="TANGGAL_SPT" value="{{ old('TANGGAL_SPT', $spt->TANGGAL_SPT) }}">
                        @error('TANGGAL_SPT')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pegawai_id">Nama</label>
                        <select class="form-control mb-2 @error('pegawai_id') is-invalid @enderror" id="pegawai_id" aria-label="Select Pegawai" name="pegawai_id">
                            <option value="" hidden>Pilih Pegawai</option>
                            @if ($pegawai->first() != null)
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawai_id', $spt->pegawai_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->NAMA_PEGAWAI }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" disabled>Tidak ada pegawai</option>
                            @endif
                        </select>
                        @error('pegawai_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="TANGGAL_MULAI">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('TANGGAL_MULAI') is-invalid @enderror" id="TANGGAL_MULAI" name="TANGGAL_MULAI" value="{{ old('TANGGAL_MULAI', $spt->TANGGAL_MULAI) }}">
                        @error('TANGGAL_MULAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="TANGGAL_SELESAI">Tanggal Selesai</label>
                        <input type="date" class="form-control @error('TANGGAL_SELESAI') is-invalid @enderror" id="TANGGAL_SELESAI" name="TANGGAL_SELESAI" value="{{ old('TANGGAL_SELESAI', $spt->TANGGAL_SELESAI) }}">
                        @error('TANGGAL_SELESAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="KEPERLUAN">Keperluan</label>
                        <input type="text" class="form-control @error('KEPERLUAN') is-invalid @enderror" id="KEPERLUAN" placeholder="Masukan Keperluan" name="KEPERLUAN" value="{{ old('KEPERLUAN', $spt->KEPERLUAN) }}">
                        @error('KEPERLUAN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="FILE_SURAT">File</label>
                        <input type="file" class="form-control @error('FILE_SURAT') is-invalid @enderror" id="FILE_SURAT" name="FILE_SURAT">
                        @error('FILE_SURAT')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/spt') }}" class="btn btn-danger"> Kembali</a>
                        
                    </form>
@endsection