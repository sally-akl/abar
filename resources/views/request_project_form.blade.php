@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلب مشروع</li>
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
<section class="works-block blue-color no-flex" style="margin-top:10px;">
    <div class="container">

      @php
      $project_name = "";
      if($type == "ابار" || $type == "مراكز ومدارس")
      {
        $project = \App\Project::find($id);
        $project_name = $project->project_name;
      }
      else
      {
        $extra = \App\ProjectPrices::find($id);
        $project_name= $extra->project->project_name;
      }

      @endphp
      <div class="row">
            <div class="col-lg-6">
                <h3 class="main-title">طلب جديد لمشروع {{$project_name}}</h3>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
          <div class="col-lg-6 col-sm-12">
            <div class="card other_details">
              <div class="card-body">

                <div class="mb-3">
                    <i class="fas fa-align-justify"></i>
                    <span>  اسم المشروع :-  </span>    <strong>{{$project_name}}</strong>
                </div>
                @if($type == "ابار" || $type == "مراكز ومدارس")
                  <div class="mb-3">
                      <i class="fa fa-calendar"></i>
                      <span>   فترة التنفيذ :- </span>    <strong>{{$project->from}} - {{$project->to}}  {{$project->period_type}}</strong>
                  </div>
                @else
                  <div class="mb-3">
                      <i class="fa fa-calendar"></i>
                      <span>   فترة التنفيذ :- </span>    <strong>{{$extra->project->from}} - {{$extra->project->to}}  {{$extra->project->period_type}}</strong>
                  </div>
                @endif

                @if($type == "ابار" )

                <div class="mb-3">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                    <span>العمق :- </span>    <strong>{{$project->deep}}</strong>
                </div>

                @endif

                @if($type == "ابار" || $type == "مراكز ومدارس")
                <div class="mb-3">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>السعر :- </span>    <strong>{{$project->first_price}}</strong>
                </div>
                @endif


                @if($type == "مساجد" )
                <div class="mb-3">
                    <i class="fas fa-praying-hands"></i>
                    <span>نوع المسجد :- </span>    <strong>{{$extra->project_details}}</strong>
                </div>
                <div class="mb-3">
                    <i class="fas fa-pray"></i>
                    <span>عدد المصليين</span>    <strong>{{$extra->prayer_num}}</strong>
                </div>
                <div class="mb-3">
                    <i class="fas fa-border-none"></i>
                    <span>نوع السقف :- </span>    <strong>{{$extra->ceil_type}}</strong>
                </div>
                <div class="mb-3">
                    <i class="fas fa-warehouse"></i>
                    <span>المساحة :- </span>    <strong>{{$extra->area}}</strong>
                </div>
                <div class="mb-3">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>السعر :- </span>    <strong>{{$extra->price}}</strong>
                </div>
                @endif


              </div>
            </div>

            <div class="card other_details" style="margin-top:20px;">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <h4>وسائل الدفع</h4>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="card other_details">
              <div class="card-body">
                <form id="contact-form" class="contact__form request_form" method="post" action="">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label label-sm">الاسم الثلاثى</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name= "name"  value="{{ old('name') }}" placeholder="" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} form-control-success" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label label-sm">البريد الالكترونى</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name= "email"  value="{{ old('email') }}" placeholder="" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} form-control-success" type="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label label-sm">رقم الهوية</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name= "hawaya"  value="{{ old('hawaya') }}" placeholder="" class="form-control {{ $errors->has('hawaya') ? ' is-invalid' : '' }} form-control-success" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label label-sm">رقم الجوال</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name= "phone"  value="{{ old('phone') }}" placeholder="" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }} form-control-success" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label label-sm">الاسم على اللوحة</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name= "name_in_board"  value="{{ old('name_in_board') }}" placeholder="" class="form-control {{ $errors->has('name_in_board') ? ' is-invalid' : '' }} form-control-success" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label label-sm">كيف تم التعرف علينا</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name= "how_to_know_us"  value="{{ old('how_to_know_us') }}" placeholder="" class="form-control {{ $errors->has('how_to_know_us') ? ' is-invalid' : '' }} form-control-success" type="text">
                    </div>
                  </div>
                  <div class="form-group row">

                    <div class="col-sm-12">
                      <input  name= "agree_to"  class="{{ $errors->has('how_to_know_us') ? ' is-invalid' : '' }} form-control-success" type="checkbox"> <a href="" target="_blank">الموافقة على الشروط والاحكام</a>
                    </div>
                  </div>
                  <button class="btn btn-main" name="submit" type="submit">طلب المشروع</button>
               </form>
              </div>
            </div>

          </div>
        </div>






    </div>
</section>
<!-- end blogs section -->
@endsection
