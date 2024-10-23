@extends('user.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row d-flex justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="/user/videos" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
              </span>
              <span class="text">Back to All Videos</span>
            </a>
            <a href="/user/videos/{{ $video->slug }}/edit" class="btn btn-warning btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
              </span>
              <span class="text">Edit This Video</span>
            </a>
            <a href="/user/videos/{{ $video->slug }}" class="btn btn-danger btn-icon-split" data-confirm-delete="true">
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span class="text">Delete This Video</span>
            </a>
            <a href="/videos/{{ $video->slug }}" target="_blank" class="btn btn-info btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-share-square"></i>
              </span>
              <span class="text">View as Visitor</span>
            </a>
            <div class="mt-3">
              @if ($video->source == 'upload')
                <video width="100%" controls>
                  <source src="{{ asset('storage/' . $video->video) }}" type="{{ $video->type }}">
                </video>
              @else
                <iframe width="100%" height="560" src="https://{{ $video->yt_link }}" title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              @endif
            </div>
            <h3 class="mt-3 text-capitalize"><strong>{{ $video->title }}</strong></h3>
            <p class="mt-n2">Video by {{ $video->user->name }} | {{ date('d M Y', strtotime($video->created_at)) }}
            </p>
            <div class="body mt-3 text-justify">
              {!! $video->body !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
