<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <meta name="description" content="Sauve Exchange">
  <meta name="author" content="Mohamed Pascal camara">
  <meta name="robots" content="noindex, nofollow">

  <!-- ===============================================-->
  <!--    Open Graph Meta  -->
  <!-- ===============================================-->

  <meta property="og:title" content="Sauve Exchange">
  <meta property="og:site_name" content="Sauve Exchange">
  <meta property="og:description" content="Sauve Exchange">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>$auver | Exchange</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
  <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
  <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
  <meta name="theme-color" content="#ffffff">


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->

  <script src="{{ asset('assets/js/config.navbar-vertical.js') }}"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="{{ asset('assets/lib/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/datatables-bs4/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/leaflet/leaflet.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/prismjs/prism-okaidia.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
 
  <!-- SweetAlert2 -->
  <link href="{{ asset('assets/lib/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" rel="stylesheet">

  <!-- Datatable -->
  <link href="{{asset('assets/lib/datatables-bs4/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css')}}" rel="stylesheet">
  @routes

  </head>