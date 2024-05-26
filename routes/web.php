<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DataBpjsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\RiwayatSkController;
use App\Http\Controllers\SuratCutiController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DataPribadiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\PenilaianTahunanController;
use App\Http\Controllers\RiwayatPendidikanController;
use App\Http\Controllers\SuratPanggilanTugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//HOMEPAGE
Route::get('/', [LoginController::class, "index"]);
Route::get('/home', [LoginController::class, "index"])->name('home');
Route::get('/register', [LoginController::class,"regis"]);
Route::get("/dashboardpage", [DashboardController::class, "index"])->middleware('auth:users');
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('/login', [LoginController::class, "login"]);
Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');
Route::resource('events', EventController::class);

Route::middleware(['auth:users', 'role'])->group(function () {
   //SURAT KELUAR
    Route::get('/suratkeluar', [SuratKeluarController::class, "index"]);
    Route::get('/createsuratkeluar',[SuratKeluarController::class, "indexcreate"]);
    Route::get('/editsuratkeluar/{id}', [SuratKeluarController::class, "edit"]);
    Route::delete("/deletesuratkeluar/{id}", [SuratKeluarController::class, "destroy"]);
    Route::post('/addsuratkeluar', [SuratKeluarController::class, "store"]);
    Route::put("/updatesuratkeluar/{id}", [SuratKeluarController::class, "update"]);
    Route::get('/exportsuratkeluar', [SuratKeluarController::class, "export_excel"]);
    Route::get("/filtersuratkeluar", [SuratKeluarController::class, "filter"]);


    // SURAT MASUK
    Route::get('/suratmasuk', [SuratMasukController::class, "index"]);
    Route::get('/createsuratmasuk',[SuratMasukController::class, "indexcreate"]);
    Route::get('/editsuratmasuk/{id}', [SuratMasukController::class, "edit"]);
    Route::delete("/deletesuratmasuk/{id}", [SuratMasukController::class, "destroy"]);
    Route::post('/addsuratmasuk', [SuratMasukController::class, "store"]);
    Route::put("/updatesuratmasuk/{id}", [SuratMasukController::class, "update"]);
    Route::get('/exportsuratmasuk', [SuratMasukController::class, "export_excel"]);
    Route::get("/filter", [SuratMasukController::class, "filter"]);


    // SPT
    Route::get('/spt', [SuratPanggilanTugasController::class, "index"]);
    Route::get('/createspt',[SuratPanggilanTugasController::class, "indexcreate"]);
    Route::get('/editspt/{id}', [SuratPanggilanTugasController::class, "edit"]);
    Route::delete("/deletespt/{id}", [SuratPanggilanTugasController::class, "destroy"]);
    Route::post('/addspt', [SuratPanggilanTugasController::class, "store"]);
    Route::put("/updatespt/{id}", [SuratPanggilanTugasController::class, "update"]);
    Route::get('/exportspt', [SuratPanggilanTugasController::class, "export_excel"]);
    Route::get("/filterspt", [SuratPanggilanTugasController::class, "filter"]);


    // DISPOSISI
    Route::get('/disposisi', [DisposisiController::class, "index"]);
    Route::get("/createdisposisi/{id}", [DisposisiController::class, "indexcreate"]);
    Route::get('/editdisposisi/{id}', [DisposisiController::class, "edit"]);
    Route::delete("/deletedisposisi/{id}", [DisposisiController::class, "destroy"]);
    Route::post('/adddisposisi/{id}', [DisposisiController::class, "store"]);
    Route::put("/updatedisposisi/{id}", [DisposisiController::class, "update"]);
    Route::get('/lembardisposisi/{id}', [DisposisiController::class, "create"]);
    Route::get('/exportdisposisi', [DisposisiController::class, "export_excel"]);


    // SURAT CUTI
    Route::get('/suratcuti', [SuratCutiController::class, "index"]);
    Route::get("/createsuratcuti", [SuratCutiController::class, "indexcreate"]);
    Route::get('/editsuratcuti/{id}', [SuratCutiController::class, "edit"]);
    Route::delete("/deletesuratcuti/{id}", [SuratCutiController::class, "destroy"]);
    Route::post('/addsuratcuti', [SuratCutiController::class, "store"]);
    Route::put("/updatesuratcuti/{id}", [SuratCutiController::class, "update"]);
    Route::get('/exportsuratcuti', [SuratCutiController::class, "export_excel"]);
    Route::get('/resetcuti/{id}', [SuratCutiController::class, "reset"]);


    // DATA PEGAWAI
    Route::get("/datapegawai", [PegawaiController::class,"indexpegawai"]);
    Route::get("/createpegawai", [PegawaiController::class, "indexcreate"]);
    Route::post('/addpegawai', [PegawaiController::class, "store"]);
    Route::get("/dashboardpegawai/{id}", [PegawaiController::class,"index"]);
    Route::delete("/deletepegawai/{id}", [PegawaiController::class, "destroy"]);
    Route::get('/editpegawai/{id}', [PegawaiController::class, "edit"]);
    Route::put("/updatepegawai/{id}", [PegawaiController::class, "update"]);
    Route::get('/exportpegawai', [PegawaiController::class, "export_excel"]);
    Route::get('/cetakinformasi/{id}', [PegawaiController::class, "create"]);


    // DATA PRIBADI
    Route::get('/datapribadi/{id}', [DataPribadiController::class,"index"]);
    Route::get("/createdatapribadi/{id}", [DataPribadiController::class, "indexcreate"]);
    Route::get('/editdatapribadi/{id}', [DataPribadiController::class, "edit"]);
    Route::put("/updatedatapribadi/{id}", [DataPribadiController::class, "update"]);
    Route::delete("/deletedatapribadi/{id}", [DataPribadiController::class, "destroy"]);
    Route::post('/adddatapribadi/{id}', [DataPribadiController::class, "store"]);


    // RIWAYAT PENDIDIKAN
    Route::get('/riwayatpendidikan/{id}', [RiwayatPendidikanController::class,"index"]);
    Route::get('/createriwayatpendidikan/{id}', [RiwayatPendidikanController::class,"indexcreate"]);
    Route::post('/addriwayatpendidikan/{id}', [RiwayatPendidikanController::class, "store"]);
    Route::delete("/deleteriwayatpendidikan/{id}", [RiwayatPendidikanController::class, "destroy"]);
    Route::get('/editriwayatpendidikan/{id}', [RiwayatPendidikanController::class, "edit"]);
    Route::put("/updateriwayatpendidikan/{id}", [RiwayatPendidikanController::class, "update"]);
    Route::get('/exportriwayatpendidikan/{id}', [RiwayatPendidikanController::class, "export_excel"]);


    // DIKLAT
    Route::get('/diklat/{id}', [DiklatController::class,"index"]);
    Route::get('/creatediklat/{id}', [DiklatController::class,"indexcreate"]);
    Route::post('/adddiklat/{id}', [DiklatController::class, "store"]);
    Route::delete("/deletediklat/{id}", [DiklatController::class, "destroy"]);
    Route::get('/editdiklat/{id}', [DiklatController::class, "edit"]);
    Route::put("/updatediklat/{id}", [DiklatController::class, "update"]);
    Route::get('/sertifdiklat/{id}', [DiklatController::class, "view"]);
    Route::get('/exportdiklat/{id}', [DiklatController::class, "export_excel"]);


    // RIWAYAT SK
    Route::get('/riwayatsk/{id}', [RiwayatSkController::class,"index"]);
    Route::get('/createriwayatsk/{id}', [RiwayatSkController::class,"indexcreate"]);
    Route::post('/addriwayatsk/{id}', [RiwayatSkController::class, "store"]);
    Route::delete("/deleteriwayatsk/{id}", [RiwayatSkController::class, "destroy"]);
    Route::get('/editriwayatsk/{id}', [RiwayatSkController::class, "edit"]);
    Route::put("/updateriwayatsk/{id}", [RiwayatSkController::class, "update"]);
    Route::get('/exportriwayatsk/{id}', [RiwayatSkController::class, "export_excel"]);


    // DATA KELUARGA
    Route::get('/datakeluarga/{id}', [DataKeluargaController::class,"index"]);
    Route::get('/createdatakeluarga/{id}', [DataKeluargaController::class,"indexcreate"]);
    Route::post('/adddatakeluarga/{id}', [DataKeluargaController::class, "store"]);
    Route::delete("/deletedatakeluarga/{id}", [DataKeluargaController::class, "destroy"]);
    Route::get('/editdatakeluarga/{id}', [DataKeluargaController::class, "edit"]);
    Route::put("/updatedatakeluarga/{id}", [DataKeluargaController::class, "update"]);
    Route::get('/exportdatakeluarga/{id}', [DataKeluargaController::class, "export_excel"]);


    // PENILAIAN TAHUNAN
    Route::get('/penilaiantahunan/{id}', [PenilaianTahunanController::class,"index"]);
    Route::get('/createpenilaiantahunan/{id}', [PenilaianTahunanController::class,"indexcreate"]);
    Route::post('/addpenilaiantahunan/{id}', [PenilaianTahunanController::class, "store"]);
    Route::delete("/deletepenilaiantahunan/{id}", [PenilaianTahunanController::class, "destroy"]);
    Route::get('/editpenilaiantahunan/{id}', [PenilaianTahunanController::class, "edit"]);
    Route::put("/updatepenilaiantahunan/{id}", [PenilaianTahunanController::class, "update"]);


    // DATA BPJS
    Route::get('/databpjs/{id}', [DataBpjsController::class,"index"]);
    Route::get('/createdatabpjs/{id}', [DataBpjsController::class,"indexcreate"]);
    Route::post('/adddatabpjs/{id}', [DataBpjsController::class, "store"]);
    Route::delete("/deletedatabpjs/{id}", [DataBpjsController::class, "destroy"]);
    Route::get('/editdatabpjs/{id}', [DataBpjsController::class, "edit"]);
    Route::put("/updatedatabpjs/{id}", [DataBpjsController::class, "update"]);
    Route::get('/exportbpjs/{id}', [DataBpjsController::class, "export_excel"]);

    // CREATE USER
    Route::get('/daftaruser', [UserController::class,"index"]);
    Route::get('/createuser', [UserController::class,"indexcreate"]);
    Route::post('/adduser', [UserController::class, "store"]);
    Route::delete("/deleteuser/{id}", [UserController::class, "destroy"]);
    Route::get('/edituser/{id}', [UserController::class, "edit"]);
    Route::put("/updateuser/{id}", [UserController::class, "update"]);

    //JENIS SURAT
    Route::get('/jenissurat', [JenisSuratController::class, "index"]);
    Route::get('/createjenissurat', [JenisSuratController::class, "indexcreate"]);
    Route::post('/addjenissurat', [JenisSuratController::class, "store"]);
    Route::get('/editjenissurat/{id}', [JenisSuratController::class, "edit"]);
    Route::put("/updatejenissurat/{id}", [JenisSuratController::class, "update"]);
    Route::delete("/deletejenissurat/{id}", [JenisSuratController::class, "destroy"]);
});