<html>

<head>
  <style>
    @page {
      margin: 100px 50px;
    }

    header {
      position: fixed;
      top: -60px;
      width: 100%;
      background-color: white;
      color: white;
      text-align: center;
      line-height: 35px;
    }

    footer {
      position: fixed;
      bottom: -60px;
      height: 50px;
      width: 85%;
      background-color: white;
      color: black;
      line-height: 35px;
    }

    main {
      margin-top: 10px;
    }

    p {
      text-align: justify;
    }

    .pagenum:before {
      content: counter(page);
    }
  </style>
</head>

<body>
  <header>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $data[0]->app_logo))) }}"
      alt="">
  </header>

  <footer>
    @php
      $link = asset('announcements/' . $announcement->slug);
    @endphp
    <a href="">{{ $link }}</a>
  </footer>

  <main>
    <img
      src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $announcement->image))) }}"
      alt="" width="100%">
    <h2>{{ $announcement->title }}</h2>
    <?php
    $diff = date_diff(date_create($announcement->created_at), date_create());
    ?>
    @if ($diff->days < 1)
      {{ $announcement->created_at->diffForHumans() }}
    @else
      {{ date('d M Y', strtotime($announcement->created_at)) }}
    @endif
    </li>
    <p>
      {!! $announcement->body !!}
    </p>
  </main>

  <script type="text/php">
    if (isset($pdf)) {
        $x = 497;
        $y = 783;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
</body>

</html>
