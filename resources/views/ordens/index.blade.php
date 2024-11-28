@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Ordens de Serviço</h1>

    <a href="{{ route('ordens.create') }}" class="btn btn-primary mb-3">Cadastrar Ordem de Serviço</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Técnico</th>
                <th>Nome do Cliente</th>
                <th>Telefone</th>
                <th>Tipo de Aparelho</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordens as $ordem)
                <tr>
                    <td>{{ $ordem->id }}</td>
                    <td>{{ $ordem->tecnico->nome }}</td>
                    <td>{{ $ordem->nome_cliente }}</td>
                    <td>{{ $ordem->telefone_cliente }}</td>
                    <td>{{ $ordem->tipo_aparelho }}</td>
                    <td>
                        <a href="{{ route('ordens.edit', $ordem) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('ordens.destroy', $ordem) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta ordem de serviço?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
