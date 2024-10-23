@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">New User</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/new-users" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to New Users</span>
        </a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modalRegisterMail">
          <span class="icon text-white-50">
            <i class="fas fa-user-check"></i>
          </span>
          <span class="text">Accept This User</span>
        </button>
        <a href="/admin/new-users/{{ $user->username }}" class="btn btn-danger btn-icon-split" data-confirm-delete="true">
          <span class="icon text-white-50">
            <i class="fas fa-user-times"></i>
          </span>
          <span class="text">Reject This User</span>
        </a>
        <div class="row mt-3">
          <div class="col-md-4">
            <img src="{{ asset('storage/' . $user->image) }}" class="card-img-top" alt="Photo Profile">
          </div>
          <div class="col-md-8 pt-5">
            <div class="row">
              <div class="col-md-3">
                <h5>Name</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user->name }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Phone Number</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user->phone_number }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Email</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user->email }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Username</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user->username }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Date of Birth</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ date('d M Y', strtotime($user->ttl)) }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Gender</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user->gender }}</h5>
              </div>
              <div class="col-md-3">
                <h5>Job</h5>
              </div>
              <div class="col-md-9">
                <h5>: {{ $user->job }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal for Register Mail --}}
  <div class="modal fade" id="modalRegisterMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <form action="/admin/send-register-mail" method="post" class="d-inline">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register Mail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pr-5 pl-5">
            <div class="form-group">
              <div class="row">
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}" required>
                <label for="toEmail" class="col-lg-2 py-2">To</label>
                <input type="email" class="form-control col-lg-10" id="toMail" name="toMail"
                  value="{{ $user->email }}" required>
                <label for="toEmail" class="col-lg-2 py-2">Subject</label>
                <input type="text" class="form-control col-lg-10" id="subjectMail" name="subjectMail"
                  value="Registered Account!" required>
              </div>
            </div>
            <div class="form-group">
              <input id="body" type="hidden" name="body"
                value="
                      <h1>Hallo, {{ $user->name }}</h1>
                      <p>Your account has been registered on our website, please login.</p>
                      <p>Thanks,<br>{{ config('app.name') }}</p>
            ">
              <trix-editor input="body" style="height: 300px; overflow:auto"></trix-editor>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send Mail</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Modal for Register Mail --}}
@endsection
