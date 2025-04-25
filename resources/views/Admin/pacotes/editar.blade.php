@extends('dashboard')
@section('title', 'Usuário-Perfil')

@section('content')
<style>

.file-upload-wrapper {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            margin: auto;
            border: 2px dashed #6c757d;
            border-radius: 8px;
            text-align: center;
            padding: 20px;
            transition: border-color 0.3s ease;
        }
        .file-upload-wrapper:hover {
            border-color: #007bff;
        }
        .file-upload-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .file-upload-label {
            font-weight: bold;
            color: #6c757d;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .file-upload-wrapper:hover .file-upload-label {
            color: #007bff;
        }
        .file-name {
            font-size: 0.9rem;
            color: #333;
            margin-top: 10px;
        }

        .custom-select {
        position: relative;
        width: 100%;
    }

    select {
        appearance: none;
        width: 100%;
        padding: 12px;
        padding-right: 40px;
        border: 2px solid #4CAF50;
        border-radius: 8px;
        background-color: white;
        color: #333;
        font-size: 16px;
        cursor: pointer;
        transition: border-color 0.3s;
    }

    select:hover, select:focus {
        border-color: #3e8e41;
        outline: none;
    }

    /* Ícone de seta personalizado */
    .custom-select::after {
        content: '▼';
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        pointer-events: none;
        color: #4CAF50;
        font-size: 14px;
    }

    /* Opcional: remove a seta padrão no Firefox */
    select:-moz-focusring {
        color: transparent;
        text-shadow: 0 0 0 #000;
    }

</style>


<div class="container">
    <div class="card">
        <h3 class="text-center mt-2">Alterar Pacote</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if(session('success'))
        <div class="alert alert-success alert-st-one" role="alert">
            <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
            <p class="message-mg-rt"><strong>Well done!</strong>  {{ session('success') }}</p>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-mg-b alert-st-four mb-2" role="alert" id="erro-registar">
            <i class="fa fa-window-close edu-danger-error admin-check-pro"></i>
            <i class="fa fa-times edu-danger-error admin-check-pro"></i>
            <p> {{ session('error') }}</p>
        </div>
        @endif
        
        <div class="alert alert-danger alert-mg-b alert-st-four mb-2" role="alert" id="erro-registar" hidden>
            <i class="fa fa-window-close edu-danger-error admin-check-pro"></i>
            <i class="fa fa-times edu-danger-error admin-check-pro"></i>
        </div>

        <form action="{{ route('pacote.alterar') }}" method="post" id="form-registar" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="row m-2">

                @if(isset($pacote))

                <div class="form-group col-lg-6 col-md-6">
                    <label for="nomePacote" class="col-form-label">Nome Pacote</label>
                    <input id="nomePacote" name="nomePacote" value="{{$pacote->nomepacote }}" type="text" class="form-control">
                </div>
    
                <div class="form-group col-lg-6 col-md-6">
                    <label for="armazenamento" class="col-form-label">Armazenamento</label>
                    <input id="armazenamento" name="armazenamento" value="{{$pacote->armazenamento }}" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-6 col-md-6">
                    <label for="qtdSite" class="col-form-label">Qtd Sites</label>
                    <input id="qtdSite" name="qtdSite" value="{{$pacote->qtdSite }}" type="text" class="form-control">
                </div>
    
               

                <div class="form-group col-lg-6 col-md-6">
                    <label for="numContaEmail" class="col-form-label">Contas de Email</label>
                    <input id="numContaEmail" value="{{ $pacote->qtdemail }}" name="numContaEmail" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-6 col-md-6">
                    <label for="user-select">SSL</label>
                    <div class="custom-select-wrapper">
                        <select id="tipoSSL"  name="tipoSSL" class="custom-select">
                            <option value="" disabled selected>Escolha uma opção...</option>
                            <option value="Gratuíto">Gratuíto</option>
                            <option value="Pago">Pago</option> 
                        </select>
                    </div>
                </div>
    
                <div class="form-group col-lg-6 col-md-6">
                    <label for="user-select">Tipo de suporte</label>
                    <div class="custom-select-wrapper">
                        <select id="tipo"  name="tipoSuporte" class="custom-select">
                            <option value="" disabled selected>Escolha uma opção...</option>
                            <option value="Dedicado">Dedicado</option>
                            <option value="VIP">VIP</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label for="QtdBd" class="col-form-label">QTD BD</label>
                    <input id="QtdBd" value="{{$pacote->qtdbd }}" name="QtdBd" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-6 col-md-6">
                    <label for="preco" class="col-form-label">Preço</label>
                    <input id="preco" value="{{ $pacote->preco }}" name="preco" type="text" class="form-control">
                    <input id="pacote_id" value="{{ $pacote->id }}" name="pacote_id" type="hidden" class="form-control">
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <label for="url" class="col-form-label">ULR</label>
                    <input id="url" value="{{ $pacote->URL}}" name="url" type="text" class="form-control">
                </div>

                @endif
            </div>
    
            <div class="text-right mb-4  mr-2">
                <button class="btn btn-success" id="btn-registar" type="submit">Alterar</button>
            </div> 
        
        
        </form> 
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{url('assets/js/provinciasMunicipio.js')}}"></script>
<script>
    $(document).ready(function(){
    btn_registar=document.getElementById("btn-registar");
    btn_registar.addEventListener('click', (event)=>{

            event.preventDefault();

            var formregistar=document.getElementById("form-registar");
            var nome=document.getElementById("nomePacote");
            var armazenamento=document.getElementById("armazenamento");
            var qtdSite=document.getElementById("qtdSite");
            var tipo=document.getElementById("tipo");
            var numContaEmail=document.getElementById("numContaEmail");
            var QtdBd=document.getElementById("QtdBd");
            var erro= document.getElementById("erro-registar");

       
            if(nome.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo Nome </strong>";
                erro.removeAttribute('hidden');
                nome.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(armazenamento.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo armazenamento </strong>";
                erro.removeAttribute('hidden');
                armazenamento.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(tipo.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo Tipo </strong>";
                erro.removeAttribute('hidden');
                tipo.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                
            }

           


            if(qtdSite.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo qtdSite </strong>";
                erro.removeAttribute('hidden');
                qtdSite.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }


           
            
            if(numContaEmail.value == ''){
                erro.innerHTML="<strong>Por favor digite o numero de contas de email </strong>";
                erro.removeAttribute('hidden');
                numContaEmail.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(QtdBd.value == ''){
                erro.innerHTML="<strong>Por favor digite a Qtd de BD </strong>";
                erro.removeAttribute('hidden');
                QtdBd.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(preco.value == ''){
                erro.innerHTML="<strong>Por favor digite o Preço do Pacote </strong>";
                erro.removeAttribute('hidden');
                preco.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                
                formregistar.submit();
               
            }

           
                
               
            

          //  
    });

     });



    


    


</script>
@endsection
