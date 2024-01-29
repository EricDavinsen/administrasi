<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiklatController extends Controller
{
    public function index($id){
        $diklat = Diklat::where('pegawai_id', $id)->latest()->get();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("diklat")->with([
            'diklat' => $diklat,
            'pegawai' => $pegawai,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $diklat = Diklat::all();
        return view("tambah/tambahdiklat")->with([
            'pegawai' => $pegawai,
            'diklat' => $diklat,
            'admin' => Auth::guard('admin')->user() 
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
                "SERTIFIKAT" => ["required"],
            ],
        );

        $file = $request->file("SERTIFIKAT");
        $fileName = $request->file("SERTIFIKAT")->getClientOriginalName();
        $file->move('document/', $fileName);

        $diklat = Diklat::create([
            'pegawai_id' => $pegawai->id,
            'NAMA_DIKLAT' => $request->NAMA_DIKLAT,
            'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
            'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
            'JUMLAH_JAM' => $request->JUMLAH_JAM,
            'PENYELENGGARA' => $request->PENYELENGGARA,
            'SERTIFIKAT' => $fileName,
        ]);


        if ($diklat) {
            return redirect()
                ->intended("/diklat/$id")
                ->with([
                notify()->success('Diklat Telah Ditambahkan'),
                "success" => "Diklat Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdatapribadi/$id")
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
            'pegawai' => $pegawai
        ]);
    }

    public function update(Request $request, $id)
    {
        $diklat = Diklat::where('id', $id)->first();

        if ($request->NAMA_DIKLAT) {
            $diklat->NAMA_DIKLAT = $request->NAMA_DIKLAT;
        }

        if ($request->TANGGAL_MULAI) {
            $diklat->TANGGAL_MULAI = $request->TANGGAL_MULAI;
        }

        if ($request->TANGGAL_SELESAI) {
            $diklat->TANGGAL_SELESAI = $request->TANGGAL_SELESAI;
        }

        if ($request->JUMLAH_JAM) {
            $diklat->JUMLAH_JAM = $request->JUMLAH_JAM;
        }

        if ($request->PENYELENGGARA) {
            $diklat->PENYELENGGARA = $request->PENYELENGGARA;
        }

        if ($request->SERTIFIKAT) {
            $diklat->SERTIFIKAT = $request->SERTIFIKAT;
        }

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
        return redirect()->intended('/datapegawai')->with([ notify()->success('Diklat Telah Diupdate'),
            'success' => 'Diklat Telah Diupdate']);
    }
    return redirect()->intended('/datapegawai')->with([ notify()->error('Batal Mengupdate Diklat'),
        'error' => 'Batal Mengupdate Diklat']);
    }

    public function view($id){
        $data = Diklat::find($id);
        $diklat = Diklat::where('id', $id)->first();

        return view("tampilsertifikat",compact("data","diklat"));
    }
}
