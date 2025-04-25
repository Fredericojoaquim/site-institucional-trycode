<!DOCTYPE html>
<html lang="pt">
    @include('home.partes.head')
    @section('title', 'Carrinho')

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


    /* Estilizando o modal */
.modal-content {
    border-radius: 12px;
    border: none;
    text-align: center;
    padding: 20px;
}

.modal-header {
    border-bottom: none;
    justify-content: center;
}

.modal-body {
    font-size: 18px;
    font-weight: 500;
    color: #333;
}

.success-icon {
    font-size: 50px;
    color: #28a745; /* Verde sucesso */
    animation: pop 0.4s ease-in-out;
}

/* Animação do ícone */
@keyframes pop {
    0% {
        transform: scale(0.5);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

#successModal .btn-success {
    background-color: #28a745;
    border: none;
    border-radius: 20px;
    padding: 8px 20px;
    font-weight: 500;
}

#successModal .btn-success:hover {
    background-color: #218838;
}



        .resumo{ margin-top: 150px; margin-bottom: 20px;}
        body {
            background-color: #f8f9fa;
        }
        .step-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #eeeeee;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .step {
            text-align: center;
        }
        .step .icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.5rem;
            color: white;
        }
        .step p {
            margin-top: 10px;
            font-weight: 500;
        }
        .active-step {
            background-color: #a50000;
        }
        .inactive-step {
            background-color: #c4c4c4;
        }
        .order-summary, .step-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-danger {
            background-color: #a50000;
            border-color: #a50000;
        }
        .btn-danger:hover {
            background-color: #800000;
        }
        .hidden {
            display: none;
        }
        .centered {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>

<body>
    
    {{-- incluindo o menu na home --}}
    @include('home.partes.menu')

   
  <section class="resumo">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
              <!-- Etapa 1 - Carrinho -->
              <div class="step-content" id="content-1">
                <h5 class="fw-bold">CARRINHO (<span id="cart-count">0</span>)</h5>
                <div id="cart-items"></div>
                <button class="btn btn-danger w-100 mt-3" onclick="nextStep()">SEGUINTE</button>
              </div>
          
              <!-- Etapa 2 - Dados Cliente -->
              <div class="step-content hidden" id="content-2">
                <h5 class="fw-bold">DADOS DO CLIENTE</h5>
                <form action="">
                <input type="text" class="form-control mb-3" id="client-name" placeholder="Nome Completo">
                <input type="email" class="form-control mb-3" id="client-email" placeholder="Email">
                <a class="btn btn-danger w-100 mt-3" onclick="nextStep()">SEGUINTE</a>
                </form>
              </div>
          
              <!-- Etapa 3 - Resumo + Formulário -->
              <form action="/processar-pedido" method="POST" id="form-pedido">
                <div class="step-content hidden" id="content-3">
                  <h5 class="fw-bold">RESUMO DO PEDIDO</h5>
          
                  <p><strong>Nome:</strong> <span id="summary-name-text"></span></p>
                  <input type="hidden" name="nome" id="summary-name">
          
                  <p><strong>Email:</strong> <span id="summary-email-text"></span></p>
                  <input type="hidden" name="email" id="summary-email">
          
                  <h5 class="fw-bold">Itens no Carrinho:</h5>
                  <div id="summary-cart-display"></div>
                  <input type="hidden" name="itens_carrinho" id="summary-cart">
          
                  <button type="submit" class="btn btn-danger w-100 mt-3">FINALIZAR COMPRA</button>
                </div>
              </form>
          
              <!-- Etapa 4 - Confirmação -->
              <div class="step-content hidden" id="content-4">
                <h5 class="fw-bold">CONFIRMAÇÃO</h5>
                <p>Seu pedido foi concluído com sucesso!</p>
              </div>
            </div>
          
            <!-- Total do Pedido (visível na etapa 1 e 3) -->
            <div class="col-md-4" id="total-container">
              <div class="order-summary">
                <h5 class="fw-bold">TOTAL DO PEDIDO</h5>
                <p>Subtotal: <span class="fw-bold" id="total-side">0 Kz</span></p>
                <h4 class="fw-bold text-danger" id="total-final-side">0 Kz</h4>
              </div>
            </div>
          </div>
    </div>
    

        
  </section>
 {{-- incluindo o footer na home --}}

  @include('home.partes.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

let currentStep = 1;
        function nextStep() {
            document.getElementById(`content-${currentStep}`).classList.add('hidden');
            document.getElementById(`step-${currentStep}`).querySelector('.icon').classList.remove('active-step');
            document.getElementById(`step-${currentStep}`).querySelector('.icon').classList.add('inactive-step');
            
            if (currentStep === 1) {
                document.getElementById("total-container").classList.add("hidden");
            }
            if (currentStep === 2) {
                document.getElementById("summary-name").innerText = document.getElementById("client-name").value;
                document.getElementById("summary-email").innerText = document.getElementById("client-email").value;
                document.getElementById("total-container").classList.remove("hidden");
            }
            if (currentStep === 3) {
                document.getElementById("total-container").classList.add("hidden");
            }
            
            currentStep++;
            
            document.getElementById(`content-${currentStep}`).classList.remove('hidden');
            document.getElementById(`step-${currentStep}`).querySelector('.icon').classList.remove('inactive-step');
            document.getElementById(`step-${currentStep}`).querySelector('.icon').classList.add('active-step');
        }


function carregarCarrinho() {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            let cartItems = document.getElementById("cart-items");
            let cartCount = document.getElementById("cart-count");
            let totalPrice = document.getElementById("total-price");
            let totalFinal = document.getElementById("total-final");
            
            cartItems.innerHTML = "";
            let total = 0;
            
            carrinho.forEach((item, index) => {
                let precoTotal = item.qtd * item.preco;
                total += precoTotal;
                
                let cartItem = document.createElement("div");
                cartItem.classList.add("cart-item");
                cartItem.innerHTML = `
                    <p class="fw-bold">${item.nome}</p>
                    <p>Quantidade: ${item.qtd}</p>
                    <p class="fw-bold text-danger">${precoTotal.toLocaleString()} Kz</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-outline-secondary" onclick="alterarQuantidade(${index}, -1)">-</button>
                        <span>${item.qtd}</span>
                        <button class="btn btn-outline-secondary" onclick="alterarQuantidade(${index}, 1)">+</button>
                        <button class="btn btn-danger" onclick="removerItem(${index})">🗑</button>
                    </div>
                `;
                cartItems.appendChild(cartItem);
            });
            
            cartCount.innerText = carrinho.length;
            totalPrice.innerText = total.toLocaleString() + " Kz";
            totalFinal.innerText = total.toLocaleString() + " Kz";
        }
        
        function alterarQuantidade(index, delta) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            carrinho[index].qtd += delta;
            if (carrinho[index].qtd <= 0) carrinho.splice(index, 1);
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            carregarCarrinho();
        }
        
        function removerItem(index) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            carrinho.splice(index, 1);
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            carregarCarrinho();
        }
        
        document.addEventListener("DOMContentLoaded", carregarCarrinho);



        //

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

function calcularTotal() {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    let total = 0;

    // Calculando o total
    carrinho.forEach(item => {
        total += item.qtd * item.preco;
    });

    // Atualizando o total na interface
    document.getElementById('total-side').innerText = total.toLocaleString() + " Kz";
    document.getElementById('total-final-side').innerText = total.toLocaleString() + " Kz";
}

// Chamar a função para calcular o total sempre que o carrinho for atualizado
document.addEventListener("DOMContentLoaded", calcularTotal);



//
function preencherResumo() {
  const nome = document.getElementById("client-name").value;
  const email = document.getElementById("client-email").value;

  if (!nome || !email) {
    alert("Por favor, preencha todos os dados do cliente.");
    return;
  }

  // Preencher os campos de resumo (visual e escondidos)
  document.getElementById("summary-name-text").innerText = nome;
  document.getElementById("summary-name").value = nome;

  document.getElementById("summary-email-text").innerText = email;
  document.getElementById("summary-email").value = email;

  // Simular o carrinho (substitui isso pela tua lógica real)
  const carrinho = [
    { dominio: ".com", preco: "12.000 Kz" },
    { dominio: ".ao", preco: "18.000 Kz" }
  ];
  
  let html = "";
  carrinho.forEach(item => {
    html += `<p>${item.dominio} - <strong>${item.preco}</strong></p>`;
  });

  document.getElementById("summary-cart-display").innerHTML = html;
  document.getElementById("summary-cart").value = JSON.stringify(carrinho);

  // Avançar para a etapa 3
  nextStep();
}

function nextStep() {
  const steps = document.querySelectorAll(".step-content");
  const currentIndex = Array.from(steps).findIndex(s => !s.classList.contains("hidden"));

  if (currentIndex !== -1 && currentIndex < steps.length - 1) {
    steps[currentIndex].classList.add("hidden");
    steps[currentIndex + 1].classList.remove("hidden");

    // Mostrar ou esconder o total do pedido com base na etapa
    const totalContainer = document.getElementById("total-container");
    if (currentIndex + 1 === 0) {
      totalContainer.classList.remove("d-none");
    } else {
      totalContainer.classList.add("d-none");
    }
  }
}
    




    
</script>

</body>
</html>
