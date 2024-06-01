<?php

namespace App\Http\Controllers;

use App\Exports\ExportDiklat;
use App\Models\Diklat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DiklatController extends Controller
{
    public function index($id){
        $diklat = Diklat::where('pegawai_id', $id)->get();
        $pegawai = Pegawai::where('id', $id)->first();
        
        return view("diklat")->with([
            'diklat' => $diklat,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $diklat = Diklat::all();
        return view("tambah/tambahdiklat")->with([
            'pegawai' => $pegawai,
            'diklat' => $diklat,
            'users' => Auth::guard('users')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "NAMA_DIKLAT" => ["required"],
                "TANGGAL_MULAI" => ["required"],
                "TANGGAL_SELESAI" => ["required"],
                "JUMLAH_JAM" => ["required"],
                "PENYELENGGARA" => ["required"],
            ],
            [
                "NAMA_DIKLAT.required" => "Nama Diklat Harus Diisi",
                "TANGGAL_MULAI.required" => "Tanggal Mulai Harus Diisi",
                "TANGGAL_SELESAI.required" => "Tanggal Selesai Harus Diisi",
                "JUMLAH_JAM.required" => "Jumlah Jam Harus Diisi",
                "PENYELENGGARA.required" => "Penyelenggara Harus Diisi",
            ]
        );

        if ($request->hasFile('SERTIFIKAT')) {
            $document = $request->file('SERTIFIKAT');
            $fileName = $request->file("SERTIFIKAT")->getClientOriginalName();
            $document->move('document/', $fileName);
            $diklat = Diklat::create([
                'pegawai_id' => $pegawai->id,
                'NAMA_DIKLAT' => $request->NAMA_DIKLAT,
                'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
                'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
                'JUMLAH_JAM' => $request->JUMLAH_JAM,
                'PENYELENGGARA' => $request->PENYELENGGARA,
                'SERTIFIKAT' => $fileName,
            ]);
        }else{
            $diklat = Diklat::create([
                'pegawai_id' => $pegawai->id,
                'NAMA_DIKLAT' => $request->NAMA_DIKLAT,
                'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
                'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
                'JUMLAH_JAM' => $request->JUMLAH_JAM,
                'PENYELENGGARA' => $request->PENYELENGGARA,
                'SERTIFIKAT' => $request->SERTIFIKAT,
            ]);
        }

        if ($diklat) {
            return redirect()
                ->intended("/diklat/$id")
                ->with([
                notify()->success('Diklat Telah Ditambahkan'),
                "success" => "Diklat Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/creatediklat/$id")
            ->with([
                notify()->error('Gagal Menambah Diklat'),
                "error" => "Gagal Menambah Diklat"]);
    
    }

    public function destroy($id)
    {

        $deletefile = Diklat::findorfail($id);
        $file = public_path('document/'.$deletefile->SERTIFIKAT);

        if (file_exists($file)) {
            @unlink($file);
        }
      
        $diklat = Diklat::where('id', $id);

            if ($diklat) {
                $diklat->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Diklat Telah Dihapus'),
                        "success" => "Diklat Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Diklat'),
                        "error" => "Gagal Menghapus Diklat"]);
            }
    }

    public function edit($id)
    {
        $diklat = Diklat::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editdiklat")->with([
            'diklat' => $diklat,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $diklat = Diklat::where('id', $id)->first();

        $this->validate($request,
        [
            "NAMA_DIKLAT" => ["required"],
            "TANGGAL_MULAI" => ["required"],
            "TANGGAL_SELESAI" => ["required"],
            "JUMLAH_JAM" => ["required"],
            "PENYELENGGARA" => ["required"],
        ],
        [
            "NAMA_DIKLAT.required" => "Nama Diklat Harus Diisi",
            "TANGGAL_MULAI.required" => "Tanggal Mulai Harus Diisi",
            "TANGGAL_SELESAI.required" => "Tanggal Selesai Harus Diisi",
            "JUMLAH_JAM.required" => "Jumlah Jam Harus Diisi",
            "PENYELENGGARA.required" => "Penyelenggara Harus Diisi",
        ]
    );

        $updateData = Diklat::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA_DIKLAT' => $diklat->NAMA_DIKLAT,
                'TANGGAL_MULAI' => $diklat->TANGGAL_MULAI,
                'TANGGAL_SELESAI' => $diklat->TANGGAL_SELESAI,
                'JUMLAH_JAM' => $diklat->JUMLAH_JAM,
                'PENYELENGGARA' => $diklat->PENYELENGGARA,
                'SERTIFIKAT' => $diklat->SERTIFIKAT
            ),
        );

        if ($request->hasFile('SERTIFIKAT')) {
            $updatefile = Diklat::find($id);
            $document = $request->file('SERTIFIKAT');
            $fileName = $request->file("SERTIFIKAT")->getClientOriginalName();
            $document->move('document/', $fileName);
            $exist_file = $updatefile['SERTIFIKAT'];
            $update['SERTIFIKAT'] =  $fileName;
            $updatefile->update($update);
        }
       
        if (isset($exist_file) && file_exists($exist_file)) {
            unlink($exist_file);
        }

    if ($updateData) {
        return redirect()->intended("/diklat/$diklat->pegawai_id")->with([ notify()->success('Diklat Telah Diupdate'),
            'success' => 'Diklat Telah Diupdate']);
    }
    return redirect()->intended("/diklat/$diklat->pegawai_id")->with([ notify()->error('Batal Mengupdate Diklat'),
        'error' => 'Batal Mengupdate Diklat']);
    }
    function export_excel($id)
    {
        return Excel::download(new ExportDiklat, 'diklat.xlsx');
    }
}