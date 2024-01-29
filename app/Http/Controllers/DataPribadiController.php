<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\View\View;
use App\Models\DataPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPribadiController extends Controller
{
    public function index($id){
        $datapribadi = DataPribadi::where('pegawai_id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("datapribadi")->with([
            'datapribadi' => $datapribadi,
            'pegawai' => $pegawai,
            'admin' => Auth::guard('admin')->user() 
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
                'admin' => Auth::guard('admin')->user() 
            ]);
        }
        return view("datapribadi")->with([
            'pegawai' => $pegawai,
            'datapribadi' => $datapribadi,
            'admin' => Auth::guard('admin')->user() 
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
            'pegawai' => $pegawai
        ]);
    }

    public function update(Request $request, $id)
    {
        $datapribadi = DataPribadi::where('id', $id)->first();

        if ($request->NO_KTP) {
            $datapribadi->NO_KTP = $request->NO_KTP;
        }

        if ($request->NO_BPJS) {
            $datapribadi->NO_BPJS = $request->NO_BPJS;
        }

        if ($request->NO_NPWP) {
            $datapribadi->NO_NPWP = $request->NO_NPWP;
        }

        if ($request->TINGGI_BADAN) {
            $datapribadi->TINGGI_BADAN = $request->TINGGI_BADAN;
        }

        if ($request->BERAT_BADAN) {
            $datapribadi->BERAT_BADAN = $request->BERAT_BADAN;
        }

        if ($request->WARNA_KULIT) {
            $datapribadi->WARNA_KULIT = $request->WARNA_KULIT;
        }

        if ($request->GOLONGAN_DARAH) {
            $datapribadi->GOLONGAN_DARAH = $request->GOLONGAN_DARAH;
        }

        if ($request->ALAMAT_RUMAH) {
            $datapribadi->ALAMAT_RUMAH = $request->ALAMAT_RUMAH;
        }

        if ($request->KODE_POS) {
            $datapribadi->KODE_POS = $request->KODE_POS;
        }

        if ($request->TELPON_RUMAH) {
            $datapribadi->TELPON_RUMAH = $request->TELPON_RUMAH;
        }

        if ($request->NO_HP) {
            $datapribadi->NO_HP = $request->NO_HP;
        }

        if ($request->EMAIL) {
            $datapribadi->EMAIL = $request->EMAIL;
        }

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
        return redirect()->intended('/datapegawai')->with([ notify()->success('Data Pribadi Telah Diupdate'),
            'success' => 'Data Pribadi Telah Diupdate']);
    }
    return redirect()->intended('/datapegawai')->with([ notify()->error('Batal Mengupdate Data Pribadi'),
        'error' => 'Batal Mengupdate Data Pribadi']);
    }
}
