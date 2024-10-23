@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Sub Sub Contents</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/sub-sub-contents/create" class="btn btn-success btn-icon-split mb-3">
          <span class="icon text-white-50">
            <i class="fas fa-folder-plus"></i>
          </span>
          <span class="text">Create New Sub Sub Content</span>
        </a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Sub Header</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subSubContents as $subSubContent)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $subSubContent->subContent->title }}</td>
                  <td>{{ $subSubContent->title }}</td>
                  <td>{{ date('d M Y', strtotime($subSubContent->created_at)) }}</td>
                  <td>
                    <a href="/admin/sub-sub-contents/{{ $subSubContent->slug }}/edit"
                      class="btn btn-warning btn-circle btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="/admin/sub-sub-contents/{{ $subSubContent->slug }}" class="btn btn-danger btn-circle btn-sm"
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
