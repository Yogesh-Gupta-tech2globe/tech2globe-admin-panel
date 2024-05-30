
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" sizes="16x16" type="image/x-icon" href="{{ url('images/favicon.ico') }}" />
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
  <link rel="stylesheet" href="{{ url('admin/plugins/toastr/toastr.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
  	<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

</head>
<body>


  

  @include('layout.header')


  @yield('content')

 
  

  @include('layout.footer')
 

<!-- REQUIRED SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/all.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.js') }}"></script>
    <script src="{{ url('js/aos.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ url('admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
