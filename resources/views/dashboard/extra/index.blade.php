@extends('dashboard.layouts.master')
@section('content')
@if(count($extra_fields)==0)
<div class="empty">
  <div class="empty-icon">
    <img src="{{url('/')}}/img/illustrations/undraw_printing_invoices_5r4r.svg" height="128" class="mb-4"  alt="">
  </div>
  <p class="empty-title h3">@lang('site.no_result')</p>
  <p class="empty-subtitle text-muted">
    @lang('site.add_new_records')
  </p>
  <div class="empty-action">
    <a href="#" class="btn btn-primary add_btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      @lang('site.new_add')
    </a>
  </div>
</div>
@else
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.extrafields')</h3>
  </div>
  <div class="card-body border-bottom py-3">
    <div class="d-flex">
      <a href="./." class="btn btn-primary add_btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
        @lang('site.new_add')
      </a>
    </div>
    <div class="table-responsive">
      @include("dashboard.utility.sucess_message")
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th>
               @lang('site.field_label_title')
            </th>
            <th>
               @lang('site.field_form_name')
            </th>
            <th>
               @lang('site.field_form_type')
            </th>
            <th>
               @lang('site.is_require')
            </th>
            <th>
               @lang('site.project_category_field')
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($extra_fields as $key => $field)
          <tr>
            <td>{{$field->field_label_title}}</td>
            <td>{{$field->field_form_name}}</td>
            <td>{{$field->field_form_type}}</td>
            @if($field->is_require == 0)
              <td><span class="badge bg-red">@lang('site.no')</span>    </td>
            @else
              <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
            @endif
            <td>{{$field->project_category}}</td>
            <td class="text-right">
              <a class='btn btn-info btn-xs edit_btn' bt-data="{{$field->id}}">
    						<i class="far fa-edit"></i>
    					</a>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$field->id}}">
    						<i class="far fa-trash-alt"></i>
    					</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$extra_fields->links('dashboard.vendor.pagination.default')}}
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
      <form method="POST" action="{{ url('dashboard/extrafields') }}" class="form_submit_model">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">@lang('site.field_label_title')</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.field_form_name')</label>
            <input type="text" class="form-control" name="form_title">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.field_form_type')</label>
            <select class="form-control" name="form_type">
              <option value="">@lang('site.select')</option>
              <option value="Date">Date</option>
              <option value="Textbox">Textbox</option>
              <option value="TextArea">TextArea</option>
            </select>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">@lang('site.is_require')</label>
                <select class="form-control" name="form_is_require">
                  <option value="">@lang('site.select')</option>
                  <option value="0">@lang('site.no')</option>
                  <option value="1">@lang('site.yes')</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">@lang('site.project_category_field')</label>
                <select class="form-control" name="form_project_cat">
                  <option value="">@lang('site.select')</option>
                  <option value="@lang('site.abar')">@lang('site.abar')</option>
                  <option value="@lang('site.masged')">@lang('site.masged')</option>
                  <option value="@lang('site.schools')">@lang('site.schools')</option>
                </select>
              </div>
            </div>
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
      window.location.href = '{{url("/dashboard/extrafields")}}';
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
      var url_edit = '{{url("/dashboard/extrafields")}}'+"/"+id;
      $(".form_submit_model").attr("action",url_edit);
      $.ajax({
          url: '{{url("/dashboard/extrafields")}}'+"/"+id+"/edit",
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            $("input[name='title']").val(response.field_label_title);
            $("input[name='form_title']").val(response.field_form_name);
            $("select[name='form_type']").val(response.field_form_type);
            $("select[name='form_is_require']").val(response.is_require);
            $("select[name='form_project_cat']").val(response.project_category);
            $("input[name='method_type']").val("edit");
            $('#add_edit_modal').modal('show');
          },
      });

        return false;
  });
  $(".add_btn").on("click",function(){
      $("input[name='method_type']").val("add");
      $(".form_submit_model").attr("action",'{{url("/dashboard/extrafields")}}');
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
             form_title : $("input[name='form_title']").val(),
             form_type : $("input[name='form_type']").val(),
             form_is_require : $("input[name='form_is_require']").val(),
             form_project_cat : $("input[name='form_project_cat']").val(),
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
    var url_delete = '{{url("/dashboard/extrafields")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/extrafields")}}';
            }
    }});
  });
</script>
@endsection
