
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tech2Globe</title>

    <link rel="stylesheet" href="{{ url('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}" />
</head>
<body>


  

  @include('layout.header')


  @yield('content')

 
  

  @include('layout.footer')
 

<!-- REQUIRED SCRIPTS -->
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/all.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.js') }}"></script>
    <script src="{{ url('js/aos.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
