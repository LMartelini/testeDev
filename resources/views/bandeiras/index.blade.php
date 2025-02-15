@extends('layouts.sidebar')

@section('title', 'Bandeiras')

@section('content')

    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons a, .action-buttons button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            text-decoration: none;
        }
        .action-buttons a:hover, .action-buttons button:hover {
            color: #0056b3;
        }
        .action-buttons .fa-edit {
            color: #28a745;
        }
        .action-buttons .fa-trash {
            color: #dc3545;
        }
    </style>

    <a href="{{ route('bandeiras.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Grupo Econômico</th>
                <th>Data de Criação</th>
                <th>Última Atualização</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bandeiras as $bandeira)
                <tr>
                    <td>{{ $bandeira->id }}</td>
                    <td>{{ $bandeira->nome }}</td>
                    <td>{{ $bandeira->grupoEconomico->nome }}</td>
                    <td>{{ $bandeira->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $bandeira->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('bandeiras.edit', $bandeira->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('bandeiras.destroy', $bandeira->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta bandeira?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
