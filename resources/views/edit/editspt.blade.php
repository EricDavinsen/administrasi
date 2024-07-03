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
                        <label>Nama</label>
                        <select class="js-example-basic-multiple form-control mb-2" aria-label="Select Pegawai" multiple="multiple" name="pegawai_id[]">
                            <option value="" disabled selected hidden>Pilih Pegawai</option> 
                            @if ($pegawai->count() > 0)
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}" {{ in_array($item->id, $spt->pegawais->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $item->NAMA_PEGAWAI }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" disabled>Tidak ada pegawai</option>
                            @endif
                        </select>
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