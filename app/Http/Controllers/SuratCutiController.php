<?php

namespace App\Http\Controllers;

use App\Exports\ExportSuratCuti;
use App\Models\SuratCuti;
use Illuminate\View\View;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratCutiController extends Controller
{
    public function index() : View
    {
        $suratcuti = SuratCuti::latest()->paginate(5);
        return view("suratcuti")->with([
            'suratcuti' => $suratcuti,
            'admin' => Auth::guard('admin')->user()
        ]);
        
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsuratcuti");
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                "NO_CUTI" => ["required"],
                "NAMA" => ["required"],
                "JENIS_CUTI" => ["required"],
                "ALASAN_CUTI" => ["required"],
                "TANGGAL_MULAI" => ["required"],
                "TANGGAL_SELESAI" => ["required"],
                "SISA_CUTI_TAHUNAN" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
        );

        $file = $request->file("FILE_SURAT");
        $fileName = $request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);

        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $jarak = $tanggalselesai->diff($tanggalmulai);

        $suratcuti = SuratCuti::create([    
            'NO_CUTI' => $request->NO_CUTI,
            'NAMA' => $request->NAMA,
            'JENIS_CUTI' => $request->JENIS_CUTI,
            'ALASAN_CUTI' => $request->ALASAN_CUTI,
            'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
            'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
            'LAMA_CUTI' => $jarak->days,
            'SISA_CUTI_TAHUNAN' => $request->SISA_CUTI_TAHUNAN,
            'FILE_SURAT' => $fileName
        ]);

        if ($suratcuti) {
            return redirect()
                ->intended("/suratcuti")
                ->with([
                notify()->success('Surat Cuti Telah Ditambahkan'),
                "success" => "Surat Cuti Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createsuratcuti")
            ->with([
                notify()->error('Gagal Menambah Surat Cuti'),
                "error" => "Gagal Menambah Surat Cuti"]);
    
    }

    public function destroy($id)
    {
        $deletefile = SuratCuti::findorfail($id);
        $file = public_path('document/'.$deletefile->FILE_SURAT);

        if (file_exists($file)) {
            @unlink($file);
        }

        $suratcuti = SuratCuti::where('id', $id);

            if ($suratcuti) {
                $suratcuti->delete();
                return redirect()->intended('/suratcuti')
                    ->with([ 
                        notify()->success('Surat Cuti Telah Dihapus'),
                        "success" => "Surat Cuti Telah Dihapus"]);
            }else {
                return redirect()->intended('/suratcuti')
                    ->with([
                        notify()->error('Gagal Menghapus Surat Cuti'),
                        "error" => "Gagal Menghapus Surat Cuti"]);
            }
    }

    public function edit($id)
    {
        $suratcuti = SuratCuti::where('id', $id)->first();

        return view("edit/editsuratcuti")->with([
            'suratcuti' => $suratcuti,
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratcuti = SuratCuti::where('id', $id)->first();

        if ($request->NO_CUTI) {
            $suratcuti->NO_CUTI = $request->NO_CUTI;
        }
        if ($request->NAMA) {
            $suratcuti->NAMA = $request->NAMA;
        }
        if ($request->JENIS_CUTI) {
            $suratcuti->JENIS_CUTI = $request->JENIS_CUTI;
        }
        if ($request->ALASAN_CUTI) {
            $suratcuti->ALASAN_CUTI = $request->ALASAN_CUTI;
        }
        if ($request->TANGGAL_MULAI) {
            $suratcuti->TANGGAL_MULAI = $request->TANGGAL_MULAI;
        }
        if ($request->TANGGAL_SELESAI) {
            $suratcuti->TANGGAL_SELESAI = $request->TANGGAL_SELESAI;
        }
        if ($request->SISA_CUTI_TAHUNAN) {
            $suratcuti->SISA_CUTI_TAHUNAN = $request->SISA_CUTI_TAHUNAN;
        }
        if ($request->FILE_SURAT) {
            $suratcuti->FILE_SURAT = $request->FILE_SURAT;
        }

        $updateSurat = SuratCuti::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NO_CUTI' => $suratcuti->NO_CUTI,
                'NAMA' => $suratcuti->NAMA,
                'JENIS_CUTI' => $suratcuti->JENIS_CUTI,
                'ALASAN_CUTI' => $suratcuti->ALASAN_CUTI,
                'TANGGAL_MULAI' => $suratcuti->TANGGAL_MULAI,
                'TANGGAL_SELESAI' => $suratcuti->TANGGAL_SELESAI,
                'SISA_CUTI_TAHUNAN' => $suratcuti->SISA_CUTI_TAHUNAN,
                'FILE_SURAT' => $suratcuti->FILE_SURAT,
            ),
        );

        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $jarak = $tanggalselesai->diff($tanggalmulai);
        $updatejarak = SuratCuti::where('id', $id);
        $updatejarak->update(['LAMA_CUTI' => $jarak->days]);

 
        if ($request->hasFile('FILE_SURAT')) {
            $updatefile = SuratCuti::find($id);
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
        return redirect()->intended('/suratcuti')->with([ notify()->success('Surat Cuti Telah Diupdate'),
            'success' => 'Surat Cuti Telah Diupdate']);
    }
    return redirect()->intended('/editsuratcuti')->with([ notify()->error('Batal Mengupdate Surat Cuti'),
        'error' => 'Batal Mengupdate Surat Cuti']);

    }

    public function find(Request $request)
    {
        $suratcuti = SuratCuti::where('NO_CUTI', 'like', '%' . $request->search . '%')
            ->orWhere('NAMA', 'like', '%' . $request->search . '%')
            ->orWhere('JENIS_CUTI', 'like', '%' . $request->search . '%')
            ->orWhere('ALASAN_CUTI', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_MULAI', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_SELESAI', 'like', '%' . $request->search . '%')
            ->orWhere('LAMA_CUTI', 'like', '%' . $request->search . '%')
            ->orWhere('SISA_CUTI_TAHUNAN', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $suratcuti->appends(['search' => $request->search]);

        return view("suratcuti")->with([
            'suratcuti' => $suratcuti
        ]);
    }

    public function view($id){
        $data = SuratCuti::find($id);

        return view("tampil/tampilsuratcuti",compact("data"));
    }

    function export_excel()
    {
        return Excel::download(new ExportSuratCuti, 'suratcuti.xlsx');
    }
}
