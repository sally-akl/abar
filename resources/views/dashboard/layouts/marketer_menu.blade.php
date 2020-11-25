<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href='{{url("/dashboard")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.dashboard')
      </span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" /></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.projects')
      </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/marketers/projects")}}' >
          @lang('site.projects_finish')
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href='{{url("/dashboard/marketers/customers")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.customers')
      </span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="12" r="5"></circle><path d="M12 7v-4m-1 0h2"></path><path d="M12 7v-4m-1 0h2" transform="rotate(45 12 12)"></path><path d="M12 7v-4m-1 0h2" transform="rotate(90 12 12)"></path><path d="M12 7v-4m-1 0h2" transform="rotate(135 12 12)"></path><path d="M12 7v-4m-1 0h2" transform="rotate(180 12 12)"></path><path d="M12 7v-4m-1 0h2" transform="rotate(225 12 12)"></path><path d="M12 7v-4m-1 0h2" transform="rotate(270 12 12)"></path><path d="M12 7v-4m-1 0h2" transform="rotate(315 12 12)"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.affliate')
      </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/marketers/banner")}}' >
          @lang('site.banner_ads')
        </a>
      </li>
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/marketers/link")}}' >
          @lang('site.link_ads')
        </a>
      </li>
      <li>
        <a class="dropdown-item" href='{{url("/dashboard/marketers/text")}}' >
          @lang('site.text_ads')
        </a>
      </li>
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/marketers/vedio")}}' >
          @lang('site.vedop_ads')
        </a>
      </li>
    </ul>
  </li>

</ul>
