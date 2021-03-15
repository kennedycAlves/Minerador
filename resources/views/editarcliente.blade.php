@extends('layout.app',["current" => "cadastrarclientes"])

@section('body')
    <form action="/clientes/{{ $clts->id }}" method="POST">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $clts->nome }}">
        </div>
        <div class="form-group col-md-6">
            <label>CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $clts->CNPJ }}">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
            <label>Key 1</label>
            <input type="text" class="form-control" name="key_1" id="key_1" value="{{ $clts->key_1 }}">
        </div>
        <div class="form-group col-md-2">
            <label>Key 2</label>
            <input type="text" class="form-control" name="key_2" id="key_2" value="{{ $clts->key_2 }}">
        </div>
        <div class="form-group col-md-2">
            <label>Key 3</label>
            <input type="text" class="form-control" name="key_3" id="key_3" value="{{ $clts->key_3 }}">
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label> Key 4</label>
                <input type="text" class="form-control" name="key_4" id="key_4" value="{{ $clts->key_4 }}">
            </div>
            <div class="form-group col-md-2">
                <label> Key 5</label>
                <input type="text" class="form-control" name="key_5" id="key_5" value="{{ $clts->key_5 }}">
            </div>
       
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="cancel" class="btn btn-danger">Cancelar</button>
    </form>
@endsection