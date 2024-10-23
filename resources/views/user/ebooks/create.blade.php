@extends('user.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create New Ebook</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/user/ebooks" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Ebooks</span>
        </a>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <form class="user mt-4" method="POST" action="/user/ebooks" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" placeholder="Enter Title Ebook" value="{{ old('title') }}" required>
                @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Choose Category Ebook</label>
                </div>
                <select class="custom-select" id="category_id" name="category_id">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('ebook') is-invalid @enderror" id="ebook"
                    name="ebook" onchange="previewFile()" required>
                  <label id="label-file" class="custom-file-label" for="inputGroupFile01">Choose Ebook...</label>
                </div>
              </div>
              <div class="custom-file col-sm-12 mb-4">
                <input type="file"
                  class="form-control form-control-user custom-file-input @error('image') is-invalid @enderror"
                  id="image" name="image" required>
                <label id="label-image" class="custom-file-label py-2" for="image">Choose Photo</label>
              </div>
              <input type="hidden" id="image-cropper" name="image-cropper">
              @error('image')
                <div class="col-sm-3"></div>
                <div class="invalid-feedback col-sm-9">
                  {{ $message }}
                </div>
              @enderror
              <div class="form-group">
                <input id="body" type="hidden" name="body" value="{{ @old('body') }}">
                <trix-editor input="body" style="min-height: 250px" placeholder="Description"></trix-editor>
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
@endsection

@section('javascript')
  <script>
    function previewFile() {
      const labelFile = document.querySelector('#label-file');
      const files = event.target.files;
      const fileName = files[0].name;
      labelFile.innerHTML = fileName;
    }

    $(function() {
      var image = $('#image-preview')[0];
      var cropper;
      let fileName;
      $('#image').on('change', function(event) {
        var files = event.target.files;
        fileName = files[0].name;
        if (files && files.length > 0) {
          let file = files[0];
          reader = new FileReader();
          reader.onload = function(e) {
            image.src = e.target.result;
            cropper = new Cropper(image, {
              aspectRatio: 2 / 3
            });
          };
          reader.readAsDataURL(file);
          $('#modal-preview-image').css('display', 'block');
        }
      });

      $('#close-modal').on('click', function() {
        $('#modal-preview-image').css('display', 'none');
        cropper.destroy();
      })

      $('#cancel-modal').on('click', function() {
        $('#modal-preview-image').css('display', 'none');
        cropper.destroy();
      })

      $('#save-modal').on('click', function() {
        $('#label-image').html(fileName);
        var canvas;
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 740,
            height: 1088
          });
          var imageData = canvas.toDataURL();
          $('#image-cropper').attr('value', imageData);
          $('#modal-preview-image').css('display', 'none');
          cropper.destroy();
        }
      });

    });
  </script>
@endsection
