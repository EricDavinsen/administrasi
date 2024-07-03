<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\View\View;
use Nette\Utils\DateTime;
use App\Exports\ExportSpt;
use Illuminate\Http\Request;
use App\Models\SuratPerintahTugas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratPerintahTugasController extends Controller
{
    public function index() : View
    {
        $spt = SuratPerintahTugas::latest()->get();
        $pegawai = Pegawai::all();

        return view("spt")->with([
            'spt' => $spt,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahspt")->with([
            'pegawai' => Pegawai::orderBy('NAMA_PEGAWAI', 'asc')->get(),
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "pegawai_id" => ["required"],
                "NO_SPT" => ["required"],
                "TANGGAL_SPT" => ["required"],
                "TANGGAL_MULAI" => ["required"],
                "TANGGAL_SELESAI" => ["required"],
                "KEPERLUAN" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
            [
                "pegawai_id.required" => "Nama Harus Diisi",
                "NO_SPT.required" => "Nomor Surat Harus Diisi",
                "TANGGAL_SPT.required" => "Tangal Surat Harus Diisi",
                "TANGGAL_MULAI.required" => "Tangal Mulai Harus Diisi",
                "TANGGAL_SELESAI.required" => "Tangal Selesai Harus Diisi",
                "KEPERLUAN.required" => "Keperluan Harus Diisi",
                "FILE_SURAT.required" => "File Surat Harus Diisi",
            ]
        );

        $file = $request->file("FILE_SURAT");
        $fileName = time() . '_' .$request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);

        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $tanggalselesai->modify("+1 day");
        $jarak = $tanggalselesai->diff($tanggalmulai);

        $spt = SuratPerintahTugas::create([
            'NO_SPT' => $request->NO_SPT,
            'TANGGAL_SPT' => $request->TANGGAL_SPT,
            'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
            'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
            'LAMA_TUGAS' => $jarak->days,
            'KEPERLUAN' => $request->KEPERLUAN,
            'FILE_SURAT' => $fileName
        ]);

        $spt->pegawais()->attach($request->pegawai_id);

        if ($spt) {
            return redirect()
                ->intended("/spt")
                ->with([
                notify()->success('SPT Telah Ditambahkan'),
                "success" => "SPT Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createspt")
            ->with([
                notify()->error('Gagal Menambah SPT'),
                "error" => "Gagal Menambah SPT"]);
    
    }

    public function destroy($id)
    {
        $deletefile = SuratPerintahTugas::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_SURAT);

        if (file_exists($file)) {
            @unlink($file);
        }

        $spt = SuratPerintahTugas::where('id', $id);

            if ($spt) {
                $spt->delete();
                return redirect()->intended('/spt')
                    ->with([ 
                        notify()->success('SPT Telah Dihapus'),
                        "success" => "SPT Telah Dihapus"]);
            }else {
                return redirect()->intended('/spt')
                    ->with([
                        notify()->error('Gagal Menghapus SPT'),
                        "error" => "Gagal Menghapus SPT"]);
            }
    }

    public function edit($id)
    {
        $spt = SuratPerintahTugas::with('pegawais')->findOrFail($id);
        $pegawai = Pegawai::all();

        return view("edit/editspt")->with([
            'spt' => $spt,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                "pegawai_id" => ["required"],
                "NO_SPT" => ["required"],
                "TANGGAL_SPT" => ["required"],
                "TANGGAL_MULAI" => ["required"],
                "TANGGAL_SELESAI" => ["required"],
                "KEPERLUAN" => ["required"],
            ],
            [
                "pegawai_id.required" => "Nama Harus Diisi",
                "NO_SPT.required" => "Nomor Surat Harus Diisi",
                "TANGGAL_SPT.required" => "Tangal Surat Harus Diisi",
                "TANGGAL_MULAI.required" => "Tangal Mulai Harus Diisi",
                "TANGGAL_SELESAI.required" => "Tangal Selesai Harus Diisi",
                "KEPERLUAN.required" => "Keperluan Harus Diisi",
            ]
        );
        $spt = SuratPerintahTugas::findOrFail($id);
        $oldFile = $spt->FILE_SURAT;
   
        $spt->update([
            'NO_SPT' => $request->NO_SPT,
            'TANGGAL_SPT' => $request->TANGGAL_SPT,
            'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
            'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
            'KEPERLUAN' => $request->KEPERLUAN,
            'FILE_SURAT' => $oldFile,

        ]);

        $spt->pegawais()->sync($request->pegawai_id);
       
        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $tanggalselesai->modify("+1 day");
        $jarak = $tanggalselesai->diff($tanggalmulai);
        $updatejarak = SuratPerintahTugas::where('id', $id);
        $updatejarak->update(['LAMA_TUGAS' => $jarak->days]);
 
        if ($request->hasFile('FILE_SURAT')) {
            $document = $request->file('FILE_SURAT');
            $fileName = time() . '_' .$document->getClientOriginalName();
            $document->move('document/', $fileName);
    
            $spt->FILE_SURAT = $fileName;
            $spt->save();
    
            if (file_exists('document/' . $oldFile)) {
                unlink('document/' . $oldFile);
            }
        }

    if ($spt) {
        return redirect()->intended('/spt')->with([ notify()->success('SPT Telah Diupdate'),
            'success' => 'SPT Telah Diupdate']);
    }
    return redirect()->intended('/editspt')->with([ notify()->error('Batal Mengupdate SPT'),
        'error' => 'Batal Mengupdate SPT']);
    }
    function export_excel()
    {
        return Excel::download(new ExportSpt, 'Surat_Perintah_Tugas.xlsx');
    }

    public function filter(Request $request) {
        $month = $request->month;
        $year = $request->year;
        $showAll = $request->query('show_all', false);
    
        $query = SuratPerintahTugas::query();
    
        if (!$showAll) {
            if ($month) {
                $query->whereMonth('TANGGAL_SPT', $month);
                $usingfilter=true;
            }
    
            if ($year) {
                $query->whereYear('TANGGAL_SPT', $year);
                $usingfilter=true;
            }
        }
    
        $spt = $query->get();
        $noData = $spt->isEmpty();
    
        return view("spt")->with([
            'spt' => $spt,
            'users' => Auth::guard('users')->user(),
            'noData' => $noData,
            'usingfilter' => $usingfilter
        ]);
    }
}   
