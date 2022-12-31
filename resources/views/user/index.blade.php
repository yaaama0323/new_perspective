
@include('head')
<div class="search-wrapper col-sm-4">
      <div class="user-search-form">
        {{ Form::text('search_name', null, ['id' => 'search_name', 'class' => 'form-control shadow', 'placeholder' => 'ユーザーを検索する']) }}
        {{ Form::button('<i class="fa fa-search" aria-hidden="true"></i>', ['class' => 'btn search-icon', 'type' => 'button']) }}
      </div>
    </div>







</div>