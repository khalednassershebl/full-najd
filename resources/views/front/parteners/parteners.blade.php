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
    <meta name="keywords" content="{{ $site['seo']['meta_keywords'] ?? 'Project – Brand – service – outcome' }}">

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>Parteners</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>شركاؤنا في النمو</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>تُمثل نجد المتكاملة نهجًا احترافيًا متكاملًا في مجال المقاولات. نجمع بين الخبرة الهندسية والكفاءة التشغيلية .</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="brands-page">
            <div class="partners partners-tech-section">
                <div class="container">
                    <div class="index-section-header-center wow animate__animated animate__fadeInUp">
                        <div class="index-section-header-head">
                            <span>شركاؤنا</span>
                            <h3>شركاؤنا في النجاح</h3>
                        </div>
                        <p class="text">نفتخر بشراكاتنا الاستراتيجية مع كبرى الشركات والمؤسسات الرائدة في مختلف المجالات. <span>نعمل معًا لتحقيق التميز والابتكار</span> في كل مشروع ننفذه.</p>
                    </div>

                    <div class="partners-slider-wrapper">
                        @php
                            $partnersList = isset($partners) ? $partners : collect();
                            $size = $partnersList->isEmpty() ? 0 : (int) ceil($partnersList->count() / 3);
                            $chunks = $size > 0 ? $partnersList->chunk($size)->values() : collect();
                            $row1 = $chunks->get(0, collect());
                            $row2 = $chunks->get(1, collect());
                            $row3 = $chunks->get(2, collect());
                        @endphp
                        @if($partnersList->isNotEmpty())
                        <!-- First Row - Slides Left -->
                        @if($row1->isNotEmpty())
                        <div class="partners-slider-row mr-5">
                            <div class="partners-slider-track slide-left">
                                @foreach($row1 as $partner)
                                <div class="partner-item">
                                    <div class="partner-logo">
                                        @if($partner->image)
                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @foreach($row1 as $partner)
                                <div class="partner-item">
                                    <div class="partner-logo">
                                        @if($partner->image)
                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!-- Second Row - Slides Right -->
                        @if($row2->isNotEmpty())
                        <div class="partners-slider-row">
                            <div class="partners-slider-track slide-right">
                                @foreach($row2 as $partner)
                                <div class="partner-item">
                                    <div class="partner-logo">
                                        @if($partner->image)
                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @foreach($row2 as $partner)
                                <div class="partner-item">
                                    <div class="partner-logo">
                                        @if($partner->image)
                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!-- Third Row - Slides Left -->
                        @if($row3->isNotEmpty())
                        <div class="partners-slider-row">
                            <div class="partners-slider-track slide-left">
                                @foreach($row3 as $partner)
                                <div class="partner-item">
                                    <div class="partner-logo">
                                        @if($partner->image)
                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @foreach($row3 as $partner)
                                <div class="partner-item">
                                    <div class="partner-logo">
                                        @if($partner->image)
                                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @else
                        <p class="text-muted text-center py-5">لا يوجد شركاء لعرضهم حالياً.</p>
                        @endif
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
    <!-- Addition Scripts -->



</body>

</html>