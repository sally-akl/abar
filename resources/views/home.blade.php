@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content">
    <div class="container">
        <div class="row f-height">
            <div class="col-lg-6">
                <h3 class="main-title sec-color">آبار السقاية </h3>
                <div class="header-txt">

                    <p>
                      {{\App\Settings::find(1)->header_text}}
                    </p>
                </div>
                <div class="header-btns">
                    <a href="#" class="btn btn-second">تعرف أكثر على مشاريعنا</a>
                    <a href="https://api.whatsapp.com/send?phone={{\App\Settings::find(1)->phone}}&text="
                       class="btn btn-white" target="_blank">
                        <img src="{{url('/')}}/img/whatsapp.png" class="img-fluid icon lozad">
                        طلب استشارة لاختيار مشروع
                    </a>
                </div>
                <div class="row counters">
                  <div class="col-lg-3 col-12 text-center">
                    <div class="card" >
                      <span data-toggle="counter-up">{{\App\Settings::find(1)->done_projects_num}}</span>
                      <p>المشاريع المنفذة</p>
                    </div>
                  </div>
                  <div class="col-lg-3 col-12 text-center">
                    <div class="card" style="background:#0bbfbf">
                      <span data-toggle="counter-up">{{\App\Settings::find(1)->customer_num}}</span>
                      <p>عميل</p>
                    </div>
                  </div>
                  <div class="col-lg-3 col-12 text-center">
                    <div class="card">
                      <span data-toggle="counter-up">{{\App\Settings::find(1)->countries_num}}</span>
                      <p>الدول التي نخدمها</p>
                    </div>
                  </div>
                  <div class="col-lg-3 col-12 text-center">
                    <div class="card">
                      <span data-toggle="counter-up">{{\App\Settings::find(1)->befend_num}}</span>
                      <p>عدد المستفيدين</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="header-img">
                  <img src="{{url('/')}}/img/m.jpg" alt="image header" class="img-fluid " data-loaded="true">
                </div>
            </div>
        </div>
    </div>
    <div class="curve">

      <svg class="hidden-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="801px" height="122px">
            <path fill-rule="evenodd" fill="#013a67" d="M801.000,3.185 L783.212,3.045 C794.495,2.876 801.000,3.185 801.000,3.185 ZM600.415,38.234 C600.415,38.234 552.126,60.405 533.553,75.406 C533.553,75.406 467.753,115.101 428.485,120.013 C428.485,120.013 411.214,122.840 400.500,121.733 C389.786,122.840 372.515,120.013 372.515,120.013 C333.247,115.101 267.447,75.406 267.447,75.406 C248.874,60.405 200.585,38.234 200.585,38.234 C127.481,8.314 51.407,3.550 17.788,3.045 L396.646,0.059 L396.646,-0.002 L400.500,0.028 L404.354,-0.002 L404.354,0.059 L783.212,3.045 C749.593,3.550 673.519,8.314 600.415,38.234 ZM17.788,3.045 L-0.000,3.185 C-0.000,3.185 6.505,2.876 17.788,3.045 Z"></path>
        </svg>
        <svg class="only-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="320px" height="56px">
            <path fill-rule="evenodd" fill="#013a67" d="M360.207,1.854 L352.209,1.791 C357.283,1.714 360.207,1.854 360.207,1.854 ZM270.002,17.615 C270.002,17.615 248.285,27.586 239.933,34.332 C239.933,34.332 210.342,52.184 192.682,54.393 C192.682,54.393 184.915,55.662 180.097,55.164 C175.279,55.662 167.512,54.393 167.512,54.393 C149.853,52.184 120.262,34.332 120.262,34.332 C111.909,27.586 90.193,17.615 90.193,17.615 C57.316,4.160 23.104,2.018 7.986,1.791 L178.364,0.448 L178.364,0.420 L180.097,0.434 L181.831,0.420 L181.831,0.448 L352.209,1.791 C337.091,2.018 302.878,4.160 270.002,17.615 ZM7.986,1.791 L-0.013,1.854 C-0.013,1.854 2.912,1.714 7.986,1.791 Z"></path>
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
<!-- start second section -->
<section class="project_done">
  <div class="container">
    <div class="section-header">
      <h3> <span>نماذج </span> للمشاريع المنفذة مؤخرا </h3>
      <p>هذه المشاريع تم تنفيذها فى البلدان التى نخدمها  ويمكن الطلب من
       <a href="#">هنا</a>
      </p>
    </div>
    <div class="row">
      <!-- start project -->
      @php $projects =  \App\Project::selectRaw("projects.*,requests.project_status,requests.user_id,requests.id as related_request_id")->join("requests","requests.project_id","projects.id")->where("requests.project_status",2)->orderBy("projects.id","desc")->take(3)->get();   @endphp
      @foreach($projects as $project)
      <div class="col-lg-4 col-md-6 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="project">
          <img src="{{$project->project_photo}}" class="img-fluid" alt="">
          <div class="project-info">
            <div class="project-info-content">
              <h4>{{$project->project_name}} - {{$project->project_category}}</h4>
              <span>{{$project->country->title}}</span>
            </div>
          </div>
          <div class="overlay">
              <div class="text">المزيد</div>
          </div>
        </div>
      </div>
      <!-- end project -->
      @endforeach
    </div>
  </div>
