@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Users</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Posts</th>
                <th>E-Book</th>
                <th>Video</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td class="text-center">{{ $posts->where('user_id', $user->id)->count() }}</td>
                  <td class="text-center">{{ $ebooks->where('user_id', $user->id)->count() }}</td>
                  <td class="text-center">{{ $videos->where('user_id', $user->id)->count() }}</td>
                  <td>
                    <a href="/admin/users/{{ $user->username }}" class="btn btn-info btn-circle btn-sm">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="/admin/users/{{ $user->username }}" class="btn btn-danger btn-circle btn-sm"
                      data-confirm-delete="true"><i class="fas fa-trash"></i>
                    </a>
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
