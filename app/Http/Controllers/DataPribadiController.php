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
        $datapribadi = DataPribadi::all();
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
        return view("tambah/tambahdatapribadi")->with([
            'pegawai' => $pegawai,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {

        $pegawai = Pegawai::where('id', $request->id)->first();
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
            'pegawai_id' => $pegawai,
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
                ->intended("/datapribadi")
                ->with([
                notify()->success('Data Pribadi Telah Ditambahkan'),
                "success" => "Data Pribadi Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdatapribadi")
            ->with([
                notify()->error('Gagal Menambah Data Pribadi'),
                "error" => "Gagal Menambah Data Pribadi"]);
    
    }
    
}
