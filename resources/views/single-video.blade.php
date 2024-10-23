@extends('layouts.main')

@section('content')
  <section class="blog_area single-post-area">
    <div class="container">
      <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
          <form action="/videos" method="GET">
            <div class="form-group">
              <div class="input-group mb-3">
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
        <div class="col-lg-9 posts-list">
          <div class="single-post">
            <div class="feature-img">
              <div class="youtube-area">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="video-items-active">
                        <div class="video-items text-center">
                          @if ($video->source == 'upload')
                            <video width="100%" controls>
                              <source src="{{ asset('storage/' . $video->video) }}" type="{{ $video->type }}">
                            </video>
                          @else
                            <iframe width="100%" height="560" src="https://{{ $video->yt_link }}"
                              title="YouTube video player" frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="video-info" style="margin-top: -1em">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="blog_details">
                          <h2>{{ $video->title }}</h2>
                          <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="/videos?user={{ $video->user->username }}"><i class="fa fa-user"></i>
                                {{ $video->user->name }}</a></li>
                            <li><i class="far fa-clock"></i>
                              <?php
                              $diff = date_diff(date_create($video->created_at), date_create());
                              ?>
                              @if ($diff->days < 1)
                                {{ $video->created_at->diffForHumans() }}
                              @else
                                {{ date('d M Y', strtotime($video->created_at)) }}
                              @endif
                            </li>
                          </ul>
                          <p class="excert">
                            {!! $video->body !!}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          @if ($playlists->count() > 0 and $video->playlist_video_id != null)
            <div class="blog_right_sidebar">
              <aside class="single_sidebar_widget post_category_widget">
                <p style="margin-top: -3em; margin-bottom: -2px;">Playlists :</p>
                <div style="max-height: 30em; overflow:auto;">
                  @foreach ($playlists as $playlist)
                    <div class="card mb-2">
                      <div class="row no-gutters">
                        <div class="col-md-6">
                          <img src="{{ asset('storage/' . $playlist->thumbnail) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-6 pl-1 pt-2 d-flex align-items-center">
                          <a href="/videos/{{ $playlist->slug }}">
                            <p style="font-size: 12px; line-height: 1;">{{ Str::limit($playlist->title, 25) }}</p>
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </aside>
            </div>
          @endif
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget post_category_widget">
              <p style="margin-top: -3em; margin-bottom: -2px;">New Videos :</p>
              @foreach ($videos as $video)
                <div class="card mb-2">
                  <a href="/videos/{{ $video->slug }}">
                    <img src="{{ asset('storage/' . $video->thumbnail) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h6 class="card-title">{{ $video->title }}</h6>
                      <ul class="blog-info-link">
                        <li><a href="/videos?user={{ $video->user->username }}"><i class="fa fa-user"></i>
                            {{ $video->user->name }}</a></li>
                      </ul>
                    </div>
                  </a>
                </div>
              @endforeach
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
