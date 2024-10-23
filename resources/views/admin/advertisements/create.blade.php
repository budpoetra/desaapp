@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create New Advertisement</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/advertisements" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Advertisements</span>
        </a>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <form class="user mt-4" method="POST" action="/admin/advertisements" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" placeholder="Enter Title Advertisement" value="{{ old('title') }}" required>
                @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="type">Select the type of advertisement :</label>
                </div>
                <select class="custom-select" id="type" name="type">
                  <option value="primary">Primary</option>
                  <option value="seccondary">Seccondary</option>
                </select>
                @error('type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="target">Select the target of advertisement :</label>
                </div>
                <select class="custom-select" id="target" name="target">
                  <option value="false">In tab</option>
                  <option value="true">New tab</option>
                </select>
                @error('target')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                  name="url" placeholder="Enter Url Advertisement" value="{{ old('url') }}" required>
                @error('url')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-5">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('advertisement') is-invalid @enderror"
                    id="advertisement" name="advertisement" onchange="previewImage()" required>
                  <label id="label-image" class="custom-file-label" for="inputGroupFile01">Choose Advertisement
                    Banner...</label>
                </div>
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
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function previewImage() {
      const labelImage = document.querySelector('#label-image');
      const files = event.target.files;
      const fileName = files[0].name;
      labelImage.innerHTML = fileName;
    }
  </script>
@endsection
