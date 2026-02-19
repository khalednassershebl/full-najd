<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Main Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Important Meta Tags -->
    <meta name="author" content="{{ $site['seo']['meta_title'] ?? '' }}" />
    <meta name="description" content="{{ $site['seo']['meta_description'] ?? '' }}">
    <meta name="keywords" content="{{ $site['seo']['meta_keywords'] ?? '' }}">

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('assets/scss/libs/bootstrap.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('main.css') }}" />

    <!-- Page Title & Icon -->
    <title>Services</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>الخدمات</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>تُمثل نجد المتكاملة نهجًا احترافيًا متكاملًا في مجال المقاولات. نجمع بين الخبرة الهندسية والكفاءة التشغيلية .
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="services-page">
            <div class="services services-v2">
                <div class="patt1">
                    <img src="{{ asset('assets/images/patt1.svg') }}" alt="pattern">
                </div>
                <div class="container">

                    <div class="index-section-header wow animate__animated animate__fadeInUp">
                        <div class="index-section-header-head">
                            <span>خدمات شركة نجد لحلول الأعمال</span>
                            <h3>دمـج الـخـيـال مـع الابـتـكـار <br> لــصــنــع عــمــل لا يُــنــسى.</h3>
                        </div>
                        <p class="text">تنمية العلامات التجارية من خلال الإبداع الجريء والاستراتيجي، مع التركيز على البحث عن
                            طرق جديدة <span> لعرض محتوى المستخدم على الدعم الرقمي</span> وتصور الفنون المستقبلية.</p>
                    </div>

                    <div class="services-container">
                        <div class="row">

                            <div class="col-12">
                                <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                    <div class="service-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="m19.5,1H4.5C2.019,1,0,3.019,0,5.5v13c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5V5.5c0-2.481-2.019-4.5-4.5-4.5Zm-15,1h15c1.93,0,3.5,1.57,3.5,3.5v2.5H1v-2.5c0-1.93,1.57-3.5,3.5-3.5Zm15,20H4.5c-1.93,0-3.5-1.57-3.5-3.5v-9.5h22v9.5c0,1.93-1.57,3.5-3.5,3.5ZM3,5c0-.552.448-1,1-1s1,.448,1,1-.448,1-1,1-1-.448-1-1Zm3,0c0-.552.448-1,1-1s1,.448,1,1-.448,1-1,1-1-.448-1-1Zm3,0c0-.552.448-1,1-1s1,.448,1,1-.448,1-1,1-1-.448-1-1Zm-.548,8.562l-.314,3.659c-.031.44-.337.779-.706.779-.244,0-.471-.151-.601-.4l-.831-1.6-.831,1.6c-.129.249-.356.4-.601.4-.368,0-.675-.339-.706-.779l-.314-3.659c-.026-.302.212-.562.515-.562.27,0,.494.207.516.477l.212,2.681.75-1.443c.193-.372.725-.372.918,0l.75,1.443.21-2.681c.021-.269.246-.477.516-.477h.002c.303,0,.541.26.515.562Zm12,0l-.314,3.659c-.031.44-.337.779-.706.779-.244,0-.471-.151-.601-.4l-.831-1.6-.831,1.6c-.129.249-.356.4-.601.4-.368,0-.675-.339-.706-.779l-.314-3.659c-.026-.302.212-.562.515-.562.27,0,.494.207.516.477l.212,2.681.75-1.443c.193-.372.725-.372.918,0l.75,1.443.21-2.681c.021-.269.246-.477.516-.477h.002c.303,0,.541.26.515.562Zm-6,0l-.314,3.659c-.031.44-.337.779-.706.779-.244,0-.471-.151-.601-.4l-.831-1.6-.831,1.6c-.129.249-.356.4-.601.4-.368,0-.675-.339-.706-.779l-.314-3.659c-.026-.302.212-.562.515-.562.27,0,.494.207.516.477l.212,2.681.75-1.443c.193-.372.725-.372.918,0l.75,1.443.21-2.681c.021-.269.246-.477.516-.477h.002c.303,0,.541.26.515.562Z" />
                                        </svg>
                                    </div>
                                    <div class="service-content">
                                        <div class="service-head">
                                            <h4>تـطـويـر الـمـواقـع الإلـكـتـرونـيـة</h4>
                                            <span>1</span>
                                        </div>
                                        <div class="service-info">
                                            <p>نقدم لك موقع مميز مع تصميم عصرى وجذاب ومتوافق مع محركات البحث نقدم لك موقع مميز
                                                مع تصميم عصرى وجذاب ومتوافق مع محركات البحث</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 service-related-row">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                            <div class="service-head">
                                                <h4>مواقع تجارة إلكترونية</h4>
                                                <span>1</span>
                                            </div>
                                            <div class="service-info">
                                                <p>حلول متكاملة للتجارة الإلكترونية وتصميم متاجر احترافية.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.15s">
                                            <div class="service-head">
                                                <h4>مواقع الشركات والمؤسسات</h4>
                                                <span>2</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تصميم مواقع مؤسسية تعكس هوية شركتك وتخدم أهدافك.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                            <div class="service-head">
                                                <h4>بوابات الويب والأنظمة</h4>
                                                <span>3</span>
                                            </div>
                                            <div class="service-info">
                                                <p>بناء بوابات ويب وأنظمة إدارية مخصصة لاحتياجاتك.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.25s">
                                            <div class="service-head">
                                                <h4>مواقع الووردبريس</h4>
                                                <span>4</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تطوير وإدارة مواقع ووردبريس سريعة وآمنة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                            <div class="service-head">
                                                <h4>تطوير واجهات الويب</h4>
                                                <span>5</span>
                                            </div>
                                            <div class="service-info">
                                                <p>واجهات حديثة وسريعة الاستجابة وتجربة مستخدم مميزة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.35s">
                                            <div class="service-head">
                                                <h4>استضافة وإدارة المواقع</h4>
                                                <span>6</span>
                                            </div>
                                            <div class="service-info">
                                                <p>استضافة آمنة وصيانة دورية ونسخ احتياطي.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="M15.5,24h-7c-2.481,0-4.5-2.019-4.5-4.5V4.5C4,2.019,6.019,0,8.5,0h7c2.481,0,4.5,2.019,4.5,4.5v15c0,2.481-2.019,4.5-4.5,4.5ZM8.5,1c-1.93,0-3.5,1.57-3.5,3.5v15c0,1.93,1.57,3.5,3.5,3.5h7c1.93,0,3.5-1.57,3.5-3.5V4.5c0-1.93-1.57-3.5-3.5-3.5h-7Zm5.5,19.5c0-.276-.224-.5-.5-.5h-3c-.276,0-.5,.224-.5,.5s.224,.5,.5,.5h3c.276,0,.5-.224,.5-.5Z" />
                                        </svg>
                                    </div>
                                    <div class="service-content">
                                        <div class="service-head">
                                            <h4>تـطـويـر تـطـبـيـقـات الـمـوبـايـل</h4>
                                            <span>2</span>
                                        </div>
                                        <div class="service-info">
                                            <p>نقدم لك موقع مميز مع تصميم عصرى وجذاب ومتوافق مع محركات البحث نقدم لك موقع مميز
                                                مع تصميم عصرى وجذاب ومتوافق مع محركات البحث</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 service-related-row">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                            <div class="service-head">
                                                <h4>تطبيقات أندرويد</h4>
                                                <span>1</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تطوير تطبيقات أندرويد احترافية وسريعة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.15s">
                                            <div class="service-head">
                                                <h4>تطبيقات آيفون iOS</h4>
                                                <span>2</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تطبيقات آيفون ذات جودة عالية وتجربة سلسة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                            <div class="service-head">
                                                <h4>تطبيقات هجينة متعددة المنصات</h4>
                                                <span>3</span>
                                            </div>
                                            <div class="service-info">
                                                <p>حل واحد يعمل على أندرويد وآيفون معاً.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.25s">
                                            <div class="service-head">
                                                <h4>تطبيقات المؤسسات</h4>
                                                <span>4</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تطبيقات مخصصة لإدارة العمليات والفرق.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                            <div class="service-head">
                                                <h4>تطبيقات التجارة الإلكترونية</h4>
                                                <span>5</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تطبيقات متاجر ودفع وإدارة طلبات.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.35s">
                                            <div class="service-head">
                                                <h4>صيانة وتحديث التطبيقات</h4>
                                                <span>6</span>
                                            </div>
                                            <div class="service-info">
                                                <p>دعم فني وتحديثات وتحسين أداء مستمر.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                    <div class="service-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19.5,1H4.5C2.019,1,0,3.019,0,5.5V14.5c0,2.481,2.019,4.5,4.5,4.5h7v3H6.5c-.276,0-.5,.224-.5,.5s.224,.5,.5,.5h11c.276,0,.5-.224,.5-.5s-.224-.5-.5-.5h-5v-3h7c2.481,0,4.5-2.019,4.5-4.5V5.5c0-2.481-2.019-4.5-4.5-4.5ZM4.5,2h15c1.93,0,3.5,1.57,3.5,3.5V14H1V5.5c0-1.93,1.57-3.5,3.5-3.5Zm15,16H4.5c-1.758,0-3.204-1.308-3.449-3H22.949c-.245,1.692-1.691,3-3.449,3Z" />
                                        </svg>
                                    </div>
                                    <div class="service-content">
                                        <div class="service-head">
                                            <h4>تـطـبـيـقـات سـطـح الـمـكـتـب</h4>
                                            <span>3</span>
                                        </div>
                                        <div class="service-info">
                                            <p>نقدم لك موقع مميز مع تصميم عصرى وجذاب ومتوافق مع محركات البحث نقدم لك موقع مميز
                                                مع تصميم عصرى وجذاب ومتوافق مع محركات البحث</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 service-related-row">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                            <div class="service-head">
                                                <h4>برامج إدارة الأعمال</h4>
                                                <span>1</span>
                                            </div>
                                            <div class="service-info">
                                                <p>أنظمة إدارة وحلول برمجية للشركات.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.15s">
                                            <div class="service-head">
                                                <h4>تطبيقات Windows</h4>
                                                <span>2</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تطبيقات سطح مكتب لنظام ويندوز.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                            <div class="service-head">
                                                <h4>تطبيقات Mac</h4>
                                                <span>3</span>
                                            </div>
                                            <div class="service-info">
                                                <p>حلول برمجية لأجهزة آبل وماك.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.25s">
                                            <div class="service-head">
                                                <h4>أنظمة المحاسبة</h4>
                                                <span>4</span>
                                            </div>
                                            <div class="service-info">
                                                <p>برامج محاسبة ومالية متكاملة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                            <div class="service-head">
                                                <h4>برامج المخزون والمستودعات</h4>
                                                <span>5</span>
                                            </div>
                                            <div class="service-info">
                                                <p>إدارة مخزون ومستودعات ومتابعة مخزنية.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.35s">
                                            <div class="service-head">
                                                <h4>تطبيقات الإنتاجية</h4>
                                                <span>6</span>
                                            </div>
                                            <div class="service-info">
                                                <p>أدوات تعزيز الإنتاجية وإدارة المهام.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="m20.5,0H3.5C1.57,0,0,1.57,0,3.5v9c0,2.481,2.019,4.5,4.5,4.5h4c.276,0,.5.224.5.5v3.5c0,1.654,1.346,3,3,3s3-1.346,3-3v-3.5c0-.276.224-.5.5-.5h4c2.481,0,4.5-2.019,4.5-4.5V3.5c0-1.93-1.57-3.5-3.5-3.5ZM3.5,1h7.5v2.5c0,.276.224.5.5.5s.5-.224.5-.5V1h3v4.5c0,.276.224.5.5.5s.5-.224.5-.5V1h3v6.5c0,.276.224.5.5.5s.5-.224.5-.5V1h.5c1.378,0,2.5,1.122,2.5,2.5v7.5H1V3.5c0-1.378,1.122-2.5,2.5-2.5Zm16,15h-4c-.827,0-1.5.673-1.5,1.5v3.5c0,1.103-.897,2-2,2s-2-.897-2-2v-3.5c0-.827-.673-1.5-1.5-1.5h-4c-1.93,0-3.5-1.57-3.5-3.5v-.5h22v.5c0,1.93-1.57,3.5-3.5,3.5Z" />
                                        </svg>
                                    </div>
                                    <div class="service-content">
                                        <div class="service-head">
                                            <h4>تـصـمـيـمـات الـجـرافـيـك</h4>
                                            <span>4</span>
                                        </div>
                                        <div class="service-info">
                                            <p>نقدم لك موقع مميز مع تصميم عصرى وجذاب ومتوافق مع محركات البحث نقدم لك موقع مميز
                                                مع تصميم عصرى وجذاب ومتوافق مع محركات البحث</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 service-related-row">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                            <div class="service-head">
                                                <h4>الهوية البصرية والعلامة التجارية</h4>
                                                <span>1</span>
                                            </div>
                                            <div class="service-info">
                                                <p>بناء هوية بصرية متكاملة لعلامتك.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.15s">
                                            <div class="service-head">
                                                <h4>تصميم الشعارات</h4>
                                                <span>2</span>
                                            </div>
                                            <div class="service-info">
                                                <p>شعارات مميزة تعبر عن قيم شركتك.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                            <div class="service-head">
                                                <h4>تصميم وسائل التواصل الاجتماعي</h4>
                                                <span>3</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تصاميم منشورات وغلافات لوسائل التواصل.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.25s">
                                            <div class="service-head">
                                                <h4>تصميم واجهات المستخدم UI</h4>
                                                <span>4</span>
                                            </div>
                                            <div class="service-info">
                                                <p>واجهات استخدام جذابة وسهلة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                            <div class="service-head">
                                                <h4>تصميم الإعلانات والمطبوعات</h4>
                                                <span>5</span>
                                            </div>
                                            <div class="service-info">
                                                <p>إعلانات ومطبوعات وإعلانات ديجيتال.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.35s">
                                            <div class="service-head">
                                                <h4>تصميم العروض التقديمية</h4>
                                                <span>6</span>
                                            </div>
                                            <div class="service-info">
                                                <p>عروض تقديمية احترافية للاجتماعات والمؤتمرات.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="m19.5,1H4.5C2.019,1,0,3.019,0,5.5v13c0,2.481,2.019,4.5,4.5,4.5h2c.276,0,.5-.224.5-.5s-.224-.5-.5-.5h-2c-1.93,0-3.5-1.57-3.5-3.5v-9.5h22v9.5c0,1.93-1.57,3.5-3.5,3.5h-2c-.276,0-.5.224-.5.5s.224.5.5.5h2c2.481,0,4.5-2.019,4.5-4.5V5.5c0-2.481-2.019-4.5-4.5-4.5ZM1,8v-2.5c0-1.93,1.57-3.5,3.5-3.5h15c1.93,0,3.5,1.57,3.5,3.5v2.5H1Zm4-3c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Zm3,0c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Zm3,0c0,.552-.448,1-1,1s-1-.448-1-1,.448-1,1-1,1,.448,1,1Zm7,10.5c0,1.893-.868,3.635-2.38,4.779-.394.299-.62.738-.62,1.206v2.015c0,.276-.224.5-.5.5s-.5-.224-.5-.5v-2.015c0-.783.37-1.514,1.016-2.003,1.261-.954,1.984-2.406,1.984-3.982,0-1.252-.467-2.449-1.313-3.373-.175-.19-.384-.13-.444-.105-.073.028-.242.12-.242.356v1.479c0,1.602-1.183,2.976-2.692,3.127-.849.089-1.693-.191-2.32-.76-.627-.567-.987-1.379-.987-2.225v-1.622c0-.236-.169-.328-.242-.356-.061-.023-.269-.084-.444.105-.847.924-1.314,2.121-1.314,3.373,0,1.576.723,3.028,1.984,3.982.646.489,1.016,1.22,1.016,2.003v2.015c0,.276-.224.5-.5.5s-.5-.224-.5-.5v-2.015c0-.468-.226-.907-.62-1.206-1.512-1.145-2.38-2.887-2.38-4.779,0-1.503.56-2.94,1.577-4.049.396-.432,1.001-.574,1.544-.361.534.208.879.713.879,1.288v1.622c0,.564.24,1.104.658,1.483.425.384.975.565,1.55.507,1.005-.102,1.792-1.038,1.792-2.133v-1.479c0-.575.345-1.08.879-1.288.543-.212,1.148-.07,1.544.361,1.017,1.108,1.577,2.546,1.577,4.049Z" />
                                        </svg>
                                    </div>
                                    <div class="service-content">
                                        <div class="service-head">
                                            <h4>تـحـسـيـن مـحـركـات الـبـحـث</h4>
                                            <span>5</span>
                                        </div>
                                        <div class="service-info">
                                            <p>نقدم لك موقع مميز مع تصميم عصرى وجذاب ومتوافق مع محركات البحث نقدم لك موقع مميز
                                                مع تصميم عصرى وجذاب ومتوافق مع محركات البحث</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 service-related-row">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                            <div class="service-head">
                                                <h4>تحسين المحتوى للمحركات</h4>
                                                <span>1</span>
                                            </div>
                                            <div class="service-info">
                                                <p>محتوى محسّن لتحسين ظهورك في نتائج البحث.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.15s">
                                            <div class="service-head">
                                                <h4>التحسين التقني للمواقع</h4>
                                                <span>2</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تحسين سرعة وبنية الموقع لمحركات البحث.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                            <div class="service-head">
                                                <h4>تحسين محلي SEO</h4>
                                                <span>3</span>
                                            </div>
                                            <div class="service-info">
                                                <p>ظهور أفضل في البحث المحلي وخريطة جوجل.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.25s">
                                            <div class="service-head">
                                                <h4>بناء الروابط الخلفية</h4>
                                                <span>4</span>
                                            </div>
                                            <div class="service-info">
                                                <p>استراتيجيات لبناء روابط خلفية ذات جودة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                            <div class="service-head">
                                                <h4>تحليل المنافسين</h4>
                                                <span>5</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تحليل أداء منافسيك واستغلال الفرص.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.35s">
                                            <div class="service-head">
                                                <h4>تقارير وتحليلات الأداء</h4>
                                                <span>6</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تقارير دورية لقياس تطور ظهورك في البحث.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="m17.5,0c-.276,0-.5.224-.5.5,0,3.444-2.43,5.5-6.5,5.5H3.5c-1.93,0-3.5,1.57-3.5,3.5v2c0,1.158.565,2.186,1.435,2.824l3.608,8.054c.438.985,1.417,1.622,2.496,1.622.843,0,1.621-.422,2.081-1.13.459-.707.529-1.59.185-2.365l-2.525-5.505h3.221c4.07,0,6.5,2.056,6.5,5.5,0,.276.224.5.5.5s.5-.224.5-.5V.5c0-.276-.224-.5-.5-.5Zm-8.607,20.916c.208.467.167.98-.111,1.409-.279.429-.731.675-1.243.675-.684,0-1.305-.403-1.583-1.029l-3.155-7.041c.226.046.46.07.699.07h2.679l2.714,5.916Zm8.107-4.014c-1.217-1.846-3.486-2.902-6.5-2.902H3.5c-1.378,0-2.5-1.121-2.5-2.5v-2c0-1.379,1.122-2.5,2.5-2.5h7c3.014,0,5.283-1.057,6.5-2.902v12.805Zm6.947-1.179c-.088.175-.265.276-.447.276-.075,0-.151-.017-.224-.053l-2-1c-.247-.124-.347-.424-.224-.671.125-.247.424-.346.671-.224l2,1c.247.124.347.424.224.671Zm-2.895-9c-.123-.247-.023-.547.224-.671l2-1c.247-.123.547-.023.671.224.123.247.023.547-.224.671l-2,1c-.072.036-.148.053-.224.053-.183,0-.359-.102-.447-.276Zm-.053,3.776c0-.276.224-.5.5-.5h2c.276,0,.5.224.5.5s-.224.5-.5.5h-2c-.276,0-.5-.224-.5-.5Z" />
                                        </svg>
                                    </div>
                                    <div class="service-content">
                                        <div class="service-head">
                                            <h4>الـتـسـويـق الإلـكـتـرونـي</h4>
                                            <span>6</span>
                                        </div>
                                        <div class="service-info">
                                            <p>نقدم لك موقع مميز مع تصميم عصرى وجذاب ومتوافق مع محركات البحث نقدم لك موقع مميز
                                                مع تصميم عصرى وجذاب ومتوافق مع محركات البحث</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 service-related-row">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                            <div class="service-head">
                                                <h4>إدارة الحملات الإعلانية</h4>
                                                <span>1</span>
                                            </div>
                                            <div class="service-info">
                                                <p>إدارة وإطلاق حملات إعلانية فعّالة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.15s">
                                            <div class="service-head">
                                                <h4>التسويق عبر السوشيال ميديا</h4>
                                                <span>2</span>
                                            </div>
                                            <div class="service-info">
                                                <p>استراتيجيات تسويق على منصات التواصل.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                            <div class="service-head">
                                                <h4>إعلانات جوجل</h4>
                                                <span>3</span>
                                            </div>
                                            <div class="service-info">
                                                <p>حملات إعلانية على محرك البحث وجوجل.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.25s">
                                            <div class="service-head">
                                                <h4>تسويق المحتوى</h4>
                                                <span>4</span>
                                            </div>
                                            <div class="service-info">
                                                <p>إنشاء محتوى يجذب العملاء ويدعم العلامة.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                            <div class="service-head">
                                                <h4>التسويق بالبريد الإلكتروني</h4>
                                                <span>5</span>
                                            </div>
                                            <div class="service-info">
                                                <p>حملات بريد إلكتروني لتحويل العملاء.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="service-card service-card-related wow animate__animated animate__fadeInUp" data-wow-delay="0.35s">
                                            <div class="service-head">
                                                <h4>تحليل أداء الحملات</h4>
                                                <span>6</span>
                                            </div>
                                            <div class="service-info">
                                                <p>تقارير وتحليلات لتحسين عائد الإعلان.</p>
                                            </div>
                                            <div class="service-link"><a class="header-btn" href="#"><span>استكشف ماذا نقدم</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/></svg></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    @include('front.partials.footer')

    <!-- Main Scripts -->
    <script src="{{ asset('assets/js/libs/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/popper.js') }}"></script>
    <script src="{{ asset('main.js') }}"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</body>

</html>