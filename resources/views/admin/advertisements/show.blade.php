@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/admin/announcements" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Back to All Announcements</span>
        </a>
        <a href="/admin/announcements/{{ $announcement->slug }}/edit" class="btn btn-warning btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
          </span>
          <span class="text">Edit This Announcement</span>
        </a>
        <a href="/admin/announcements/{{ $announcement->slug }}" class="btn btn-danger btn-icon-split"
          data-confirm-delete="true">
          <span class="icon text-white-50">
            <i class="fas fa-trash"></i>
          </span>
          <span class="text">Delete This Announcement</span>
        </a>
        <h3 class="my-3 text-capitalize text-center"><strong>{{ $announcement->title }}</strong></h3>
        <img src="{{ asset('storage/' . $announcement->image) }}" class="card-img-top" alt="..." height="400">
        <div class="body mt-3 text-justify">
          {!! $announcement->body !!}
        </div>
      </div>
    </div>
  </div>
@endsection
