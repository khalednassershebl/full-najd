@extends('admin.layout')

@section('title', 'الرئيسية | لوحة الإدارة')
@section('page-title', 'الرئيسية')

@section('content')
<!-- Main section cards -->
<section id="main-cards" class="mb-3">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <a href="{{ route('admin.services.index') }}">
                    <div class="card-body">
                        <div class="mb-1"><i data-feather="box" class="text-primary" ></i></div>
                        <h2 class="font-weight-bolder mb-0">{{ $servicesCount }}</h2>
                        <p class="card-text mb-0">الخدمات</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <a href="{{ route('admin.products.index') }}">
                    <div class="card-body">
                        <div class="mb-1"><i data-feather="codesandbox" class="text-primary" ></i></div>
                        <h2 class="font-weight-bolder mb-0">{{ $productsCount }}</h2>
                        <p class="card-text mb-0">المنتجات</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <a href="{{ route('admin.blogs.index') }}">
                    <div class="card-body">
                        <div class="mb-1"><i data-feather="trello" class="text-primary" ></i></div>
                        <h2 class="font-weight-bolder mb-0">{{ $blogsCount }}</h2>
                        <p class="card-text mb-0">المدونة</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <a href="{{ route('admin.partners.index') }}">
                    <div class="card-body">
                        <div class="mb-1"><i data-feather="users" class="text-primary" ></i></div>
                        <h2 class="font-weight-bolder mb-0">{{ $partnersCount }}</h2>
                        <p class="card-text mb-0">الشركاء</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <a href="{{ route('admin.projects.index') }}">
                    <div class="card-body">
                        <div class="mb-1"><i data-feather="slack" class="text-primary" ></i></div>
                        <h2 class="font-weight-bolder mb-0">{{ $projectsCount }}</h2>
                        <p class="card-text mb-0">المشاريع</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <a href="{{ route('admin.contact-submissions.index') }}">
                    <div class="card-body">
                        <div class="mb-1"><i data-feather="mail" class="text-primary" ></i></div>
                        <h2 class="font-weight-bolder mb-0">{{ $contactSubmissionsCount }}</h2>
                        <p class="card-text mb-0">رسائل التواصل</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!--/ Main section cards -->
@endsection
