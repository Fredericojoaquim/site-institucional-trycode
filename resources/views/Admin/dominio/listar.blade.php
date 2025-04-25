@extends('dashboard')
@section('title', 'Usuário-Perfil')

@section('content')

<div class="container">
    <div class="card">


        
        <h3 class="mb-4 text-center mt-4">Lista de Dominios</h3>


        <div class="table-responsive">
            <table class="table table-bordered  align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Extensão</th>
                        <th>Registro</th>
                        <th>Transferencia</th>
                        <th>Renovação</th>
                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de usuário -->
                    @if(isset($dominios))

                    @foreach($dominios as $d)
                    <tr>
                      
                            <td>{{$d->id}}</td>
                            <td>{{$d->ltd}}</td>
                            <td>{{$d->registro}}</td>
                            <td>{{$d->transferencia}}</td>
                            <td>{{$d->renovacao}}</td>
                            

                            <td>
                                <a href="{{"/admin/dominio/edit/$d->id"}}" class="btn btn-sm btn-primary">Editar</a>
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