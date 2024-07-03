<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\SuratCuti;
use Illuminate\View\View;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use App\Exports\ExportSuratCuti;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SuratCutiController extends Controller
{
    public function index() : View
    {
        $suratcuti = SuratCuti::latest()->get();
        $pegawai = Pegawai::all();
        
        return view("suratcuti")->with([
            'suratcuti' => $suratcuti,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
        
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahsuratcuti")->with([
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
                "NO_CUTI" => ["required"],
                "JENIS_CUTI" => ["required"],
                "ALASAN_CUTI" => ["required"],
                "TANGGAL_MULAI" => ["required"],
                "TANGGAL_SELESAI" => ["required"],
                "FILE_SURAT" => ["required"],
            ],
            [
                "pegawai_id.required" => "Nama Harus Diisi",
                "NO_CUTI.required" => "Nomor Cuti Harus Diisi",
                "JENIS_CUTI.required" => "Jenis Cuti Harus Diisi",
                "ALASAN_CUTI.required" => "Alasan Cuti Harus Diisi",
                "TANGGAL_MULAI.required" => "Tanggal Mulai Harus Diisi",
                "TANGGAL_SELESAI.required" => "Tanggal Selesai Harus Diisi",
                "FILE_SURAT.required" => "File Surat Harus Diisi",
            ]
        );

        $file = $request->file("FILE_SURAT");
        $fileName = time() . '_' .$request->file("FILE_SURAT")->getClientOriginalName();
        $file->move('document/', $fileName);

        $tanggalmulai = new DateTime($request->TANGGAL_MULAI);
        $tanggalselesai = new DateTime($request->TANGGAL_SELESAI);
        $tanggalselesai->modify("+1 day");
        $jarak = $tanggalselesai->diff($tanggalmulai);

        if ($pegawai->SISA_CUTI_TAHUNAN == 0 && $request->JENIS_CUTI == "Cuti Tahunan") {
            return redirect()
                ->intended("/createsuratcuti")
                ->with([
                    notify()->error('Sisa Cuti Tahunan 0'),
                    "error" => "Sisa Cuti Tahunan 0"
                ]);
        }

        $lamaCuti = $jarak->days;
        if ($lamaCuti > $pegawai->SISA_CUTI_TAHUNAN && $request->JENIS_CUTI == "Cuti Tahunan") {
            return redirect()
                ->intended("/createsuratcuti")
                ->with([
                    notify()->error('Lama cuti untuk cuti tahunan melebihi sisa cuti tahunan'),
                    "error" => "Lama cuti untuk cuti tahunan melebihi sisa cuti tahunan"
                ]);
        }

        $suratcuti = SuratCuti::create([
            'pegawai_id' => $pegawai->id,
            'NO_CUTI' => $request->NO_CUTI,
            'JENIS_CUTI' => $request->JENIS_CUTI,
            'ALASAN_CUTI' => $request->ALASAN_CUTI,
            'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
            'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
            'LAMA_CUTI' => $lamaCuti,
            'FILE_SURAT' => $fileName
        ]);

        if ($request->JENIS_CUTI == "Cuti Tahunan") {
            $pegawai->SISA_CUTI_TAHUNAN -= $lamaCuti;
            $pegawai->save();
        }

        if ($suratcuti) {
            return redirect()
                ->intended("/suratcuti")
                ->with([
                    notify()->success('Surat Cuti Telah Ditambahkan'),
                    "success" => "Surat Cuti Telah Ditambahkan"
                ]);
        }
        return redirect()
            ->intended("/createsuratcuti")
            ->with([
                notify()->error('Gagal Menambah Surat Cuti'),
                "error" => "Gagal Menambah Surat Cuti"
            ]);
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
            'pegawai' => Pegawai::all(),
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
{
    $suratcuti = SuratCuti::where('id', $id)->first();
    $oldpegawai = Pegawai::where('id', $suratcuti->pegawai_id)->first();
    $newpegawai = Pegawai::where('id', $request->pegawai_id)->first();
    
    $this->validate(
        $request,
        [
            "pegawai_id" => ["required"],
            "NO_CUTI" => ["required"],
            "JENIS_CUTI" => ["required"],
            "ALASAN_CUTI" => ["required"],
            "TANGGAL_MULAI" => ["required"],
            "TANGGAL_SELESAI" => ["required"],
        ],
        [
            "pegawai_id.required" => "Nama Harus Diisi",
            "NO_CUTI.required" => "Nomor Cuti Harus Diisi",
            "JENIS_CUTI.required" => "Jenis Cuti Harus Diisi",
            "ALASAN_CUTI.required" => "Alasan Cuti Harus Diisi",
            "TANGGAL_MULAI.required" => "Tanggal Mulai Harus Diisi",
            "TANGGAL_SELESAI.required" => "Tanggal Selesai Harus Diisi",
        ]
    );

    $tanggalmulai = new DateTime($request->TANGGAL_MULAI);
    $tanggalselesai = new DateTime($request->TANGGAL_SELESAI);
    $tanggalselesai->modify("+1 day");
    $lamaCuti = $tanggalselesai->diff($tanggalmulai)->days;

    if ($suratcuti->JENIS_CUTI == "Cuti Tahunan") {
        $oldpegawai->SISA_CUTI_TAHUNAN += $suratcuti->LAMA_CUTI;
        $oldpegawai->save();
    }

    if ($request->JENIS_CUTI == "Cuti Tahunan" && $lamaCuti > $newpegawai->SISA_CUTI_TAHUNAN) {
        return redirect()
            ->intended("/editsuratcuti")
            ->with([
                notify()->error('Lama cuti untuk cuti tahunan melebihi sisa cuti tahunan'),
                "error" => "Lama cuti untuk cuti tahunan melebihi sisa cuti tahunan"
            ]);
    }

    $oldFile = $suratcuti->FILE_SURAT;

    $suratcuti->update([
        'pegawai_id' => $newpegawai->id,
        'NO_CUTI' => $request->NO_CUTI,
        'JENIS_CUTI' => $request->JENIS_CUTI,
        'ALASAN_CUTI' => $request->ALASAN_CUTI,
        'TANGGAL_MULAI' => $request->TANGGAL_MULAI,
        'TANGGAL_SELESAI' => $request->TANGGAL_SELESAI,
        'LAMA_CUTI' => $lamaCuti,
        'FILE_SURAT' => $oldFile,
    ]);

    if ($request->hasFile('FILE_SURAT')) {
        $document = $request->file('FILE_SURAT');
        $fileName = time() . '_' .$document->getClientOriginalName();
        $document->move('document/', $fileName);

        $suratcuti->FILE_SURAT = $fileName;
        $suratcuti->save();

        if (file_exists('document/' . $oldFile)) {
            unlink('document/' . $oldFile);
        }
    }

    if ($request->JENIS_CUTI == "Cuti Tahunan") {
        $newpegawai->SISA_CUTI_TAHUNAN -= $lamaCuti;
    }

    $newpegawai->save();

    if ($suratcuti) {
        return redirect()->intended('/suratcuti')->with([
            notify()->success('Surat Cuti Telah Diupdate'),
            'success' => 'Surat Cuti Telah Diupdate'
        ]);
    }
    return redirect()->intended('/editsuratcuti')->with([
        notify()->error('Batal Mengupdate Surat Cuti'),
        'error' => 'Batal Mengupdate Surat Cuti'
    ]);
}
    
    function export_excel()
    {
        return Excel::download(new ExportSuratCuti, 'Surat_Cuti.xlsx');
    }

    public function reset($id){
        $updateSurat = Pegawai::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'SISA_CUTI_TAHUNAN' => 6,
            ),
        );
        
        if ($updateSurat) {
            return redirect()->intended('/suratcuti')->with([ notify()->success('Sisa Cuti Tahunan Telah Direset'),
                'success' => 'Sisa Cuti Tahunan Telah Direset']);
        }
        return redirect()->intended('/suratcuti')->with([ notify()->error('Batal Mereset Sisa Cuti Tahunan'),
            'error' => 'Batal Mereset Sisa Cuti Tahunan']);
    }
}
