
<!DOCTYPE html>
<html lang="pt">

    @include('home.partes.head')
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Trycode-Contactos</title>

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

    .section-contacto{margin-top:180px;}
    
    </style>

<body>

{{-- incluindo o menu na home --}}
 @include('home.partes.menu')


<!-- Seção Contatos -->
<section class="container section-contacto">
    <h2 class="text-center text-primary mb-4">Entre em Contato</h2>
    <div class="row">
        <!-- Localização -->
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Localização</h5>
                    <p class="card-text text-muted">
                        Luanda-Angola- Benfica/Casa S/N Zona Verde
                    </p>
                </div>
            </div>
        </div>
        <!-- Telefones -->
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-phone fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Telefone</h5>
                    <p class="card-text text-muted">
                        +244 947 042 925 <br>
                        +244 956 006 534
                    </p>
                </div>
            </div>
        </div>
        <!-- WhatsApp -->
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fab fa-whatsapp fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">WhatsApp</h5>
                    <p class="card-text text-muted">
                        <a href="https://wa.me/244900000000" class="text-decoration-none text-dark" target="_blank">
                            +244 947042925
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- E-mail -->
        <div class="col-md-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">E-mail</h5>
                    <p class="card-text text-muted">
                        <a href="mailto:contato@empresa.com" class="text-decoration-none text-dark">
                            geral@trycode-angola.com
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção Formulário de Contato -->
<section class="container mt-5 ">
    <h2 class="text-center text-primary mb-4">Envie-nos uma Mensagem</h2>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 p-4">
                <div class="card-body">
                  
                    <form action="{{route('contact.send')}}" method="POST">
                        @csrf
                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="name" required>
                        </div>
                        <!-- E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <!-- Telefone -->
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone">
                        </div>
                        <!-- Mensagem -->
                        <div class="mb-3">
                            <label for="mensagem" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
                        </div>
                        <!-- Botão de Envio -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



    


 {{-- incluindo o footer na home --}}

 @include('home.partes.footer')
    <!--JQUERY JS -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script para mostrar as mensagens -->
<script>
    
     @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>

</body>
</html>
