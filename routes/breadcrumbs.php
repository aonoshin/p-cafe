<?php

// ホーム
Breadcrumbs::for('home', function($trail){
    $trail->push('ホーム', url('/'));
});

// カフェ
Breadcrumbs::for('shops.index', function($trail){
    $trail->parent('home');
    $trail->push('カフェ一覧', route('shops.index'));
});
Breadcrumbs::for('shops.area.index', function($trail, $area){
    $trail->parent('home');
    $trail->push('カフェ一覧', route('shops.index'));
    $trail->push($area->name . 'のカフェ', route('shops.area.index', ['area' => $area->url]));
});
Breadcrumbs::for('shops.show', function($trail, $shop){
    $trail->parent('home');
    $trail->push('カフェ一覧', route('shops.index'));
    $trail->push($shop->name, route('shops.show', ['shop' => $shop->id]));
});