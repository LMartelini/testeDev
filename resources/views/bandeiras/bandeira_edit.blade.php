@extends('layouts.sidebar')

@section('title', 'Editar Bandeira')

@section('content')
    <div class="container">
        <form action="{{ route('bandeiras.update', $bandeira->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome da Bandeira:</label>
                <input type="text" name="nome" id="nome" class="form-control mt-1" value="{{ $bandeira->nome }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="grupo_economico_id">Grupo Econômico:</label>
                <select name="grupo_economico_id" id="grupo_economico_id" class="form-control" required>
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ $bandeira->grupo_economico_id == $grupo->id ? 'selected' : '' }}>
                            {{ $grupo->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar</button>
            <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection
