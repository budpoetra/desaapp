@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Announcement</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/announcements" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Announcements</span>
        </a>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <form class="user mt-4" method="POST" action="/admin/announcements/{{ $announcement->slug }}"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" placeholder="Enter Title Announcement" value="{{ old('title', $announcement->title) }}"
                  required>
                @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="custom-file col-sm-12 mb-4">
                <input type="file"
                  class="form-control form-control-user custom-file-input @error('image') is-invalid @enderror"
                  id="image" name="image" required>
                <label class="custom-file-label py-2" for="image">{{ old('title', $announcement->image) }}</label>
              </div>
              <input type="hidden" id="image-cropper" name="image-cropper">
              @error('image')
                <div class="col-sm-3"></div>
                <div class="invalid-feedback col-sm-9">
                  {{ $message }}
                </div>
              @enderror
              <div class="form-group">
                <input id="body" type="hidden" name="body" value="{{ @old('body', $announcement->body) }}">
                <trix-editor input="body" style="min-height: 250px"></trix-editor>
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
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script>
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
              aspectRatio: 2
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
        $('.custom-file-label').html(fileName);
        var canvas;
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 750,
            height: 375
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
