<footer>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="single-col">
                    <div class="header-col" style="height:100px;">
                        <img src="{{url('/')}}/img/logo.png" alt="tahaqom" class="img-fluid lozad">
                    </div>
                    <ul class="list-unstyled">
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                            <a href="mailto:{{\App\Settings::find(1)->email}}" class="link">{{\App\Settings::find(1)->email}}</a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <a href="tel:{{\App\Settings::find(1)->phone}}" class="link phone-number">{{\App\Settings::find(1)->phone}}</a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            <a href="#" class="link">{{\App\Settings::find(1)->address}}
                                </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="single-col">
                    <div class="header-col">
                        <h3>روابط تهمك</h3>
                    </div>
                    <ul class="list-unstyled center-list">
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a  class="link" href="{{url('/')}}/aboutus/عن المؤسسة" >عن المؤسسة</a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a  class="link" href="{{url('/')}}/blog/المدونة" > المدونة</a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a  class="link" href="{{url('/')}}/profile/اعمالنا السابقة">اعمالنا السلبقة </a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a href="{{url('/')}}/store/متجر" class="link">المتجر الالكترونى</a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a href="{{url('/')}}/store/city/show" class="link">طلب حسب ميزانية المشروع</a>
                        </li>
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a href="{{url('/')}}/questions" class="link">اسئلة شائعة</a>
                        </li>
                      
                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a href="" class="link">سياسة الخصوصية</a>
                        </li>

                        <li class="footer-link">
                            <span class="icon"><i class="fa fa-chevron-left"></i></span>
                            <a href="{{url('/')}}/contact-us" class="link">اتصل بنا </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="single-col">
                    <div class="header-col">
                        <h3><a href="javascript:;">اخر منشورات انستغرام</a></h3>
                        <ul class="list-gallery-thumbs list-lightbox-gallery">
                                                        <li><a href="" class="img-bg lightbox-gallery"><img src="img/1.jpeg" alt=""></a></li>
                                                        <li><a href="" class="img-bg lightbox-gallery"><img src="img/2.jpeg" alt=""></a></li>
                                                        <li><a href="" class="img-bg lightbox-gallery"><img src="img/3.jpg" alt=""></a></li>
                                                    </ul><!-- .list-gallery-thumbs -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- copy right -->
<div class="copy-right">
    <div class="container">
        <div class="text-left">
            <p>جميع الحقوق محفوظة <a href="#" target="_blank">ابار السقاية</a> <span>2020</span></p>
        </div>
        <div class="text-right">
            <ul class="footer-social list-unstyled">
                <li class="d-inline-block">
                    <a href="https://www.facebook.com/100647691526982" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="d-inline-block">
                    <a href="https://www.instagram.com/abar.alseqaya" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="d-inline-block">
                    <a href="https://twitter.com/abar66041292" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- fixed tabs only mbile -->
<div class="only-mobile fixed-bottom mobile-tabs">
    <ul class="list-unstyled">

        <li class="tab-item">
            <a href="https://api.whatsapp.com/send?phone=+0553006174&text=" target="_blank">
                <img src="img/whatsapp.png" alt="whatsapp">
            </a>
        </li>
        <li class="tab-item">
            <a href="tel:+0553006174"><img src="img/phone-call.png" alt=""></a>
        </li>
        <li class="tab-item">
            <a href="" ><img src="img/home.png" alt=""></a>
        </li>
    </ul>
</div>
</main>
<!-- end content -->

<div class="side-panel-menu">
    <a class="logo logo-side-panel" href="">
        <img src="img/logo.png" class="lozad" alt="">
    </a><!-- .logo end -->
    <div class="mobile-side-panel-menu">
        <ul id="menu-mobile" class="menu-mobile">

        </ul><!-- .menu-mobile end -->
    </div><!-- .mobile-side-panel-menu end -->
            <a href="" class="btn-language btn btn-transparent btn-borderd">تسجيل الدخول / التسجيل</a>

    <div class="side-panel-close">
        ✕
    </div><!-- .side-panel-close end -->
</div><!-- .side-panel-menu end -->

<!-- scrollToTop -->
<button type="button" class="btn scrollToTop">
    <i class="fas fa-chevron-up icon"></i>
</button>
