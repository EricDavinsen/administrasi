<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanController extends Controller
{
    public function index($id){
        $riwayatpendidikan = RiwayatPendidikan::where('pegawai_id', $id)->get();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("riwayatpendidikan")->with([
            'riwayatpendidikan' => $riwayatpendidikan,
            'pegawai' => $pegawai,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $riwayatpendidikan = RiwayatPendidikan::all();
        return view("tambah/tambahriwayatpendidikan")->with([
            'pegawai' => $pegawai,
            'riwayatpendidikan' => $riwayatpendidikan,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {

        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "NAMA_SEKOLAH" => ["required"],
                "JURUSAN" => ["required"],
                "TAHUN_LULUS" => ["required"],
                "STTB" => ["required"],
            ],
        );

        $riwayatpendidikan = RiwayatPendidikan::create([
            'pegawai_id' => $pegawai->id,
            'NAMA_SEKOLAH' => $request->NAMA_SEKOLAH,
            'JURUSAN' => $request->JURUSAN,
            'TAHUN_LULUS' => $request->TAHUN_LULUS,
            'STTB' => $request->STTB,
        ]);


        if ($riwayatpendidikan) {
            return redirect()
                ->intended("/riwayatpendidikan/$id")
                ->with([
                notify()->success('Riwayat Pendidikan Telah Ditambahkan'),
                "success" => "Riwayat Pendidikan Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdatapribadi/$id")
            ->with([
                notify()->error('Gagal Menambah Riwayat Pendidikan'),
                "error" => "Gagal Menambah Riwayat Pendidikan"]);
    
    }

    public function destroy($id)
    {
      
        $riwayatpendidikan = RiwayatPendidikan::where('id', $id);

            if ($riwayatpendidikan) {
                $riwayatpendidikan->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Riwayat Pendidikan Telah Dihapus'),
                        "success" => "Riwayat Pendidikan Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Riwayat Pendidikan'),
                        "error" => "Gagal Menghapus Riwayat Pendidikan"]);
            }
    }

    public function edit($id)
    {
        $riwayatpendidikan = RiwayatPendidikan::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editriwayatpendidikan")->with([
            'riwayatpendidikan' => $riwayatpendidikan,
            'pegawai' => $pegawai,
        ]);
    }

    public function update(Request $request, $id)
    {
        $riwayatpendidikan = RiwayatPendidikan::where('id', $id)->first();

        if ($request->NAMA_SEKOLAH) {
            $riwayatpendidikan->NAMA_SEKOLAH = $request->NAMA_SEKOLAH;
        }

        if ($request->JURUSAN) {
            $riwayatpendidikan->JURUSAN = $request->JURUSAN;
        }

        if ($request->TAHUN_LULUS) {
            $riwayatpendidikan->TAHUN_LULUS = $request->TAHUN_LULUS;
        }

        if ($request->STTB) {
            $riwayatpendidikan->STTB = $request->STTB;
        }

        $updateData = RiwayatPendidikan::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA_SEKOLAH' => $riwayatpendidikan->NAMA_SEKOLAH,
                'JURUSAN' => $riwayatpendidikan->JURUSAN,
                'TAHUN_LULUS' => $riwayatpendidikan->TAHUN_LULUS,
                'STTB' => $riwayatpendidikan->STTB
            ),
        );

    if ($updateData) {
        return redirect()->intended('/datapegawai')->with([ notify()->success('Riwayat Pendidikan Telah Diupdate'),
            'success' => 'Riwayat Pendidikan Telah Diupdate']);
    }
    return redirect()->intended('/datapegawai')->with([ notify()->error('Batal Mengupdate Riwayat Pendidikan'),
        'error' => 'Batal Mengupdate Riwayat Pendidikan']);
    }
}
