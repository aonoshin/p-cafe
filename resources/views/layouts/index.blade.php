<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name=”robots” content=”noindex”>
  <title>PCafe</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <script src="/js/main.js"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="/css/reset.css">
</head>

<body>

<!-- アクション成功時のフラッシュメッセージ -->
@if('flash_message')
<div class="flash-message">
  <p>{{session('flash_message')}}</p>
</div>
@endif

<!-- モーダルやサイドバー出現時のグレー背景 -->
<div class="mask-bg"></div>

<div class="side-bar">
  <ul>
    <li id="close"><i class="fas fa-times"></i></li>
    <li class="main-tema">ーエリアから探すー
      <ul class="sub-tema">
        @foreach($areas as $area)
          <li><a href="{{route('shops.area.index', ['area' => $area->url])}}">{{$area->name}}</a></li>
        @endforeach
      </ul>
    </li>
    <li class="main-tema">ーテーマから探すー
      <ul class="sub-tema">
        @foreach($temas as $tema)
          <li><a href="">{{$tema->name}}</a></li>
        @endforeach
      </ul>
    </li>
    <li class="main-tema"><a href="{{route('shops.created.index')}}">最近登録されたカフェ</a></li>
    <li class="main-tema"><a href="{{route('shops.updated.index')}}">最近更新されたカフェ</a></li>
    <li class="main-tema"><a href="{{route('shops.favorite.index')}}">お気に入りカフェ</a></li>
    <li class="main-tema"><a href="{{route('shops.rank.index')}}">人気のカフェトップ10</a></li>
  </ul>
</div>

<header>
  <a id="logo" href="{{route('home')}}"><i class="fas fa-mug-hot"></i></a>
  <ul>
    @guest
      <li><a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i>ログイン</a></li>
      @if(Route::has('register'))
        <li><a href="{{route('register')}}"><i class="fas fa-user-plus"></i>新規登録</a></li>
      @endif
    @else
      @can('admin')
        <li>ログイン中：<a href="{{route('users.show', ['user' => Auth::User()])}}">{{Auth::User()->name}}（管理者）</a></li>
      @else
        <li>ログイン中：<a href="{{route('users.show', ['user' => Auth::User()])}}">{{Auth::User()->name}}</a></li>
      @endcan
      <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        @can('admin')
          <li><a href="{{route('admin.top')}}">管理画面</a></li>
        @endcan
      </li>
    @endguest
  </ul>
</header>

@yield('breadcrumbs')

<div class="header-bg">
@yield('header-bg')
</div>

<main>
  <nav>
    <ul>
      <li><i id="open" class="fas fa-bars"></i></li>
      <li><a href="{{route('home')}}">TOP</a></li>
      <li><a href="{{route('shops.index')}}">カフェ一覧</a></li>
      <!-- ↓ログイン後表示 -->
      @if(Auth::User())
        <li><a href="/users/{{Auth::User()->id}}">マイページ</a></li>
      @endif
      <li><a href="#">当サービスについて</a></li>
      <li><a href="{{route('contacts.create')}}">お問い合わせ</a></li>
    </ul>
  </nav>
  @yield('main')
</main>

<!-- <footer id="footer">
  <div class="footer-text">
    <h2><a href="{{route('home')}}"><i class="fas fa-mug-hot"></i>PCafe</a></h2>
    <ul>
      <li>© 2021 PCafe All Rights Reserved</li>
      <li><a target="_blank" href="#">プライバシーポリシー</a></li>
      <li><a href="{{route('contacts.create')}}">お問い合わせ</a></li>
    </ul>
  </div>
</footer> -->

</body>

</html>