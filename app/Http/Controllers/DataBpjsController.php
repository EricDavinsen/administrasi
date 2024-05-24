<?php

namespace App\Http\Controllers;

use App\Exports\ExportDataBpjs;
use App\Models\Pegawai;
use App\Models\DataBpjs;
use App\Models\DataPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataBpjsController extends Controller
{
    public function index($id){
        $databpjs = DataBpjs::where('pegawai_id', $id)->get();
        $pegawai = Pegawai::where('id', $id)->first();
        
        return view("databpjs")->with([
            'databpjs' => $databpjs,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $databpjs = DataBpjs::all();
        return view("tambah/tambahdatabpjs")->with([
            'pegawai' => $pegawai,
            'databpjs' => $databpjs,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function store( Request $request, $id)
    {

        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "NOMOR_JKN" => ["required"],
                "NIK" => ["required"],
                "NAMA_LENGKAP" => ["required"],
                "JENIS_KELAMIN" => ["required"],
                "STATUS_KAWIN" => ["required"],
                "HUBUNGAN_KELUARGA" => ["required"],
                "TANGGAL_LAHIR" => ["required"],
            ],
        );

            $databpjs = DataBpjs::create([
                'pegawai_id' => $pegawai->id,
                'NOMOR_JKN' => $request->NOMOR_JKN,
                'NIK' => $request->NIK,
                'NIP' => $request->NIP,
                'NAMA_LENGKAP' => $request->NAMA_LENGKAP,
                'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
                'STATUS_KAWIN' => $request->STATUS_KAWIN,
                'HUBUNGAN_KELUARGA' => $request->HUBUNGAN_KELUARGA,
                'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
                'TANGGAL_MULAI_TMT' => $request->TANGGAL_MULAI_TMT,
                'TANGGAL_SELESAI_TMT' => $request->TANGGAL_SELESAI_TMT,
                'GAJI_POKOK' => $request->GAJI_POKOK,
                'NAMA_FASKES' => $request->NAMA_FASKES,
                "NO_TELEPON" => $request->NO_TELEPON,
            ]);

        if ($databpjs) {
            return redirect()
                ->intended("/databpjs/$id")
                ->with([
                notify()->success('Data Bpjs Telah Ditambahkan'),
                "success" => "Data Bpjs Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdatabpjs/$id")
            ->with([
                notify()->error('Gagal Menambah Data Bpjs'),
                "error" => "Gagal Menambah Data Bpjs"]);
    
    }

    public function destroy($id)
    {
      
        $databpjs = DataBpjs::where('id', $id);

            if ($databpjs) {
                $databpjs->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Data Bpjs Telah Dihapus'),
                        "success" => "Data Bpjs Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Data Bpjs'),
                        "error" => "Gagal Menghapus Data Bpjs"]);
            }
    }

    public function edit($id)
    {
        $databpjs = DataBpjs::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editdatabpjs")->with([
            'databpjs' => $databpjs,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $databpjs = DataBpjs::where('id', $id)->first();

        if ($request->NOMOR_JKN) {
            $databpjs->NOMOR_JKN = $request->NOMOR_JKN;
        }

        if($request->NIK) {
            $databpjs->NIK = $request->NIK;
        }

        if ($request->NIP) {
            $databpjs->NIP = $request->NIP;
        }

        if ($request->NAMA_LENGKAP) {
            $databpjs->NAMA_LENGKAP = $request->NAMA_LENGKAP;
        }

        if ($request->JENIS_KELAMIN) {
            $databpjs->JENIS_KELAMIN = $request->JENIS_KELAMIN;
        }

        if ($request->STATUS_KAWIN) {
            $databpjs->STATUS_KAWIN = $request->STATUS_KAWIN;
        }

        if ($request->HUBUNGAN_KELUARGA) {
            $databpjs->HUBUNGAN_KELUARGA = $request->HUBUNGAN_KELUARGA;
        }

        if ($request->TANGGAL_LAHIR) {
            $databpjs->TANGGAL_LAHIR = $request->TANGGAL_LAHIR;
        }

        if ($request->TANGGAL_MULAI_TMT) {
            $databpjs->TANGGAL_MULAI_TMT = $request->TANGGAL_MULAI_TMT;
        }

        if ($request->TANGGAL_SELESAI_TMT) {
            $databpjs->TANGGAL_SELESAI_TMT = $request->TANGGAL_SELESAI_TMT;
        }

        if ($request->GAJI_POKOK) {
            $databpjs->GAJI_POKOK = $request->GAJI_POKOK;
        }

        if ($request->NAMA_FASKES) {
            $databpjs->NAMA_FASKES = $request->NAMA_FASKES;
        }

        if ($request->NO_TELEPON) {
            $databpjs->NO_TELEPON = $request->NO_TELEPON;
        }

        $updateData = DataBpjs::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NOMOR_JKN' => $databpjs->NOMOR_JKN,
                'NIK' => $databpjs->NIK,
                'NIP' => $databpjs->NIP,
                'NAMA_LENGKAP' => $databpjs->NAMA_LENGKAP,
                'JENIS_KELAMIN' => $databpjs->JENIS_KELAMIN,
                'STATUS_KAWIN' => $databpjs->STATUS_KAWIN,
                'HUBUNGAN_KELUARGA' => $databpjs->HUBUNGAN_KELUARGA,
                'TANGGAL_LAHIR' => $databpjs->TANGGAL_LAHIR,
                'TANGGAL_MULAI_TMT' => $databpjs->TANGGAL_MULAI_TMT,
                'TANGGAL_SELESAI_TMT' => $databpjs->TANGGAL_SELESAI_TMT,
                'GAJI_POKOK' => $databpjs->GAJI_POKOK,
                'NAMA_FASKES' => $databpjs->NAMA_FASKES,
                'NO_TELEPON' => $databpjs->NO_TELEPON,
            ),
        );

    if ($updateData) {
        return redirect()->intended("/databpjs/$databpjs->pegawai_id")->with([ notify()->success('Data Bpjs Telah Diupdate'),
            'success' => 'Data Bpjs Telah Diupdate']);
    }
    return redirect()->intended("/databpjs/$databpjs->pegawai_id")->with([ notify()->error('Batal Mengupdate Data Bpjs'),
        'error' => 'Batal Mengupdate Data Bpjs']);
    }

    function export_excel($id)
    {
        return Excel::download(new ExportDataBpjs, 'databpjs.xlsx');
    }
}
