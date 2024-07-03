<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisSuratController extends Controller
{
    public function index() : View
    {
        $jenissurat = JenisSurat::oldest()->get();
        
        return view("jenissurat")->with([
            'jenissurat' => $jenissurat,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahjenissurat")->with([
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "JENIS_SURAT" => ["required"],
            ],
            [
                "JENIS_SURAT.required" => "Jenis Surat Harus Diisi",
            ]
        );

        $jenisData = $request->all();
        $jenisData = JenisSurat::create($jenisData);
        if ($jenisData) {
            return redirect()
                ->intended("/jenissurat")
                ->with([
                notify()->success('Jenis Surat Telah Ditambahkan'),
                "success" => "Jenis Surat Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createjenissurat")
            ->with([
                notify()->error('Gagal Menambah Jenis Surat'),
                "error" => "Gagal Menambah Jenis Surat"]);
    }

    public function destroy($id)
    {
        $jenissurat = JenisSurat::where('id', $id);

            if ($jenissurat) {
                $jenissurat->delete();
                return redirect()->intended('/jenissurat')
                    ->with([ 
                        notify()->success('Jenis Surat Telah Dihapus'),
                        "success" => "Jenis Surat Telah Dihapus"]);
            }else {
                return redirect()->intended('/jenissurat')
                    ->with([
                        notify()->error('Gagal Menghapus Jenis Surat'),
                        "error" => "Gagal Menghapus Jenis Surat"]);
            }
    }

    public function edit($id)
    {
        $jenissurat = JenisSurat::where('id', $id)->first();

        return view("edit/editjenissurat")->with([
            'jenissurat' => $jenissurat,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                "JENIS_SURAT" => ["required"],
            ],
            [
                "JENIS_SURAT.required" => "Jenis Surat Harus Diisi",
            ]
        );
        
        $updateSurat = JenisSurat::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'JENIS_SURAT' => $request->JENIS_SURAT,
            ),
        );

    if ($updateSurat) {
        return redirect()->intended('/jenissurat')->with([ notify()->success('Jenis Surat Telah Diupdate'),
            'success' => 'Jenis Surat Telah Diupdate']);
    }
    return redirect()->intended('/editjenissurat')->with([ notify()->error('Batal Mengupdate Jenis Surat'),
        'error' => 'Batal Mengupdate Jenis Surat']);
    }
}
