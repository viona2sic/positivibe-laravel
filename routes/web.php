<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PelangganLoginController;
use App\Http\Controllers\Auth\PelangganRegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Pelanggan\DashboardController as PelangganDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Route Publik (Guest)
|--------------------------------------------------------------------------
| Dapat diakses siapa saja tanpa autentikasi.
*/
Route::get('/', function () {
    return view('guest.dashboard');
})->name('home');

Route::get('/guest/dashboard', function () {
    return view('guest.dashboard');
});


/*
|--------------------------------------------------------------------------
| Auth Pelanggan (Guest-only: belum login pelanggan)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest.pelanggan:pelanggan'])->prefix('auth')->name('pelanggan.')->group(function () {
    Route::get('/login', [PelangganLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [PelangganLoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [PelangganRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [PelangganRegisterController::class, 'register'])->name('register.submit');
});

// Logout pelanggan (butuh autentikasi pelanggan)
Route::post('/auth/logout', [PelangganLoginController::class, 'logout'])
    ->middleware('auth.pelanggan')
    ->name('pelanggan.logout');


/*
|--------------------------------------------------------------------------
| Route Pelanggan (Terautentikasi: guard pelanggan)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.pelanggan'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    // Dashboard Pelanggan
    Route::get('/dashboard', [PelangganDashboardController::class, 'index'])->name('dashboard');

    // Route grup reservasi, riwayat, profil
    Route::get('/reservasi', function () {
        return redirect()->route('pelanggan.dashboard')->with('info', 'Fitur reservasi segera hadir.');
    })->name('reservasi.index');

    Route::get('/reservasi/buat', function () {
        return redirect()->route('pelanggan.dashboard')->with('info', 'Fitur buat reservasi segera hadir.');
    })->name('reservasi.create');

    Route::get('/riwayat', function () {
        return redirect()->route('pelanggan.dashboard')->with('info', 'Fitur riwayat segera hadir.');
    })->name('riwayat.index');

    Route::get('/profil', function () {
        return redirect()->route('pelanggan.dashboard')->with('info', 'Fitur profil segera hadir.');
    })->name('profil.show');
});


/*
|--------------------------------------------------------------------------
| Auth Admin (Guest-only: belum login admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest.admin:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
});

// Logout admin (butuh autentikasi admin)
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->middleware('auth.admin')
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Route Admin (Terautentikasi: guard admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
