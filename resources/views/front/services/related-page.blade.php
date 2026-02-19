<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Str::limit(strip_tags($relatedServicePage->description ?? ''), 160) }}">
    <meta name="keywords" content="خدمات نجد، {{ $relatedServicePage->title }}">

    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <title>{{ $relatedServicePage->title }} | خدمات نجد لحلول الأعمال</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />
</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">
                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>{{ $relatedServicePage->title }}</h1>
                        </div>
                        @if($relatedServicePage->description)
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>{{ $relatedServicePage->description }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="services-page">
            <div class="one-service">
                <div class="container">
                    <article class="one-service-article">
                        <div class="one-service-hero wow animate__animated animate__fadeInUp">
                            <header class="one-service-header">
                                <h1 class="one-service-title">{{ $relatedServicePage->title }}</h1>
                                @if($relatedServicePage->description)
                                <p class="one-service-lead">{{ $relatedServicePage->description }}</p>
                                @endif
                            </header>
                        </div>
                        @if($relatedServicePage->page_content)
                        <div class="one-service-body one-service-body-html" style="direction: rtl; text-align: right;">
                            {!! $relatedServicePage->page_content !!}
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
