@include('head')

<div class="dash_board_wrapper">
  <div class="dash_board">

    @if(Auth::user()->role === 1)
    <div class="admin">
      <p>※あなたは管理者です</p>
    </div>
    @endif

    <div class="name_list">
      <div class="profile_user_name">{{ Auth::user()->name }}</div>

      <div class="profile_user_game">
        <a>おすすめゲーム: <span>{{ Auth::user()->favorite_game }}</span></a>
      </div>
    </div>


    <div class="self_introduction">

    </div>

    <div class="profile_user_introducution">
      <a>{{ Auth::user()->introduction }}</a>
    </div>

    <div class="profile_list">

      <x-dropdown-link :href="route('profile.edit')" class="profile_edit">
        <button>{{ __('ユーザー情報を編集する') }}</button>
      </x-dropdown-link>
    </div>
    <div class="mypage_top">
      <div class="mypage_button">
        <a href="/search">レビューを検索</a>
      </div>
      <div class="mypage_button_post">
        <a href="/review">レビューを投稿</a>
      </div>
    </div>

    <div class="my_review">
      <a href="/my_review">自分の投稿を見る</a>
    </div>

    @if(Auth::user()->role === 1)
    <div class="admin">
      <a href="admin_delete"><button class="btn-red">管理者ページ</button></a>
    </div>
    @endif


    <form method="POST" action="{{ route('logout') }}" class="logout_form">
      @csrf
      <a :href="route('logout')"
      onclick="event.preventDefault();
      this.closest('form').submit();" class="logout_button">
      {{ __('ログアウト') }}
    </form>
  </div>
</div>
