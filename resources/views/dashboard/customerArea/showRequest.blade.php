@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title"> @lang('site.request_num') : {{$crequest->request_num}}  </h3>
  </div>
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
