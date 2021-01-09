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
                <h3 class="main-title">   @lang('site.request_num') : {{$crequest->request_num}} </h3>
            </div>
        </div>
        <div class="row" style="margin-top:20px;color:#000;">
          <div class="col-lg-4">
            <ul class="list-group">
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
                   @include("dashboard.utility.sucess_message")
                   <table class="table card-table table-vcenter text-nowrap datatable">
                     <tbody>

                       <tr>
                         <th> @lang('site.which_customer')</th>
                         <td>
                           @if($crequest->customer != null)
                            <span>{{$crequest->customer->name}}</span>
                           @endif

                         </td>
                       </tr>
                       <tr>
                         <th> @lang('site.identy_num')</th><td>

                           @if($crequest->customer != null)
                            <span>{{$crequest->customer->identity_num}}</span>
                           @endif


                         </td>
                       </tr>
                       <tr>
                         <th> @lang('site.mobile')</th><td>
                           @if($crequest->customer != null)
                            <span>{{$crequest->customer->mobile}}</span>
                           @endif

                         </td>
                       </tr>
                       <tr>
                         <th>@lang('site.which_project')</th><td>
                           @if($crequest->project != null)
                           <span>  {{$crequest->project->project_num }} </span>
                           @endif
                         </td>
                       </tr>
                       <tr>
                         <th>@lang('site.project_staus')</th>
                         <td>
                           @if($crequest->project_status == 0)
                           <span>@lang('site.new')  </span>
                           @endif
                           @if($crequest->project_status == 1)
                           <span>@lang('site.under_work')  </span>
                           @endif
                           @if($crequest->project_status == 2)
                           <span>@lang('site.done_ok')  </span>
                           @endif
                         </td>
                       </tr>
                       <tr>
                         <th>@lang('site.request_date')</th><td>{{$crequest->request_date}}</td>
                       </tr>
                       <tr>
                         <th> @lang('site.request_how_know')</th><td>{{$crequest->how_know_me}}</td>
                       </tr>
                       <tr>
                         <th>@lang('site.name_in_board')</th><td>{{$crequest->board_name}}</td>
                       </tr>
                       <tr>
                         <th>@lang('site.request_status')</th><td>{{$crequest->request_status}}</td>
                       </tr>
                       @if(!empty($crequest->location))
                         <tr>
                           <th>@lang('site.location')</th><td><a href="https://www.google.com/maps/?q={{$crequest->location}}" target="_blank">@lang('site.press_in_map')</a></td>
                         </tr>
                       @else
                           <tr>
                             <th>@lang('site.customer_location_request')
                              </th><td><a href="#" class="location_rek">@lang('site.press_there')</a></td>
                           </tr>
                       @endif
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             @if($crequest->project->project_category == 'مساجد')
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title">وصف المسجد فى الطلب</h3>
               </div>
               <div class="card-body">
                 <div class="table-responsive">
                   <table class="table card-table table-vcenter text-nowrap datatable">
                     <tbody>
                       <tr>
                         <th>وصف المسجد</th>
                         <td>
                           @if($crequest->extraproject != null)
                            <span>{{$crequest->extraproject->project_details}}</span>
                           @endif
                         </td>
                       </tr>
                       <tr>
                         <th>عدد المصلين</th>
                         <td>
                           @if($crequest->extraproject != null)
                            <span>{{$crequest->extraproject->prayer_num}}</span>
                           @endif
                         </td>
                       </tr>
                       <tr>
                         <th>نوع السقف</th>
                         <td>
                           @if($crequest->extraproject != null)
                            <span>{{$crequest->extraproject->ceil_type}}</span>
                           @endif
                         </td>
                       </tr>
                       <tr>
                         <th>المساحة</th>
                         <td>
                           @if($crequest->extraproject != null)
                            <span>{{$crequest->extraproject->area}}</span>
                           @endif
                         </td>
                       </tr>
                       <tr>
                         <th>السعر</th>
                         <td>
                           @if($crequest->extraproject != null)
                            <span>{{$crequest->extraproject->price}}</span>
                           @endif
                         </td>
                       </tr>
                     </body>
                   </table>
                 </div>
               </div>
             </div>

             @endif
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title">@lang('site.visit_requests')</h3>
                 <div class="search">
                   <a href="./." class="btn btn-primary add_btn">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                     @lang('site.new_add')
                   </a>
                 </div>
               </div>
               <div class="card-body">
                 <ul class="list list-timeline" style="float: right;">

                   @foreach($crequest->visits as $visit)
                   <li>
                     @if($visit->visite_admin_status == 1)
                     <div class="list-timeline-icon bg-success"><!-- SVG icon code -->
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M5 12l5 5l10 -10"></path></svg>
                     </div>
                     @elseif($visit->visite_admin_status == 0)
                     <div class="list-timeline-icon bg-red"><!-- SVG icon code -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                     </div>
                     @elseif($visit->visite_admin_status == 2)
                     <div class="list-timeline-icon bg-yellow"><!-- SVG icon code -->
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12.01" y2="8"></line><polyline points="11 12 12 12 12 16 13 16"></polyline></svg>
                     </div>
                     @endif
                     <div class="list-timeline-content">
                       <div class="list-timeline-time">{{date("Y-m-d",strtotime($visit->visit_date))}}</div>
                       <p class="list-timeline-title">{{$visit->visit_time}} {{$visit->visit_time_type}}</p>
                       <p class="list-timeline-title">
                         <a class='btn btn-info btn-xs edit_btn' bt-data="{{$visit->id}}">
                           <i class="far fa-edit"></i>
                         </a>
                         <a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$visit->id}}">
                           <i class="far fa-trash-alt"></i>
                         </a>
                       </p>
                       @if(!empty($visit->reason) && $visit->visite_admin_status == 0)
                       <p class="text-muted">
                          {{$visit->reason}}
                       </p>
                       @endif
                     </div>
                   </li>
                   @endforeach
                 </ul>
               </div>
             </div>
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title"> @lang('site.transactions')</h3>
               </div>
               <div class="card-body border-bottom py-3">
                 <div class="d-flex">

                 </div>
                 <div class="table-responsive">
                   <table class="table card-table table-vcenter text-nowrap datatable">
                     <thead>
                       <tr>
                         <th>
                            @lang('site.transaction_num')
                         </th>
                         <th>
                            @lang('site.transfer_date')
                         </th>
                         <th>
                            @lang('site.is_payable')
                         </th>
                         <th>
                            @lang('site.transfer_payment_type')
                         </th>
                         <th>
                            اسم البنك
                         </th>

                         <th>
                           رقم الحساب
                         </th>

                         <th>
                           رقم الايبان
                         </th>


                         <th>
                            @lang('site.amount')
                         </th>
                         <th></th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach($crequest->transaction as $transaction)

                       <tr>
                         <td>
                            {{$transaction->transaction_num}}
                         </td>
                         <td>
                           {{$transaction->transfer_date}}
                         </td>
                         <td>
                           @if($transaction->is_payable == 0)
                            <span class="badge bg-red">@lang('site.no')</span>
                           @else
                            <span class="badge bg-green"> @lang('site.yes')</span>
                           @endif

                         </td>
                         <td>
                           {{$transaction->transfer_payment_type}}
                         </td>
                         <td>
                           @if($transaction->transfer_payment_type == "حوالة بنكية")
                             <span>{{$transaction->bank_name}}</span>
                           @endif
                         </td>
                         <td>
                           @if($transaction->transfer_payment_type == "حوالة بنكية")
                             <span>{{$transaction->bank_account_number}}</span>
                           @endif
                         </td>
                         <td>
                           @if($transaction->transfer_payment_type == "حوالة بنكية")
                             <span>{{$transaction->bank_ibn}}</span>
                           @endif
                         </td>
                         <td>
                           {{$transaction->amount}}
                         </td>

                       </tr>

                        @endforeach
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title"> @lang('site.request_media')</h3>

               </div>
               <div class="card-body border-bottom py-3">
                 <div class="d-flex">

                 </div>
                 <div class="table-responsive">
                   @include("dashboard.utility.sucess_message")
                   <table class="table card-table table-vcenter text-nowrap datatable">
                     <thead>
                       <tr>
                         <th>
                            @lang('site.id')
                         </th>
                         <th>
                            @lang('site.media')
                         </th>
                         <th>
                            @lang('site.date')
                         </th>

                       </tr>
                     </thead>
                     <tbody>
                       @foreach($crequest->media as $media)

                       <tr>
                         <td>
                            {{$media->id}}
                         </td>
                         <td>
                           @if($media->media_type == "image")
                            <img src="{{url($media->image)}}" width="80"  height="80" data-img="{{$media->image}}" class="img_selected" />
                           @else
                             <div data-vedio="{{$media->vedio}}" class="vedio_selected">
                               <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" class="icon icon-md icon_height" fill="currentColor"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"></path></svg>
                           </div>
                           @endif
                         </td>
                         <td>{{date("Y-m-d",strtotime( $media->created_at))}}</td>

                       </tr>
                        @endforeach
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             <div class="modal modal-blur fade" id="add_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title">@lang('site.new_add')</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                     </button>
                   </div>
                   <div class="alert alert-danger alert-danger-modal" style="display:none">

                   </div>
                   <div class="alert alert-success alert-success-modal" style="display:none">

                   </div>
                   <form method="POST" action="{{ url('dashboard/visits') }}" class="form_submit_model" enctype="multipart/form-data">
                     <div class="modal-body">
                       <div class="mb-3">
                         <label class="form-label">@lang('site.date')</label>
                         <input type="date" name="visit_date" class="form-control" />
                       </div>
                       <div class="mb-3">
                         <label class="form-label">@lang('site.time')</label>
                         <input type="text" name="visit_time" class="form-control" /> (فصل الوقت ب :)
                       </div>
                       <div class="mb-3">
                         <label class="form-label">@lang('site.time_type')</label>
                         <select name="time_type" class="form-control">
                           <option value="am">am</option>
                           <option value="pm">pm</option>
                         </select>
                       </div>
                       <input type="hidden" name="method_type" value="add" />
                       <input type="hidden" name="request_val" value="{{$crequest->id}}" />


                     </div>
                     <div class="modal-footer">
                       <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">
                         @lang('site.cancel')
                       </a>
                       <button type="submit" class="btn btn-primary">+ {{ __('site.save') }} </button>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
             <div class="modal modal-blur fade" id="show_model" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title">@lang('site.media')</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                     </button>
                   </div>
                   <div class="modal-body">
                       <img src="" class="model_image" style="display:none" />
                       <iframe width="420" height="315" src="" class="model_vedio" style="display:none" >
                       </iframe>
                   </div>
                   <div class="modal-footer">
                       <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">
                         @lang('site.cancel')
                       </a>

                   </div>

                 </div>
               </div>
             </div>
             @include("dashboard/utility/modal_delete")
           </div>
        </div>



    </div>
