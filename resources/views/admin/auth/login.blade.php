@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Login</h2>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Campo de E-mail -->
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <!-- Campo de Senha com Olhinho -->
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Exibindo a Mensagem de Erro -->
                @if (session('status'))
                    <div class="alert alert-danger mt-2">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Erro ao usuário não existir -->
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif


                <div class="mt-4">
                    <button type="button" class="btn btn-primary btn-lg btn-block" style="padding: 5px" id="loginButton" onclick="submitLoginForm()" style="height: 100px; font-size: 24px; display: flex; justify-content: center; align-items: center; padding: 10px;">
                        <span id="buttonText">Login</span>
                        <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript para Alternar Visibilidade da Senha e Exibir Loading Spinner -->
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('togglePasswordIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    }

    // Função para submeter o formulário ao clicar no botão fora do form
    function submitLoginForm() {
        const loginForm = document.getElementById('loginForm');
        const loginButton = document.getElementById('loginButton');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        // Exibe o spinner de carregamento no botão de login
        loginButton.disabled = true;
        buttonText.textContent = 'Carregando...';
        loadingSpinner.classList.remove('d-none');

        // Submete o formulário
        loginForm.submit();
    }
</script>


@include('includes.cookie')
@endsection
