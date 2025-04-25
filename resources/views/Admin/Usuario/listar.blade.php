@extends('dashboard')
@section('title', 'Usuário-Perfil')

@section('content')

<div class="container">
    <div class="card">


        
        <h3 class="mb-4 text-center">Lista de Usuários</h3>


        <div class="table-responsive">
            <table class="table table-bordered  align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Perfil</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de usuário -->
                    @if(isset($users))

                    @foreach($users as $u)
                    <tr>
                      
                            <td>{{$u->codigo}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->telefone}}</td>
                            <td>{{$u->perfil}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Editar</a>
                                <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                                
                          
                        
                       
                    </tr>
                    @endforeach
                                
                     
                            
                    @endif
                
                </tbody>
            </table>
        </div>




    </div>
</div>




@endsection