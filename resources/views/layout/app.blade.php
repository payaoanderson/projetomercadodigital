<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Digital - Área Administrativa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#007bff">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        
        #sidebar {
            background-color: #343a40;
            color: #fff;
            width: 250px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        #sidebar.collapsed {
            transform: translateX(-100%);
        }

        #sidebar h1 {
            font-size: 1.5rem;
            padding: 20px 0;
            text-align: center;
        }

        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            padding: 15px 20px;
            transition: background 0.3s ease, padding-left 0.3s ease;
        }

        #sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
            padding-left: 30px;
        }

        #sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        main {
            margin-left: 250px;
            padding: 20px;
            background-color: #f4f4f4;
            height: 100%;
            overflow-y: auto;
            transition: margin-left 0.3s ease;
        }

        main.collapsed {
            margin-left: 0;
        }

        .navbar {
            background-color: #007bff;
            color: white;
        }

        .toggle-button {
            cursor: pointer;
            margin-right: 15px;
            display: block;
        }

        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%);
            }

            main {
                margin-left: 0;
            }

            #sidebar.show {
                transform: translateX(0);
            }
        }

        footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <div id="sidebar">
        <h5 class="text-center py-4">
            <i class="fas fa-store"></i> <!-- Ícone adicionado -->
            Mercado Digital
        </h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-users"></i> Usuários
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('produtos.index') }}">
                    <i class="fas fa-box"></i> Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vendas.index') }}">
                    <i class="fas fa-shopping-cart"></i> Vendas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('compras.index') }}">
                    <i class="fas fa-shopping-bag"></i> Compras
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('relatorios.index') }}">
                    <i class="fas fa-chart-line"></i> Relatórios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('more_options.help') }}">
                    <i class="fas fa-question-circle"></i> Ajuda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('more_options.support') }}">
                    <i class="fas fa-life-ring"></i> Suporte
                </a>
            </li>
            @auth
            <li class="nav-item">
                <p class="nav-link">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </p>
                <p class="nav-link">
                    <small>{{ Auth::user()->email }}</small>
                </p>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i> Registrar
                </a>
            </li>
            @endauth
        </ul>
    </div>

    <main role="main" class="flex-grow-1">
        <div class="flex-grow-1">
            @yield('content')
        </div>

        <footer class="bg-dark mb-3 text-center text-white py-3 mt-5">
            @include('includes.rodape')
        </footer>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const main = document.querySelector('main');

            sidebar.classList.toggle('collapsed');
            main.classList.toggle('collapsed');
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                    console.log('ServiceWorker registrado com sucesso:', registration.scope);
                }, function(err) {
                    console.log('Falha no registro do ServiceWorker:', err);
                });
            });
        }
    </script>
    @include('includes.cookie')
</body>
</html>
