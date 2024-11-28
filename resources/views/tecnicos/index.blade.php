@extends('layouts.app')

@section('title', 'Lista de Técnicos')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Técnicos</h1>

    <a href="{{ route('tecnicos.create') }}" class="btn btn-primary mb-3">Cadastrar Técnico</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tecnicos as $tecnico)
                <tr>
                    <td>{{ $tecnico->id }}</td>
                    <td>{{ $tecnico->nome }}</td>
                    <td>{{ $tecnico->email }}</td>
                    <td>{{ $tecnico->telefone }}</td>
                    <td>{{ $tecnico->especialidade }}</td>
                    <td>
                        <a href="{{ route('tecnicos.edit', $tecnico) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tecnicos.destroy', $tecnico) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este técnico?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
