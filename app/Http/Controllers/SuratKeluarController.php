<?php

namespace App\Http\Controllers;

use App\Models\SifatSurat;
use Illuminate\View\View;
use App\Models\JenisSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Exports\ExportSuratKeluar;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratKeluarController extends Controller
{
    public function index() : View
    {
        $suratkeluar = SuratKeluar::latest()->get();
        $jenissurat = JenisSurat::all();
        $sifatsurat = SifatSurat::all();
        
        return view("suratkeluar")->with([
            'suratkeluar' => $suratkeluar,
            'jenissurat' => $jenissurat,
            'sifatsurat' => $sifatsurat,
            'users' => Auth::guard('users')->user()
        ]);
        
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsuratkeluar")->with([
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
                "NOMOR_SURAT" => ["required"],
                "TANGGAL_SURAT" => ["required"],
                "TUJUAN_SURAT" => ["required"],
                "PERIHAL_SURAT" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
            [
                "sifat_id.required" => "Sifat Surat Harus Diisi",
                "jenis_id.required" => "Jenis Surat Harus Diisi",
                "NOMOR_SURAT.required" => "Nomor Surat Harus Diisi",
                "TANGGAL_SURAT.required" => "Tangal Surat Harus Diisi",
                "TUJUAN_SURAT.required" => "Tangal Surat Harus Diisi",
                "PERIHAL_SURAT.required" => "Perihal Surat Harus Diisi",
                "FILE_SURAT.required" => "File Surat Harus Diisi",
            ]
        );

        $file = $request->file("FILE_SURAT");
        $fileName = time() . '_' .$request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);
        
      
        $suratKeluar = SuratKeluar::create([
            "sifat_id" => $sifatsurat->id,
            "jenis_id" => $jenissurat->id,
            "NOMOR_SURAT" => $request->NOMOR_SURAT,
            "TANGGAL_SURAT" => $request->TANGGAL_SURAT,
            "TUJUAN_SURAT" => $request->TUJUAN_SURAT,
            "PERIHAL_SURAT" => $request->PERIHAL_SURAT,
            "FILE_SURAT" => $fileName,
    ]);

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
            'jenissurat' => JenisSurat::orderBy('JENIS_SURAT', 'asc')->get(),
            'sifatsurat' => SifatSurat::orderBy('SIFAT_SURAT', 'asc')->get(),
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratkeluar = SuratKeluar::where('id', $id)->first();
        $jenissurat = JenisSurat::where('id', $request->jenis_id)->first();
        $sifatsurat = SifatSurat::where('id', $request->sifat_id)->first();

        $this->validate(
            $request,
            [
                "sifat_id" => ["required"],
                "jenis_id" => ["required"],
                "NOMOR_SURAT" => ["required"],
                "TANGGAL_SURAT" => ["required"],
                "TUJUAN_SURAT" => ["required"],
                "PERIHAL_SURAT" => ["required"],
            ],
            [
                "sifat_id.required" => "Sifat Surat Harus Diisi",
                "jenis_id.required" => "Jenis Surat Harus Diisi",
                "NOMOR_SURAT.required" => "Nomor Surat Harus Diisi",
                "TANGGAL_SURAT.required" => "Tangal Surat Harus Diisi",
                "TUJUAN_SURAT.required" => "Tangal Surat Harus Diisi",
                "PERIHAL_SURAT.required" => "Perihal Surat Harus Diisi",
            ]
        );
        $oldFile = $suratkeluar->FILE_SURAT;

        $updateSurat = SuratKeluar::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'sifat_id' => $sifatsurat->id,
                'jenis_id' => $jenissurat->id,
                'NOMOR_SURAT' => $request->NOMOR_SURAT,
                'TANGGAL_SURAT' => $request->TANGGAL_SURAT,
                'TUJUAN_SURAT' => $request->TUJUAN_SURAT,
                'PERIHAL_SURAT' => $request->PERIHAL_SURAT,
                'FILE_SURAT' => $oldFile,
            ),
        );
   
 
        if ($request->hasFile('FILE_SURAT')) {
            $document = $request->file('FILE_SURAT');
            $fileName = time() . '_' .$document->getClientOriginalName();
            $document->move('document/', $fileName);
    
            $suratkeluar->FILE_SURAT = $fileName;
            $suratkeluar->save();
    
            if (file_exists('document/' . $oldFile)) {
                unlink('document/' . $oldFile);
            }
        }

    if ($updateSurat) {
        return redirect()->intended('/suratkeluar')->with([ notify()->success('Surat Keluar Telah Diupdate'),
            'success' => 'Surat Keluar Telah Diupdate']);
    }
    return redirect()->intended('/editsuratkeluar')->with([ notify()->error('Batal Mengupdate Surat Keluar'),
        'error' => 'Batal Mengupdate Surat Keluar']);

    }

    function export_excel()
    {
        return Excel::download(new ExportSuratKeluar, 'Surat_Keluar.xlsx');
    }

    public function filter(Request $request) {
        $month = $request->month;
        $year = $request->year;
        $showAll = $request->query('show_all', false);
    
        $query = SuratKeluar::query();
    
        if ($month && !$showAll) {
            
            $query->whereMonth('TANGGAL_SURAT', $month);
            $usingfilter=true;
        }
    
        if ($year && !$showAll) {
           
            $query->whereYear('TANGGAL_SURAT', $year);
            $usingfilter=true;
        }
    
        $suratkeluar = $query->get();
        $noData = $suratkeluar->isEmpty();
    
        return view("suratkeluar")->with([
            'suratkeluar' => $suratkeluar,
            'users' => Auth::guard('users')->user(),
            'noData' => $noData,
            'usingfilter' => $usingfilter
        ]);
    }
}