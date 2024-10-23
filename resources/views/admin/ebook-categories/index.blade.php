@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ebook Categories</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/ebook-categories/create" class="btn btn-success btn-icon-split mb-3">
          <span class="icon text-white-50">
            <i class="fas fa-folder-plus"></i>
          </span>
          <span class="text">Create New Ebook Category</span>
        </a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Color</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>{{ $category->color }}</td>
                  <td>{{ date('d M Y', strtotime($category->created_at)) }}</td>
                  <td>
                    <a href="/admin/ebook-categories/{{ $category->slug }}/edit"
                      class="btn btn-warning btn-circle btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    @if ($category->id != 1)
                      <a href="/admin/ebook-categories/{{ $category->slug }}" class="btn btn-danger btn-circle btn-sm"
                        data-confirm-delete="true"><i class="fas fa-trash"></i>
                      </a>
                    @endif
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
