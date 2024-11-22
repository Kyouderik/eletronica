<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/', function () {
    return view('login\login'); 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    $usuario = $request->input('usuario');
    $senha = $request->input('senha');

    if ($usuario == 'tecnico' && $senha == 'tecnico') {
        return redirect('home'); 
    }

    return redirect('/login')->withErrors('Credenciais inválidas');
});

Route::get('/home', function () {
    return view('home'); 
})->middleware('auth')->name('home');


Route::get('/ordens', function () {
    return 'Página de Ordens de Serviço';
})->name('ordens');

Route::get('/tecnicos', function () {
    return 'Página de Técnicos';
})->name('tecnicos');

Route::get('/estoque', function () {
    return 'Página de Estoque';
})->name('estoque');

Route::get('/perfil', function(){
    return view('users.index');
})->name('perfil');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
