

@include('includes.cabeca')

@include('includes.cabecalho')
    

    
    <main class="container-principal">
        
   @include('includes.conteudoprincipal')

    </main>

@include("includes.rodape")
    

    <div class="politica">

    <a href="{{route('politica')}}">Politica de privacidade</a>
    </div>


     <script src="{{asset('./js/script.js')}}"></script>





</html>


@include('includes.cookie')



