@extends('layouts.app')

@section('main')
<div class="register">
    <h2 class="title-register"><i class="fas fa-mug-hot"></i>新規登録</h2>
    <div class="register-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <ul>
                <li><label for="name">ユーザー名</label><span class="caution">※15文字以内</span></li>
                <li>
                    <input type="text" class="register-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </li>
            </ul>
            <ul>
                <li><label for="gender">性別</label></li>
                <li>
                    <input type="radio" class="register-radio @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus value=0>女性
                    <input type="radio" class="register-radio @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus value=1>男性
                    <input type="radio" class="register-radio @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus value=2>その他
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </li>
            </ul>
            <ul>
                <li><label for="email">メールアドレス</label></li>
                <li>
                    <input type="email" class="register-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </li>
            </ul>
            <ul>
                <li><label for="password">パスワード</label></li>
                <li>
                    <input type="password" class="register-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </li>
            </ul>
            <ul>
                <li><label for="password-confirm">パスワード（確認）</label></li>
                <li>
                    <input class="register-input" type="password" name="password_confirmation" required autocomplete="new-password">
                </li>
            </ul>
            <div class="register-submit">
                <button type="submit" onclick="return confirm('登録してもよろしいですか？')">新規登録</button>
            </div>
        </form>
    </div>
    <p class="back-top">
        <a href="{{route('home')}}">トップに戻る</a>
    </p>
</div>
@endsection
