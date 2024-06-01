<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\SifatSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SifatSuratController extends Controller
{
    public function index() : View
    {
        $sifatsurat = SifatSurat::oldest()->get();
        
        return view("sifatsurat")->with([
            'sifatsurat' => $sifatsurat,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsifatsurat")->with([
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "SIFAT_SURAT" => ["required"],
            ],
            [
                "SIFAT_SURAT.required" => "Sifat Surat Harus Diisi",
            ]
        );

        $jenisData = $request->all();
        $jenisData = SifatSurat::create($jenisData);
        if ($jenisData) {
            return redirect()
                ->intended("/sifatsurat")
                ->with([
                notify()->success('Jenis Surat Telah Ditambahkan'),
                "success" => "Jenis Surat Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createsifatsurat")
            ->with([
                notify()->error('Gagal Menambah Jenis Surat'),
                "error" => "Gagal Menambah Jenis Surat"]);
    }

    public function destroy($id)
    {
        $sifatsurat = SifatSurat::where('id', $id);

            if ($sifatsurat) {
                $sifatsurat->delete();
                return redirect()->intended('/sifatsurat')
                    ->with([ 
                        notify()->success('Jenis Surat Telah Dihapus'),
                        "success" => "Jenis Surat Telah Dihapus"]);
            }else {
                return redirect()->intended('/sifatsurat')
                    ->with([
                        notify()->error('Gagal Menghapus Jenis Surat'),
                        "error" => "Gagal Menghapus Jenis Surat"]);
            }
    }

    public function edit($id)
    {
        $sifatsurat = SifatSurat::where('id', $id)->first();

        return view("edit/editsifatsurat")->with([
            'sifatsurat' => $sifatsurat,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $sifatsurat = SifatSurat::where('id', $id)->first();

        $this->validate(
            $request,
            [
                "SIFAT_SURAT" => ["required"],
            ],
            [
                "SIFAT_SURAT.required" => "Sifat Surat Harus Diisi",
            ]
            );
      
        $updateSurat = SifatSurat::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'SIFAT_SURAT' => $sifatsurat->SIFAT_SURAT,
            ),
        );

    if ($updateSurat) {
        return redirect()->intended('/sifatsurat')->with([ notify()->success('Jenis Surat Telah Diupdate'),
            'success' => 'Jenis Surat Telah Diupdate']);
    }
    return redirect()->intended('/editsifatsurat')->with([ notify()->error('Batal Mengupdate Jenis Surat'),
        'error' => 'Batal Mengupdate Jenis Surat']);
    }
}