<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = [
        'name', 'url',
    ];

    public function shops(){
        return $this->hasMany('App\Shop');
    }

    public function tema_shops(){
        return $this->hasMany('App\TemaShop');
    }
}
