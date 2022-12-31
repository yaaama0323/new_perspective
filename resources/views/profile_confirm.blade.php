<div>
  <div class="contact-box">
    <form action="/complete" method="POST" class="confi-form">
      {{ csrf_field() }}
      <div class="confirm">
        <div class="confirmForm">
          <h4>お問い合わせ</h4>
          <div id="word">
            <p>下記の内容をご確認の上送信ボタンを押してください</p>
            <p>内容を訂正する場合は戻るを押してください。</p>
          </div>
          <div id="contents">
            <label>氏名</label>
            <p>{!! htmlspecialchars($favorite_game) !!}</p>
            <input name="favorite_game" value="{{$favorite_game}}" type="hidden">

            <label>フリガナ</label>

            <p>{!! htmlspecialchars($introduction) !!}</p>
            <input name="introduction" value="{{$introduction}}" type="hidden">


          </div>
          <div id="button">
            <input type="submit" VALUE="送信" class="send">
            <a href="/contact"> <input type='submit' VALUE="戻る" class="return"> </a>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>
</div>
</div>
<a href="/contact"> <input type='submit' VALUE="戻る" class="return"> </a>
