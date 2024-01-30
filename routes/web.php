<?php

use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\RiwayatSkController;
use App\Http\Controllers\SuratCutiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DataPribadiController;
use App\Http\Controllers\SuratKeluarController;
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
Route::get("/dashboardpage", [DashboardController::class, "index"])->middleware('auth:admin');
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('/login', [LoginController::class, "login"]);
Route::post('/createaccount', [LoginController::class, "register"]);
Route::get("/forgotpassword", [LoginController::class, "forgotpassword"]);
Route::post("/changepassword", [LoginController::class,"changepassword"]);


//SURAT KELUAR
Route::get('/suratkeluar', [SuratKeluarController::class, "index"])->middleware('auth:admin');
Route::get('/createsuratkeluar',[SuratKeluarController::class, "indexcreate"])->middleware('auth:admin');
Route::get("/carisuratkeluar", [SuratKeluarController::class, "find"])->middleware('auth:admin');
Route::get('/editsuratkeluar/{id}', [SuratKeluarController::class, "edit"])->middleware('auth:admin');
Route::delete("/deletesuratkeluar/{id}", [SuratKeluarController::class, "destroy"])->middleware('auth:admin');
Route::post('/addsuratkeluar', [SuratKeluarController::class, "store"])->middleware('auth:admin');
Route::put("/updatesuratkeluar/{id}", [SuratKeluarController::class, "update"])->middleware('auth:admin');
Route::get('/tampilsuratkeluar/{id}', [SuratKeluarController::class, "view"])->middleware('auth:admin');


// SURAT MASUK
Route::get('/suratmasuk', [SuratMasukController::class, "index"])->middleware('auth:admin');
Route::get('/createsuratmasuk',[SuratMasukController::class, "indexcreate"])->middleware('auth:admin');
Route::get("/carisuratmasuk", [SuratMasukController::class, "find"])->middleware('auth:admin');
Route::get('/editsuratmasuk/{id}', [SuratMasukController::class, "edit"])->middleware('auth:admin');
Route::delete("/deletesuratmasuk/{id}", [SuratMasukController::class, "destroy"])->middleware('auth:admin');
Route::post('/addsuratmasuk', [SuratMasukController::class, "store"])->middleware('auth:admin');
Route::put("/updatesuratmasuk/{id}", [SuratMasukController::class, "update"])->middleware('auth:admin');
Route::get('/tampilsuratmasuk/{id}', [SuratMasukController::class, "view"])->middleware('auth:admin');


// SPT
Route::get('/spt', [SuratPanggilanTugasController::class, "index"])->middleware('auth:admin');
Route::get('/createspt',[SuratPanggilanTugasController::class, "indexcreate"])->middleware('auth:admin');
Route::get("/carispt", [SuratPanggilanTugasController::class, "find"])->middleware('auth:admin');
Route::get('/editspt/{id}', [SuratPanggilanTugasController::class, "edit"])->middleware('auth:admin');
Route::delete("/deletespt/{id}", [SuratPanggilanTugasController::class, "destroy"])->middleware('auth:admin');
Route::post('/addspt', [SuratPanggilanTugasController::class, "store"])->middleware('auth:admin');
Route::put("/updatespt/{id}", [SuratPanggilanTugasController::class, "update"])->middleware('auth:admin');
Route::get('/tampilspt/{id}', [SuratPanggilanTugasController::class, "view"])->middleware('auth:admin');


// DISPOSISI
Route::get('/disposisi', [DisposisiController::class, "index"])->middleware('auth:admin');
Route::get("/createdisposisi/{id}", [DisposisiController::class, "indexcreate"])->middleware('auth:admin');
Route::get('/editdisposisi/{id}', [DisposisiController::class, "edit"])->middleware('auth:admin');
Route::delete("/deletedisposisi/{id}", [DisposisiController::class, "destroy"])->middleware('auth:admin');
Route::post('/adddisposisi/{id}', [DisposisiController::class, "store"]);
Route::put("/updatedisposisi/{id}", [DisposisiController::class, "update"])->middleware('auth:admin');
Route::get('/tampildisposisi/{id}', [DisposisiController::class, "view"])->middleware('auth:admin');
Route::get('/lembardisposisi/{id}', [DisposisiController::class, "create"])->middleware('auth:admin');


// SURAT CUTI
Route::get('/suratcuti', [SuratCutiController::class, "index"])->middleware('auth:admin');
Route::get("/createsuratcuti", [SuratCutiController::class, "indexcreate"])->middleware('auth:admin');
Route::get("/carisuratcuti", [SuratCutiController::class, "find"])->middleware('auth:admin');
Route::get('/editsuratcuti/{id}', [SuratCutiController::class, "edit"])->middleware('auth:admin');
Route::delete("/deletesuratcuti/{id}", [SuratCutiController::class, "destroy"])->middleware('auth:admin');
Route::post('/addsuratcuti', [SuratCutiController::class, "store"])->middleware('auth:admin');
Route::put("/updatesuratcuti/{id}", [SuratCutiController::class, "update"])->middleware('auth:admin');
Route::get('/tampilsuratcuti/{id}', [SuratCutiController::class, "view"])->middleware('auth:admin');


