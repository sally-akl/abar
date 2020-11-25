<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.7
* @link https://github.com/tabler/tabler
* Copyright 2018-2019 The Tabler Authors
* Copyright 2018-2019 codecalm.net Paweł Kuna
* Licensed under MIT (https://tabler.io/license)
-->
<html lang="en" dir="rtl">
  <head>
      @include('dashboard.layouts.css')
    <style>
      body {
      	display: none;
      }
    </style>
  </head>
  <body class="antialiased">
    <div class="page">
      @include('dashboard.layouts.header')
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              @if(Auth::user())
                @if(Auth::user()->role->name=="admin")
                   @include('dashboard.layouts.menu')
                @elseif(Auth::user()->role->name=="customer")
                    @include('dashboard.layouts.customer_menu')
                @elseif(Auth::user()->role->name=="marketer")
                   @include('dashboard.layouts.marketer_menu')
                @endif
              @endif
              <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                <form action="." method="get">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search…">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-xl">
          @yield('content')
        </div>
          @include('dashboard.layouts.footer')
      </div>
    </div>
    @include('dashboard.layouts.js')
    <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    @yield('footerjscontent')
  </body>
</html>
