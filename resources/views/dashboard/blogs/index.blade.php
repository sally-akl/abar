@extends('dashboard.layouts.master')
@section('content')
@if(count($blogs)==0)
<div class="empty">
  <div class="empty-icon">
    <img src="{{url('/')}}/img/illustrations/undraw_printing_invoices_5r4r.svg" height="128" class="mb-4"  alt="">
  </div>
  <p class="empty-title h3">@lang('site.no_result')</p>
  <p class="empty-subtitle text-muted">
    @lang('site.add_new_records')
  </p>
  <div class="empty-action">
    <a href='{{url("/dashboard/blog/create")}}' class="btn btn-primary add_btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      @lang('site.new_add')
    </a>
  </div>
</div>
@else
<div class="card">
  <div class="card-header">
    <h3 class="card-title">المدونة</h3>
  </div>
  <div class="card-body border-bottom py-3">
    <div class="d-flex">
      <a href='{{url("/dashboard/blog/create")}}' class="btn btn-primary add_btn">
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
               عنوان المقال
            </th>
            <th>
              تحت قسم
            </th>
            <th>
               تاريخ النشر
            </th>
             <th>
                تاريخ الاضافة
             </th>
             <th>
                مفعل ؟
             </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($blogs as $key => $blog)
          <tr>
            <td>{{$blog->blog_title }}</td>
            <td>{{$blog->category_name}}</td>

            <td>{{date("Y-m-d",strtotime($blog->publish_date))}}</td>
            <td>{{date("Y-m-d",strtotime($blog->created_at))}}</td>
            @if($blog->is_active == 0)
              <td><span class="badge bg-red">@lang('site.no')</span>    </td>
            @else
              <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
            @endif

            <td class="text-right">
              <a class='btn btn-info btn-xs edit_btn' href='{{url("/dashboard/blog/{$blog->id}/edit")}}'>
    						<i class="far fa-edit"></i>
    					</a>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$blog->id}}">
    						<i class="far fa-trash-alt"></i>
    					</a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$blogs->links('dashboard.vendor.pagination.default')}}
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
    var url_delete = '{{url("/dashboard/blog")}}'+"/"+id;
    $.ajax({url: url_delete ,type: "DELETE", success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/blog")}}';
            }
    }});
  });
</script>
@endsection
