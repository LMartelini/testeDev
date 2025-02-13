@extends('layouts.sidebar')

@section('title', 'Grupos Econômicos')

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

    <a href="{{ route('grupos.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de criação</th>
                <th>Última atualização</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->id }}</td>
                    <td>{{ $grupo->nome }}</td>
                    <td>{{ $grupo->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $grupo->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('grupos.edit', $grupo->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este grupo?')">
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

@endsection {{-- Adicione esta linha --}}
