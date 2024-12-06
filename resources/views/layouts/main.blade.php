<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>{{ $data[0]->app_name }}</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon/favicon.ico') }}" />

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/ticker-style.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/slicknav.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/fontawesome-all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/themify-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />

  {{-- cropperjs --}}
  <link rel="stylesheet" href="{{ asset('/vendor/cropperjs/cropper.min.css') }}">

  {{-- Print CSS --}}
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }

    main {
      padding-top: 40px;
    }

    @media only screen and (max-width: 767px) {
      main {
        padding-top: 80px;
      }
    }

    #pdf-reader {
      pointer-events: none;
    }

    .input-group-append button {
      display: none;
    }

    a {
      color: #fc3f00;
    }

    a:hover {
      color: #b8afaf;
    }
  </style>
</head>

<body>
  <!-- Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{ asset('storage/' . $data[0]->app_logo) }}" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader Start -->

  @include('layouts.navbar')

  <main>
    @if ($primaryAds->count() > 0)
      @include('layouts.advertisements.primary-ad')
    @endif

    @yield('content')

    @if ($secondaryAds->count() > 0)
      @include('layouts.advertisements.secondary-ad')
    @endif
  </main>

  @include('layouts.footer')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

  <!-- JS here -->
  <!-- All JS Custom Plugins Link Here here -->
  <script src="{{ asset('/js/vendor/modernizr-3.5.0.min.js') }}"></script>
  <!-- Jquery, Popper, Bootstrap -->
  <script src="{{ asset('/js/vendor/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('/js/popper.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

  <!-- Jquery Mobile Menu -->
  <script src="{{ asset('/js/jquery.slicknav.min.js') }}"></script>

  <!-- Jquery Slick , Owl-Carousel Plugins -->
  <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('/js/slick.min.js') }}"></script>

  <!-- Date Picker -->
  <script src="{{ asset('/js/gijgo.min.js') }}"></script>

  <!-- One Page, Animated-HeadLin -->
  <script src="{{ asset('/js/wow.min.js') }}"></script>
  <script src="{{ asset('/js/animated.headline.js') }}"></script>
  <script src="{{ asset('/js/jquery.magnific-popup.js') }}"></script>

  <!-- Breaking New Pluging -->
  <script src="{{ asset('/js/jquery.ticker.js') }}"></script>
  <script src="{{ asset('/js/site.js') }}"></script>

  <!-- Scrollup, nice-select, sticky -->
  <script src="{{ asset('/js/jquery.scrollUp.min.js') }}"></script>
  <script src="{{ asset('/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('/js/jquery.sticky.js') }}"></script>

  <!-- contact js -->
  <script src="{{ asset('/js/contact.js') }}"></script>
  <script src="{{ asset('/js/jquery.form.js') }}"></script>
  <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('/js/mail-script.js') }}"></script>
  <script src="{{ asset('/js/jquery.ajaxchimp.min.js') }}"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="{{ asset('/js/plugins.js') }}"></script>
  <script src="{{ asset('/js/main.js') }}"></script>

  {{-- Cropperjs --}}
  <script src="{{ asset('/vendor/cropperjs/cropper.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('.slicknav_arrow').on('click', function() {
        $('.submenu').css('overflow', 'auto');
        $('.submenu').css('max-height', '450px');
      });
    });
  </script>

  @yield('javascript')
</body>

</html>
