<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //permite fazer a adição em massa
    protected $fillable = [
        "descricao", "preco", "cor", "peso", "marca_id"
    ];

    //faz o relacionamento 1 para 1
    public function marca(){
        return $this->belongsTo('App\Marca', 'marca_id');
    }
}
