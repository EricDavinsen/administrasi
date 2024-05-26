<?php

namespace App\Http\Controllers;

use App\Exports\ExportRiwayatSk;
use App\Models\Pegawai;
use App\Models\RiwayatSk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RiwayatSkController extends Controller
{
    public function index($id){
        $riwayatsk = RiwayatSk::where('pegawai_id', $id)->get();
        $pegawai = Pegawai::where('id', $id)->first();
        
        return view("riwayatsk")->with([
            'riwayatsk' => $riwayatsk,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $riwayatsk = RiwayatSk::all();
        return view("tambah/tambahriwayatsk")->with([
            'pegawai' => $pegawai,
            'riwayatsk' => $riwayatsk,
            'users' => Auth::guard('users')->user() 
        ]);
    }
    public function store( Request $request, $id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        $this->validate($request,
            [
                "JABATAN" => ["required"],
                "NOMOR_SK" => ["required"],
                "TANGGAL_SK" => ["required"],
                "TMT_SK" => ["required"],
            ],
        );

        if ($request->hasFile('FILE_SK')) {
            $document = $request->file('FILE_SK');
            $fileName = $request->file("FILE_SK")->getClientOriginalName();
            $document->move('document/', $fileName);
            $riwayatsk = RiwayatSk::create([
                'pegawai_id' => $pegawai->id,
                'JABATAN' => $request->JABATAN,
                'NOMOR_SK' => $request->NOMOR_SK,
                'TANGGAL_SK' => $request->TANGGAL_SK,
                'TMT_SK' => $request->TMT_SK,
                'FILE_SK' => $fileName,
            ]);
        }else{
            $riwayatsk = RiwayatSk::create([
                'pegawai_id' => $pegawai->id,
                'JABATAN' => $request->JABATAN,
                'NOMOR_SK' => $request->NOMOR_SK,
                'TANGGAL_SK' => $request->TANGGAL_SK,
                'TMT_SK' => $request->TMT_SK,
                'FILE_SK' => $request->FILE_SK
            ]);
        }

        if ($riwayatsk) {
            return redirect()
                ->intended("/riwayatsk/$id")
                ->with([
                notify()->success('Riwayat SK Telah Ditambahkan'),
                "success" => "Riwayat SK Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createriwayatsk/$id")
            ->with([
                notify()->error('Gagal Menambah Riwayat SK'),
                "error" => "Gagal Menambah Riwayat SK"]);
    
    }

    public function destroy($id)
    {
        $riwayatsk = RiwayatSk::where('id', $id);

            if ($riwayatsk) {
                $riwayatsk->delete();
                return redirect()->intended('/datapegawai')
                    ->with([ 
                        notify()->success('Riwayat SK Telah Dihapus'),
                        "success" => "Riwayat SK Telah Dihapus"]);
            }else {
                return redirect()->intended('/datapegawai')
                    ->with([
                        notify()->error('Gagal Menghapus Riwayat SK'),
                        "error" => "Gagal Menghapus Riwayat SK"]);
            }
    }

    public function edit($id)
    {
        $riwayatsk = RiwayatSk::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $id)->first();

        return view("edit/editriwayatsk")->with([
            'riwayatsk' => $riwayatsk,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $riwayatsk = RiwayatSk::where('id', $id)->first();

        if ($request->JABATAN) {
            $riwayatsk->JABATAN = $request->JABATAN;
        }

        if ($request->NOMOR_SK) {
            $riwayatsk->NOMOR_SK = $request->NOMOR_SK;
        }

        if ($request->TANGGAL_SK) {
            $riwayatsk->TANGGAL_SK = $request->TANGGAL_SK;
        }

        if($request->TMT_SK) {
            $riwayatsk->TMT_SK = $request->TMT_SK;
        }

        if($request->FILE_SK) {
            $riwayatsk->FILE_SK = $request->FILE_SK;
        }

        $updateData = RiwayatSk::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'JABATAN' => $riwayatsk->JABATAN,
                'NOMOR_SK' => $riwayatsk->NOMOR_SK,
                'TANGGAL_SK' => $riwayatsk->TANGGAL_SK,
                'TMT_SK' => $riwayatsk->TMT_SK,
                'FILE_SK' => $riwayatsk->FILE_SK
            ),
        );

        if ($request->hasFile('FILE_SK')) {
            $updatefile = RiwayatSk::find($id);
            $document = $request->file('FILE_SK');
            $fileName = $request->file("FILE_SK")->getClientOriginalName();
            $document->move('document/', $fileName);
            $exist_file = $updatefile['FILE_SK'];
            $update['FILE_SK'] =  $fileName;
            $updatefile->update($update);
        }
       
        if (isset($exist_file) && file_exists($exist_file)) {
            unlink($exist_file);
        }

    if ($updateData) {
        return redirect()->intended("/riwayatsk/$riwayatsk->pegawai_id")->with([ notify()->success('Riwayat SK Telah Diupdate'),
            'success' => 'Riwayat SK Telah Diupdate']);
    }
    return redirect()->intended("/riwayatsk/$riwayatsk->pegawai_id")->with([ notify()->error('Batal Mengupdate Riwayat SK'),
        'error' => 'Batal Mengupdate Riwayat SK']);
    }

    function export_excel($id)
    {
        return Excel::download(new ExportRiwayatSk, 'riwayatsk.xlsx');
    }

}
