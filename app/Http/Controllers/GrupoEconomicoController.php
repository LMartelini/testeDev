<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoEconomicoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.grupo_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        Grupo::create($request->all());

        return redirect()->route('grupos.index')->with('success', 'Grupo criado com sucesso!');
    }

    public function edit(Grupo $grupo)
    {
        return view('grupos.grupo_edit', compact('grupo'));
    }

    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $grupo->update($request->all());

        return redirect()->route('grupos.index')->with('success', 'Grupo atualizado com sucesso!');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('grupos.index')->with('success', 'Grupo excluído com sucesso!');
    }
}
