@extends('layouts.appuser', ["current" => "clientes"])



@section('body')



<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Licitações mineradas com base nas chaves de buscas configuradas</h5>
        @if(isset($clts))
            <table class="table table-ordered table-hover ml-3">
                <thead>
                    <tr>    
                        
                        <th>Área de interesse</th>
                        <th>Órgão Licitante</th>
                        <th>Tipo de edital</th>
                        <th>Edital</th>
                        <th>UASG</th>
                        <th>Objeto</th>
                        <th>Abertura</th>
                        <th>Entrega</th>
                        <th>Link de acesso</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($clts as $key => $listaCltslicitacao)                                        
                    <tr>
                        
                         
                         <td>{{ $listaCltslicitacao->nome_interesse }}</td>
                         <td>{{ $listaCltslicitacao->orgao }}</td>
                         <td>{{ $listaCltslicitacao->tipo_edital }}</td>
                         <td>{{ $listaCltslicitacao->edital }}</td>
                         <td>{{ $listaCltslicitacao->uasg }}</td>
                         <td></td>
                         <td>{{ $listaCltslicitacao->data_abertura }}</td>
                         <td>{{ $listaCltslicitacao->entrega }}</td>
                         <td><a href="{{ $listaCltslicitacao->link }}" type="button" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Acessar</a></td>
                         
                    </tr>      
                    
                   
                    @endforeach 
                </tbody>
            </table>
        @endif
            
      
    </div>

   
     
     
</div>
            
       

@endsection

@section('js')
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
    
        <script type="text/javascript">
              $(function(){
                $('[data-toggle="popover"]').popover()
              })
        </script>

@endsection


