<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\DataBpjs;
use App\Models\DataPribadi;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use App\Exports\ExportDataBpjs;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataBpjsController extends Controller
{
    public function index($id){
        $databpjs = DataBpjs::where('pegawai_id', $id)->get();
        $pegawai = Pegawai::where('id', $id)->first();
        $datakeluarga = DataKeluarga::where('pegawai_id', $id)->get();
        
        return view("databpjs")->with([
            'databpjs' => $databpjs,
            'pegawai' => $pegawai,
            'datakeluarga' => $datakeluarga,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $usedKeluargaIds = DataBpjs::where('pegawai_id', $id)->pluck('keluarga_id')->toArray();
        $datakeluarga = DataKeluarga::where('pegawai_id', $id)
            ->whereNotIn('id', $usedKeluargaIds)
            ->get();
    
        return view("tambah/tambahdatabpjs")->with([
            'pegawai' => $pegawai,
            'datakeluarga' => $datakeluarga,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function store(Request $request, $id)
{
    $pegawai = Pegawai::where('id', $id)->first();
    $this->validate($request,
        [
            'NOMOR_JKN' => 'required',
            'NIK' => 'required',
            'STATUS_KAWIN' => 'required',
        ],
        [
            "NOMOR_JKN.required" => "Nomor JKN Harus Diisi",
            "NIK.required" => "NIK Harus Diisi",
            "STATUS_KAWIN.required" => "Status Kawin Harus Diisi",
        ]
    );

    $databpjs = DataBpjs::create([
        'pegawai_id' => $pegawai->id,
        'keluarga_id' => $request->keluarga_id,
        'NOMOR_JKN' => $request->NOMOR_JKN,
        'NIK' => $request->NIK,
        'NIP' => $request->NIP,
        'STATUS_KAWIN' => $request->STATUS_KAWIN,
        'TANGGAL_MULAI_TMT' => $request->TANGGAL_MULAI_TMT,
        'TANGGAL_SELESAI_TMT' => $request->TANGGAL_SELESAI_TMT,
        'GAJI_POKOK' => $request->GAJI_POKOK,
        'NAMA_FASKES' => $request->NAMA_FASKES,
    ]);

    if ($databpjs) {
        return redirect()
            ->intended("/databpjs/$id")
            ->with([
                notify()->success('Data Bpjs Telah Ditambahkan'),
                "success" => "Data Bpjs Telah Ditambahkan"
            ]);
    }

    return redirect()
        ->intended("/createdatabpjs/$id")
        ->with([
            notify()->error('Gagal Menambah Data Bpjs'),
            "error" => "Gagal Menambah Data Bpjs"
        ]);
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
        $databpjs = DataBpjs::findOrFail($id);
        $pegawai = Pegawai::with('keluarga')->findOrFail($databpjs->pegawai_id);
        $datakeluarga = DataKeluarga::where('pegawai_id', $databpjs->pegawai_id)->get();
    
        $usedKeluargaIds = DataBpjs::where('id', '!=', $id)->pluck('keluarga_id')->toArray();
    
        return view('edit.editdatabpjs', [
            'databpjs' => $databpjs,
            'pegawai' => $pegawai,
            'datakeluarga' => $datakeluarga,
            'usedKeluargaIds' => $usedKeluargaIds,
            'users' => Auth::guard('users')->user()
        ]);
    }
    

    public function update(Request $request, $id)
    {
        $databpjs = DataBpjs::where('id', $id)->first();

        $this->validate($request,
        [
            'NOMOR_JKN' => 'required',
            'NIK' => 'required',
            'STATUS_KAWIN' => 'required',
        ],
        [
            "NOMOR_JKN.required" => "Nomor JKN Harus Diisi",
            "NIK.required" => "NIK Harus Diisi",
            "STATUS_KAWIN.required" => "Status Kawin Harus Diisi",
        ]
        );

        $updateData = DataBpjs::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'keluarga_id' => $request->keluarga_id,
                'NOMOR_JKN' => $request->NOMOR_JKN,
                'NIK' => $request->NIK,
                'NIP' => $request->NIP,
                'STATUS_KAWIN' => $request->STATUS_KAWIN,
                'TANGGAL_MULAI_TMT' => $request->TANGGAL_MULAI_TMT,
                'TANGGAL_SELESAI_TMT' => $request->TANGGAL_SELESAI_TMT,
                'GAJI_POKOK' => $request->GAJI_POKOK,
                'NAMA_FASKES' => $request->NAMA_FASKES,
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
        $pegawai = Pegawai::where('id', $id)->first();
        return Excel::download(new ExportDataBpjs, 'Data_BPJS_'.$pegawai->NAMA_PEGAWAI.'.xlsx');
    }
}