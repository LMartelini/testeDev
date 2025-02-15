<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Unidade;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::with('unidade')->get();
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('colaboradores.colaborador_create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'cpf' => 'required|string|max:11',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        Colaborador::create($request->all());

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador criado com sucesso!');
    }

    public function edit($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        $unidades = Unidade::all(); 

        return view('colaboradores.colaborador_edit', compact('colaborador', 'unidades'));
    }

    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'cpf' => 'required|string|max:11',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        $colaborador->update($request->all());

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador atualizado com sucesso!');
    }

    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();
        return redirect()->route('colaboradores.index')->with('success', 'Colaborador excluído com sucesso!');
    }
}
