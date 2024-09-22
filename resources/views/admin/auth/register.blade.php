<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #cookieConsent {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            display: none; /* Oculto por padrão */
            z-index: 9999;
        }
        #cookieConsent button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Conteúdo da página -->
        <h2 class="text-center">Registrar</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
    </form>

    <!-- Botão de Registrar fora do formulário, grande e centralizado -->
    <div class="mt-4">
        <button type="button" class="btn btn-primary btn-lg btn-block" style="padding: 2px" id="registerButton" onclick="submitRegisterForm()" style="height: 100px; font-size: 24px; display: flex; justify-content: center; align-items: center; padding: 10px;">
            <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                <span id="buttonText">Registrar</span>
                <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none ml-2" role="status" aria-hidden="true"></span>
            </div>
        </button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Função para submeter o formulário ao clicar no botão fora do form
    function submitRegisterForm() {
        const registerForm = document.getElementById('registerForm');
        const registerButton = document.getElementById('registerButton');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        // Exibe o spinner de carregamento no botão de registrar
        registerButton.disabled = true;
        buttonText.textContent = 'Carregando...';
        loadingSpinner.classList.remove('d-none');

        // Submete o formulário
        registerForm.submit();
    }
</script>
    </div>

    <!-- Aviso de Cookies -->
    <div id="cookieConsent">
        <span>Utilizamos cookies para garantir que você tenha a melhor experiência em nosso site.</span>
        <button type="button" class="btn btn-primary btn-sm" id="acceptCookies">Aceitar</button>
        <button type="button" class="btn btn-secondary btn-sm" id="declineCookies">Recusar</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script>
        // Função para mostrar o aviso de cookies se o cookie ainda não estiver definido
        $(document).ready(function() {
            if (!Cookies.get('cookiesAccepted')) {
                $('#cookieConsent').show();
            }

            // Quando o usuário aceitar os cookies
            $('#acceptCookies').click(function() {
                Cookies.set('cookiesAccepted', 'true', { expires: 7 }); // Define o cookie por 1 ano
                $('#cookieConsent').fadeOut();
            });

            // Quando o usuário recusar os cookies
            $('#declineCookies').click(function() {
                Cookies.set('cookiesAccepted', 'false', { expires: 7 }); // Define o cookie por 1 ano
                $('#cookieConsent').fadeOut();
            });
        });
    </script>
</body>
</html>
