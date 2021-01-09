@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{url('/')}}/blog/المدونة">المدونة</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="curve">
        <svg class="hidden-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="801px" height="122px">
            <path fill-rule="evenodd" fill="#013a67"
                  d="M801.000,3.185 L783.212,3.045 C794.495,2.876 801.000,3.185 801.000,3.185 ZM600.415,38.234 C600.415,38.234 552.126,60.405 533.553,75.406 C533.553,75.406 467.753,115.101 428.485,120.013 C428.485,120.013 411.214,122.840 400.500,121.733 C389.786,122.840 372.515,120.013 372.515,120.013 C333.247,115.101 267.447,75.406 267.447,75.406 C248.874,60.405 200.585,38.234 200.585,38.234 C127.481,8.314 51.407,3.550 17.788,3.045 L396.646,0.059 L396.646,-0.002 L400.500,0.028 L404.354,-0.002 L404.354,0.059 L783.212,3.045 C749.593,3.550 673.519,8.314 600.415,38.234 ZM17.788,3.045 L-0.000,3.185 C-0.000,3.185 6.505,2.876 17.788,3.045 Z" />
        </svg>
        <svg class="only-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="320px" height="56px">
            <path fill-rule="evenodd" fill="#013a67"
                  d="M360.207,1.854 L352.209,1.791 C357.283,1.714 360.207,1.854 360.207,1.854 ZM270.002,17.615 C270.002,17.615 248.285,27.586 239.933,34.332 C239.933,34.332 210.342,52.184 192.682,54.393 C192.682,54.393 184.915,55.662 180.097,55.164 C175.279,55.662 167.512,54.393 167.512,54.393 C149.853,52.184 120.262,34.332 120.262,34.332 C111.909,27.586 90.193,17.615 90.193,17.615 C57.316,4.160 23.104,2.018 7.986,1.791 L178.364,0.448 L178.364,0.420 L180.097,0.434 L181.831,0.420 L181.831,0.448 L352.209,1.791 C337.091,2.018 302.878,4.160 270.002,17.615 ZM7.986,1.791 L-0.013,1.854 C-0.013,1.854 2.912,1.714 7.986,1.791 Z" />
        </svg>
        <!-- video player -->
                        <a class="btn video-player lightbox-iframe" href="{{\App\Settings::find(1)->vedio_intro}}">
                <svg class="svg-inline--fa fa-caret-right fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg=""><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg><!-- <i class="fas fa-caret-right"></i> -->
                <span></span>
            </a>

    </div>
</section>
<!-- end main header -->
@endsection
@section('content')
<section class="blogs-block  w-curve replace-mr no-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="main-title">  @lang('site.old_projects')</h3>
            </div>
        </div>
        <div class="row" style="margin-top:20px;color:#000;">
          <div class="col-lg-4">
            <ul class="list-group">
              <li class="list-group-item">
                <a class="nav-link" href='{{url("/dashboard")}}' >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      @lang('site.dashboard')
                    </span>
                </a>
             </li>
              <li class="list-group-item">
                <a class="nav-link" href='{{url("/dashboard/customers/projects/favorate")}}' >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      @lang('site.project_fav')
                    </span>
                </a>
              </li>
              <li class="list-group-item">
                <a class="nav-link" href='{{url("/dashboard/customers")}}' >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
                  </span>
                  <span class="nav-link-title">
                    @lang('site.profile')
                  </span>
                </a>

              </li>
              <li class="list-group-item"><a class="nav-link" href='{{url("/dashboard/customers/projects")}}' >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="8.5" cy="7" r="4"></circle><path d="M2 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path><path d="M16 11l2 2l4 -4"></path></svg>
                </span>
                <span class="nav-link-title">
                  @lang('site.old_projects')
                </span>
              </a></li>

            </ul>
          </div>
           <div class="col-lg-8">
             <div class="card">

               <div class="card-body border-bottom py-3">
                 <div class="d-flex">

                 </div>
                 <div class="table-responsive">
                   <table class="table card-table table-vcenter text-nowrap datatable">
                     <thead>
                       <tr>
                         <th>
                            @lang('site.project_num')
                         </th>
                         <th>
                            @lang('site.proj_name')
                         </th>
                         <th>
                            @lang('site.project_category')
                         </th>
                          <th>
                             @lang('site.exist_in_store')
                          </th>
                          <th>
                             @lang('site.price')
                          </th>
                          <th>
                             @lang('site.under_country')
                          </th>
                          <th>
                             @lang('site.project_staus')
                          </th>
                          <th>
                             @lang('site.which_customer')
                          </th>
                         <th></th>
                       </tr>
                     </thead>
                     <tbody>
                        @foreach ($projects as $key => $project)
                       <tr>
                         <td>{{$project->project_num }}</td>
                         <td>{{$project->project_name}}</td>
                         <td><span class="badge bg-indigo">{{$project->project_category}}</span></td>
                         @if($project->add_to_store == 0)
                           <td><span class="badge bg-red">@lang('site.no')</span>    </td>
                         @else
                           <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
                         @endif
                         <td>{{$project->first_price}}</td>
                         <td>{{$project->country->title}}</td>
                         @if($project->project_status == 1)
                           <td>@lang('site.under_work')</td>
                         @elseif($project->project_status == 2)
                           <td>@lang('site.done_ok')</td>
                         @else
                           <td>@lang('site.new')</td>
                         @endif
                         <td>{{\App\User::find($project->user_id)->name}}</td>
                         <td>
                           <div class="social-likes" data-url="{{url('/')}}/project/details/{{$project->id}}/{{$project->project_name}}" data-title="{{$project->project_name}}">
                            <div class="facebook" title="Share link on Facebook">Facebook</div>
                            <div class="twitter" title="Share link on Twitter">Twitter</div>
                            <div class="plusone" title="Share link on Google+">Google+</div>
                           </div>
                           <a href="{{ url('dashboard/customers/projects/details') }}/{{$project->related_request_id}}" class='btn  btn-secondary btn-xs'>
                             @lang('site.details')
                           </a>
                         </td>
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
                 <div class="card-footer d-flex align-items-center">
                   {{$projects->links('dashboard.vendor.pagination.default')}}
                 </div>
               </div>
             </div>
           </div>
        </div>



    </div>
</section>

@endsection
