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
        $disposisi = Disposisi::latest()->paginate(5);
        $suratmasuk = SuratMasuk::all();
        return view('disposisi')->with([
            'disposisi' => $disposisi,
            'suratmasuk' => $suratmasuk,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }

    public function indexcreate($id) : View
    {
        $suratmasuk = SuratMasuk::where('id',$id)->first();
        $disposisi = Disposisi::all();
        return view("tambah/tambahdisposisi")->with([
            'suratmasuk' => $suratmasuk,
            'disposisi' => $disposisi,
            'admin' => Auth::guard('admin')->user() 
        ]);
    }
    public function store( Request $request ,$id)
    {
        $suratmasuk = SuratMasuk::where('id', $id)->first();
        $this->validate($request,
            [
                "NAMA" => ["required"],
                "HASIL_LAPORAN" => ["required"],
            ],
        );

        $file = $request->file("HASIL_LAPORAN");
        $fileName = $request->file("HASIL_LAPORAN")->getClientOriginalName();
        $file->move('document/', $fileName);

        $disposisi = Disposisi::create([
            'surat_masuk_id' => $suratmasuk->id,
            'NAMA' => $request->NAMA,
            'HASIL_LAPORAN' => $fileName
        ]);


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
        ]);
    }

    public function update(Request $request, $id)
    {
        $disposisi = Disposisi::where('id', $id)->first();

        if ($request->NAMA) {
            $disposisi->NAMA = $request->NAMA;
        }

        if ($request->HASIL_LAPORAN) {
            $disposisi->HASIL_LAPORAN = $request->HASIL_LAPORAN;
        }
        $updateDispo = Disposisi::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'NAMA' => $disposisi->NAMA,
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

    public function view($id){
        $data = Disposisi::find($id);

        return view("tampil/tampildisposisi",compact("data"));
    }

    public function create($id){
        $disposisi = Disposisi::where('id', $id)->first();
        return view('tampil/lembardisposisi')->with([
            'disposisi' => $disposisi,
        ]);
    }

    function export_excel()
    {
        return Excel::download(new ExportDisposisi, 'disposisi.xlsx');
    }
}
