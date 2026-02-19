@extends('admin.layout')

@section('title', 'تعديل المقالة | لوحة الإدارة')
@section('page-title', 'تعديل المقالة')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" id="blog-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات المقالة</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mb-1">
                            <label class="form-label" for="title">العنوان <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required placeholder="عنوان المقالة">
                            @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="slug">الرابط (Slug)</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}" placeholder="يُولد تلقائياً من العنوان">
                            @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="category_id">التصنيف</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">— بدون تصنيف —</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $blog->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <label class="form-label" for="sort_order">ترتيب العرض</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $blog->sort_order) }}" min="0">
                            @error('sort_order')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-1">
                            <label class="form-label" for="published_at">تاريخ النشر</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', ($blog->published_at ?? $blog->created_at)->format('Y-m-d\TH:i')) }}">
                            @error('published_at')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="excerpt">المقتطف</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="2" placeholder="نبذة قصيرة تظهر في قائمة المقالات">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @error('excerpt')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="content_editor">المحتوى</label>
                            <input type="hidden" name="content" id="content">
                            <div id="content_editor" class="border rounded bg-white" style="min-height: 350px; direction: rtl;"></div>
                            @error('content')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="image">صورة المقالة</label>
                            @php
                                $imageUrl = $blog->image ? asset('storage/' . $blog->image) : '';
                            @endphp
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <div class="border rounded p-1" style="max-width: 120px;">
                                    <img src="{{ $imageUrl }}" alt="معاينة" class="img-fluid d-block" id="image_preview" style="max-height: 80px; object-fit: contain; {{ $imageUrl ? '' : 'display: none;' }}">
                                    <span id="no_preview" class="text-muted small" style="{{ $imageUrl ? 'display: none;' : '' }}">لا توجد صورة</span>
                                </div>
                                <div>
                                    <input type="file" class="form-control-file" name="image" id="image" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp">
                                    <p class="text-muted small mb-0 mt-50">JPG, PNG, GIF أو WebP. الحجم الأقصى 5 ميجا. اتركه فارغًا للإبقاء على الصورة الحالية.</p>
                                    @if($blog->image)
                                    <label class="mt-50 d-inline-block">
                                        <input type="checkbox" name="remove_image" value="1"> إزالة الصورة الحالية
                                    </label>
                                    @endif
                                </div>
                            </div>
                            @error('image')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1 d-flex align-items-end">
                            <div class="form-check">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">منشور (يظهر في الموقع)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                <i data-feather="save" class="mr-50"></i>
                حفظ التعديلات
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">إلغاء</a>
            <a href="{{ route('front.blogs.show', $blog) }}" target="_blank" class="btn btn-outline-info">عرض في الموقع</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var contentHidden = document.getElementById('content');
    var initialContent = {!! json_encode(old('content', $blog->content)) !!} || '';
    var quill = new Quill('#content_editor', {
        theme: 'snow',
        placeholder: 'محتوى المقالة...',
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
    document.getElementById('blog-form').addEventListener('submit', function() {
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
