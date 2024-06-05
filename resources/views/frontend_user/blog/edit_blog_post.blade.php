@extends('frontend_user.layouts.app')

@section('content')

@include('frontend_user.layouts.header')
@include('frontend_user.layouts.sidebar')
<h4> Edit Blog Post</h4>

<!-- Edit.blade.php -->
<form id="edit-post-form" method="post" action="{{ route('blog_post.update', $post->id) }}" enctype="multipart/form-data">
    @csrf <!-- Include CSRF token -->
    @method('POST') <!-- Use PUT method for updating -->

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter title">
    </div>
    <br>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" placeholder="Enter content">{{ $post->content }}</textarea>
    </div>
    <br>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image" value="{{ $post->image }}">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
<script>$(document).ready(function() {
    $('#edit-post-form').submit(function(event) {
        event.preventDefault();
        
        var formData = new FormData($(this)[0]);
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                // Handle success response
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseJSON);
                // Handle error response
            }
        });
    });
});
 </script>
@endsection
