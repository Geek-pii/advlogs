<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
  @include('layouts.head')

  <!-- Css & font -->
  @include('layouts.style')
  <!--//Css & font -->

  @yield('styles')
</head>

<body style="padding-top: 10rem;">

  <!--header & slider-->
  <div class="header-slider-main-wrapper">

    <!--header-->
    @include('layouts.header')
    <!--//header-->

    <!--slider-->
    @stack('slider')
    <!--//slider-->

  </div>
  <!--//header & slider-->

  <!--content started-->
  <div class="{{ $content_class ?? 'content-wrapper' }}">
    @yield('content')
  </div>
  <!--//content ends-->

  <!--footer started-->
  @include('layouts.footer')
  <!--footer started-->

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  @include('layouts.script')

  @yield('scripts')
</body>

</html>
