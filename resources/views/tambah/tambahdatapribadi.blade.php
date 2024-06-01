@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddatapribadi/'.$pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                            <label for="formGroupNoKTP">NO KTP</label>
                            <input type="text" class="form-control" id="formGroupNoKTP" name="NO_KTP" placeholder="Masukan Nomor KTP" value="{{ old('NO_KTP') }}">
                            @error('NO_KTP')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoBPJS">NO BPJS</label>
                            <input type="text" class="form-control" id="formGroupNoBPJS" name="NO_BPJS" placeholder="Masukan Nomor BPJS" value="{{ old('NO_BPJS') }}">
                            @error('NO_BPJS')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoNPWP">NO NPWP</label>
                            <input type="text" class="form-control" id="formGroupNoNPWP" name="NO_NPWP" placeholder="Masukan Nomor NPWP" value="{{ old('NO_NPWP') }}">
                            @error('NO_NPWP')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoKK">NO KARTU KELUARGA</label>
                            <input type="text" class="form-control" id="formGroupNoKK" name="NO_KK" placeholder="Masukan Nomor Kartu Keluarga" value="{{ old('NO_KK') }}">
                            @error('NO_KK')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupTinggiBadan">Tinggi Badan</label>
                            <input type="text" class="form-control" id="formGroupTinggiBadan" name="TINGGI_BADAN" placeholder="Masukan Tinggi Badan" value="{{ old('TINGGI_BADAN') }}">
                            @error('TINGGI_BADAN')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupBeratBadan">Berat Badan</label>
                            <input type="text" class="form-control" id="formGroupBeratBadan" name="BERAT_BADAN" placeholder="Masukan Berat Badan" value="{{ old('BERAT_BADAN') }}">
                            @error('BERAT_BADAN')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupWarnaKulit">Warna Kulit</label>
                            <input type="text" class="form-control" id="formGroupWarnaKulit" name="WARNA_KULIT" placeholder="Masukan Warna Kulit">
                            @error('WARNA_KULIT')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupGolonganDarah">Golongan Darah</label>
                            <input type="text" class="form-control" id="formGroupGolonganDarah" name="GOLONGAN_DARAH" placeholder="Masukan Golongan Darah">
                            @error('GOLONGAN_DARAH')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupAlamat">Alamat</label>
                            <input type="text" class="form-control" id="formGroupAlamat" name="ALAMAT_RUMAH" placeholder="Masukan Alamat">
                            @error('ALAMAT_RUMAH')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupKodePos">Kode Pos</label>
                            <input type="text" class="form-control" id="formGroupKodePos" name="KODE_POS" placeholder="Masukan Kode Pos">
                            @error('KODE_POS')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupTelponRumah">Telpon Rumah</label>
                            <input type="text" class="form-control" id="formGroupTelponRumah" name="TELPON_RUMAH" placeholder="Masukan Nomor Telpon Rumah">
                            @error('TELPON_RUMAH')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupNoHp">No. Hp</label>
                            <input type="text" class="form-control" id="formGroupNoHp" name="NO_HP" placeholder="Masukan Nomor Handphone">
                            @error('NO_HP')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupEmail">Email</label>
                            <input type="email" class="form-control" id="formGroupEmail" name="EMAIL" placeholder="Masukan Email">
                            @error('EMAIL')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/dashboardpegawai/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection