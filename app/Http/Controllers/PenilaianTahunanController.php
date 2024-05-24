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
        );

        $file = $request->file("FILE_PENILAIAN");
        $fileName = $request->file("FILE_PENILAIAN")->getClientOriginalName();
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

        if ($request->TAHUN_PENILAIAN) {
            $penilaiantahunan->TAHUN_PENILAIAN = $request->TAHUN_PENILAIAN;
        }
     
        if ($request->FILE_PENILAIAN) {
            $penilaiantahunan->FILE_PENILAIAN = $request->FILE_PENILAIAN;
        }

        $updateData = PenilaianTahunan::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'TAHUN_PENILAIAN' => $penilaiantahunan->TAHUN_PENILAIAN,
                'FILE_PENILAIAN' => $penilaiantahunan->FILE_PENILAIAN,
            ),
        );

        if ($request->hasFile('FILE_PENILAIAN')) {
            $updatefile = PenilaianTahunan::find($id);
            $document = $request->file('FILE_PENILAIAN');
            $fileName = $request->file("FILE_PENILAIAN")->getClientOriginalName();
            $document->move('document/', $fileName);
            $exist_file = $updatefile['FILE_PENILAIAN'];
            $update['FILE_PENILAIAN'] =  $fileName;
            $updatefile->update($update);
        }
       
        if (isset($exist_file) && file_exists($exist_file)) {
            unlink($exist_file);
        }

    if ($updateData) {
        return redirect()->intended("/penilaiantahunan/$penilaiantahunan->pegawai_id")->with([ notify()->success('Penilaian Tahunan Telah Diupdate'),
            'success' => 'Penilaian Tahunan Telah Diupdate']);
    }
    return redirect()->intended("/penilaiantahunan/$penilaiantahunan->pegawai_id")->with([ notify()->error('Batal Mengupdate Penilaian Tahunan'),
        'error' => 'Batal Mengupdate Penilaian Tahunan']);
    }

}
