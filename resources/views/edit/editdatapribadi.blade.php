@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedatapribadi/'. $datapribadi->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupNoKTP">NO KTP</label>
                            <input type="text" class="form-control @error('NO_KTP') is-invalid @enderror" id="formGroupNoKTP" name="NO_KTP" placeholder="Masukan Nomor KTP" value="{{ old('NO_KTP', $datapribadi->NO_KTP) }}">
                            @error('NO_KTP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoBPJS">NO BPJS</label>
                            <input type="text" class="form-control @error('NO_BPJS') is-invalid @enderror" id="formGroupNoBPJS" name="NO_BPJS" placeholder="Masukan Nomor BPJS" value="{{ old('NO_BPJS', $datapribadi->NO_BPJS) }}">
                            @error('NO_BPJS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoNPWP">NO NPWP</label>
                            <input type="text" class="form-control @error('NO_NPWP') is-invalid @enderror" id="formGroupNoNPWP" name="NO_NPWP" placeholder="Masukan Nomor NPWP" value="{{ old('NO_NPWP', $datapribadi->NO_NPWP) }}">
                            @error('NO_NPWP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupTinggiBadan">Tinggi Badan</label>
                            <input type="text" class="form-control @error('TINGGI_BADAN') is-invalid @enderror" id="formGroupTinggiBadan" name="TINGGI_BADAN" placeholder="Masukan Tinggi Badan" value="{{ old('TINGGI_BADAN', $datapribadi->TINGGI_BADAN) }}">
                            @error('TINGGI_BADAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupBeratBadan">Berat Badan</label>
                            <input type="text" class="form-control @error('BERAT_BADAN') is-invalid @enderror" id="formGroupBeratBadan" name="BERAT_BADAN" placeholder="Masukan Berat Badan" value="{{ old('BERAT_BADAN', $datapribadi->BERAT_BADAN) }}">
                            @error('BERAT_BADAN')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupWarnaKulit">Warna Kulit</label>
                            <input type="text" class="form-control @error('WARNA_KULIT') is-invalid @enderror" id="formGroupWarnaKulit" name="WARNA_KULIT" placeholder="Masukan Warna Kulit" value="{{ old('WARNA_KULIT', $datapribadi->WARNA_KULIT) }}">
                            @error('WARNA_KULIT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupGolonganDarah">Golongan Darah</label>
                            <input type="text" class="form-control @error('GOLONGAN_DARAH') is-invalid @enderror" id="formGroupGolonganDarah" name="GOLONGAN_DARAH" placeholder="Masukan Golongan Darah" value="{{ old('GOLONGAN_DARAH', $datapribadi->GOLONGAN_DARAH) }}">
                            @error('GOLONGAN_DARAH')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupAlamat">Alamat</label>
                            <input type="text" class="form-control @error('ALAMAT_RUMAH') is-invalid @enderror" id="formGroupAlamat" name="ALAMAT_RUMAH" placeholder="Masukan Alamat" value="{{ old('ALAMAT_RUMAH', $datapribadi->ALAMAT_RUMAH) }}">
                            @error('ALAMAT_RUMAH')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupKodePos">Kode Pos</label>
                            <input type="text" class="form-control @error('KODE_POS') is-invalid @enderror" id="formGroupKodePos" name="KODE_POS" placeholder="Masukan Kode Pos" value="{{ old('KODE_POS', $datapribadi->KODE_POS) }}">
                            @error('KODE_POS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupTelponRumah">Telpon Rumah</label>
                            <input type="text" class="form-control @error('TELPON_RUMAH') is-invalid @enderror" id="formGroupTelponRumah" name="TELPON_RUMAH" placeholder="Masukan Nomor Telpon Rumah" value="{{ old('TELPON_RUMAH', $datapribadi->TELPON_RUMAH) }}">
                            @error('TELPON_RUMAH')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoHp">No. Hp</label>
                            <input type="text" class="form-control @error('NO_HP') is-invalid @enderror" id="formGroupNoHp" name="NO_HP" placeholder="Masukan Nomor Handphone" value="{{ old('NO_HP', $datapribadi->NO_HP) }}">
                            @error('NO_HP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupEmail">Email</label>
                            <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" id="formGroupEmail" name="EMAIL" placeholder="Masukan Email" value="{{ old('EMAIL', $datapribadi->EMAIL) }}">
                            @error('EMAIL')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapribadi/'.$pegawai->id) }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection