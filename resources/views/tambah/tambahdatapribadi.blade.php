@extends('layouts.app')

@section('content')
                    <form action="{{ url('/adddatapribadi/'.$pegawai->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">NO KTP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NO_KTP" placeholder="Masukan Nomor KTP">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO BPJS</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_BPJS" placeholder="Masukan Nomor BPJS">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO NPWP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_NPWP" placeholder="Masukan Nomor NPWP">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO KARTU KELUARGA</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_KK" placeholder="Masukan Nomor Kartu Keluarga">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tinggi Badan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TINGGI_BADAN" placeholder="Masukan Tinggi Badan">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Berat Badan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="BERAT_BADAN" placeholder="Masukan Berat Badan">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Warna Kulit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="WARNA_KULIT" placeholder="Masukan Warna Kulit">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Golongan Darah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="GOLONGAN_DARAH" placeholder="Masukan Golongan Darah">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Alamat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="ALAMAT_RUMAH" placeholder="Masukan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kode Pos</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="KODE_POS" placeholder="Masukan Kode Pos">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Telpon Rumah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TELPON_RUMAH" placeholder="Masukan Nomor Telpon Rumah">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No. Hp</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_HP" placeholder="Masukan Nomor Handphone">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="email" class="form-control" id="formGroupExampleInput2" name="EMAIL" placeholder="Masukan Email">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/dashboardpegawai/'.$pegawai->id)  }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection