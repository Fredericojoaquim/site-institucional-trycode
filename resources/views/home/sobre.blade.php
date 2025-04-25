<!DOCTYPE html>
<html lang="pt">
{{-- incluindo o head na home --}}
@include('home.partes.head')
@section('title', 'Sobre')

<style>

    .section-sobre{margin-top:180px; }
    
</style>

<body>
   
     {{-- incluindo o menu na home --}}
@include('home.partes.menu')

    

   

<!-- Seção Sobre Nós -->
<section class="container section-sobre ">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="text-primary">Sobre Nós</h2>
            <p class="text-muted">
                A Try Code é uma empresa especializada em desenvolvimento de websites, hospedagem e soluções digitais para negócios de todos os tamanhos. 
                Com uma equipe altamente qualificada, buscamos oferecer serviços de alta qualidade, garantindo a satisfação dos nossos clientes.
            </p>
            <p>
                Nossa missão é transformar ideias em soluções digitais inovadoras, proporcionando tecnologia acessível e eficiente para empresas e empreendedores.
            </p>
        </div>
        <div class="col-lg-6">
            <img src="{{'home/img/equipa.jpg'}}" alt="Equipe Try Code" class="img-fluid rounded shadow">
        </div>
    </div>
</section>

<!-- Seção Missão, Visão e Valores -->
<section class="container mt-5 mb-2">
    <h2 class="text-center text-primary mb-4">Missão, Visão e Valores</h2>
    <div class="row">
        <!-- Missão -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Missão</h5>
                    <p class="card-text text-muted">
                        Proporcionar soluções digitais inovadoras e acessíveis, ajudando empresas e empreendedores a expandirem sua presença online.
                    </p>
                </div>
            </div>
        </div>
        <!-- Visão -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Visão</h5>
                    <p class="card-text text-muted">
                        Ser referência no mercado digital, oferecendo serviços de alta qualidade e impulsionando o crescimento de negócios na era tecnológica.
                    </p>
                </div>
            </div>
        </div>
        <!-- Valores -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Valores</h5>
                    <p class="card-text text-muted">
                        Compromisso, inovação, qualidade e ética. Buscamos sempre oferecer soluções confiáveis, acessíveis e eficientes para nossos clientes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



 {{-- incluindo o footer na home --}}
@include('home.partes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
