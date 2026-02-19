@extends('admin.layout')

@section('title', 'تصنيفات المدونة | لوحة الإدارة')
@section('page-title', 'تصنيفات المدونة')

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
                <h4 class="card-title mb-0">قائمة التصنيفات</h4>
                <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
                    <i data-feather="plus" class="mr-50"></i>
                    إضافة تصنيف
                </a>
            </div>
            <div class="card-body">
                @if($categories->isEmpty())
                <p class="text-muted mb-0">لا توجد تصنيفات. <a href="{{ route('admin.blog-categories.create') }}">إضافة تصنيف</a></p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الرابط (Slug)</th>
                                <th>عدد المقالات</th>
                                <th>ترتيب العرض</th>
                                <th style="width: 180px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td>
                                    <span class="d-inline-flex align-items-center">
                                        {{ $category->blogs_count }}
                                        @if($category->blogs_count > 0)
                                        <a href="{{ route('admin.blogs.index', ['category_id' => $category->id]) }}" class="btn btn-icon btn-sm btn-outline-secondary mr-50 ml-1" title="عرض مقالات هذا التصنيف" aria-label="عرض المقالات">
                                            <i data-feather="eye" style="width: 16px; height: 16px;"></i>
                                        </a>
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $category->sort_order }}</td>
                                <td>
                                    <a href="{{ route('admin.blog-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا التصنيف؟ ستُزال التصنيف من المقالات المرتبطة.');">
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
                        عرض {{ $categories->firstItem() ?? 0 }} إلى {{ $categories->lastItem() ?? 0 }} من {{ $categories->total() }}
                    </div>
                    <div>{{ $categories->links() }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
