@extends('layouts.app')

@section('main')
<div class="login">
    <h2 class="title-login"><i class="fas fa-mug-hot"></i>ログイン</h2>
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <ul>
                <li><label for="name">ユーザー名</label><span class="caution">※15文字以内</span></li>
                <li>
                    <input type="text" class="login-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </li>
            </ul>
            <ul>
                <li><label for="password">パスワード</label></li>
                <li>
                    <input type="password" class="login-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </li>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" name="remember" class="login-radio" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">次回から自動入力にする</label>
                </li>
            </ul>
            <div class="login-submit">
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
    <ul class="back-top">
        @if (Route::has('password.request'))
            <li><a class="btn btn-link" href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a></li>
        @endif
        <li><a href="{{route('home')}}">トップに戻る</a></li>
    </ul>
</div>
@endsection
