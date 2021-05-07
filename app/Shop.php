<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'address',
        'start_time',
        'end_time',
        'tel',
        'url',
        'caution',
        'image',
        'content',
        'wifi',
        'outlet',
        'credit',
        'smoke',
        'pet',
        'requor',
        'coffee',
        'voice',
        'capacity',
        'cuisine',
        'user_id',
        'area_id',
        'tema_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function area(){
        return $this->belongsTo('App\Area');
    }

    public function tema(){
        return $this->belongsTo('App\Tema');
    }

    public function likes(){
        return $this->hasMany('App\Like', 'shop_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function tema_shops(){
        return $this->hasMany('App\TemaShop');
    }

    /**
     * ShopにLikeがついているかの判別
     * 
     * @return bool true:Likeがついている false:Likeがついていない
     */

    public function is_liked_by_auth_user(){
        $id = Auth::id();
        $likers = [];
        foreach($this->likes as $like){
            array_push($likers, $like->user_id);
        }
        if(in_array($id, $likers)){
            return true;
        } else {
            return false;
        }
    }
}