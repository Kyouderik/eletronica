<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }
    public function create()
    {
        return view('tecnicos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:tecnicos,email',  
            'telefone' => 'required',
            'especialidade' => 'required',
        ]);
        Tecnico::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'especialidade' => $request->especialidade,
        ]);
        return redirect()->route('tecnicos.index')->with('success', 'Técnico cadastrado com sucesso!');
    }
    public function edit(Tecnico $tecnico)
    {
        return view('tecnicos.edit', compact('tecnico'));
    }
    public function update(Request $request, Tecnico $tecnico)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:tecnicos,email,' . $tecnico->id, 
            'telefone' => 'required',
            'especialidade' => 'required',
        ]);
        $tecnico->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'especialidade' => $request->especialidade,
        ]);
        return redirect()->route('tecnicos.index')->with('success', 'Técnico atualizado com sucesso!');
    }
    public function destroy(Tecnico $tecnico)
    {
        $tecnico->delete();

        return redirect()->route('tecnicos.index')->with('success', 'Técnico excluído com sucesso!');
    }
}
