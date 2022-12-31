@include(('head'))
<div class="detail">
<button type="button" class="" onclick="location.href='/search'">戻る</button>
<div class="detail_top">
<h1><span>{{{ $user->game_title }}}</span></h1>
</div>

<div class="detail_user_name">
        @foreach($users as $users)
        @if($user->user_id=== $users->id)
         投稿者：{{{ $users->name}}}
         @endif
        @endforeach
</div>

<div class="text_list">


<div>
    
    <div class="detail_star">
  
<div class="detail_title_wrapper">
 <div class="detail_title">
@if( $user->star === 1)
  <div class="detail_star">
     <div>おすすめ度：
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $user->star === 2)
     </div>
   
     <div>おすすめ度：
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $user->star === 3)
     </div>
     <div>
      
     </div>
     <div>おすすめ度：
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $user->star=== 4)
     </div>
   
     <div>おすすめ度：
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            @elseif( $user->star === 5)
     </div>

     <div>おすすめ度：
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            @else 
            @endif
     </div>
    
     </div>
     <div class="detail_review_title">
        {{{$user->review_title }}}
     </div>

     <div class="detail_review_coment">
        {{{$user->coment }}}
     </div>
   </div>
</div>




</div>



    
    </div>
     </div>




</div>




