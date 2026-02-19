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
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>المنتجات</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>المنتجات</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>اكتشف منتجاتنا المبتكرة المصممة خصيصاً لمختلف القطاعات لتلبية احتياجاتك الخاصة.</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="index-header-video">
                <video autoplay="" muted="" loop="">
                    <source src="{{ asset('nagd-front/assets/images/vid-bg1.mp4') }}" type="video/mp4">
                </video>
            </div>

        </div>

        <div class="products-page">
            <div class="products">
                <div class="container">

                    <div class="index-section-header-center wow animate__animated animate__fadeInUp">
                        <div class="index-section-header-head">
                            <span>منتجاتنا المميزة</span>
                            <h3>اكتـشـف مـنـتـجـاتـنـا الـمـصـمـمـة لـقـطـاعـات مـخـتـلـفـة</h3>
                        </div>
                        <p class="text">نقدم حلولاً متكاملة ومبتكرة مصممة خصيصاً لتلبية احتياجات مختلف القطاعات
                            <span> من خلال منتجاتنا المتطورة</span> التي تساهم في تحسين الأداء والكفاءة.</p>
                        <ul class="list-unstyled product-sectors">
                            <li class="sector-btn active" data-filter="all">كل القطاعات</li>
                            @foreach($categories as $cat)
                            <li class="sector-btn {{ $loop->last && !$products->whereNull('category_id')->count() ? 'last-li' : '' }}" data-filter="{{ $cat->slug }}">{{ $cat->name }}</li>
                            @endforeach
                            @if($products->whereNull('category_id')->count() > 0)
                            <li class="sector-btn last-li" data-filter="other">أخرى</li>
                            @endif
                        </ul>
                    </div>

                    <div class="products-cards">
                        <div class="row" id="products-container">
                            @forelse($products as $index => $product)
                            @php
                                $imageUrl = $product->image ? asset('storage/' . $product->image) : asset('nagd-front/assets/images/projects/01.webp');
                                $mixClass = $product->productCategory?->slug ?? 'other';
                            @endphp
                            <div class="col-lg-4 mix {{ $mixClass }}" id="product-{{ $product->id }}">
                                <div class="product-card wow animate__animated animate__fadeInUp" data-wow-delay="{{ ($index % 3) * 0.1 }}s">
                                    <figure style="background-image: url({{ $imageUrl }})">
                                        <div class="product-sector">
                                            <span>{{ $product->productCategory?->name ?? 'منتج' }}</span>
                                        </div>
                                    </figure>
                                    <div class="product-content">
                                        <h3>{{ $product->title }}</h3>
                                        <p>{{ Str::limit($product->excerpt, 120) }}</p>
                                        @if($product->demo_url)
                                        <a href="{{ $product->demo_url }}" target="_blank" rel="noopener noreferrer" class="demo-btn">
                                            <span>عرض الديمو</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.7784 18.3641L18.3644 19.7783L6.92908 8.34305V13.9288H4.92908L4.92908 4.9288L13.9291 4.9288L13.9291 6.9288L8.34326 6.9288L19.7784 18.3641Z"></path>
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">لا توجد منتجات لعرضها حالياً.</p>
                            </div>
                            @endforelse
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.1.21/tilt.jquery.min.js"></script>
        <style>
            #products-container .mix.product-card-hidden { display: none !important; }
        </style>
        <script>
            $(document).ready(function() {
                @if($products->isNotEmpty())
                var $container = $('#products-container');
                var $cards = $container.find('.mix');
                var $buttons = $('.product-sectors .sector-btn');

                $buttons.on('click', function() {
                    var $btn = $(this);
                    var filter = $btn.attr('data-filter');

                    // Update active state: remove from all, add to clicked
                    $buttons.removeClass('active');
                    $btn.addClass('active');

                    // Show/hide cards by filter
                    if (filter === 'all') {
                        $cards.removeClass('product-card-hidden');
                    } else {
                        $cards.each(function() {
                            var $card = $(this);
                            if ($card.hasClass(filter)) {
                                $card.removeClass('product-card-hidden');
                            } else {
                                $card.addClass('product-card-hidden');
                            }
                        });
                    }
                });
                @endif
            });
        </script>

</body>

</html>

