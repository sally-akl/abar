@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلب المشروع حسب الميزانية</li>
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
<section class="works-block no-flex" style="margin-top:10px;">
    <div class="container">

      <div class="row" style="margin-bottom:40px;">

        <div class="col-lg-12">
          <div class="row store_block_headers">
            <div class="col-lg-12">
               البحث حسب الميزانية
            </div>
          </div>
          <div class="row amount_search_box">
            <div class="col-lg-10">
              <form  class="contact__form search_amount_form" method="get" action="">
                @csrf
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label label-sm" style="margin-top: 10px;">الميزانية الخاصة بك</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalSuccess" name= "amount"  value="{{$price}}" placeholder="" class="form-control  form-control-success" type="text">
                    <input type="hidden" name="search" value="search" />
                  </div>
                </div>

            </div>
            <div class="col-lg-2">
              <button class="btn btn-main" name="submit" type="submit" style="margin-top: 4px;">بحث</button>
            </div>
            </form>
          </div>

        </div>

      </div>

      @php   $cities = \App\Country::all();  @endphp

       @foreach($cities as $city)
       <div class="row">
             <div class="col-lg-6">
                 <h3 class="main-title">{{$city->title}}</h3>

             </div>
        </div>

        @php
        if(!empty($price))
        {
          $next_price = $price+300;
          $projects = \App\Project::selectraw("projects.*")->leftjoin("project_multi_prices","projects.id","project_multi_prices.project_id")->whereraw("(projects.first_price  between ".$price." and   ".$next_price." ) or (project_multi_prices.price between ".$price." and   ".$next_price.") and add_to_store=1 and project_status='مفعل' and category_id=".$city->id)->orderby("projects.id","desc")->get();
        }
        else{
          $projects = $city->projects()->where("add_to_store",1)->where("project_status","مفعل")->orderby("id","desc")->get();
        }

        @endphp
        @foreach($projects as $project)

        @if(($project->project_category == 'ابار' || $project->project_category == "مراكز ومدارس") && $project->category_id == $city->id)

         <div class="row abar_list">
           <div class="col-lg-12">

             <div class="row store_block_headers">
               <div class="col-lg-3">
                <a href="{{url('/')}}/project/details/{{$project->id}}/{{$project->project_name}}"> {{$project->project_name}} </a>
               </div>
               <div class="col-lg-6" style="text-align: center;">
                 مواصفات المشروع
               </div>
               <div class="col-lg-3" style="text-align: center;">
                 العمق والسعر
               </div>
             </div>


             <div class="row store_block_content">
               <div class="col-lg-3">
                <a href="{{url('/')}}/project/details/{{$project->id}}/{{$project->project_name}}"> <img src="{{url('/')}}{{$project->project_photo}}" alt="" class="img-fluid rounded"> </a>
               </div>
               <div class="col-lg-6">
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
               <div class="col-lg-3">
                 @if($project->project_category == "ابار")
                 <div class="row details_m">
                   <div class="col-lg-12">
                     <div class="details_m_m">
                     <span>  العمق  </span>
                     <span class="details_price">{{$project->deep}}</span>
                     </div>
                   </div>
                 </div>
                 @endif
                 <div class="row details_m">
                   <div class="col-lg-12">
                     <div class="details_m_m">
                     <span>   السعر </span>
                     <span class="details_price">{{$project->first_price}}</span>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         @endif
         @if($project->project_category == "مساجد" && $project->category_id == $city->id)
         <div class="row abar_list">
           <div class="col-lg-12">

             <div class="row store_block_headers">
               <div class="col-lg-2" style="text-align: center;">
                 صورة المسجد
               </div>
               <div class="col-lg-2" style="text-align: center;">
                 وصف المسجد
               </div>
               <div class="col-lg-2" style="text-align: center;">
                  عدد المصلين
               </div>
               <div class="col-lg-2" style="text-align: center;">
                 نوع السقف
               </div>
               <div class="col-lg-2" style="text-align: center;">
                 المساحة
               </div>
               <div class="col-lg-2" style="text-align: center;">
                السعر
               </div>
             </div>

             <div class="row store_block_content">
               <div class="col-lg-2">
                 <a href="{{url('/')}}/project/details/{{$project->id}}/{{$project->project_name}}"><img src="{{url('/')}}{{$project->project_photo}}" alt="" class="img-fluid rounded"></a>
               </div>
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
                     <div>{{$extra->price}}</div>
                     @endforeach
                   </div>
                 </div>

               </div>
             </div>
           </div>
         </div>
         @endif
         @endforeach
       @endforeach


    </div>
</section>
<!-- end blogs section -->
@endsection
