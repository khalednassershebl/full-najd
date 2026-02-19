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
    <title>صفحة تسجيل الدخول - لوحة الإدارة</title>
    <link rel="apple-touch-icon" href="{{ asset('admin-dashboard/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-dashboard/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/pages/page-auth.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/assets/css/style-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-dashboard/assets/css/admin-theme.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo d-flex align-items-center">
                                    <img src="{{ asset('admin-dashboard/app-assets/images/logo.png') }}" alt="لوحة الإدارة" height="32" class="mr-1">
                                    <h2 class="brand-text text-primary mb-0">لوحة الإدارة</h2>
                                </a>

                                <h4 class="card-title mb-1">مرحباً بك! 👋</h4>
                                <p class="card-text mb-2">يرجى تسجيل الدخول إلى حسابك لبدء الإدارة</p>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class="alert-body">
                                            @foreach ($errors->all() as $error)
                                                <span>{{ $error }}</span>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
                                    </div>
                                @endif

                                <form class="auth-login-form mt-2" action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" aria-describedby="email" tabindex="1" autofocus />
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">كلمة المرور</label>
                                            <a href="javascript:void(0);">
                                                <small>نسيت كلمة المرور؟</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="remember" name="remember" tabindex="3" {{ old('remember') ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="remember"> تذكرني </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">تسجيل الدخول</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>العودة إلى</span>
                                    <a href="{{ url('/') }}">
                                        <span>الموقع</span>
                                    </a>
                                </p>


                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-dashboard/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-dashboard/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-dashboard/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-dashboard/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-dashboard/app-assets/js/scripts/pages/page-auth-login.js') }}"></script>
    <!-- END: Page JS-->

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