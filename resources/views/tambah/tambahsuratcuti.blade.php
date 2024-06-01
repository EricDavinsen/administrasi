@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addsuratcuti') }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="NO_CUTI">Nomor Cuti</label>
                            <input type="text" class="form-control @error('NO_CUTI') is-invalid @enderror" id="NO_CUTI" placeholder="Masukan Nomor Cuti" name="NO_CUTI" value="{{ old('NO_CUTI') }}">
                            @error('NO_CUTI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pegawai_id">Nama Pegawai</label>
                            <select class="form-control mb-2 @error('pegawai_id') is-invalid @enderror" aria-label="Select Pegawai" name="pegawai_id" id="pegawai_id">
                                <option value="" hidden>Pilih Pegawai</option>
                                @if ($pegawai->first() != null)
                                    @foreach ($pegawai as $item)
                                        <option value="{{ $item->id }}" {{ old('pegawai_id') == $item->id ? 'selected' : '' }}>
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
                            <label for="JENIS_CUTI">Jenis Cuti</label>
                            <select class="form-control @error('JENIS_CUTI') is-invalid @enderror" name="JENIS_CUTI" id="JENIS_CUTI">
                                <option value="" disabled selected hidden>Pilih Jenis Cuti</option>
                                <option value="Cuti Tahunan" {{ old('JENIS_CUTI') == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                                <option value="Cuti Besar" {{ old('JENIS_CUTI') == 'Cuti Besar' ? 'selected' : '' }}>Cuti Besar</option>
                                <option value="Cuti Sakit" {{ old('JENIS_CUTI') == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                                <option value="Cuti Melahirkan" {{ old('JENIS_CUTI') == 'Cuti Melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                                <option value="Cuti Karena Alasan Penting" {{ old('JENIS_CUTI') == 'Cuti Karena Alasan Penting' ? 'selected' : '' }}>Cuti Karena Alasan Penting</option>
                                <option value="Cuti di Luar Tanggungan Negara" {{ old('JENIS_CUTI') == 'Cuti di Luar Tanggungan Negara' ? 'selected' : '' }}>Cuti di Luar Tanggungan Negara</option>
                            </select>
                            @error('JENIS_CUTI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ALASAN_CUTI">Alasan</label>
                            <input type="text" class="form-control @error('ALASAN_CUTI') is-invalid @enderror" id="ALASAN_CUTI" placeholder="Masukan Alasan" name="ALASAN_CUTI" value="{{ old('ALASAN_CUTI') }}">
                            @error('ALASAN_CUTI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_MULAI">Tanggal Mulai</label>
                            <input type="date" class="form-control @error('TANGGAL_MULAI') is-invalid @enderror" id="TANGGAL_MULAI" name="TANGGAL_MULAI" value="{{ old('TANGGAL_MULAI') }}">
                            @error('TANGGAL_MULAI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="TANGGAL_SELESAI">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('TANGGAL_SELESAI') is-invalid @enderror" id="TANGGAL_SELESAI" name="TANGGAL_SELESAI" value="{{ old('TANGGAL_SELESAI') }}">
                            @error('TANGGAL_SELESAI')
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
                        <a href="{{ url('/suratcuti') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection