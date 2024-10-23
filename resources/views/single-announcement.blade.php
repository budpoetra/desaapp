@extends('layouts.main')

@section('content')
  <section class="blog_area single-post-area mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 posts-list">
          <div class="single-post">
            <div class="feature-img">
              <img class="img-fluid" src="{{ asset('storage/' . $announcement->image) }}" alt="" width="100%">
            </div>
            <div class="blog_details">
              <h2>{{ $announcement->title }}</h2>
              <ul class="blog-info-link mt-3 mb-4">
                <li><a href="#"><i class="fa fa-user"></i>
                    Admin</a></li>
                <li><i class="far fa-clock"></i>
                  <?php
                  $diff = date_diff(date_create($announcement->created_at), date_create());
                  ?>
                  @if ($diff->days < 1)
                    {{ $announcement->created_at->diffForHumans() }}
                  @else
                    {{ date('d M Y', strtotime($announcement->created_at)) }}
                  @endif
                </li>
              </ul>
              <p class="excert">
                {!! $announcement->body !!}
              <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                  {{-- <button id="pdf-reader" class="genric-btn danger radius btn-block no-print"><i
                      class="fas fa-file-pdf"></i>
                    PDF</button> --}}
                  <a href="/announcements/{{ $announcement->slug }}/pdf" target="_blank"
                    class="genric-btn danger radius btn-block no-print"><i class="fas fa-file-pdf"></i>
                    PDF</a>
                </div>
              </div>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 no-print">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <form action="/announcements" method="GET">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder='Search Keyword'
                      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'"
                      value="{{ request('search') }}">
                    <div class="input-group-append">
                      <button class="btns" disabled="disabled"><i class="ti-search"></i></button>
                    </div>
                  </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                  type="submit">Search</button>
              </form>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('javascript')
  <script>
    $(function() {
      $('#pdf-reader').on('click', function() {
        print();
      });
    });
  </script>
@endsection
