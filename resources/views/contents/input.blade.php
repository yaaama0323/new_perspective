<form action="{{ route('upload.img') }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="file" name="upload_img">
<button type="submit">送信する</button>
</form>