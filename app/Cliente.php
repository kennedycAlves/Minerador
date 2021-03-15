<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    		
	function areaInteresse(){
        return $this->hasMany('App\Areainteresse');
    }
        
    function chaveBusca(){
        return $this->hasMany('App\Chavebusca');
    }

    function userCliente(){
        return $this->belongsTo('App\User');
    }

    function licitacao(){
        return $this->hasMany('App\Licitacoes');
    }
}
