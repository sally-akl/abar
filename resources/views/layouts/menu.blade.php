<header>
    <div class="header-top hidden-mobile">
        <div class="container d-flex justify-content-between">
            <ul class="list-unstyled d-flex align-items-center head-contact-list right">
                <li class="head-item">
                    <a href="tel:+0553006174" class="tel"> +0553006174</a>
                </li>
                <li class="head-item">
                    <a href="mailto:info@yahoo.com">info@yahoo.com</a>
                </li>
								<li class="head-item">
                    <a href="#" class="">طلب مشروع</a>
                </li>
								<li class="head-item">
                    <a href="#">طلب استشارة</a>
                </li>
            </ul>
            <ul class="list-unstyled d-flex align-items-center head-social-list left">
                <li class="head-item facebook">
                    <a href="https://www.facebook.com/100647691526982" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="head-item youtube">
                    <a href="https://www.youtube.com/channel/UCk8zYF_K_uf9pxuiWBpxBHA" target="_blank"><i class="fab fa-youtube"></i></a>
                </li>
                <li class="head-item instagram">
                    <a href="https://www.instagram.com/abar.alseqaya" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="head-item twitter">
                    <a href="https://twitter.com/abar66041292" target="_blank"><i class="fab fa-twitter"></i></a>
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
                    <li><a href="index.html" class="current">الرئيسية </a></li>
                    <li><a href="aboutus.html" class="">عن المؤسسة</a></li>
                    <li><a href="oldproject.html" class="">اعمالنا السابقة </a></li>
                    <li><a href="blog.html" class="">مدونة ابار السقاية</a></li>
                    <li><a href="#" class="">المتجر الالكترونى</a></li>
										  <li><a href="#" class="">طلب مشروع حسب الميزانية</a></li>
                    <li><a href="contactus.html" class="">اتصل بنا</a></li>
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
