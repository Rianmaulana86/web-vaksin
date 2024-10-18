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
use App\Http\Controllers\Main\KasirController;
use App\Http\Controllers\Main\BukuicvController;

use Illuminate\Support\Facades\Route;


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
    Route::resource('kasir', KasirController::class);
    Route::resource('vaksin_icv_cetak', BukuicvController::class);
    Route::post('/vaksin/suntik/{id}', [VaksinRegistrasisController::class, 'setTindakanSuntik']);
    Route::post('/kasir/pembayaran/{id}', [KasirController::class, 'setPembayaran'])->name('kasir.pembayaran');
    Route::post('/buku/cetak/{id}', [BukuicvController::class, 'bukuIcvCetak'])->name('buku.cetak');
    Route::post('/buku/diterima/{id}', [BukuicvController::class, 'bukuIcvDiterima'])->name('buku.diterima');

    //api
    Route::get('/vaksin-isi/{id}', [VaksinController::class, 'getVaksinIsi']);

    Route::get('print/passbook/{id}', [VaksinController::class, 'printPasBook']);
    
    

   });