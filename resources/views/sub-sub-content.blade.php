@extends('layouts.main')

@section('content')
  <div class="trending-area fix mb-4">
    <div class="container">
      <nav aria-label="breadcrumb" class="mt-10">
        <ol class="breadcrumb" style="background-color: white">
          <li class="breadcrumb-item"><a href="/" style="color: black"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="/content/{{ $subSubContent[0]->subContent->content->slug }}"
              style="color: black">{{ $subSubContent[0]->subContent->content->title }}</a></li>
          <li class="breadcrumb-item"><a href="/sub-content/{{ $subSubContent[0]->subContent->slug }}"
              style="color: black">{{ $subSubContent[0]->subContent->title }}</a></li>
          <li class="breadcrumb-item" style="color: #fc3f00">{{ $subSubContent[0]->title }}</li>
        </ol>
      </nav>
      <h1 class="text-center">{{ $subSubContent[0]->title }}</h1>
      <div class="card text-bg-dark mt-4">
        <img src="{{ asset('storage/' . $subSubContent[0]->image) }}" class="card-img rounded" alt="...">
      </div>
      <p class="excert">
        {!! $subSubContent[0]->body !!}
      </p>
    </div>
  </div>
@endsection
