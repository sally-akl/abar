@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.profile')</h3>
  </div>
  <div class="card-body py-3">
    @include("dashboard.utility.error_messages")
      @include("dashboard.utility.sucess_message")
    <form method="POST" action="{{ url('dashboard/customers/updateprofile') }}/{{$user->id}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">@lang('site.customer_name')</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">@lang('site.email')</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">@lang('site.identy_num')</label>
            <input type="text" class="form-control" name="identity_num" value="{{$user->identity_num}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">@lang('site.mobile')</label>
            <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}">
          </div>
        </div>
      </div>
    <button type="submit" class="btn btn-primary">+ {{ __('site.save') }} </button>
  </form>
  </div>
</div>
@endsection
