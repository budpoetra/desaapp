<header>
  <!-- Header Start -->
  <div class="header-area">
    <div class="main-header">
      <div class="header-top black-bg d-none d-md-block">
        <div class="container">
          <div class="col-xl-12">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="header-info-left">
                <ul>
                  <li>
                    <img src="{{ asset('/img/icon/header_icon2.png') }}" alt="" />
                    {{ date('l, d M Y') }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom header-sticky sticky-bar sticky">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-xl-10 col-lg-10 col-md-12 header-flex sticky-flex">
              <!-- sticky -->
              <div class="sticky-logo">
                <a href="/"><img src="{{ asset('storage/' . $data[0]->app_logo) }}" alt="" /></a>
              </div>
              <!-- Main-menu -->
              <div class="main-menu d-none d-md-block">
                <nav>
                  <ul id="navigation">
                    @if ($contents->count() > 0)
                      <li><a href="#"><i class="fas fa-bars"></i></a>
                        <ul class="submenu">
                          @foreach ($contents as $content)
                            <li>
                              <a href="/content/{{ $content->slug }}">{{ $content->title }}</a>
                              <ul class="subsubmenu">
                                <div class="row m-0">
                                  @foreach ($content->subContents as $subContent)
                                    <div class="col-md-6 mb-3">
                                      <li class="d-block">
                                        <a class="pb-1 pt-1"
                                          href="/sub-content/{{ $subContent->slug }}">{{ $subContent->title }}</a>
                                      </li>
                                      @foreach ($subContent->subSubContents as $subSubContent)
                                        <a class="pb-0 pt-0" href="/sub-sub-content/{{ $subSubContent->slug }}">
                                          <small>{{ $subSubContent->title }}</small>
                                        </a>
                                      @endforeach
                                    </div>
                                  @endforeach
                                </div>
                              </ul>
                            </li>
                          @endforeach
                        </ul>
                      </li>
                    @endif
                    <li>
                      <a href="/">Home</a>
                    </li>
                    <li>
                      <a href="/posts">posts</a>
                    </li>
                    <li>
                      <a href="/ebooks">E-Books</a>
                    </li>
                    <li>
                      <a href="/videos">Videos</a>
                    </li>
                    <li>
                      <a href="/announcements">Announcements</a>
                    </li>
                    @if (!auth()->user())
                      <li>
                        <a href="/login">Login</a>
                      </li>
                    @else
                      <li>
                        @if (Auth()->user()->role == 'admin')
                          <a href="/admin">Dashboard</a>
                        @else
                          <a href="/user">Dashboard</a>
                        @endif
                      </li>
                      <li>
                        <form action="/logout" method="post">
                          @csrf
                          <button type="submit" class="genric-btn danger">Logout</button>
                        </form>
                      </li>
                    @endif
                  </ul>
                </nav>
              </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
              <div class="mobile_menu d-block d-md-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End -->
</header>
