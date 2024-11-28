@extends('layouts.app')

@section('title', 'Estoque')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Produtos no Estoque</h1>

    <a href="{{ route('estoques.create') }}" class="btn btn-primary mb-3">Cadastrar Produto</a>

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
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estoques as $estoque)
                <tr>
                    <td>{{ $estoque->id }}</td>
                    <td>{{ $estoque->nome }}</td>
                    <td>{{ $estoque->tipo }}</td>
                    <td>{{ $estoque->descricao }}</td>
                    <td>{{ $estoque->quantidade }}</td>
                    <td>{{ number_format($estoque->preco, 2, ',', '.') }}</td>
                    <td>{{ $estoque->fornecedor }}</td>
                    <td>
                        <a href="{{ route('estoques.edit', $estoque) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('estoques.destroy', $estoque) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
