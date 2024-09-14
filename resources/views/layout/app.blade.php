<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Digital</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid flex-grow-1">
        <div class="row">
            <!-- Menu Lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
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
            
                        <!-- Links de Ajuda e Suporte -->
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
            
                        <!-- Seção de usuário autenticado -->
                        @auth
                            <!-- Exibir informações do usuário logado -->
                            <li class="nav-item">
                                <p class="nav-link">
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </p>
                                <p class="nav-link">
                                    <small>{{ Auth::user()->email }}</small>
                                </p>
                            </li>
            
                            <!-- Link de Logout -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <!-- Se o usuário não estiver autenticado, mostrar Login e Registrar -->
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
            </nav>
            <!-- Conteúdo Principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 d-flex flex-column">
                <!-- Área de Conteúdo -->
                <div class="flex-grow-1">
                    @yield('content')
                </div>

                <!-- Rodapé -->
                <footer class="bg-dark text-center text-white py-3 mt-auto">
                    @include('includes.rodape')
                </footer>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
