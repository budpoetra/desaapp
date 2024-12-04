@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Total Users</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Total Posts</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total E-Books
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ebooks->count() }}</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  Total Videos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $videos->count() }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-video fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Data For Chart --}}
    @php
      $thisYear = date('Y');
    @endphp
    <input type="hidden" id="janPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-01-01 00:00:00')->where('created_at', '<=', $thisYear . '-01-31 23:59:59')->count() }}">
    <input type="hidden" id="febPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-02-01 00:00:00')->where('created_at', '<=', $thisYear . '-02-29')->count() }}">
    <input type="hidden" id="marPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-03-01 00:00:00')->where('created_at', '<=', $thisYear . '-03-31 23:59:59')->count() }}">
    <input type="hidden" id="aprPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-04-01 00:00:00')->where('created_at', '<=', $thisYear . '-04-30')->count() }}">
    <input type="hidden" id="mayPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-05-01 00:00:00')->where('created_at', '<=', $thisYear . '-05-31 23:59:59')->count() }}">
    <input type="hidden" id="junPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-06-01 00:00:00')->where('created_at', '<=', $thisYear . '-06-30')->count() }}">
    <input type="hidden" id="julPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-07-01 00:00:00')->where('created_at', '<=', $thisYear . '-07-31 23:59:59')->count() }}">
    <input type="hidden" id="augPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-08-01 00:00:00')->where('created_at', '<=', $thisYear . '-08-31 23:59:59')->count() }}">
    <input type="hidden" id="sepPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-09-01 00:00:00')->where('created_at', '<=', $thisYear . '-09-30')->count() }}">
    <input type="hidden" id="octPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-10-01 00:00:00')->where('created_at', '<=', $thisYear . '-10-31 23:59:59')->count() }}">
    <input type="hidden" id="novPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-11-01 00:00:00')->where('created_at', '<=', $thisYear . '-11-30')->count() }}">
    <input type="hidden" id="decPostsCount"
      value="{{ $posts->where('created_at', '>=', $thisYear . '-12-01 00:00:00')->where('created_at', '<=', $thisYear . '-12-31 23:59:59')->count() }}">

    <input type="hidden" id="janEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-01-01 00:00:00')->where('created_at', '<=', $thisYear . '-01-31 23:59:59')->count() }}">
    <input type="hidden" id="febEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-02-01 00:00:00')->where('created_at', '<=', $thisYear . '-02-29')->count() }}">
    <input type="hidden" id="marEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-03-01 00:00:00')->where('created_at', '<=', $thisYear . '-03-31 23:59:59')->count() }}">
    <input type="hidden" id="aprEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-04-01 00:00:00')->where('created_at', '<=', $thisYear . '-04-30')->count() }}">
    <input type="hidden" id="mayEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-05-01 00:00:00')->where('created_at', '<=', $thisYear . '-05-31 23:59:59')->count() }}">
    <input type="hidden" id="junEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-06-01 00:00:00')->where('created_at', '<=', $thisYear . '-06-30')->count() }}">
    <input type="hidden" id="julEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-07-01 00:00:00')->where('created_at', '<=', $thisYear . '-07-31 23:59:59')->count() }}">
    <input type="hidden" id="augEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-08-01 00:00:00')->where('created_at', '<=', $thisYear . '-08-31 23:59:59')->count() }}">
    <input type="hidden" id="sepEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-09-01 00:00:00')->where('created_at', '<=', $thisYear . '-09-30')->count() }}">
    <input type="hidden" id="octEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-10-01 00:00:00')->where('created_at', '<=', $thisYear . '-10-31 23:59:59')->count() }}">
    <input type="hidden" id="novEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-11-01 00:00:00')->where('created_at', '<=', $thisYear . '-11-30')->count() }}">
    <input type="hidden" id="decEbooksCount"
      value="{{ $ebooks->where('created_at', '>=', $thisYear . '-12-01 00:00:00')->where('created_at', '<=', $thisYear . '-12-31 23:59:59')->count() }}">

    <input type="hidden" id="janVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-01-01 00:00:00')->where('created_at', '<=', $thisYear . '-01-31 23:59:59')->count() }}">
    <input type="hidden" id="febVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-02-01 00:00:00')->where('created_at', '<=', $thisYear . '-02-29')->count() }}">
    <input type="hidden" id="marVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-03-01 00:00:00')->where('created_at', '<=', $thisYear . '-03-31 23:59:59')->count() }}">
    <input type="hidden" id="aprVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-04-01 00:00:00')->where('created_at', '<=', $thisYear . '-04-30')->count() }}">
    <input type="hidden" id="mayVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-05-01 00:00:00')->where('created_at', '<=', $thisYear . '-05-31 23:59:59')->count() }}">
    <input type="hidden" id="junVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-06-01 00:00:00')->where('created_at', '<=', $thisYear . '-06-30')->count() }}">
    <input type="hidden" id="julVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-07-01 00:00:00')->where('created_at', '<=', $thisYear . '-07-31 23:59:59')->count() }}">
    <input type="hidden" id="augVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-08-01 00:00:00')->where('created_at', '<=', $thisYear . '-08-31 23:59:59')->count() }}">
    <input type="hidden" id="sepVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-09-01 00:00:00')->where('created_at', '<=', $thisYear . '-09-30')->count() }}">
    <input type="hidden" id="octVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-10-01 00:00:00')->where('created_at', '<=', $thisYear . '-10-31 23:59:59')->count() }}">
    <input type="hidden" id="novVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-11-01 00:00:00')->where('created_at', '<=', $thisYear . '-11-30')->count() }}">
    <input type="hidden" id="decVideosCount"
      value="{{ $videos->where('created_at', '>=', $thisYear . '-12-01 00:00:00')->where('created_at', '<=', $thisYear . '-12-31 23:59:59')->count() }}">

    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Diagram</h6>
            <div class="dropdown no-arrow">
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="AdminDashboardChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script>
    let janPostsCount = document.getElementById('janPostsCount').value;
    let febPostsCount = document.getElementById('febPostsCount').value;
    let marPostsCount = document.getElementById('marPostsCount').value;
    let aprPostsCount = document.getElementById('aprPostsCount').value;
    let mayPostsCount = document.getElementById('mayPostsCount').value;
    let junPostsCount = document.getElementById('junPostsCount').value;
    let julPostsCount = document.getElementById('julPostsCount').value;
    let augPostsCount = document.getElementById('augPostsCount').value;
    let sepPostsCount = document.getElementById('sepPostsCount').value;
    let octPostsCount = document.getElementById('octPostsCount').value;
    let novPostsCount = document.getElementById('novPostsCount').value;
    let decPostsCount = document.getElementById('decPostsCount').value;

    let janEbooksCount = document.getElementById('janEbooksCount').value;
    let febEbooksCount = document.getElementById('febEbooksCount').value;
    let marEbooksCount = document.getElementById('marEbooksCount').value;
    let aprEbooksCount = document.getElementById('aprEbooksCount').value;
    let mayEbooksCount = document.getElementById('mayEbooksCount').value;
    let junEbooksCount = document.getElementById('junEbooksCount').value;
    let julEbooksCount = document.getElementById('julEbooksCount').value;
    let augEbooksCount = document.getElementById('augEbooksCount').value;
    let sepEbooksCount = document.getElementById('sepEbooksCount').value;
    let octEbooksCount = document.getElementById('octEbooksCount').value;
    let novEbooksCount = document.getElementById('novEbooksCount').value;
    let decEbooksCount = document.getElementById('decEbooksCount').value;

    let janVideosCount = document.getElementById('janVideosCount').value;
    let febVideosCount = document.getElementById('febVideosCount').value;
    let marVideosCount = document.getElementById('marVideosCount').value;
    let aprVideosCount = document.getElementById('aprVideosCount').value;
    let mayVideosCount = document.getElementById('mayVideosCount').value;
    let junVideosCount = document.getElementById('junVideosCount').value;
    let julVideosCount = document.getElementById('julVideosCount').value;
    let augVideosCount = document.getElementById('augVideosCount').value;
    let sepVideosCount = document.getElementById('sepVideosCount').value;
    let octVideosCount = document.getElementById('octVideosCount').value;
    let novVideosCount = document.getElementById('novVideosCount').value;
    let decVideosCount = document.getElementById('decVideosCount').value;

    var ctx = document.getElementById("AdminDashboardChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "E-Books",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [janEbooksCount, febEbooksCount, marEbooksCount, aprEbooksCount, mayEbooksCount, junEbooksCount,
              julEbooksCount, augEbooksCount, sepEbooksCount, octEbooksCount, novEbooksCount, decEbooksCount
            ],
          },
          {
            label: "Posts",
            lineTension: 0.3,
            backgroundColor: "rgba(28, 200, 138, 0.05)",
            borderColor: "rgba(28, 200, 138, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(28, 200, 138, 1)",
            pointBorderColor: "rgba(28, 200, 138, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
            pointHoverBorderColor: "rgba(28, 200, 138, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [janPostsCount, febPostsCount, marPostsCount, aprPostsCount, mayPostsCount, junPostsCount,
              julPostsCount, augPostsCount, sepPostsCount, octPostsCount, novPostsCount, decPostsCount
            ],
          },
          {
            label: "Videos",
            lineTension: 0.3,
            backgroundColor: "rgba(255, 159, 64, 0.05)",
            borderColor: "rgba(255, 159, 64, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(255, 159, 64, 1)",
            pointBorderColor: "rgba(255, 159, 64, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(255, 159, 64, 1)",
            pointHoverBorderColor: "rgba(255, 159, 64, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [janVideosCount, febVideosCount, marVideosCount, aprVideosCount, mayVideosCount, junVideosCount,
              julVideosCount, augVideosCount, sepVideosCount, octVideosCount, novVideosCount, decVideosCount
            ],
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return '' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  </script>
@endsection