</section>
<!-- end second section -->
<!-- start services section -->
<section class="services-block blue-color w-curve">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <h3 class="main-title">مميزات خدماتنا</h3>
                <p class="font-color"></p>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="ion-ios-paper-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">تعاملات نظامية وموثقة </a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="ion-arrow-graph-up-left" style="color: #e98e06;"></i></div>
              <h4 class="title"><a href="">احترافية وجودة في التنفيذ </a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="ion-map" style="color: #2282ff;" ></i></div>
              <h4 class="title"><a href="">اختيار لموقع الاحتياج وفقا لدراسات مخصصة </a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="box">
              <div class="icon" style="background: #eafde7;"><i class="ion-clipboard" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">تطبيق استراتيجيا تفعالة لاستدامة المشروع </a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
            <div class="box">
              <div class="icon" style="background: #e1eeff;"><i class="ion-android-done-all" style="color: #2282ff;"></i></div>
              <h4 class="title"><a href="">توثيق تفصيلي لجميع مراحل المشروع </a></h4>
              <p class="description"></p>
            </div>
          </div>
        </div>

    </div>

</section>
<!-- end services section -->
<!-- start our works -->
<section class="works-block no-flex">
    <div class="container">
        <div class="center sm-width">
            <h3 class="main-title">المشاريع الاكثر طلبا</h3>

        </div>
        @php  $more_reqested_projects = \App\Project::selectRaw("projects.project_name,projects.project_photo,projects.id,projects.category_id,projects.project_category,count(requests.project_id) as project_count")->join("requests","requests.project_id","projects.id")->where("projects.project_status","مفعل")->orderBy("project_count","desc")->groupby("projects.project_name","projects.project_photo","projects.id","projects.category_id","projects.project_category")->get();  @endphp
        <div class="filters">
            <ul>
                <li class="btn btn-light workClass active choose_project" data-filter="*" >
                  <img src="" alt="all">مشاهدة الكل
                </li>
                <li data-filter=".apps1" class="btn btn-light workClass  choose_project" >
                   الابار
                </li>
                <li data-filter=".apps2" class="btn btn-light workClass  choose_project" >
                 المساجد
                </li>
                <li data-filter=".apps3" class="btn btn-light workClass  choose_project" >
                 المراكز والمدارس
                </li>
            </ul>
        </div>
    </div>
    <div class="filters-content">
        <div class="row grid" id="post-works" >

          @foreach($more_reqested_projects as $m_project)
            @if($m_project->project_category == "ابار")
            <div class="col-md-6 col-lg-4 all  apps1">
            @elseif($m_project->project_category == "مساجد")
            <div class="col-md-6 col-lg-4 all  apps2">
            @else
            <div class="col-md-6 col-lg-4 all  apps3">
            @endif
                <div class="single-content  card-overlay">
                    <img src="{{$m_project->project_photo}}" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{$m_project->project_name}} - {{$m_project->project_category}}</h5>
                        <div class="btns">
                            <a href="" class="btn btn-second">
                                <i class="fa fa-arrow-left"></i>
                                مشاهدة المزيد                    </a>

                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
    <a href="{{url('/')}}/store" class="btn btn btn-main auto-width mt-30 center-horizontal">شاهد جميع مشارعنا</a>
</section>
<!-- end our works -->
<section class="parnters-block w-curve">
    <div class="container">
        <div class="center sm-width">
            <h3 class="main-title center">المدونة</h3>

        </div>
        <div class="row">
          @php  $articles = \App\blog::where("publish_date","<=",date("Y-m-d"))->where("is_active",1)->orderby("id","desc")->take(3)->get();  @endphp
          @foreach($articles as $article)
          <div class="col-md-4 col-sm-6 col-xs-12 clearfix ">
            <div class="post-item">
              <div class="media-wrapper">
                <img src="{{$article->blog_img}}" alt="" class="img-fluid">
              </div>

              <div class="content">
                <h3><a href="">{{$article->blog_title}}</a></h3>
                <p>@php  echo   ltrim(substr($article->blog_desc,69)) ;  @endphp</p>
                <a class="btn btn-main" href="{{url('/')}}/blog/details/{{$article->id}}/{{$article->blog_title}}">قراءة المزيد</a>
              </div>
            </div>
        </div>
        @endforeach
        </div>

    </div>
</section>
<section class="parnters-block w-curve blue-color w-curve">
    <div class="container">
        <div class="center sm-width">
            <h3 class="main-title center">اراء العملاء</h3>
        </div>
        <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Slide Indicators -->
                  <ol class="carousel-indicators">
                      @php  $customer_option = \App\Oponions::all(); @endphp
                      @foreach($customer_option as $k=>$option)
                        <li data-target="#testimonialCarousel" data-slide-to="{{$k}}" class="{{$k == 0?'active':''}}"></li>
                      @endforeach
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    @foreach($customer_option as $k=>$option)
                      <!-- Slide 1 -->
                      <div class="carousel-item {{$k == 0?'active':''}}">
                          <div class="carousel-content">
                              <div class="client-img"><img src="{{url('/')}}/img/user.png" alt="Testimonial Slider"></div>
                              <h3>{{$option->customer_name}}<br><span>{{$option->country_name}} </span></h3>
                              <p class="col-md-8 offset-md-2">{{$option->cutomer_opionion}}</p>
                          </div>
                      </div>
                      @endforeach
                      <!-- Slider pre and next arrow -->
                      <a class="carousel-control-prev text-white" href="#testimonialCarousel" role="button" data-slide="prev">
                      <i class="fas fa-chevron-left"></i>
                      </a>
                      <a class="carousel-control-next text-white" href="#testimonialCarousel" role="button" data-slide="next">
                      <i class="fas fa-chevron-right"></i>
                      </a>
                  </div>
              </div>

    </div>
</section>
@endsection
