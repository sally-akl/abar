<header>
    <div class="header-top hidden-mobile">
        <div class="container d-flex justify-content-between">
            <ul class="list-unstyled d-flex align-items-center head-contact-list right">
                <li class="head-item">
                    <a href="tel:{{\App\Settings::find(1)->phone}}" class="tel">{{\App\Settings::find(1)->phone}}</a>
                </li>
                <li class="head-item">
                    <a href="mailto:{{\App\Settings::find(1)->email}}">{{\App\Settings::find(1)->email}}</a>
                </li>
								<li class="head-item">
                    <a href="{{url('/')}}/store/city/show" class="">طلب مشروع</a>
                </li>
								<li class="head-item">
                    <a href="https://api.whatsapp.com/send?phone={{\App\Settings::find(1)->phone}}&text=">طلب استشارة</a>
                </li>
            </ul>
            <ul class="list-unstyled d-flex align-items-center head-social-list left">
                <li class="head-item facebook">
                    <a href="{{\App\Settings::find(1)->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="head-item youtube">
                    <a href="{{\App\Settings::find(1)->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                </li>
                <li class="head-item instagram">
                    <a href="{{\App\Settings::find(1)->instegrame}}" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="head-item twitter">
                    <a href="{{\App\Settings::find(1)->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- main menu -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler menu-wrapper menu-mobile-btn" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="hamburger-menu"></span>
            </button>
            <a class="navbar-brand" href="">
                <img src="{{url('/')}}/img/logo.png" class="hidden-mobile lozad" alt="آبار السقاية">
                <img src="{{url('/')}}/img/logo.png" class="only-mobile lozad" alt="آبار السقاية">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="top-block only-mobile">
                    <a class="navbar-brand" href="">
                        <img src="{{url('/')}}/img/logo.png" class="lozad" alt="آبار السقاية">
                    </a>
                </div>
                <ul id="menu-main" class="menu-main">
                    <li><a href="{{url('/')}}"  {{$controller == "HomeController" && $action=="index"?'class=current':''}} >الرئيسية </a></li>
                    <li><a href="{{url('/')}}/aboutus/عن المؤسسة" {{$controller == "HomeController" && $action=="aboutus"?'class=current':''}}>عن المؤسسة</a></li>
                    <li><a href="{{url('/')}}/profile/اعمالنا السابقة" {{$controller == "HomeController" && $action=="profolio"?'class=current':''}}>اعمالنا السابقة </a></li>
                    <li><a href="{{url('/')}}/blog/المدونة"  {{$controller == "HomeController" && ($action=="blog" || $action=="blog_details")?'class=current':''}}>مدونة ابار السقاية</a></li>
                    <li><a href="{{url('/')}}/store/متجر"{{$controller == "HomeController" && ($action=="store" || $action == "store_by_category")?'class=current':''}}>المتجر الالكترونى</a></li>
										  <li><a href="{{url('/')}}/store/city/show" {{$controller == "HomeController" && $action=="store_by_city"?'class=current':''}}>طلب مشروع حسب الميزانية</a></li>
                    <li><a href="{{url('/')}}/contact-us" class="">اتصل بنا</a></li>
                </ul><!-- #menu-main end -->
                 @guest
                  <a href="" class="btn btn-transparent btn-borderd">تسجيل الدخول / التسجيل</a>
                 @else
                   <a href="" class="btn btn-transparent btn-borderd name_login">{{ Auth::user()->name }}</a>
                   <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="btn btn-transparent btn-borderd">تسجيل الخروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                 @endguest
            </div>
        </div>
    </nav>
</header>
<!-- end header -->
