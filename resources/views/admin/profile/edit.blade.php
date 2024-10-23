@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Profile</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/profiles" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back</span>
        </a>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <form class="user mt-3" method="POST" action="/admin/profiles/{{ $user->username }}">
              @csrf
              @method('PUT')
              <div class="row">
                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                <div class="col-lg-3" style="padding-top: 12px">Name</div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                      id="name" name="name" placeholder="Enter Your New Name"
                      value="{{ old('name', $user->name) }}" required>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3" style="padding-top: 12px">Phone Number</div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <input type="hidden" id="oldPhoneNumber" name="oldPhoneNumber" value="{{ $user->phone_number }}">
                    <input type="number"
                      class="form-control form-control-user @error('phone_number') is-invalid @enderror" id="phone_number"
                      name="phone_number" placeholder="Enter Your New Phone Number"
                      value="{{ old('phone_number', $user->phone_number) }}" required>
                    @error('phone_number')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3" style="padding-top: 12px">Email</div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <input type="hidden" id="oldEmail" name="oldEmail" value="{{ $user->email }}">
                    <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                      id="email" name="email" placeholder="Enter Your New Email"
                      value="{{ old('email', $user->email) }}" required>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3" style="padding-top: 12px">Username</div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <input type="hidden" id="oldUsername" name="oldUsername" value="{{ $user->username }}">
                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                      id="username" name="username" placeholder="Enter Your Username"
                      value="{{ old('username', $user->username) }}" required>
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3" style="padding-top: 12px">Date of Birth</div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl"
                      value="{{ old('ttl', $user->ttl) }}" required>
                  </div>
                </div>
                <div class="col-lg-2" style="padding-top: 12px">Gender</div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <div class="input-group mt-1">
                      <select class="custom-select" id="inputGroupSelect01" name="gender" required>
                        @if ($user->gender == 'male')
                          <option value="male" selected>Male</option>
                          <option value="female">Female</option>
                        @else
                          <option value="male">Male</option>
                          <option value="female" selected>Female</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3" style="padding-top: 12px">Job</div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('job') is-invalid @enderror"
                      id="job" name="job" placeholder="Enter Your New Job"
                      value="{{ old('job', $user->job) }}" required>
                    @error('job')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3" style="padding-top: 6px">Image</div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                      <input type="hidden" id="old-image" name="old-image" value="{{ $user->image }}">
                      <input type="hidden" id="image-cropper" name="image-cropper">
                      @error('image')
                        <div class="col-sm-3"></div>
                        <div class="invalid-feedback col-sm-9">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                </div>
                <div class="col-md-4"></div>
            </form>
          </div>
        </div>
        <div class="col-md-3"></div>
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
