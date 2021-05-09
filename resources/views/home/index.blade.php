@extends('layouts.index')

@section('header-bg')
<div class="header-bg" style="background-image:url('/storage/{{$headerBgs}}.jpg')">
    <div class="header-bg-text">
        <h1>PCafe</h1>
        <h2>ー 快適にパソコン作業ができるカフェライブラリ ー</h2>
    </div>
</div>
@endsection

@section('main')
<div class="home-shops-rank">
    <h2>人気のカフェ3選</h2>
    <div class="shops-list">
        @foreach($rankShops as $rankShop)
            <a href="{{route('shops.show', ['shop' => $rankShop->id])}}">
                <p class="shop-list-name">{{$rankShop->name}}</p>
                @if($rankShop->image == null)
                    <img src="/storage/no-icon.png">
                @else
                    <img src="{{$rankShop->image}}">
                @endif
                <p class="shop-list-area">{{$rankShop->area->name}}</p>
                <ul class="shop-list-icon">
                    @if($rankShop->wifi === 0)
                        <li><i class="fas fa-wifi"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-wifi"></i></li>
                    @endif
                    @if($rankShop->outlet === 0)
                        <li><i class="fas fa-battery-full"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-battery-full"></i></li>
                    @endif
                    @if($rankShop->credit === 0)
                        <li><i class="far fa-credit-card"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-credit-card"></i></li>
                    @endif
                    @if($rankShop->smoke === 0)
                        <li><i class="fas fa-smoking-ban"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-smoking-ban"></i></li>
                    @endif
                    @if($rankShop->pet === 0)
                        <li><i class="fas fa-dog"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-dog"></i></li>
                    @endif
                    @if($rankShop->liquor === 0)
                        <li><i class="fas fa-glass-martini-alt"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-glass-martini-alt"></i></li>
                    @endif
                </ul>
                <ul class="shop-list-like">
                    <li><i class="fas fa-heart"></i>&nbsp;{{$rankShop->likes->count()}}</li>
                    <li><i class="fas fa-comment"></i>&nbsp;{{$rankShop->comments->count()}}</li>
                </ul>
            </a>
        @endforeach
    </div>
</div>

<div class="home-shops-rank">
    <h2>最近登録されたカフェ3選</h2>
    <div class="shops-list">
        @foreach($createShops as $createShop)
            <a href="{{route('shops.show', ['shop' => $createShop->id])}}">
                <p class="shop-list-name">{{$createShop->name}}</p>
                @if($createShop->image == null)
                    <img src="/storage/no-icon.png">
                @else
                    <img src="{{$createShop->image}}">
                @endif
                <p class="shop-list-area">{{$createShop->area->name}}</p>
                <ul class="shop-list-icon">
                    @if($createShop->wifi === 0)
                        <li><i class="fas fa-wifi"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-wifi"></i></li>
                    @endif
                    @if($createShop->outlet === 0)
                        <li><i class="fas fa-battery-full"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-battery-full"></i></li>
                    @endif
                    @if($createShop->credit === 0)
                        <li><i class="far fa-credit-card"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-credit-card"></i></li>
                    @endif
                    @if($createShop->smoke === 0)
                        <li><i class="fas fa-smoking-ban"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-smoking-ban"></i></li>
                    @endif
                    @if($createShop->pet === 0)
                        <li><i class="fas fa-dog"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-dog"></i></li>
                    @endif
                    @if($createShop->liquor === 0)
                        <li><i class="fas fa-glass-martini-alt"></i></li>
                    @else
                        <li class="no-existence"><i class="fas fa-glass-martini-alt"></i></li>
                    @endif
                </ul>
            </a>
        @endforeach
    </div>
</div>
@endsection