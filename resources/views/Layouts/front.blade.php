<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>({{ setting('site_title' , 'Rent a Car') }})</title>
    {{-- css dosyaları --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/style.css') }}">
</head>
<body>

    @include('front.partials.navbar')

    @yield('content')

    @include('front.partials.footer')

  <script src="{{ asset('Front/carbook-master/js/jquery.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/popper.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/aos.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('Front/carbook-master/js/google-map.js') }}"></script>
  <script src="{{ asset('Front/carbook-master/js/main.js') }}"></script>
</body>
</html>
