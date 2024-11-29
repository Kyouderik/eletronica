<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
{
    if (auth()->check()) {
        return redirect()->route('home');
    }

    return view('auth.login');
}

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home'); 
    }
    
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }
}
