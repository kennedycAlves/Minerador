@extends('layout.app', ["current"  => "home"])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5<div class="card-title">Cadastro de Clientes:</h5>
                        <a href="/cadastrarclientes" class="btn btn-primary">Cadastro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

    
@endsection