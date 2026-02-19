@extends('admin.layout')

@section('title', 'إضافة شريك | لوحة الإدارة')
@section('page-title', 'إضافة شريك')

@section('content')
<form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات الشريك</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="name">الاسم <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="اسم الشريك">
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="image">الصورة <span class="text-danger">*</span></label>
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <div class="border rounded p-1" style="max-width: 120px;">
                                    <img src="" alt="معاينة" class="img-fluid d-block" id="image_preview" style="max-height: 80px; object-fit: contain; display: none;">
                                    <span id="no_preview" class="text-muted small">لا توجد صورة</span>
                                </div>
                                <div>
                                    <input type="file" class="form-control-file" name="image" id="image" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp" required>
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
            <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary">إلغاء</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
