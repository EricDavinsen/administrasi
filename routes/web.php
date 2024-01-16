<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
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
Route::get('/home', [LoginController::class, "index"])->name("home");;
Route::get('/register', [LoginController::class,"regis"]);
Route::get("/dashboardpage", [DashboardController::class, "index"])->name("dashboardpage");
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('/login', [LoginController::class, "login"]);
Route::post('/createaccount', [LoginController::class, "register"]);
Route::get("/forgotpassword", [LoginController::class, "forgotpassword"]);
Route::post("/changepassword", [LoginController::class,"changepassword"]);

//SURAT KELUAR
Route::get('/suratkeluar', [SuratKeluarController::class, "index"]);
Route::get('/createsuratkeluar',[SuratKeluarController::class, "indexcreate"]);
Route::get("/carisuratkeluar", [SuratKeluarController::class, "find"]);
Route::get('/editsuratkeluar/{id}', [SuratKeluarController::class, "edit"]);
Route::delete("/deletesuratkeluar/{id}", [SuratKeluarController::class, "destroy"]);
Route::post('/addsuratkeluar', [SuratKeluarController::class, "store"]);
Route::put("/updatesuratkeluar/{id}", [SuratKeluarController::class, "update"]);
Route::get('/tampilsuratkeluar/{id}', [SuratKeluarController::class, "view"]);


// SURAT MASUK
Route::get('/suratmasuk', [SuratMasukController::class, "index"]);
Route::get('/createsuratmasuk',[SuratMasukController::class, "indexcreate"]);
Route::get("/carisuratmasuk", [SuratMasukController::class, "find"]);
Route::get('/editsuratmasuk/{id}', [SuratMasukController::class, "edit"]);
Route::delete("/deletesuratmasuk/{id}", [SuratMasukController::class, "destroy"]);
Route::post('/addsuratmasuk', [SuratMasukController::class, "store"]);
Route::put("/updatesuratmasuk/{id}", [SuratMasukController::class, "update"]);
Route::get('/tampilsuratmasuk/{id}', [SuratMasukController::class, "view"]);


// SPT
Route::get('/spt', [SuratPanggilanTugasController::class, "index"]);
Route::get('/createspt',[SuratPanggilanTugasController::class, "indexcreate"]);
Route::get("/carispt", [SuratPanggilanTugasController::class, "find"]);
Route::get('/editspt/{id}', [SuratPanggilanTugasController::class, "edit"]);
Route::delete("/deletespt/{id}", [SuratPanggilanTugasController::class, "destroy"]);
Route::post('/addspt', [SuratPanggilanTugasController::class, "store"]);
Route::put("/updatespt/{id}", [SuratPanggilanTugasController::class, "update"]);
Route::get('/tampilspt/{id}', [SuratPanggilanTugasController::class, "view"]);


// DISPOSISI
Route::get('/disposisi', [DisposisiController::class, "index"]);
Route::get("/createdisposisi", [DisposisiController::class, "indexcreate"]);
Route::get("/caridisposisi", [DisposisiController::class, "find"]);
Route::get('/editdisposisi/{id}', [DisposisiController::class, "edit"]);
Route::delete("/deletedisposisi/{id}", [DisposisiController::class, "destroy"]);
Route::post('/adddisposisi', [DisposisiController::class, "store"]);
Route::put("/updatedisposisi/{id}", [DisposisiController::class, "update"]);
Route::get('/tampildisposisi/{id}', [DisposisiController::class, "view"]);
Route::get('/lembardisposisi', [DisposisiController::class, "create"]);
