@extends('layouts.main')

@section('content')
  <section class="blog_area single-post-area mt-4 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 posts-list">
          <iframe id="pdf-reader" src="{{ asset('storage/' . $ebook->ebook) }}#toolbar=0" width="100%" height="50000"
            frameborder="0"></iframe>
        </div>
        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <form action="/ebooks" method="GET">
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

@section('javascript')
  <script>
    $(document).ready(function() {
      $(document).on('contextmenu', function(e) {
        e.preventDefault();
      });

      const pdfUrl = $('#pdf-reader').attr('src'); // URL file PDF
      let pdfPage = 1;

      pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
        const pageCount = pdf.numPages;
        if (pageCount > 50) {
          pdfPage = 50;
        } else {
          pdfPage = pageCount;
        }
        $('#pdf-reader').css('height', pdfPage * 900)
      }).catch(function(error) {
        console.error('Error: ' + error);
      });
    });
  </script>
@endsection
