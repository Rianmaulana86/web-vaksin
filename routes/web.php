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
use App\Http\Controllers\Main\VaksinpenjualanController;
use App\Http\Controllers\Main\VaksinPembelianController;
use App\Http\Controllers\Main\VaksinMasterController;

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
    Route::resource('vaksinmaster', VaksinMasterController::class);
    Route::resource('travel', TravelController::class);
    Route::resource('vaksin_registrasis', VaksinRegistrasisController::class);
    Route::resource('vaksinpaket', VaksinIsiPaketController::class);
    Route::resource('kasir', KasirController::class);
    Route::resource('vaksin_icv_cetak', BukuicvController::class);
    Route::resource('vaksinpenjualan', VaksinpenjualanController::class);
    Route::resource('vaksinpembelian', VaksinPembelianController::class);
    
    Route::post('/kasir/pembayaran/{id}', [KasirController::class, 'setPembayaran'])->name('kasir.pembayaran');
    
   
    Route::post('/buku/diterima/{id}', [BukuicvController::class, 'bukuIcvDiterima'])->name('buku.diterima');
    Route::get('/kasir/store', [KasirController::class, 'store'])->name('kasir.store');
    //api
    Route::get('/vaksin-isi/{id}', [VaksinController::class, 'getVaksinIsi']);
    //print
    Route::get('print/passbook/{id}', [VaksinController::class, 'printPasBook']);
    //print dokument
    Route::get('print/pptest/{id}', [VaksinRegistrasisController::class, 'printpptest']);
    Route::get('print/persetujuan/{id}', [VaksinRegistrasisController::class, 'printpersetujuan']);
    Route::get('print/permohonan/{id}', [VaksinRegistrasisController::class, 'printpermohonan']);
    Route::get('print/skrining/{id}', [VaksinRegistrasisController::class, 'printskrining']);
    Route::get('print/alurproses/{id}', [VaksinRegistrasisController::class, 'printalurproses']);

    Route::get('vaksin_icv_cetak/cetakhal1/{id}', [BukuicvController::class, 'bukuIcvCetakHal1']);
    Route::get('vaksin_icv_cetak/cetakhal6/{id}', [BukuicvController::class, 'bukuIcvCetakHal6']);


    Route::post('/kasir/simpan', [KasirController::class, 'simpan'])->name('kasir.simpan');
    
    //route direct
    Route::get('/vaksin_registrasis/index', [VaksinRegistrasisController::class, 'index'])->name('vaksin.registrasi.index');
    Route::get('/vaksin_icv_cetak/index', [BukuicvController::class, 'index'])->name('vaksin.bukucetak.index');
    
  
    Route::post('/vaksin/suntik/{id}', [VaksinRegistrasisController::class, 'setTindakanSuntik']);
    Route::post('/vaksin/updatesuntik/{id}', [VaksinRegistrasisController::class, 'updatesuntik'])->name('vaksin.updatesuntik');

    Route::post('/buku/cetak/{id}', [BukuicvController::class, 'bukuIcvCetak'])->name('buku.cetak');
    
    Route::post('/buku/inputcetak/{id}', [BukuicvController::class, 'inputCetakBuku'])->name('buku.inputCetakBuku');

   });