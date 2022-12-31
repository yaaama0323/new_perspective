@include('head')
<div class="search_form">
<div class="search">
   
{!! Form::open(['method' => 'GET'] ) !!}
    {!! Form::text('s', null, ['class'=>'search_box','placeholder'=>'ゲームタイトルを入力してください']) !!}

    


    {!! Form::submit('検索',['class'=>'search_submit']) !!}
{!! Form::close() !!}

</div>

<div class="search_back_wrapper">
@if (Route::has('login'))
     <div class="">
         @auth
           <div class="search_back">
             <a href="{{ url('/dashboard') }}">マイページに戻る</a>
           </div>
         @else  
         <div class="search_back">     
         <a href="{{ url('/') }}">トップページに戻る</a>
        </div>
         @endauth
     </div>
    
     @endif
</div>
</div>



<div class="review_list">
 <table>
    <tr><th>ゲーム名</th><th>おすすめ度</th><th>レビュー</th><th>詳細</th></tr>
@foreach($data as $item)

<div class="search_wrapper">
 <div class="search_list">
<tr>
<td><div>{{{ $item->game_title }}}</div></td>
<td><div>@if( $item->star === 1)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $item->star === 2)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $item->star === 3)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $item->star=== 4)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $item->star === 5)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            @else 
            @endif
        </div></td>
        <td><div>{{{ $item->review_title }}}</div></td>
        <td><a href="/detail/{{$item->id}}">詳細を見る</a></td>
</tr>
@endforeach
</table>
</div>
</div>















