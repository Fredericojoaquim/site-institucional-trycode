<!DOCTYPE html>
<html lang="pt">
{{-- incluindo o head na home --}}
@include('home.partes.head')
@section('title', 'Sobre')

<style>

    .section-dominios{margin-top:120px; }
    
</style>

<body>
   
     {{-- incluindo o menu na home --}}
@include('home.partes.menu')

    

   

<!-- Seção Sobre Nós -->
<section class="pesquisa-dominio py-5 section-dominios">
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
                <a href="#" class="text-light">Lista de domínios</a> | 
                <a href="#" class="text-light">Transferência de domínio</a>
            </div>
        </div>
    </div>
</section>

<!-- Seção Missão, Visão e Valores -->
<section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-5 text-center fw-bold">Domínios Disponíveis</h2>
      <p class="fs-5 fw-medium">Verificou a disponibilidade do seu domínio? Agora clique na sua extensão preferida e registe seu dominio agora mesmo!</p>
     
      <div class="row g-4">
        @php
          $cores = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-dark'];
          $index = 0;
      @endphp
        <!-- .com -->
        @if(isset($dominios))

          @foreach($dominios as $d)

          <div class="col-md-4">
            <div class="card shadow h-100 border-0">
              <div class="card-header bg-dark text-white text-center fs-4 fw-semibold">

                {{$d->ltd}}
              </div>
              <div class="card-body text-center">
                <p class="card-text">{{$d->descricao}}</p>
                <h5 class="text-success fw-bold"> {{number_format($d->registro, 2, ',', '.')}} KZ/Anual</h5>
              </div>
              <div class="card-footer bg-transparent border-0 text-center">
                @php
                  $bg=$cores[$index % count($cores)];
                  $bg=str_replace('bg-', '',  $bg);
                @endphp
                <a href="https://trycode-angola.com/painel/cart.php?a=add&domain=register" class="btn btn-outline-dark w-75">Registar</a>
              </div>
            </div>
          </div>
          @php $index++; @endphp
            
          @endforeach
        @endif
        
  
        
      </div>
  
      <!-- Mensagem final -->
      <div class="text-center mt-5">
        <p class="fs-5 fw-medium">Ainda temos <strong>muitas extensões</strong> disponíveis para si. Fale connosco para saber mais!</p>
      </div>
  
    </div>
  </section>
  

  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="mb-5 text-center fw-bold">Por Que Registar um Domínio com a Trycode?</h2>
      <div class="row g-4">
  
        <!-- Motivo 1 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body">
              <div class="mb-3">
                <i class="bi bi-shield-lock fs-1 text-danger"></i>
              </div>
              <h5 class="card-title fw-semibold">Segurança Garantida</h5>
              <p class="card-text">Protegemos o seu domínio com tecnologia de ponta e suporte contínuo.</p>
            </div>
          </div>
        </div>
  
        <!-- Motivo 2 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body">
              <div class="mb-3">
                <i class="bi bi-lightning-charge fs-1 text-danger"></i>
              </div>
              <h5 class="card-title fw-semibold">Registo Rápido</h5>
              <p class="card-text">Registe o seu domínio em poucos minutos com um processo simples e eficiente.</p>
            </div>
          </div>
        </div>
  
        <!-- Motivo 3 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 text-center">
            <div class="card-body">
              <div class="mb-3">
                <i class="bi bi-headset fs-1 text-danger"></i>
              </div>
              <h5 class="card-title fw-semibold">Suporte Especializado</h5>
              <p class="card-text">A nossa equipa está sempre pronta para te ajudar em qualquer etapa do processo.</p>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  


 {{-- incluindo o footer na home --}}
@include('home.partes.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
