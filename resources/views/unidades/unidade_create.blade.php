@extends('layouts.sidebar')

@section('title', 'Criar Nova Unidade')

@section('content')
    <div class="container">
        <form action="{{ route('unidades.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome_fantasia">Nome Fantasia:</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control mt-1" required>
            </div>

            <div class="form-group mt-3">
                <label for="razao_social">Razão Social:</label>
                <input type="text" name="razao_social" id="razao_social" class="form-control mt-1" required>
            </div>

            <div class="form-group mt-3">
                <label for="cnpj">CNPJ:</label>
                <input type="text" name="cnpj" id="cnpj" class="form-control mt-1" placeholder="99.999.999/9999-99" required>
            </div>

            <div class="form-group mt-3">
                <label for="bandeira_id">Bandeira:</label>
                <select name="bandeira_id" id="bandeira_id" class="form-control" required>
                    <option value="" disabled selected>Selecione uma bandeira</option>
                    @foreach($bandeiras as $bandeira)
                        <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar</button>
            <a href="{{ route('unidades.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection