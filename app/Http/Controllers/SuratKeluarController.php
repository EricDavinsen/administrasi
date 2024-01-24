<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    public function index() : View
    {
        $suratkeluar = SuratKeluar::latest()->paginate(5);
        return view("suratkeluar")->with([
            'suratkeluar' => $suratkeluar,
            'admin' => Auth::guard('admin')->user()
        ]);
        
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsuratkeluar");
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                "NOMOR_SURAT" => ["required"],
                "TANGGAL_SURAT" => ["required"],
                "JENIS_SURAT" => ["required"],
                "TUJUAN_SURAT" => ["required"],
                "SIFAT_SURAT" => ["required"],
                "PERIHAL_SURAT" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
        );

        $file = $request->file("FILE_SURAT");
        $fileName = $request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);
        
        $suratKeluarData = $request->all();
        if($request->has('FILE_SURAT')){
            $suratKeluarData['FILE_SURAT'] = $fileName;
        }

        $suratKeluar = SuratKeluar::create($suratKeluarData);

        if ($suratKeluar) {
            return redirect()
                ->intended("/suratkeluar")
                ->with([
                notify()->success('Surat Keluar Telah Ditambahkan'),
                "success" => "Surat Keluar Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createsuratkeluar")
            ->with([
                notify()->error('Gagal Menambah Surat Keluar'),
                "error" => "Gagal Menambah Surat Keluar"]);
    
    }

    public function destroy($id)
    {
        $deletefile = SuratKeluar::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_SURAT);

        if (file_exists($file)) {
            @unlink($file);
        }

        $suratkeluar = SuratKeluar::where('id', $id);

            if ($suratkeluar) {
                $suratkeluar->delete();
                return redirect()->intended('/suratkeluar')
                    ->with([ 
                        notify()->success('Surat Keluar Telah Dihapus'),
                        "success" => "Surat Keluar Telah Dihapus"]);
            }else {
                return redirect()->intended('/suratkeluar')
                    ->with([
                        notify()->error('Gagal Menghapus Surat Keluar'),
                        "error" => "Gagal Menghapus Surat Keluar"]);
            }
    }

    public function edit($id)
    {
        $suratkeluar = SuratKeluar::where('id', $id)->first();

        return view("edit/editsuratkeluar")->with([
            'suratkeluar' => $suratkeluar,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratkeluar = SuratKeluar::where('id', $id)->first();

        if ($request->NOMOR_SURAT) {
            $suratkeluar->NOMOR_SURAT = $request->NOMOR_SURAT;
        }
        if ($request->TANGGAL_SURAT) {
            $suratkeluar->TANGGAL_SURAT = $request->TANGGAL_SURAT;
        }
        if ($request->JENIS_SURAT) {
            $suratkeluar->JENIS_SURAT = $request->JENIS_SURAT;
        }
        if ($request->TUJUAN_SURAT) {
            $suratkeluar->TUJUAN_SURAT = $request->TUJUAN_SURAT;
        }
        if ($request->SIFAT_SURAT) {
            $suratkeluar->SIFAT_SURAT = $request->SIFAT_SURAT;
        }
        if ($request->PERIHAL_SURAT) {
            $suratkeluar->PERIHAL_SURAT = $request->PERIHAL_SURAT;
        }
        if ($request->FILE_SURAT) {
            $suratkeluar->FILE_SURAT = $request->FILE_SURAT;
        }
        $updateSurat = SuratKeluar::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NOMOR_SURAT' => $suratkeluar->NOMOR_SURAT,
                'TANGGAL_SURAT' => $suratkeluar->TANGGAL_SURAT,
                'JENIS_SURAT' => $suratkeluar->JENIS_SURAT,
                'TUJUAN_SURAT' => $suratkeluar->TUJUAN_SURAT,
                'SIFAT_SURAT' => $suratkeluar->SIFAT_SURAT,
                'PERIHAL_SURAT' => $suratkeluar->PERIHAL_SURAT,
                'FILE_SURAT' => $suratkeluar->FILE_SURAT,
            ),
        );

 
        if ($request->hasFile('FILE_SURAT')) {
            $updatefile = SuratKeluar::find($id);
            $document = $request->file('FILE_SURAT');
            $fileName = $request->file("FILE_SURAT")->getClientOriginalName();
            $document->move('document/', $fileName);
            $exist_file = $updatefile['FILE_SURAT'];
            $update['FILE_SURAT'] =  $fileName;
            $updatefile->update($update);
        }
       
        
        if (isset($exist_file) && file_exists($exist_file)) {
            unlink($exist_file);
        }

    if ($updateSurat) {
        return redirect()->intended('/suratkeluar')->with([ notify()->success('Surat Keluar Telah Diupdate'),
            'success' => 'Surat Keluar Telah Diupdate']);
    }
    return redirect()->intended('/editsuratkeluar')->with([ notify()->error('Batal Mengupdate Surat Keluar'),
        'error' => 'Batal Mengupdate Surat Keluar']);

    }

    public function find(Request $request)
    {
        $suratkeluar = SuratKeluar::where('NOMOR_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('JENIS_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('TUJUAN_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('SIFAT_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('PERIHAL_SURAT', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $suratkeluar->appends(['search' => $request->search]);

        return view("suratkeluar")->with([
            'suratkeluar' => $suratkeluar
        ]);
    }

    public function view($id){
        $data = SuratKeluar::find($id);

        return view("tampilsuratkeluar",compact("data"));
    }
}
