@extends('layouts.sidebar')

@section('title', 'Editar colaborador')

@section('content')
    <div class="container">
        <form action="{{ route('colaboradores.update', $colaborador->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control mt-1" value="{{ $colaborador->nome }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control mt-1" value="{{ $colaborador->email }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control mt-1" value="{{ $colaborador->cpf }}" placeholder="999.999.999-99" required>
            </div>

            <div class="form-group mt-3">
                <label for="unidade_id">Unidade:</label>
                <select name="unidade_id" id="unidade_id" class="form-control" required>
                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ $unidade->unidade_id == $unidade->id ? 'selected' : '' }}>
                            {{ $unidade->nome_fantasia }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar</button>
            <a href="{{ route('colaboradores.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection