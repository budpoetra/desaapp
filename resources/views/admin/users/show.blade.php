@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User</h1>

    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/users" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Users</span>
        </a>
        <a href="/admin/users/{{ $user->username }}" class="btn btn-danger btn-icon-split" data-confirm-delete="true">
          <span class="icon text-white-50">
            <i class="fas fa-trash"></i>
          </span>
          <span class="text">Delete This User</span>
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

    <hr class="text-dark">
    <h1 class="h5 mb-2 text-gray-800">This User's Posts</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Published</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category->name }}</td>
                  <td>{{ date('d M Y', strtotime($post->created_at)) }}</td>
                  <td>
                    <a href="/admin/posts/{{ $post->slug }}" class="btn btn-info btn-circle btn-sm">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    <form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-circle btn-sm"
                        onclick="return confirm('Are you sure to delete this post?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <hr class="text-dark">
    <h1 class="h5 mb-2 text-gray-800">This User's Ebooks</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Published</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ebooks as $ebook)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $ebook->title }}</td>
                  <td>{{ $ebook->category->name }}</td>
                  <td>{{ date('d M Y', strtotime($ebook->created_at)) }}</td>
                  <td>
                    <a href="/admin/ebooks/{{ $ebook->slug }}" class="btn btn-info btn-circle btn-sm">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    <form action="/admin/ebooks/{{ $ebook->slug }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-circle btn-sm"
                        onclick="return confirm('Are you sure to delete this ebook?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <hr class="text-dark">
    <h1 class="h5 mb-2 text-gray-800">This User's Videos</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Published</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($videos as $video)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $video->title }}</td>
                  <td>{{ date('d M Y', strtotime($video->created_at)) }}</td>
                  <td>
                    <a href="/admin/videos/{{ $video->slug }}" class="btn btn-info btn-circle btn-sm">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    <form action="/admin/videos/{{ $video->slug }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-circle btn-sm"
                        onclick="return confirm('Are you sure to delete this video?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
