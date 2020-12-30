@extends('dashboard.layouts.master')
@section('content')
@if(count($links)==0)
<div class="empty">
  <div class="empty-icon">
    <img src="{{url('/')}}/img/illustrations/undraw_printing_invoices_5r4r.svg" height="128" class="mb-4"  alt="">
  </div>
  <p class="empty-title h3">@lang('site.no_result')</p>
  @if(Auth::user()->role->name =="admin")
    <p class="empty-subtitle text-muted">
      @lang('site.add_new_records')
    </p>
    <div class="empty-action">
      <a href="#" class="btn btn-primary add_btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
        @lang('site.new_add')
      </a>
    </div>
  @endif
</div>
@else
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.link_ads')</h3>
  </div>
  <div class="card-body border-bottom py-3">
    @if(Auth::user()->role->name =="admin")
      <div class="d-flex">
        <a href="./." class="btn btn-primary add_btn">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
          @lang('site.new_add')
        </a>
      </div>
    @endif
    <div class="table-responsive">
      @include("dashboard.utility.sucess_message")
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th>
               @lang('site.banner_title')
            </th>
            <th>
               @lang('site.banner_link')
            </th>
            <th>
               @lang('site.link_title')
            </th>
            <th>
               @lang('site.banner_enable')
            </th>
            <th></th>
            <th>مشاركة</th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($links as $key => $link)
          <tr>
            <td>{{$link->title}}</td>
            <td><a href="{{$link->link}}" target="_blank">@lang('site.go_to')</a></td>
            <td>{{$link->link_title}}</td>
            <td>
              @if($link->is_enable == 1)
                <span class="badge bg-green">@lang('site.yes')</span>
              @else
                <span class="badge bg-red">@lang('site.no')</span>
              @endif
            </td>
            <td class="text-right">
              @if(Auth::user()->role->name =="admin")
                <a class='btn btn-info btn-xs edit_btn' bt-data="{{$link->id}}">
      						<i class="far fa-edit"></i>
      					</a>
      					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$link->id}}">
      						<i class="far fa-trash-alt"></i>
      					</a>
              @endif
            </td>
            <td>
              @php  $drect_ln = $link->link."?code=".Auth::user()->mareter_code;  @endphp
              @php $share_text = "<div><a style='display: block;font-size: 12px;'  href=".$drect_ln.">".$link->link_title."</a></div>";   @endphp

              <textarea type="text" onclick="this.focus();this.select()" class="code-input form-control" readonly="">{{ $share_text }}</textarea>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$links->links('dashboard.vendor.pagination.default')}}
    </div>
  </div>
</div>
@endif

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
      <form method="POST" action="{{ url('dashboard/marketers/link') }}" class="form_submit_model">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">@lang('site.title')</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.banner_link')</label>
            <input type="text" class="form-control" name="link">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.link_title')</label>
            <input type="text" class="form-control" name="link_title">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.banner_enable')</label>
            <select name="enable" class="form-control">
              <option value="1">@lang('site.yes')</option>
              <option value="0">@lang('site.no')</option>
            </select>
          </div>

          <input type="hidden" name="method_type" value="add" />
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
      window.location.href = '{{url("/dashboard/marketers/link")}}';
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
      var url_edit = '{{url("/dashboard/marketers/link")}}'+"/"+id;
      $(".form_submit_model").attr("action",url_edit);
      $.ajax({
          url: '{{url("/dashboard/marketers/link")}}'+"/"+id+"/edit",
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            $("input[name='title']").val(response.title);
            $("input[name='link']").val(response.link);
            $("select[name='enable']").val(response.is_enable);
            $("input[name='link_title']").val(response.link_title);
            $("input[name='method_type']").val("edit");
            $('#add_edit_modal').modal('show');
          },
      });

        return false;
  });
  $(".add_btn").on("click",function(){
      $("input[name='method_type']").val("add");
      $(".form_submit_model").attr("action",'{{url("/dashboard/marketers/link")}}');
      $('#add_edit_modal').modal('show');
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
             title : $("input[name='title']").val(),
             link : $("input[name='link']").val(),
             link_title : $("input[name='link_title']").val(),
             enable : $("select[name='enable']").val()
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
  $(".delete_btn").on("click",function(){
    $('#delete_modal').modal('show');
    $("input[name='delete_val']").val($(this).attr("bt-data"));
    return false;
  });
  $(".delete_it_sure").on("click",function(){
    var id = $("input[name='delete_val']").val();
    var url_delete = '{{url("/dashboard/marketers/link")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/marketers/link")}}';
            }
    }});
  });
</script>
@endsection
