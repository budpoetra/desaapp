@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Video</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/videos" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Videos</span>
        </a>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <form class="user mt-4" method="POST" action="/admin/videos/{{ $video->slug }}"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" placeholder="Enter Title Video" value="{{ old('title', $video->title) }}" required>
                @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <p class="d-inline mr-2">Choose your video source :</p>
              <div class="form-check d-inline mb-4 mr-4">
                <input class="form-check-input" type="radio" name="source" id="source1" value="upload"
                  @if ($video->source == 'upload') checked @endif>
                <label class="form-check-label" for="source1">
                  From upload
                </label>
              </div>
              <div class="form-check d-inline">
                <input class="form-check-input" type="radio" name="source" id="source2" value="youtube"
                  @if ($video->source == 'youtube') checked @endif>
                <label class="form-check-label" for="source2">
                  From youtube
                </label>
              </div>
              <div class="input-group mb-3 mt-3">
                <div class="custom-file" id="form-input-video">
                  <input type="hidden" id="checkVideo" value="{{ $video->video }}">
                  @if ($video->source == 'upload')
                    <input type="file" class="custom-file-input @error('video') is-invalid @enderror" id="video"
                      name="video" onchange="previewVideo()">
                    <label id="label-video" class="custom-file-label"
                      for="inputGroupFile01">{{ old('video', $video->video) }}</label>
                  @else
                    <input type="text" class="form-control @error('yt_link') is-invalid @enderror" id="yt_link"
                      name="yt_link" placeholder="Enter Your Youtube Link" value="{{ old('yt_link', $video->yt_link) }}">
                  @endif
                </div>
                @error('video')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                @error('yt_link')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="custom-file col-sm-12 mb-3">
                <input type="file"
                  class="form-control form-control-user custom-file-input @error('image') is-invalid @enderror"
                  id="image" name="image">
                <label class="custom-file-label py-2" for="image">{{ old('title', $video->thumbnail) }}</label>
              </div>
              <input type="hidden" id="image-cropper" name="image-cropper">
              @error('image')
                <div class="col-sm-3"></div>
                <div class="invalid-feedback col-sm-9">
                  {{ $message }}
                </div>
              @enderror
              <p class="d-inline mr-2">Make it a popular video :</p>
              <div class="form-check d-inline mr-4">
                <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular"
                  @if ($video->is_popular) checked @endif>
                <label class="form-check-label" for="is_popular">
                  Yes do it.
                </label>
              </div>
              <div class="form-group mt-4">
                <input id="body" type="hidden" name="body" value="{{ @old('body', $video->body) }}">
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
    function previewVideo() {
      const labelVideo = document.querySelector('#label-video');
      const files = event.target.files;
      const fileName = files[0].name;
      labelVideo.innerHTML = fileName;
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
              aspectRatio: 16 / 9
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
            width: 666,
            height: 375
          });
          var imageData = canvas.toDataURL();
          $('#image-cropper').attr('value', imageData);
          $('#modal-preview-image').css('display', 'none');
          cropper.destroy();
        }
      });

      let checkVideo = $('#checkVideo').val();
      $('#source1').on('click', function() {
        if (checkVideo == '') {
          $('#form-input-video').html(
            "<input type='file' class='custom-file-input @error('video') is-invalid @enderror' id='video' name='video' onchange='previewVideo()'><label id='label-video' class='custom-file-label' for='inputGroupFile01'>Only .mp4 Video</label>"
          )
        } else {
          $('#form-input-video').html(
            "<input type='file' class='custom-file-input @error('video') is-invalid @enderror' id='video' name='video' onchange='previewVideo()'><label id='label-video' class='custom-file-label' for='inputGroupFile01'>{{ old('video', $video->video) }}</label>"
          )
        }
      });
      $('#source2').on('click', function() {
        $('#form-input-video').html(
          "<input type='text' class='form-control @error('yt_link') is-invalid @enderror' id='yt_link' name='yt_link' placeholder='Enter Your Youtube Link' value='{{ old('yt_link', $video->yt_link) }}'>"
        )
      });
    });
  </script>
@endsection
