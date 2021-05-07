@extends('layouts.index')

@section('header-bg')
<div class="header-bg" style="background-image:url('/storage/no-icon.png')">
    <div class="header-bg-text">
        <h1>ユーザー詳細</h1>
        <h2>ー {{$user->name}} ー</h2>
    </div>
</div>
@endsection

@section('main')
<div class="users-edit">
    <form method="POST" action="{{route('users.update', ['user' => $user->id])}}">
        @csrf
        @method('PUT')
        <div class="users-edit-table">
            <table>
                <tbody>
                    <tr>
                        <th>名前&nbsp;<span>※必須＆15文字以内</span></th>
                        <td>
                            <input class="width-100" type="text" name="name" value="{{old('name', $user->name)}}" autofocus>
                            @if($errors->has('name'))
                                <span class="error">{{$errors->first('name')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス&nbsp;<span>※必須</span></th>
                        <td>
                            <input class="width-100" type="email" name="email" value="{{old('email', $user->email)}}">
                            @if($errors->has('email'))
                                <span class="error">{{$errors->first('email')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td>
                            <input class="width-100" type="text" inputmode="numeric" pattern="\d*" name="age" value="{{old('age', $user->age)}}">
                            @if($errors->has('age'))
                                <span class="error">{{$errors->first('age')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>性別&nbsp;<span>※必須</span></th>
                        <td>
                            <input type="radio" name="gender" value="0" @if(old('gender', $user->gender) == 0) checked @endif>女性
                            <input type="radio" name="gender" value="1" @if(old('gender', $user->gender) == 1) checked @endif>男性
                            <input type="radio" name="gender" value="2" @if(old('gender', $user->gender) == 2) checked @endif>その他
                            @if($errors->has('gender'))
                                <span class="error">{{$errors->first('gender')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <td>
                            <input class="width-100" type="text" name="url" value="{{old('url', $user->url)}}">
                            @if($errors->has('url'))
                                <span class="error">{{$errors->first('url')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Twitterアカウント</th>
                        <td>
                            <input class="width-100" type="text" name="twitter" value="{{old('twitter', $user->twitter)}}">
                            @if($errors->has('twitter'))
                                <span class="error">{{$errors->first('twitter')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>FaceBookアカウント</th>
                        <td>
                            <input class="width-100" type="text" name="facebook" value="{{old('facebook', $user->facebook)}}">
                            @if($errors->has('facebook'))
                                <span class="error">{{$errors->first('facebook')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Instagramアカウント</th>
                        <td>
                            <input class="width-100" type="text" name="instagram" value="{{old('instagram', $user->instagram)}}">
                            @if($errors->has('instagram'))
                                <span class="error">{{$errors->first('instagram')}}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="users-edit-content-title">自己紹介&nbsp;<span>※300文字以内</span></div>
        <div class="users-edit-content">
            <p><textarea name="content">{{old('content', $user->content)}}</textarea></p>
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