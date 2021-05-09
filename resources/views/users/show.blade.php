@extends('layouts.index')

@section('header-bg')
@if($user->icon == null)
<div class="header-bg" style="background-image:url('/storage/no-icon.png')">
    <div class="header-bg-text">
        <h1>ユーザー情報</h1>
        <h2>ー {{$user->name}} ー</h2>
    </div>
</div>
@else
<div class="header-bg" style="background-image:url('{{$user->icon}}')">
    <div class="header-bg-text">
        <h1>ユーザー情報</h1>
        <h2>ー {{$user->name}} ー</h2>
    </div>
</div>
@endif
@endsection

@section('main')
<div class="users-show">
    <div class="users-show-img">
        @if($user->icon == null)
            <img src="/storage/no-icon.png" alt="{{$user->name}}">
        @else
            <img src="{{$user->icon}}" alt="{{$user->name}}">
        @endif
        @if(Auth::User())
            <p><a href="{{route('users.icon', ['user' => $user->id])}}">アイコンを変更する</a></p>
        @endif
    </div>
    <div class="users-show-table">
        <table>
            <tbody>
                <tr>
                    <th>名前</th><td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>年齢</th><td>{{$user->age}}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    @if($user->gender === 0)
                        <td>女性</td>
                    @elseif($user->gender === 1)
                        <td>男性</td>
                    @else
                        <td>その他</td>
                    @endif
                </tr>
                <tr>
                    <th>HP</th><td><a target="_blank" href="{{$user->url}}">{{$user->url}}</a></td>
                </tr>
                <tr>
                    <th>登録日</th><td>{{$user->created_at->format('Y-m-d')}}</td>
                </tr>
                <tr>
                    <th>最終更新日</th><td>{{$user->updated_at->format('Y-m-d')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <ul class="users-show-sns">
        @if($user->twitter == null)
            <li><i style="opacity:0.2" class="fab fa-twitter"></i></li>
        @else
            <li><a target="_blank" href="{{$user->twitter}}"><i style="color:#1DA1F2" class="fab fa-twitter"></i></a></li>
        @endif
        @if($user->facebook == null)
            <li><i style="opacity:0.2" class="fab fa-facebook-f"></i></li>
        @else
            <li><a target="_blank" href="{{$user->facebook}}"><i style="color:#1877f2" class="fab fa-facebook-f"></i></a></li>
        @endif
        @if($user->instagram == null)
            <li><i style="opacity:0.2" class="fab fa-instagram"></i></li>
        @else
            <li><a target="_blank" href="{{$user->instagram}}"><i style="color:#CF2E92" class="fab fa-instagram"></i></a></li>
        @endif
    </ul>
    <div class="users-show-content">
        @if($user->content == null)
            <p style="text-align:center">ー</p>
        @else
            <p>{{$user->content}}</p>
        @endif
    </div>
    @if(Auth::User()->id === $user->id || Auth::User()->id === 1)
        <div class="users-show-btn">
            <ul>
                <li><a href="{{route('users.edit', ['user' => $user->id])}}">編集</a></li>
                <li>
                    <form method="post" action="{{route('users.delete', ['id' => $user->id])}}">
                        @csrf
                        <input type="submit" value="退会" onclick="return confirm('本当に退会してもよろしいですか？')">
                    </form>
                </li>
                <li><a href="{{route('shops.favorite.index')}}">お気に入り登録カフェ一覧</a></li>
                <li><a href="{{route('users.comments', ['user' => $user->id])}}">投稿した口コミ一覧</a></li>
            </ul>
        </div>
    @endif
</div>
@endsection