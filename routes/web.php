<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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

// Route::view('/', 'dashboard')->name('home');
Route::get('/', function () {
    return redirect('/login');
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('sekolahs', [SekolahController::class, 'index'])->name('sekolahs.index');
    Route::get('perusahaans', [PerusahaanController::class, 'index'])->name('perusahaans.index');
    Route::get('prestasis', [PrestasiController::class, 'index'])->name('prestasis.index');
    Route::get('ruangs', [RuangController::class, 'index'])->name('ruangs.index');
    Route::get('lowongans', [LowonganController::class, 'index'])->name('lowongans.index');
});

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // Route::view('/dashboard', 'dashboard')->name('home');
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('sekolahs', [SekolahController::class, 'index'])->name('sekolahs.index');
    Route::get('perusahaans', [PerusahaanController::class, 'index'])->name('perusahaans.index');
    Route::get('prestasis', [PrestasiController::class, 'index'])->name('prestasis.index');
    Route::get('ruangs', [RuangController::class, 'index'])->name('ruangs.index');
});
