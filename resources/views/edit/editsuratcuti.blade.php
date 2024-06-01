@extends('layouts.app')

@section('content')
                    <form action="{{url('/updatesuratcuti/' . $suratcuti->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                        <label for="formGroupExampleInput2">Nomor Cuti</label>
                        <input type="text" class="form-control @error('NO_CUTI') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Masukan Nomor Cuti" name="NO_CUTI" value="{{ old('NO_CUTI', $suratcuti->NO_CUTI) }}">
                        @error('NO_CUTI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <select class="form-control mb-2 @error('pegawai_id') is-invalid @enderror" aria-label="Select Pegawai" name="pegawai_id">
                            <option value="" hidden>Pilih Pegawai</option>
                            @if ($pegawai->first() != null)
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawai_id', $suratcuti->pegawai_id) == $item->id ? 'selected' : '' }}>
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
                    
                    <input type="text" value="{{ $suratcuti->JENIS_CUTI }}" name="old_jenis_cuti" hidden>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Jenis Cuti</label>
                        <select class="form-control @error('JENIS_CUTI') is-invalid @enderror" name="JENIS_CUTI">
                            <option value="" disabled hidden>Pilih Jenis Cuti</option>
                            <option value="Cuti Tahunan" {{ old('JENIS_CUTI', $suratcuti->JENIS_CUTI) == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                            <option value="Cuti Besar" {{ old('JENIS_CUTI', $suratcuti->JENIS_CUTI) == 'Cuti Besar' ? 'selected' : '' }}>Cuti Besar</option>
                            <option value="Cuti Sakit" {{ old('JENIS_CUTI', $suratcuti->JENIS_CUTI) == 'Cuti Sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                            <option value="Cuti Melahirkan" {{ old('JENIS_CUTI', $suratcuti->JENIS_CUTI) == 'Cuti Melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                            <option value="Cuti Karena Alasan Penting" {{ old('JENIS_CUTI', $suratcuti->JENIS_CUTI) == 'Cuti Karena Alasan Penting' ? 'selected' : '' }}>Cuti Karena Alasan Penting</option>
                            <option value="Cuti di Luar Tanggungan Negara" {{ old('JENIS_CUTI', $suratcuti->JENIS_CUTI) == 'Cuti di Luar Tanggungan Negara' ? 'selected' : '' }}>Cuti di Luar Tanggungan Negara</option>
                        </select>
                        @error('JENIS_CUTI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Alasan</label>
                        <input type="text" class="form-control @error('ALASAN_CUTI') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Masukan Alasan" name="ALASAN_CUTI" value="{{ old('ALASAN_CUTI', $suratcuti->ALASAN_CUTI) }}">
                        @error('ALASAN_CUTI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="TANGGAL_MULAI">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('TANGGAL_MULAI') is-invalid @enderror" id="TANGGAL_MULAI" name="TANGGAL_MULAI" value="{{ old('TANGGAL_MULAI', $suratcuti->TANGGAL_MULAI) }}">
                        @error('TANGGAL_MULAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="TANGGAL_SELESAI">Tanggal Selesai</label>
                        <input type="date" class="form-control @error('TANGGAL_SELESAI') is-invalid @enderror" id="TANGGAL_SELESAI" name="TANGGAL_SELESAI" value="{{ old('TANGGAL_SELESAI', $suratcuti->TANGGAL_SELESAI) }}">
                        @error('TANGGAL_SELESAI')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">File</label>
                        <input type="file" class="form-control @error('FILE_SURAT') is-invalid @enderror" id="formGroupExampleInput2" name="FILE_SURAT">
                        @error('FILE_SURAT')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratcuti') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection