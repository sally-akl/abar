@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">التعليقات على مقال {{\App\blog::findOrFail($id)->blog_title}}</h3>
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
               الاسم
            </th>
            <th>
              البريد الالكترونى
            </th>
            <th>
              محتوى التعليق
            </th>
             <th>
                يتم نشره ؟
             </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($blog->comments as $key => $comment)
          <tr>
            <td>{{$comment->name }}</td>
            <td>{{$comment->email}}</td>

            <td>{{$comment->comment_text}}</td>
            @if($comment->is_published == 0)
              <td><span class="badge bg-red">@lang('site.no')</span>    </td>
            @else
              <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
            @endif

            <td class="text-right">
              <form method="post" action="{{url('/dashboard/blogs/comments/update')}}/{{$comment->id}}" class="accept_form">
                @csrf
                <select name="comment_status" class="form-control">
                  <option value="0" {{$comment->is_published == 0?"selected":""}}>وقف النشر</option>
                  <option value="1" {{$comment->is_published == 1?"selected":""}}>يتم النشر</option>
                </select>
                <input type="hidden" name="id" value="{{$id}}" />
              </form>
    					<a href="#" class="btn btn-danger btn-xs delete_btn"  bt-data="{{$comment->id}}">
    						<i class="far fa-trash-alt"></i>
    					</a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">

    </div>
  </div>
</div>
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
    var url_delete = '{{url("/dashboard/blogs/comments/delete")}}'+"/"+id;
    $.ajax({url: url_delete , success: function(result){
            var result = JSON.parse(result);
            if(result.sucess)
            {
              window.location.href = '{{url("/dashboard/blogs/comments")}}'+"/"+id;
            }
    }});
  });
  $("select[name='comment_status']").on("change",function(){
    $(".accept_form").submit();
  });
</script>
@endsection
