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
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Unidade</th>
                    <th>Data de criação</th>
                    <th>Última atualização</th>
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

<script>
    function exportReport(reportType, format) {
        const dateRange = document.getElementById('date-range').value;
        alert(`Exportando relatório de ${reportType} para os últimos ${dateRange} dias em ${format.toUpperCase()}`);
    }
</script>

<style>
.container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

h1 {
    margin-bottom: 20px;
}

.filter-export-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.filters {
    display: flex;
    align-items: center;
}

.filters label {
    margin-right: 10px;
}

.filters select {
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #ddd;
}

.export-options {
    display: flex;
    gap: 10px;
}

.export-options button {
    padding: 10px 20px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.export-options button:hover {
    background: #0056b3;
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

#date-range{
    padding: 5px;
    border-radius: 6px;
}
</style>
@endsection