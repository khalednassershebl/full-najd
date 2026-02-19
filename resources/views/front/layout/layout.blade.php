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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/lightgallery.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>Layout</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    <!-- Start Layout -->

    <div class="layout index-layout">

        <nav class="big-nav big-nav-hiddin">
            <div class="nav-links">
                <div class="big-nav-header-title">
                    <div class="nav-logo-container">
                        <a href="{{ url('/') }}">
                            <img src="{{ $site['logos']['big_nav_logo_url'] ?? asset('nagd-front/assets/images/logos/logo.png') }}" alt="logo" />
                        </a>
                    </div>
                    <span class="close-big-nav">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                        </svg>
                    </span>
                </div>

                <div class="big-nav-search">
                    <div class="nav-search">
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" />
                                <div class="search-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" />
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <ul class="list-unstyled p-0">
                    <li class="">
                        <!-- li-active -->
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/') }}">Home</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/about') }}">About Us</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/services') }}">Forte Methos</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#">Animals</a>
                            </div>
                            <div class="li-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z" />
                                </svg>
                            </div>
                        </div>
                        <div class="nav-link-popup big-nav-hiddin">
                            <div class="big-nav-header-title">
                                <span class="close-link-popup">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M5.828 7l2.536 2.536L6.95 10.95 2 6l4.95-4.95 1.414 1.414L5.828 5H13a8 8 0 1 1 0 16H4v-2h9a6 6 0 1 0 0-12H5.828z" />
                                    </svg>
                                </span>
                            </div>

                            <ul class="list-unstyled p-0">
                                <li class="">
                                    <!-- li-active -->
                                    <div class="li-link">
                                        <div class="link-info">
                                            <a href="{{ url('/services') }}">Bovine Diet</a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="li-link">
                                        <div class="link-info">
                                            <a href="{{ url('/services') }}">Beef Cattle</a>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/products') }}">Products</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/blogs') }}">Blogs</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/contacts') }}">Contacts</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="close-overlay"></div>

    </div>

    <!-- End Layout -->


    <div class="content">
        <div class="index-header index-page-layout">

            <header class="header">
                <div class="container">
                    <nav class="navbar">

                        <div class="nav-logo">

                            <div class="nav-logo-container">
                                <a href="{{ url('/') }}">
                                    <img class="main-logo" src="{{ $site['logos']['navbar_logo_url'] ?? asset('nagd-front/assets/images/logos/logo.png') }}" alt="" />
                                </a>
                            </div>

                            <div class="nav-mobile-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"></path>
                                </svg>
                            </div>

                        </div>

                        <div class="nav-links">
                            <ul class="list-unstyled">
                                <li class="nav-link-active"><a href="{{ url('/') }}">الرئيسية</a></li>
                                <li><a href="{{ url('/who-we-are/about') }}">من نحن</a></li>
                                <li><a href="{{ url('/services') }}">الخدمات</a></li>
                                <li><a href="{{ url('/products') }}">الباقات</a></li>
                                <li><a href="{{ url('/blogs') }}">المدونة</a></li>
                                <li><a href="{{ url('/contacts') }}">الشركاء</a></li>
                            </ul>
                        </div>

                        <div class="nav-actions">
                            <div class="nav-actions-lang">

                                <div class="icon switch-langs">

                                    <a href="#" class="page-lang">العربية</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM9.71002 19.6674C8.74743 17.6259 8.15732 15.3742 8.02731 13H4.06189C4.458 16.1765 6.71639 18.7747 9.71002 19.6674ZM10.0307 13C10.1811 15.4388 10.8778 17.7297 12 19.752C13.1222 17.7297 13.8189 15.4388 13.9693 13H10.0307ZM19.9381 13H15.9727C15.8427 15.3742 15.2526 17.6259 14.29 19.6674C17.2836 18.7747 19.542 16.1765 19.9381 13ZM4.06189 11H8.02731C8.15732 8.62577 8.74743 6.37407 9.71002 4.33256C6.71639 5.22533 4.458 7.8235 4.06189 11ZM10.0307 11H13.9693C13.8189 8.56122 13.1222 6.27025 12 4.24799C10.8778 6.27025 10.1811 8.56122 10.0307 11ZM14.29 4.33256C15.2526 6.37407 15.8427 8.62577 15.9727 11H19.9381C19.542 7.8235 17.2836 5.22533 14.29 4.33256Z">
                                        </path>
                                    </svg>

                                </div>

                            </div>
                        </div>

                    </nav>
                </div>
            </header>

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <h1>الإطار الخارجى</h1>
                        <p>شركة رائدة في مجال إدارة المشروعات والاستثمار، تتخصص في الإدارة التشغيليــة للمولات التجاريـة
                            والطبيـة، الكومباوندات السكنية</p>
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
    <!-- Addition Scripts -->

</body>

</html>