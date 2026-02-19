<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Main Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Important Meta Tags -->
    <meta name="author" content="https://www.menamedia.io" />
    <meta name="description" content="{{ $project->excerpt ? Str::limit(strip_tags($project->excerpt), 160) : Str::limit($project->title, 160) }}" />
    <meta name="keywords" content="مشاريع نجد، {{ $project->projectCategory?->name ?? 'مشاريع' }}، نجد لحلول الأعمال" />

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>{{ $project->title }} | مشاريع نجد</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

        @php
            $projectImageUrl = $project->image ? asset('storage/' . $project->image) : asset('nagd-front/assets/images/projects/01.webp');
        @endphp
            <div class="container index-header-hero-bg" style="background-image: url({{ $projectImageUrl }});">
                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>{{ $project->title }}</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>{{ $project->excerpt ?? $project->subtitle ?? Str::limit($project->title, 120) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="projects-page">
            <div class="one-project">
                <div class="container">
                    <article class="one-project-article">
                        <nav class="one-project-breadcrumb" aria-label="مسار التنقل">
                            <a href="{{ url('/') }}">الرئيسة</a>
                            <span class="breadcrumb-sep">/</span>
                            <a href="{{ route('front.projects.index') }}">المشاريع</a>
                            <span class="breadcrumb-sep">/</span>
                            <span class="breadcrumb-current">{{ $project->title }}</span>
                        </nav>
                        <header class="one-project-header wow animate__animated animate__fadeInUp">
                            @if($project->projectCategory)
                            <span class="one-project-category">{{ $project->projectCategory->name }}</span>
                            @endif
                            <h1 class="one-project-title">{{ $project->title }}</h1>
                            @if($project->excerpt || $project->subtitle)
                            <p class="one-project-lead">{{ $project->excerpt ?? $project->subtitle }}</p>
                            @endif
                        </header>
                        <div class="one-project-body">
                            @if($project->content)
                                {!! $project->content !!}
                            @else
                                <p>{{ $project->excerpt ?? $project->subtitle ?? 'لا يوجد محتوى إضافي لهذا المشروع.' }}</p>
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
</body>
</html>
