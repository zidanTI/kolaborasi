<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\hTTP\Controllers\DokterController;
use App\hTTP\Controllers\ProfilController;
use App\Http\Controllers\mahasiswaController;

;
use App\hTTP\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use Database\Factories\PoliFactory;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('profil', [App\Http\Controllers\ProfilController::class, 'index']);
Route::get('profil/create', [App\Http\Controllers\ProfilController::class, 'create']);
Route::get('profil/{nama}/{id}/edit', [App\Http\Controllers\ProfilController::class, 'edit']);

Route::get('dokter', [App\Http\Controllers\DokterController::class, 'index']);
Route::get('dokter/create', [App\Http\Controllers\DokterController::class, 'create']);
Route::get('dokter/{id}/edit', [App\Http\Controllers\DokterController::class, 'edit']);
Route::get('dokter/{id}', [App\Http\Controllers\DokterController::class, 'show']);

// Route::get('pasien', [App\Http\Controllers\PasienController::class, 'index']);
// Route::get('pasien/create', [App\Http\Controllers\PasienController::class, 'create']);
// Route::get('pasien/{id}/edit', [App\Http\Controllers\PasienController::class, 'edit']);
// Route::get('pasien/{id}', [App\Http\Controllers\PasienController::class, 'show']);

// Route::resource('pasien', PasienController::class )->middleware(Authenticate::class);

// Route::resource('Mahasiswa', mahasiswaController::class );
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('Mahasiswa', mahasiswaController::class);
    Route::resource('daftar', DaftarController::class);
    Route::resource('poli', PoliController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
