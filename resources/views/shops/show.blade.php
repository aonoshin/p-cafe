@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('shops.show', $shop))

@section('header-bg')
@if($shop->image == null)
<div class="header-bg" style="background-image:url('/storage/no-image-bg.jpg')">
    <div class="header-bg-text">
        <h1>{{$shop->name}}</h1>
        <h2>ー カフェ詳細 ー</h2>
    </div>
</div>
@else
<div class="header-bg" style="background-image:url('{{$shop->image}}')">
    <div class="header-bg-text">
        <h1>{{$shop->name}}</h1>
        <h2>ー カフェ詳細 ー</h2>
    </div>
</div>
@endif
@endsection

@section('main')
<div class="shops-show">
    <div class="shops-show-img">
        @if($shop->image == null)
            <img src="/storage/no-icon.png" alt="{{$shop->name}}">
        @else
            <img src="{{$shop->image}}" alt="{{$shop->name}}">
        @endif
    </div>
    @if(Auth::User())
    <div class="shops-show-like">
        <i class="fas fa-heart"></i>&nbsp;<span>{{$shop->likes->count()}}</span><br>
        @if($shop->is_liked_by_auth_user())
            <a onclick="return confirm('お気に入りを解除しますか？')" href="{{route('shops.unlike', ['id' => $shop->id])}}">お気に入り登録済み</a>
        @else
            <a href="{{route('shops.like', ['id' => $shop->id])}}">お気に入りに登録する</a>
        @endif
    </div>
    @endif
    <div class="shops-show-url">
        @if($shop->url == null)
            <a class="display-none" href="#">？</a>
        @else
            <a target="_blank" href="{{$shop->url}}">公式ホームページへ&nbsp;>></a>
        @endif
    </div>
    <ul class="shops-show-icon">
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
    <div class="shops-show-data">
        <p>フードの充実度</p>
        <ul>
            @foreach(range(1, $shop->cuisine) as $star)
                <li><i class="fas fa-star"></i></li>
            @endforeach
            @foreach(\Illuminate\Support\Collection::times(5 - $shop->cuisine) as $unstar)
                <li class="unstar"><i class="fas fa-star"></i></li>
            @endforeach
        </ul>
    </div>
    <div class="shops-show-data">
        <p>コーヒーへのこだわり</p>
        <ul>
            @foreach(range(1, $shop->coffee) as $star)
                <li><i class="fas fa-star"></i></li>
            @endforeach
            @foreach(\Illuminate\Support\Collection::times(5 - $shop->coffee) as $unstar)
                <li class="unstar"><i class="fas fa-star"></i></li>
            @endforeach
        </ul>
    </div>
    <div class="shops-show-data">
        <p>静かさ</p>
        <ul>
            @foreach(range(1, $shop->voice) as $star)
                <li><i class="fas fa-star"></i></li>
            @endforeach
            @foreach(\Illuminate\Support\Collection::times(5 - $shop->voice) as $unstar)
                <li class="unstar"><i class="fas fa-star"></i></li>
            @endforeach
        </ul>
    </div>
    <div class="shops-show-data">
        <p>席数</p>
        <ul>
            @foreach(range(1, $shop->capacity) as $star)
                <li><i class="fas fa-star"></i></li>
            @endforeach
            @foreach(\Illuminate\Support\Collection::times(5 - $shop->capacity) as $unstar)
                <li class="unstar"><i class="fas fa-star"></i></li>
            @endforeach
        </ul>
    </div>
    
    <div class="shops-show-table">
        <table>
            <tbody>
                <tr>
                    <th><p>住所</p></th>
                    <td>{{$shop->address}}</td>
                </tr>
                <tr>
                    <th><p>電話番号</p></th>
                    @if($shop->tel == null)
                        <td class="center">ー</td>
                    @else
                        <td><a class="under-link" href="tel:{{$shop->tel}}">{{$shop->tel}}</a></td>
                    @endif
                </tr>
                <tr>
                    <th><p>営業時間</p></th>
                    <td>{{substr($shop->start_time, 0, 5)}}&nbsp;〜&nbsp;{{substr($shop->end_time, 0, 5)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="shops-show-content">
        <p>{{$shop->content}}</p>
    </div>
    @if($shop->caution !== null)
        <div class="shops-show-caution">
            <h2>注意事項</h2>
            <p>{{$shop->caution}}</p>
        </div>
    @endif
</div>

<div class="shops-show-comments">
    <h2>ー口コミ<span>（{{$shop->comments->count()}}件）</span>ー</h2>
    @if(Auth::User())
    <div class="comments-create-btn">
        <a href="{{route('comments.create', ['shop' => $shop->id])}}">口コミを投稿する</a>
    </div>
    @endif
    <ul class="shops-show-comments-list">
        @forelse($comments as $comment)
            <li class="existence">
                <ul>
                    @if($comment->face === 0)
                        <li class="positive"><i class="far fa-grin-squint"></i>&nbsp;{{$comment->title}}</li>
                    @else
                        <li class="negative"><i class="far fa-frown"></i>&nbsp;{{$comment->title}}</li>
                    @endif
                    @if(Auth::User())
                        <li><p>{{$comment->content}}</p></li>
                    @else
                        <li><p class="comments-bg"><span>口コミはログイン後閲覧できます。</span></p></li>
                    @endif
                    <li>投稿日：{{$comment->created_at}}</li>
                </ul>
            </li>
        @empty
            <li class="empty">現在こちらのカフェの口コミはありません。</li>
        @endforelse
    </ul>
</div>
@endsection