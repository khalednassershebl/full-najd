@extends('admin.layout')

@section('title', 'تحرير من نحن | لوحة الإدارة')
@section('page-title', 'تحرير من نحن')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form action="{{ route('admin.about-us.update') }}" method="POST" id="about-us-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <!-- سكشن من نحن - الصفحة الرئيسية -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">سكشن من نحن (الصفحة الرئيسية)</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <label class="form-label" for="home_section_label">عنوان السكشن (قصتنا)</label>
                            <input type="text" class="form-control" id="home_section_label" name="home_section_label" value="{{ old('home_section_label', $aboutUs->home_section_label) }}" placeholder="قصتنا">
                            @error('home_section_label')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="home_section_heading">العنوان الرئيسي (سطرين مفصولين بمسافة)</label>
                            <textarea class="form-control" id="home_section_heading" name="home_section_heading" rows="2" placeholder="فريق عمل متكامل / خبراء في الإدارة والتقنية">{{ old('home_section_heading', $aboutUs->home_section_heading) }}</textarea>
                            @error('home_section_heading')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="home_section_description">النص الوصفي</label>
                            <textarea class="form-control" id="home_section_description" name="home_section_description" rows="4">{{ old('home_section_description', $aboutUs->home_section_description) }}</textarea>
                            @error('home_section_description')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="home_vision_title">عنوان الرؤية</label>
                            <input type="text" class="form-control" name="home_vision_title" value="{{ old('home_vision_title', $aboutUs->home_vision_title) }}" placeholder="رؤيتنا">
                            @error('home_vision_title')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="home_values_title">عنوان القيم</label>
                            <input type="text" class="form-control" name="home_values_title" value="{{ old('home_values_title', $aboutUs->home_values_title) }}" placeholder="قيمنا">
                            @error('home_values_title')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 mb-1">
                            <label class="form-label" for="home_vision_text">نص الرؤية</label>
                            <textarea class="form-control" name="home_vision_text" rows="2">{{ old('home_vision_text', $aboutUs->home_vision_text) }}</textarea>
                            @error('home_vision_text')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 mb-1">
                            <label class="form-label" for="home_values_text">نص القيم</label>
                            <textarea class="form-control" name="home_values_text" rows="2">{{ old('home_values_text', $aboutUs->home_values_text) }}</textarea>
                            @error('home_values_text')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label">الميزة 1</label>
                            <input type="text" class="form-control" name="home_feature_1" value="{{ old('home_feature_1', $aboutUs->home_feature_1) }}" placeholder="خبرة متخصصة">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label">الميزة 2</label>
                            <input type="text" class="form-control" name="home_feature_2" value="{{ old('home_feature_2', $aboutUs->home_feature_2) }}" placeholder="حلول مبتكرة">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label">الميزة 3</label>
                            <input type="text" class="form-control" name="home_feature_3" value="{{ old('home_feature_3', $aboutUs->home_feature_3) }}" placeholder="دعم مستمر">
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label">صورة سكشن من نحن (الصفحة الرئيسية)</label>
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                @php
                                    $sectionImageUrl = $aboutUs->home_section_image
                                        ? asset('storage/' . $aboutUs->home_section_image)
                                        : asset('nagd-front/assets/images/about.jpg');
                                @endphp
                                <div class="about-section-image-preview border rounded p-1" style="max-width: 200px;">
                                    <img src="{{ $sectionImageUrl }}" alt="معاينة" class="img-fluid d-block" id="home_section_image_preview" style="max-height: 140px; object-fit: cover;">
                                </div>
                                <div>
                                    <input type="file" class="form-control-file" name="home_section_image" id="home_section_image" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp">
                                    <p class="text-muted small mb-0 mt-50">JPG, PNG, GIF أو WebP. الحجم الأقصى 5 ميجا.</p>
                                    @if($aboutUs->home_section_image)
                                    <label class="mt-50 d-inline-block">
                                        <input type="checkbox" name="remove_home_section_image" value="1"> إزالة الصورة الحالية
                                    </label>
                                    @endif
                                </div>
                            </div>
                            @error('home_section_image')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- محتوى صفحة من نحن (صفحة about) -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">محتوى صفحة من نحن (صفحة عن نجد)</h4>
                    <p class="text-muted small mb-0">استخدم المحرر أدناه لتعديل المحتوى المعروض في صفحة "من نحن" (/who-we-are/about).</p>
                </div>
                <div class="card-body">
                    <input type="hidden" name="about_page_content" id="about_page_content">
                    <div id="about_page_editor" class="border rounded bg-white" style="min-height: 400px; direction: rtl;"></div>
                    @error('about_page_content')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                <i data-feather="save" class="mr-50"></i>
                حفظ التعديلات
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">إلغاء</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview for about section image
    var imageInput = document.getElementById('home_section_image');
    var imagePreview = document.getElementById('home_section_image_preview');
    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file && file.type.indexOf('image/') === 0) {
                var reader = new FileReader();
                reader.onload = function(ev) { imagePreview.src = ev.target.result; };
                reader.readAsDataURL(file);
            }
        });
    }
    var hiddenInput = document.getElementById('about_page_content');
    var initialContent = {!! json_encode(old('about_page_content', $aboutUs->about_page_content)) !!} || '';

    var quill = new Quill('#about_page_editor', {
        theme: 'snow',
        placeholder: 'اكتب محتوى صفحة من نحن هنا...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    quill.root.style.direction = 'rtl';
    quill.root.style.textAlign = 'right';
    if (initialContent) {
        quill.root.innerHTML = initialContent;
    }

    document.getElementById('about-us-form').addEventListener('submit', function() {
        hiddenInput.value = quill.root.innerHTML;
    });
});
</script>
@endpush
