@extends('layouts.app')

@section('content')
                    <form action="{{ url('/addspt') }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No SPT</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nomor Surat" name="NO_SPT">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal SPT</label>
                            <input type="date" class="form-control" id="TANGGAL_SURAT" name="TANGGAL_SPT">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <select class="form-control mb-2" aria-label="Select Pegawai" name="pegawai_id">
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
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="TANGGAL_MULAI" name="TANGGAL_MULAI">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="TANGGAL_SURAT" name="TANGGAL_SELESAI">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Keperluan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Keperluan" name="KEPERLUAN">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SURAT">
                        </div>

                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/spt') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection