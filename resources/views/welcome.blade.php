<!DOCTYPE html>
<html lang="pt">

{{-- incluindo o head na home --}}
@include('home.partes.head')
@section('title', 'Try Code-Home')

<style>
   .custom-btn {
    background-color: rgb(39, 38, 38);
    color: white;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.custom-btn:hover {
    background-color: #919198; /* Um tom mais escuro no hover */
    color: #000000;
} 
</style>

<body>
    {{-- incluindo o menu na home --}}
    @include('home.partes.menu')

    <!-- Carousel -->
    <div id="carouselExample" class=" carousel slide" style="margin-top: 105px;" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('home/img/bg1.jpg')}}" class="d-block w-100" alt="Servidores">
                <div class="carousel-caption text-start text-center" >
                   
                   <!-- <a href="#" class="btn btn-danger">Saiba Mais</a> -->
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{asset('home/img/bg2.jpg')}}" class="d-block w-100" alt="Servidores">
                <div class="carousel-caption text-start text-center">
                   
                    <!-- <a href="#" class="btn btn-danger">Saiba Mais</a> -->
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{asset('home/img/bg3.jpg')}}" class="d-block w-100" alt="Servidores">
                <div class="carousel-caption text-start text-center">
                   
                    <!-- <a href="#" class="btn btn-danger">Saiba Mais</a> -->
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <!-- Seção de Pesquisa de Domínios -->
<section class="pesquisa-dominio py-5">
    <div class="container text-center">
        <h2 class="text-white fw-bold">PESQUISE O SEU DOMÍNIO</h2>
        <p class="text-light">Domínios a partir de <span class="fw-bold text-warning">10.000,00 Kz</span> /Anual</p>
        
        <form action="{{ route('dominos.verificar') }}"  method="post" id="form-registar">
            @csrf
            <div class="d-flex justify-content-center">
                <input type="text" name='dominio' id="dominio-input" class="form-control w-50" placeholder="Digite um nome aqui">
                <select class="form-select w-auto" name='tld' id="tld-select">
                    @if(isset($dominios))

                        @foreach($dominios as $d)
                        @php
                            $extensao=str_replace('.', '', $d->ltd);
                        @endphp
                        <option value="{{$extensao}}">{{$d->ltd}}</option>
                        @endforeach
                      
                    @endif
                   
                   
                </select>

                <button type="submit" class="btn btn-danger" id="submit-btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

            <!-- Barra de carregamento -->
        <div id="loading" class="mt-3" style="display:none;">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>


        <!-- Resultado -->
        <div id="result" class="mt-3"></div>

            <div class="mt-2">
                <a href="https://trycode-angola.com/painel/cart.php?a=add&domain=register" class="text-light">Lista de domínios</a> | 
                <a href="#" class="text-light">Transferência de domínio</a>
            </div>
        </div>
    </div>

    




</section>

<section class="planos-hospedagem">
    <h2>Pacotes de Hospedagens Web</h2>
    <p>Planos de hospedagens de site criados a pensar no seu bolso e no seu projecto!</p>
    <div class="planos-container">
        @if(isset($pacotes))
            @foreach($pacotes as $p)

                @if($p->nomepacote=='Pacote Avançado')
                <div class="plano destaque">
                    <div class="header pro">{{$p->nomepacote}} <span class="badge">MAIS VENDIDO</span></div>
                    <ul>
                        <li><strong>{{$p->armazenamento}}</strong> de Armazenamento</li>
                        <li><strong>{{$p->qtdbd}}</strong> BD (Mysql)</li>
                        <li><strong>{{$p->qtdemail}}</strong> Contas de Email</li>
                        <li><strong>{{$p->qtdSite}}</strong> Parqueamento de Domínio</li>
                        <li>SSL: <strong>{{$p->tipossl}}</strong> </li>
                        <li>Suporte: <strong>{{$p->tipo_suporte}}</strong> </li> 
                    </ul>
                    <div class="preco-destaque mt-2 mb-2">
                            
                        <span class="valor">{{ number_format($p->preco, 2, ',', '.') }} Kz/Mês</span>
                        <span class="valor">{{ number_format($p->preco*12, 2, ',', '.') }} Kz/Anual</span>
                    </div>
                   <!-- <button class="btn btn-danger w-50 mt-2 mb-2 add-plano-btn" onclick="adicionarPlano('{{$p->nomepacote}}', 1, {{$p->preco}})"> Adicionar</button> -->
                    <a class="btn  w-50 mt-2 mb-2 add-plano-btn custom-btn" href="{{$p->URL}}">Comprar</a>
                </div>
                    
                @else

                    <div class="plano">
                        <div class="header mini">{{$p->nomepacote}}</div>
                        <ul>
                            <li><strong>{{$p->armazenamento}}</strong> de Armazenamento</li>
                            <li><strong>{{$p->qtdbd}}</strong> BD (Mysql)</li>
                            <li><strong>{{$p->qtdemail}}</strong> Contas de Email</li>
                            <li><strong>{{$p->qtdSite}}</strong> Parqueamento de Domínio</li>
                            <li>SSL: <strong>{{$p->tipossl}}</strong> </li>
                            <li>Suporte: <strong>{{$p->tipo_suporte}}</strong> </li> 
                        </ul>
                        <!-- Campo de preço personalizado -->
                        <!-- Preço destacado -->
                        <div class="preco-destaque mt-2 mb-2">
                            
                            <span class="valor">{{ number_format($p->preco, 2, ',', '.') }} Kz/Mês</span>
                            <span class="valor">{{ number_format($p->preco*12, 2, ',', '.') }} Kz/Anual</span>
                        </div>
                        <a class="btn w-50 mt-2 mb-2 add-plano-btn custom-btn" href="{{$p->URL}}">Comprar</a>
                    </div>
                @endif
                
            @endforeach
            
        @endif

        
        

    </div>

    
</section>


<section class="">
    <div class="container my-5">
        <h3  class="text-center" style="margin-bottom: 60px;">As nossas hospedagens suportam</h3>
        <div id="recursosCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="{{asset('home/img/php-logo.png')}}" class="img-fluid" alt="WordPress">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('home/img/laravel-logo.png')}}" class="img-fluid" alt="Joomla">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('home/img/python.png')}}" class="img-fluid" alt="Magento">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('home/img/mysql-logo.png')}}" class="img-fluid" alt="Drupal">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="{{asset('home/img/perl-logo.png')}}" class="img-fluid" alt="PrestaShop">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('home/img/wordpress-logo.png')}}" class="img-fluid" alt="OpenCart">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('home/img/rails-logo.png')}}" class="img-fluid" alt="Shopify">
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('home/img/mysql.png')}}" class="img-fluid" alt="Moodle">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#recursosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#recursosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
    
</section>


<section class="porque-nos-escolher mb-4">
    <h2 class="text-center fw-bold text-white mb-4 pt-4">POR QUE NOS ESCOLHER?</h2>
   <div class="container pb-4">

    <div class="row g-4 ">
        <div class="col-md-6 col-lg-3">
            <div class="card text-center p-3 bg-dark text-white">
                <i class="bi bi-chat-dots-fill fs-1 text-white"></i>
                <h5 class="fw-bold mt-3" style="color: #2a30db;">SUPORTE 12H/6H</h5>
              <P>Estamos disponiveis a lhe dar todo suporte necessário para que o seu projecto esteja sempre on</P>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center p-3 bg-dark text-white">
                <i class="bi bi-folder-fill fs-1 text-white"></i>
                <h5 class="fw-bold mt-3" style="color: #2a30db;">ORGANIZAÇÃO</h5>
                <p>Procedimentos de trabalhos criados para facilitar e acelerar o seu projecto.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center p-3 bg-dark text-white">
                <i class="bi bi-lightbulb-fill fs-1 text-white"></i>
                <h5 class="fw-bold mt-3" style="color: #2a30db;">EXPERTESE</h5>
                <p>A nossa equipa é 100% especializada em soluções web, para atender as necessidades do seu negócio.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center p-3 bg-dark text-white">
                <i class="bi bi-clock fs-1 text-white"></i>
                <h5 class="fw-bold mt-3" style="color: #2a30db;">TEMPO DE ACTIVIDADE</h5>
                <p>O tempo de actividade dos nossos servidores é de 99.9%</p>
            </div>
        </div>
    </div>

   </div>
</section>




<!-- Modal de Confirmação -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm"> <!-- Modal menor -->
        <div class="modal-content">
            <div class="modal-header border-0">
                <i class="bi bi-check-circle-fill success-icon"></i>
            </div>
            <div class="modal-body">
                Item adicionado com sucesso!
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
  
<!-- ENDModal de Confirmação -->


 {{-- incluindo o footer na home --}}
@include('home.partes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

/*função para remover todos os dados do localstorage

window.addEventListener("load", function () {
    localStorage.clear();
    console.log("Todos os dados do localStorage foram removidos!");
});
*/

// Função para adicionar um plano ao carrinho
/*
function adicionarPlano(nomePlano, qtdPlano, precoPlano) {
    let planos = obterCarrinhoDoLocalStorage(); // Obtém os planos armazenados

    // Verifica se o plano já existe no carrinho
    let planoExistente = planos.find(plano => plano.nome === nomePlano);

    if (planoExistente) {
        // Se o plano já existir, apenas atualiza a quantidade
        planoExistente.qtd += qtdPlano;
    } else {
        // Caso contrário, adiciona um novo item ao carrinho
        planos.push({
            nome: nomePlano,
            qtd: qtdPlano,
            preco: precoPlano
        });
    }

    // Atualiza o localStorage com a nova lista
    localStorage.setItem("carrinho", JSON.stringify(planos));

    // Atualiza a exibição do carrinho
    atualizarCarrinho();
}*/


function adicionarPlano(nomePlano, qtdPlano, precoPlano) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Verifica se o item já existe no carrinho
    let itemExistente = carrinho.find(item => item.nome === nomePlano);

    if (itemExistente) {
        itemExistente.qtd += qtdPlano; // Atualiza a quantidade
    } else {
        carrinho.push({ nome: nomePlano, qtd: qtdPlano, preco: precoPlano });
    }

    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    atualizarCarrinho();

    // Abre o modal de sucesso
    let modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
}

