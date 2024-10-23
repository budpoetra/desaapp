@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create New Ebook Category</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/ebook-categories" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Categories</span>
        </a>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <form class="user mt-3" method="POST" action="/admin/ebook-categories">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                  id="name" name="name" placeholder="Enter Name Ebook Category" value="{{ old('name') }}"
                  required>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user @error('color') is-invalid @enderror"
                  id="color" name="color" placeholder="Enter Color Ebook Category" value="{{ old('color') }}"
                  required>
                @error('color')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary btn-user btn-block">Create</button>
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
