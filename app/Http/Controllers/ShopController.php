<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Shop;
use App\Like;
use App\Area;
use App\Tema;
use App\Comment;
use App\TemaShop;

class ShopController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function index(){
        $shops = Shop::orderBy('updated_at', 'desc')->get();
        return view('shops.index', ['shopss' => $shops]);
    }

    public function show(Shop $shop){
        $comments = Comment::where('shop_id', $shop->id)->orderBy('created_at', 'desc')->get();
        return view('shops.show', ['shop' => $shop, 'comments' => $comments]);
    }

    public function like($id){
        Like::create([
            'shop_id' => $id,
            'user_id' => Auth::id(),
        ]);
        session()->flash('flash-message', 'いいねをしました！');
        return redirect()->back();
    }

    public function unlike($id){
        $like = Like::where('shop_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        session()->flash('flash-message', 'いいねを取り消しました！');
        return redirect()->back();
    }

    public function shopCreatedIndex(){
        return view('shops.created.index');
    }

    public function shopUpdatedIndex(){
        return view('shops.updated.index');
    }

    public function shopAreaIndex($area){
        $area = Area::where('url', $area)->first();
        $shops = Shop::where('area_id', $area->id)->orderBy('created_at', 'desc')->get();
        return view('shops.area.index', ['shops' => $shops, 'area' => $area]);
    }

    public function shopTemaIndex($tema){
        $shops = Shop::whereHas('temas', function($query) use ($tema){
            return $query->where('temas.url', $tema);
        })->orderBy('created_at', 'desc')->get();
        return view('shops.tema.index', ['shops' => $shops, 'tema' => $tema]);
    }

    public function shopFavoriteIndex(Shop $shop, Like $like){
        $shops = Shop::whereHas('likes', function($query) {
            $query->where('user_id', Auth::id());
        })->orderBy('created_at', 'desc')->get();
        return view('shops.favorite.index', ['shops' => $shops]);
    }

    public function shopRankIndex(){
        $shops = Shop::withCount('likes')->orderBy('likes_count', 'desc')->paginate(3);
        return view('shops.rank.index', ['shops' => $shops]);
    }
}
