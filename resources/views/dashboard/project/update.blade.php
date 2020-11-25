@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.projects_all') - @lang('site.update') {{$product->project_name}} </h3>
  </div>
  <div class="card-body py-3">
    <div class="alert alert-danger alert-danger-modal" style="display:none">
    </div>
    <div class="alert alert-success alert-success-modal" style="display:none">
    </div>
    <form method="POST" action="{{ url('dashboard/project/update') }}/{{$product->id}}" enctype="multipart/form-data" class="form_submit_model">
      @csrf
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.proj_name')</label>
          <input type="text" class="form-control" name="proj_name" value=" {{$product->project_name}}">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
           <label class="form-label">@lang('site.project_photo')</label>
           <input  name="proj_photo" type="file" id="imageInput" class="form-control-file">
           <img src="{{$product->project_photo}}" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.proj_status')</label>
          <select class="form-control" name="proj_status">
            <option value="">@lang('site.select')</option>
            <option value="@lang('site.active')" {{$product->project_status == "مفعل"?"selected":""}}>@lang('site.active')</option>
            <option value="@lang('site.not_active')" {{$product->project_status == "غير مفعل"?"selected":""}}>@lang('site.not_active')</option>
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.avial_for_request')</label>
          <select class="form-control" name="proj_av_for_request" >
            <option value="">@lang('site.select')</option>
            <option value="1" {{$product->is_require_for_request == 1?"selected":""}}>@lang('site.yes')</option>
            <option value="0" {{$product->is_require_for_request == 0?"selected":""}}>@lang('site.no')</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.from')</label>
          <input type="number" class="form-control" name="from" value="{{$product->from}}">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.to')</label>
          <input type="number" class="form-control" name="to" value="{{$product->to}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.period_type')</label>
          <select class="form-control" name="period_type" >
            <option value="">@lang('site.select')</option>
            <option value="@lang('site.months')" {{$product->period_type == "اشهر"?"selected":""}}>@lang('site.months')</option>
            <option value="@lang('site.days')" {{$product->period_type == "ايام"?"selected":""}}>@lang('site.days')</option>
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.exist_in_store')</label>
          <select class="form-control" name="proj_exist_in_store" >
            <option value="">@lang('site.select')</option>
            <option value="1" {{$product->add_to_store == 1?"selected":""}}>@lang('site.yes')</option>
            <option value="0" {{$product->add_to_store == 0?"selected":""}}>@lang('site.no')</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.under_country')</label>
          <select class="form-control" name="proj_country" >
            <option value="">@lang('site.select')</option>
              @foreach(\App\Country::all() as $country)
                <option value="{{$country->id}}" {{$product->category_id  == $country->id?"selected":""}}>{{$country->title}}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.project_category')</label>
          <select class="form-control" name="project_category" >
            <option value="">@lang('site.select')</option>
            <option value="@lang('site.abar')" {{$product->project_category == 'ابار'?"selected":""}}>@lang('site.abar')</option>
            <option value="@lang('site.masged')" {{$product->project_category == 'مساجد'?"selected":""}}>@lang('site.masged')</option>
            <option value="@lang('site.schools')" {{$product->project_category == 'مراكز ومدارس'?"selected":""}}>@lang('site.schools')</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row masged" style="display:none;">
      <div class="col-lg-12">
        <div class="mb-3">
          <label class="form-label">@lang('site.pro_details')</label>
            <textarea class="form-control user_body" rows="3" name="pro_details">{{$product->details}}</textarea>
        </div>
      </div>
    </div>
    <div class="row abar" style="display:none;">
      <div class="col-lg-6 deep">
        <div class="mb-3">
          <label class="form-label">@lang('site.deep')</label>
          <input type="text" class="form-control" name="proj_deep" value="{{$product->deep}}">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.price')</label>
          <input type="number" class="form-control" name="proj_price" value="{{$product->first_price}}">
        </div>
      </div>
    </div>
    <div class="row abar" {{$product->project_category == "ابار" || $product->project_category == 'مراكز ومدارس'?'':'style=display:none'}} >
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.characters_project')</label>
          <div class="characters_div">
            @if($product->project_category == "ابار" || $product->project_category == 'مراكز ومدارس')
            @foreach($specializes as $k=>$spec)
            @php  $i = $k + 1; @endphp
            <div class="row ch_htm_div remove_ch_div{{$i}}">
               <div class="col-lg-9">
                  <input type="text" class="form-control" name="characters{{$i}}" value="{{$spec->title}}" >
               </div>
               @if($i != 1)
                <div class="col-lg-3">
                   <button type="button" class="btn btn-danger rem_btn" data-remove="{{$i}}">-</button>
                </div>
               @endif
            </div>
            @endforeach
            @endif
          </div>
          <div class="row">
              <div class="col-lg-12">
                <button type="button" class="btn btn-primary add_character">+</button>
              </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row masged" {{$product->project_category == "مساجد" ?'':'style=display:none'}}>
      <div class="col-lg-12">
        <div class="mb-3">
          <label class="form-label">@lang('site.characters_project')</label>
          <div class="msgd_characters_div">
            @if($product->project_category == "مساجد")
            @foreach($sp_prices as $k=>$sp)
            @php  $i = $k + 1; @endphp
            <div class="row  ch_htm_div msgd_remove_ch_div{{$k}}">
               <div class="col-lg-2">
                 <label>وصف المسجد</label>
                  <input type="text" class="form-control" name="msgd_characters{{$i}}"  value="{{$sp->project_details}}">
               </div>
               <div class="col-lg-2">
                 <label>عدد المصلين</label>
                  <input type="number" class="form-control" name="msgd_prayer_num{{$i}}" value="{{$sp->prayer_num}}">
               </div>
               <div class="col-lg-2">
                  <label>نوع السقف</label>
                  <input type="text" class="form-control" name="ceil_num{{$i}}" value="{{$sp->ceil_type}}">
               </div>
               <div class="col-lg-2">
                 <label>المساحة</label>
                  <input type="number" class="form-control" name="area_num{{$i}}" value="{{$sp->area}}">
               </div>
               <div class="col-lg-2">
                 <label>السعر</label>
                  <input type="number" class="form-control" name="price_num{{$i}}" value="{{$sp->price}}">
               </div>
               @if($i != 1)
                <div class="col-lg-2">
                  <div class="div_h_20"></div>
                  <button type="button" class="btn btn-danger msg_rem_btn" data-remove="{{$i}}">-</button>
                </div>
               @endif
            </div>
            @endforeach
            @endif
          </div>
          <div class="row">
              <div class="col-lg-12">
                <button type="button" class="btn btn-primary msgd_add_character">+</button>
              </div>
          </div>

        </div>
      </div>
    </div>
      @if(count($specializes)>0)
        @php  $count = count($specializes);  @endphp
      @else
          @php  $count = count($sp_prices);  @endphp
      @endif
      <input type="hidden" name="character_num" value="{{$count>0?$count:1}}" />
    <button type="submit" class="btn btn-primary">+ {{ __('site.save') }} </button>
  </form>
  </div>