</section>

@endsection
@section('footerjscontent')
<script type="text/javascript">
  var _sucess = function(response)
  {
    if(response.sucess)
    {
      $(".alert-success-modal").html(response.sucess_text);
      $(".alert-success-modal").css("display","block");
      $('#add_edit_modal').modal('hide');
      $("input[name='method_type']").val("add");
      window.location.href = '{{url("/dashboard/customers/projects/details")}}/{{$crequest->id}}';
    }
    else
    {
      var $error_text = "";
      var errors = response.errors;

      $.each(errors, function (key, value) {
        $error_text +=value+"<br>";
      });

      $(".alert-danger-modal").html($error_text);
      $(".alert-danger-modal").css("display","block");

    }

  }
  $(".edit_btn").on("click",function()
  {
      var id = $(this).attr("bt-data");
      var url_edit = '{{url("/dashboard/visits")}}'+"/"+id;
      $(".form_submit_model").attr("action",url_edit);
      $.ajax({
          url: '{{url("/dashboard/visits")}}'+"/"+id+"/edit",
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            $("input[name='visit_date']").val(response.visit_date.split(" ")[0]);
            $("input[name='visit_time']").val(response.visit_time);
            $("select[name='time_type']").val(response.visit_time_type);
            $("input[name='method_type']").val("edit");
            $('#add_edit_modal').modal('show');
          },
      });

        return false;
  });
  $(".add_btn").on("click",function(){
      $("input[name='method_type']").val("add");
      $(".form_submit_model").attr("action",'{{url("/dashboard/visits")}}');
      $("input[name='method_type']").val("add");
      $('#add_edit_modal').modal('show');
      return false;
  });
  $(".img_selected").on("click",function(){
      var val = $(this).attr("data-img");
      $(".model_vedio").css("display","none");
      $(".model_image").css("display","block");
      $(".model_image").attr("src",val);
      $('#show_model').modal('show');
      return false;
  });
  $(".vedio_selected").on("click",function(){
      var val = $(this).attr("data-vedio");
      $(".model_vedio").css("display","block");
      $(".model_image").css("display","none");
      $(".model_vedio").attr("src",val);
      $('#show_model').modal('show');
      return false;
  });

  $(".form_submit_model").submit(function(e){

    e.preventDefault();
    var submit_form_url = $(this).attr('action');
    var $method_is = "POST";
    var formData = new FormData($(this)[0]);
    $(".alert-success-modal").css("display","none");
    $(".alert-danger-modal").css("display","none");

    if(formData.get("method_type") == "edit")
    {
        $method_is = "PUT";
        var data = {
           visit_date : $("input[name='visit_date']").val(),
           visit_time : $("input[name='visit_time']").val(),
           time_type : $("select[name='time_type']").val(),
        };
        $.ajax({
            type: $method_is,
            url: submit_form_url,
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(data),
            success: function (response) {
              _sucess(response);
            },
          error : function( data )
          {

          },
        });
    }
    else {
      $.ajax({
                url: submit_form_url,
                type: $method_is,
                data: formData,
                async: false,
                dataType: 'json',
                success: function (response) {
                  _sucess(response);
                },
              error : function( data )
              {

              },
              cache: false,
              contentType: false,
              processData: false
      });

    }

      return false;
  });
  $(".location_rek").on("click",function(){

    var url = '{{url("/dashboard/customers/requests")}}/{{$crequest->id}}';
    $.ajax({url: url ,   dataType: 'json', success: function(result){
        window.location.href = '{{url("/dashboard/customers/projects/details")}}/{{$crequest->id}}';
    }});
    return false;
  });
  $(".delete_btn").on("click",function(){
    $('#delete_modal').modal('show');
    $("input[name='delete_val']").val($(this).attr("bt-data"));
    return false;
  });
  $(".delete_it_sure").on("click",function(){
    var id = $("input[name='delete_val']").val();
    var url_delete = '{{url("/dashboard/visits")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/customers/projects/details")}}/{{$crequest->id}}';
            }
    }});
  });
</script>
@endsection
