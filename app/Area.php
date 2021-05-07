<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name', 'url', 'image',
    ];

    public function shops(){
        return $this->hasMany('App\Shop');
    }
}
