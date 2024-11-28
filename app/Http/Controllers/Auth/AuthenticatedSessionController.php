<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Exibe a página de login.
     */
    public function create(): View
    {
        return view('auth.login'); // Certifique-se de que o arquivo de view existe em resources/views/auth/login.blade.php
    }

    /**
     * Lida com a requisição de autenticação de um usuário.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentica o usuário baseado nas credenciais enviadas
        $request->authenticate();

        // Regenera a sessão para evitar roubo de sessão
        $request->session()->regenerate();

        // Redireciona para a rota home após login ou para a página que o usuário tentava acessar antes (caso exista)
        return redirect()->intended(route('home'));  // Certifique-se de que a rota 'home' esteja corretamente definida
    }

    /**
     * Destroi a sessão autenticada e efetua o logout do usuário.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Faz o logout do usuário
        Auth::guard('web')->logout();

        // Invalida a sessão atual
        $request->session()->invalidate();

        // Regenera o token CSRF
        $request->session()->regenerateToken();

        // Redireciona para a página inicial após o logout
        return redirect('/');  // Redireciona para a página inicial (login)
    }
}
