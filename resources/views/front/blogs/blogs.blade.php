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
    <title> Blog & Insights
    </title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>المدونة</h1>
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

            <div class="index-header-video">
                <video autoplay="" muted="" loop="">
                    <source src="{{ asset('nagd-front/assets/images/vid-bg2.mp4') }}" type="video/mp4">
                </video>
            </div>

        </div>

        <div class="blogs-page">
            <div class="blog">
                <div class="container">
    
                    <div class="index-section-header-center wow animate__animated animate__fadeInUp">
                        <div class="index-section-header-head">
                            <span>بعض من أهم مدوناتنا</span>
                            <h3>اكـتـشـف أهـم الأخـبـار والـمـقـالات</h3>
                        </div>
                        <p class="text">تنمية العلامات التجارية من خلال الإبداع الجريء والاستراتيجي، مع التركيز على البحث عن
                            طرق جديدة <span> لعرض محتوى المستخدم على الدعم الرقمي</span> وتصور الفنون المستقبلية.</p>
                    </div>
    
                    <div class="row blog-page-row">
                        <!-- Sidebar: Search + Filter + Category -->
                        <aside class="col-lg-4 col-xl-3 blog-sidebar order-lg-1 ">
                            <div class="blog-sidebar-inner">
                                <div class="blog-sidebar-search">
                                    <label class="blog-sidebar-label">بحث</label>
                                    <div class="blog-search-wrap">
                                        <input type="text" id="blog-search" class="blog-search-input" placeholder="ابحث في المدونة..." autocomplete="off" />
                                        <span class="blog-search-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                                <path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="blog-sidebar-filter">
                                    <label class="blog-sidebar-label">ترتيب</label>
                                    <select id="blog-filter" class="blog-filter-select">
                                        <option value="default">الأحدث أولاً</option>
                                        <option value="oldest">الأقدم أولاً</option>
                                        <option value="title">حسب العنوان</option>
                                    </select>
                                </div>
                                <div class="blog-sidebar-categories">
                                    <label class="blog-sidebar-label">التصنيفات</label>
                                    <ul class="blog-categories-list list-unstyled">
                                        <li><button type="button" class="blog-cat-btn active" data-category="all"><span class="blog-cat-count">{{ count($blogs) }}</span><span class="blog-cat-label">الكل</span></button></li>
                                        @foreach($categories as $cat)
                                        <li><button type="button" class="blog-cat-btn" data-category="{{ $cat->name }}"><span class="blog-cat-count">{{ $blogs->where('category_id', $cat->id)->count() }}</span><span class="blog-cat-label">{{ $cat->name }}</span></button></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>

                        <div class="col-lg-8 col-xl-9 order-lg-2">
                            <div class="blog-container">
                                <div class="row" id="blog-cards-row">
                                    @forelse($blogs as $index => $blog)
                                    <div class="col-lg-6 col-xl-4 blog-col" data-category="{{ $blog->blogCategory?->name ?? '' }}" data-order="{{ $index }}">
                                        <a href="{{ route('front.blogs.show', $blog) }}" class="blog-card-link text-decoration-none">
                                            <div class="blog-card wow animate__animated animate__fadeInUp" data-wow-delay="{{ ($index % 3) * 0.1 + 0.1 }}s">
                                                <figure style="background-image: url({{ $blog->image ? asset('storage/' . $blog->image) : asset('nagd-front/assets/images/blog/01.webp') }})">
                                                    @if($blog->published_at)
                                                    <div class="blog-date">{{ $blog->published_at->translatedFormat('d M Y') }}</div>
                                                    @endif
                                                </figure>
                                                <div class="blog-cat">
                                                    @if($blog->blogCategory)<span>{{ $blog->blogCategory->name }}</span>@endif
                                                    <h4>.</h4>
                                                    @if($blog->excerpt)<span>{{ Str::limit($blog->excerpt, 60) }}</span>@else<span>{{ Str::limit(strip_tags($blog->content), 60) }}</span>@endif
                                                </div>
                                                <h3>{{ $blog->title }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    <div class="col-12 text-center py-5">
                                        <p class="mb-0">لا توجد مقالات في المدونة حالياً.</p>
                                    </div>
                                    @endforelse
                                </div>
                                @if(count($blogs) > 0)
                                <div id="blog-no-results" class="blog-no-results text-center py-5" style="display: none;">
                                    <p class="mb-0">لا توجد نتائج تطابق بحثك أو التصنيف المحدد.</p>
                                </div>
                                @endif
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.1.21/tilt.jquery.min.js"></script>
        <!-- Blogs: search, filter, category -->
        <script>
            (function () {
                var $row = $('#blog-cards-row');
                var $cols = $row.find('.blog-col');
                var $noResults = $('#blog-no-results');
                var currentCategory = 'all';
                var searchQuery = '';

                function getCardText($col) {
                    var $card = $col.find('.blog-card');
                    return ($card.find('.blog-cat span').first().text() + ' ' + $card.find('h3').text()).toLowerCase();
                }

                function applyFilters() {
                    var visible = 0;
                    $cols.each(function () {
                        var $col = $(this);
                        var catMatch = currentCategory === 'all' || $col.data('category') === currentCategory;
                        var textMatch = !searchQuery || getCardText($col).indexOf(searchQuery.toLowerCase()) !== -1;
                        var show = catMatch && textMatch;
                        $col.toggleClass('blog-col-hidden', !show).toggle(show);
                        if (show) visible++;
                    });
                    $noResults.toggle(visible === 0);
                }

                function sortCards(order) {
                    var $items = $cols.get();
                    $items.sort(function (a, b) {
                        var $a = $(a), $b = $(b);
                        var titleA = $a.find('.blog-card h3').text().trim();
                        var titleB = $b.find('.blog-card h3').text().trim();
                        if (order === 'title') return titleA.localeCompare(titleB, 'ar');
                        var orderA = parseInt($a.data('order'), 10);
                        var orderB = parseInt($b.data('order'), 10);
                        if (order === 'oldest') return orderA - orderB;
                        return orderB - orderA;
                    });
                    $.each($items, function (i, el) { $row.append(el); });
                }

                $('#blog-search').on('input', function () {
                    searchQuery = $(this).val().trim();
                    applyFilters();
                });

                $('#blog-filter').on('change', function () {
                    sortCards($(this).val());
                });

                $('.blog-cat-btn').on('click', function () {
                    $('.blog-cat-btn').removeClass('active');
                    $(this).addClass('active');
                    currentCategory = $(this).data('category');
                    applyFilters();
                });

                function updateCategoryCounts() {
                    var counts = { all: $cols.length };
                    $cols.each(function () {
                        var cat = $(this).data('category');
                        counts[cat] = (counts[cat] || 0) + 1;
                    });
                    $('.blog-cat-btn').each(function () {
                        var cat = $(this).data('category');
                        $(this).find('.blog-cat-count').text(counts[cat] != null ? counts[cat] : 0);
                    });
                }

                updateCategoryCounts();
                applyFilters();
            })();
        </script>
        <!-- Addition Scripts -->



</body>

</html>