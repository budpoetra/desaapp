@extends('layouts.main')

@section('content')
  <section class="blog_area mt-4">
    <div class="container">
      <div class="row">
        @if ($announcements->count())
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
              @foreach ($announcements as $announcement)
                <article class="blog_item" style="margin-bottom: -1em">
                  <div class="blog_item_img">
                    <img class="card-img rounded-0" src="{{ asset('storage/' . $announcement->image) }}" alt="">
                    <a href="#" class="blog_item_date">
                      <h3>{{ date('d', strtotime($announcement->created_at)) }}</h3>
                      <p>{{ date('M', strtotime($announcement->created_at)) }}</p>
                    </a>
                  </div>

                  <div class="blog_details">
                    <a class="d-inline-block" href="announcements/{{ $announcement->slug }}">
                      <h2>{{ $announcement->title }}</h2>
                    </a>
                    <p style="margin-top: -2em">{!! Str::limit($announcement->body, 150) !!}</p>
                  </div>
                </article>
              @endforeach
            </div>
            <nav class="blog-pagination justify-content-center d-flex mb-5" style="margin-top: -2em">
              {{ $announcements->onEachSide(0)->links() }}
            </nav>
          </div>
        @else
          <div class="col-lg-8 mb-5 mb-lg-0">
            <h5>Announcement not found.</h5>
          </div>
        @endif

        <div class="col-lg-4">
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
