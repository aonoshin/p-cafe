@extends('layouts.admin')

@section('admin-title', 'カフェ一覧')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
    <li><a href="{{route('admin.shops.create')}}">カフェ登録</a></li>
</ul>
<div class="admin-box-shops-index">
    @forelse($shops as $shop)
        <div class="admin-shops-list">
            @if($shop->image == null)
                <img src="/storage/no-icon.png">
            @else
                <img src="{{$shop->image}}">
            @endif
            <ul>
                <li><a href="{{route('admin.shops.show', ['shop' => $shop->id])}}">詳細を見る</a></li>
                <li>{{$shop->name}}</li>
                <li>エリア：{{$shop->area->name}}</li>
                <li>登録日：{{$shop->created_at}}</li>
                <li>更新日：{{$shop->updated_at}}</li>
                <li>
                    <form method="post" action="{{route('admin.shops.delete', ['id' => $shop->id])}}">
                    @csrf
                        <input type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
                    </form>
                </li>
            </ul>
        </div>
    @empty
        <div class="admin-shops-list-empty">
            <p>登録されているカフェはありません。</p>
        </div>
    @endforelse
</div>
@endsection