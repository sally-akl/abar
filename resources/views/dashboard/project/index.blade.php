@extends('dashboard.layouts.master')
@section('content')
@if(count($projects)==0)
<div class="empty">
  <div class="empty-icon">
    <img src="{{url('/')}}/img/illustrations/undraw_printing_invoices_5r4r.svg" height="128" class="mb-4"  alt="">
  </div>
  <p class="empty-title h3">@lang('site.no_result')</p>
  <p class="empty-subtitle text-muted">
    @lang('site.add_new_records')
  </p>
  <div class="empty-action">
    <a href='{{url("/dashboard/projects/create")}}' class="btn btn-primary add_btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      @lang('site.new_add')
    </a>
  </div>
</div>
@else
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.projects_all')</h3>
  </div>
  <div class="card-body border-bottom py-3">
    <div class="d-flex">
      <a href='{{url("/dashboard/projects/create")}}' class="btn btn-primary add_btn">
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
                @lang('site.avial_for_request')
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

            @if($project->is_require_for_request == 0)
              <td><span class="badge bg-red">@lang('site.no')</span>    </td>
            @else
              <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
            @endif

            <td class="text-right">
              <a class='btn btn-info btn-xs edit_btn' href='{{url("/dashboard/projects/{$project->id}/edit")}}'>
    						<i class="far fa-edit"></i>
    					</a>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$project->id}}">
    						<i class="far fa-trash-alt"></i>
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
    var url_delete = '{{url("/dashboard/projects")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/projects")}}';
            }
    }});
  });
</script>
@endsection
