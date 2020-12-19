@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item active" aria-current="page">اتصل بنا</li>
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
<section class="contact-block   w-curve replace-mr no-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="main-title">اتصل بنا</h3>

            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
          <div class="col-lg-6 col-md-12 col-sm-12">
             <form id="contact-form" class="form_submit_model" method="post" action="{{ url('contactus/send') }}">
               @csrf
               <div class="alert alert-danger alert-danger-modal" style="display:none">
               </div>
               <div class="alert alert-success alert-success-modal" style="display:none">
               </div>

                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="الاسم الثلاثى">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="البريد الالكترونى">
                </div>
                <div class="form-group-2 mb-4">
                    <textarea name="message" class="form-control" rows="4" placeholder="محتوى الرسالة"></textarea>
                </div>
                <button class="btn btn-main" name="submit" type="submit">ارسال</button>
            </form>
        </div>
        <div class="col-lg-5 col-sm-12">
            <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                <span class="text-muted">نحن محترفون فى مجالنا</span>
                <h2 class="mb-5 mt-2">لا تتردد فى التواصل معنا للحصول على الاجابات</h2>

                <ul class="address-block list-unstyled">
                    <li>
                        <i class="fa fa-map-marker"></i>{{\App\Settings::find(1)->address}}
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>البريد الالكترونى :- {{\App\Settings::find(1)->email}}
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>الجوال :- {{\App\Settings::find(1)->phone}}
                    </li>
                </ul>

                <ul class="social-icons list-inline mt-5">
                    <li class="list-inline-item">
                        <a href="{{\App\Settings::find(1)->facebook}}"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{\App\Settings::find(1)->twitter}}"><i class="fab fa-twitter-square"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{\App\Settings::find(1)->youtube}}"><i class="fab fa-youtube-square"></i></a>
                    </li>

                </ul>
            </div>
        </div>

        </div>
    </div>
</section>

<div class="google-map">
    <div id="map">
    </div>
</div>
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
