<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon/favicon.ico') }}" />

  <title>{{ $data[0]->app_name }} - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

  {{-- cropperjs --}}
  <link rel="stylesheet" href="{{ asset('/vendor/cropperjs/cropper.min.css') }}">

  {{-- Trix CSS --}}
  <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('page-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      {{-- @include('admin.layouts.footer') --}}
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('admin.layouts.modal')

  <!-- SweetAlert-->
  @include('sweetalert::alert')

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/chart.js/Chart.min.js"></script>
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/chart-area-demo.js"></script>
  <script src="/js/demo/chart-pie-demo.js"></script>
  <script src="/js/demo/datatables-demo.js"></script>

  {{-- Trix JS --}}
  <script src="{{ asset('js/trix.umd.min.js') }}"></script>

  {{-- Cropperjs --}}
  <script src="{{ asset('/vendor/cropperjs/cropper.min.js') }}"></script>

  @yield('javascript')

</body>

</html>
