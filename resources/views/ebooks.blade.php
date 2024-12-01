@extends('layouts.main')

@section('content')
  <section class="blog_area mt-4">
    <div class="container">
      <div class="row">
        @if ($ebooks->count())
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
              <div class="row">
                @foreach ($ebooks as $ebook)
                  <div class="col-lg-4">
                    <article class="blog_item">
                      <div class="blog_item_img">
                        <img class="card-img rounded-0" src="{{ asset('storage/' . $ebook->image) }}" alt="">
                        <a href="#" class="blog_item_date" style="margin-left: -40px">
                          <h3 style="font-size: 12px">{{ date('d M', strtotime($ebook->created_at)) }}</h3>
                        </a>
                      </div>

                      <div class="mt-4">
                        <a class="d-inline-block" href="ebooks/{{ $ebook->slug }}">
                          <h6>{{ $ebook->title }}</h6>
                        </a>
                        <ul class="blog-info-link">
                          <li style="font-size: 12px"><a href="/ebooks?user={{ $ebook->user->username }}"><i
                                class="fa fa-user"></i>
                              {{ $ebook->user->name }}</a></li>
                          <li style="font-size: 12px"><a href="/ebooks?category={{ $ebook->category->slug }}"><i
                                class="fas fa-list"></i>
                              {{ $ebook->category->name }}</a></li>
                        </ul>
                      </div>
                    </article>
                  </div>
                @endforeach
              </div>
            </div>
            <nav class="blog-pagination justify-content-center d-flex mb-5" style="margin-top: -2em">
              {{ $ebooks->onEachSide(0)->links() }}
            </nav>
          </div>
        @else
          <div class="col-lg-8 mb-5 mb-lg-0">
            <h5>E-Book not found.</h5>
          </div>
        @endif

        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <form action="/ebooks" method="GET">
                <div class="form-group">
                  <div class="input-group mb-3">
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
                    <a href="/ebooks?category={{ $category->slug }}" class="d-flex">
                      <p>{{ $category->name }}</p>
                      <p>({{ $allEbooks->where('category_id', $category->id)->count() }})</p>
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
