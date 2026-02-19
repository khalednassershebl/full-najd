@extends('admin.layout')

@section('title', 'المشاريع | لوحة الإدارة')
@section('page-title', 'المشاريع')

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
                <h4 class="card-title mb-0">قائمة المشاريع</h4>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                    <i data-feather="plus" class="mr-50"></i>
                    إضافة مشروع
                </a>
            </div>
            <div class="card-body">
                @if(isset($categoryFilter) && $categoryFilter)
                <div class="alert alert-info alert-dismissible fade show py-1 mb-2" role="alert">
                    <span class="d-flex align-items-center">
                        <i data-feather="filter" class="mr-50" style="width: 18px; height: 18px;"></i>
                        عرض مشاريع تصنيف: <strong class="mx-1">{{ $categoryFilter->name }}</strong>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-primary mr-1">عرض الكل</a>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if($projects->isEmpty())
                <p class="text-muted mb-0">لا توجد مشاريع. <a href="{{ route('admin.projects.create') }}">إضافة مشروع</a></p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>التصنيف</th>
                                <th>الحالة</th>
                                <th>الترتيب</th>
                                <th style="width: 180px;">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="font-weight-bold">{{ Str::limit($project->title, 50) }}</a>
                                </td>
                                <td>{{ $project->projectCategory?->name ?? '—' }}</td>
                                <td>
                                    @if($project->is_published)
                                    <span class="badge badge-success">منشور</span>
                                    @else
                                    <span class="badge badge-secondary">مسودة</span>
                                    @endif
                                </td>
                                <td>{{ $project->sort_order }}</td>
                                <td>
                                    <a href="{{ route('front.projects.show', $project) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="عرض">عرض</a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشروع؟');">
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
                        عرض {{ $projects->firstItem() ?? 0 }} إلى {{ $projects->lastItem() ?? 0 }} من {{ $projects->total() }}
                    </div>
                    <div>
                        {{ $projects->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
