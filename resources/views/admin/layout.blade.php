<!DOCTYPE html>
<html class="loading" lang="ar" dir="rtl" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="لوحة إدارة Najd">
    <meta name="keywords" content="admin, لوحة الإدارة">
    <meta name="author" content="Najd">
    <title>@yield('title', 'لوحة الإدارة')</title>

    <link rel="apple-touch-icon" href="{{ asset('admin-dashboard/app-assets/images/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-dashboard/app-assets/images/logo.png') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/themes/dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/assets/css/style-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/assets/css/admin-theme.css') }}">
    <!-- END: Custom CSS-->

    @stack('styles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">

            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <div class="content-header">
                    <div class="content-header-left">
                        <div class="breadcrumbs-top">
                            <div class="">
                                <h2 class="content-header-title">@yield('page-title', 'الرئيسية')</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar"><img class="round" src="{{ asset('admin-dashboard/app-assets/images/logo.png') }}" alt="avatar" height="35" width="35"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="user"></i>إعدادات الحساب</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item w-100 text-start border-0 bg-transparent"><i class="mr-50" data-feather="power"></i>تسجيل الخروج</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('admin-dashboard/app-assets/images/logo.png') }}" alt="لوحة الإدارة">
                    </span>
                    <h2 class="brand-text">لوحة الإدارة</h2>
                </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">لوحة التحكم</span><i data-feather="more-horizontal"></i></li>
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">الرئيسية</span></a></li>
                <li class="nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="bar-chart"></i><span class="menu-title text-truncate" data-i18n="Dashboards">الإحصائيات</span></a></li>
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">الصفحات</span><i data-feather="more-horizontal"></i></li>


                <!-- <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span class="menu-title text-truncate" data-i18n="Invoice">الصفحة الرئيسية</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">السكشن الرئيسي</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن من نحن</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن الشركاء</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن القيم المضافة</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن الخدمات</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن احجز استشارة</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن الأنظمة الإدارية</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن قصص نجاح العملاء</span></a></li>
                        <li><a class="d-flex align-items-center" href="javascript:void(0);"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">سكشن المدونة</span></a></li>
                    </ul>
                </li> -->



                <li class="nav-item {{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.about-us.index') }}"><i data-feather="info"></i><span class="menu-title text-truncate" data-i18n="Dashboards">صفحة من نحن</span></a></li>

                <li class="nav-item {{ request()->routeIs('admin.services.*') || request()->routeIs('admin.related-service-pages.*') ? 'open' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.services.index') }}"><i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Invoice">صفحة الخدمات</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->routeIs('admin.services.index') || request()->routeIs('admin.services.edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.services.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كل الخدمات</span></a></li>
                        <li class="{{ request()->routeIs('admin.services.create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.services.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">إضافة خدمة جديدة</span></a></li>
                        <li class="{{ request()->routeIs('admin.related-service-pages.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.related-service-pages.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">صفحات الخدمات ذات الصلة</span></a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.products.*') || request()->routeIs('admin.product-categories.*') ? 'open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="codesandbox"></i><span class="menu-title text-truncate" data-i18n="Invoice">صفحة المنتجات</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->routeIs('admin.products.index') || request()->routeIs('admin.products.edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.products.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كل المنتجات</span></a></li>
                        <li class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.products.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">إضافة منتج جديد</span></a></li>
                        <li class="{{ request()->routeIs('admin.product-categories.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.product-categories.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">تصنيفات المنتجات</span></a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.blogs.*') || request()->routeIs('admin.blog-categories.*') ? 'open' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.blogs.index') }}"><i data-feather="trello"></i><span class="menu-title text-truncate" data-i18n="Invoice">صفحة المدونة</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->routeIs('admin.blogs.index') || request()->routeIs('admin.blogs.edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.blogs.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كل المقالات</span></a></li>
                        <li class="{{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.blogs.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">إضافة مقالة جديدة</span></a></li>
                        <li class="{{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.blog-categories.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">تصنيفات المدونة</span></a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.partners.*') ? 'open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Invoice">صفحة الشركاء</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->routeIs('admin.partners.index') || request()->routeIs('admin.partners.edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.partners.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كل الشركاء</span></a></li>
                        <li class="{{ request()->routeIs('admin.partners.create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.partners.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">إضافة شريك جديد</span></a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.projects.*') || request()->routeIs('admin.project-categories.*') ? 'open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="slack"></i><span class="menu-title text-truncate" data-i18n="Invoice">صفحة المشاريع</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->routeIs('admin.projects.index') || request()->routeIs('admin.projects.edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.projects.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كل المشاريع</span></a></li>
                        <li class="{{ request()->routeIs('admin.projects.create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.projects.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">إضافة مشروع جديدة</span></a></li>
                        <li class="{{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.project-categories.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate">تصنيفات المشاريع</span></a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.contact-submissions.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.contact-submissions.index') }}"><i data-feather="headphones"></i><span class="menu-title text-truncate" data-i18n="Dashboards">صفحة تواصل معنا</span></a></li>

                <li class="navigation-header"><span data-i18n="Forms &amp; Tables">الإعدادات</span><i data-feather="more-horizontal"></i></li>
                <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.settings.index') }}"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Dashboards">الإعدادات</span></a></li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-wrapper container-xxl">

            <div class="content-body">
                @yield('content')
            </div>
        </div>

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-dashboard/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- END: Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-dashboard/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-dashboard/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    @stack('scripts')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
