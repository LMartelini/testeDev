@extends('layouts.sidebar')

@section('title', 'Unidades')

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

    <a href="{{ route('unidades.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Fantasia</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Bandeira</th>
                <th>Data de Criação</th>
                <th>Última Atualização</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidades as $unidade)
                <tr>
                    <td>{{ $unidade->id }}</td>
                    <td>{{ $unidade->nome_fantasia }}</td>
                    <td>{{ $unidade->razao_social }}</td>
                    <td>{{ $unidade->cnpj }}</td>
                    <td>{{ $unidade->bandeira->nome }}</td>
                    <td>{{ $unidade->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $unidade->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('unidades.edit', $unidade->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('unidades.destroy', $unidade->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta unidade?')">
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