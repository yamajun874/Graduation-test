<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <nav class="drower-menu" id="nav">
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
    <nav class="drower-menu" id="nav">
      <ul class="drower-menu-nav">
        <li class="drower-menu-item"><a href="/">Home</a></li>
        <li class="drower-menu-item"><a href="/register">Registration</a></li>
        <li class="drower-menu-item"><a href="/login">Login</a></li>
      </ul>
    </nav>
    @endif


    <h1 class="header-ttl" id="ttl">Rese</h1>
  </header>

  <section class="mypage-flex">

    <div class="reservation-wrapper--mypage">
      <h2 class="reservation-ttl--mypage">予約状況</h2>
      <!-- 予約情報繰り返し -->
      @if(isset($reservations))
      @foreach($reservations as $reservation)
      <div class="reservation-item--mypage">
        <div class="reservation-header--flex">
          <p class="reservation-item--ttl">予約</p>
          <div class="reservation-btn-wrapper">
            <!-- 更新ボタン -->
            <button class="reservation-update-icon" form="reservation-delete" formaction="/reserve/update" onclick="return confirm('予約情報を変更しますか ?')"></button>
            <!-- 削除ボタン -->
            <button class="reservation-delete-icon" form="reservation-delete" onclick="return confirm('予約情報を削除しますか ?')">×</button>
          </div>
        </div>

        <form method="POST" action="/reserve/delete" id="reservation-delete">
          <input type="hidden" value="{{$reservation->id}}" name="id">
          @csrf
          <table class="mypage-table">
            <tr>
              <td>Shop</td>
              <td>{{$reservation->shops->name}}</td>
            </tr>
            <tr>
              <td>Date</td>
              <td>
                <input type="date" value="{{$reservation['reservation_datetime']->format('Y-m-d')}}" name="date">
              </td>
            </tr>
            <tr>
              <td>Time</td>
              <td>
                <select name="time" class="reservation-datetime--mypage">
                  <option value="{{$reservation['reservation_datetime']->format('H:i')}}" hidden>{{$reservation['reservation_datetime']->format('H:i')}}</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="13:00">13:00</option>
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  <option value="16:00">16:00</option>
                  <option value="17:00">17:00</option>
                  <option value="18:00">18:00</option>
                  <option value="19:00">19:00</option>
                  <option value="20:00">20:00</option>
                  <option value="21:00">21:00</option>
                  <option value="22:00">22:00</option>
                  <option value="23:00">23:00</option>
                </select>
                <!-- <input type="text" value="{{$reservation['reservation_datetime']->format('H:i')}}" name="time"> -->
              </td>
            </tr>
            <tr>
              <td>Number</td>
              <td>
                <select name="number" class="reservation-number--mypage">
                  <option value="{{$reservation->user_number}}" hidden>{{$reservation->user_number}}人</option>
                  <option value="1">1人</option>
                  <option value="2">2人</option>
                  <option value="3">3人</option>
                  <option value="4">4人</option>
                  <option value="5">5人</option>
                  <option value="6">6人</option>
                  <option value="7">7人</option>
                  <option value="8">8人</option>
                  <option value="9">9人</option>
                  <option value="10">10人</option>
                </select>
                <!-- <input type="text" value="{{$reservation->user_number}}" name="number"> -->
              </td>
            </tr>
          </table>
        </form>
      </div>
      @endforeach
      @endif


    </div>

    <div class="like-wrapper--mypage">
      @if(isset($users))
      @foreach($users as $user)
      <h2 class="user-name">{{$user->name}}さん</h2>
      @endforeach
      @endif
      <h2 class="like-ttl--mypage">お気に入り店舗</h2>
      <div class="like-card--flex">
        <!-- お気に入り店舗情報 -->
        @if(isset($likes))
        @foreach($likes as $like)
        <div class="card--mypage">
          <div class="card-img--mypage">
            <img src="{{$like->shops->image_url}}" alt="">
          </div>
          <div class="card-text--mypage">
            <h2 class="text-ttl--mypage">{{$like->shops->name}}</h2>
            <div class="text-tag--mypage">
              <p class="area-tag--mypage">
                @if ($like->shops->areas != null)
                #{{$like->shops->areas->name}}
                @endif
              </p>
              <p class="genre-tag--mypage">
                @if ($like->shops->genres != null)
                #{{$like->shops->genres->name}}
                @endif
              </p>
            </div>
            <div class="text-bottom--mypage">
              <!-- aタグのリンク先にshopsのidを持たせる -->
              <a href="/detail/{{$like->shops->id}}" class="detail-btn--mypage">詳しくみる</a>
              <div>
                @if($like->shops->is_liked_by_auth_user())
                <a href="unlike/{{$like->shops->id}}"><i class="fas fa-heart likes-btn"></i></a>
                @else
                <a href="like/{{$like->shops->id}}"><i class="fas fa-heart unlikes-btn"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif



      </div>
    </div>
  </section>
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>