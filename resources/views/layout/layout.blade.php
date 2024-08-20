
<!DOCTYPE html>
<html lang="en">
{{-- <head>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head> --}}
<head>

@include('layout.meta')

</head>
<body>

@php
$seoStatic = App\Models\seo_static::where('id',1)->first();  
@endphp

{!! $seoStatic['google_tracking_code'] !!}

@if (!empty($seoStatic['geo_region']))
  <meta name="geo.region" content="{{$seoStatic['geo_region']}}" />
@endif
@if (!empty($seoStatic['geo_placename']))
  <meta name="geo.placename" content="{{$seoStatic['geo_placename']}}" />
@endif
@if (!empty($seoStatic['geo_position']))
  <meta name="geo.position" content="{{$seoStatic['geo_position']}}" />
@endif
@if (!empty($seoStatic['icbm']))
  <meta name="ICBM" content="{{$seoStatic['icbm']}}" />
@endif
  

  @include('layout.header')


  @yield('content')

  @yield('include_content')

 
  

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
