@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row d-flex justify-content-center">
      <div class="col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="/admin/ebooks" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
              </span>
              <span class="text">Back to All Ebooks</span>
            </a>
            <a href="/admin/ebooks/{{ $ebook->slug }}/edit" class="btn btn-warning btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
              </span>
              <span class="text">Edit This Ebook</span>
            </a>
            <a href="/admin/ebooks/{{ $ebook->slug }}" class="btn btn-danger btn-icon-split" data-confirm-delete="true">
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span class="text">Delete This Ebook</span>
            </a>
            <a href="/ebooks/{{ $ebook->slug }}" target="_blank" class="btn btn-info btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-share-square"></i>
              </span>
              <span class="text">View as Visitor</span>
            </a>
            <div class="row mt-3">
              <div class="col-md-5">
                <img src="{{ asset('storage/' . $ebook->image) }}" class="card-img-top" alt="...">
              </div>
              <div class="col-md-7">
                <h4 class="mt-3 text-capitalize"><strong>{{ $ebook->title }}</strong></h4>
                <p class="mt-n2"><a href="/admin/users/{{ $ebook->user->username }}">{{ $ebook->user->name }}</a> |
                  {{ $ebook->category->name }} |
                  {{ date('d M Y', strtotime($ebook->created_at)) }}
                </p>
                <p>Download access :
                  @if ($ebook->download)
                    True
                  @else
                    False
                  @endif
                </p>
              </div>
            </div>
            <div class="body mt-3 text-justify">
              {!! $ebook->body !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
