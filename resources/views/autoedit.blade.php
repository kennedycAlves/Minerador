@extends('layouts.appuser',["current" => "cadastrarclientes"])
{{ $contArea = 0 }}
{{ $contChave = 0 }}
@section('body')
    <form action="/autoedit/save{{ $clts->id }}" method="POST">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $clts->nome }}">
        </div>
        <div class="form-group col-md-6">
            <label>CNPJ:</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $clts->cnpj }}">
        </div>
        <div class="form-group col-md-3">
            
            
            @foreach($clts->areaInteresse as $key1 => $listaCltsArea)
            <input type="hidden" id="idChave" name="idChave" value="{{ $listaCltsArea->id }}">
                
                        <div class="jumbotron bg-light border border-secondary">
                            <div class="row">
                                <div class="card-deck">
                                    <div class="card border border-primary">
                                        <div class="card-body">
                                            <label>Área Interesse:{{$listaCltsArea->id }}</label>
                                            <input type="text" class="form-control" name="nome_interesse{{$key1}}" id="nome_interesse{{$key1}}" value="{{ $listaCltsArea->nome_interesse }}">
                                            <label>Chaves de Buscas:</label> 
                                             @foreach($listaCltsArea->chaveBuscaArea as $key => $listaCltsAreaChaves)
                            
                                                    <input type="text" class="form-control" name="nome_chave{{$key}}" id="nome_chave{{$key}}" value="{{ $listaCltsAreaChaves->nome_chave }}">  
                                                                  
                                             @endforeach
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    
                                
            @endforeach
            
        </div>
        </div>
        <input type="hidden" id="contArea" name="contArea" value="{{ $key1 }}">
        <input type="hidden" id="contChave" name="contChave" value="{{ $contChave }}">
        <input type="hidden" id="contChave" name="contChave" value="{{ $contChave }}">
        
        
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="cancel" class="btn btn-danger">Cancelar</button>
    </form>
@endsection