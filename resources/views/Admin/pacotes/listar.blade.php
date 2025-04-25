@extends('dashboard')
@section('title', 'Usuário-Perfil')

@section('content')

<div class="container">
    <div class="card">


        
        <h3 class="mb-4 text-center mt-4">Lista de Pacotes</h3>


        <div class="table-responsive">
            <table class="table table-bordered  align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Armazenamento</th>
                        <th>Qtd Site</th>
                        <th>Qtd BD</th>
                        <th>Tipo Suporte</th>
                        <th>Tipo SSL</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de usuário -->
                    @if(isset($pacotes))

                    @foreach($pacotes as $p)
                    <tr>
                      
                            <td>{{$p->id}}</td>
                            <td>{{$p->nomepacote}}</td>
                            <td>{{$p->armazenamento}}</td>
                            <td>{{$p->qtdSite}}</td>
                            <td>{{$p->qtdbd}}</td>
                            <td>{{$p->tipo_suporte}}</td>
                            <td>{{$p->tipossl}}</td>
                            <td>{{$p->preco}}</td>

                            <td>
                                <a href="{{"/admin/pacote/editar/$p->id"}}" class="btn btn-sm btn-primary">Editar</a>
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