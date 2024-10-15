<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\DokterController;
use App\Http\Controllers\Main\PasienController;
use App\Http\Controllers\Main\PerawatController;
use App\Http\Controllers\Main\PoliController;
use App\Http\Controllers\Main\RegistrasiController;
use App\Http\Controllers\Main\TravelController;
use App\Http\Controllers\Main\VaksinController;
use App\Http\Controllers\Main\VaksinRegistrasisController;
use App\Http\Controllers\Main\VaksinIsiPaketController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    });
    
    Route::get('registrasi', [RegistrasiController::class, 'index']);
    Route::get('registrasi/create', [RegistrasiController::class, 'create']);

    Route::resource('pasien', PasienController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('perawat', PerawatController::class);
    Route::resource('poli', PoliController::class);
    Route::resource('vaksin', VaksinController::class);
    Route::resource('travel', TravelController::class);
    Route::resource('vaksin_registrasis', VaksinRegistrasisController::class);
    Route::resource('vaksinpaket', VaksinIsiPaketController::class);

    //api
    Route::get('/vaksin-isi/{id}', [VaksinController::class, 'getVaksinIsi']);

   });