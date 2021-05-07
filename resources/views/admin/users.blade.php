@extends('layouts.admin')

@section('admin-title', 'ユーザー一覧')

@section('main')
<ul class="back-admin-top">
    <li><a href="{{route('admin.top')}}">管理画面トップへ</a></li>
</ul>
<div class="admin-box-users">
    @foreach($users as $user)
        <div class="admin-users-detail">
            @if($user->icon == null)
                <img src="/storage/no-icon.png">
            @else
                <img src="{{$user->icon}}">
            @endif
            <ul>
                <li><a href="{{route('users.show', ['user' => $user->id])}}">詳細を見る</a></li>
                @if($user->id === 1)
                    <li style="color:#f00">ID：{{$user->id}}（管理人）</li>
                @else
                    <li>ID：{{$user->id}}</li>
                @endif
                <li>ユーザー名：{{$user->name}}</li>
                <li>年齢：{{$user->age}}</li>
                @if($user->gender === 0)
                    <li>性別：女性</li>
                @elseif($user->gender === 1)
                    <li>性別：男性</li>
                @else
                    <li>性別：その他</li>
                @endif
                <li>利用開始日：{{$user->created_at->format('Y-m-d')}}</li>
                <li>最終更新日：{{$user->updated_at->format('Y-m-d')}}</li>
                <li>
                    <form method="post" action="{{route('users.delete', ['id' => $user->id])}}">
                        @csrf
                        <input type="submit" value="退会させる" onclick="return confirm('本当に退会させてもよろしいですか？')">
                    </form>
                </li>
            </ul>
        </div>
    @endforeach
</div>
@endsection