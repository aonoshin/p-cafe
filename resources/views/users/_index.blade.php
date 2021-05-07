@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('header-bg')
<div class="header-bg" style="background-image:url('/storage/no-icon.png')">
    <div class="header-bg-text">
        <h1>ユーザー一覧</h1>
        <h2>ー USERS ー</h2>
    </div>
</div>
@endsection

@section('main')
<div class="users-index">
    @foreach($users as $user)
        <a href="{{route('users.show', ['user' => $user->id])}}">
            @if($user->icon == null)
                <img src="/storage/no-icon.png">
            @else
                <img src="{{$user->icon}}">
            @endif
            <ul>
                <li>ユーザー名：{{$user->name}}</li>
                <li>年齢：{{$user->age}}</li>
                <li>性別：{{$user->gender}}</li>
                <li>利用開始日：{{$user->created_at->format('Y-m-d')}}</li>
            </ul>
        </a>
    @endforeach
</div>
@endsection