@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Setting</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" action="/admin/settings/{{ $data[0]->id }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group pt-3 pr-5 pl-5">
            <div class="row">
              <div class="col-md-4 py-2">
                <label for="app_name">App Name</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="app_name" name="app_name" value="{{ $data[0]->app_name }}"
                  required>
              </div>
              <div class="col-md-4 py-2">
                <label for="app_logo">App Logo</label>
              </div>
              <div class="col-md-8 mb-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="app_logo" name="app_logo">
                  <label id="app_logo_label" class="custom-file-label">{{ $data[0]->app_logo }}</label>
                  <input type="hidden" id="image-cropper-app-logo" name="image-cropper-app-logo">
                </div>
              </div>
              <div class="col-md-4 py-2">
                <label for="home_page_image">Home Page Image</label>
              </div>
              <div class="col-md-8 mb-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="home_page_image" name="home_page_image">
                  <label id="home_page_image_label" class="custom-file-label">{{ $data[0]->home_page_image }}</label>
                  <input type="hidden" id="image-cropper-home-page-image" name="image-cropper-home-page-image">
                </div>
              </div>
              <div class="col-md-4 py-2">
                <label for="home_page_header_text">Home Page Header Text</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="home_page_header_text" name="home_page_header_text"
                  value="{{ $data[0]->home_page_header_text }}" required>
              </div>
              <div class="col-md-4 pt-5">
                <label for="home_page_second_text">Home Page Second Text</label>
              </div>
              <div class="col-md-8 mb-4">
                <textarea class="form-control" id="home_page_second_text" name="home_page_second_text" rows="5">{{ $data[0]->home_page_second_text }}</textarea>
              </div>
              <div class="col-md-4 py-2">
                <label for="app_logo_footer">App Logo Footer</label>
              </div>
              <div class="col-md-8 mb-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="app_logo_footer" name="app_logo_footer">
                  <label id="app_logo_footer_label" class="custom-file-label">{{ $data[0]->app_logo_footer }}</label>
                  <input type="hidden" id="image-cropper-app-logo-footer" name="image-cropper-app-logo-footer">
                </div>
              </div>
              <div class="col-md-4 pt-5">
                <label for="footer_text">Home Page Second Text</label>
              </div>
              <div class="col-md-8 mb-4">
                <textarea class="form-control" id="footer_text" name="footer_text" rows="5">{{ $data[0]->footer_text }}</textarea>
              </div>
              <div class="col-md-4 py-2">
                <label for="footer_facebook">Footer Facebook Link</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="footer_facebook" name="footer_facebook"
                  value="{{ $data[0]->footer_facebook }}" required>
              </div>
              <div class="col-md-4 py-2">
                <label for="footer_instagram">Footer Instagram Link</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="footer_instagram" name="footer_instagram"
                  value="{{ $data[0]->footer_instagram }}" required>
              </div>
              <div class="col-md-4 py-2">
                <label for="footer_twitter">Footer Twitter Link</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="footer_twitter" name="footer_twitter"
                  value="{{ $data[0]->footer_twitter }}" required>
              </div>
              <div class="col-md-4 py-2">
                <label for="footer_whatsapp">Footer Whatsapp Link</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="footer_whatsapp" name="footer_whatsapp"
                  value="{{ $data[0]->footer_whatsapp }}" required>
              </div>
              <div class="col-md-4 py-2">
                <label for="footer_location">Footer Location</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="footer_location" name="footer_location"
                  value="{{ $data[0]->footer_location }}" required>
              </div>
              <div class="col-md-4 py-2">
                <label for="footer_location">Footer Copyright</label>
              </div>
              <div class="col-md-8 mb-4">
                <input type="text" class="form-control" id="footer_copyright" name="footer_copyright"
                  value="{{ $data[0]->footer_copyright }}">
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script>
    $(function() {
      var image = $('#image-preview')[0];
      var imageSecond = $('#image-preview-second')[0];
      var imageThird = $('#image-preview-third')[0];
      var cropper;
      let fileName;

      $('#favicon').on('change', function(event) {
        var files = event.target.files;
        fileName = files[0].name;
        $('#favicon_label').html(fileName);
      });

      $('#app_logo').on('change', function(event) {
        var files = event.target.files;
        fileName = files[0].name;
        if (files && files.length > 0) {
          let file = files[0];
          reader = new FileReader();
          reader.onload = function(e) {
            image.src = e.target.result;
            cropper = new Cropper(image, {
              aspectRatio: 183 / 55
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
        $('#app_logo_label').html(fileName);
        var canvas;
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 183,
            height: 55
          });
          var imageData = canvas.toDataURL();
          $('#image-cropper-app-logo').attr('value', imageData);
          $('#modal-preview-image').css('display', 'none');
          cropper.destroy();
        }
      });

      $('#home_page_image').on('change', function(event) {
        var files = event.target.files;
        fileName = files[0].name;
        if (files && files.length > 0) {
          let file = files[0];
          reader = new FileReader();
          reader.onload = function(e) {
            imageSecond.src = e.target.result;
            cropper = new Cropper(imageSecond, {
              aspectRatio: 1466 / 720
            });
          };
          reader.readAsDataURL(file);
          $('#modal-preview-image-second').css('display', 'block');
        }
      });

      $('#save-modal-second').on('click', function() {
        $('#home_page_image_label').html(fileName);
        var canvas;
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 1466,
            height: 720
          });
          var imageData = canvas.toDataURL();
          $('#image-cropper-home-page-image').attr('value', imageData);
          $('#modal-preview-image-second').css('display', 'none');
          cropper.destroy();
        }
      });

      $('#close-modal-second').on('click', function() {
        $('#modal-preview-image-second').css('display', 'none');
        cropper.destroy();
      })

      $('#cancel-modal-second').on('click', function() {
        $('#modal-preview-image-second').css('display', 'none');
        cropper.destroy();
      })

      $('#app_logo_footer').on('change', function(event) {
        var files = event.target.files;
        fileName = files[0].name;
        if (files && files.length > 0) {
          let file = files[0];
          reader = new FileReader();
          reader.onload = function(e) {
            imageThird.src = e.target.result;
            cropper = new Cropper(imageThird, {
              aspectRatio: 183 / 55
            });
          };
          reader.readAsDataURL(file);
          $('#modal-preview-image-third').css('display', 'block');
        }
      });

      $('#save-modal-third').on('click', function() {
        $('#app_logo_footer_label').html(fileName);
        var canvas;
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 183,
            height: 55
          });
          var imageData = canvas.toDataURL();
          $('#image-cropper-app-logo-footer').attr('value', imageData);
          $('#modal-preview-image-third').css('display', 'none');
          cropper.destroy();
        }
      });

      $('#close-modal-third').on('click', function() {
        $('#modal-preview-image-third').css('display', 'none');
        cropper.destroy();
      })

      $('#cancel-modal-third').on('click', function() {
        $('#modal-preview-image-third').css('display', 'none');
        cropper.destroy();
      })
    });
  </script>
@endsection
