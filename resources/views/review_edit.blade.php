@include('head')
<script>
@if ($errors->any())
alert("{{ implode('\n', $errors->all()) }}");
@elseif (session()->has('success'))
alert("{{ session()->get('success') }}");
@endif
</script>
<body>
  <div class="contact">

    <form action="/review_edit_complete" method="POST">
      {{ csrf_field() }}
      <div class="review_main">
        <h4>レビュー投稿</h4>
      </div>
      <input type="hidden" id="id" name="id" value="{{ $user->id }}">
      <div class="form">
        <dl>
          <dt>
            <label for="name">投稿するゲーム名</label>
          </dt>
          @if ($errors->has('game_title'))
          <p class="errorsText"><span>✴︎</span>{{$errors->first('game_title')}}</p>
          @endif

          <dd class="textbox"><input type="text" id="game_title" class="review_text" name="game_title" placeholder="ゲームのタイトルを入力してください" size="30" value="{{ $user->game_title }}"></dd>
        </dl>
        <dl class="star_wrapper">
          <dt>
            <label for="star">おすすめ度　※星を選択してください</label>
          </dt>
          @if ($errors->has('star'))
          <p class="errorsText"><span>✴︎</span>{{$errors->first('star')}}</p>
          @endif
          @if( $user->star === 1)
          <div class="review_stars">
            <dd><input type="radio" id="star" name="star" value=5><label class="confirm_yellow_star">★★★★★</label></dd>
            <dd><input type="radio" id="star" name="star" value=4><label class="confirm_yellow_star">★★★★</label><label class="confirm_gray_star">★</label></p></dd>
            <dd><input type="radio" id="star" name="star" value=3><label class="confirm_yellow_star">★★★</label><label
              class="confirm_gray_star">★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=2><label
              class="confirm_yellow_star">★★</label><label class="confirm_gray_star">★★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=1 checked><label class="confirm_yellow_star">★</label><label class="confirm_gray_star">★★★★</label></p></dd>
          </div>
          @elseif( $user->star === 2)
          <div class= "review_stars">
            <dd><input type="radio" id="star" name="star" value=5><label class="confirm_yellow_star">★★★★★</label></dd>
            <dd><input type="radio" id="star" name="star" value=4><label class="confirm_yellow_star">★★★★</label><label
              class="confirm_gray_star">★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=3><label class="confirm_yellow_star">★★★</label><label class="confirm_gray_star">★★</label></p></dd>
            <dd><input type="radio" id="star" name="star" value=2 checked><label class="confirm_yellow_star">★★</label><label
              class="confirm_gray_star">★★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=1><label class="confirm_yellow_star">★</label><label class="confirm_gray_star">★★★★</label></p></dd>
          </div>
          @elseif( $user->star === 3)
          <div class= "review_stars">
            <dd><input type="radio" id="star" name="star" value=5><label class="confirm_yellow_star">★★★★★</label></dd>
            <dd><input type="radio" id="star" name="star" value=4><label class="confirm_yellow_star">★★★★</label><label
              class="confirm_gray_star">★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=3 checked><label class="confirm_yellow_star">★★★</label><label
              class="confirm_gray_star">★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=2><label class="confirm_yellow_star">★★</label><label
              class="confirm_gray_star">★★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=1><label class="confirm_yellow_star">★</label><label
              class="confirm_gray_star">★★★★</label></p>
            </dd>
          </div>
          @elseif( $user->star === 4)
          <div class="review_stars">
            <dd><input type="radio" id="star" name="star" value=5><label class="confirm_yellow_star">★★★★★</label></dd>
            <dd><input type="radio" id="star" name="star" value=4 checked><label class="confirm_yellow_star">★★★★</label><label
              class="confirm_gray_star">★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=3><label class="confirm_yellow_star">★★★</label><label
              class="confirm_gray_star">★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=2><label class="confirm_yellow_star">★★</label><label
              class="confirm_gray_star">★★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=1><label class="confirm_yellow_star">★</label><label
              class="confirm_gray_star">★★★★</label></p>
            </dd>
          </div>
          @elseif( $user->star === 5)
          <div class="review_stars">
            <dd><input type="radio" id="star" name="star" value=5 checked><label class="confirm_yellow_star">★★★★★</label></dd>
            <dd><input type="radio" id="star" name="star" value=4><label class="confirm_yellow_star">★★★★</label><label
              class="confirm_gray_star">★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=3><label class="confirm_yellow_star">★★★</label><label
              class="confirm_gray_star">★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=2><label class="confirm_yellow_star">★★</label><label
              class="confirm_gray_star">★★★</label></p>
            </dd>
            <dd><input type="radio" id="star" name="star" value=1><label class="confirm_yellow_star">★</label><label
              class="confirm_gray_star">★★★★</label></p>
            </dd>
          </div>
          @endif
        </dl>


        <dl>
          <dt>
            <label for="review_title">レビュータイトル</label>

          </dt>
          @if ($errors->has('review_title'))
          <p class="errorsText"><span>✴︎</span>{{$errors->first('review_title')}}</p>
          @endif
          <dd class="textbox"><input type="text" id="review_title" class="review_text" name="review_title"
            placeholder="レビュータイトルを決めてください" value="{{ $user->review_title }}"></dd>
          </dl>

          <dt>
            <label for=>レビュー内容</label>
          </dt>
          <dl>
            @if ($errors->has('coment'))
            <p class="errorsText"><span>✴︎</span>{{$errors->first('coment')}}</p>
            @endif
            <dd class="textbox"><textarea type="textarea" id="coment" name='coment' class="review_text"
              rows="7">{{ $user->coment }}</textarea></dd>
              <dd class=""><input id="user_id" name="user_id" value="{{ Auth::user()->id }}"></dd>
            </dl>

            <input type="hidden" name="submitted" value="true">
            <div class="review_button">
              <input id="button" class="send_button" type="submit" value="送信">
            </form>
            <button type="button" class="back_button" onclick="location.href='/my_review'">戻る</button>
          </div>
        </div>
      </div>





        </html>
