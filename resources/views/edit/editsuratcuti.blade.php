@extends('layouts.app')

@section('content')
                    <form action="{{url('/updatesuratcuti/' . $suratcuti->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor Cuti</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nomor Cuti" name="NO_CUTI" value="{{ $suratcuti->NO_CUTI }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select class="form-control mb-2" aria-label="Select Pegawai" name="pegawai_id" value="{{ $suratcuti->pegawai_id }}">
                                <option value="" hidden>Pilih Pegawai</option>
                                @if ($pegawai->first() != null)
                                    @foreach ($pegawai as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->NAMA_PEGAWAI }}</option>
                                    @endforeach
                                @else
                                    <option value=""disabled>Tidak ada pegawai</option>
                                @endif

                            </select>
                        </div>
                        <input type="text" value="{{$suratcuti->JENIS_CUTI}}" name="old_jenis_cuti" hidden>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Cuti</label>
                            <select class="form-control" name="JENIS_CUTI" value="{{ $suratcuti->JENIS_CUTI }}">
                                <option value="" disabled selected hidden>Pilih Jenis Cuti</option>
                                <option>Cuti Tahunan</option>
                                <option>Cuti Besar</option>
                                <option>Cuti Sakit</option>
                                <option>Cuti Melahirkan</option>
                                <option>Cuti Karena Alasan Penting</option>
                                <option>Cuti di Luar Tanggungan Negara</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Alasan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Alasan" name="ALASAN_CUTI" value="{{ $suratcuti->ALASAN_CUTI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="TANGGAL_MULAI" name="TANGGAL_MULAI" value="{{ $suratcuti->TANGGAL_MULAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="TANGGAL_SELESAI" name="TANGGAL_SELESAI" value="{{ $suratcuti->TANGGAL_SELESAI }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SURAT" value="{{ $suratcuti->FILE_SURAT }}">
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratcuti') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection