@extends('user.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Change Password</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <form class="user mt-3" method="POST" action="/user/change-password/{{ auth()->user()->username }}">
              @csrf
              @method('PUT')
              <input type="hidden" name="username" value="{{ auth()->user()->username }}">
              <div class="form-group">
                <input type="password" class="form-control form-control-user @error('oldPassword') is-invalid @enderror"
                  id="oldPassword" name="oldPassword" placeholder="Enter Yours Old Password" required>
                @error('oldPassword')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user @error('newPassword') is-invalid @enderror"
                  id="newPassword" name="newPassword" placeholder="Enter Yours New Password" required>
                @error('newPassword')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user @error('confPassword') is-invalid @enderror"
                  id="confPassword" name="confPassword" placeholder="Enter Yours Confirmation Password" required>
                @error('confPassword')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                </div>
                <div class="col-md-4"></div>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
