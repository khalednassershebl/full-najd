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
    <title>Projects & Case Studies</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>مشاريعنا</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                    <p>تُمثل نجد المتكاملة نهجًا احترافيًا متكاملًا في مجال المقاولات. نجمع بين الخبرة الهندسية والكفاءة التشغيلية .</p>
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

        <div class="projects-page">
            <div class="projects">
                <div class="container">

                    <div class="index-section-header-center wow animate__animated animate__fadeInUp">
                        <div class="index-section-header-head">
                            <span>بعض من أهم مشاريعنا</span>
                            <h3>اكـتـشـف مـشـاريـعـنـا الـنـاجـحـة والـمـتـمـيزة</h3>
                        </div>
                        <p class="text">تنمية العلامات التجارية من خلال الإبداع الجريء والاستراتيجي، مع التركيز على البحث عن
                            طرق جديدة <span> لعرض محتوى المستخدم على الدعم الرقمي</span> وتصور الفنون المستقبلية.</p>
                        <ul class="list-unstyled project-categories">
                            <li class="filter-btn active" data-filter="all">كل المشاريع</li>
                            @foreach($categories as $cat)
                            <li class="filter-btn {{ $loop->last && !$projects->whereNull('category_id')->count() ? 'last-li' : '' }}" data-filter="{{ $cat->slug }}">{{ $cat->name }}</li>
                            @endforeach
                            @if($projects->whereNull('category_id')->count() > 0)
                            <li class="filter-btn last-li" data-filter="other">أخرى</li>
                            @endif
                        </ul>
                    </div>

                    <div class="projects-cards">
                        <div class="row" id="projects-container">
                            @forelse($projects as $index => $project)
                            @php
                                $imageUrl = $project->image ? asset('storage/' . $project->image) : asset('nagd-front/assets/images/projects/01.webp');
                                $mixClass = $project->projectCategory?->slug ?? 'other';
                            @endphp
                            <div class="col-lg-4 mix {{ $mixClass }}">
                                <a href="{{ route('front.projects.show', $project) }}" class="project-card wow animate__animated animate__fadeInUp" data-wow-delay="{{ ($index % 3) * 0.1 }}s">
                                    <figure style="background-image: url({{ $imageUrl }})">
                                        <div class="project-cat">
                                            <span>{{ $project->projectCategory?->name ?? 'مشروع' }}</span>
                                            <h4>.</h4>
                                            <span>{{ $project->subtitle ?? Str::limit($project->title, 40) }}</span>
                                        </div>
                                        <div class="project-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.7784 18.3641L18.3644 19.7783L6.92908 8.34305V13.9288H4.92908L4.92908 4.9288L13.9291 4.9288L13.9291 6.9288L8.34326 6.9288L19.7784 18.3641Z"></path>
                                            </svg>
                                        </div>
                                    </figure>
                                    <h3>{{ $project->title }}</h3>
                                </a>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">لا توجد مشاريع لعرضها حالياً.</p>
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
        <script src="{{ asset('nagd-front/assets/js/libs/mixitup.min.js') }}"></script>

        <!-- Custom Filter Implementation with MixItUp-like Animations -->
        <!-- <script>
        $(document).ready(function() {
            // Custom filter implementation with advanced animations
            $('.filter-btn').on('click', function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                
                var filterValue = $(this).attr('data-filter');
                console.log('Filtering by:', filterValue); // Debug log
                
                // Get all project items
                var $items = $('.mix');
                var $container = $('#projects-container');
                
                // Add loading class to container
                $container.addClass('filtering');
                
                // First, hide ALL items with display none
                $items.css('display', 'none');
                
                // Determine which items to show
                var $targetItems;
                if (filterValue === 'all') {
                    $targetItems = $items;
                } else {
                    $targetItems = $items.filter('.' + filterValue);
                }
                
                // Show target items with staggered animation
                setTimeout(function() {
                    $targetItems.each(function(index) {
                        var $item = $(this);
                        $item.css({
                            'display': 'block',
                            'opacity': '0',
                            'transform': 'scale(0.8) translateY(30px)',
                            'transition': 'all 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                        });
                        
                        setTimeout(function() {
                            $item.css({
                                'opacity': '1',
                                'transform': 'scale(1) translateY(0)'
                            });
                        }, index * 80); // Staggered animation
                    });
                }, 100); // Small delay to ensure display none takes effect
                
                // Remove loading class after animation completes
                setTimeout(function() {
                    $container.removeClass('filtering');
                }, 1000);
            });
        });
    </script> -->
        <!-- Addition Scripts -->

        <script>
            var mixer = mixitup('#projects-container', {
                selectors: {
                    target: '.mix'
                },
                animation: {
                    duration: 300
                }
            });
        </script>

</body>

</html>