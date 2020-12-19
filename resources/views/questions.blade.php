@extends('layouts.app')
@section('header')
<!-- start main header -->
<section class="header-content n-b">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb" class="f-width">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية </a></li>
                    <li class="breadcrumb-item active" aria-current="page">الاسئبة الشائعة</li>
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
<section class="blogs-block  w-curve replace-mr no-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="main-title center">أسئلة شائعة</h3>

            </div>
        </div>
        <div class="row questions">
          <div class="col-md-12 col-lg-12">
            <h5>عن المؤسسة</h5>
            <ul id="faq-list" class="wow fadeInUp faq-list">
                      <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq1">أ‌-	هل المؤسسة معتمدة  ومرخصة؟</a>
                        <div id="faq1" class="collapse" data-parent="#faq-list">
                          <p>
                            آبار السقاية هي مؤسسة معتمدة ومرخصة من وزارة التجارة بسجل تجاري رقم 4030327198 لمزاولة نشاط حفر الآبار وبناء المساجد والمدارس
                          </p>
                        </div>
                      </li>

                      <li>
                        <a data-toggle="collapse" href="#faq2" class="collapsed">ب‌-	كيف اتحقق من نظامية عمل المؤسسة والتراخيص الممنوحة لها؟</a>
                        <div id="faq2" class="collapse" data-parent="#faq-list">
                          <p>
                            يمكنك التحقق بكل سهولة عبر الاستفادة من خدمات موقع وزارة التجارة بالمملكة العربية السعودية للاطلاع على تصاريح المؤسسة
                            ecr.mci.gov.sa :موقع وزارة التجارة
                            رقم السجل التجاري : ٤٠٣٠٣٢٧١٩٨
                            تاريخ الانتهاء :  ١٤/٠٧/١٤٤٣

                          </p>
                        </div>
                      </li>

                      <li>
                        <a data-toggle="collapse" href="#faq3" class="collapsed">	ت‌-	أين مقر المؤسسة الرئيسي ؟</a>
                        <div id="faq3" class="collapse" data-parent="#faq-list">
                          <p>
                           https://www.google.com/maps?q=21.4865545,39.2288456&z=17&hl=en
                          </p>
                        </div>
                      </li>
                    </ul>
                    <h5>كيفية الطلب</h5>
                    <ul id="faq-list2" class="wow fadeInUp faq-list">
                              <li>
                                <a data-toggle="collapse" class="collapsed" href="#faq4">أ‌-	هل أستطيع المساهمة بجزء من قيمة المشروع ؟</a>
                                <div id="faq4" class="collapse" data-parent="#faq-list2">
                                  <p>
                                    تستند اتفاقيات آبار السقاية مع عملائها على طرفين فقط الطرف الأول الجهة التنفيذية للمشروع ( آبار السقاية للمقاولات) وصاحب المشروع( العميل ) وعليه جميع المشاريع لدينا يتم تنفيذها بالكامل بالنيابة على طلب فرد واحد كما أن آبار السقاية هي جهة تنفيذية للمشاريع وغفا لاتفاقيات وعقود نظامية ولسنا مخولون باستلام المساهمات المالية أو التبرعات
                                  </p>
                                </div>
                              </li>

                              <li>
                                <a data-toggle="collapse" href="#faq5" class="collapsed">ب‌-	هل بمكنني انشاء مسجد بناء على ميزانية محددة او مساحة محددة ؟</a>
                                <div id="faq5" class="collapse" data-parent="#faq-list2">
                                  <p>
                                    نعم بالتأكيد , في حال لم تتناسب معك التكلفة او المساحات المعروضة علما ان تكلفة المساجد تبدأمن 28 ألف ريال

                                  </p>
                                </div>
                              </li>

                              <li>
                                <a data-toggle="collapse" href="#faq6" class="collapsed">ت‌-	هل توجد خصومات أوعروض ؟</a>
                                <div id="faq6" class="collapse" data-parent="#faq-list2">
                                  <p>
                                    انطلاقا من قسيمة المشروع الانسانية توفر آبار السقاية مشارعها بتكلفة مميزة ولا يوجد لدينا خصومات أوعروض
                                  </p>
                                </div>
                              </li>
                            </ul>
                              <h5>كيفية تنفيذ المشاريع</h5>
                              <ul id="faq-list3" class="wow fadeInUp faq-list">
                                        <li>
                                          <a data-toggle="collapse" class="collapsed" href="#faq7">ث‌-	كيف يتم توثيق المشاريع وسير العمل؟</a>
                                          <div id="faq7" class="collapse" data-parent="#faq-list3">
                                            <p>
                                              يتم توثيق المشروع بشكل تفصيلي كالتالي:
1-	الابار يشمل تقرير التوثيق جميع مراحل التنفيذ ابتداء من الحفر ثم استخراج الماء وانزال المواسير تركيب المضخات وبناء هيكل المشروع الخارجي ثم الافتتاح وتوثيق استفادة الأهالي من المشروع ويرفق بالتقرير موقع المشروع الدقيق بالخرائط والأقمار الصناعية
2-	المساجد   يتمتوثيق المشروع بشكل تفصيلي وارسال متابعات سير العمل بشكل دوري ابتداء من تحديد الموقع ثم حفر الأساسات وبناء هيكل المشروع ثم التشطيب والدهان ثم الافتتاح والتسليم

                                            </p>
                                          </div>
                                        </li>

                                        <li>
                                          <a data-toggle="collapse" href="#faq8" class="collapsed">ج‌-	ما المعني بالعمر الافتراضي للبئر؟</a>
                                          <div id="faq8" class="collapse" data-parent="#faq-list3">
                                            <p>
                                              هي الفترة الزمنية المتوقعة لاستمرار توفر المياه في البئر ويتم تحديد العمر الافتراضي للبئر بناء على العوامل التالية :
