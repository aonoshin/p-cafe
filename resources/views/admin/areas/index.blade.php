@extends('layouts.admin')

@section('admin-title', 'エリア一覧')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
    <li><a href="{{route('admin.areas.create')}}">エリア登録</a></li>
</ul>
<div class="admin-box-form-index">
    @forelse($areas as $area)
        <div class="admin-form-list">
            @if($area->image == null)
                <img src="/storage/no-icon.png">
            @else
                <img src="{{$area->image}}">
            @endif
            <ul>
                <li><a href="{{route('admin.areas.edit', ['area' => $area->id])}}">編集する</a></li>
                <li>エリア名：{{$area->name}}</li>
                <li>エリアURL：{{$area->url}}</li>
                <li>登録日：{{$area->created_at}}</li>
                <li>更新日：{{$area->updated_at}}</li>
                <li>
                    <form method="post" action="{{route('admin.areas.delete', ['id' => $area->id])}}">
                    @csrf
                        <input type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
                    </form>
                </li>
            </ul>
        </div>
    @empty
        <div class="admin-form-list-empty">
            <p>登録されているエリアはありません。</p>
        </div>
    @endforelse
</div>
@endsection