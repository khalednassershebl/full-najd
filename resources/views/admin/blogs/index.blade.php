@extends('admin.layout')

@section('title', 'المدونة | لوحة الإدارة')
@section('page-title', 'المدونة')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="card-title mb-0">قائمة المقالات</h4>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                    <i data-feather="plus" class="mr-50"></i>
                    إضافة مقالة
                </a>
            </div>
            <div class="card-body">
                @if($categoryFilter)
                <div class="alert alert-info alert-dismissible fade show py-1 mb-2" role="alert">
                    <span class="d-flex align-items-center">
                        <i data-feather="filter" class="mr-50" style="width: 18px; height: 18px;"></i>
                        عرض مقالات تصنيف: <strong class="mx-1">{{ $categoryFilter->name }}</strong>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-outline-primary mr-1">عرض الكل</a>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if($blogs->isEmpty())
                <p class="text-muted mb-0">لا توجد مقالات. <a href="{{ route('admin.blogs.create') }}">إضافة مقالة</a></p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>التصنيف</th>
                                <th>الحالة</th>
                                <th>المشاهدات</th>
                                <th>التاريخ</th>
                                <th style="width: 180px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="font-weight-bold">{{ Str::limit($blog->title, 50) }}</a>
                                </td>
                                <td>{{ $blog->blogCategory?->name ?? '—' }}</td>
                                <td>
                                    @if($blog->is_published)
                                    <span class="badge badge-success">منشور</span>
                                    @else
                                    <span class="badge badge-secondary">مسودة</span>
                                    @endif
                                </td>
                                <td>{{ number_format($blog->views ?? 0) }}</td>
                                <td>{{ ($blog->published_at ?? $blog->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('front.blogs.show', $blog) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="عرض">عرض</a>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه المقالة؟');">
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

                <div class="d-flex flex-wrap justify-content-between align-items-center mt-2">
                    <div class="text-muted small">
                        عرض {{ $blogs->firstItem() ?? 0 }} إلى {{ $blogs->lastItem() ?? 0 }} من {{ $blogs->total() }}
                    </div>
                    <div>
                        {{ $blogs->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
