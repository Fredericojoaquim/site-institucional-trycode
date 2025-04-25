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
        <h3 class="text-center mt-2">Registar Dominios</h3>
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

        <form action="{{ route('dominio.salvar') }}" method="post" id="form-registar" enctype="multipart/form-data">
            @csrf

            <div class="row m-2">

                <div class="form-group col-lg-6 col-md-6">
                    <label for="ltd" class="col-form-label">Dominio</label>
                    <input id="ltd" name="ltd" value="{{ old('ltd') }}" type="text" class="form-control">
                </div>
    
                <div class="form-group col-lg-6 col-md-6">
                    <label for="registro" class="col-form-label">Registro</label>
                    <input id="registro" name="registro" value="{{ old('registro') }}" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-6 col-md-6">
                    <label for="transferencia" class="col-form-label">Tranferencia</label>
                    <input id="transferencia" name="transferencia" value="{{ old('transferencia') }}" type="text" class="form-control">
                </div>
    
               

                <div class="form-group col-lg-6 col-md-6">
                    <label for="renovacao" class="col-form-label">Renovação</label>
                    <input id="renovacao" value="{{ old('renovacao') }}" name="renovacao" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <label for="descricao" class="col-form-label">Descrição</label>
                    <input id="descricao" value="{{ old('descricao') }}" name="descricao" type="text" class="form-control">
                </div>

                
    
               
               

                
            </div>
    
            <div class="text-right mb-4  mr-2">
                <button class="btn btn-success" id="btn-registar" type="submit">Registar</button>
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
            var ltd=document.getElementById("ltd");
            var registro=document.getElementById("registro");
            var transferencia=document.getElementById("transferencia");
            var renovacao=document.getElementById("renovacao");
           
            var erro= document.getElementById("erro-registar");

       
            if(ltd.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo dominio </strong>";
                erro.removeAttribute('hidden');
                ltd.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(registro.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo Registro </strong>";
                erro.removeAttribute('hidden');
                registro.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(transferencia.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo Transferencia </strong>";
                erro.removeAttribute('hidden');
                transferencia.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                
            }

           


            if(renovacao.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo renovação </strong>";
                erro.removeAttribute('hidden');
                renovacao.focus();
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
