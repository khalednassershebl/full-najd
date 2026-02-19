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
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

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
            <div class="services">
                <div class="patt1">
                    <img src="{{ asset('nagd-front/assets/images/patt1.svg') }}" alt="pattern">
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
                            @foreach($services as $index => $service)
                            <div class="col-lg-4">
                                <div class="service-card wow animate__animated animate__fadeInUp" data-wow-delay="{{ ($index % 3) * 0.1 }}s">
                                    <div class="service-head">
                                        <h4>{{ $service->title }}</h4>
                                        <span>{{ $index + 1 }}</span>
                                    </div>
                                    <div class="service-icon">
                                        @if($service->icon_svg)
                                            {!! $service->icon_svg !!}
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m19.5,4h-1.551c-.252-2.244-2.139-4-4.449-4h-3c-2.31,0-4.197,1.756-4.449,4h-1.551C2.019,4,0,6.019,0,8.5v11c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5v-11c0-2.481-2.019-4.5-4.5-4.5Z"/></svg>
                                        @endif
                                    </div>
                                    <div class="service-info">
                                        <p>{{ $service->description ?? '' }}</p>
                                    </div>
                                    <div class="service-link">
                                        <a class="header-btn" href="{{ url('/services/'.$service->id) }}"><span>استكشف ماذا نقدم</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    @php
                                        $activeRelated = $service->relatedServices ? $service->relatedServices->where('is_active', true) : collect();
                                        $relatedPages = $service->relatedServicePages ? $service->relatedServicePages->where('is_active', true) : collect();
                                        $hasRelated = $activeRelated->isNotEmpty() || $relatedPages->isNotEmpty();
                                    @endphp
                                    @if($hasRelated)
                                    <div class="service-related">
                                        <span class="service-related-title">خدمات ذات صلة</span>
                                        <ul class="service-related-list list-unstyled">
                                            @foreach($activeRelated as $related)
                                            <li><a href="{{ url('/services/'.$related->id) }}">{{ $related->title }}</a></li>
                                            @endforeach
                                            @foreach($relatedPages as $page)
                                            <li><a href="{{ url('/services/related/'.$page->slug) }}">{{ $page->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    @include('front.partials.footer')

    <!-- Main Scripts -->
    <script src="{{ asset('nagd-front/assets/js/libs/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/popper.js') }}"></script>
    <script src="{{ asset('nagd-front/main.js') }}"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</body>

</html>