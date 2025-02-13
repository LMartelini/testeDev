@extends('layouts.sidebar')

@section('title', 'Criar Novo Grupo Econômico')

@section('content')
    <div class="container">
        <form action="{{ route('grupos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Grupo:</label>
                <input type="text" name="nome" id="nome" class="form-control mt-1" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar</button>
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection
