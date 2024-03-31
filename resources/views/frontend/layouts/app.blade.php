<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pizza Pitsa</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" type="image/x-icon" href="{{ asset('') }}">
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/font-awesome.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/flaticon/flaticon.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/slick.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/slick-theme.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/jquery-ui.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/sal.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/base.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />       
    </head>
    <style>
        .Toastify__close-button--light {
        color: #000;
        opacity: .3;
        text-align: right!important;
        }
        .Toastify__toast-body > div:last-child {
        flex: 1;
        width: 200px;
        }
    </style>
    <body class="sticky-header">
        <div id="app"></div>
        @vite('resources/js/app.js')
          <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-ui.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/sal.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/counterup.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/waypoints.min.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
           @if(!(auth()->user()))
                localStorage.setItem('auth', null);
           @endif
        });
    </script>
    </body>
</html>
