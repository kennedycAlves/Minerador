<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licitacoes extends Model
{
    function clienteLicitacao(){
        return $this->belongsTo('App\Cliente');
    }
}
