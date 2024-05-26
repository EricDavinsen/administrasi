@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatesuratkeluar/' . $suratkeluar->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor Surat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nomor Surat" name="NOMOR_SURAT" value="{{ $suratkeluar->NOMOR_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Surat</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_SURAT" value="{{ $suratkeluar->TANGGAL_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <select class="form-control mb-2" aria-label="Jenis Surat" name="jenis_id" value="{{ $suratkeluar->jenis_id }}">
                                <option value="" hidden>Jenis Surat</option>
                                @if ($jenissurat->first() != null)
                                    @foreach ($jenissurat as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->JENIS_SURAT }}</option>
                                    @endforeach
                                @else
                                    <option value=""disabled>Tidak ada jenis surat</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tujuan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Tujuan" name="TUJUAN_SURAT" value="{{ $suratkeluar->TUJUAN_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sifat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Sifat" name="SIFAT_SURAT" value="{{ $suratkeluar->SIFAT_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Perihal</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Perihal" name="PERIHAL_SURAT" value="{{ $suratkeluar->PERIHAL_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SURAT" value="{{ $suratkeluar->FILE_SURAT }}">
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratkeluar') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection