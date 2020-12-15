@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">الاعدادات</h3>
  </div>
  <div class="card-body py-3">

      @include("dashboard.utility.error_messages")
        @include("dashboard.utility.sucess_message")
    <form method="POST" action="{{ url('dashboard/settings/update') }}"  class="form_submit_model">
      @csrf
      <div class="row">
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">عدد المشاريع المنفذة</label>
            <input type="text" class="form-control" name="done_projects_num" value="{{$settings->done_projects_num}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">عدد العملاء</label>
            <input type="text" class="form-control" name="customer_num" value="{{$settings->customer_num}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">عدد الدول التى نخدمها</label>
            <input type="text" class="form-control" name="countries_num" value="{{$settings->countries_num}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">عدد المستفدين</label>
            <input type="text" class="form-control" name="befend_num" value="{{$settings->befend_num}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">رقم الجوال</label>
            <input type="text" class="form-control" name="phone" value="{{$settings->phone}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">البريد الالكترونى</label>
            <input type="email" class="form-control" name="email" value="{{$settings->email}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">Facebook</label>
            <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">Youtube</label>
            <input type="text" class="form-control" name="youtube" value="{{$settings->youtube}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">Instegrame</label>
            <input type="text" class="form-control" name="instegrame" value="{{$settings->instegrame}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">Twitter</label>
            <input type="text" class="form-control" name="twitter" value="{{$settings->twitter}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">العنوان</label>
            <input type="text" class="form-control" name="address" value="{{$settings->address}}">
          </div>
        </div>
        <div class="col-lg-6 deep">
          <div class="mb-3">
            <label class="form-label">الفيديو</label>
            <input type="text" class="form-control" name="vedio_intro" value="{{$settings->vedio_intro}}">
          </div>
        </div>
      </div>

    <div class="row masged">
      <div class="col-lg-12">
        <div class="mb-3">
          <label class="form-label">محتوى الهيدر</label>
            <textarea class="form-control header_text" rows="3" name="header_text">{{$settings->header_text}}</textarea>
        </div>
      </div>
    </div>



    <input type="hidden" name="update" value="1" />
    <button type="submit" class="btn btn-primary">+ {{ __('site.save') }} </button>
  </form>
  </div>
</div>
@endsection
@section('footerjscontent')
<script>
</script>
@endsection
