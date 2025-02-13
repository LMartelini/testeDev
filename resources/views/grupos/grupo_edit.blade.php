@extends('layouts.sidebar')

@section('title', 'Editar Grupo Econômico')

@section('content')
    <div class="container">
        <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome do Grupo:</label>
                <input type="text" name="nome" id="nome" class="form-control mt-1" value="{{ $grupo->nome }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection
