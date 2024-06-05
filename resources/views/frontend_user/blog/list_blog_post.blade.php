
@extends('frontend_user.layouts.app')
@section('content')

@include('frontend_user.layouts.header')
@include('frontend_user.layouts.sidebar')
      <h4> Blog List Table</h4>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div> -->
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
       
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Blog Post List
              <a href="{{url('user/blog_post/create')}}" class="btn btn-primary" style="float:right;margin-top:12px;">Add New</a>
              </h5>
                 
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>


                  </tr>
                </thead>
                <tbody>
                  @forelse($posts as $value)
                  <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->title}}</td>
                    <td>{{$value->content}}</td>
                    <td><img src="{{ asset($value->image_path) }}" alt="Image" style="max-width: 100px; max-height: 100px;"></td>
                    <td>{{$value->created_at}}</td>
                    <td> 
                         <a href="{{ url('user/blog_post/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                         <!-- <a href="{{ url('user/blog_post/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a> -->
                    </td>
                    <td>
                        <form id="deleteForm{{$value->id}}" action="{{ url('user/blog_post/'.$value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{$value->id}})" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                  
                  </tr>
                  @empty
                  <tr>
                    <td colspan="100%">No Record Found.</td>
                  </tr>
                  @endforelse
                  </tbody>
              </table>
              {{ $posts->links() }}

            </div>
          </div>
        </div>
      </div>
    </section>
    
@endsection
<script>
    function confirmDelete(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('deleteForm' + postId).submit();
        }
    }
</script>
@section('script')