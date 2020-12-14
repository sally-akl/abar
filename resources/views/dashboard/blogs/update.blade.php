@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">تعديل بيانات المقال</h3>
  </div>
  <div class="card-body py-3">
    <div class="alert alert-danger alert-danger-modal" style="display:none">
    </div>
    <div class="alert alert-success alert-success-modal" style="display:none">
    </div>
    <form method="POST" action="{{ url('dashboard/blogs/update') }}/{{$blog->id}}" enctype="multipart/form-data" class="form_submit_model">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">عنوان المقال</label>
            <input type="text" class="form-control" name="blog_title" value="{{$blog->blog_title}}">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
             <label class="form-label">صورة المقال</label>
             <input  name="blog_img" type="file" id="imageInput" class="form-control-file">
             @if(!empty($blog->blog_img))
               <img src="{{$blog->blog_img}}" width="100" height="100" />
             @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">تحت قسم</label>
            <select class="form-control" name="category_name">
              <option value="">@lang('site.select')</option>
              <option value="المساجد" {{$blog->category_name == "المساجد"?"selected":""}}>المساجد</option>
              <option value="الابار" {{$blog->category_name == "الابار"?"selected":""}}>الابار</option>
              <option value="المراكز والمدارس" {{$blog->category_name == "المراكز والمدارس"?"selected":""}}>المراكز والمدارس</option>
            </select>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">تاريخ النشر</label>
            <input type="date" class="form-control" name="publish_date" value="{{date('Y-m-d',strtotime($blog->publish_date))}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">مفعل ؟</label>
            <select class="form-control" name="is_active">
              <option value="">@lang('site.select')</option>
              <option value="1" {{$blog->is_active == 1?"selected":""}}>مفعل</option>
              <option value="0" {{$blog->is_active == 0?"selected":""}}>غير مفعل</option>

            </select>
          </div>
        </div>
      </div>
      <div class="row masged">
        <div class="col-lg-12">
          <div class="mb-3">
            <label class="form-label">محتوى المقال</label>
              <textarea class="form-control user_body" rows="3" name="blog_desc">{{$blog->blog_desc}}</textarea>
          </div>
        </div>
      </div>
    <button type="submit" class="btn btn-primary">+ {{ __('site.save') }} </button>
  </form>
  </div>

</div>
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
  //  window.location.href = '{{url("/dashboard/country")}}';
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
$(".form_submit_model").submit(function(e){

    e.preventDefault();
    var submit_form_url = $(this).attr('action');
    var $method_is = "POST";
    var formData = new FormData($(this)[0]);
    $(".alert-success-modal").css("display","none");
    $(".alert-danger-modal").css("display","none");
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

      return false;
});

</script>
@endsection
