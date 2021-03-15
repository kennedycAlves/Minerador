@extends('layout.app',["current" => "cadastrarclientes"])

@section('body')
    <form action="/clientes/cadastrar" method="POST">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group col-md-6">
            <label>CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj">
        </div>
        <div class="form-group col-md-4">
            <label>Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Área de interesse</label>
                <input type="text" class="form-control" name="nomeArea" id="nomeArea">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Key 1</label>
                <input type="text" class="form-control" name="key_1" id="key_1">
            </div>
        
            <div class="form-group col-md-2">
                 <label>Key 2</label>
                <input type="text" class="form-control" name="key_2" id="key_2">
            </div>
            <div class="form-group col-md-2">
                 <label>Key 3</label>
                 <input type="text" class="form-control" name="key_3" id="key_3">
            </div>
            <div class="form-group col-md-2w">
                <label> Key 4</label>
                <input type="text" class="form-control" name="key_4" id="key_4">
            </div>
            <div class="form-group col-md-2">
                <label> Key 5</label>
                <input type="text" class="form-control" name="key_5" id="key_5">
            </div>
        </div>
        
       
        <div class="form-row">
        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="cancel" class="btn btn-danger">Cancelar</button>
        </div>
        </div>
        <input type="hidden" id="perfil" name="perfil" value="usuario">
    </form>
 @if($errors->any())
        <div class="card-footer">
        @foreach($errors->all() as $erro)
            <div class="alert alert-danger" role="alert">
                {{ $erro }}
             </div>
         @endforeach
        </div>
            
        
 @endif
     

@endsection