@extends('layouts.main')

@section('content')
  <section class="blog_area mt-4">
    <div class="container">
      <div class="row">
        @if ($posts->count())
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
              @foreach ($posts as $post)
                <article class="blog_item">
                  <div class="blog_item_img">
                    <img class="card-img rounded-0" src="{{ asset('storage/' . $post->image) }}" alt="">
                    <a href="#" class="blog_item_date">
                      <h3>{{ date('d', strtotime($post->created_at)) }}</h3>
                      <p>{{ date('M', strtotime($post->created_at)) }}</p>
                    </a>
                  </div>

                  <div class="blog_details">
                    <a class="d-inline-block" href="posts/{{ $post->slug }}">
                      <h2>{{ $post->title }}</h2>
                    </a>
                    <p style="margin-top: -2em">{!! Str::limit($post->body, 150) !!}</p>
                    <ul class="blog-info-link">
                      <li><a href="/posts?user={{ $post->user->username }}"><i class="fa fa-user"></i>
                          {{ $post->user->name }}</a></li>
                      <li><a href="/posts?category={{ $post->category->slug }}"><i class="fas fa-list"></i>
                          {{ $post->category->name }}</a></li>
                    </ul>
                  </div>
                </article>
              @endforeach
            </div>
            <nav class="blog-pagination justify-content-center d-flex mb-5" style="margin-top: -2em">
              {{ $posts->links() }}
            </nav>
          </div>
        @else
          <div class="col-lg-8 mb-5 mb-lg-0">
            <h5>Post not found.</h5>
          </div>
        @endif

        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <form action="/posts" method="GET">
                <div class="form-group">
                  <div class="input-group">
                    @if (request('category'))
                      <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                      <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
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
