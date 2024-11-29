<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\EstoqueController;

Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('root');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home.home');
    })->name('home');

    Route::resource('ordens', OrdemServicoController::class);

    Route::resource('tecnicos', TecnicoController::class);

    Route::resource('estoques', EstoqueController::class);

    Route::get('/profile/perfil', function () {
        return view('profile.perfil');
    })->name('profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
});
require __DIR__ . '/auth.php';
