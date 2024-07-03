<?php

namespace App\Http\Controllers;

use App\Models\SuratPerintahTugas;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Pegawai;
use App\Models\Disposisi;
use App\Models\SuratCuti;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
 
    public function index()
    {
        $suratmasuk = SuratMasuk::count();
        $suratkeluar = SuratKeluar::count();
        $suratcuti = SuratCuti::count();
        $spt = SuratPerintahTugas::count();
        $pegawai = Pegawai::count();
        $disposisi = Disposisi::count();
        $user = User::count();
        
        $now = Carbon::now();
        $startOfDay = $now->startOfDay()->format('Y-m-d H:i:s');
        $endOfDay = $now->endOfDay()->format('Y-m-d H:i:s');
    
        $events = Event::whereBetween('start_date', [$startOfDay, $endOfDay])->get();
    
        return view('dashboardpage', compact('suratmasuk','suratkeluar','suratcuti','spt','pegawai','disposisi','user','events'))->with([
            'users' => Auth::guard('users')->user(),
        ]);
    }
}
