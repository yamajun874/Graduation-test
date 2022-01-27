<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/reset.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>

<body>
    <header class="header">
        <div class="header-logo" id="menu">
            <span class="line-top"></span>
            <span class="line-middle"></span>
            <span class="line-bottom"></span>
        </div>

        <!-- ドロワーメニュー -->
        <nav class="drower-menu" id="nav">
            <ul class="drower-menu-nav">
                <li class="drower-menu-item"><a href="/">Home</a></li>
                <li class="drower-menu-item"><a href="/register">Registration</a></li>
                <li class="drower-menu-item"><a href="/login">Login</a></li>
            </ul>
        </nav>

        <h1 class="header-ttl" id="ttl">Rese</h1>
    </header>

    <section class="login-wrapper">
        <h2 class="login-ttl">Login</h2>
        <form method="POST" action="/login" class="login-form">
            @csrf
            <div class="email">
                <input id="mail" type="email" placeholder="Email" name="email" value="{{old('email')}}">
            </div>
            @error('email')
            <p class="error-text">{{$message}}</p>
            @enderror
            <div class="password">
                <input type="password" placeholder="Password" name="password" autocomplete="new-password">
            </div>
            @error('password')
            <p class="error-text">{{$message}}</p>
            @enderror
            <div class="button-flex">
                <button class="login-btn--page">ログイン</button>
            </div>
        </form>
    </section>
    <script src="{{ mix('js/main.js') }}"></script>
</body>

</html>