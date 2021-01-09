@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.requests')</h3>
    <div class="search">
         <button type="button" class="btn search_btn"><i class="fa fa-search" aria-hidden="true"></i> {{ __('site.search') }} </button>
    </div>
  </div>
  <div class="card-body border-bottom py-3">
    <div class="table-responsive">
      @include("dashboard.utility.sucess_message")
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th>
               @lang('site.request_num')
            </th>
            <th>
               @lang('site.which_customer')
            </th>
            <th>
               @lang('site.which_project')
            </th>
            <th>
               @lang('site.request_date')
            </th>
            <th>@lang('site.request_status')</th>
            <th>
              @lang('site.project_staus')
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($customer_requests as $key => $crequest)
          <tr>
            <td>{{$crequest->request_num}}</td>
            <td>
              @if($crequest->customer != null)
               <span>{{$crequest->customer->name}}</span>
              @endif
            </td>
            <td>
              @if($crequest->project != null)
                <span>{{$crequest->project->project_num }}</span>
              @endif
            </td>
            <td>{{$crequest->request_date}}</td>
            <td>{{$crequest->request_status}}</td>
              <td>
             <form method="post" action="{{url('/dashboard/requests')}}/{{$crequest->id}}" class="accept_form">
               {{ method_field('PUT') }}
               @csrf
               <select name="project_status" class="form-control">
                 <option value="3" {{$crequest->project_status == 3?"selected":""}}>@lang('site.new')</option>
                 <option value="1" {{$crequest->project_status == 1?"selected":""}}>@lang('site.under_work')</option>
                 <option value="2" {{$crequest->project_status == 2?"selected":""}}>@lang('site.done_ok') </option>
               </select>
               <input type="hidden" name="type_update" value="project_status" />
             </form>
             </td>

            <td class="text-right">
              <a class='btn btn-info btn-xs edit_btn' bt-data="{{$crequest->id}}">
    						<i class="far fa-edit"></i>
    					</a>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$crequest->id}}">
    						<i class="far fa-trash-alt"></i>
    					</a>
              <a href="{{ url('dashboard/requests') }}/{{$crequest->id}}" class='btn  btn-secondary btn-xs'>
                @lang('site.details')
              </a>
              <a href="{{ url('dashboard/customercontracts/requests/create') }}/{{$crequest->id}}" class='btn btn-success btn-xs'>
    						@lang('site.add_contract')
    					</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$customer_requests->links('dashboard.vendor.pagination.default')}}
    </div>
  </div>

</div>

<div class="modal modal-blur fade" id="serach_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('site.search')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
        </button>
      </div>
      <form method="GET" action="{{ url('dashboard/requests') }}" >
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">@lang('site.which_customer')</label>
            <select class="form-control" name="customer">
              <option value="">@lang('site.select')</option>
              @foreach(\App\User::where("role_id",2)->get() as $customer)
               <option value="{{$customer->id}}">{{$customer->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.which_project')</label>
            <select class="form-control" name="project">
              <option value="">@lang('site.select')</option>
              @foreach(\App\Project::all() as $project)
               <option value="{{$project->id}}">{{$project->project_num}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.date')</label>
            <input type="date" class="form-control" name="re_date">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.request_status')</label>
            <select class="form-control" name="status_search">
              <option value="">@lang('site.select')</option>
              <option value="@lang('site.pending')">@lang('site.pending')</option>
              <option value="@lang('site.reject')">@lang('site.reject')</option>
              <option value="@lang('site.accept')">@lang('site.accept')</option>
              <option value="@lang('site.not_payment')">@lang('site.not_payment')</option>
              <option value="@lang('site.reservation')">@lang('site.reservation')</option>
            </select>
          </div>
        </div>
        <input type="hidden" name="search" value="search" />
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">
            @lang('site.cancel')
          </a>
          <button type="submit" class="btn btn-primary">{{ __('site.search') }} </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="add_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('site.update_status')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
        </button>
      </div>
      <div class="alert alert-danger alert-danger-modal" style="display:none">

      </div>
      <div class="alert alert-success alert-success-modal" style="display:none">

      </div>
      <form method="POST" action="{{ url('dashboard/requests') }}" class="form_submit_model">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">@lang('site.request_status')</label>
            <select class="form-control" name="status">
              <option value="">@lang('site.select')</option>
              <option value="@lang('site.pending')">@lang('site.pending')</option>
              <option value="@lang('site.reject')">@lang('site.reject')</option>
              <option value="@lang('site.accept')">@lang('site.accept')</option>
              <option value="@lang('site.not_payment')">@lang('site.not_payment')</option>
              <option value="@lang('site.reservation')">@lang('site.reservation')</option>
            </select>
          </div>
          <input type="hidden" name="type_update" value="status" />

          <input type="hidden" name="method_type" value="edit" />
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
      window.location.href = '{{url("/dashboard/requests")}}';
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
      var url_edit = '{{url("/dashboard/requests")}}'+"/"+id;
      $(".form_submit_model").attr("action",url_edit);
      $.ajax({
          url: '{{url("/dashboard/requests")}}'+"/"+id+"/edit",
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            $("select[name='status']").val(response.request_status);
            $("input[name='method_type']").val("edit");
            $('#add_edit_modal').modal('show');
          },
      });

        return false;
  });
  $(".search_btn").on("click",function(){
      $('#serach_modal').modal('show');
      return false;
  });
  $(".form_submit_model").submit(function(e){

      e.preventDefault();
      var submit_form_url = $(this).attr('action');
      var $method_is = "POST";
      var formData = new FormData($(this)[0]);
      $(".alert-success-modal").css("display","none");
      $(".alert-danger-modal").css("display","none");
      $method_is = "PUT";
      var data = {
             request_status : $("select[name='status']").val(),
             type_update : "status",
      };
      $.ajax({
              type: "PUT",
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
      return false;
  });
  $(".delete_btn").on("click",function(){
    $('#delete_modal').modal('show');
    $("input[name='delete_val']").val($(this).attr("bt-data"));
    return false;
  });
  $(".delete_it_sure").on("click",function(){
    var id = $("input[name='delete_val']").val();
    var url_delete = '{{url("/dashboard/requests")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/requests")}}';
            }
    }});
  });
  $("select[name='project_status']").on("change",function(){
    $(".accept_form").submit();
  });
</script>
@endsection
