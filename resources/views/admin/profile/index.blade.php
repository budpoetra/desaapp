@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profile</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row mt-3">
          <div class="col-md-4">
            <img src="{{ asset('storage/' . $user[0]->image) }}" class="card-img-top" alt="Photo Profile">
          </div>
          <div class="col-md-8 pt-5">
            <div class="row">
              <div class="col-md-3">
                <h5>Name</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user[0]->name }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Phone Number</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user[0]->phone_number }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Email</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user[0]->email }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Username</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user[0]->username }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Date of Birth</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ date('d M Y', strtotime($user[0]->ttl)) }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Gender</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user[0]->gender }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Job</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user[0]->job }}</h5>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <a href="/admin/profiles/{{ $user[0]->username }}/edit" class="btn btn-primary btn-icon-split mt-2">
                <span class="text">Change Profile</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
