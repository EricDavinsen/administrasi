@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddisposisi/' . $suratmasuk->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
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
                            <label for="formGroupExampleInput2">Diteruskan</label>
                            <select class="form-control" name="PENERUS">
                                <option value="" disabled selected hidden>Diteruskan</option>
                                <option>Staf PNS</option>
                                <option>Supervisor Pusdalops</option>
                                <option>Media Center</option>
                                <option>Operator Pusdalops</option>
                                <option>Admin Pusdalops</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Instruksi</label>
                            <select class="form-control" name="INSTRUKSI">
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
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Informasi Lainnya</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Informasi Lainnya" name="INFORMASI_LAINNYA">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Hasil Disposisi</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="HASIL_LAPORAN">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/suratmasuk') }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection