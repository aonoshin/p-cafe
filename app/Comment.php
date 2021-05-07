<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title', 'content', 'face', 'user_id', 'shop_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function shop(){
        return $this->belongsTo('App\Shop');
    }
}
