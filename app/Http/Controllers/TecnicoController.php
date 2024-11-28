<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    // Exibe todos os técnicos
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }

    // Exibe o formulário para criar um novo técnico
    public function create()
    {
        return view('tecnicos.create');
    }

    // Armazena um novo técnico no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:tecnicos,email',  // A validação garante que o e-mail seja único
            'telefone' => 'required',
            'especialidade' => 'required',
        ]);

        // Cria um novo técnico
        Tecnico::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'especialidade' => $request->especialidade,
        ]);

        // Redireciona de volta para a lista de técnicos com uma mensagem de sucesso
        return redirect()->route('tecnicos.index')->with('success', 'Técnico cadastrado com sucesso!');
    }

    // Exibe o formulário para editar um técnico existente
    public function edit(Tecnico $tecnico)
    {
        return view('tecnicos.edit', compact('tecnico'));
    }

    // Atualiza os dados de um técnico existente
    public function update(Request $request, Tecnico $tecnico)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:tecnicos,email,' . $tecnico->id, // A validação de e-mail permite que o e-mail do próprio técnico seja ignorado
            'telefone' => 'required',
            'especialidade' => 'required',
        ]);

        // Atualiza os dados do técnico
        $tecnico->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'especialidade' => $request->especialidade,
        ]);

        // Redireciona de volta para a lista de técnicos com uma mensagem de sucesso
        return redirect()->route('tecnicos.index')->with('success', 'Técnico atualizado com sucesso!');
    }

    // Exclui um técnico
    public function destroy(Tecnico $tecnico)
    {
        // Exclui o técnico do banco de dados
        $tecnico->delete();

        // Redireciona de volta para a lista de técnicos com uma mensagem de sucesso
        return redirect()->route('tecnicos.index')->with('success', 'Técnico excluído com sucesso!');
    }
}
