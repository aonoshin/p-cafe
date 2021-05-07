@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('shops.area.index', $area))

@section('header-bg')
@if($area->image == null)
<div class="header-bg" style="background-image:url('/storage/no-icon.png')">
    <div class="header-bg-text">
        <h1>カフェ一覧</h1>
        <h2>ー @ {{$area->name}} ー</h2>
    </div>
</div>
@else
<div class="header-bg" style="background-image:url('{{$area->image}}')">
    <div class="header-bg-text">
        <h1>カフェ一覧</h1>
        <h2>ー @ {{$area->name}} ー</h2>
    </div>
</div>
@endif
@endsection

@section('main')
<div class="shops-index">
    @forelse($shops as $shop)
        <a href="{{route('shops.show', ['shop' => $shop->id])}}" class="shops-list">
            <p class="shop-list-name">{{$shop->name}}</p>
            @if($shop->image == null)
                <img src="/storage/no-icon.png">
            @else
                <img src="{{$shop->image}}">
            @endif
            <p class="shop-list-area">{{$shop->area->name}}</p>
            <ul class="shop-list-icon">
            @if($shop->wifi === 0)
                <li><i class="fas fa-wifi"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-wifi"></i></li>
            @endif
            @if($shop->outlet === 0)
                <li><i class="fas fa-battery-full"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-battery-full"></i></li>
            @endif
            @if($shop->credit === 0)
                <li><i class="far fa-credit-card"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-credit-card"></i></li>
            @endif
            @if($shop->smoke === 0)
                <li><i class="fas fa-smoking-ban"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-smoking-ban"></i></li>
            @endif
            @if($shop->pet === 0)
                <li><i class="fas fa-dog"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-dog"></i></li>
            @endif
            @if($shop->liquor === 0)
                <li><i class="fas fa-glass-martini-alt"></i></li>
            @else
                <li class="no-existence"><i class="fas fa-glass-martini-alt"></i></li>
            @endif
            </ul>
            <ul class="shop-list-like">
                <li><i class="fas fa-heart"></i>&nbsp;{{$shop->likes->count()}}</li>
                <li><i class="fas fa-comment"></i>&nbsp;{{$shop->comments->count()}}</li>
            </ul>
        </a>
    @empty
        <div class="admin-shops-list-empty">
            <p>登録されているカフェはありません。</p>
        </div>
    @endforelse
</div>
@endsection