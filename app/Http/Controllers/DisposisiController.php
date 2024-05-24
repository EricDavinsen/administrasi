<?php

namespace App\Http\Controllers;

use App\Exports\ExportDisposisi;
use App\Models\Disposisi;
use Illuminate\View\View;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DisposisiController extends Controller
{

    public function index(){
        $disposisi = Disposisi::latest()->get();
        $suratmasuk = SuratMasuk::all();
     
        return view('disposisi')->with([
            'disposisi' => $disposisi,
            'suratmasuk' => $suratmasuk,
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
            'users' => Auth::guard('users')->user()
        ]);


    }
    public function store( Request $request ,$id)
    {
        $suratmasuk = SuratMasuk::where('id', $id)->first();
        $this->validate($request,
            [
                "NAMA" => ["required"],
                "PENERUS" => ["required"],
                "INSTRUKSI" => ["required"],
            ],
        );

    if ($request->hasFile('HASIL_LAPORAN')) {
        $file = $request->file("HASIL_LAPORAN");
        $fileName = $request->file("HASIL_LAPORAN")->getClientOriginalName();
        $file->move('document/', $fileName);

        $disposisi = Disposisi::create([
            'surat_masuk_id' => $suratmasuk->id,
            'NAMA' => $request->NAMA,
            'PENERUS' => $request->PENERUS,
            'INSTRUKSI' => $request->INSTRUKSI,
            'INFORMASI_LAINNYA' => $request->INFORMASI_LAINNYA,
            'HASIL_LAPORAN' => $fileName
        ]);
    } else {
        $disposisi = Disposisi::create([
            'surat_masuk_id' => $suratmasuk->id,
            'NAMA' => $request->NAMA,
            'PENERUS' => $request->PENERUS,
            'INSTRUKSI' => $request->INSTRUKSI,
            'INFORMASI_LAINNYA' => $request->INFORMASI_LAINNYA,
            'HASIL_LAPORAN' => $request->HASIL_LAPORAN
        ]);
    }

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
        $disposisi = Disposisi::where('id', $id)->first();

        return view("edit/editdisposisi")->with([
            'disposisi' => $disposisi,
            'users' => Auth::guard('users')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $disposisi = Disposisi::where('id', $id)->first();

        if ($request->NAMA) {
            $disposisi->NAMA = $request->NAMA;
        }

        if ($request->PENERUS) {
            $disposisi->PENERUS = $request->PENERUS;
        }

        if ($request->INSTRUKSI) {
            $disposisi->INSTRUKSI = $request->INSTRUKSI;
        }

        if ($request->INFORMASI_LAINNYA) {
            $disposisi->INFORMASI_LAINNYA = $request->INFORMASI_LAINNYA;
        }

        if ($request->HASIL_LAPORAN) {
            $disposisi->HASIL_LAPORAN = $request->HASIL_LAPORAN;
        }
        $updateDispo = Disposisi::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA' => $disposisi->NAMA,
                'PENERUS' => $disposisi->PENERUS,
                'INSTRUKSI' => $disposisi->INSTRUKSI,
                'INFORMASI_LAINNYA' => $disposisi->INFORMASI_LAINNYA,
                'HASIL_LAPORAN' => $disposisi->HASIL_LAPORAN,
            ),
        );

 
        if ($request->hasFile('HASIL_LAPORAN')) {
            $updatefile = Disposisi::find($id);
            $document = $request->file('HASIL_LAPORAN');
            $fileName = $request->file("HASIL_LAPORAN")->getClientOriginalName();
            $document->move('document/', $fileName);
            $exist_file = $updatefile['HASIL_LAPORAN'];
            $update['HASIL_LAPORAN'] =  $fileName;
            $updatefile->update($update);
        }
       
        
        if (isset($exist_file) && file_exists($exist_file)) {
            unlink($exist_file);
        }

    if ($updateDispo) {
        return redirect()->intended('/disposisi')->with([ notify()->success('Disposisi Telah Diupdate'),
            'success' => 'Disposisi Telah Diupdate']);
    }
    return redirect()->intended('/editdisposisi')->with([ notify()->error('Batal Mengupdate Disposisi'),
        'error' => 'Batal Mengupdate Disposisi']);

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
        return Excel::download(new ExportDisposisi, 'disposisi.xlsx');
    }

    public function find(Request $request)
    {
        $disposisi = Disposisi::where('NAMA', 'like', '%' . $request->search . '%')
            ->get();
        $disposisi->appends(['search' => $request->search]);

        return view("disposisi")->with([
            'disposisi' => $disposisi,
            'users' => Auth::guard('users')->user()
        ]);
    }
}
