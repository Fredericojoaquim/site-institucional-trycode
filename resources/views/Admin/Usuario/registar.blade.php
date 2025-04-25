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
        <h3 class="text-center mt-2">Registar Usuário</h3>
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

        <form action="{{ route('usuario.salvar') }}" method="post" id="form-registar" enctype="multipart/form-data">
            @csrf

            <div class="row m-2">

                <div class="form-group col-lg-6 col-md-6">
                    <label for="nome" class="col-form-label">Nome</label>
                    <input id="nome" name="name" value="{{ old('nome') }}" type="text" class="form-control">
                </div>
    
                <div class="form-group col-lg-6 col-md-6">
                    <label for="email" class="col-form-label">Email</label>
                    <input id="email" name="email" value="{{ old('email') }}" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-6 col-md-6">
                    <label for="user-select">Permissão</label>
                    <div class="custom-select-wrapper">
                        <select id="tipo"  name="perfil" class="custom-select">
                            <option value="" disabled selected>Escolha uma opção...</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option> 
                        </select>
                    </div>
                </div>
    
               

                <div class="form-group col-lg-6 col-md-6">
                    <label for="telefone" class="col-form-label">Telefone</label>
                    <input id="telefone" value="{{ old('telefone') }}" name="telefone" type="text" class="form-control">
                </div>

                <div class="form-group col-lg-6 col-md-6">
                    <label for="password" class="col-form-label">Senha</label>
                    <input id="password" value="{{ old('password') }}" name="password" type="password" class="form-control">
                </div>
    
                <div class="form-group col-lg-6 col-md-6">
                    <label for="conf_password" class="col-form-label">Confirmar Senha</label>
                    <input id="conf_password" value="{{ old('conf_password') }}" name="conf_password" type="password" class="form-control">
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
            var nome=document.getElementById("nome");
            var email=document.getElementById("email");
            var telefone=document.getElementById("telefone");
            var tipo=document.getElementById("tipo");
            var password=document.getElementById("password");
            var conf_password=document.getElementById("conf_password");
            var erro= document.getElementById("erro-registar");

       
            if(nome.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo Nome </strong>";
                erro.removeAttribute('hidden');
                nome.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(email.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo email </strong>";
                erro.removeAttribute('hidden');
                email.focus();
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

           


            if(telefone.value == ''){
                erro.innerHTML="<strong>Por favor preencha o campo telefone </strong>";
                erro.removeAttribute('hidden');
                telefone.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }


           
            
            if(password.value == ''){
                erro.innerHTML="<strong>Por favor digite uma senha </strong>";
                erro.removeAttribute('hidden');
                password.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
               
            }

            if(conf_password.value == ''){
                erro.innerHTML="<strong>Por favor confirma a senha no campo confirmar senha </strong>";
                erro.removeAttribute('hidden');
                conf_password.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                formregistar.submit();
            }

          //  
    });

     });



    $('#profilePhoto').on('change', function(event) {
        var fileName = event.target.files.length ? event.target.files[0].name : 'Nenhum arquivo selecionado';
        $('#profileFileName').text(fileName);
    });

    // Atualiza o nome do arquivo da foto de capa
    $('#coverPhoto').on('change', function(event) {
        var fileName = event.target.files.length ? event.target.files[0].name : 'Nenhum arquivo selecionado';
        $('#coverFileName').text(fileName);
    });


    


</script>
@endsection
