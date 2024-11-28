@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Cadastrar Técnico</h1>

    <form action="{{ route('tecnicos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="especialidade" class="form-label">Especialidade</label>
            <input type="text" id="especialidade" name="especialidade" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
