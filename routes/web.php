<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', [LoginController::class, "index"]);
Route::get('/home', [LoginController::class, "index"])->name("home");;
Route::get('/register', [LoginController::class,"regis"]);
Route::get("/dashboardpage", [DashboardController::class, "index"])->name("dashboardpage");




Route::post('/login', [LoginController::class, "login"]);
Route::post('/createaccount', [LoginController::class, "store"]);

