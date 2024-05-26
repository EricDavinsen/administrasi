@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatesuratmasuk/' . $suratmasuk->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">Kode Surat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Kode Surat" name="KODE_SURAT" value="{{ $suratmasuk->KODE_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nomor Surat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Nomor Surat" name="NOMOR_SURAT" value="{{ $suratmasuk->NOMOR_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Surat</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_SURAT" value="{{ $suratmasuk->TANGGAL_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="TANGGAL_MASUK" value="{{ $suratmasuk->TANGGAL_MASUK }}">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <select class="form-control mb-2" aria-label="Jenis Surat" name="jenis_id" value="{{ $suratmasuk->jenis_id }}">
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
                            <label for="formGroupExampleInput2">Asal Surat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Asal Surat" name="ASAL_SURAT" value="{{ $suratmasuk->ASAL_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sifat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Sifat" name="SIFAT_SURAT" value="{{ $suratmasuk->SIFAT_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Perihal</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Perihal" name="PERIHAL_SURAT" value="{{ $suratmasuk->PERIHAL_SURAT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">File</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="FILE_SURAT" value="{{ $suratmasuk->FILE_SURAT }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratmasuk') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection