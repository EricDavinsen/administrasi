
@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addsuratmasuk') }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="KODE_SURAT">Kode Surat</label>
                            <input type="text" class="form-control @error('KODE_SURAT') is-invalid @enderror" id="KODE_SURAT" placeholder="Masukan Kode Surat" name="KODE_SURAT" value="{{ old('KODE_SURAT') }}">
                            @error('KODE_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="NOMOR_SURAT">Nomor Surat</label>
                            <input type="text" class="form-control @error('NOMOR_SURAT') is-invalid @enderror" id="NOMOR_SURAT" placeholder="Masukan Nomor Surat" name="NOMOR_SURAT" value="{{ old('NOMOR_SURAT') }}">
                            @error('NOMOR_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_SURAT">Tanggal Surat</label>
                            <input type="date" class="form-control @error('TANGGAL_SURAT') is-invalid @enderror" id="TANGGAL_SURAT" name="TANGGAL_SURAT" value="{{ old('TANGGAL_SURAT') }}">
                            @error('TANGGAL_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_MASUK">Tanggal Masuk</label>
                            <input type="date" class="form-control @error('TANGGAL_MASUK') is-invalid @enderror" id="TANGGAL_MASUK" name="TANGGAL_MASUK" value="{{ old('TANGGAL_MASUK') }}">
                            @error('TANGGAL_MASUK')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_id">Jenis Surat</label>
                            <select class="form-control mb-2 @error('jenis_id') is-invalid @enderror" aria-label="Select Jenis Surat" name="jenis_id">
                                <option value="" hidden>Pilih Jenis Surat</option>
                                @if ($jenissurat->first() != null)
                                    @foreach ($jenissurat as $item)
                                        <option value="{{ $item->id }}" {{ old('jenis_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->JENIS_SURAT }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>Tidak ada jenis surat</option>
                                @endif
                            </select>
                            @error('jenis_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ASAL_SURAT">Asal Surat</label>
                            <input type="text" class="form-control @error('ASAL_SURAT') is-invalid @enderror" id="ASAL_SURAT" placeholder="Masukan Asal Surat" name="ASAL_SURAT" value="{{ old('ASAL_SURAT') }}">
                            @error('ASAL_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sifat_id">Sifat Surat</label>
                            <select class="form-control mb-2 @error('sifat_id') is-invalid @enderror" aria-label="Select Sifat Surat" name="sifat_id">
                                <option value="" hidden>Pilih Sifat Surat</option>
                                @if ($sifatsurat->first() != null)
                                    @foreach ($sifatsurat as $item)
                                        <option value="{{ $item->id }}" {{ old('sifat_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->SIFAT_SURAT }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>Tidak ada sifat surat</option>
                                @endif
                            </select>
                            @error('sifat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="PERIHAL_SURAT">Perihal</label>
                            <input type="text" class="form-control @error('PERIHAL_SURAT') is-invalid @enderror" id="PERIHAL_SURAT" placeholder="Masukan Perihal" name="PERIHAL_SURAT" value="{{ old('PERIHAL_SURAT') }}">
                            @error('PERIHAL_SURAT')
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

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('/suratmasuk') }}" class="btn btn-danger"> Kembali</a>
                        </form>
@endsection            