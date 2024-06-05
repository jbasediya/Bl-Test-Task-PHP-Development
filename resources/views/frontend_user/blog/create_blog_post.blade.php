@extends('frontend_user.layouts.app')
@section('content')

@include('frontend_user.layouts.header')
@include('frontend_user.layouts.sidebar')

<h4> Create Blog Post</h4>

<!-- Create.blade.php -->
<form id="create-post-form" method="post" action="{{ url('user/blog_post/store') }}" enctype="multipart/form-data">
    @csrf <!-- Include CSRF token -->
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">
    </div>
    <br>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" placeholder="Enter content">{{ old('content') }}</textarea>
    </div>
    <br>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
$(document).ready(function() {
    $('#create-post-form').submit(function(event) {
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
                // Handle success response, such as redirecting the user
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseJSON);
                // Handle error response, such as displaying error messages to the user
                alert("An error occurred while creating the blog post. Please try again.");
            }
        });
    });
});
</script>

@endsection
