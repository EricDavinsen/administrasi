@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddisposisi/' . $suratmasuk->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="pegawai_id">Nama</label>
                                <select class="js-example-basic-multiple form-control mb-2 @error('pegawai_id') is-invalid @enderror" multiple="multiple" aria-label="Select Pegawai" name="pegawai_id[]">
                                    <option value="" disabled selected hidden>Pilih Pegawai</option>
                                    @if ($pegawai->count() > 0)
                                        @foreach ($pegawai as $item)
                                            <option value="{{ $item->id }}">{{ $item->NAMA_PEGAWAI }}</option>
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
                            <label for="PENERUS">Diteruskan</label>
                            <select class="form-control @error('PENERUS') is-invalid @enderror" name="PENERUS" id="PENERUS">
                                <option value="" disabled selected hidden>Diteruskan</option>
                                <option>Staf PNS</option>
                                <option>Supervisor Pusdalops</option>
                                <option>Media Center</option>
                                <option>Operator Pusdalops</option>
                                <option>Admin Pusdalops</option>
                            </select>
                            @error('PENERUS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="INSTRUKSI">Instruksi</label>
                            <select class="form-control @error('INSTRUKSI') is-invalid @enderror" name="INSTRUKSI" id="INSTRUKSI">
                                <option value="" disabled selected hidden>Pilih Instruksi</option>
                                <option>Mohon Arahan/Saran</option>
                                <option>Mohon Telaah</option>
                                <option>Mohon Tindak Lanjut/Penyelesaian</option>
                                <option>Mohon Diatur Waktu</option>
                                <option>Mohon Mewakili</option>
                                <option>Mohon Konsep Jawaban</option>
                                <option>Setuju Untuk Dilaksanakan</option>
                                <option>Untuk perhatian</option>
                            </select>
                            @error('INSTRUKSI')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="INFORMASI_LAINNYA">Informasi Lainnya</label>
                            <input type="text" class="form-control @error('INFORMASI_LAINNYA') is-invalid @enderror" id="INFORMASI_LAINNYA" placeholder="Masukan Informasi Lainnya" name="INFORMASI_LAINNYA">
                            @error('INFORMASI_LAINNYA')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="HASIL_LAPORAN">Hasil Disposisi</label>
                            <input type="file" class="form-control @error('HASIL_LAPORAN') is-invalid @enderror" id="HASIL_LAPORAN" name="HASIL_LAPORAN">
                            @error('HASIL_LAPORAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratmasuk') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection