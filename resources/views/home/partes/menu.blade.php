<header class="fixed-top">
    <!-- Top Header -->
    <div class="cor-azul-tema text-white py-2 px-4 d-flex justify-content-between">
        <div>
            <span>📞 947 042 925 - 📧 geral@trycode-angola.com</span>
        </div>

        <div class="d-flex align-items-center position-relative">
            <!-- Ícone do Carrinho -->
            <a href="#" class="text-white me-3 position-relative" id="cartDropdown" data-bs-toggle="dropdown">
                <i class="bi bi-cart3 fs-4"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">0</span>
            </a>
            
            <!-- Dropdown do Carrinho -->
            <div class="dropdown-menu dropdown-menu-end p-3 shadow-lg border-0 rounded-3" aria-labelledby="cartDropdown" style="min-width: 320px;">
                <h6 class="dropdown-header text-center fw-bold text-dark">🛒 Meu Carrinho</h6>
                <div class="cart-items-container" style="max-height: 250px; overflow-y: auto;">
                    <ul class="list-unstyled mb-2" id="cartItems">
                        <!-- Itens do carrinho -->
                    </ul>
                </div>
                <hr class="my-2">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-dark">Total: <span id="cartTotal">00 Kz</span></span>
                   
                    <a class="btn btn-success btn-sm px-4 rounded-pill" id="checkoutBtn" href="{{url('/Carrinho')}}">Finalizar Compra</a>
                </div>
            </div>
           

        
            <!-- Ícone do Usuário -->
            <div class="dropdown">
                <a href="#" class="text-white dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user fa-lg"></i>
                </a>
              
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <!-- Aqui podes adicionar mais opções, tipo:
                  <li><a class="dropdown-item" href="/register">Registrar</a></li>
                  -->
                </ul>
            </div>

        </div>   
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark shadow-sm  ">
        <div class="container">
            <a class="navbar-brand" href="#"> <img class="img-logo" src="{{asset('home/img/logo.png')}}" alt="Try Code" height="40"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="{{url('/')}}">Início</a></li>
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="{{url('/sobre')}}">Sobre Nós</a></li>
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="{{url('/dominios')}}">Domínio</a></li>
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="#">Hospedagem</a></li>
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="{{url('/servicos')}}">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="https://trycode-angola.com/painel/store/email-corporativo">Email</a></li>
                    <li class="nav-item"><a class="nav-link text-white custom-hover" href="{{url('/contacto')}}">Contactos</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>