<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Main Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Important Meta Tags -->
    <meta name="author" content="https://www.menamedia.io" />
    <meta name="description" content="تعرف على نجد لحلول الأعمال - شركة سعودية متخصصة في تقديم الاستشارات والتحول المؤسسي وحلول متكاملة تدعم نمو الشركات.">
    <meta name="keywords" content="نجد، حلول الأعمال، استشارات، تحول مؤسسي، السعودية، الرياض" />

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>عن نجد | نجد لحلول الأعمال</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>عن نجد لحلول الأعمال</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>شركة سعودية متخصصة في تقديم الاستشارات والتحول المؤسسي، نصمم حلولاً متكاملة تدعم نمو الشركات وتساهم في بناء فرق عمل قادرة على المنافسة وتسريع الإنجاز.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @if(isset($aboutUs) && !empty($aboutUs->about_page_content))
        <div class="about-page">
            <div class="about-section">
                <div class="container about-page-editable-content">
                    {!! $aboutUs->about_page_content !!}
                </div>
            </div>
        </div>
        @else
        <div class="about-page">
            <div class="about-section">
                <div class="container">

                    <!-- Story Section -->
                    <div class="story-section">
                        <div class="container">

                            <div class="story-content">
                                <div class="row">
                                    <!-- Vision and Value Cards -->
                                    <div class="col-lg-6">
                                        <div class="story-cards-wrapper">
                                            <!-- Text and Features Section -->
                                            <div class="story-text-features">
                                                <div class="index-section-header m-0 wow animate__animated animate__fadeInUp">
                                                    <div class="index-section-header-head">
                                                        <span>قصتنا</span>
                                                        <h3 style="font-size: 2rem;" calss="m-0">
                                                            فريق عمل متكامل
                                                            
                                                            خبراء في الإدارة والتقنية</h3>
                                                    </div>
                                                </div>
                                                <div class="story-features-row">
                                                    <p class="text">"نجد لحلول الأعمال" هي أكثر من مجرد شركة استشارات؛ نحن بيت خبرة متكامل يجمع بين الفهم العميق للسوق السعودي والإقليمي وبين أحدث التقنيات العالمية. تأسست نجد لتكون الجسر الذي يعبر به عملاؤنا نحو المستقبل، متسلحين بالخبرة والحوكمة الرشيدة.</p>

                                                    <div class="story-feature-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span>خبرة متخصصة</span>
                                                    </div>
                                                    <div class="story-feature-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                                        </svg>
                                                        <span>حلول مبتكرة</span>
                                                    </div>
                                                    <div class="story-feature-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                                        </svg>
                                                        <span>دعم مستمر</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Vision and Value Cards in One Line -->
                                            <div class="story-cards-row">
                                                <div class="story-card vision-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                                    <div class="story-card-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                            <circle cx="12" cy="12" r="3"/>
                                                        </svg>
                                                    </div>
                                                    <div class="story-card-content">
                                                        <h4>رؤيتنا</h4>
                                                        <p>الريادة في تمكين المؤسسات في الشرق الأوسط نحو اقتصاد رقمي مزدهر.

                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="story-card value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                                                    <div class="story-card-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                                        </svg>
                                                    </div>
                                                    <div class="story-card-content">
                                                        <h4>قيمنا</h4>
                                                        <p>الالتزام بالجودة، الشفافية المطلقة، والابتكار المستمر.

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Story Image -->
                                    <div class="col-lg-6">
                                        <div class="why-icon wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay="0.3s">
                                            <img src="{{ asset('nagd-front/assets/images/why.webp') }}" alt="">
                                            <div class="why-icons-floating">
                                                <img src="{{ asset('nagd-front/assets/images/w1.webp') }}" class="w1" alt="">
                                                <img src="{{ asset('nagd-front/assets/images/w2.webp') }}" class="w2" alt="">
                                            </div>
                                            <div class="why-action">
                                                <a href="https://erp.eternago.com/home" class="" data-wow-duration="2s" data-wow-delay="1s" data-wow-iteration="infinite">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16.5 13.2018L13 15.5352V19.1315L19.1972 15L16.5 13.2018ZM14.6972 12L12 10.2018L9.30278 12L12 13.7982L14.6972 12ZM20 10.8685L18.3028 12L20 13.1315V10.8685ZM19.1972 9L13 4.86852V8.46482L16.5 10.7982L19.1972 9ZM7.5 10.7982L11 8.46482V4.86852L4.80278 9L7.5 10.7982ZM4.80278 15L11 19.1315V15.5352L7.5 13.2018L4.80278 15ZM4 13.1315L5.69722 12L4 10.8685V13.1315ZM2 9C2 8.66565 2.1671 8.35342 2.4453 8.16795L11.4453 2.16795C11.7812 1.94402 12.2188 1.94402 12.5547 2.16795L21.5547 8.16795C21.8329 8.35342 22 8.66565 22 9V15C22 15.3344 21.8329 15.6466 21.5547 15.8321L12.5547 21.8321C12.2188 22.056 11.7812 22.056 11.4453 21.8321L2.4453 15.8321C2.1671 15.6466 2 15.3344 2 15V9Z"></path></svg>
                                                    عـرض الـديـمـو
                                                </a>
                                            </div>
                                            <div class="why-num">
                                                <h3>100%</h3>
                                                <p>عملاء سعيدون</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Partners Section -->
                    <div class="partners-section">
                        <div class="container">
                            <div class="partners-slider-wrapper">
                                <div class="partners-slider-row">
                                    <div class="partners-slider-track slide-left">
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/01.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/02.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/03.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/04.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/05.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/06.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/07.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/08.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/09.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/10.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <!-- Duplicate for seamless loop -->
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/01.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/02.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/03.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/04.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/05.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/06.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/07.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/08.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/09.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                        <div class="partner-item">
                                            <div class="partner-logo">
                                                <img src="{{ asset('nagd-front/assets/images/partner/10.webp') }}" alt="Partner Logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Core Values / Services -->
                    <div class="about-values-section">
                        <div class="index-section-header-center wow animate__animated animate__fadeInUp">
                            <div class="index-section-header-head">
                                <span>حلولنا الأساسية</span>
                                <h3>ماذا نقدم لكم؟</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="about-value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                    <div class="value-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                        </svg>
                                    </div>
                                    <h4>استراتيجيات النمو والتوسع</h4>
                                    <p>نساعدكم في وضع خطط استراتيجية واضحة تدعم نمو أعمالكم وتوسعها محلياً وإقليمياً.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="about-value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                    <div class="value-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                        </svg>
                                    </div>
                                    <h4>تحسين العمليات وإدارة الجودة</h4>
                                    <p>نعمل على تحسين كفاءة عملياتكم وبناء أنظمة جودة تدعم الاستمرارية والتميز.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="about-value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                    <div class="value-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zM4 6h16v10H4V6z"/>
                                        </svg>
                                    </div>
                                    <h4>التحول الرقمي وبناء الأنظمة</h4>
                                    <p>ندعمكم في رحلة التحول الرقمي وبناء أنظمة وتقنيات تتوافق مع أهدافكم.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="about-value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                    <div class="value-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                        </svg>
                                    </div>
                                    <h4>مكاتب إدارة المشاريع PMO</h4>
                                    <p>نساعدكم في إرساء مكاتب إدارة مشاريع احترافية تضمن تنفيذ مبادراتكم بنجاح.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="about-value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                    <div class="value-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                    <h4>التسويق وتطوير الهوية</h4>
                                    <p>نقدم حلول تسويقية متكاملة وتطوير هوية بصرية تعكس قيم علامتكم التجارية.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="about-value-card wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                    <div class="value-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                                        </svg>
                                    </div>
                                    <h4>تأهيل الفرق وتمكين القادة</h4>
                                    <p>نُنمّي قدرات فرقكم ونُمكّن قادتكم من خلال برامج تدريب وتطوير مخصصة.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nums">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="nums-vid" style="background-image: url({{ asset('nagd-front/assets/images/hero2.png') }});">
                                        <div class="num-vid-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M21.384,8.815L10.281,.774C9.075-.112,7.494-.238,6.162,.437c-1.354,.687-2.162,2.003-2.162,3.521V20.043c0,1.519,.809,2.835,2.163,3.521,.578,.293,1.19,.438,1.797,.438,.814,0,1.619-.261,2.318-.774l11.105-8.042,.003-.002c1.025-.752,1.613-1.912,1.613-3.184s-.588-2.432-1.616-3.185Zm-.588,5.561l-11.106,8.043c-.914,.672-2.063,.765-3.074,.253-1.012-.513-1.615-1.495-1.615-2.629V3.957c0-1.133,.604-2.115,1.615-2.629,.429-.218,.881-.328,1.344-.328,.615,0,1.214,.201,1.733,.583l11.104,8.041c.765,.561,1.204,1.427,1.204,2.376s-.438,1.814-1.204,2.376Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="index-section-header">
                                        <div class="index-section-header-head">
                                            <span>أرقام شركة نجد لحلول الأعمال</span>
                                            <h3>أرقـامـنـا تـتـحـدث عـنـا</h3>
                                        </div>
                                        <p class="text">تنمية العلامات التجارية من خلال الإبداع الجريء والاستراتيجي، مع التركيز على
                                            البحث عن
                                            طرق جديدة <span> لعرض محتوى المستخدم على الدعم الرقمي</span> وتصور الفنون المستقبلية.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="num-cards">
                                        <div class="row row-inside-row">

                                            <div class="col-lg-3">
                                                <div class="num-card">
                                                    <div class="num-card-head">
                                                        <h2>12</h2>
                                                        <span>عاماً من الخبرة</span>
                                                    </div>
                                                    <p>لقد بنينا إرثًا من الثقة والإبداع على مدار 12 عامًا من تقديم حلول من
                                                        الدرجة الأولى ونتائج متميزة.</p>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="num-card">
                                                    <div class="num-card-head">
                                                        <h2>99%</h2>
                                                        <span>عملاء سعيدون</span>
                                                    </div>
                                                    <p>يتجلى التزامنا بالتميز في معدل رضا العملاء البالغ 93%، مما يضمن حصول كل عميل
                                                        على ما يريده.</p>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="num-card">
                                                    <div class="num-card-head">
                                                        <h2>167</h2>
                                                        <span>حلول إبداعية</span>
                                                    </div>
                                                    <p>نحن متخصصون في تطوير أكثر من 68 حلاً إبداعيًا مصممًا خصيصًا لتلبية أهداف
                                                        العلامة التجارية الفريدة.</p>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="num-card">
                                                    <div class="num-card-head">
                                                        <h2>45</h2>
                                                        <span>فريق عمل خبير</span>
                                                    </div>
                                                    <p>يقدم فريقنا المكون من 45 محترفًا موهوبًا وجهات نظر متنوعة وابتكارًا لكل مشروع
                                                        نتعهد به.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- CTA Section -->
                    <div class="about-cta wow animate__animated animate__fadeInUp">
                        <div class="about-cta-inner">
                            <h3>هل أنتم مستعدون للانطلاق معنا؟</h3>
                            <p>تواصلوا معنا اليوم واحجزوا استشارتكم المجانية لبدء رحلة التحول والنمو.</p>
                            <a href="{{ url('/contacts') }}" class="book-btn">
                                <span>احجز استشارتك الآن</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif

    </div>


    @include('front.partials.footer')

    <!-- Main Scripts -->
    <script src="{{ asset('nagd-front/assets/js/libs/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/popper.js') }}"></script>
    <script src="{{ asset('nagd-front/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.1.21/tilt.jquery.min.js"></script>

</body>

</html>
