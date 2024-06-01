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
         'users' => Auth::guard('users')->user(),
         'pegawai' => $pegawai
       ]);
    }

    public function indexpegawai(){
        $pegawai = Pegawai::orderBy('NAMA_PEGAWAI', 'asc')->get();

        return view("datapegawai")->with([
            'users' => Auth::guard('users')->user(),
            'pegawai' => $pegawai
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahpegawai")->with([
            'users' => Auth::guard('users')->user(),
        ]);
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
                "JABATAN_PEGAWAI" => ["required"],
                "JENIS_PEGAWAI" => ["required"],
                "PENDIDIKAN_TERAKHIR" => ["required"],
                "STATUS_PEGAWAI" => ["required"],
                "KEDUDUKAN" => ["required"],
                "FOTO_PEGAWAI" => ["required"],
            ],
            [
                "NAMA_PEGAWAI.required" => "Nama Harus Diisi",
                "NIK.required" => "NIK Harus Diisi",
                "TANGGAL_LAHIR.required" => "Tangal Lahir Harus Diisi",
                "JENIS_KELAMIN.required" => "Jenis Kelamin Harus Diisi",
                "AGAMA.required" => "Agama Harus Diisi",
                "INSTANSI.required" => "Instansi Harus Diisi",
                "UNIT.required" => "Unit Harus Diisi",
                "JABATAN_PEGAWAI.required" => "Jabatan Harus Diisi",
                "JENIS_PEGAWAI.required" => "Jenis Harus Diisi",
                "PENDIDIKAN_TERAKHIR.required" => "Pendidikan Harus Diisi",
                "STATUS_PEGAWAI.required" => "Status Harus Diisi",
                "KEDUDUKAN.required" => "Kedudukan Harus Diisi",
                "FOTO_PEGAWAI.required" => "Foto Harus Diisi",
            ]
        );

        if ($request->hasFile('FOTO_PEGAWAI')) {
            $document = $request->file('FOTO_PEGAWAI');
            $fileName = $request->file("FOTO_PEGAWAI")->getClientOriginalName();
            $document->move('images/', $fileName);
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
                'JABATAN_PEGAWAI' => $request->JABATAN_PEGAWAI,
                'JENIS_PEGAWAI' => $request->JENIS_PEGAWAI,
                'PENDIDIKAN_TERAKHIR' => $request->PENDIDIKAN_TERAKHIR,
                'STATUS_PEGAWAI' => $request->STATUS_PEGAWAI,
                'KEDUDUKAN' => $request->KEDUDUKAN,
                'SISA_CUTI_TAHUNAN' => 6,
                'FOTO_PEGAWAI' => $fileName,
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
            'users' => Auth::guard('users')->user(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::where('id', $id)->first();

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
                "JABATAN_PEGAWAI" => ["required"],
                "JENIS_PEGAWAI" => ["required"],
                "PENDIDIKAN_TERAKHIR" => ["required"],
                "STATUS_PEGAWAI" => ["required"],
                "KEDUDUKAN" => ["required"],
            ],
            [
                "NAMA_PEGAWAI.required" => "Nama Harus Diisi",
                "NIK.required" => "NIK Harus Diisi",
                "TANGGAL_LAHIR.required" => "Tangal Lahir Harus Diisi",
                "JENIS_KELAMIN.required" => "Jenis Kelamin Harus Diisi",
                "AGAMA.required" => "Agama Harus Diisi",
                "INSTANSI.required" => "Instansi Harus Diisi",
                "UNIT.required" => "Unit Harus Diisi",
                "JABATAN_PEGAWAI.required" => "Jabatan Harus Diisi",
                "JENIS_PEGAWAI.required" => "Jenis Harus Diisi",
                "PENDIDIKAN_TERAKHIR.required" => "Pendidikan Harus Diisi",
                "STATUS_PEGAWAI.required" => "Status Harus Diisi",
                "KEDUDUKAN.required" => "Kedudukan Harus Diisi",
            ]
        );

        $updateSurat = Pegawai::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA_PEGAWAI' => $request->NAMA_PEGAWAI,
                'NIK' => $request->NIK,
                'NO_KK' => $request->NO_KK,
                'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
                'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
                'AGAMA' => $request->AGAMA,
                'INSTANSI' => $request->INSTANSI,
                'UNIT' => $request->UNIT,
                'SUB_UNIT' => $request->SUB_UNIT,
                'JABATAN_PEGAWAI' => $request->JABATAN_PEGAWAI,
                'JENIS_PEGAWAI' => $request->JENIS_PEGAWAI,
                'PENDIDIKAN_TERAKHIR' => $request->PENDIDIKAN_TERAKHIR,
                'STATUS_PEGAWAI' => $request->STATUS_PEGAWAI,
                'KEDUDUKAN' => $request->KEDUDUKAN,
                'FOTO_PEGAWAI' => $pegawai->FOTO_PEGAWAI,
            ),
        );

        if ($request->hasFile('FOTO_PEGAWAI')) {
            $updatefile = Pegawai::find($id);
            $document = $request->file('FOTO_PEGAWAI');
            $fileName = $request->file("FOTO_PEGAWAI")->getClientOriginalName();
            $document->move('images/', $fileName);
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
            ->orWhereRaw("DATE_FORMAT(TANGGAL_LAHIR, '%d-%m-%Y') LIKE ?", ["%" . $request->search . "%"])
            ->orWhere('JENIS_KELAMIN', 'like', '%' . $request->search . '%')
            ->orWhere('INSTANSI', 'like', '%' . $request->search . '%')
            ->orWhere('JABATAN_PEGAWAI', 'like', '%' . $request->search . '%')
            ->orWhere('STATUS_PEGAWAI', 'like', '%' . $request->search . '%')
            ->get();
        $pegawai->appends(['search' => $request->search]);

        return view("datapegawai")->with([
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    function export_excel()
    {
        return Excel::download(new ExportPegawai, 'datapegawai.xlsx');
    }

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
                'users' => Auth::guard('users')->user(),
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
            'datapribadi' => $datapribadi,
            'users' => Auth::guard('users')->user(),
        ]);
    }
}
