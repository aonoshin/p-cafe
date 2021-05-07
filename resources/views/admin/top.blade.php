@extends('layouts.admin')

@section('admin-title', '管理画面トップ')

@section('main')
<div class="admin-box-top">
    <ul>
        <li><a href="{{route('admin.users')}}">ユーザー一覧</a></li>
        <li><a href="{{route('admin.shops.index')}}">カフェ一覧</a></li>
        <li><a href="{{route('admin.areas.index')}}">エリア一覧</a></li>
        <li><a href="{{route('admin.temas.index')}}">テーマ一覧</a></li>
        <li><a href="#">コメント一覧</a></li>
        <li><a href="{{route('home')}}"><i class="fas fa-undo-alt"></i>トップに戻る</a></li>
    </ul>
</div>
@endsection