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

// Redirecionar para login ou home
Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : redirect()->route('login');
});

// Autenticação: Login e Registro
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas para usuários autenticados
Route::middleware('auth')->group(function () {
    // Página inicial
    Route::get('/home', function () {
        return view('home.home');
    })->name('home');

    // Rotas para Ordens de Serviço
    Route::resource('ordens', OrdemServicoController::class);

    // Rotas para Técnicos
    Route::resource('tecnicos', TecnicoController::class);

    // Página de Estoque
    Route::resource('estoques', EstoqueController::class);

    // Perfil do usuário
    Route::get('/profile/perfil', function () {
        return view('profile.perfil');
    })->name('profile');

    // Controle de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Controle de usuários
    Route::resource('users', UserController::class);
});

// Arquivo de rotas de autenticação padrão
require __DIR__ . '/auth.php';
