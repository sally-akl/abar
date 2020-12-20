@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      @lang('site.old_projects')

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
@endsection
