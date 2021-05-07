<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”robots” content=”noindex”>
    <title>PCafe ー管理画面ー</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="/js/main.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/css/reset.css">
</head>

<body>
    <div class="admin">
        <div class="admin-header">
            <h2><i class="fas fa-mug-hot"></i>@yield('admin-title')<i class="fas fa-mug-hot"></i></h2>
        </div>
        <div class="admin-box">
            @yield('main')
        </div>
    </div>
</body>

</html>