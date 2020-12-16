@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{url('/')}}/blog/المدونة">المدونة</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$blog->blog_title}}</li>
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
<section class="blogs-details-block blue-color  w-curve replace-mr no-bg">
  <div class="blog-details mr-top white-block">
    <div class="container">
      <div class="row all_articles">
        <!-- BEGIN bootom_ads  -->

        <!-- BEGIN bootom_ads  -->
         <!-- BEGIN ARTICLE LIST  -->
         <div class="col-xs-12 col-md-9 col-sm-8">
           <div class="blog-top">
              <span class="btn promotion-color category">{{$blog->category_name}}</span>
              <div class="article_date article_info_part">
                <i class="fa fa-calendar"></i>
                {{ date("Y-m-d",strtotime($blog->publish_date))}}
              </div>
              <a href="#" class="comments"><i class="fa fa-comment" aria-hidden="true"></i><span>{{$blog->comments()->where("is_published",1)->count()}}</span></a>

            </div>

           <!-- BEGIN ARTICLE BLOCK  -->
           <div class="article_block">
              <img src="{{url('/')}}{{$blog->blog_img}}" class="img-fluid" />
              <h3><a href="">{{$blog->blog_title}}</a></h3>
              <p>{{$blog->blog_desc}}</p>

           </div>
             <!-- END ARTICLE BLOCK  -->
             <!-- BEGIN share  -->
             <div id="share"></div>
             <!-- END share  -->


         </div>
        <!-- END ARTICLE LIST  -->
        <!-- RIGHT SIDEBAR  -->
        <div class="col-xs-12 col-md-3 col-sm-4">
           <div class="sidebar_right">
              <div class="search_part">

                    <form action='' method="get">
                      @csrf
                      <div class="form-group">
                        <input  name="title" placeholder="البحث" class="form-control search_input">
                      </div>
                      <input type="hidden" name="search" value="search" />
                      <input type="hidden" name="code" value="{{$market_code}}" />
                      <button type="submit" class="btn btn-lg search_btnn"><i class="fa fa-search"></i> بحث</button>
                    </form>

              </div>

              <div class="seo">
                <a href="/rss/article-feed.xml" target="_blank"><i class="fa fa-rss-square" aria-hidden="true"></i></a>
                <a href="/rss/posts-sitemap.xml" target="_blank"><i class="fa fa-sitemap" aria-hidden="true"></i></a>
              </div>
           </div>
        </div>
        <!-- END RIGHT SIDEBAR  -->


      </div>
    </div>
    </div>
</section>
<!-- end blogs section -->

<section class="media-block blue-color second">
    <div class="container">
        <div class="all-media">
            <h3 class="main-title">التعليقات <span class="num-comments">({{$blog->comments()->where("is_published",1)->count()}})</span>  </h3>
            <p class="style-comment">يرجي العلم انه يتم مراجعة التعليقات قبل النشر لتفادي نشر الردود المسيئة.</p>

              @foreach($blog->comments()->where("is_published",1)->get() as $comment)
                <div class="media add-comment">
                  <div class="media-img">

                      <img src="{{url("/")}}/img/user.png" class="img-fluid" alt="avatar">
                  </div>
                  <div class="media-body">
                      <h5 class="media-heading mt-0">{{$comment->name}}
                      </h5>
                      <p class="date">{{date("Y-m-d H:m",strtotime($comment->created_at))}}</p>
                      <p class="font-color">
                        {{$comment->comment_text}}
                      </p>


                      </div>
                  </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<section class="blue-color w-curve replace-mr second">
    <div class="container">
        <div class="comment-block all-form-contact add-form">
          <div class="alert alert-danger alert-danger-modal" style="display:none">
          </div>
          <div class="alert alert-success alert-success-modal" style="display:none">
          </div>

            <h3 class="main-title">اكتب تعليقك</h3>

            <form method="POST" action="{{ url('blog/comments') }}"  class="form_submit_model">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" placeholder="الاسم" id="comment_name" name="comment_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="email" placeholder="البريد الإلكتروني" id="comment_email" name="comment_email" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control"  id="comment_text" placeholder="نص التعليق" name="comment_text"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="which_blog" value="{{$blog->id}}" />
                <button type="submit" id="btnComment" class="btn btn-main">انشر التعليق</button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('footerjscontent')
<script type="text/javascript">
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
