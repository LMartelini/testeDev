@extends('layouts.sidebar')

@section('title', 'Editar Unidade')

@section('content')
    <div class="container">
        <form action="{{ route('unidades.update', $unidade->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome_fantasia">Nome Fantasia:</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control mt-1" value="{{ $unidade->nome_fantasia }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="razao_social">Razão Social:</label>
                <input type="text" name="razao_social" id="razao_social" class="form-control mt-1" value="{{ $unidade->razao_social }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="cnpj">CNPJ:</label>
                <input type="text" name="cnpj" id="cnpj" class="form-control mt-1" value="{{ $unidade->cnpj }}" placeholder="99.999.999/9999-99" required>
            </div>

            <div class="form-group mt-3">
                <label for="bandeira_id">Bandeira:</label>
                <select name="bandeira_id" id="bandeira_id" class="form-control" required>
                    @foreach($bandeiras as $bandeira)
                        <option value="{{ $bandeira->id }}" {{ $unidade->bandeira_id == $bandeira->id ? 'selected' : '' }}>
                            {{ $bandeira->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar</button>
            <a href="{{ route('unidades.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection