@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full sm:max-w-md px-6 py-12 bg-white shadow-md rounded-lg space-y-8">
        <h2 class="text-center text-2xl font-semibold text-gray-900">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autocomplete="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}" />
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" required autocomplete="current-password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                    Entrar
                </button>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Ainda não tem uma conta? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">Registre-se aqui</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
