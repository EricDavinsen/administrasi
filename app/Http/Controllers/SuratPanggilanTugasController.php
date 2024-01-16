<?php

namespace App\Http\Controllers;

use App\Models\SuratPanggilanTugas;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SuratPanggilanTugasController extends Controller
{
    public function index() : View
    {
        $spt = SuratPanggilanTugas::paginate(5);
        return view("spt")->with([
            'spt' => $spt
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahspt");
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
        
        $sptdata = $request->all();
        if($request->has('FILE_SURAT')){
            $sptdata['FILE_SURAT'] = $fileName;
        }

        $spt = SuratPanggilanTugas::create($sptdata);

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
            ->orWhere('TANGGAL_SPT', 'like', '%' . $request->search . '%')
            ->orWhere('NAMA', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_MULAI', 'like', '%' . $request->search . '%')
            ->orWhere('TANGGAL_SELESAI', 'like', '%' . $request->search . '%')
            ->orWhere('KEPERLUAN', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $spt->appends(['search' => $request->search]);

        return view("spt")->with([
            'spt' => $spt
        ]);
    }

    public function view($id){
        $data = SuratPanggilanTugas::find($id);

        return view("tampilspt",compact("data"));
    }
}
