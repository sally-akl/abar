<!DOCTYPE html>
<html lang="ar"  dir="rtl" >

<head>
  @include('layouts.css')
</head>
<body>
  @include('layouts.menu')
  @yield('header')
<!-- start all content -->
<main>
  @yield('content')
<!-- start footer -->
@include('layouts.footer')
<!-- end footer -->

  @include('layouts.js')
    @yield('footerjscontent')
</body>

</html>
