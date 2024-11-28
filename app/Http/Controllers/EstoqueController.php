<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        return view('estoques.index', ['estoques' => Estoque::all()]);
    }

    public function create()
    {
        return view('estoques.create');
    }

    public function store(Request $request)
    {
        Estoque::create($request->all());
        return redirect()->route('estoques.index');
    }

    public function show(Estoque $estoque)
    {
        return view('estoques.show', compact('estoque'));
    }

    public function edit(Estoque $estoque)
    {
        return view('estoques.edit', compact('estoque'));
    }

    public function update(Request $request, Estoque $estoque)
    {
        $estoque->update($request->all());
        return redirect()->route('estoques.index');
    }

    public function destroy(Estoque $estoque)
    {
        $estoque->delete();
        return redirect()->route('estoques.index');
    }
}