// DATA PEGAWAI
Route::get("/datapegawai", [PegawaiController::class,"indexpegawai"])->middleware('auth:admin');
Route::get("/createpegawai", [PegawaiController::class, "indexcreate"])->middleware('auth:admin');
Route::post('/addpegawai', [PegawaiController::class, "store"])->middleware('auth:admin');
Route::get("/dashboardpegawai/{id}", [PegawaiController::class,"index"])->middleware('auth:admin');
Route::delete("/deletepegawai/{id}", [PegawaiController::class, "destroy"])->middleware('auth:admin');
Route::get('/editpegawai/{id}', [PegawaiController::class, "edit"])->middleware('auth:admin');
Route::put("/updatepegawai/{id}", [PegawaiController::class, "update"])->middleware('auth:admin');
Route::get('/caripegawai', [PegawaiController::class, "find"])->middleware('auth:admin');
Route::get('/exportpegawai', [PegawaiController::class, "export_excel"])->middleware('auth:admin');
// Route::post('/importpegawai', [PegawaiController::class, "import_excel"])->middleware('auth:admin');


// DATA PRIBADI
Route::get('/datapribadi/{id}', [DataPribadiController::class,"index"])->middleware('auth:admin');
Route::get("/createdatapribadi/{id}", [DataPribadiController::class, "indexcreate"])->middleware('auth:admin');
Route::get('/editdatapribadi/{id}', [DataPribadiController::class, "edit"])->middleware('auth:admin');
Route::put("/updatedatapribadi/{id}", [DataPribadiController::class, "update"])->middleware('auth:admin');
Route::delete("/deletedatapribadi/{id}", [DataPribadiController::class, "destroy"])->middleware('auth:admin');
Route::post('/adddatapribadi/{id}', [DataPribadiController::class, "store"])->middleware('auth:admin');


// RIWAYAT PENDIDIKAN
Route::get('/riwayatpendidikan/{id}', [RiwayatPendidikanController::class,"index"])->middleware('auth:admin');
Route::get('/createriwayatpendidikan/{id}', [RiwayatPendidikanController::class,"indexcreate"])->middleware('auth:admin');
Route::post('/addriwayatpendidikan/{id}', [RiwayatPendidikanController::class, "store"])->middleware('auth:admin');
Route::delete("/deleteriwayatpendidikan/{id}", [RiwayatPendidikanController::class, "destroy"])->middleware('auth:admin');
Route::get('/editriwayatpendidikan/{id}', [RiwayatPendidikanController::class, "edit"])->middleware('auth:admin');
Route::put("/updateriwayatpendidikan/{id}", [RiwayatPendidikanController::class, "update"])->middleware('auth:admin');


// DIKLAT
Route::get('/diklat/{id}', [DiklatController::class,"index"])->middleware('auth:admin');
Route::get('/creatediklat/{id}', [DiklatController::class,"indexcreate"])->middleware('auth:admin');
Route::post('/adddiklat/{id}', [DiklatController::class, "store"])->middleware('auth:admin');
Route::delete("/deletediklat/{id}", [DiklatController::class, "destroy"])->middleware('auth:admin');
Route::get('/editdiklat/{id}', [DiklatController::class, "edit"])->middleware('auth:admin');
Route::put("/updatediklat/{id}", [DiklatController::class, "update"])->middleware('auth:admin');
Route::get('/sertifdiklat/{id}', [DiklatController::class, "view"])->middleware('auth:admin');
Route::get('/tampilsertifikat/{id}', [DiklatController::class, "view"])->middleware('auth:admin');


// RIWAYAT SK
Route::get('/riwayatsk/{id}', [RiwayatSkController::class,"index"])->middleware('auth:admin');
Route::get('/createriwayatsk/{id}', [RiwayatSkController::class,"indexcreate"])->middleware('auth:admin');
Route::post('/addriwayatsk/{id}', [RiwayatSkController::class, "store"])->middleware('auth:admin');
Route::delete("/deleteriwayatsk/{id}", [RiwayatSkController::class, "destroy"])->middleware('auth:admin');
Route::get('/editriwayatsk/{id}', [RiwayatSkController::class, "edit"])->middleware('auth:admin');
Route::put("/updateriwayatsk/{id}", [RiwayatSkController::class, "update"])->middleware('auth:admin');