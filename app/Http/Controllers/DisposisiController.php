<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Disposisi;
use Illuminate\View\View;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Exports\ExportDisposisi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DisposisiController extends Controller
{
    public function index(){
        $disposisi = Disposisi::latest()->get();
        $suratmasuk = SuratMasuk::all();
        $pegawai = Pegawai::all();
     
        return view('disposisi')->with([
            'disposisi' => $disposisi,
            'suratmasuk' => $suratmasuk,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user() 
        ]);
    }

    public function indexcreate($id) 
    {
        $suratmasuk = SuratMasuk::where('id',$id)->first();
        $disposisi = Disposisi::all();

        $existingDisposisi = Disposisi::where('surat_masuk_id', $id)->first();
        if ($existingDisposisi) {
            return redirect()->back()->with('error', 'Sudah terdapat disposisi pada surat masuk ini.');
        }

        return view("tambah/tambahdisposisi")->with([
            'suratmasuk' => $suratmasuk,
            'disposisi' => $disposisi,
            'pegawai' => Pegawai::orderBy('NAMA_PEGAWAI', 'asc')->get(),
            'users' => Auth::guard('users')->user()
        ]);
    }
    public function store( Request $request ,$id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);
        $disposisi = Disposisi::find($id);
  
        $this->validate($request,
            [
                "pegawai_id" => ["required"],
                "PENERUS" => ["required"],
                "INSTRUKSI" => ["required"],
            ],
            [
                "pegawai_id.required" => "Nama Harus Diisi",
                "PENERUS.required" => "Penerus Harus Diisi",
                "INSTRUKSI.required" => "Instruksi Harus Diisi",
            ]
        );

    if ($request->hasFile('HASIL_LAPORAN')) {
        $file = $request->file("HASIL_LAPORAN");
        $fileName = time() . '_' .$request->file("HASIL_LAPORAN")->getClientOriginalName();
        $file->move('document/', $fileName);

        $disposisi = Disposisi::create([
            'surat_masuk_id' => $suratmasuk->id,
            'PENERUS' => $request->PENERUS,
            'INSTRUKSI' => $request->INSTRUKSI,
            'INFORMASI_LAINNYA' => $request->INFORMASI_LAINNYA,
            'HASIL_LAPORAN' => $fileName
        ]);
    } else {
        $disposisi = Disposisi::create([
            'surat_masuk_id' => $suratmasuk->id,
            'PENERUS' => $request->PENERUS,
            'INSTRUKSI' => $request->INSTRUKSI,
            'INFORMASI_LAINNYA' => $request->INFORMASI_LAINNYA,
            'HASIL_LAPORAN' => $request->HASIL_LAPORAN
        ]);
    }
    
    $disposisi->pegawais()->attach($request->pegawai_id);

        if ($disposisi) {
            return redirect()
                ->intended("/disposisi")
                ->with([
                notify()->success('Disposisi Telah Ditambahkan'),
                "success" => "Disposisi Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createdisposisi")
            ->with([
                notify()->error('Gagal Menambah Disposisi'),
                "error" => "Gagal Menambah Disposisi"]);

    }

    public function destroy($id)
    {
        $deletefile = Disposisi::findorfail($id);
        $file = public_path('document/'.$deletefile->HASIL_LAPORAN);

        if (file_exists($file)) {
            @unlink($file);
        }

        $disposisi = Disposisi::where('id', $id);

            if ($disposisi) {
                $disposisi->delete();
                return redirect()->intended('/disposisi')
                    ->with([ 
                        notify()->success('Disposisi Telah Dihapus'),
                        "success" => "Disposisi Telah Dihapus"]);
            }else {
                return redirect()->intended('/disposisi')
                    ->with([
                        notify()->error('Gagal Menghapus Disposisi'),
                        "error" => "Gagal Menghapus Disposisi"]);
            }
    }

    public function edit($id)
    {
        $disposisi = Disposisi::with('pegawais')->findOrFail($id);
        $pegawai = Pegawai::all();
    
        return view("edit/editdisposisi")->with([
            'disposisi' => $disposisi,
            'pegawai' => $pegawai,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "pegawai_id" => ["required"],
            "PENERUS" => ["required"],
            "INSTRUKSI" => ["required"],
        ], [
            "pegawai_id.required" => "Nama Harus Diisi",
            "PENERUS.required" => "Penerus Harus Diisi",
            "INSTRUKSI.required" => "Instruksi Harus Diisi",
        ]);
    
        $disposisi = Disposisi::findOrFail($id);
        $oldFile = $disposisi->HASIL_LAPORAN;
    
        $disposisi->update([
            'PENERUS' => $request->PENERUS,
            'INSTRUKSI' => $request->INSTRUKSI,
            'INFORMASI_LAINNYA' => $request->INFORMASI_LAINNYA,
            'HASIL_LAPORAN' => $oldFile
        ]);

        $disposisi->pegawais()->sync($request->pegawai_id);
    
        if ($request->hasFile('HASIL_LAPORAN')) {
            $document = $request->file('HASIL_LAPORAN');
            $fileName = time() . '_' .$document->getClientOriginalName();
            $document->move('document/', $fileName);
    
            $disposisi->HASIL_LAPORAN = $fileName;
            $disposisi->save();
    
            if ($oldFile && is_file('document/' . $oldFile)) {
                unlink('document/' . $oldFile);
            }
        }
    
        return redirect()->intended('/disposisi')->with([
            notify()->success('Disposisi Telah Diupdate'),
            'success' => 'Disposisi Telah Diupdate'
        ]);
    }

    public function create($id){
        $disposisi = Disposisi::where('id', $id)->first();
        return view('tampil/lembardisposisi')->with([
            'disposisi' => $disposisi,
            'users' => Auth::guard('users')->user()
        ]);
    }

    function export_excel()
    {
        return Excel::download(new ExportDisposisi, 'Disposisi.xlsx');
    }

}