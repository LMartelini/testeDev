<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <style>
            .sidebar {
                height: 100vh;
                width: 300px; 
                position: fixed;
                top: 0;
                left: 0;
                background-color: #f8f9fa;
                padding-top: 20px;
                display: flex;
                flex-direction: column;
                justify-content: space-between; 
            }
            .sidebar a {
                padding: 10px 20px; 
                text-decoration: none;
                font-size: 18px;
                color: #333;
                display: flex;
                align-items: center;
            }
            .sidebar a:hover {
                background-color: rgb(143, 150, 169);
                color: rgb(27, 73, 212);
            }
            .sidebar .top-section a {
                justify-content: space-between; 
            }
            .sidebar .middle-section a {
                justify-content: flex-start; 
                gap: 10px; 
            }
            .sidebar .bottom-section a {
                justify-content: flex-end; 
                gap: 10px; 
            }
            .sidebar .top-section {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            .sidebar .middle-section {
                flex-grow: 1; 
                display: flex;
                flex-direction: column;
                justify-content: center; 
                gap: 10px;
            }
            .sidebar .bottom-section {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            .main-content {
                margin-left: 300px; 
                padding: 20px;
            }
            .page-header {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 20px;
                padding-left: 320px; 
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <div class="top-section">
                <a href="#">
                    <span>Admin Panel</span>
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <div class="middle-section">
                <a href="{{ route('grupos.index') }}">
                    <i class="fa-solid fa-building"></i>
                    <span>Grupos econômicos</span>
                </a>
                <a href="{{ route('bandeiras.index') }}">
                    <i class="fa-solid fa-flag"></i>
                    <span>Bandeiras</span>
                </a>
                <a href="{{ route('unidades.index') }}">
                    <i class="fa-solid fa-shop"></i>
                    <span>Unidades</span>
                </a>
                <a href="{{ route('colaboradores.index') }}">
                {{-- <a href="#"> --}}
                    <i class="fa-solid fa-users"></i>
                    <span>Colaboradores</span>
                </a>
                {{-- <a href="{{ route('relatorio.index') }}"> --}}
                <a href="#">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Relatórios</span>
                </a>
            </div>

            <div class="bottom-section">
                <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span>Admin User: {{ auth()->user()->email }}</span>
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <div class="page-header">
            <h1>@yield('title')</h1>
        </div>

        <div class="main-content">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>