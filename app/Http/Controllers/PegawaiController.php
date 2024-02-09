<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\Pegawai;
use App\Models\RiwayatSk;
use Illuminate\View\View;
use App\Models\DataPribadi;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use App\Exports\ExportPegawai;
use App\Imports\ImportPegawai;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
        $pegawai = Pegawai::paginate(5);

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
                "FOTO_PEGAWAI" => ["required"],
            ],
        );

        if ($request->hasFile('FOTO_PEGAWAI')) {
            $document = $request->file('FOTO_PEGAWAI');
            $fileName = $request->file("FOTO_PEGAWAI")->getClientOriginalName();
            $document->move('document/', $fileName);
            $pegawai = Pegawai::create([
                'NAMA_PEGAWAI' => $request->NAMA_PEGAWAI,
                'NIK' => $request->NIK,
                "NO_KK" => $request->NO_KK,
                'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
                'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
                'AGAMA' => $request->AGAMA,
                'INSTANSI' => $request->INSTANSI,
                'UNIT' => $request->UNIT,
                'SUB_UNIT' => $request->SUB_UNIT,
                'JABATAN' => $request->JABATAN,
                'JENIS_PEGAWAI' => $request->JENIS_PEGAWAI,
                'PENDIDIKAN_TERAKHIR' => $request->PENDIDIKAN_TERAKHIR,
                'STATUS_PEGAWAI' => $request->STATUS_PEGAWAI,
                'KEDUDUKAN' => $request->KEDUDUKAN,
                'FOTO_PEGAWAI' => $fileName,
            ]);
        }else{
            $pegawai = Pegawai::create([
                'NAMA_PEGAWAI' => $request->NAMA_PEGAWAI,
                'NIK' => $request->NIK,
                "NO_KK" => $request->NO_KK,
                'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
                'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
                'AGAMA' => $request->AGAMA,
                'INSTANSI' => $request->INSTANSI,
                'UNIT' => $request->UNIT,
                'SUB_UNIT' => $request->SUB_UNIT,
                'JABATAN' => $request->JABATAN,
                'JENIS_PEGAWAI' => $request->JENIS_PEGAWAI,
                'PENDIDIKAN_TERAKHIR' => $request->PENDIDIKAN_TERAKHIR,
                'STATUS_PEGAWAI' => $request->STATUS_PEGAWAI,
                'KEDUDUKAN' => $request->KEDUDUKAN,
                'FOTO_PEGAWAI' => $request->FOTO_PEGAWAI,
            ]);
        }

        if ($pegawai) {
            return redirect()
                ->intended("/datapegawai")
                ->with([
                notify()->success('Pegawai Telah Ditambahkan'),
                "success" => "Pegawai Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createpegawai")
            ->with([
                notify()->error('Gagal Menambah Pegawai'),
                "error" => "Gagal Menambah Pegawai"]);
    }

    public function destroy($id)
    {
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
        if ($request->NO_KK) {
            $pegawai->NO_KK = $request->NO_KK;
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
        if ($request->FOTO_PEGAWAI) {
            $pegawai->FOTO_PEGAWAI = $request->FOTO_PEGAWAI;
        }
        $updateSurat = Pegawai::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA_PEGAWAI' => $pegawai->NAMA_PEGAWAI,
                'NIK' => $pegawai->NIK,
                'NO_KK' => $pegawai->NO_KK,
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
                'FOTO_PEGAWAI' => $pegawai->FOTO_PEGAWAI,
            ),
        );

        if ($request->hasFile('FOTO_PEGAWAI')) {
            $updatefile = Pegawai::find($id);
            $document = $request->file('FOTO_PEGAWAI');
            $fileName = $request->file("FOTO_PEGAWAI")->getClientOriginalName();
            $document->move('document/', $fileName);
            $exist_file = $updatefile['FOTO_PEGAWAI'];
            $update['FOTO_PEGAWAI'] =  $fileName;
            $updatefile->update($update);
        }
       
        if (isset($exist_file) && file_exists($exist_file)) {
            unlink($exist_file);
        }

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
            ->orWhere('TANGGAL_LAHIR', 'like', '%' . $request->search . '%')
            ->orWhere('JENIS_KELAMIN', 'like', '%' . $request->search . '%')
            ->orWhere('INSTANSI', 'like', '%' . $request->search . '%')
            ->orWhere('JABATAN', 'like', '%' . $request->search . '%')
            ->orWhere('STATUS_PEGAWAI', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $pegawai->appends(['search' => $request->search]);

        return view("datapegawai")->with([
            'pegawai' => $pegawai
        ]);
    }

    function export_excel()
    {
        return Excel::download(new ExportPegawai, 'datapegawai.xlsx');
    }

    // function import_excel(Request $request)
    // {
    //     $data = $request->file('file');
    //     $fileName = $data->getClientOriginalName();
    //     $data->move('document/', $fileName);
    //     Excel::import(new ImportPegawai, public_path('/document/' . $fileName));
    //     return redirect()->back();
    // }

    public function create($id){
        $pegawai = Pegawai::where('id', $id)->first();
        $riwayatsk = RiwayatSk::where('pegawai_id', $id)->latest()->get();
        $riwayatpendidikan = RiwayatPendidikan::where('pegawai_id', $id)->latest()->get();
        $diklat = Diklat::where('pegawai_id', $id)->latest()->get();
        $datakeluarga = DataKeluarga::where('pegawai_id', $id)->get();
        $datapribadi = DataPribadi::where('pegawai_id', $id)->first();

        if($datapribadi == null){
            return view("tambah/tambahdatapribadi")->with([
                'pegawai' => $pegawai,
                'datapribadi' => $datapribadi,
                'admin' => Auth::guard('admin')->user(),
                notify()->error('Isi Data Pribadi Terlebih Dahulu'),
                'error' => 'Isi Data Pribadi Terlebih Dahulu'
            ]);
        }

        return view('tampil/cetakinformasi')->with([
            'pegawai' => $pegawai,
            'riwayatsk' => $riwayatsk,
            'riwayatpendidikan' => $riwayatpendidikan,
            'diklat' => $diklat,
            'datakeluarga' => $datakeluarga,
            'datapribadi' => $datapribadi
        ]);
    }
}
