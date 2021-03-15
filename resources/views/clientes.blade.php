@extends('layout.app', ["current" => "clientes"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista de Clientes</h5>
        @if(count($clts) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>    
                        <th>Ações</th>
                        <th>Código</th>
                        <th>Inserção</th>
                        <th>Modificação</th>
                        <th>Cliente</th>
                        <th>CNPJ</th>
                        <th>Área de Interesse</th>
                        <th>Chaves de busca</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($clts as $listaClts)
                                          
                        <tr>
                             <td>                                                                                              
                                <a href="/clientes/editar/{{ $listaClts->id }}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/clientes/apagar/{{ $listaClts->id }}" class="btn btn-sm btn-danger">Apagar</a>
                             </td>
                             <td>{{ $listaClts->id }}</td>
                             <td>{{ $listaClts->created_at }}</td>
                             <td>{{ $listaClts->updated_at }}</td>
                             <td>{{ $listaClts->nome }}</td>
                             <td>{{ $listaClts->cnpj }}</td>
                            
                             @foreach($listaClts->areaInteresse as $listaCltsArea)
                                    <td>{{ $listaCltsArea->nome_interesse }}</td>
                                    @foreach($listaCltsArea->chaveBuscaArea as $listaCltsAreaChaves)
                                        <td>{{ $listaCltsAreaChaves->nome_chave }}</td>      
                                                                      
                                    @endforeach
                                    
                             @endforeach
                            
                            
                   
                           
                        </tr>
                    @endforeach        
                    
                </tbody>
            </table>
        @endif
    </div>
    <div class="card-footer">
        <a href="/cadastrarclientes" class="btn btn-sm btn-primary" role="button">Criar novo Cliente</a>
</div>

@endsection