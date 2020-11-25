@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        @lang('site.projects_finish')
    </h3>
  </div>
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
              <td></td>
            @endif
            <td>{{\App\User::find($project->user_id)->name}}</td>
            <td>
              <div class="social-likes" data-url="" data-title="{{$project->project_name}}">
              	<div class="facebook" title="Share link on Facebook">Facebook</div>
              	<div class="twitter" title="Share link on Twitter">Twitter</div>
              	<div class="plusone" title="Share link on Google+">Google+</div>
              </div>
              <a class='btn btn-info btn-xs send_email_btn' bt-data="{{$project->user_id}}" style="color:#fff;">
                @lang("site.send_email")
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
<div class="modal modal-blur fade" id="email_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('site.send_email')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
        </button>
      </div>
      <div class="alert alert-danger alert-danger-modal" style="display:none">

      </div>
      <div class="alert alert-success alert-success-modal" style="display:none">

      </div>
      <form method="POST" action="{{ url('dashboard/marketers/send/email') }}" class="form_submit_model">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">@lang('site.subject')</label>
                <input type="text" class="form-control" name="subject" >
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">@lang('site.email')</label>
                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
                <label class="form-label">@lang('site.message')</label>
                <textarea class="form-control message" rows="3" name="message"></textarea>
            </div>
          </div>
          <input type="hidden" name="customer_val" value="0" />
          <input type="hidden" name="method_type" value="add" />
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">
            @lang('site.cancel')
          </a>
          <button type="submit" class="btn btn-primary">{{ __('site.send') }} </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('footerjscontent')
<script type="text/javascript">
$(".send_email_btn").on("click",function(){
  var val = $(this).attr("bt-data");
  $("input[name='customer_val']").val(val);
  $('#email_modal').modal('show');
});
var _sucess = function(response)
{
  if(response.sucess)
  {
    $(".alert-success-modal").html(response.sucess_text);
    $(".alert-success-modal").css("display","block");
    $('#add_edit_modal').modal('hide');
    $("input[name='method_type']").val("add");
    //window.location.href = '{{url("/dashboard/customers")}}';
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
$(".form_submit_model").submit(function(e){

    e.preventDefault();
    var submit_form_url = $(this).attr('action');
    var $method_is = "POST";
    var formData = new FormData($(this)[0]);
    $(".alert-success-modal").css("display","none");
    $(".alert-danger-modal").css("display","none");

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

      return false;
});
</script>
@endsection
