<ul class="navbar-nav">
  <li class="nav-item {{$controller == 'DashboardController'  && $action=='index' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
      </span>
      <span class="nav-link-title">
       @lang('site.dashboard')
      </span>
    </a>
  </li>
  <li class="nav-item {{ ($controller == 'CountryController' ?'active':'') || ($controller == 'DashboardController' && $action=='settings' ?'active':'')  }} dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6-6a6 6 0 0 1 -8 -8l3.5 3.5"></path></svg>
      </span>
      <span class="nav-link-title">
        الاعدادات
      </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/country")}}'>
          @lang('site.countries')
        </a>
      </li>
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/settings")}}'>
          الاعدادات
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item dropdown {{$controller == 'ProjectController' ?'active':'' }}">
    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" /></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.projects')
      </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/projects")}}' >
          @lang('site.projects_all')
        </a>
      </li>
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/project/withoutcontract")}}' >
          @lang('site.projects_without_contract')
        </a>
      </li>
      <li>
        <a class="dropdown-item" href='{{url("/dashboard/projects/create")}}' >
          @lang('site.add_projects_port')
        </a>
      </li>
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/project/status/1")}}' >
          @lang('site.projects_under_construct')
        </a>
      </li>
      <li>
        <a class="dropdown-item" href='{{url("/dashboard/project/status/2")}}' >
          @lang('site.projects_finish')
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{$controller == 'CustomerController' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/customer")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="7" r="4"></circle><path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.customers')
      </span>
    </a>
  </li>
  <li class="nav-item {{$controller == 'MarketerController' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/marketer")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.marketer')
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
  <li class="nav-item {{$controller == 'RequestsController' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/requests")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path><line x1="8" y1="9" x2="16" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.requests')
      </span>
    </a>
  </li>
  <li class="nav-item {{$controller == 'ContractsController' ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/customercontracts")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="14 3 14 8 19 8"></polyline><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path><path d="M9 15l2 2l4 -4"></path></svg>
      </span>
      <span class="nav-link-title">
        @lang('site.contacts')
      </span>
    </a>
  </li>
  <li class="nav-item dropdown {{$controller == 'ReportController' ?'active':'' }}">
    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown" role="button" aria-expanded="false" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8"></path><path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5"></path></svg>
      </span>
      <span class="nav-link-title">
          @lang('site.reports')
      </span>
    </a>
    <ul class="dropdown-menu">
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/reports")}}'>
            @lang('site.sales_report')
        </a>
      </li>
      <li >
        <a class="dropdown-item" href='{{url("/dashboard/reports/sell")}}' >
            @lang('site.project_sales_report')
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{$controller == 'CustomerOpionController'  ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/opionion")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
      </span>
      <span class="nav-link-title">
        اراء العملاء
      </span>
    </a>
  </li>
  <li class="nav-item {{$controller == 'BlogController'  ?'active':'' }}">
    <a class="nav-link" href='{{url("/dashboard/blog")}}' >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><rect x="5" y="3" width="14" height="18" rx="2"></rect><line x1="9" y1="7" x2="15" y2="7"></line><line x1="9" y1="11" x2="15" y2="11"></line><line x1="9" y1="15" x2="13" y2="15"></line></svg>
      </span>
      <span class="nav-link-title">
        المدونة
      </span>
    </a>
  </li>
</ul>
