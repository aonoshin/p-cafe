@extends('layouts.admin')

@section('admin-title', 'コメント一覧')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
</ul>
<div class="admin-box-form-comments">
    @forelse($comments as $comment)
        <div class="admin-form-list">
            <ul>
            @if($comment->face === 0)
                <li class="positive"><i class="far fa-grin-squint"></i>&nbsp;{{$comment->title}}</li>
            @else
                <li class="negative"><i class="far fa-frown"></i>&nbsp;{{$comment->title}}</li>
            @endif
                <li><p class="content">{{$comment->content}}</p></li>
                <li>
                    <span>投稿日：{{$comment->created_at}}</span>&nbsp;&nbsp;
                    <span>最終更新日：{{$comment->updated_at}}</span>
                </li>
                <li>
                    <span>投稿者：<a href="{{route('users.show', ['user' => $comment->user_id])}}">{{$comment->user->name}}</a></span>&nbsp;&nbsp;
                    <span>投稿対象のカフェ：<a href="{{route('shops.show', ['shop' => $comment->shop_id])}}">{{$comment->shop->name}}</a></span>
                </li>
                <li>
                    <span><a href="#">編集</a></span>
                    <span>
                        <form method="post" action="#">
                        @csrf
                            <input type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
                        </form>
                    </span>
                </li>
            </ul>
        </div>
    @empty
        <div class="admin-form-list-empty">
            <p>投稿された口コミはありません。</p>
        </div>
    @endforelse
</div>
@endsection