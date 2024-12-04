@extends('layouts.main')

@section('content')
  <div class="trending-area fix">
    <div class="container">
      <nav aria-label="breadcrumb" class="mt-10">
        <ol class="breadcrumb" style="background-color: white">
          <li class="breadcrumb-item"><a href="/" style="color: black"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="/content/{{ $subContent[0]->content->slug }}"
              style="color: black">{{ $subContent[0]->content->title }}</a></li>
          <li class="breadcrumb-item" style="color: #fc3f00">{{ $subContent[0]->title }}</li>
        </ol>
      </nav>
      <h1 class="text-center">{{ $subContent[0]->title }}</h1>
      <div class="card text-bg-dark mt-4">
        <img src="{{ asset('storage/' . $subContent[0]->image) }}" class="card-img rounded" alt="...">
      </div>
      <p class="excert">
        {!! $subContent[0]->body !!}
      </p>
    </div>
  </div>

  <section class="whats-news-area pt-50 pb-20">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row d-flex justify-content-between">
            <div class="col-lg-6 col-md-6">
              <div class="section-tittle mb-30">
                <h5>Other Content On {{ $subContent[0]->title }} :</h5>
              </div>
            </div>
            <div class="col-lg-9 col-md-9">
              <div class="properties__button">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="whats-news-caption">
                    <div class="row">
                      @foreach ($subContent[0]->subSubContents as $subSubContent)
                        <a href="/sub-sub-content/{{ $subSubContent->slug }}">
                          <div class="col-lg-3 col-md-3">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img src="{{ asset('storage/' . $subSubContent->image) }}" alt="">
                              </div>
                              <div class="what-cap">
                                <h4><a href="/sub-sub-content/{{ $subSubContent->slug }}">{{ $subSubContent->title }}</a>
                                </h4>
                              </div>
                            </div>
                          </div>
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
