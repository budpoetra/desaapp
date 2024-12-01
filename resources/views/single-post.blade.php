@extends('layouts.main')

@section('content')
  <section class="blog_area single-post-area mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 posts-list">
          <div class="single-post">
            <div class="feature-img">
              <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="">
            </div>
            <div class="blog_details">
              <h2>{{ $post->title }}</h2>
              <ul class="blog-info-link mt-3 mb-4">
                <li><a href="/posts?user={{ $post->user->username }}"><i class="fa fa-user"></i>
                    {{ $post->user->name }}</a></li>
                <li><a href="/posts?category={{ $post->category->slug }}"><i class="fas fa-list"></i>
                    {{ $post->category->name }}</a></li>
                <li><i class="far fa-clock"></i>
                  <?php
                  $diff = date_diff(date_create($post->created_at), date_create());
                  ?>
                  @if ($diff->days < 1)
                    {{ $post->created_at->diffForHumans() }}
                  @else
                    {{ date('d M Y', strtotime($post->created_at)) }}
                  @endif
                </li>
              </ul>
              <p class="excert">
                {!! $post->body !!}
              </p>
            </div>
          </div>
          {{-- <div class="navigation-top">
            <div class="d-sm-flex justify-content-between text-center">
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fab fa-behance"></i></a></li>
              </ul>
            </div>
          </div> --}}
        </div>
        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <form action="/posts" method="GET">
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
            <aside class="single_sidebar_widget post_category_widget">
              <h4 class="widget_title">Category</h4>
              <ul class="list cat-list">
                @foreach ($categories as $category)
                  <li>
                    <a href="/posts?category={{ $category->slug }}" class="d-flex">
                      <p>{{ $category->name }}</p>
                      <p>({{ $allPosts->where('category_id', $category->id)->count() }})</p>
                    </a>
                  </li>
                @endforeach
              </ul>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
