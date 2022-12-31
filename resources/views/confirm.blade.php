@include('head')
<div>
  <div class="contact-box">
    <form action="/complete" method="POST" class="confi-form">
      {{ csrf_field() }}
      <div class="confirm">
        <div class="confirmForm">

          <div class="contents_wrapper">
            <div id="word">
              <p>入力内容をご確認ください</p>

            </div>

            <div id="contents">
              <div class="content_table">
                <div class="confirm_game_title">
                  <h1>ゲームタイトル</h1>
                  <p>{!! htmlspecialchars($game_title) !!}</p>
                  <input name="game_title" value="{{$game_title}}" type="hidden">
                </div>
                <div class="confirm_game_title">
                  <h1 class="confirm_star">評価</h1>

                  <p>@if(htmlspecialchars($star)  === "5" )<label class="confirm_yellow_star">★★★★★</label></p>
                  @elseif(htmlspecialchars($star)  === "4" )<label class="confirm_yellow_star">★★★★</label><label class="confirm_gray_star">★</label></p>
                  @elseif(htmlspecialchars($star)  === "3" )<label class="confirm_yellow_star">★★★</label><label class="confirm_gray_star">★★</label></p>
                  @elseif(htmlspecialchars($star)  === "2" )<label class="confirm_yellow_star">★★</label><label class="confirm_gray_star">★★★</label></p>
                  @elseif(htmlspecialchars($star)  === "1" )<label class="confirm_yellow_star">★</label><label class="confirm_gray_star">★★★★</label></p>
                  @else
                  @endif

                  <input name="star" value="{{$star}}" type="hidden">
                </div>
                <div class="confirm_game_title">
                  <h1>レビュータイトル</h1>

                  <p>{!! htmlspecialchars($review_title) !!}</p>
                  <input name="review_title" value="{{$review_title}}" type="hidden">
                </div>




                <div class="confirm_game_title">
                  <h1>本文</h1>
                  <p>{!! htmlspecialchars($coment) !!}</p>
                  <input name="coment" value="{{$coment}}" type="hidden">
                </div>

                <div id="user_id">
                  <h1>user_id</h1>
                  <p>{!! htmlspecialchars($user_id) !!}</p>
                  <input name="user_id" value="{{$user_id}}" type="hidden">
                </div>
              </div>
            </div>
            <div class="review_button">
              <div id="button">
                <input type="submit" VALUE="送信" class="send_button">
                <button type="button" class="back_button" onclick="history.back()">戻る</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

</div>

</div>


</div>
