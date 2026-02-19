<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Main Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Important Meta Tags -->
    <meta name="author" content="https://www.menamedia.io" />
    <meta name="description" content="{{ $blog->excerpt ? Str::limit($blog->excerpt, 160) : Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords" content="مدونة نجد، {{ $blog->blogCategory?->name }}, نجد لحلول الأعمال" />

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/lightgallery.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>{{ $blog->title }} | مدونة نجد</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container index-header-hero-bg" style="background-image: url({{ $blog->image ? asset('storage/' . $blog->image) : asset('nagd-front/assets/images/blog/01.webp') }});">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>{{ $blog->title }}</h1>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="blogs-page">
            <div class="one-blog">
                <div class="container">
                    <article class="one-blog-article">
                        <nav class="one-blog-breadcrumb" aria-label="مسار التنقل">
                            <a href="{{ url('/') }}">الرئيسة</a>
                            <span class="breadcrumb-sep">/</span>
                            <a href="{{ url('/blogs') }}">المدونة</a>
                            <span class="breadcrumb-sep">/</span>
                            <span class="breadcrumb-current">{{ $blog->title }}</span>
                        </nav>
                        <header class="one-blog-header">
                            @if($blog->blogCategory)<span class="one-blog-category">{{ $blog->blogCategory->name }}</span>@endif
                            <h1 class="one-blog-title">{{ $blog->title }}</h1>
                            <div class="one-blog-meta">
                                <time datetime="{{ ($blog->published_at ?? $blog->created_at)->format('Y-m-d') }}">{{ ($blog->published_at ?? $blog->created_at)->translatedFormat('d F Y') }}</time>
                                @if($blog->content)
                                <span class="meta-sep">·</span>
                                <span>قراءة {{ max(1, (int) (str_word_count(strip_tags($blog->content)) / 150)) }} دقائق</span>
                                @endif
                            </div>
                        </header>
                        <div class="one-blog-body">
                            @if($blog->excerpt)
                            <p class="one-blog-lead">{{ $blog->excerpt }}</p>
                            @endif
                            @if($blog->content)
                            <div class="one-blog-content">{!! $blog->content !!}</div>
                            @else
                            <p>لا يوجد محتوى لهذه المقالة.</p>
                            @endif
                        </div>
                    </article>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.1.21/tilt.jquery.min.js"></script>
    <!-- Addition Scripts -->

</body>

</html>