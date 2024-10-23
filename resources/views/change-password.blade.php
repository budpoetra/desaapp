@extends('layouts.index')

@section('content')
  <div class="gray-bg">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center mt-30">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-5 d-lg-block bg-login-image d-flex align-content-center pl-20">
                  <img src="{{ asset('img/change-password-image.png') }}" alt="" width="100%" id="image-test" />
                </div>
                <div class="col-lg-7">
                  <div class="p-5">
                    <div class="text-center mb-5">
                      <h1 class="h4 text-gray-900">We Found Your Data!</h1>
                      <small class="form-text text-muted">Please enter your new password that is easy for you to
                        remember.</small>
                    </div>
                    <form class="form-contact contact_form" method="POST" action="/change-password">
                      @csrf
                      <input type="hidden" class="form-control form-control-user col-sm-9" id="username" name="username"
                        placeholder="Enter Username..." value="{{ $username }}" required>
                      <div class="row mb-3">
                        <label for="newPassword" class="col-sm-3 col-form-label pt-1">
                          New Password
                        </label>
                        <input type="password"
                          class="form-control form-control-user col-sm-9 @error('newPassword') is-invalid @enderror"
                          id="newPassword" name="newPassword" placeholder="Enter New Password..."
                          value="{{ session('newPassword') }}" required>
                        @error('newPassword')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-5">
                        <label for="confPassword" class="col-sm-3 col-form-label pt-1">
                          Confirmation Password
                        </label>
                        <input type="password"
                          class="form-control form-control-user col-sm-9 @error('confPassword') is-invalid @enderror"
                          id="confPassword" name="confPassword" placeholder="Enter Confirmation Password..."
                          value="{{ session('confPassword') }}" required>
                        @error('confPassword')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <button type="submit" class="genric-btn danger radius btn-block">Change Password</button>
                    </form>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
              aspectRatio: 1
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
            width: 720,
            height: 720
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
