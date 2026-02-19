@extends('admin.layout')

@section('title', 'صفحات الخدمات ذات الصلة | لوحة الإدارة')
@section('page-title', 'صفحات الخدمات ذات الصلة')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="card-title mb-0">قائمة صفحات الخدمات ذات الصلة</h4>
                <a href="{{ route('admin.related-service-pages.create') }}" class="btn btn-primary">
                    <i data-feather="plus" class="mr-50"></i>
                    إضافة صفحة جديدة
                </a>
            </div>
            <div class="card-body">
                <p class="text-muted small">كل صفحة لها رابط خاص بها (بدون روابط خارجية). تربطها بالخدمات من خلال تعديل الخدمة واختيار "صفحات الخدمات ذات الصلة".</p>
                @if($pages->isEmpty())
                <p class="text-muted mb-0">لا توجد صفحات. <a href="{{ route('admin.related-service-pages.create') }}">إضافة صفحة</a></p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>الرابط (slug)</th>
                                <th>الحالة</th>
                                <th style="width: 180px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td><code>/services/related/{{ $page->slug }}</code></td>
                                <td>
                                    @if($page->is_active)
                                    <span class="badge badge-success">نشط</span>
                                    @else
                                    <span class="badge badge-secondary">غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.related-service-pages.edit', $page) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    <form action="{{ route('admin.related-service-pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <div class="text-muted small">عرض {{ $pages->firstItem() ?? 0 }} إلى {{ $pages->lastItem() ?? 0 }} من {{ $pages->total() }}</div>
                    {{ $pages->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
