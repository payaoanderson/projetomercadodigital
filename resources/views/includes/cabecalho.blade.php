<div class="cabeça">
    <header id="cabecalho">
        <nav class="container">
            <div class="bloco-texto">
                <ul class="logo">
                    <li>
                       <img src="{{ asset('img/logo.jpg') }}" width="100">
                    </li>
                </ul>

                <div class="bloco-texto2">
                    <ul>
                        <li>
                            <a href="{{ route('home.index') }}">Mercado Digital</a>
                        </li>
                    </ul>
                </div>

                <div class="bloco-pesquisa">
                    <ul>
                        <li>
                            <!-- Se necessário, adicione elementos aqui -->
                        </li>
                    </ul>
                </div>

                <div class="pesquisa">
                    <form action="" onsubmit="return enviarFormulario()" id="meuFormulario">
                        <button type="submit" name="atualizaraPaginaou" value="atualizaraPaginaou" id="atualizaraPaginaou">Atualizar a Página OU <img src="img/f5.png" alt="" class="f5" width="20"></button>
                    </form>
                </div>

                <div class="icone">
                    <ul>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+5514997125004&text=Olá!%20Gostaria%20de%20mais%20informações." target="_blank"><img src="img/whatsapp.png" alt=""></a>
                        </li>
                    </ul>
                </div>

                <!-- Seção de Login e Registro -->
                <div class="login-registro">
                    <ul>
                        <li>
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Registrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>