<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandeira;
use App\Models\Grupo;

class BandeiraController extends Controller
    {
        public function index()
        {
            $bandeiras = Bandeira::with('grupoEconomico')->get();
            return view('bandeiras.index', compact('bandeiras'));
        }

        public function create()
        {
            $grupos = Grupo::all();
            return view('bandeiras.bandeira_create', compact('grupos'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'nome' => 'required|string|max:255',
                'grupo_economico_id' => 'required|exists:grupos,id'
            ]);

            Bandeira::create($request->all());

            return redirect()->route('bandeiras.index')->with('success', 'Bandeira criada com sucesso!');
        }

        public function edit(Bandeira $bandeira)
        {
            $grupos = Grupo::all(); 
            return view('bandeiras.bandeira_edit', compact('bandeira', 'grupos'));
        }

        public function update(Request $request, Bandeira $bandeira)
        {
            $request->validate([
                'nome' => 'required|string|max:255',
                'grupo_economico_id' => 'required|exists:grupos,id'
            ]);

            $bandeira->update($request->all());

            return redirect()->route('bandeiras.index')->with('success', 'Bandeira atualizada com sucesso!');
        }

        public function destroy(Bandeira $bandeira)
        {
            $bandeira->delete();
            return redirect()->route('bandeiras.index')->with('success', 'Bandeira excluída com sucesso!');
        }
    }