@extends('layouts.app')
@section('content')
<form action="{{route('posts.store')}}" method="POST" class="w-75 text-center ms-auto me-auto" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Post content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" required name="content"></textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Share a media</label>
    <input class="form-control" type="file" id="image" name="media">
  </div>
  <div>
    <img src="" alt="" id="imgPreview"  class="mb-4 mt-4">
  </div>
  <button type="submit" class="btn btn-outline-primary w-25">Post</button>
</form>
<script>
  $(document).ready(() => {
      $('#image').change(function() {
          const file = this.files[0];
          console.log(file);
          if (file) {
              let reader = new FileReader();
              reader.onload = function(event) {
                  console.log(event.target.result);
                  $('#imgPreview').attr('src', event.target.result);
              }
              reader.readAsDataURL(file);
          }
      });
  });
</script>
@endsection