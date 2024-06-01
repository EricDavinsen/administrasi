<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\View\View;
use Nette\Utils\DateTime;
use App\Exports\ExportSpt;
use Illuminate\Http\Request;
use App\Models\SuratPanggilanTugas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratPanggilanTugasController extends Controller
{
    public function index() : View
    {
        $spt = SuratPanggilanTugas::latest()->get();
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
        $pegawai = Pegawai::where('id', $request->pegawai_id)->first();
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
        $fileName = $request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);

        $tanggalmulai = new DateTime("$request->TANGGAL_MULAI");
        $tanggalselesai = new DateTime("$request->TANGGAL_SELESAI");
        $jarak = $tanggalselesai->diff($tanggalmulai);

        $spt = SuratPanggilanTugas::create([
            'pegawai_id' => $pegawai->id,
            'NO_SPT' => $request->NO_SPT,
            'TANGGAL_SPT' => $request->TANGGAL_SPT,
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
            'pegawai' => Pegawai::all(),
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $spt = SuratPanggilanTugas::where('id', $id)->first();
        $pegawai = Pegawai::where('id', $request->pegawai_id)->first();

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

        $updateSurat = SuratPanggilanTugas::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'pegawai_id' => $pegawai->id,
                'NO_SPT' => $spt->NO_SPT,
                'TANGGAL_SPT' => $spt->TANGGAL_SPT,
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
