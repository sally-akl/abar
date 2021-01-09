@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.customers')</h3>
  </div>
  <div class="card-body border-bottom py-3">
    <div class="table-responsive">
      @include("dashboard.utility.sucess_message")
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th>
               @lang('site.customer_name')
            </th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($customers as $key => $user)
          <tr>
            <td>{{$user->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$customers->links('dashboard.vendor.pagination.default')}}
    </div>
  </div>
</div>


@endsection
