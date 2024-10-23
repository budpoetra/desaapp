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
                  <img src="{{ asset('img/forgot-password-image.png') }}" alt="" width="100%" id="image-test" />
                </div>
                <div class="col-lg-7">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Forgot Password!</h1>
                      @if (session('error'))
                        <p class="text-danger" style="margin: -5% 0 3% 0">{{ session('error') }}</p>
                      @endif
                    </div>
                    <form class="form-contact contact_form" method="POST" action="/forgot-password">
                      @csrf
                      <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label pt-15">
                          Email
                        </label>
                        <input type="email"
                          class="form-control form-control-user col-sm-9 @error('email') is-invalid @enderror"
                          id="email" name="email" placeholder="Enter Email Address..." value="{{ old('email') }}"
                          required autofocus>
                        @error('email')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label pt-15">
                          Username
                        </label>
                        <input type="text"
                          class="form-control form-control-user col-sm-9 @error('username') is-invalid @enderror"
                          id="username" name="username" placeholder="Enter Username..." value="{{ old('username') }}"
                          required>
                        @error('username')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="ttl" class="col-sm-3 col-form-label pt-15">
                          Birthday
                        </label>
                        <input type="date"
                          class="form-control form-control-user col-sm-4 @error('ttl') is-invalid @enderror"
                          id="ttl" name="ttl" placeholder="Enter Birthday..." value="{{ old('ttl') }}"
                          required>
                        @error('ttl')
                          <div class="col-sm-4"></div>
                          <div class="invalid-feedback col-sm-3">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      <button type="submit" class="genric-btn danger radius btn-block">Check</button>
                    </form>
                    <hr>
                    <div class="text-center" style="margin-top: -3em">
                      <a class="small text-primary" href="/register">Create an Account!</a>
                    </div>
                    <div class="text-center">
                      <a class="small text-primary" href="/login">Have an Account!</a>
                    </div>
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
