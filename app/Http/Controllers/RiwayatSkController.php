<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\RiwayatSk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatSkController extends Controller
{
    public function index($id){
        $riwayatsk = RiwayatSk::where('pegawai_id', $id)->latest()->get();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("riwayatsk")->with([
            'riwayatsk' => $riwayatsk,
            'pegawai' => $pegawai,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $riwayatsk = RiwayatSk::all();
        return view("tambah/tambahriwayatsk")->with([
            'pegawai' => $pegawai,
            'riwayatsk' => $riwayatsk,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "JABATAN" => ["required"],
                "NOMOR_SK" => ["required"],
                "TANGGAL_SK" => ["required"],
            ],
        );


        $riwayatsk = RiwayatSk::create([
            'pegawai_id' => $pegawai->id,
            'JABATAN' => $request->JABATAN,
            'NOMOR_SK' => $request->NOMOR_SK,
            'TANGGAL_SK' => $request->TANGGAL_SK,
        ]);


        if ($riwayatsk) {
            return redirect()
                ->intended("/riwayatsk/$id")
                ->with([
                notify()->success('Riwayat SK Telah Ditambahkan'),
                "success" => "Riwayat SK Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createriwayatsk/$id")
            ->with([
                notify()->error('Gagal Menambah Riwayat SK'),
                "error" => "Gagal Menambah Riwayat SK"]);
    
    }

    public function destroy($id)
    {

        $deletefile = RiwayatSk::findorfail($id);
        $file = public_path('document/'.$deletefile->SERTIFIKAT);

        if (file_exists($file)) {
            @unlink($file);
        }
      
        $riwayatsk = RiwayatSk::where('id', $id);

            if ($riwayatsk) {
                $riwayatsk->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Riwayat SK Telah Dihapus'),
                        "success" => "Riwayat SK Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Riwayat SK'),
                        "error" => "Gagal Menghapus Riwayat SK"]);
            }
    }

    public function edit($id)
    {
        $riwayatsk = RiwayatSk::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editriwayatsk")->with([
            'riwayatsk' => $riwayatsk,
            'pegawai' => $pegawai
        ]);
    }

    public function update(Request $request, $id)
    {
        $riwayatsk = RiwayatSk::where('id', $id)->first();

        if ($request->JABATAN) {
            $riwayatsk->JABATAN = $request->JABATAN;
        }

        if ($request->NOMOR_SK) {
            $riwayatsk->NOMOR_SK = $request->NOMOR_SK;
        }

        if ($request->TANGGAL_SK) {
            $riwayatsk->TANGGAL_SK = $request->TANGGAL_SK;
        }

        $updateData = RiwayatSk::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'JABATAN' => $riwayatsk->JABATAN,
                'NOMOR_SK' => $riwayatsk->NOMOR_SK,
                'TANGGAL_SK' => $riwayatsk->TANGGAL_SK,
            ),
        );

    if ($updateData) {
        return redirect()->intended("/riwayatsk/$id")->with([ notify()->success('Riwayat SK Telah Diupdate'),
            'success' => 'Riwayat SK Telah Diupdate']);
    }
    return redirect()->intended("/riwayatsk/$id")->with([ notify()->error('Batal Mengupdate Riwayat SK'),
        'error' => 'Batal Mengupdate Riwayat SK']);
    }
}
