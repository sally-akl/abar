@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$project->project_name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="curve">
        <svg class="hidden-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="801px" height="122px">
            <path fill-rule="evenodd" fill="#013a67"
                  d="M801.000,3.185 L783.212,3.045 C794.495,2.876 801.000,3.185 801.000,3.185 ZM600.415,38.234 C600.415,38.234 552.126,60.405 533.553,75.406 C533.553,75.406 467.753,115.101 428.485,120.013 C428.485,120.013 411.214,122.840 400.500,121.733 C389.786,122.840 372.515,120.013 372.515,120.013 C333.247,115.101 267.447,75.406 267.447,75.406 C248.874,60.405 200.585,38.234 200.585,38.234 C127.481,8.314 51.407,3.550 17.788,3.045 L396.646,0.059 L396.646,-0.002 L400.500,0.028 L404.354,-0.002 L404.354,0.059 L783.212,3.045 C749.593,3.550 673.519,8.314 600.415,38.234 ZM17.788,3.045 L-0.000,3.185 C-0.000,3.185 6.505,2.876 17.788,3.045 Z" />
        </svg>
        <svg class="only-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="320px" height="56px">
            <path fill-rule="evenodd" fill="#013a67"
                  d="M360.207,1.854 L352.209,1.791 C357.283,1.714 360.207,1.854 360.207,1.854 ZM270.002,17.615 C270.002,17.615 248.285,27.586 239.933,34.332 C239.933,34.332 210.342,52.184 192.682,54.393 C192.682,54.393 184.915,55.662 180.097,55.164 C175.279,55.662 167.512,54.393 167.512,54.393 C149.853,52.184 120.262,34.332 120.262,34.332 C111.909,27.586 90.193,17.615 90.193,17.615 C57.316,4.160 23.104,2.018 7.986,1.791 L178.364,0.448 L178.364,0.420 L180.097,0.434 L181.831,0.420 L181.831,0.448 L352.209,1.791 C337.091,2.018 302.878,4.160 270.002,17.615 ZM7.986,1.791 L-0.013,1.854 C-0.013,1.854 2.912,1.714 7.986,1.791 Z" />
        </svg>
        <!-- video player -->
                        <a class="btn video-player lightbox-iframe" href="{{\App\Settings::find(1)->vedio_intro}}">
                <svg class="svg-inline--fa fa-caret-right fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg=""><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg><!-- <i class="fas fa-caret-right"></i> -->
                <span></span>
            </a>

    </div>
