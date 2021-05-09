<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $rankShops = Shop::withCount('likes')->orderBy('likes_count', 'desc')->paginate(3);
        $createShops = Shop::orderBy('created_at', 'desc')->paginate(3);
        return view('home.index', ['rankShops' => $rankShops, 'createShops' => $createShops]);
    }
}
