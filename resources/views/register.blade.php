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
                  <img src="{{ asset('img/register-image.png') }}" alt="" width="100%" id="image-test" />
                </div>
                <div class="col-lg-7">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                    </div>
                    <form class="form-contact contact_form" method="POST" action="/register"
                      enctype="multipart/form-data">
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
                        <label for="password" class="col-sm-3 col-form-label pt-15">
                          Password
                        </label>
                        <input type="password" class="form-control form-control-user col-sm-9" id="password"
                          name="password" placeholder="Enter Password..." value="{{ old('password') }}" required>
                        @error('password')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="confPassword" class="col-sm-3 col-form-label">
                          Confirmation Password
                        </label>
                        <input type="password" class="form-control form-control-user col-sm-9" id="confPassword"
                          name="confPassword" placeholder="Enter Confirmation Password..." required>
                        @error('confPassword')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label pt-15">
                          Name
                        </label>
                        <input type="text"
                          class="form-control form-control-user col-sm-9 @error('name') is-invalid @enderror"
                          id="name" name="name" placeholder="Enter Name..." value="{{ old('name') }}" required>
                        @error('name')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="phone_number" class="col-sm-3 col-form-label pt-0">
                          Phone Number
                        </label>
                        <input type="number"
                          class="form-control form-control-user col-sm-9 @error('phone_number') is-invalid @enderror"
                          id="phone_number" name="phone_number" placeholder="Enter Phone Number..."
                          value="{{ old('phone_number') }}" required>
                        @error('phone_number')
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
                        <label for="gender" class="col-sm-2 col-form-label pt-15">
                          Gender
                        </label>
                        <div class="input-group col-sm-3 border-0">
                          <select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                        </div>
                        @error('gender')
                          <div class="col-sm-4"></div>
                          <div class="invalid-feedback col-sm-3">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="job" class="col-sm-3 col-form-label pt-15">
                          Job
                        </label>
                        <input type="text"
                          class="form-control form-control-user col-sm-9 @error('job') is-invalid @enderror"
                          id="job" name="job" placeholder="Enter Job..." value="{{ old('job') }}"
                          required>
                        @error('job')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="row mb-3">
                        <label for="image" class="col-sm-3 col-form-label">
                          Photo
                        </label>
                        <div class="custom-file col-sm-9">
                          <input type="file"
                            class="form-control form-control-user custom-file-input @error('image') is-invalid @enderror"
                            id="image" name="image" required>
                          <label class="custom-file-label py-2" for="image">Choose photo</label>
                        </div>
                        <input type="hidden" id="image-cropper" name="image-cropper">
                        @error('image')
                          <div class="col-sm-3"></div>
                          <div class="invalid-feedback col-sm-9">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      {{-- Modal Preview --}}
                      <div id="modal-preview-image" class="modal" tabindex="-1" role="dialog"
                        style="background-color: rgba(0,0,0,0.3)">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Image Preview</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" id="close-modal">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="max-height: 25em; overflow:scroll">
                              <img alt="" id="image-preview">
                            </div>
                            <div class="modal-footer">
                              <div class="button-group-area mt-40">
                                <button type="button" class="genric-btn danger-border radius"
                                  id="cancel-modal">Cancel</button>
                                <button type="button" class="genric-btn info-border radius"
                                  id="save-modal">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- End Modal Preview --}}

                      <button type="submit" class="genric-btn danger radius btn-block">Register</button>
                    </form>
                    <hr>
                    <div class="text-center" style="margin-top: -3em">
                      <a class="small text-primary" href="/forgot-password">Forgot Password?</a>
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
