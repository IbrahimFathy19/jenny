<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Title -->
    <link rel="shortcut icon" href="images/app/favicon.ico"/>
    @yield('title')


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
</head>
<body>
    
  @include('inc.nav')      

  <main role="main">
    @yield('content')
  </main>
    
  <footer>
    @include('inc.footer')
  </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/_custom.js') }}"></script>
    </div>
</body>
</html>