</section>
<!-- end main header -->
@endsection
@section('content')
<!-- start blogs section -->
<section class="blogs-block blue-color w-curve replace-mr no-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="main-title">{{$project->project_name}}</h3>
            </div>
        </div>

          <div class="row">
            <div class="col-lg-8" style="padding: 12px">
              <div class="project_row">
                <span class="btn promotion-color category">{{$project->project_category}}</span>
                <div class="project_period">
                  <i class="fa fa-calendar"></i>
                     فترة التنفيذ :- {{$project->from}} - {{$project->to}}  {{$project->period_type}}
                </div>
              <!--  <div class="project_period">
                  <i class="fas fa-money-bill-wave-alt"></i>
                   عدد الطلبات المنفذة :-  {{$project->requests()->count()}}

                </div>
              -->
              </div>
            </div>
          </div>

        <div class="row">
          <div class="col-lg-8">
            <img src="{{url('/')}}{{$project->project_photo}}" alt="" class="img-fluid rounded">
          </div>
          <div class="col-lg-4">
            <div class="card other_details">
              <div class="card-body">
                <div class="mb-3">
                    <i class="fas fa-globe-americas"></i>
                    <span>  الدولة :-  </span>    <strong>{{$project->country->title}}</strong>
                  </div>
                  @if($project->project_category == "ابار")
                    <div class="mb-3">
                        <i class="fas fa-arrow-alt-circle-down"></i>
                        <span>العمق :- </span>    <strong>{{$project->deep}}</strong>
                    </div>
                  @endif
                  <div class="mb-3">
                      <i class="fas fa-project-diagram"></i>
                      <span>نوع المشروع :- </span>    <strong>{{$project->project_category}}</strong>
                  </div>

                  @if($project->project_category == "ابار" || $project->project_category == "مراكز ومدارس")
                  <div class="mb-3">
                      <i class="fas fa-money-bill-wave"></i>
                      <span>السعر :- </span>    <strong>{{$project->first_price}}</strong>
                  </div>
                  @endif

                  <div class="mb-3">
                     <i class="fas fa-heart"></i>
                    <a href="#" data-ref="{{url('/')}}/project/add/favorate" class="add_to_fav"> <strong>اضافة الى المفضلة</strong> </a>
                    <div class="alert alert-danger alert-danger-modal" style="display:none">
                    </div>
                    <div class="alert alert-success alert-success-modal" style="display:none">
                    </div>
                  </div>

                  <input type="hidden" name="hidden_d" value="{{$project->id}}" />
                  <input type="hidden" name="csrf" value="{{ csrf_token() }}" />


              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="additional_details">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4>مشاريع اخرى </h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      @php $projects = \App\Project::where("project_category",$project->project_category)->where("id","!=",$project->id)->where("add_to_store",1)->where("project_status","مفعل")->orderby("id","desc")->take(2)->get();    @endphp
                      @foreach($projects as $relatedproject)
                        <div class="row project_block">
                          <div class="col-lg-4">
                            <a href="{{url('/')}}/project/details/{{$relatedproject->id}}/{{$relatedproject->project_name}}"><img src="{{url('/')}}{{$relatedproject->project_photo}}" alt="" class="img-fluid rounded"></a>
                          </div>
                          <div class="col-lg-8">
                            <div><h5>{{$relatedproject->project_name}}</h5></div>
                            <div class="row" >
                              <div class="col-lg-6">
                                <i class="fas fa-globe-americas"></i>
                                <strong>{{$relatedproject->country->title}}</strong>
                              </div>
                              <div class="col-lg-6">
                                <i class="fas fa-project-diagram"></i>
                                 <strong>{{$relatedproject->project_category}}</strong>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                  @if($relatedproject->project_category == "ابار")
                                  <i class="fas fa-arrow-alt-circle-down"></i>
                                   <strong>{{$relatedproject->deep}}</strong>
                                    @endif
                              </div>
                              <div class="col-lg-6">
                                  @if($relatedproject->project_category == "ابار" || $relatedproject->project_category == "مراكز ومدارس")
                                  <i class="fas fa-money-bill-wave"></i>
                                    <strong>{{$relatedproject->first_price}}</strong>
                                    @endif
                              </div>
                            </div>

                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>



        </div>

        @if($project->project_category == "ابار" || $project->project_category == "مراكز ومدارس")

        <div class="row">
          <div class="col-lg-8">
            <div class="additional_details">
              <div class="row">
                <div class="col-lg-12">
                  <h4>مواصفات المشروع</h4>
                </div>
              </div>
              <div class="row chara_list">
                @php  $count = 0; @endphp
                @foreach($project->specialize as $k=>$special)
                    @php  $count++; @endphp
                    @if($k == 0)
                      <div class="col-lg-6">
                    @endif

                    @if($k != 0 && $k%5 == 0)
                       </div>
                       <div class="col-lg-6">
                    @endif

                    <div><i class="fa fa-square"></i> <span>{{$special->title}}</span></div>
                @endforeach


                  </div>

              </div>
            </div>
          </div>
        </div>
        @else
        <div class="row">
          <div class="col-lg-8">
            <div class="additional_details">
              <div class="row">
                <div class="col-lg-12">
                  <h4>انواع المساجد للطلب</h4>
                </div>
              </div>
            <div class="row">

              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-12 msg_details_sm">
                    @foreach($project->extracharacters as $extra )
                    <div>{{$extra->project_details}}</div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-12 msg_details_sm">
                    @foreach($project->extracharacters as $extra )
                    <div>{{$extra->prayer_num}}</div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-12 msg_details_sm">
                    @foreach($project->extracharacters as $extra )
                    <div>{{$extra->ceil_type}}</div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-12 msg_details_sm">
                    @foreach($project->extracharacters as $extra )
                    <div>{{$extra->area}}</div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div class="col-lg-2">

                <div class="row">
                  <div class="col-lg-12 msg_details_sm">
                    @foreach($project->extracharacters as $extra )
                    <div><i class="fas fa-money-bill-wave"></i> {{$extra->price}}</div>
                    @endforeach
                  </div>
                </div>

              </div>
              @if($project->is_require_for_request == 1)
              <div class="col-lg-2">

                <div class="row">
                  <div class="col-lg-12 msg_details_sm">
                    @foreach($project->extracharacters as $extra )
                    <div> <a href="{{url('/')}}/project/request/{{$project->project_category}}/{{$extra->id}}">  طلب المشروع  </a></div>
                    @endforeach
                  </div>
                </div>

              </div>
              @endif
            </div>
          </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-8">
            <div class="additional_details">
              <div class="row">
                <div class="col-lg-12">
                  <h4>مواصفات المشروع</h4>
                </div>
              </div>
              <div class="row chara_list">
                <div class="col-lg-12">
                  <p>{{$project->details}}</p>
                </div>

              </div>
            </div>
          </div>
        </div>
        @endif

        @if($project->project_category == "ابار" || $project->project_category == "مراكز ومدارس")
        <div class="row" style="margin-top:20px;">
          <div class="col-lg-2">
            @if($project->is_require_for_request == 1)
            <a href="{{url('/')}}/project/request/{{$project->project_category}}/{{$project->id}}" class="btn  btn-block">
                      اطلب
                      </a>
            @endif
          </div>
        </div>

        @endif

    </div>
</section>
<!-- end blogs section -->
@endsection
@section('footerjscontent')
<script type="text/javascript">
$(".add_to_fav").on("click",function(){

var url = $(this).attr("data-ref");
var $method_is = "POST";
var formData = new FormData();
formData.append("id",$("input[name='hidden_d']").val());
formData.append("_token",$('input[name="csrf"]').val());
$(".alert-success-modal").css("display","none");
$(".alert-danger-modal").css("display","none");
$.ajax({
    url: url,
    type: $method_is,
    data: formData,
    async: false,
    dataType: 'json',
    success: function (response) {
      if(response.sucess)
      {
        $(".alert-success-modal").html(response.sucess_text);
        $(".alert-success-modal").css("display","block");
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
