<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\JenisSurat;
use App\Models\SifatSurat;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Exports\ExportSuratMasuk;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    public function index() : View
    {
        $suratmasuk = SuratMasuk::latest()->get();
        $jenissurat = JenisSurat::all();
        $sifatsurat = SifatSurat::all();
        
        return view("suratmasuk")->with([
            'suratmasuk' => $suratmasuk,
            'jenissurat' => $jenissurat,
            'sifatsurat' => $sifatsurat,
            'users' => Auth::guard('users')->user(),
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsuratmasuk")->with([
            'jenissurat' => JenisSurat::orderBy('JENIS_SURAT', 'asc')->get(),
            'sifatsurat' => SifatSurat::orderBy('SIFAT_SURAT', 'asc')->get(),
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function store(Request $request)
    {
        $jenissurat = JenisSurat::where('id', $request->jenis_id)->first();
        $sifatsurat = SifatSurat::where('id', $request->sifat_id)->first();
        $this->validate(
            $request,
            [
                "sifat_id" => ["required"],
                "jenis_id" => ["required"],
                "KODE_SURAT" => ["required"],
                "NOMOR_SURAT" => ["required"],
                "TANGGAL_SURAT" => ["required"],
                "TANGGAL_MASUK" => ["required"],
                "ASAL_SURAT" => ["required"],
                "PERIHAL_SURAT" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
            [
                "sifat_id.required" => "Sifat Surat Harus Diisi",
                "jenis_id.required" => "Jenis Surat Harus Diisi",
                "KODE_SURAT.required" => "Kode Surat Harus Diisi",
                "NOMOR_SURAT.required" => "Nomor Surat Harus Diisi",
                "TANGGAL_SURAT.required" => "Tangal Surat Harus Diisi",
                "TANGGAL_MASUK.required" => "Tangal Masuk Harus Diisi",
                "ASAL_SURAT.required" => "Asal Surat Harus Diisi",
                "PERIHAL_SURAT.required" => "Perihal Surat Harus Diisi",
                "FILE_SURAT.required" => "File Surat Harus Diisi",]
        );

        $file = $request->file("FILE_SURAT");
        $fileName = time() . '_' .$request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);
        
        $suratMasuk = SuratMasuk::create([
                "sifat_id" => $sifatsurat->id,
                "jenis_id" => $jenissurat->id,
                "KODE_SURAT" => $request->KODE_SURAT,
                "NOMOR_SURAT" => $request->NOMOR_SURAT,
                "TANGGAL_SURAT" => $request->TANGGAL_SURAT,
                "TANGGAL_MASUK" => $request->TANGGAL_MASUK,
                "ASAL_SURAT" => $request->ASAL_SURAT,
                "PERIHAL_SURAT" => $request->PERIHAL_SURAT,
                "FILE_SURAT" => $fileName,
        ]);

        if ($suratMasuk) {
            return redirect()
                ->intended("/suratmasuk")
                ->with([
                notify()->success('Surat Masuk Telah Ditambahkan'),
                "success" => "Surat Masuk Telah Ditambahkan"]);
        }    
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
            'jenissurat' => JenisSurat::orderBy('JENIS_SURAT', 'asc')->get(),
            'sifatsurat' => SifatSurat::orderBy('SIFAT_SURAT', 'asc')->get(),
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratmasuk = SuratMasuk::where('id', $id)->first();
        $jenissurat = JenisSurat::where('id', $request->jenis_id)->first();
        $sifatsurat = SifatSurat::where('id', $request->sifat_id)->first();

        $this->validate(
            $request,
            [
                "sifat_id" => ["required"],
                "jenis_id" => ["required"],
                "KODE_SURAT" => ["required"],
                "NOMOR_SURAT" => ["required"],
                "TANGGAL_SURAT" => ["required"],
                "TANGGAL_MASUK" => ["required"],
                "ASAL_SURAT" => ["required"],
                "PERIHAL_SURAT" => ["required"],
            ],
            [
                "sifat_id.required" => "Sifat Surat Harus Diisi",
                "jenis_id.required" => "Jenis Surat Harus Diisi",
                "KODE_SURAT.required" => "Kode Surat Harus Diisi",
                "NOMOR_SURAT.required" => "Nomor Surat Harus Diisi",
                "TANGGAL_SURAT.required" => "Tangal Surat Harus Diisi",
                "TANGGAL_MASUK.required" => "Tangal Masuk Harus Diisi",
                "ASAL_SURAT.required" => "Asal Surat Harus Diisi",
                "PERIHAL_SURAT.required" => "Perihal Surat Harus Diisi",
            ]
        );
        $oldFile = $suratmasuk->FILE_SURAT;

        $updateSurat = SuratMasuk::where('id', $id)
            ->limit(1)
            ->update([
                'sifat_id' => $sifatsurat->id,
                'jenis_id' => $jenissurat->id,
                'KODE_SURAT' => $request->KODE_SURAT,
                'NOMOR_SURAT' => $request->NOMOR_SURAT,
                'TANGGAL_SURAT' => $request->TANGGAL_SURAT,
                'TANGGAL_MASUK' => $request->TANGGAL_MASUK,
                'ASAL_SURAT' => $request->ASAL_SURAT,
                'PERIHAL_SURAT' => $request->PERIHAL_SURAT,
                'FILE_SURAT' => $oldFile,
            ]);
    
        if ($request->hasFile('FILE_SURAT')) {
            $document = $request->file('FILE_SURAT');
            $fileName = time() . '_' .$document->getClientOriginalName();
            $document->move('document/', $fileName);
    
            $suratmasuk->FILE_SURAT = $fileName;
            $suratmasuk->save();
    
            if (file_exists('document/' . $oldFile)) {
                unlink('document/' . $oldFile);
            }
        }
    
    if ($updateSurat) {
        return redirect()->intended('/suratmasuk')->with([ notify()->success('Surat Masuk Telah Diupdate'),
            'success' => 'Surat Masuk Telah Diupdate']);
    }
    return redirect()->intended('/editsuratmasuk')->with([ notify()->error('Batal Mengupdate Surat Masuk'),
        'error' => 'Batal Mengupdate Surat Masuk']);

    }

    function export_excel()
    {
        return Excel::download(new ExportSuratMasuk, 'Surat_Masuk.xlsx');
    }

    public function filter(Request $request) {
        $month = $request->month;
        $year = $request->year;
        $showAll = $request->query('show_all', false);
    
        $query = SuratMasuk::query();
    
        if (!$showAll) {
            if ($month) {
                $query->whereMonth('TANGGAL_SURAT', $month);
                $usingfilter=true;
            }
    
            if ($year) {
                $query->whereYear('TANGGAL_SURAT', $year);
                $usingfilter=true;
            }
        }
    
        $suratmasuk = $query->get();
        $noData = $suratmasuk->isEmpty();
    
        return view("suratmasuk")->with([
            'suratmasuk' => $suratmasuk,
            'users' => Auth::guard('users')->user(),
            'noData' => $noData,
            'usingfilter' => $usingfilter
        ]);
    }
}