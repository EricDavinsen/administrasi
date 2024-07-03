<?php

namespace App\Http\Controllers;

use App\Exports\ExportDataKeluarga;
use App\Models\Pegawai;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataKeluargaController extends Controller
{
    public function index($id){
        $datakeluarga = DataKeluarga::where('pegawai_id', $id)->orderBy('TANGGAL_LAHIR', 'asc')->get();
        $pegawai = Pegawai::where('id', $id)->first();
        
        return view("datakeluarga")->with([
            'datakeluarga' => $datakeluarga,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $datakeluarga = DataKeluarga::all();
        return view("tambah/tambahdatakeluarga")->with([
            'pegawai' => $pegawai,
            'datakeluarga' => $datakeluarga,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function store( Request $request, $id)
    {

        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "NAMA_KELUARGA" => ["required"],
                "TANGGAL_LAHIR" => ["required"],
                "JENIS_KELAMIN" => ["required"],
                "STATUS" => ["required"],
            ],
            [
                "NAMA_KELUARGA.required" => "Nama Harus Diisi",
                "TANGGAL_LAHIR.required" => "Tangal Lahir Harus Diisi",
                "JENIS_KELAMIN.required" => "Jenis Kelamin Harus Diisi",
                "STATUS.required" => "Status Harus Diisi",
            ]
        );

            $datakeluarga = DataKeluarga::create([
                'pegawai_id' => $pegawai->id,
                'NAMA_KELUARGA' => $request->NAMA_KELUARGA,
                'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
                'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
                'STATUS' => $request->STATUS,
                'PEKERJAAN' => $request->PEKERJAAN,
                'NO_TELEPON' => $request->NO_TELEPON,
            ]);

        if ($datakeluarga) {
            return redirect()
                ->intended("/datakeluarga/$id")
                ->with([
                notify()->success('Data Keluarga Telah Ditambahkan'),
                "success" => "Data Keluarga Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdatakeluarga/$id")
            ->with([
                notify()->error('Gagal Menambah Data Keluarga'),
                "error" => "Gagal Menambah Data Keluarga"]);
    
    }

    public function destroy($id)
    {
      
        $datakeluarga = DataKeluarga::where('id', $id);

            if ($datakeluarga) {
                $datakeluarga->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Data Keluarga Telah Dihapus'),
                        "success" => "Data Keluarga Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Data Keluarga'),
                        "error" => "Gagal Menghapus Data Keluarga"]);
            }
    }

    public function edit($id)
    {
        $datakeluarga = DataKeluarga::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editdatakeluarga")->with([
            'datakeluarga' => $datakeluarga,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $datakeluarga = DataKeluarga::where('id', $id)->first();

        $this->validate($request,
            [
                "NAMA_KELUARGA" => ["required"],
                "TANGGAL_LAHIR" => ["required"],
                "JENIS_KELAMIN" => ["required"],
                "STATUS" => ["required"],
            ],
            [
                "NAMA_KELUARGA.required" => "Nama Harus Diisi",
                "TANGGAL_LAHIR.required" => "Tangal Lahir Harus Diisi",
                "JENIS_KELAMIN.required" => "Jenis Kelamin Harus Diisi",
                "STATUS.required" => "Status Harus Diisi",
            ]
        );

        $updateData = DataKeluarga::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA_KELUARGA' => $request->NAMA_KELUARGA,
                'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
                'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
                'STATUS' => $request->STATUS,
                'PEKERJAAN' => $request->PEKERJAAN,
                'NO_TELEPON' => $request->NO_TELEPON,
            ),
        );

    if ($updateData) {
        return redirect()->intended("/datakeluarga/$datakeluarga->pegawai_id")->with([ notify()->success('Data Keluarga Telah Diupdate'),
            'success' => 'Data Keluarga Telah Diupdate']);
    }
    return redirect()->intended("/datakeluarga/$datakeluarga->pegawai_id")->with([ notify()->error('Batal Mengupdate Data Keluarga'),
        'error' => 'Batal Mengupdate Data Keluarga']);
    }

    function export_excel($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        return Excel::download(new ExportDataKeluarga, 'Data_Keluarga_'.$pegawai->NAMA_PEGAWAI.'.xlsx');
    }
}
