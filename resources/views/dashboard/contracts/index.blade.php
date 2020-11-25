@extends('dashboard.layouts.master')
@section('content')
@if(count($contracts)==0)
<div class="empty">
  <div class="empty-icon">
    <img src="{{url('/')}}/img/illustrations/undraw_printing_invoices_5r4r.svg" height="128" class="mb-4"  alt="">
  </div>
  <p class="empty-title h3">@lang('site.no_result')</p>
  <p class="empty-subtitle text-muted">
    @lang('site.add_new_records')
  </p>
  <div class="empty-action">

  </div>
</div>
@else
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.contacts')</h3>
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
               @lang('site.title')
            </th>
            <th>
               @lang('site.under_request')
            </th>
            <th>
               @lang('site.under_project')
            </th>

            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($contracts as $key => $contract)
          <tr>
            <td>{{$contract->title}}</td>
            <td>{{$contract->request->request_num}}</td>
            <td>{{$contract->request->project->project_num}}</td>
            <td class="text-right">
              <a class='btn btn-info btn-xs edit_btn' href='{{url("/dashboard/customercontracts/{$contract->id}/edit")}}'>
    						<i class="far fa-edit"></i>
    					</a>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$contract->id}}">
    						<i class="far fa-trash-alt"></i>
    					</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$contracts->links('dashboard.vendor.pagination.default')}}
    </div>
  </div>
</div>
@endif
@include("dashboard/utility/modal_delete")
@endsection
@section('footerjscontent')
<script type="text/javascript">
  $(".delete_btn").on("click",function(){
    $('#delete_modal').modal('show');
    $("input[name='delete_val']").val($(this).attr("bt-data"));
    return false;
  });
  $(".delete_it_sure").on("click",function(){
    var id = $("input[name='delete_val']").val();
    var url_delete = '{{url("/dashboard/customercontracts")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/customercontracts")}}';
            }
    }});
  });
</script>
@endsection
