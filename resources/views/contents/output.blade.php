@section('content')
    <h1>output</h1>
    @foreach ($content_images as $content_image)
     
        @if (isset($content_image->file_name))
            //.で文字列と変数をつなげているつまり画像までのパスになる
            <img src="{{ asset('storage/images/' . $content_image->file_name) }}"
                alt="{{ asset('storage/images/' . $content_image->file_name) }}">
        @endif
    @endforeach
    @foreach ($contents as $content)
 <p>{{$content->body}}</p>
@endforeach
@endsection