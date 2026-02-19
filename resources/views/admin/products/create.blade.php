@extends('admin.layout')

@section('title', 'إضافة منتج | لوحة الإدارة')
@section('page-title', 'إضافة منتج')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" id="product-form" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات المنتج</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-1">
                            <label class="form-label" for="title">العنوان <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="عنوان المنتج">
                            @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="slug">الرابط (Slug)</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="يُولد تلقائياً من العنوان">
                            @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="category_id">التصنيف (القطاع)</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">— بدون تصنيف —</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <label class="form-label" for="sort_order">ترتيب العرض</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                            @error('sort_order')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <div class="form-check mt-md-4 pt-1">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">منشور</label>
                            </div>
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="excerpt">المقتطف</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2" placeholder="نبذة قصيرة تظهر في البطاقة">{{ old('excerpt') }}</textarea>
                            @error('excerpt')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="demo_url">رابط عرض الديمو</label>
                            <input type="url" class="form-control" id="demo_url" name="demo_url" value="{{ old('demo_url') }}" placeholder="https://...">
                            @error('demo_url')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="content_editor">المحتوى</label>
                            <input type="hidden" name="content" id="content">
                            <div id="content_editor" class="border rounded bg-white" style="min-height: 250px; direction: rtl;"></div>
                            @error('content')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="image">صورة المنتج</label>
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <div class="border rounded p-1" style="max-width: 120px;">
                                    <img src="" alt="معاينة" class="img-fluid d-block" id="image_preview" style="max-height: 80px; object-fit: contain; display: none;">
                                    <span id="no_preview" class="text-muted small">لا توجد صورة</span>
                                </div>
                                <div>
                                    <input type="file" class="form-control-file" name="image" id="image" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp">
                                    <p class="text-muted small mb-0 mt-50">JPG, PNG, GIF أو WebP. الحجم الأقصى 5 ميجا.</p>
                                </div>
                            </div>
                            @error('image')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                <i data-feather="save" class="mr-50"></i>
                حفظ
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">إلغاء</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var contentHidden = document.getElementById('content');
    var initialContent = {!! json_encode(old('content')) !!} || '';
    var quill = new Quill('#content_editor', {
        theme: 'snow',
        placeholder: 'محتوى المنتج...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });
    quill.root.style.direction = 'rtl';
    quill.root.style.textAlign = 'right';
    if (initialContent) quill.root.innerHTML = initialContent;
    document.getElementById('product-form').addEventListener('submit', function() {
        contentHidden.value = quill.root.innerHTML;
    });

    var imageInput = document.getElementById('image');
    var imagePreview = document.getElementById('image_preview');
    var noPreview = document.getElementById('no_preview');
    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file && file.type.indexOf('image/') === 0) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    imagePreview.src = ev.target.result;
                    imagePreview.style.display = 'block';
                    if (noPreview) noPreview.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush
