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
  <div class="detail-flex">
    <section class="detail-flex--left">
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

      <section class="detail-header">
        <a href="/" class="detail__back-logo">
          < </a>
            @foreach($items as $item)
            <h2 class="detail-ttl">{{$item->name}}</h2>
      </section>

      <section class="detail-wrapper">
        <div class="detail-img">
          <img src="{{$item->image_url}}" alt="">
        </div>
        <div class="detail-tag">
          <p class="detail__area-tag">
            @if ($item->areas != null)
            #{{$item->areas->name}}
            @endif
          </p>
          <p class="detail__genre-tag">
            @if ($item->genres != null)
            #{{$item->genres->name}}
            @endif
          </p>
        </div>
        <p class="detail-text">
          {{$item->detail}}
        </p>
      </section>
      @endforeach
    </section>

    <section class="detail-flex--right">
      <div class="reservation-wrapper--detail">
        <h2 class="reservation-ttl">予約</h2>
        <form action="/reserve" method="POST" id="reservation">
          @csrf
          @foreach($items as $item)
          <input type="hidden" name="shop_id" value="{{$item->id}}">
          @endforeach
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <input type="date" name="date" class="date" id="date" value="{{old('date')}}">
          @error('date')
          <p class="error-text--detail">{{$message}}</p>
          @enderror
          <div class="time-item">
            <select name="time" class="select--time" id="time" value="{{old('time')}}">
              <option hidden>時間を選択してください</option>
              <option value="11:00" @if(old('time')=="11:00" ) selected @endif>11:00</option>
              <option value="12:00" @if(old('time')=="12:00" ) selected @endif>12:00</option>
              <option value="13:00" @if(old('time')=="13:00" ) selected @endif>13:00</option>
              <option value="14:00" @if(old('time')=="14:00" ) selected @endif>14:00</option>
              <option value="15:00" @if(old('time')=="15:00" ) selected @endif>15:00</option>
              <option value="16:00" @if(old('time')=="16:00" ) selected @endif>16:00</option>
              <option value="17:00" @if(old('time')=="17:00" ) selected @endif>17:00</option>
              <option value="18:00" @if(old('time')=="18:00" ) selected @endif>18:00</option>
              <option value="19:00" @if(old('time')=="19:00" ) selected @endif>19:00</option>
              <option value="20:00" @if(old('time')=="20:00" ) selected @endif>20:00</option>
              <option value="21:00" @if(old('time')=="21:00" ) selected @endif>21:00</option>
              <option value="22:00" @if(old('time')=="22:00" ) selected @endif>22:00</option>
              <option value="23:00" @if(old('time')=="23:00" ) selected @endif>23:00</option>
            </select>
          </div>
          @error('time')
          <p class="error-text--detail">{{$message}}</p>
          @enderror
          <div class="number-item">
            <select name="number" class="select--number" id="number" value="{{old('number')}}">
              <option hidden>人数を選択してください</option>
              <option value="1" @if(old('number')=="1" ) selected @endif>1人</option>
              <option value="2" @if(old('number')=="2" ) selected @endif>2人</option>
              <option value="3" @if(old('number')=="3" ) selected @endif>3人</option>
              <option value="4" @if(old('number')=="4" ) selected @endif>4人</option>
              <option value="5" @if(old('number')=="5" ) selected @endif>5人</option>
              <option value="6" @if(old('number')=="6" ) selected @endif>6人</option>
              <option value="7" @if(old('number')=="7" ) selected @endif>7人</option>
              <option value="8" @if(old('number')=="8" ) selected @endif>8人</option>
              <option value="9" @if(old('number')=="9" ) selected @endif>9人</option>
              <option value="10" @if(old('number')=="10" ) selected @endif>10人</option>
            </select>
          </div>
          @error('number')
          <p class="error-text--detail">{{$message}}</p>
          @enderror
        </form>
        <!-- javascriptで上記の値を表示 -->
        <table class="reservation-table">
          <tr>
            <th>Shop</th>
            @foreach($items as $item)
            <td>{{$item->name}}</td>
            @endforeach
          </tr>
          <tr>
            <th>Date</th>
            <td id="dateCopy"></td>
          </tr>
          <tr>
            <th>Time</th>
            <td id="timeCopy"></td>
          </tr>
          <tr>
            <th>Number</th>
            <td id="numberCopy"></td>
          </tr>
        </table>

        <button class="reservation-btn" form="reservation">予約する</button>
      </div>

      <!-- 評価・コメント入力欄 -->
      <div class="evaluation-wrapper">
        <h2 class="evaluation-ttl">評価・コメント</h2>
        <form action="/comment" class="evaluation-form" method="POST">
          @csrf
          @foreach($items as $item)
          <input type="hidden" name="shop_id" value="{{$item->id}}">
          @endforeach
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <div class="evaluation-number">
            <select name="evaluationNumber" class="select--evaluation">
              <option value="" hidden>評価数を選択してください</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <textarea name="evaluationComment" cols="30" rows="10" class="evaluation-comment" placeholder="コメントを記載してください"></textarea>
          <button class="evaluation-btn">送信する</button>
        </form>
      </div>
    </section>
  </div>
  <div class="comment-wrapper">
    <h2 class="comment-ttl">口コミ</h2>
    @if(isset($comments))
    <div class="comment-flex">
      @foreach($comments as $comment)
      <div class="comment-item">
        <p class="comment--user-name">{{$comment->users->name}}</p>
        <p class="comment-evaluation-num">お気に入り: {{$comment->evaluation_number}}</p>
        <p class="comment--user-comment">{{$comment->evaluation_comment}}</p>
      </div>
      @endforeach
    </div>
    @endif

  </div>

  <script src="{{ mix('js/detail.js') }}"></script>
</body>

</html>