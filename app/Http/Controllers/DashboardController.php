<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absen;
use App\Models\Pegawai;
use App\Models\Disposisi;
use App\Models\SuratCuti;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\SuratPanggilanTugas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
 
    public function index()
    {
        $suratmasuk = SuratMasuk::count();
        $suratkeluar = SuratKeluar::count();
        $suratcuti = SuratCuti::count();
        $spt = SuratPanggilanTugas::count();
        $pegawai = Pegawai::count();
        $disposisi = Disposisi::count();
        $user = User::count();
    
        return view('dashboardpage', compact('suratmasuk','suratkeluar','suratcuti','spt','pegawai','disposisi','user'))->with([
            'users' => Auth::guard('users')->user(),
            
        ]);
     
    }
}
