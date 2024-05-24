<?php

namespace App\Http\Controllers;

use App\Exports\ExportSpt;
use Illuminate\View\View;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use App\Models\SuratPanggilanTugas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratPanggilanTugasController extends Controller
{
    public function index() : View
    {
        $spt = SuratPanggilanTugas::latest()->get();
  
        return view("spt")->with([
            'spt' => $spt,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahspt")->with([
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                "NO_SPT" => ["required"],
                "TANGGAL_SPT" => ["required"],
                "NAMA" => ["required"],
                "TANGGAL_MULAI" => ["required"],
                "TANGGAL_SELESAI" => ["required"],
                "KEPERLUAN" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
        );

        $file = $request->file("FILE_SURAT");
        $fileName = $request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);

        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $jarak = $tanggalselesai->diff($tanggalmulai);

        $spt = SuratPanggilanTugas::create([
            'NO_SPT' => $request->NO_SPT,
            'TANGGAL_SPT' => $request->TANGGAL_SPT,
            'NAMA' => $request->NAMA,
            'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
            'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
            'LAMA_TUGAS' => $jarak->days,
            'KEPERLUAN' => $request->KEPERLUAN,
            'FILE_SURAT' => $fileName
        ]);

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
        $deletefile = SuratPanggilanTugas::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_SURAT);

        if (file_exists($file)) {
            @unlink($file);
        }

        $spt = SuratPanggilanTugas::where('id', $id);

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
        $spt = SuratPanggilanTugas::where('id', $id)->first();

        return view("edit/editspt")->with([
            'spt' => $spt,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $spt = SuratPanggilanTugas::where('id', $id)->first();

        if ($request->NO_SPT) {
            $spt->NO_SPT = $request->NO_SPT;
        }
        if ($request->TANGGAL_SPT) {
            $spt->TANGGAL_SPT = $request->TANGGAL_SPT;
        }
        if ($request->NAMA) {
            $spt->NAMA = $request->NAMA;
        }
        if ($request->TANGGAL_MULAI) {
            $spt->TANGGAL_MULAI = $request->TANGGAL_MULAI;
        }
        if ($request->TANGGAL_SELESAI) {
            $spt->TANGGAL_SELESAI = $request->TANGGAL_SELESAI;
        }
        if ($request->KEPERLUAN) {
            $spt->KEPERLUAN = $request->KEPERLUAN;
        }
        if ($request->FILE_SURAT) {
            $spt->FILE_SURAT = $request->FILE_SURAT;
        }
        $updateSurat = SuratPanggilanTugas::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NO_SPT' => $spt->NO_SPT,
                'TANGGAL_SPT' => $spt->TANGGAL_SPT,
                'NAMA' => $spt->NAMA,
                'TANGGAL_MULAI' => $spt->TANGGAL_MULAI,
                'TANGGAL_SELESAI' => $spt->TANGGAL_SELESAI,
                'KEPERLUAN' => $spt->KEPERLUAN,
                'FILE_SURAT' => $spt->FILE_SURAT,
            ),
        );

        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $jarak = $tanggalselesai->diff($tanggalmulai);
        $updatejarak = SuratPanggilanTugas::where('id', $id);
        $updatejarak->update(['LAMA_TUGAS' => $jarak->days]);
 
        if ($request->hasFile('FILE_SURAT')) {
            $updatefile = SuratPanggilanTugas::find($id);
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
        return redirect()->intended('/spt')->with([ notify()->success('SPT Telah Diupdate'),
            'success' => 'SPT Telah Diupdate']);
    }
    return redirect()->intended('/editspt')->with([ notify()->error('Batal Mengupdate SPT'),
        'error' => 'Batal Mengupdate SPT']);

    }

    public function find(Request $request)
    {
        $spt = SuratPanggilanTugas::where('NO_SPT', 'like', '%' . $request->search . '%')
            ->orWhereRaw("DATE_FORMAT(TANGGAL_SPT, '%d-%m-%Y') LIKE ?", ["%" . $request->search . "%"])
            ->orWhere('NAMA', 'like', '%' . $request->search . '%')
            ->orWhereRaw("DATE_FORMAT(TANGGAL_MULAI, '%d-%m-%Y') LIKE ?", ["%" . $request->search . "%"])
            ->orWhereRaw("DATE_FORMAT(TANGGAL_SELESAI, '%d-%m-%Y') LIKE ?", ["%" . $request->search . "%"])
            ->orWhere('LAMA_TUGAS', 'like', '%' . $request->search . '%')
            ->orWhere('KEPERLUAN', 'like', '%' . $request->search . '%')
            ->get();
        $spt->appends(['search' => $request->search]);

        return view("spt")->with([
            'spt' => $spt,
            'users' => Auth::guard('users')->user()
        ]);
    }
    function export_excel()
    {
        return Excel::download(new ExportSpt, 'suratpanggilantugas.xlsx');
    }

    public function filter(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if ($start_date && $end_date) { 
            $spt = SuratPanggilanTugas::whereBetween('TANGGAL_SPT', [$start_date, $end_date])
                ->get();
        } else {
            $spt = SuratPanggilanTugas::latest()->get();
        }

        return view("spt")->with([
            'spt' => $spt,
            'users' => Auth::guard('users')->user()
        ]);
    }
}
