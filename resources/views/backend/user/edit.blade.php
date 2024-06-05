
@extends('backend.layouts.app')
@section('content')

@include('backend.layouts.header')
@include('backend.layouts.sidebar')
      <h4>Edit User</h4>
      <!-- <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
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
              <h5 class="card-title">Edit User</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="post" action="">
                {{ csrf_field() }}
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" class="form-control" id="inputNanme4" name="name" value="{{$getRecord->name}}">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$getRecord->email}}">
                </div>

                <div class="col-12">
                  <label for="inputStatus4" class="form-label">Status</label>
                  <select  class="form-control" name="status">
                    <option {{($getRecord->status==1)? 'selected' : ''}} value="1">Active</option>
                    <option  {{($getRecord->status==0)? 'selected' : ''}}value="0">Inactive</option>

                  </select>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection
@section('script')