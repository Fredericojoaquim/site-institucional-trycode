<!DOCTYPE html>
<html lang="pt">
{{-- incluindo o head na home --}}
@section('title', 'Serviços')
@include('home.partes.head')


<style>
    .planos-hospedagem {
        text-align: center;
        padding: 20px;
    }
    .planos-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    .plano {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 250px;
    }
    .header {
        color: #fff;
        font-weight: bold;
        padding: 15px;
        text-align: center;
    }
    .mini { background: #1e293b; }
    .lite { background: #1e293b; }
    .pro { background: #b30000; }
    .plus { background: #1e293b; }
    .destaque { border: 3px solid #b30000; }
    .badge {
        background: yellow;
        color: black;
        font-size: 12px;
        padding: 3px 6px;
        margin-left: 5px;
        border-radius: 3px;
    }
    .plano ul {
        list-style: none;
        padding: 10px;
    }
    .plano ul li {
        padding: 8px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
    }
    .plano ul li:last-child {
        border-bottom: none;
    }
    .section-servicos{margin-top:150px; margin-bottom: 20px;}
    </style>

<body>

     {{-- incluindo o menu na home --}}

 @include('home.partes.menu')
    <!-- Seção Nossos Serviços -->
<!-- Seção Nossos Serviços -->
<section class="container section-servicos">
    <h2 class="text-center text-primary mb-4">Nossos Serviços</h2>
    <div class="row">
        <!-- Desenvolvimento de Websites -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-laptop-code fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Desenvolvimento de Websites</h5>
                    <p class="card-text text-muted">
                        Criamos sites modernos, responsivos e otimizados para atender às necessidades do seu negócio.
                    </p>
                </div>
            </div>
        </div>
        <!-- Gestão de Redes Sociais -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Gestão de Redes Sociais</h5>
                    <p class="card-text text-muted">
                        Ajudamos sua empresa a crescer nas redes sociais com estratégias eficazes e conteúdo envolvente.
                    </p>
                </div>
            </div>
        </div>
        <!-- Design Gráfico -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-paint-brush fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Design Gráfico</h5>
                    <p class="card-text text-muted">
                        Criamos artes profissionais para identidade visual, marketing digital e materiais impressos.
                    </p>
                </div>
            </div>
        </div>
        <!-- Desenvolvimento de Sistemas -->
        <div class="col-md-4 mt-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-database fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Desenvolvimento de Sistemas</h5>
                    <p class="card-text text-muted">
                        Criamos sistemas personalizados para otimizar a gestão e os processos da sua empresa.
                    </p>
                </div>
            </div>
        </div>
        <!-- E-commerce -->
        <div class="col-md-4 mt-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">E-commerce</h5>
                    <p class="card-text text-muted">
                        Desenvolvemos lojas virtuais completas para que você possa vender seus produtos online.
                    </p>
                </div>
            </div>
        </div>
        <!-- Consultoria Digital -->
        <div class="col-md-4 mt-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-lightbulb fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Consultoria Digital</h5>
                    <p class="card-text text-muted">
                        Oferecemos consultoria para transformar digitalmente seu negócio e alcançar mais clientes.
                    </p>
                </div>
            </div>
        </div>
        <!-- Venda de Domínios e Hospedagem -->
        <div class="col-md-4 mt-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-server fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Venda de Domínios e Hospedagem</h5>
                    <p class="card-text text-muted">
                        Registre seu domínio e tenha uma hospedagem segura e de alta performance para seu site ou sistema.
                    </p>
                </div>
            </div>
        </div>
        <!-- Formação em Desenvolvimento de Software -->
        <div class="col-md-4 mt-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-code fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Formação em Desenvolvimento de Software</h5>
                    <p class="card-text text-muted">
                        Capacitação completa para empresas e indivíduos que desejam aprender a programar e desenvolver sistemas.
                    </p>
                </div>
            </div>
        </div>
        <!-- Formação em Análise de Dados -->
        <div class="col-md-4 mt-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-chart-pie fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Formação em Análise de Dados</h5>
                    <p class="card-text text-muted">
                        Treinamos profissionais e empresas para transformar dados em insights valiosos para a tomada de decisões.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


    
 {{-- incluindo o footer na home --}}

 @include('home.partes.footer')




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
</script>
</body>
</html>
