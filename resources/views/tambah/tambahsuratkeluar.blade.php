@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addsuratkeluar') }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor Surat</label>
                            <input type="text" class="form-control @error('NOMOR_SURAT') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Masukan Nomor Surat" name="NOMOR_SURAT" value="{{ old('NOMOR_SURAT') }}">
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
                            <label>Jenis Surat</label>
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
                            <label for="formGroupExampleInput3">Tujuan</label>
                            <input type="text" class="form-control @error('TUJUAN_SURAT') is-invalid @enderror" id="formGroupExampleInput3" placeholder="Masukan Tujuan" name="TUJUAN_SURAT" value="{{ old('TUJUAN_SURAT') }}">
                            @error('TUJUAN_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Sifat Surat</label>
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
                            <label for="formGroupExampleInput4">Perihal</label>
                            <input type="text" class="form-control @error('PERIHAL_SURAT') is-invalid @enderror" id="formGroupExampleInput4" placeholder="Masukan Perihal" name="PERIHAL_SURAT" value="{{ old('PERIHAL_SURAT') }}">
                            @error('PERIHAL_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput5">File</label>
                            <input type="file" class="form-control @error('FILE_SURAT') is-invalid @enderror" id="formGroupExampleInput5" name="FILE_SURAT">
                            @error('FILE_SURAT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                                        
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratkeluar') }}" class="btn btn-danger"> Kembali</a>
                    </form>
                    
@endsection