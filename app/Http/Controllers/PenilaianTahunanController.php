<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\PenilaianTahunan;
use Illuminate\Support\Facades\Auth;

class PenilaianTahunanController extends Controller
{
    public function index($id){
        $penilaiantahunan = PenilaianTahunan::where('pegawai_id', $id)->get();
        $pegawai = Pegawai::where('id', $id)->first();
        
        return view("penilaiantahunan")->with([
            'penilaiantahunan' => $penilaiantahunan,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $penilaiantahunan = PenilaianTahunan::all();
        return view("tambah/tambahpenilaiantahunan")->with([
            'pegawai' => $pegawai,
            'penilaiantahunan' => $penilaiantahunan,
            'users' => Auth::guard('users')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {

        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "TAHUN_PENILAIAN" => ["required"],
                "FILE_PENILAIAN" => ["required"],
            ],
            [
                "TAHUN_PENILAIAN.required" => "Tahun Penilaian Harus Diisi",
                "FILE_PENILAIAN.required" => "File Penilaian Harus Diisi",
            ]
        );

        $file = $request->file("FILE_PENILAIAN");
        $fileName = time() . '_' .$request->file("FILE_PENILAIAN")->getClientOriginalName();
        $file->move('document/', $fileName);
        
        $penilaiantahunan = PenilaianTahunan::create([
            'pegawai_id' => $pegawai->id,
            'TAHUN_PENILAIAN' => $request->TAHUN_PENILAIAN,
            'FILE_PENILAIAN' => $fileName,
        ]);

        if ($penilaiantahunan) {
            return redirect()
                ->intended("/penilaiantahunan/$id")
                ->with([
                notify()->success('Penilaian Tahunan Telah Ditambahkan'),
                "success" => "Penilaian Tahunan Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createpenilaiantahunan/$id")
            ->with([
                notify()->error('Gagal Menambah Penilaian Tahunan'),
                "error" => "Gagal Menambah Penilaian Tahunan"]);
    
    }

    public function destroy($id)
    {
      
        $deletefile = PenilaianTahunan::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_PENILAIAN);

        if (file_exists($file)) {
            @unlink($file);
        }

        $penilaiantahunan = PenilaianTahunan::where('id', $id);

            if ($penilaiantahunan) {
                $penilaiantahunan->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Penilaian Tahunan Telah Dihapus'),
                        "success" => "Penilaian Tahunan Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Penilaian Tahunan'),
                        "error" => "Gagal Menghapus Penilaian Tahunan"]);
            }
    }

    public function edit($id)
    {
        $penilaiantahunan = PenilaianTahunan::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editpenilaiantahunan")->with([
            'penilaiantahunan' => $penilaiantahunan,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $penilaiantahunan = PenilaianTahunan::where('id', $id)->first();

        $this->validate($request,
            [
                "TAHUN_PENILAIAN" => ["required"],
            ],
            [
                "TAHUN_PENILAIAN.required" => "Tahun Penilaian Harus Diisi",
            ]
        );

        $oldFile = $penilaiantahunan->FILE_PENILAIAN;

        $updateData = PenilaianTahunan::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'TAHUN_PENILAIAN' => $request->TAHUN_PENILAIAN,
                'FILE_PENILAIAN' => $oldFile,
            ),
        );

        if ($request->hasFile('FILE_PENILAIAN')) {
            $document = $request->file('FILE_PENILAIAN');
            $fileName = time() . '_' .$document->getClientOriginalName();
            $document->move('document/', $fileName);
    
            $penilaiantahunan->FILE_PENILAIAN = $fileName;
            $penilaiantahunan->save();
    
            if (file_exists('document/' . $oldFile)) {
                unlink('document/' . $oldFile);
            }
        }

    if ($updateData) {
        return redirect()->intended("/penilaiantahunan/$penilaiantahunan->pegawai_id")->with([ notify()->success('Penilaian Tahunan Telah Diupdate'),
            'success' => 'Penilaian Tahunan Telah Diupdate']);
    }
    return redirect()->intended("/penilaiantahunan/$penilaiantahunan->pegawai_id")->with([ notify()->error('Batal Mengupdate Penilaian Tahunan'),
        'error' => 'Batal Mengupdate Penilaian Tahunan']);
    }

}
