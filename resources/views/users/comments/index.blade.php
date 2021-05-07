@extends('layouts.index')

@section('header-bg')
<div class="header-bg" style="background-image:url('/storage/no-icon.png')">
    <div class="header-bg-text">
        <h1>投稿した口コミ一覧</h1>
        <h2>ー COMMENTS ー</h2>
    </div>
</div>
@endsection

@section('main')
<div class="users-show-comments">
    <ul class="users-show-comments-detail">
        @forelse($comments as $comment)
            <li class="existence">
                <ul>
                @if($comment->face === 0)
                    <li class="positive"><i class="far fa-grin-squint"></i>&nbsp;{{$comment->title}}</li>
                @else
                    <li class="negative"><i class="far fa-frown"></i>&nbsp;{{$comment->title}}</li>
                @endif
                    <li><p class="content">{{$comment->content}}</p></li>
                    <li>
                        <span>投稿日：{{$comment->created_at}}</span>
                        <span>最終更新日：{{$comment->updated_at}}</span>
                        <span><a href="{{route('comments.edit', ['shop' => $comment->shop_id, 'comment' => $comment->id])}}">編集</a></span>
                        <span>
                            <form method="post" action="{{route('comments.delete', ['id' => $comment->id])}}">
                                @csrf
                                <input type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
                            </form>
                        </span>
                    </li>
                </ul>
            </li>
        @empty
            <li class="empty">投稿した口コミはありません。</li>
        @endforelse
    </ul>
</div>
@endsection