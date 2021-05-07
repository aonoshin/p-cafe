<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemaShop extends Model
{
    protected $fillabe = [
        'tema_id', 'shop_id',
    ];

    public function tema(){
        return $this->belongsTo('App\Tema');
    }

    public function shop(){
        return $this->belongsTo('App\Shop');
    }
}