</div>
@endsection
@section('footerjscontent')
<script type="text/javascript">
var i = parseInt($("input[name='character_num']").val());
var html = "";
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
var _remove = function()
{
  $(".rem_btn").off();
  $(".rem_btn").on("click",function(){
     var val = $(this).attr("data-remove");
     var rem = "remove_ch_div"+val;
     $(".characters_div").find("."+rem).remove();
  });
}
_remove();
$(".add_character").on("click",function(){
  i = i +1;
  var chr = "characters"+i;
  var rem = "remove_ch_div"+i;
  html = '<div class="row ch_htm_div '+rem+'"><div class="col-lg-9">';
  html += '<input type="text" class="form-control" name="'+chr+'" >';
  html +='</div>';
  html +='<div class="col-lg-3">';
  html +='<button type="button" class="btn btn-danger rem_btn" data-remove="'+i+'">-</button>';
  html +='</div>';
  html +='</div>';
  $(".characters_div").append(html);
  _remove();
  $("input[name='character_num']").val(i);
});
var _remove_m = function()
{
  $(".msg_rem_btn").off();
  $(".msg_rem_btn").on("click",function(){

     var val = $(this).attr("data-remove");
     var rem = "msgd_remove_ch_div"+val;
     $(".msgd_characters_div").find("."+rem).remove();
  });
}
_remove_m();
$(".msgd_add_character").on("click",function(){
  i = i +1;
  var msgd_characters = "msgd_characters"+i;
  var msgd_prayer_num = "msgd_prayer_num"+i;
  var ceil_num = "ceil_num"+i;
  var area_num = "area_num"+i;
  var price_num = "price_num"+i;
  var rem = "msgd_remove_ch_div"+i;
  html = '<div class="row ch_htm_div '+rem+'">';
  html +='<div class="col-lg-2"><label>وصف المسجد</label><input type="text" class="form-control" name="'+msgd_characters+'" ></div>';
  html +='<div class="col-lg-2"><label>عدد المصلين</label><input type="number" class="form-control" name="'+msgd_prayer_num+'" ></div>';
  html +='<div class="col-lg-2"><label>نوع السقف</label><input type="text" class="form-control" name="'+ceil_num+'" ></div>';
  html +='<div class="col-lg-2"><label>المساحة</label><input type="number" class="form-control" name="'+area_num+'" ></div>';
  html +='<div class="col-lg-2"><label>السعر</label><input type="number" class="form-control" name="'+price_num+'" ></div>';
  html +='<div class="col-lg-2"><div class="div_h_20"></div><button type="button" class="btn btn-danger msg_rem_btn" data-remove="'+i+'">-</button></div>';
  html +='</div>';
  $(".msgd_characters_div").append(html);
  _remove_m();
  $("input[name='character_num']").val(i);
});


$("select[name='project_category']").on("change",function(){
    var val = $(this).val();
    var rem = "";
    i = 1;

    $(".abar").css("display","none");
    $(".masged").css("display","none");
    $(".deep").css("display","block");

    if(val == "ابار" || val == "مراكز ومدارس" )
    {
      $(".abar").css("display","flex");
      if(val == "مراكز ومدارس" )
      {
        $(".deep").css("display","none");
      }

      for(var x=2;x<=$("input[name='character_num']").val();x++)
      {
        rem = "msgd_remove_ch_div"+x;
        $(".msgd_characters_div").find("."+rem).remove();
      }
    }
    else
    {
      $(".masged").css("display","flex");
      for(var x=2;x<=$("input[name='character_num']").val();x++)
      {
        rem = "remove_ch_div"+x;
        $(".characters_div").find("."+rem).remove();
      }

    }
    $("input[name='character_num']").val(i);
});
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
