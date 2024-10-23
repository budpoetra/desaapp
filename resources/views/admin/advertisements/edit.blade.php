@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Advertisement</h1>

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
            <form class="user mt-4" method="POST" action="/admin/advertisements/{{ $advertisement->slug }}"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" placeholder="Enter Title Advertisement" value="{{ old('title', $advertisement->title) }}"
                  required>
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
                  <option value="primary" {{ $advertisement->type == 'primary' ? 'selected' : '' }}>Primary</option>
                  <option value="seccondary" {{ $advertisement->type == 'seccondary' ? 'selected' : '' }}>Seccondary
                  </option>
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
                  <option value="false" {{ $advertisement->target ? '' : 'selected' }}>In tab</option>
                  <option value="true" {{ $advertisement->target ? 'selected' : '' }}>New tab</option>
                </select>
                @error('target')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                  name="url" placeholder="Enter Url Advertisement" value="{{ old('url', $advertisement->url) }}"
                  required>
                @error('url')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-group mb-5">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('advertisement') is-invalid @enderror"
                    id="advertisement" name="advertisement" onchange="previewImage()">
                  <label id="label-image" class="custom-file-label"
                    for="inputGroupFile01">{{ $advertisement->advertisement }}</label>
                </div>
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

  <script>
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
      const labelImage = document.querySelector('#label-image');
      const files = event.target.files;
      const fileName = files[0].name;

      imgPreview.style.displey = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
        labelImage.innerHTML = fileName;
      }
    }
  </script>
@endsection