// Função para obter o carrinho do localStorage
function obterCarrinhoDoLocalStorage() {
    return JSON.parse(localStorage.getItem("carrinho")) || [];
}

// Chamada da função ao clicar no botão "Adicionar"
document.querySelectorAll(".btn-adicionar").forEach(botao => {
    botao.addEventListener("click", function () {
        let nome = this.getAttribute("data-nome");
        let qtd = parseInt(this.getAttribute("data-qtd"));
        let preco = parseFloat(this.getAttribute("data-preco"));

        adicionarPlano(nome, qtd, preco);
    });
});


// Função para atualizar a exibição do carrinho
function atualizarCarrinho() {
    let cartItems = document.getElementById("cartItems");
    let cartTotal = document.getElementById("cartTotal");
    let cartCount = document.getElementById("cartCount");

    if (!cartItems || !cartTotal || !cartCount) {
        console.warn("Elementos do carrinho não encontrados!");
        return;
    }

    let planos = obterCarrinhoDoLocalStorage();

    // Se `planos` não for um array, atribuímos um array vazio para evitar erros
    if (!Array.isArray(planos)) {
        console.warn("Dados do carrinho inválidos! Resetando...");
        planos = [];
        localStorage.setItem("carrinho", JSON.stringify(planos)); // Corrige o erro
    }

    cartItems.innerHTML = ""; // Limpa a lista antes de renderizar os itens
    let total = 0;

    planos.forEach(plano => {
        // Verifica se os valores são válidos antes de usar `toLocaleString`
        let preco = parseFloat(plano.preco) || 0;
        let qtd = parseInt(plano.qtd) || 1;

        let item = document.createElement("li");
        item.classList.add("d-flex", "justify-content-between", "align-items-center", "mb-2", "border-bottom", "pb-2");
        item.innerHTML = `
            <div>
                <span class="fw-bold">${plano.nome}</span>
                <small class="d-block text-muted">${qtd}x ${preco.toLocaleString()} Kz</small>
            </div>
            <button class="btn btn-sm btn-danger remove-btn" data-nome="${plano.nome}">✖</button>
        `;
        cartItems.appendChild(item);
        total += preco * qtd;
    });

    cartTotal.textContent = total.toLocaleString() + " Kz";
    cartCount.textContent = planos.length;

    // Adiciona evento de remoção aos botões
    document.querySelectorAll(".remove-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            removerPlano(this.dataset.nome);
        });
    });
}


// Função para remover um plano do carrinho
function removerPlano(nomePlano) {
    let planos = obterCarrinhoDoLocalStorage();

    // Filtra os itens, removendo o plano com o nome correspondente
    planos = planos.filter(plano => plano.nome !== nomePlano);

    // Atualiza o localStorage
    localStorage.setItem("carrinho", JSON.stringify(planos));

    // Atualiza a exibição do carrinho
    atualizarCarrinho();
}

// Atualiza o carrinho ao carregar a página
document.addEventListener("DOMContentLoaded", atualizarCarrinho);


    //codigo AJAX PARA PESQUISAR DOMINIOS 
$(document).ready(function() {
    // Intercepta o submit do formulário
    $('#form-registar').on('submit', function(e) {
        e.preventDefault(); // Impede o envio tradicional do formulário

        // Exibe a barra de carregamento
        $('#loading').show();

        // Captura os valores do formulário
        var dominio = $('#dominio-input').val();
        var tld = $('#tld-select').val();

        // Logando valores capturados
        console.log('Dominio: ', dominio);
        console.log('TLD: ', tld);

        // Faz a requisição AJAX
        $.ajax({
            url: '{{ route('dominos.verificar') }}', // Rota Laravel
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                dominio: dominio,
                tld: tld
            },
            success: function(response) {
                // Logando a resposta
                console.log('Resposta: ', response);

                // Esconde a barra de carregamento
                $('#loading').hide();

                // Exibe o resultado
                if(response.status === 'erro') {
                    $('#result').html('<div class="alert alert-danger">' + response.message + '</div>');
                } else {
                    var statusClass = response.status === 'disponível' ? 'alert-success' : 'alert-danger';
                    $('#result').html('<div class="alert ' + statusClass + '"><strong>' + response.message + '</strong><br>' + (response.preco ? 'Preço: ' + response.preco : '') + '</div>');
                }
            },
            error: function(xhr, status, error) {
                // Esconde a barra de carregamento em caso de erro
                $('#loading').hide();
                $('#result').html('<div class="alert alert-danger">Ocorreu um erro na requisição. Tente novamente.</div>');
                console.log('Erro AJAX: ', error);  // Logando erro da requisição
            }
        });
    });
});


    
</script>

</body>
</html>
