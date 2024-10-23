@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Contents</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/contents/create" class="btn btn-success btn-icon-split mb-3">
          <span class="icon text-white-50">
            <i class="fas fa-folder-plus"></i>
          </span>
          <span class="text">Create New Content</span>
        </a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contents as $content)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $content->title }}</td>
                  <td>{{ date('d M Y', strtotime($content->created_at)) }}</td>
                  <td>
                    <a href="/admin/contents/{{ $content->slug }}/edit" class="btn btn-warning btn-circle btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="/admin/contents/{{ $content->slug }}" class="btn btn-danger btn-circle btn-sm"
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
