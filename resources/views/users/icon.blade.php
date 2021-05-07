@extends('layouts.index')

@section('header-bg')
<div class="header-bg" style="background-image:url('/storage/no-icon.png')">
    <div class="header-bg-text">
        <h1>アイコン変更</h1>
        <h2>ー {{$user->name}} ー</h2>
    </div>
</div>
@endsection

@section('main')
<div class="users-edit">
    <form method="POST" action="{{route('users.icon-update', ['user' => $user->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="users-edit-icon">
            <input type="file" name="icon" value="{{old('icon', $user->icon)}}">
        </div>
        <div class="users-edit-btn">
            <ul>
                <li><input type="submit" value="更新する" onclick="return confirm('更新してもよろしいですか？')"></li>
                <li><a href="{{route('users.show', ['user' => $user->id])}}">プロフィール詳細に戻る</a></li>
            </ul>
        </div>
    </form>
</div>
@endsection