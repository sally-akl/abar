@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.contacts') - @lang('site.new_add') </h3>
  </div>
  <div class="card-body py-3">
    @include("dashboard.utility.error_messages")
    <form method="POST" action="{{ url('dashboard/customercontracts') }}" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.contract_title')</label>
          <input type="text" class="form-control" name="contract_name" value="{{old('contract_name')}}">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label class="form-label">@lang('site.contract_type')</label>
          <select class="form-control" name="contract_type" disabled>
            <option value="">@lang('site.select')</option>
            <option value="ready"  selected>@lang('site.ready_in_pdf')</option>
            <option value="manually" >@lang('site.enter_contract_manually')</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
           <label class="form-label">@lang('site.begin_date')</label>
           <input type="date" class="form-control" name="contract_begin_date" value="{{old('contract_begin_date')}}">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
           <label class="form-label">@lang('site.end_date')</label>
           <input type="date" class="form-control" name="contract_end_date" value="{{old('contract_end_date')}}">
        </div>
      </div>
    </div>
    <div class="row ready_contract_div">
      <div class="col-lg-6">
        <div class="mb-3">
           <label class="form-label">@lang('site.contract_file')</label>
           <input  name="contract_pdf" type="file" id="imageInput" class="form-control-file">
        </div>
      </div>
    </div>
    <div>
    <div class="row manually_contract_div" style="display:none;">
      <div class="row">
        <div class="col-lg-12">
          <div>
            <label class="form-label">@lang('site.content')</label>
            <textarea class="form-control contract_body" rows="3" name="contract_content"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">@lang('site.signiture_first_person')</label>
            <div id="signature"></div>
						<a href="#" class="remove_signature" data-val="signature">@lang('site.remove_sign')</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">@lang('site.signiture_second_person')</label>
            <div id="signature_second"></div>
						<a href="#" class="remove_signature" data-val="signature_second">@lang('site.remove_sign')</a>
          </div>
        </div>
      </div>
      <input type="hidden" name="sign_one" value="" />
			<input type="hidden" name="sign_two" value="" />
      <input type="hidden" name="contract_request" value="{{$request_id}}" />
    </div>
    </div>
    <button type="submit" class="btn btn-primary">+ {{ __('site.save') }} </button>
  </form>
  </div>

</div>
@endsection
@section('footerjscontent')
<script type="text/javascript">
$("select[name='contract_type']").on("change",function(){
    var val = $(this).val();
    $(".ready_contract_div").css("display","none");
    $(".manually_contract_div").css("display","none");
    if(val == "ready")
      $(".ready_contract_div").css("display","flex");
    else
      $(".manually_contract_div").css("display","flex");
});
ClassicEditor.create( document.querySelector('.contract_body') )
    .catch( error => {
        console.error( error );
    });
    $(document).ready(function() {
        var sinature_one = $("#signature");
    		var signature_two = $("#signature_second");
    		sinature_one.jSignature({
        height: 200
        });
      		signature_two.jSignature({
          height: 200
        });

    		$(".remove_signature").on("click",function()
    		{
    			var val = $(this).attr("data-val");
    			if(val == "signature")
    			{
    				sinature_one.jSignature("reset");
    				$("input[name='sign_one']").val("");
    			}
    			else
    			{
    				signature_two.jSignature("reset");
    				$("input[name='sign_two']").val("");
    			}
          return false;
    	  });


    		$("#signature").bind('change', function(e){
    			var datapair = sinature_one.jSignature("getData");
    			$("input[name='sign_one']").val(datapair);
    		});

    		$("#signature_second").bind('change', function(e){
    			var datapair = signature_two.jSignature("getData");
    			$("input[name='sign_two']").val(datapair);
    		});
    });


</script>
@endsection
