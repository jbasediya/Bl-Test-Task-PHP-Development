
@extends('backend.layouts.app')
@section('content')

@include('backend.layouts.header')
@include('backend.layouts.sidebar')
      <h4>User List Table</h4>
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
              <h5 class="card-title">User List
              <a href="{{url('panel\user\add')}}" class="btn btn-primary" style="float:right;margin-top:12px;">Add New</a>
              </h5>
                 
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{!empty($value->status) ? 'Verified': 'NotVerified'}}</td>
                    <td>{{ date('d-m-Y H:i',strtotime($value->created_at))}}</td>
                    <!-- <td><a href="{{url('panel/user/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete the user record?');" href="{{url('panel/user/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                  </td> -->
                  <td>
                      @if($value->trashed())
                          <a href="{{ url('panel/user/restore/'.$value->id) }}" class="btn btn-success btn-sm">Restore</a>
                      @else
                          <a href="{{ url('panel/user/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a onclick="return confirm('Are you sure you want to delete the user record?');" href="{{ url('panel/user/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                      @endif
                  </td>

                  </tr>
                  @empty
                  <tr>
                    <td colspan="100%">No Record Found.</td>
                  </tr>
                  @endforelse
                  </tbody>
              </table>
             
        <!-- Pagination links -->
        <div class="pagination">
            {!! $getRecord->appends(request()->except('page'))->links() !!}
        </div>

            </div>
          </div>

 

        </div>
      </div>
    </section>
@endsection
@section('script')