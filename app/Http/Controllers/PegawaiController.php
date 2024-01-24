<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index($id){
        $pegawai = Pegawai::where('id', $id)->first();
       return view("dashboardpegawai")->with([
         'admin' => Auth::guard('admin')->user(),
         'pegawai' => $pegawai
       ]);
    }

    public function indexpegawai(){
        $pegawai = Pegawai::latest()->paginate(5);

        return view("datapegawai")->with([
            'pegawai' => $pegawai
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahpegawai");
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "NAMA_PEGAWAI" => ["required"],
                "NIK" => ["required"],
                "TANGGAL_LAHIR" => ["required"],
                "JENIS_KELAMIN" => ["required"],
                "AGAMA" => ["required"],
                "INSTANSI" => ["required"],
                "UNIT" => ["required"],
                "JABATAN" => ["required"],
                "JENIS_PEGAWAI" => ["required"],
                "PENDIDIKAN_TERAKHIR" => ["required"],
                "STATUS_PEGAWAI" => ["required"],
                "KEDUDUKAN" => ["required"],
            ],
        );

        $pegawaidata = $request->all();
        $pegawai = Pegawai::create($pegawaidata);

        if ($pegawai) {
            return redirect()
                ->intended("/datapegawai")
                ->with([
                notify()->success('Surat Masuk Telah Ditambahkan'),
                "success" => "Surat Masuk Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createpegawai")
            ->with([
                notify()->error('Gagal Menambah Surat Masuk'),
                "error" => "Gagal Menambah Surat Masuk"]);
    }

    public function destroy($id)
    {
        $deletefile = Pegawai::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_SURAT);

        if (file_exists($file)) {
            @unlink($file);
        }

        $pegawai = Pegawai::where('id', $id);

            if ($pegawai) {
                $pegawai->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Pegawai Telah Dihapus'),
                        "success" => "Pegawai Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Pegawai'),
                        "error" => "Gagal Menghapus Pegawai"]);
            }
    }

    public function edit($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editpegawai")->with([
            'pegawai' => $pegawai,
        ]);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::where('id', $id)->first();

        if ($request->NAMA_PEGAWAI) {
            $pegawai->NAMA_PEGAWAI = $request->NAMA_PEGAWAI;
        }
        if ($request->NIK) {
            $pegawai->NIK = $request->NIK;
        }
        if ($request->TANGGAL_LAHIR) {
            $pegawai->TANGGAL_LAHIR = $request->TANGGAL_LAHIR;
        }
        if ($request->JENIS_KELAMIN) {
            $pegawai->JENIS_KELAMIN = $request->JENIS_KELAMIN;
        }
        if ($request->AGAMA) {
            $pegawai->AGAMA = $request->AGAMA;
        }
        if ($request->INSTANSI) {
            $pegawai->INSTANSI = $request->INSTANSI;
        }
        if ($request->UNIT) {
            $pegawai->UNIT = $request->UNIT;
        }
        if ($request->SUB_UNIT) {
            $pegawai->SUB_UNIT = $request->SUB_UNIT;
        }
        if ($request->JABATAN) {
            $pegawai->JABATAN = $request->JABATAN;
        }
        if ($request->JENIS_PEGAWAI) {
            $pegawai->JENIS_PEGAWAI = $request->JENIS_PEGAWAI;
        }
        if ($request->PENDIDIKAN_TERAKHIR) {
            $pegawai->PENDIDIKAN_TERAKHIR = $request->PENDIDIKAN_TERAKHIR;
        }
        if ($request->STATUS_PEGAWAI) {
            $pegawai->STATUS_PEGAWAI = $request->STATUS_PEGAWAI;
        }
        if ($request->KEDUDUKAN) {
            $pegawai->KEDUDUKAN = $request->KEDUDUKAN;
        }
        $updateSurat = Pegawai::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA_PEGAWAI' => $pegawai->NAMA_PEGAWAI,
                'NIK' => $pegawai->NIK,
                'TANGGAL_LAHIR' => $pegawai->TANGGAL_LAHIR,
                'JENIS_KELAMIN' => $pegawai->JENIS_KELAMIN,
                'AGAMA' => $pegawai->AGAMA,
                'INSTANSI' => $pegawai->INSTANSI,
                'UNIT' => $pegawai->UNIT,
                'SUB_UNIT' => $pegawai->SUB_UNIT,
                'JABATAN' => $pegawai->JABATAN,
                'JENIS_PEGAWAI' => $pegawai->JENIS_PEGAWAI,
                'PENDIDIKAN_TERAKHIR' => $pegawai->PENDIDIKAN_TERAKHIR,
                'STATUS_PEGAWAI' => $pegawai->STATUS_PEGAWAI,
                'KEDUDUKAN' => $pegawai->KEDUDUKAN,
            ),
        );

    if ($updateSurat) {
        return redirect()->intended('/datapegawai')->with([ notify()->success('Pegawai Telah Diupdate'),
            'success' => 'Pegawai Telah Diupdate']);
    }
    return redirect()->intended('/editpegawai')->with([ notify()->error('Batal Mengupdate Pegawai'),
        'error' => 'Batal Mengupdate Pegawai']);

    }

    public function find(Request $request)
    {
        $pegawai = Pegawai::where('NAMA_PEGAWAI', 'like', '%' . $request->search . '%')
            ->orWhere('NIK', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_LAHIR', 'like', '%' . $request->search . '%')
            ->orWhere('JENIS_KELAMIN', 'like', '%' . $request->search . '%')
            ->orWhere('INSTANSI', 'like', '%' . $request->search . '%')
            ->orWhere('JABATAN', 'like', '%' . $request->search . '%')
            ->orWhere('STATUS_PEGAWAI', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $pegawai->appends(['search' => $request->search]);

        return view("datapegawai")->with([
            'datapegawai' => $pegawai
        ]);
    }
}
