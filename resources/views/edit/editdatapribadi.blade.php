@extends('layouts.app')

@section('content')
                    <form action="{{ url('/updatedatapribadi/'. $datapribadi->id) }}"method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <div class="form-group">
                            <label for="formGroupExampleInput">NO KTP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="NO_KTP" placeholder="Masukan Nomor KTP" value="{{ $datapribadi->NO_KTP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO BPJS</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_BPJS" placeholder="Masukan Nomor BPJS" value="{{ $datapribadi->NO_BPJS }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">NO NPWP</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_NPWP" placeholder="Masukan Nomor NPWP" value="{{ $datapribadi->NO_NPWP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tinggi Badan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TINGGI_BADAN" placeholder="Masukan Tinggi Badan" value="{{ $datapribadi->TINGGI_BADAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Berat Badan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="BERAT_BADAN" placeholder="Masukan Berat Badan" value="{{ $datapribadi->BERAT_BADAN }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Warna Kulit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="WARNA_KULIT" placeholder="Masukan Warna Kulit" value="{{ $datapribadi->WARNA_KULIT }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Golongan Darah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="GOLONGAN_DARAH" placeholder="Masukan Golongan Darah" value="{{ $datapribadi->GOLONGAN_DARAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Alamat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="ALAMAT_RUMAH" placeholder="Masukan Alamat" value="{{ $datapribadi->ALAMAT_RUMAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kode Pos</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="KODE_POS" placeholder="Masukan Kode Pos" value="{{ $datapribadi->KODE_POS }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Telpon Rumah</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="TELPON_RUMAH" placeholder="Masukan Nomor Telpon Rumah" value="{{ $datapribadi->TELPON_RUMAH }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No. Hp</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="NO_HP" placeholder="Masukan Nomor Handphone" value="{{ $datapribadi->NO_HP }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="email" class="form-control" id="formGroupExampleInput2" name="EMAIL" placeholder="Masukan Email" value="{{ $datapribadi->EMAIL }}">
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/datapribadi/'.$pegawai->id) }}" class="btn btn-danger"> Kembali</a>
                    </form>
@endsection