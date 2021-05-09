<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\TemaRequest;
use App\Http\Requests\ShopRequest;
use App\User;
use App\Shop;
use App\Area;
use App\Tema;
use App\Comment;
use Storage;

class AdminController extends Controller
{
    public function top(){
        return view('admin.top');
    }

    public function users(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', ['users' => $users]);
    }

    public function areaIndex(){
        $areas = Area::orderBy('created_at', 'desc')->get();
        return view('admin.areas.index', ['areas' => $areas]);
    }

    public function areaCreate(Area $area){
        return view('admin.areas.create', ['area' => $area]);
    }

    public function areaStore(AreaRequest $request, Area $area){
        $area = new Area();
        $area->name = $request->name;
        $area->url = $request->url;
        if($area->image = $request->image){
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('p-cafe/areas', $image, 'public');
            $area->image = Storage::disk('s3')->url($path);
        }
        $area->save();
        session()->flash('登録が完了しました！');
        return redirect()->route('admin.areas.index');
    }

    public function areaEdit(Area $area){
        return view('admin.areas.edit', ['area' => $area]);
    }

    public function areaUpdate(AreaRequest $request, Area $area){
        $area->name = $request->name;
        $area->url = $request->url;
        if($area->image = $request->image){
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('p-cafe/areas', $image, 'public');
            $area->image = Storage::disk('s3')->url($path);
        }
        $area->save();
        session()->flash('更新が完了しました！');
        return redirect(route('admin.areas.index'));
    }

    public function areaDelete(Request $request){
        Area::find($request->id)->delete();
        session()->flash('flash-message', '削除が完了しました！');
        return redirect('admin/areas');
    }

    public function temaIndex(){
        $temas = Tema::orderBy('created_at', 'desc')->get();
        return view('admin.temas.index', ['temas' => $temas]);
    }

    public function temaCreate(Tema $tema){
        return view('admin.temas.create', ['tema' => $tema]);
    }

    public function temaStore(TemaRequest $request, Tema $tema){
        $tema = new Tema();
        $tema->name = $request->name;
        $tema->url = $request->url;
        $tema->save();
        session()->flash('登録が完了しました！');
        return redirect()->route('admin.temas.index');
    }

    public function temaEdit(Tema $tema){
        return view('admin.temas.edit', ['tema' => $tema]);
    }

    public function temaUpdate(TemaRequest $request, Tema $tema){
        $tema->name = $request->name;
        $tema->url = $request->url;
        $tema->save();
        session()->flash('更新が完了しました！');
        return redirect(route('admin.temas.index'));
    }

    public function temaDelete(Request $request){
        Tema::find($request->id)->delete();
        session()->flash('flash-message', '削除が完了しました！');
        return redirect('admin/temas');
    }

    public function commentIndex(Comment $comment){
        $comments = Comment::orderBy('updated_at', 'desc')->get();
        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function shopIndex(){
        $shops = Shop::orderBy('updated_at', 'desc')->get();
        return view('admin.shops.index', ['shops' => $shops]);
    }

    public function shopShow(Shop $shop){
        return view('admin.shops.show', ['shop' => $shop]);
    }

    public function shopCreate(Shop $shop, Tema $tema){
        $areas = Area::all();
        $temas = Tema::all();
        return view('admin.shops.create', ['shop' => $shop, 'areas' => $areas, 'temas' => $temas]);
    }

    public function shopStore(ShopRequest $request, Shop $shop){
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->start_time = $request->start_time;
        $shop->end_time = $request->end_time;
        $shop->tel = $request->tel;
        $shop->url = $request->url;
        $shop->caution = $request->caution;
        $shop->content = $request->content;
        $shop->wifi = $request->wifi;
        $shop->outlet = $request->outlet;
        $shop->credit = $request->credit;
        $shop->smoke = $request->smoke;
        $shop->pet = $request->pet;
        $shop->liquor = $request->liquor;
        $shop->coffee = $request->coffee;
        $shop->voice = $request->voice;
        $shop->capacity = $request->capacity;
        $shop->cuisine = $request->cuisine;
        $shop->area_id = $request->area_id;
        $shop->user_id = $request->user()->id;
        if($shop->image = $request->image){
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('p-cafe/shops', $image, 'public');
            $shop->image = Storage::disk('s3')->url($path);
        }
        $shop->save();
        $shop->temas()->sync($request->tema_id);

        session()->flash('flash-message', '登録が完了しました！');
        return redirect(route('admin.shops.show', ['shop' => $shop->id]));
    }

    public function shopEdit(Shop $shop){
        $areas = Area::all();
        return view('admin.shops.edit', ['shop' => $shop, 'areas' => $areas]);
    }

    public function shopUpdate(ShopRequest $request, Shop $shop){
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->start_time = $request->start_time;
        $shop->end_time = $request->end_time;
        $shop->tel = $request->tel;
        $shop->url = $request->url;
        $shop->caution = $request->caution;
        $shop->content = $request->content;
        $shop->wifi = $request->wifi;
        $shop->outlet = $request->outlet;
        $shop->credit = $request->credit;
        $shop->smoke = $request->smoke;
        $shop->pet = $request->pet;
        $shop->liquor = $request->liquor;
        $shop->coffee = $request->coffee;
        $shop->voice = $request->voice;
        $shop->capacity = $request->capacity;
        $shop->cuisine = $request->cuisine;
        $shop->area_id = $request->area_id;
        $shop->user_id = $request->user()->id;
        if($shop->image = $request->image){
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('p-cafe/shops', $image, 'public');
            $shop->image = Storage::disk('s3')->url($path);
        }
        $shop->save();
        $shop->temas()->sync($request->tema_id);
        session()->flash('flash-message', '更新が完了しました！');
        return redirect(route('admin.shops.show', ['shop' => $shop->id]));
    }

    public function shopDelete(Request $request){
        Shop::find($request->id)->delete();
        session()->flash('flash-message', '削除が完了しました！');
        return redirect(route('admin.shops.index'));
    }
}
