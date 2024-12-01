@extends('layouts.main')

@section('content')
  <section class="blog_area">
    <div class="container">
      <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
          <form action="/videos" method="GET">
            <div class="form-group">
              <div class="input-group mb-3">
                @if (request('user'))
                  <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <input type="text" class="form-control shadow" name="search" placeholder='Search Keyword'
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'"
                  value="{{ request('search') }}">
                <div class="input-group-append">
                  <button class="btns" type="submit"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </aside>
      </div>
      <div class="row" style="margin-top: -3em">
        @if ($videos->count())
          <div class="col-lg-12 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
              <div class="row">
                @foreach ($videos as $video)
                  <div class="col-lg-3">
                    <article class="blog_item">
                      <div class="blog_item_img">
                        <img class="card-img rounded-0" src="{{ asset('storage/' . $video->thumbnail) }}" alt="">
                        <a href="#" class="blog_item_date" style="margin-left: -40px">
                          <h3 style="font-size: 12px">{{ date('d M', strtotime($video->created_at)) }}</h3>
                        </a>
                      </div>

                      <div class="mt-4">
                        <a class="d-inline-block" href="videos/{{ $video->slug }}">
                          <h6>{{ $video->title }}</h6>
                        </a>
                        <ul class="blog-info-link">
                          <li style="font-size: 12px"><a href="/videos?user={{ $video->user->username }}"><i
                                class="fa fa-user"></i>
                              {{ $video->user->name }}</a></li>
                        </ul>
                      </div>
                    </article>
                  </div>
                @endforeach
              </div>
            </div>
            <nav class="blog-pagination justify-content-center d-flex mb-5" style="margin-top: -2em">
              {{ $videos->onEachSide(0)->links() }}
            </nav>
          </div>
        @else
          <div class="col-lg-8 mb-5 mb-lg-0">
            <h5>Video not found.</h5>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
