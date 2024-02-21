<?php

namespace App\Http\Controllers;

use App\Exports\ExportSuratMasuk;
use Illuminate\View\View;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    public function index() : View
    {
        $suratmasuk = SuratMasuk::latest()->paginate(5);
        return view("suratmasuk")->with([
            'suratmasuk' => $suratmasuk,
            'admin' => Auth::guard('admin')->user()
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsuratmasuk");
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                "KODE_SURAT" => ["required"],
                "NOMOR_SURAT" => ["required"],
                "TANGGAL_SURAT" => ["required"],
                "TANGGAL_MASUK" => ["required"],
                "JENIS_SURAT" => ["required"],
                "ASAL_SURAT" => ["required"],
                "SIFAT_SURAT" => ["required"],
                "PERIHAL_SURAT" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
        );

        $file = $request->file("FILE_SURAT");
        $fileName = $request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);
        
        $suratMasukData = $request->all();
        if($request->has('FILE_SURAT')){
            $suratMasukData['FILE_SURAT'] = $fileName;
        }

        $suratMasuk = SuratMasuk::create($suratMasukData);

        if ($suratMasuk) {
            return redirect()
                ->intended("/suratmasuk")
                ->with([
                notify()->success('Surat Masuk Telah Ditambahkan'),
                "success" => "Surat Masuk Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createsuratmasuk")
            ->with([
                notify()->error('Gagal Menambah Surat Masuk'),
                "error" => "Gagal Menambah Surat Masuk"]);
    
    }

    public function destroy($id)
    {
        $deletefile = SuratMasuk::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_SURAT);

        if (file_exists($file)) {
            @unlink($file);
        }

        $suratmasuk = SuratMasuk::where('id', $id);

            if ($suratmasuk) {
                $suratmasuk->delete();
                return redirect()->intended('/suratmasuk')
                    ->with([ 
                        notify()->success('Surat Masuk Telah Dihapus'),
                        "success" => "Surat Masuk Telah Dihapus"]);
            }else {
                return redirect()->intended('/suratmasuk')
                    ->with([
                        notify()->error('Gagal Menghapus Surat Masuk'),
                        "error" => "Gagal Menghapus Surat Masuk"]);
            }
    }

    public function edit($id)
    {
        $suratmasuk = SuratMasuk::where('id', $id)->first();

        return view("edit/editsuratmasuk")->with([
            'suratmasuk' => $suratmasuk,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratmasuk = SuratMasuk::where('id', $id)->first();

        if ($request->KODE_SURAT) {
            $suratmasuk->KODE_SURAT = $request->KODE_SURAT;
        }
        if ($request->NOMOR_SURAT) {
            $suratmasuk->NOMOR_SURAT = $request->NOMOR_SURAT;
        }
        if ($request->TANGGAL_SURAT) {
            $suratmasuk->TANGGAL_SURAT = $request->TANGGAL_SURAT;
        }
        if ($request->TANGGAL_MASUK) {
            $suratmasuk->TANGGAL_MASUK = $request->TANGGAL_MASUK;
        }
        if ($request->JENIS_SURAT) {
            $suratmasuk->JENIS_SURAT = $request->JENIS_SURAT;
        }
        if ($request->ASAL_SURAT) {
            $suratmasuk->ASAL_SURAT = $request->ASAL_SURAT;
        }
        if ($request->SIFAT_SURAT) {
            $suratmasuk->SIFAT_SURAT = $request->SIFAT_SURAT;
        }
        if ($request->PERIHAL_SURAT) {
            $suratmasuk->PERIHAL_SURAT = $request->PERIHAL_SURAT;
        }
        if ($request->FILE_SURAT) {
            $suratmasuk->FILE_SURAT = $request->FILE_SURAT;
        }
        $updateSurat = SuratMasuk::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'KODE_SURAT' => $suratmasuk->KODE_SURAT,
                'NOMOR_SURAT' => $suratmasuk->NOMOR_SURAT,
                'TANGGAL_SURAT' => $suratmasuk->TANGGAL_SURAT,
                'TANGGAL_MASUK' => $suratmasuk->TANGGAL_MASUK,
                'JENIS_SURAT' => $suratmasuk->JENIS_SURAT,
                'ASAL_SURAT' => $suratmasuk->ASAL_SURAT,
                'SIFAT_SURAT' => $suratmasuk->SIFAT_SURAT,
                'PERIHAL_SURAT' => $suratmasuk->PERIHAL_SURAT,
                'FILE_SURAT' => $suratmasuk->FILE_SURAT,
            ),
        );

 
        if ($request->hasFile('FILE_SURAT')) {
            $updatefile = SuratMasuk::find($id);
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
        return redirect()->intended('/suratmasuk')->with([ notify()->success('Surat Masuk Telah Diupdate'),
            'success' => 'Surat Masuk Telah Diupdate']);
    }
    return redirect()->intended('/editsuratmasuk')->with([ notify()->error('Batal Mengupdate Surat Masuk'),
        'error' => 'Batal Mengupdate Surat Masuk']);

    }

    public function find(Request $request)
    {
        $suratmasuk = SuratMasuk::where('KODE_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('NOMOR_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_MASUK', 'like', '%' . $request->search . '%')
            ->orWhere('JENIS_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('ASAL_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('SIFAT_SURAT', 'like', '%' . $request->search . '%')
            ->orWhere('PERIHAL_SURAT', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $suratmasuk->appends(['search' => $request->search]);

        return view("suratmasuk")->with([
            'suratmasuk' => $suratmasuk
        ]);
    }

    public function view($id){
        $data = SuratMasuk::find($id);

        return view("tampil/tampilsuratmasuk",compact("data"));
    }

    function export_excel()
    {
        return Excel::download(new ExportSuratMasuk, 'suratmasuk.xlsx');
    }
}
