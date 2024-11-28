<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    public function index()
    {
        $ordens = OrdemServico::with('tecnico')->get(); // Carregar todas as ordens com o técnico
        return view('ordens.index', compact('ordens'));
    }

    public function create()
    {
        $tecnicos = Tecnico::all(); // Buscar todos os técnicos
        return view('ordens.create', compact('tecnicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tecnico_id' => 'required|exists:tecnicos,id',
            'nome_cliente' => 'required',
            'telefone_cliente' => 'required',
            'observacoes' => 'nullable',
            'tipo_aparelho' => 'required',
        ]);

        OrdemServico::create($request->all());

        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço criada com sucesso!');
    }

    public function edit(OrdemServico $ordem)
    {
        $tecnicos = Tecnico::all();
        return view('ordens.edit', compact('ordem', 'tecnicos'));
    }

    public function update(Request $request, OrdemServico $ordem)
    {
        $request->validate([
            'tecnico_id' => 'required|exists:tecnicos,id',
            'nome_cliente' => 'required',
            'telefone_cliente' => 'required',
            'observacoes' => 'nullable',
            'tipo_aparelho' => 'required',
        ]);

        $ordem->update($request->all());

        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço atualizada com sucesso!');
    }

    public function destroy(OrdemServico $ordem)
    {
        $ordem->delete();
        return redirect()->route('ordens.index')->with('success', 'Ordem de serviço excluída com sucesso!');
    }
}
