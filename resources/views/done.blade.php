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

    @if (Auth::check())
    <!-- ドロワーメニュー/ログイン時 -->
    <nav class="drower-menu--detail" id="nav">
      <ul class="drower-menu-nav">
        <li class="drower-menu-item"><a href="/">Home</a></li>
        <li class="drower-menu-item">
          <!-- ログアウト -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
              Logout
            </x-dropdown-link>
          </form>
        </li>
        <li class="drower-menu-item"><a href="/mypage">Mypage</a></li>
      </ul>
    </nav>
    @else
    <!-- ドロワーメニュー/ログアウト時 -->
    <nav class="drower-menu--detail" id="nav">
      <ul class="drower-menu-nav">
        <li class="drower-menu-item"><a href="/">Home</a></li>
        <li class="drower-menu-item"><a href="/register">Registration</a></li>
        <li class="drower-menu-item"><a href="/login">Login</a></li>
      </ul>
    </nav>
    @endif

    <h1 class="header-ttl" id="ttl">Rese</h1>
  </header>
  <section class="done-wrapper">
    <h2 class="done-text">ご予約ありがとうございます</h2>
    <!-- mypageリンク設定 -->
    <a href="/" class="done-btn">戻る</a>
  </section>


  <script src="{{ mix('js/main.js') }}"></script>
</body>

</html>