1-	منسوب المياه بناء على عمق الحفر
2-	العوامل البيئية للمنطقة
3-	معدل السحب اليومي
4-	المعدات والمضخات المستخدمة


                                            </p>
                                          </div>
                                        </li>

                                        <li>
                                          <a data-toggle="collapse" href="#faq9" class="collapsed">ح‌-	هل مياه الآبار صالحة للشرب؟</a>
                                          <div id="faq9" class="collapse" data-parent="#faq-list3">
                                            <p>
                                              نعم صالحة للشرب والاستخدام المنزلي
                                            </p>
                                          </div>
                                        </li>
                                        <li>
                                          <a data-toggle="collapse" href="#faq10" class="collapsed">خ‌-	كيف يتم تحديد مواقع المشاريع؟</a>
                                          <div id="faq10" class="collapse" data-parent="#faq-list3">
                                            <p>
                                              يتم تحديد موقع المشروع بناء على مواصفات المشروع وتوظيفه في المنطقة التي تتوافق مع مواصفات المشروع  والاحتياج له ويختلف توظيف المشاريع سواء لخدمة الاسر ذو الاحتياج للمشروع أوتوظيفه كمشروع خدمي لمصلى أو مسجد او مدرسة كما يتم الأخذ بالاعتبار اتيفاء جميع المتطلبات الرسمية الخاصة بالدولة
                                            </p>
                                          </div>
                                        </li>
                                      </ul>
                                      <h5>المتابعة والضمانات </h5>
                                      <ul id="faq-list4" class="wow fadeInUp faq-list">
                                                <li>
                                                  <a data-toggle="collapse" class="collapsed" href="#faq11">د‌-	هل يوجد ضمانات على المشاريع؟</a>
                                                  <div id="faq11" class="collapse" data-parent="#faq-list4">
                                                    <p>
                                                      نعم بالتأكيد يوجد ضمانات وتختلف حسب نوع المشروع والدولة وتتفاوت بين 5 سنوات وحتى 20 سنة ويتم ادراج الضمن ضمن مواصفات المشروع وتوثيقه في العقد

                                                    </p>
                                                  </div>
                                                </li>

                                                <li>
                                                  <a data-toggle="collapse" href="#faq12" class="collapsed">ذ‌-	كيف يتم متابعة المشاريع بعد استكمال تنفيذها ؟</a>
                                                  <div id="faq12" class="collapse" data-parent="#faq-list4">
                                                    <p>
                                                      تتبع ابار السقاية استراتيجيات فعالة في متابعة المشروع بعد إتمام  تنفيذه لاستدامته لأطول فترة ممكنة ويتم متابعة المشروع من 3 جهات وهي :
1-	عن طريق المؤسسة عبر زيارات عشوائية تفقدية للمشاريع للتأكد من عدم وجود أي ملاحظات
2-	عن طريق صاحب المشروع ( العميل ) عبر طلب زيارة تفقدية للمشروع وتحديث حالة المشروع وتوثيقه مجددا بالصور والفيديوهات
3-	عبر المستنفدين من المشروع حيث يتم تزويد المستفيدين  بأرقام التواصل معنا لإبلاغنا في حال وجود أي ملاحظات تتعلق بالمشروع

                                                    </p>
                                                  </div>
                                                </li>

                                                <li>
                                                  <a data-toggle="collapse" href="#faq13" class="collapsed">ر‌-	ماذا بعد  انتهاء فترة الضمان ؟</a>
                                                  <div id="faq13" class="collapse" data-parent="#faq-list4">
                                                    <p>
                                                      سوءا كان المشروع داخل فترة الضمان أو خارجه سيكون ضمن قائمة المتابعة لدينا والزيارات العشوائية الخاصة بنا وبما يخص الأعطال بمعدات الضخ تلتزم المؤسسة داخل فترة الضمان بعمل الصيانة اللازمة وقفي حال حدوث أعطال خارج فترة الضمان يتم تقييم الاعطال من قبلنا وابلاغ صاحب المشروع  وأخذ الموافقات اللازمة لصيانة البئر
                                                    </p>
                                                  </div>
                                                </li>
                                                <li>
                                                  <a data-toggle="collapse" href="#faq14" class="collapsed">ز‌-	هل استطيع زيارة المشروع بنفسي ؟</a>
                                                  <div id="faq14" class="collapse" data-parent="#faq-list4">
                                                    <p>
                                                      نعم يتم تنسيق الزيارات بناء على طلب صاحب المشروع ( لا تشمل تكاليف فترة الاقامة والسفر )
                                                    </p>
                                                  </div>
                                                </li>
                                              </ul>
                                              <h5>أسئلة أخرى</h5>
                                              <p style="color:#013a67;">اذالم تجد أجوبة لأسئلتك قم بالتواصل مع خدمة العملاء لطلب المزيد من المعلومات أو لطلب استشارة.</p>
          </div>
        </div>
    </div>
</section>
<!-- end blogs section -->
@endsection
