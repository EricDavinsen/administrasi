@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedisposisi/' . $disposisi->id) }}"method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nama</label>
                        <select class="js-example-basic-multiple form-control mb-2" aria-label="Select Pegawai" multiple="multiple" name="pegawai_id[]">
                            <option value="" disabled selected hidden>Pilih Pegawai</option> 
                            @if ($pegawai->count() > 0)
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}" {{ in_array($item->id, $disposisi->pegawais->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $item->NAMA_PEGAWAI }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" disabled>Tidak ada pegawai</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="PENERUS">Diteruskan</label>
                        <select class="form-control" name="PENERUS">
                            <option value="" disabled selected hidden>Diteruskan</option>
                            <option {{ $disposisi->PENERUS == 'Staf PNS' ? 'selected' : '' }}>Staf PNS</option>
                            <option {{ $disposisi->PENERUS == 'Supervisor Pusdalops' ? 'selected' : '' }}>Supervisor Pusdalops</option>
                            <option {{ $disposisi->PENERUS == 'Media Center' ? 'selected' : '' }}>Media Center</option>
                            <option {{ $disposisi->PENERUS == 'Operator Pusdalops' ? 'selected' : '' }}>Operator Pusdalops</option>
                            <option {{ $disposisi->PENERUS == 'Admin Pusdalops' ? 'selected' : '' }}>Admin Pusdalops</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="INSTRUKSI">Instruksi</label>
                        <select class="form-control" name="INSTRUKSI">
                            <option value="" disabled selected hidden>Pilih Instruksi</option>
                            <option {{ $disposisi->INSTRUKSI == 'Mohon Arahan/Saran' ? 'selected' : '' }}>Mohon Arahan/Saran</option>
                            <option {{ $disposisi->INSTRUKSI == 'Mohon Telaah' ? 'selected' : '' }}>Mohon Telaah</option>
                            <option {{ $disposisi->INSTRUKSI == 'Mohon Tindak Lanjut/Penyelesaian' ? 'selected' : '' }}>Mohon Tindak Lanjut/Penyelesaian</option>
                            <option {{ $disposisi->INSTRUKSI == 'Mohon Diatur Waktu' ? 'selected' : '' }}>Mohon Diatur Waktu</option>
                            <option {{ $disposisi->INSTRUKSI == 'Mohon Mewakili' ? 'selected' : '' }}>Mohon Mewakili</option>
                            <option {{ $disposisi->INSTRUKSI == 'Mohon Konsep Jawaban' ? 'selected' : '' }}>Mohon Konsep Jawaban</option>
                            <option {{ $disposisi->INSTRUKSI == 'Setuju Untuk Dilaksanakan' ? 'selected' : '' }}>Setuju Untuk Dilaksanakan</option>
                            <option {{ $disposisi->INSTRUKSI == 'Untuk perhatian' ? 'selected' : '' }}>Untuk perhatian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="INFORMASI_LAINNYA">Informasi Lainnya</label>
                        <input type="text" class="form-control" id="INFORMASI_LAINNYA" placeholder="Masukan Informasi Lainnya" name="INFORMASI_LAINNYA" value="{{ $disposisi->INFORMASI_LAINNYA }}">
                    </div>
                    <div class="form-group">
                        <label for="HASIL_LAPORAN">Hasil Disposisi</label>
                        <input type="file" class="form-control" id="HASIL_LAPORAN" name="HASIL_LAPORAN">
                    </div>

                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/disposisi') }}" class="btn btn-danger"> Kembali</a>  
                    </form>
@endsection