<!DOCTYPE html>
<html>
<head>
  <title>Adminpage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  @include('head')

  <div class="container">
    <h1>管理者ページ</h1>

    <table class="table table-bordered data-table">

      <thead>

        <tr>
          <th>ID</th>
          <th>ゲーム名</th>
          <th>評価</th>
          <th>レビュータイトル</th>
          <th>コメント</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->game_title }}</td>
          @if ($user->star === 5 )
          <td  class="admin_star">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          </td>
          @elseif ($user->star === 4 )
          <td  class="admin_star">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>

          </td>
          @elseif ($user->star === 3 )
          <td  class="admin_star">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
          </td>
          @elseif ($user->star === 2 )
          <td  class="admin_star">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
          </td>
          @elseif ($user->star === 1 )
          <td  class="admin_star">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
          </td>
          @endif
          <td>{{ $user->review_title }}</td>
          <td class="admin_coment">{{ $user->coment }}</td>
          <td>
            <a
            href="javascript:void(0)"
            id="delete-user"
            data-url="{{ route('users.delete', $user->id) }}"
            class="btn btn-danger"
            >削除</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </div>
  </table>

</body>

<script type="text/javascript">

$(document).ready(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /*------------------------------------------
  --------------------------------------------
  When click user on Show Button
  --------------------------------------------
  --------------------------------------------*/
  $('body').on('click', '#delete-user', function () {

    var userURL = $(this).data('url');
    var trObj = $(this);

    if(confirm("本当に削除してよろしいですか？") == true){
      $.ajax({
        url: userURL,
        type: 'DELETE',
        dataType: 'json',
        success: function(data) {
          alert(data.success);
          trObj.parents("tr").remove();
        }
      });
    }

  });

});

</script>

</html>
