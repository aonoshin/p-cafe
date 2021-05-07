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
<p>ホームです!</p>
<p>お知らせ</p>
@endsection