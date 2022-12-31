


@include('head')
<div class="search_back_wrapper">
  <div class="search_back">
    <a href="{{ url('/dashboard') }}">マイページに戻る</a>
  </div>
</div>

<div class="my_review_wrapper">
  @foreach($my_review as $my_review)


  @if(Auth::user()->id===$my_review->user_id)

  <div class="fadein">
    <div class="my_review_list">
      <div class="myreview_button_wrapper">
        <div class="myreview_button">
          <a href="/review_edit/{{$my_review->id}}"><button>編集</button></a>
          <a>
            <form action="delete/{{$my_review->id}}" method="post">
              {{ csrf_field()}}
              <input type="submit" class="btn-dell" value="削除" onclick="return confirm('本当に削除しますか？')">
            </form></a>
          </div>
        </div>
        <div class="myreview_top">
          <p>{{ Auth::user()->name }}</p>
        </div>
        <div class="text_list">
          <div>
            <div class="myreview_title">
              <h1>ゲーム名</h1>
            </div>
            <div class="myreview_content">
              <h2>{{{ $my_review->game_title }}}</h2>
            </div>
          </div>

          <div>@if( $my_review->star === 1)
            <div class="myreview_title">
              <h1>おすすめ度</h1>
            </div>
            <div class="myreview_content">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star unchecked"></span>
              <span class="fa fa-star unchecked"></span>
              <span class="fa fa-star unchecked"></span>
              <span class="fa fa-star unchecked"></span>
              @elseif( $my_review->star === 2)
            </div>
            <div class="myreview_title">
              <h1>おすすめ度</h1>
            </div>
            <div class="myreview_content">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star unchecked"></span>
              <span class="fa fa-star unchecked"></span>
              <span class="fa fa-star unchecked"></span>
              @elseif( $my_review->star === 3)
            </div>
            <div class="myreview_title">
              <h1>おすすめ度</h1>
            </div>
            <div class="myreview_content">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star unchecked"></span>
              <span class="fa fa-star unchecked"></span>
              @elseif( $my_review->star=== 4)
            </div>
            <div class="myreview_title">
              <h1>おすすめ度</h1>
            </div>
            <div class="myreview_content">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star unchecked"></span>
              @elseif( $my_review->star === 5)
            </div>
            <div class="myreview_title">
              <h1>おすすめ度</h1>
            </div>
            <div class="myreview_content">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              @else
              @endif
            </div>

            <div class="myreview_title">
              <h1>レビュータイトル</h1>
            </div>
            <div class="myreview_content">
              <h2>{{{$my_review->review_title }}}</h2>
            </div>
            <div class="myreview_title">
              <h1>内容</h2>
              </div>
              <div class="myreview_content">
                <h2>{{{$my_review->coment }}}</h2>
              </div>
            </div>

          </div>
          @endif
          @endforeach
        </div>
      </div>
