@extends('user.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row d-flex justify-content-center">
      <div class="col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="/user/posts" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
              </span>
              <span class="text">Back to All Posts</span>
            </a>
            <a href="/user/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
              </span>
              <span class="text">Edit This Post</span>
            </a>
            <a href="/user/posts/{{ $post->slug }}" class="btn btn-danger btn-icon-split" data-confirm-delete="true">
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span class="text">Delete This Post</span>
            </a>
            <a href="/posts/{{ $post->slug }}" target="_blank" class="btn btn-info btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-share-square"></i>
              </span>
              <span class="text">View as Visitor</span>
            </a>
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-4" alt="...">
            <h3 class="mt-3 text-capitalize mb-3"><strong>{{ $post->title }}</strong></h3>
            <p class="mt-n2"><a href="/admin/users/{{ $post->user->username }}">{{ $post->user->name }} | </a>
              {{ $post->category->name }} |
              {{ date('d M Y', strtotime($post->created_at)) }}
            </p>
            <div class="body mt-3 text-justify">
              {!! $post->body !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
