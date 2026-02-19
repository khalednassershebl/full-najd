@extends('admin.layout')

@section('title', 'إضافة تصنيف مشاريع | لوحة الإدارة')
@section('page-title', 'إضافة تصنيف مشاريع')

@section('content')
<form action="{{ route('admin.project-categories.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات التصنيف</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="name">الاسم <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="مثال: برمجة المواقع">
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="slug">الرابط (Slug)</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="يُولد تلقائياً من الاسم (يُستخدم للتصفية في الصفحة)">
                            @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-2 mb-1">
                            <label class="form-label" for="sort_order">ترتيب العرض</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                            @error('sort_order')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i data-feather="save" class="mr-50"></i>حفظ</button>
            <a href="{{ route('admin.project-categories.index') }}" class="btn btn-outline-secondary">إلغاء</a>
        </div>
    </div>
</form>
@endsection
