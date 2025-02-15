<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th {
            background-color: #f8f9fa; 
            border: 1px solid #000; 
            padding: 12px; 
            text-align: left; 
            font-weight: bold; 
        }
        
        .table td {
            border: 1px solid #000; 
            padding: 12px; 
            text-align: left; 
        }
        
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9; 
        }
        
        .table td:first-child, .table th:first-child {
            text-align: left; 
        }
        
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Relatório de Colaboradores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Unidade</th>
                <th>Data de Criação</th>
                <th>Última Atualização</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colaboradores as $colaborador)
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
</body>
</html>