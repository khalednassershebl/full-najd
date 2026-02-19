@extends('admin.layout')

@section('title', 'إضافة صفحة خدمة ذات صلة | لوحة الإدارة')
@section('page-title', 'إضافة صفحة خدمة ذات صلة')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('admin.related-service-pages.store') }}" method="POST" id="related-page-form">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات الصفحة</h4>
                    <p class="text-muted small mb-0">كل صفحة لها رابط داخلي مثل: /services/related/اسم-الصفحة</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="title">العنوان <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="مثال: مواقع تجارة إلكترونية">
                            @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <label class="form-label" for="slug">الرابط (slug)</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="يُنشأ تلقائياً من العنوان">
                            @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <label class="form-label" for="sort_order">ترتيب العرض</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                            @error('sort_order')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="description">الوصف المختصر</label>
                            <textarea class="form-control" id="description" name="description" rows="2">{{ old('description') }}</textarea>
                            @error('description')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">نشط (يظهر في الروابط)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">محتوى الصفحة</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="page_content" id="page_content">
                    <div id="page_content_editor" class="border rounded bg-white" style="min-height: 300px; direction: rtl;"></div>
                    @error('page_content')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i data-feather="save" class="mr-50"></i>حفظ</button>
            <a href="{{ route('admin.related-service-pages.index') }}" class="btn btn-outline-secondary">إلغاء</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var hidden = document.getElementById('page_content');
    var initial = {!! json_encode(old('page_content')) !!} || '';
    var quill = new Quill('#page_content_editor', {
        theme: 'snow',
        placeholder: 'محتوى الصفحة...',
        modules: { toolbar: [[{ 'header': [1, 2, 3, false] }], ['bold', 'italic', 'underline'], [{ 'list': 'ordered'}, { 'list': 'bullet' }], ['link', 'image'], ['clean']] }
    });
    quill.root.style.direction = 'rtl';
    quill.root.style.textAlign = 'right';
    if (initial) quill.root.innerHTML = initial;
    document.getElementById('related-page-form').addEventListener('submit', function() { hidden.value = quill.root.innerHTML; });
});
</script>
@endpush
