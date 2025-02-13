<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <style>
            .home-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
                margin-top: 30px;
            }
            .card {
                width: 250px;
                padding: 20px;
                text-align: center;
                border-radius: 10px;
                background-color: #f8f9fa;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: 0.3s;
            }
            .card:hover {
                background-color: #e9ecef;
            }
            .card a {
                text-decoration: none;
                color: #007bff;
                font-size: 18px;
                font-weight: bold;
            }
            .card a:hover {
                color: #0056b3;
            }
        </style>
    </head>

    <body>
        <h2 class="text-center mb-4 mt-5">Painel de Administração</h2>

        <div class="home-container">
            <div class="card">
                <a href="{{ route('grupos.index') }}">Gerenciar Grupos Econômicos</a>
            </div>
            <div class="card">
                {{-- <a href="{{ route('empresas.index') }}">Gerenciar Empresas</a> --}}
                <a href="#">Gerenciar Empresas</a>
            </div>
            <div class="card">
                {{-- <a href="{{ route('usuarios.index') }}">Gerenciar Usuários</a> --}}
                <a href="#">Gerenciar Usuários</a>
            </div>
            <div class="card">
                {{-- <a href="{{ route('relatorios.index') }}">Relatórios</a> --}}
                <a href="#">Relatórios</a>
            </div>
        </div>
    </body>
</html>