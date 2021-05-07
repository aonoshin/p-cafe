@extends('layouts.app')

@section('main')
<h2 class="title-login">ログイン</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="name">ユーザー名</label>
    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="password">パスワード</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label for="remember">次回から自動入力にする</label>
        
    <button type="submit" class="btn btn-primary">ログイン</button>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
    @endif
</form>
@endsection
