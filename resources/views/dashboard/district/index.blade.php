@extends('dashboard.layouts.master')
@section('content')
@if(count($districts)==0)
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
    <h3 class="card-title">@lang('site.district')</h3>
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
               @lang('site.title')
            </th>
            <th>
               @lang('site.country')
            </th>
            <th>
               @lang('site.gov')
            </th>
            <th>
               @lang('site.reg')
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($districts as $key => $dist)
          <tr>
            <td>{{$dist->title}}</td>
            <td>{{$dist->region->gov->country->title}}</td>
            <td>{{$dist->region->gov->title}}</td>
            <td>{{$dist->region->title}}</td>
            <td class="text-right">
              <a class='btn btn-info btn-xs edit_btn' bt-data="{{$dist->id}}">
    						<i class="far fa-edit"></i>
    					</a>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$dist->id}}">
    						<i class="far fa-trash-alt"></i>
    					</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$districts->links('dashboard.vendor.pagination.default')}}
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
      <form method="POST" action="{{ url('dashboard/district') }}" class="form_submit_model">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">@lang('site.title')</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.country')</label>
            <select class="form-control" name="country">
              <option value="">@lang('site.select')</option>
              @foreach($countries as $country)
                  <option value="{{$country->id}}">{{$country->title}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.gov')</label>
            <select class="form-control" name="gov">
              <option value="">@lang('site.select')</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.reg')</label>
            <select class="form-control" name="reg">
              <option value="">@lang('site.select')</option>
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
      window.location.href = '{{url("/dashboard/district")}}';
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
  $("select[name='country']").on("change",function(){

    var val = $(this).val();
    $.ajax({
        url: '{{url("/dashboard/governates")}}'+"/"+val,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
          if(response !=" ")
            $("select[name='gov']").html(response.data);

        },
    });
  });
  $("select[name='gov']").on("change",function(){

    var val = $(this).val();
    $.ajax({
        url: '{{url("/dashboard/regions")}}'+"/"+val,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
          if(response !=" ")
            $("select[name='reg']").html(response.data);

        },
    });
  });
  $(".edit_btn").on("click",function()
  {
      var id = $(this).attr("bt-data");
      var url_edit = '{{url("/dashboard/district")}}'+"/"+id;
      $(".form_submit_model").attr("action",url_edit);

      $.ajax({
          url: '{{url("/dashboard/district")}}'+"/"+id+"/edit",
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            $("input[name='title']").val(response.dis.title);
            $("select[name='country']").val(response.dis.region.gov.country.id);
            $("select[name='gov']").html(response.governates);
            $("select[name='gov']").val(response.dis.region.gov.id);
            $("select[name='reg']").html(response.reg);
            $("select[name='reg']").val(response.dis.region.id);
            $("input[name='method_type']").val("edit");
            $('#add_edit_modal').modal('show');
          },
      });

        return false;
  });
  $(".add_btn").on("click",function(){
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
             reg : $("select[name='reg']").val(),
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
      var url_delete = '{{url("/dashboard/district")}}'+"/"+id;
      $.ajax({url: url_delete ,type: "DELETE", success: function(result){
          var result = JSON.parse(result);
          if(result.sucess)
          {
            window.location.href = '{{url("/dashboard/district")}}';
          }
      }});
    });
</script>
@endsection
