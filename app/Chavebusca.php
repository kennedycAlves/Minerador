<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chavebusca extends Model
{
    function clienteChave(){
        return $this->belongsTo('App\Cliente');
    }

    function clienteChaveArea(){
        return $this->belongsTo('App\Areainteresse');
    }
}
