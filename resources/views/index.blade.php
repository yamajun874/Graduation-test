<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ mix('css/reset.css') }}">
  <link rel="stylesheet" href="{{ mix('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <header class="header--index">

    <div class="header-item--left">
      <div class="header-logo" id="menu">
        <span class="line-top"></span>
        <span class="line-middle"></span>
        <span class="line-bottom"></span>
      </div>

      @if (Auth::check())
      <!-- ドロワーメニュー/ログイン時 -->
      <nav class="drower-menu--index" id="nav">
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
      <nav class="drower-menu--index" id="nav">
        <ul class="drower-menu-nav">
          <li class="drower-menu-item"><a href="/">Home</a></li>
          <li class="drower-menu-item"><a href="/register">Registration</a></li>
          <li class="drower-menu-item"><a href="/login">Login</a></li>
        </ul>
      </nav>
      @endif

      <h1 class="header-ttl" id="ttl">Rese</h1>
    </div>

    <!-- 検索欄 -->
    <form method="GET" action="/search" class="serch-form" id="search">
      @csrf
      <div class="area-item">
        <select name="areaName" class="select--area">
          <option value="" hidden>All area</option>
          <option value="">All area</option>
          <option value="1" @if(old('areaName')=="1" ) selected @endif>東京都</option>
          <option value="2" @if(old('areaName')=="2" ) selected @endif>大阪府</option>
          <option value="3" @if(old('areaName')=="3" ) selected @endif>福岡県</option>
        </select>
      </div>
      <div class="genre-item">
        <select name="genreName" class="select--genre">
          <option value="" hidden>All genre</option>
          <option value="">All genre</option>
          <option value="1" @if(old('genreName')=="1" ) selected @endif>寿司</option>
          <option value="2" @if(old('genreName')=="2" ) selected @endif>焼肉</option>
          <option value="3" @if(old('genreName')=="3" ) selected @endif>居酒屋</option>
          <option value="4" @if(old('genreName')=="4" ) selected @endif>ラーメン</option>
          <option value="5" @if(old('genreName')=="5" ) selected @endif>イタリアン</option>
        </select>
      </div>
      <div class="shop-name">
        <input type="text" name="shopName" placeholder="Search ...">
      </div>
      <button class="search-btn">検索</button>
    </form>
  </header>


  @if (Auth::check())
  ログインしています。
  @else
  ログインしていません。
  @endif

  <!-- 検索結果表示欄 -->
  @if(isset($items))

  <section class="shop-card-wrapper">
    @foreach($items as $item)
    <div class="card">
      <div class="card-img">
        <img src="{{$item->image_url}}" alt="">
      </div>
      <div class="card-text">
        <h2 class="text-ttl">{{$item->name}}</h2>
        <div class="text-tag">
          <p class="area-tag">
            @if ($item->areas != null)
            #{{$item->areas->name}}
            @endif
          </p>
          <p class="genre-tag">
            @if ($item->genres != null)
            #{{$item->genres->name}}
            @endif
          </p>
        </div>
        <div class="text-bottom">
          <!-- aタグのリンク先にshopsのidを持たせる -->
          <a href="/detail/{{$item->id}}" class="detail-btn">詳しくみる</a>
          <!-- いいね機能実装 -->
          <div>
            @if($item->is_liked_by_auth_user())
            <a href="unlike/{{$item->id}}"><i class="fas fa-heart likes-btn"></i></a>
            @else
            <a href="like/{{$item->id}}"><i class="fas fa-heart unlikes-btn"></i></a>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </section>

  @endif

  <script src="{{ mix('js/main.js') }}"></script>
</body>

</html>