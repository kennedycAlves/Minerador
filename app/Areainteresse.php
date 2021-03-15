<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areainteresse extends Model
{
    function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    function chaveBuscaArea(){
        return $this->hasMany('App\Chavebusca');
    }
}
