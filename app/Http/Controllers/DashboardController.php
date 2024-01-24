<?php

namespace App\Http\Controllers;

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
    
        return view('dashboardpage', compact('suratmasuk','suratkeluar','suratcuti','spt'))->with([
            'admin' => Auth::guard('admin')->user(),
            
        ]);
     
    }
}
