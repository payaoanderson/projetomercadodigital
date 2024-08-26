alert('clique no ok para abrir o site');



function atualizarData() {
    // Criar um novo objeto de data
    var data = new Date();
    
    // Obter os componentes da data
    var dia = data.getDate();
    var mes = data.getMonth() + 1; // Os meses são baseados em zero
    var ano = data.getFullYear();
    
    // Obter os componentes do tempo
    var horas = data.getHours();
    var minutos = data.getMinutes();
    var segundos = data.getSeconds();
    
    // Formatar a data e hora
    var dataFormatada = dia + '/' + mes + '/' + ano + ' ' + horas + ':' + minutos + ':' + segundos;
    
    // Atualizar o conteúdo do elemento HTML com a nova data
    document.getElementById('data').textContent = dataFormatada;
  }
  
  // Chamar a função inicialmente para exibir a data
  atualizarData();
  
  // Atualizar a data a cada segundo (1000 milissegundos)
  setInterval(atualizarData, 1000);



    var spanAno = document.getElementById('ano');

    // Obtém o ano atual
    var anoAtual = new Date().getFullYear();

    // Define o texto do elemento para o ano atual
    spanAno.textContent = anoAtual;



    document.addEventListener("DOMContentLoaded", function() {
      // Array de produtos
      const produtos = [
          { nome: "32 videos milionarios", preco: 29.99 },
          { nome: "BLILHE ME 2024", preco: 39.99 },
          { nome: "COMO SE TORNAR MILIONARIO NO MARKETING DIGITAL", preco: 49.99 },
          // Adicione mais produtos conforme necessário
      ];
  
      // Função para renderizar os produtos na página
      function renderizarProdutos() {
          const listaProdutos = document.querySelector(".imagens");
          listaProdutos.innerHTML = "";
  
          produtos.forEach(function(produto, index) {
              const itemProduto = document.createElement("div");
              itemProduto.classList.add(`produto${index + 1}`, "produto");
  
              const imagem = document.createElement("img");
              imagem.src = `./img/${index + 1}.png`;
              imagem.alt = `Produto ${index + 1}`;
              imagem.width = 150;
  
              const nomeProduto = document.createElement("h5");
              nomeProduto.textContent = produto.nome;
  
              const precoProduto = document.createElement("p");
              precoProduto.textContent = `Preço: R$ ${produto.preco.toFixed(2)}`;
  
              const botaoCompra = document.createElement("button");
              botaoCompra.textContent = "COMPRAR";
              botaoCompra.addEventListener("click", function() {
                  adicionarAoCarrinho(produto);
              });
  
              itemProduto.appendChild(imagem);
              itemProduto.appendChild(nomeProduto);
              itemProduto.appendChild(precoProduto);
              itemProduto.appendChild(botaoCompra);
  
              listaProdutos.appendChild(itemProduto);
          });
      }
  
      // Função para pesquisar produtos
      function pesquisarProdutos(pesquisa) {
          const produtosFiltrados = produtos.filter(function(produto) {
              return produto.nome.toLowerCase().includes(pesquisa.toLowerCase());
          });
  
          renderizarProdutos(produtosFiltrados);
      }
  
      // Função para adicionar produtos ao carrinho
      function adicionarAoCarrinho(produto) {
          const carrinho = document.querySelector("#carrinho");
          const itemCarrinho = document.createElement("li");
          itemCarrinho.textContent = `${produto.nome} - R$ ${produto.preco.toFixed(2)}`;
  
          carrinho.appendChild(itemCarrinho);
      }
  
      // Inicializar a renderização dos produtos na página
      renderizarProdutos();
  
      // Event listener para a caixa de pesquisa
      const campoPesquisa = document.querySelector("#meuCampo");
      campoPesquisa.addEventListener("input", function() {
          pesquisarProdutos(this.value);
      });
  
  });
  

  