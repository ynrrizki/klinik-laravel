<?php

//* -admin-
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

//* -auth-
use App\Http\Controllers\Auth\LoginController;

//* -dokter-
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Dokter\PasienController;
use App\Http\Controllers\Dokter\RiwayatBerobatController;

//* -apoteker-
use App\Http\Controllers\Apoteker\ApotekerController;
use App\Http\Controllers\Apoteker\ObatController;
use App\Http\Controllers\Apoteker\ResepObatController;

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

// Route::get('/', function () {
//     return view('pages.admin.index');
// });

//* -auth-
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('/logout/auth', [LoginController::class, 'logout']);
Route::post('/logout/auth', [LoginController::class, 'logout'])->name('auth.logout');

//* -admin-
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin-panel', [AdminController::class, 'index'])->name('admin');
    Route::resource('/admin-panel/user', UserController::class);
});


//* -dokter-
Route::middleware(['auth', 'isDokter'])->group(function () {
    Route::get('/dokter-panel', [DokterController::class, 'index'])->name('dokter');
});

//* -apoteker-
Route::middleware(['auth', 'isApoteker'])->group(function () {
    Route::get('/apoteker-panel', [ApotekerController::class, 'index'])->name('apoteker');
});

//* -admin & dokter-
Route::middleware(['auth', 'isAdminAndDokter'])->group(function () {
    Route::resource('/pasien', PasienController::class);
    Route::resource('/riwayat-berobat', RiwayatBerobatController::class);
});

//* -admin & apoteker-
Route::middleware(['auth', 'isAdminAndApoteker'])->group(function () {
    Route::resource('/resep-obat', ResepObatController::class);
    Route::resource('/obat', ObatController::class);
});
