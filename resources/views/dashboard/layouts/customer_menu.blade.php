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
  <li class="nav-item {{$controller == 'ProjectController' && $action=='customerFavProjects' ?'active':'' }} dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" /></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.projects')
      </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/customers/projects/favorate")}}' >
          @lang('site.project_fav')
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{$controller == 'CustomerController' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/customers")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.profile')
      </span>
    </a>
  </li>
  <li class="nav-item {{$controller == 'ProjectController' && $action=='customerprojects' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/customers/projects")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.old_projects')
      </span>
    </a>
  </li>
</ul>
