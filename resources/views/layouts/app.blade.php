<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('plugins') }}/bootstrap-4.6.0-dist/css/bootstrap.min.css">

    <title>@yield('title')</title>
  </head>
  <body>
    @include('layouts.navbar')
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('plugins') }}/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>