
@include('head')

 <div class="main">
    
        <div class="game_main_img">
          <img src="{{asset('img/game.jpeg') }}">
          <p class="img_text">New Perspective</p>
        </div>
        

        <div class="search_button"> 
          
          <a href="/search">レビューを検索する</a>
        </div>
    
    <div id="star">
      <star-rating v-model="rating"></star-rating>
    </div>
    <div>
            @if (Route::has('login'))
                <div>
                    @auth
                      <div class="mypage">
                        <a href="{{ url('/dashboard') }}">マイページへ</a>
                        
                      </div>
                    @else
                    <div class="login_menu">
                        <a href="{{ route('login') }}" class="login underline">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="registration underline">新規登録</a>
                        @endif
                    @endauth
                    </div>
                </div>
            @endif
        </div>


        </div>
 </div>

        


