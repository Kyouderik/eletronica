<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Define aonde o usuário será redirecionado após o login
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home'); // Certifique-se de que aqui está redirecionando para "home"
    }
    

    // Método para realizar o logout
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }
}
