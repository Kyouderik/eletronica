@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Ordem de Serviço</h1>

    <form action="{{ route('ordens.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tecnico_id" class="form-label">Técnico</label>
            <select name="tecnico_id" id="tecnico_id" class="form-select" required>
                <option value="">Selecione o Técnico</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nome_cliente" class="form-label">Nome do Cliente</label>
            <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone_cliente" class="form-label">Telefone do Cliente</label>
            <input type="text" name="telefone_cliente" id="telefone_cliente" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea name="observacoes" id="observacoes" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="tipo_aparelho" class="form-label">Tipo de Aparelho</label>
            <input type="text" name="tipo_aparelho" id="tipo_aparelho" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
