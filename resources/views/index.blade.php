@extends('layouts.index')

@section('content')
  <div class="trending-area fix top-content top-content">
    <div class="container">
      <div class="card text-bg-dark mt-60">
        <img src="{{ asset('storage/' . $data[0]->home_page_image) }}" class="card-img rounded" alt="...">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <div class="card-title text-center flex-fill p-3" style="background-color: rgba(0, 0, 0, 0.7)">
            <h3 class="text-white">{{ $data[0]->home_page_header_text }}</h3>
            <h6 class="text-white mt-3 text-monospace">{{ $data[0]->home_page_second_text }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if ($primaryAds->count() > 0)
    @include('layouts.advertisements.primary-ad')
  @endif

  @if ($isPopularVideos->count() > 0)
    <section class="whats-news-area gray-bg mt-20 pt-10">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row d-flex justify-content-between">
              <div class="col-lg-6 col-md-6">
                <div class="section-tittle mb-30">
                  <h3>Most Popular Videos :</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                  <!-- card one -->
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="whats-news-caption">
                      <div class="row">
                        @foreach ($isPopularVideos as $popularVideo)
                          <div class="col-lg-4 col-md-4">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img src="{{ asset('storage/' . $popularVideo->thumbnail) }}" alt="">
                              </div>
                              <div class="what-cap">
                                <a href="/videos?user={{ $popularVideo->user->username }}"><span
                                    class="color{{ rand(1, 4) }}">{{ $popularVideo->user->name }}</span></a>
                                <h4><a
                                    href="/videos/{{ $popularVideo->slug }}">{{ Str::limit($popularVideo->title, 40, '...') }}</a>
                                </h4>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Nav Card -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Trending Area Start -->
  <div class="trending-area fix">
    <div class="container">
      <div class="trending-main">
        <!-- Trending Tittle -->
        <div class="row">
          <div class="col-lg-12">
            <div class="trending-tittle">
              <strong>New Posts</strong>
              <div class="trending-animated">
                <ul id="js-news" class="js-hidden">
                  @foreach ($posts as $post)
                    <li class="news-item"><a href="/posts/{{ $post->slug }}"
                        style="text-decoration: none">{{ Str::limit($post->title, 70) }}</a></li>
                  @endforeach
                </ul>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <!-- Trending Top -->
            <div class="trending-top mb-30">
              <div class="trend-top-img">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="">
                <div class="trend-top-cap">
                  <span>{{ $posts[0]->category->name }}</span>
                  <h2><a href="/posts/{{ $post->slug }}">{{ Str::limit($posts[0]->title, '80') }}</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- Trending Bottom -->
            <div class="trending-bottom">
              <div class="row">
                @foreach ($posts->skip(1)->take(3) as $post)
                  <div class="col-lg-4">
                    <div class="single-bottom mb-35">
                      <div class="trend-bottom-img mb-30">
                        <img class="rounded" src="{{ asset('storage/' . $post->image) }}" alt="">
                      </div>
                      <div class="trend-bottom-cap">
                        <span class="{{ $post->category->color }}">{{ $post->category->name }}</span>
                        <h4><a href="/posts/{{ $post->slug }}">{{ Str::limit($post->title, '40') }}</a></h4>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- Riht content -->
          <div class="col-lg-4">
            @foreach ($posts->skip(4) as $post)
              <div class="trand-right-single d-flex">
                <div class="trand-right-img">
                  <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
                <div class="trand-right-cap">
                  <span class="{{ $post->category->color }}">{{ $post->category->name }}</span>
                  <h4><a href="/posts/{{ $post->slug }}">{{ Str::limit($post->title, '40') }}</a></h4>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Trending Area End -->

  <div class="weekly2-news-area gray-bg pt-4 pb-4">
    <div class="container">
      <div class="weekly2-wrapper">
        <!-- section Tittle -->
        <div class="row">
          <div class="col-lg-12">
            <div class="section-tittle mb-10">
              <h3>E-Books</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="weekly2-news-active dot-style d-flex dot-style">
              @foreach ($ebooks as $ebook)
                <div class="weekly2-single">
                  <div class="weekly2-img">
                    <img src="{{ asset('storage/' . $ebook->image) }}" alt="" />
                  </div>
                  <div class="weekly2-caption">
                    <span class="{{ $ebook->category->color }}">{{ $ebook->category->name }}</span>
                    <p>{{ date('d M Y', strtotime($ebook->created_at)) }}</p>
                    <h4>
                      <a href="/ebooks/{{ $ebook->slug }}">{{ $ebook->title }}</a>
                    </h4>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Weekly-News -->
  <!--  Recent Articles start -->
  <div class="recent-articles pt-20">
    <div class="container">
      <div class="recent-wrapper">
        <!-- section Tittle -->
        <div class="row">
          <div class="col-lg-12">
            <div class="section-tittle mb-30">
              <h3>Videos</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="recent-active dot-style d-flex">
              @foreach ($videos as $video)
                <div class="single-recent mb-100">
                  <div class="what-img">
                    <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="" />
                  </div>
                  <div class="what-cap">
                    <span class="color{{ rand(1, 4) }}">{{ $video->user->name }}</span>
                    <h4>
                      <a href="videos/{{ $video->slug }}">{{ $video->title }}</a>
                    </h4>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Recent Articles End -->

  @if ($secondaryAds->count() > 0)
    @include('layouts.advertisements.secondary-ad')
  @endif
@endsection
