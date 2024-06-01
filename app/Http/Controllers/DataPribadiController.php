<?php

namespace App\Http\Controllers;

use App\Exports\ExportDataPribadi;
use App\Models\Pegawai;
use Illuminate\View\View;
use App\Models\DataPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataPribadiController extends Controller
{
    public function index($id){
        $datapribadi = DataPribadi::where('pegawai_id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();
        
        return view("datapribadi")->with([
            'datapribadi' => $datapribadi,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $datapribadi = DataPribadi::where('pegawai_id', $id)->first();

        if($datapribadi == null){
            return view("tambah/tambahdatapribadi")->with([
                'pegawai' => $pegawai,
                'datapribadi' => $datapribadi,
                'users' => Auth::guard('users')->user() 
            ]);
        }
        return view("datapribadi")->with([
            'pegawai' => $pegawai,
            'datapribadi' => $datapribadi,
            'users' => Auth::guard('users')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {

        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "NO_KTP" => ["required"],
                "NO_BPJS" => ["required"],
                "NO_NPWP" => ["required"],
                "TINGGI_BADAN" => ["required"],
                "BERAT_BADAN" => ["required"],
                "WARNA_KULIT" => ["required"],
                "GOLONGAN_DARAH" => ["required"],
                "ALAMAT_RUMAH" => ["required"],
                "KODE_POS" => ["required"],
                "TELPON_RUMAH" => ["required"],
                "NO_HP" => ["required"],
                "EMAIL" => ["required"],
            ],
            [
                "NO_KTP.required" => "Nomor KTP Harus Diisi",
                "NO_BPJS.required" => "Nomor BPJS Harus Diisi",
                "NO_NPWP.required" => "Nomor NPWP Harus Diisi",
                "TINGGI_BADAN.required" => "Tinggi Badan Harus Diisi",
                "BERAT_BADAN.required" => "Berat Badan Harus Diisi",
                "WARNA_KULIT.required" => "Warna Kulit Harus Diisi",
                "GOLONGAN_DARAH.required" => "Golongan Darah Harus Diisi",
                "ALAMAT_RUMAH.required" => "Alamat Harus Diisi",
                "KODE_POS.required" => "Kode Pos Harus Diisi",
                "TELPON_RUMAH.required" => "Telp Harus Diisi",
                "NO_HP.required" => "No Hp Harus Diisi",
                "EMAIL.required" => "Email Harus Diisi",
            ]
        );

        $datapribadi = DataPribadi::create([
            'pegawai_id' => $pegawai->id,
            'NO_KTP' => $request->NO_KTP,
            'NO_BPJS' => $request->NO_BPJS,
            'NO_NPWP' => $request->NO_NPWP,
            'TINGGI_BADAN' => $request->TINGGI_BADAN,
            'BERAT_BADAN' => $request->BERAT_BADAN,
            'WARNA_KULIT' => $request->WARNA_KULIT,
            'GOLONGAN_DARAH' => $request->GOLONGAN_DARAH,
            'ALAMAT_RUMAH' => $request->ALAMAT_RUMAH,
            'KODE_POS' => $request->KODE_POS,
            'TELPON_RUMAH' => $request->TELPON_RUMAH,
            'NO_HP' => $request->NO_HP,
            'EMAIL' => $request->EMAIL
        ]);


        if ($datapribadi) {
            return redirect()
                ->intended("/datapribadi/$id")
                ->with([
                notify()->success('Data Pribadi Telah Ditambahkan'),
                "success" => "Data Pribadi Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdatapribadi/$id")
            ->with([
                notify()->error('Gagal Menambah Data Pribadi'),
                "error" => "Gagal Menambah Data Pribadi"]);
    
    }

    public function destroy($id)
    {
      
        $datapribadi = DataPribadi::where('id', $id);

            if ($datapribadi) {
                $datapribadi->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Data Pribadi Telah Dihapus'),
                        "success" => "Data Pribadi Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Data Pribadi'),
                        "error" => "Gagal Menghapus Data Pribadi"]);
            }
    }

    public function edit($id)
    {
        $datapribadi = DataPribadi::where('pegawai_id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editdatapribadi")->with([
            'datapribadi' => $datapribadi,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $datapribadi = DataPribadi::where('id', $id)->first();

        $this->validate($request,
            [
                "NO_KTP" => ["required"],
                "NO_BPJS" => ["required"],
                "NO_NPWP" => ["required"],
                "TINGGI_BADAN" => ["required"],
                "BERAT_BADAN" => ["required"],
                "WARNA_KULIT" => ["required"],
                "GOLONGAN_DARAH" => ["required"],
                "ALAMAT_RUMAH" => ["required"],
                "KODE_POS" => ["required"],
                "TELPON_RUMAH" => ["required"],
                "NO_HP" => ["required"],
                "EMAIL" => ["required"],
            ],
            [
                "NO_KTP.required" => "Nomor KTP Harus Diisi",
                "NO_BPJS.required" => "Nomor BPJS Harus Diisi",
                "NO_NPWP.required" => "Nomor NPWP Harus Diisi",
                "TINGGI_BADAN.required" => "Tinggi Badan Harus Diisi",
                "BERAT_BADAN.required" => "Berat Badan Harus Diisi",
                "WARNA_KULIT.required" => "Warna Kulit Harus Diisi",
                "GOLONGAN_DARAH.required" => "Golongan Darah Harus Diisi",
                "ALAMAT_RUMAH.required" => "Alamat Harus Diisi",
                "KODE_POS.required" => "Kode Pos Harus Diisi",
                "TELPON_RUMAH.required" => "Telp Harus Diisi",
                "NO_HP.required" => "No Hp Harus Diisi",
                "EMAIL.required" => "Email Harus Diisi",
            ]
        );
        $updateData = DataPribadi::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NO_KTP' => $datapribadi->NO_KTP,
                'NO_BPJS' => $datapribadi->NO_BPJS,
                'NO_NPWP' => $datapribadi->NO_NPWP,
                'TINGGI_BADAN' => $datapribadi->TINGGI_BADAN,
                'BERAT_BADAN' => $datapribadi->BERAT_BADAN,
                'WARNA_KULIT' => $datapribadi->WARNA_KULIT,
                'GOLONGAN_DARAH' => $datapribadi->GOLONGAN_DARAH,
                'ALAMAT_RUMAH' => $datapribadi->ALAMAT_RUMAH,
                'KODE_POS' => $datapribadi->KODE_POS,
                'TELPON_RUMAH' => $datapribadi->TELPON_RUMAH,
                'NO_HP' => $datapribadi->NO_HP,
                'EMAIL' => $datapribadi->EMAIL
            ),
        );

    if ($updateData) {
        return redirect()->intended("/datapribadi/$datapribadi->pegawai_id")->with([ notify()->success('Data Pribadi Telah Diupdate'),
            'success' => 'Data Pribadi Telah Diupdate']);
    }
    return redirect()->intended("/datapribadi/$datapribadi->pegawai_id")->with([ notify()->error('Batal Mengupdate Data Pribadi'),
        'error' => 'Batal Mengupdate Data Pribadi']);
    }
}
