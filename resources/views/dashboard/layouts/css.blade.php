<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{ config('app.name', 'Abar | Dashboard') }}</title>
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<meta name="msapplication-TileColor" content="#206bc4"/>
<meta name="theme-color" content="#206bc4"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="mobile-web-app-capable" content="yes"/>
<meta name="HandheldFriendly" content="True"/>
<meta name="MobileOptimized" content="320"/>
<meta name="robots" content="noindex,nofollow,noarchive"/>
<link rel="icon" href="./favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
<!-- CSS files -->
<link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/demo.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('css/fonts/fontawesome/css/fontawesome-all.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes_flat.css">
<link href="{{ asset('css/spectrum.css') }}" rel="stylesheet"/>
<style>
.dropdown-menu{
  right: 0 !important;
  left: auto !important;
}
#map {
  height: 300px;
width: 100%;
      }

</style>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiKClEgVTj7aNHZb3IolY9cAQB4_-dxj8&libraries=&v=weekly"
      defer
    ></script>
