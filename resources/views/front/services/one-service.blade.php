<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Str::limit(strip_tags($service->description ?? ''), 160) }}">
    <meta name="keywords" content="خدمات نجد، {{ $service->title }}">

    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <title>{{ $service->title }} | خدمات نجد لحلول الأعمال</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />
</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">
                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>{{ $service->title }}</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>{{ $service->description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-page">
            <div class="one-service">
                <div class="container">
                    <article class="one-service-article">
                        <div class="one-service-hero wow animate__animated animate__fadeInUp">
                            <div class="one-service-icon">
                                @if($service->icon_svg)
                                    {!! $service->icon_svg !!}
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m19.5,4h-1.551c-.252-2.244-2.139-4-4.449-4h-3c-2.31,0-4.197,1.756-4.449,4h-1.551C2.019,4,0,6.019,0,8.5v11c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5v-11c0-2.481-2.019-4.5-4.5-4.5Z"/></svg>
                                @endif
                            </div>
                            <header class="one-service-header">
                                <h1 class="one-service-title">{{ $service->title }}</h1>
                                @if($service->description)
                                <p class="one-service-lead">{{ $service->description }}</p>
                                @endif
                            </header>
                        </div>
                        @if($service->page_content)
                        <div class="one-service-body one-service-body-html" style="direction: rtl; text-align: right;">
                            {!! $service->page_content !!}
                        </div>
                        @endif
                    </article>
                </div>
            </div>
        </div>

    </div>

    @include('front.partials.footer')

    <script src="{{ asset('nagd-front/assets/js/libs/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/popper.js') }}"></script>
    <script src="{{ asset('nagd-front/main.js') }}"></script>
</body>
</html>
