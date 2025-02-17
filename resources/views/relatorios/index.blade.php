@extends('layouts.sidebar')

@section('title')
{{ $title ?? 'Relatórios' }}
@endsection

@section('content')
<div class="container">
    <p>Gere e baixe relatórios para sua organização.</p>

    <div class="filter-export-container">
        <form method="GET" action="{{ route('relatorios.index') }}">
            <label for="date-range">Filtrar por:</label>
            <select id="date-range" name="days" onchange="this.form.submit()">
                <option value="30" {{ $days == 30 ? 'selected' : '' }}>Últimos 30 dias</option>
                <option value="60" {{ $days == 60 ? 'selected' : '' }}>Últimos 60 dias</option>
                <option value="90" {{ $days == 90 ? 'selected' : '' }}>Últimos 90 dias</option>
            </select>
        </form>

        <div class="export-options">
            <a href="{{ route('export.excel') }}" class="btn btn-primary">Exportar para Excel</a>
            <a href="{{ route('export.pdf') }}" class="btn btn-primary">Exportar para PDF</a>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'id', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            ID
                            @if($sortBy == 'id')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'nome', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            Nome
                            @if($sortBy == 'nome')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'email', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            Email
                            @if($sortBy == 'email')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'cpf', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            CPF
                            @if($sortBy == 'cpf')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'unidade.nome_fantasia', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            Unidade
                            @if($sortBy == 'unidade.nome_fantasia')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'created_at', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            Data de criação
                            @if($sortBy == 'created_at')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('relatorios.index', ['days' => $days, 'sort_by' => 'updated_at', 'sort_order' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                            Última atualização
                            @if($sortBy == 'updated_at')
                                <i class="sort-icon">{{ $sortOrder == 'asc' ? '↑' : '↓' }}</i>
                            @endif
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colaboradores as $colaborador)
                    <tr>
                        <td>{{ $colaborador->id }}</td>
                        <td>{{ $colaborador->nome }}</td>
                        <td>{{ $colaborador->email }}</td>
                        <td>{{ $colaborador->cpf }}</td>
                        <td>{{ $colaborador->unidade->nome_fantasia ?? 'N/A' }}</td>
                        <td>{{ $colaborador->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $colaborador->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .sort-icon {
        margin-left: 5px;
        font-size: 14px;
        display: inline-block;
        vertical-align: middle;
    }

    th a {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    th a:hover {
        text-decoration: underline;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th, table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f9f9f9;
        font-weight: bold;
    }

    table tbody tr:hover {
        background-color: #f1f1f1;
    }

    #date-range {
        padding: 5px;
        border-radius: 6px;
    }

    .export-options{
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
@endsection
