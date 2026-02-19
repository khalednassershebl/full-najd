@extends('admin.layout')

@section('title', 'إضافة خدمة | لوحة الإدارة')
@section('page-title', 'إضافة خدمة')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('admin.services.store') }}" method="POST" id="service-form">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">بيانات الخدمة</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="title">العنوان <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="عنوان الخدمة">
                            @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="sort_order">ترتيب العرض</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" placeholder="0">
                            @error('sort_order')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="description">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="وصف الخدمة">{{ old('description') }}</textarea>
                            @error('description')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <label class="form-label" for="icon_svg">أيقونة SVG (اختياري)</label>
                            <textarea class="form-control font-monospace" id="icon_svg" name="icon_svg" rows="6" placeholder="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot;>...</svg>">{{ old('icon_svg') }}</textarea>
                            <p class="text-muted small mb-0">أدخل كود SVG الكامل للأيقونة. يظهر في الصفحة الرئيسية وصفحة الخدمات.</p>
                            @error('icon_svg')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">الخدمة نشطة (تظهر في الموقع)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">خدمات ذات صلة</h4>
                    <p class="text-muted small mb-0">تظهر في صفحة الخدمات فقط (قائمة الخدمات) تحت كل بطاقة خدمة. اختر الخدمات المرتبطة بهذه الخدمة.</p>
                </div>
                <div class="card-body">
                    @php $relatedIds = old('related_services', []); @endphp
                    @if(($allServices ?? collect())->isEmpty())
                        <p class="text-muted mb-0">لا توجد خدمات أخرى بعد. أضف الخدمات أولاً ثم عد هنا لتعديل الخدمة وربطها بغيرها.</p>
                    @else
                        <div class="row">
                            @foreach($allServices ?? [] as $s)
                            <div class="col-md-6 col-lg-4 mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="related_services[]" value="{{ $s->id }}" id="rel_{{ $s->id }}" {{ in_array($s->id, $relatedIds) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="rel_{{ $s->id }}">{{ $s->title }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                    <hr class="my-2">
                    <h5 class="mb-1">صفحات الخدمات ذات الصلة</h5>
                    <p class="text-muted small mb-1">اختر صفحات ذات صلة (كل صفحة لها رابطها الداخلي). أنشئها من <a href="{{ route('admin.related-service-pages.index') }}" target="_blank">صفحات الخدمات ذات الصلة</a>.</p>
                    @php $relatedPageIds = old('related_service_pages', []); @endphp
                    @if(($relatedServicePages ?? collect())->isEmpty())
                        <p class="text-muted mb-0">لا توجد صفحات ذات صلة. <a href="{{ route('admin.related-service-pages.create') }}">إنشاء صفحة جديدة</a></p>
                    @else
                        <div class="row">
                            @foreach($relatedServicePages ?? [] as $rp)
                            <div class="col-md-6 col-lg-4 mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="related_service_pages[]" value="{{ $rp->id }}" id="rsp_{{ $rp->id }}" {{ in_array($rp->id, $relatedPageIds) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="rsp_{{ $rp->id }}">{{ $rp->title }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">محتوى صفحة الخدمة (صفحة تفاصيل الخدمة)</h4>
                    <p class="text-muted small mb-0">المحتوى المعروض في صفحة الخدمة المفردة عند النقر على "استكشف ماذا نقدم" أو من قائمة الخدمات.</p>
                </div>
                <div class="card-body">
                    <input type="hidden" name="page_content" id="page_content">
                    <div id="page_content_editor" class="border rounded bg-white" style="min-height: 350px; direction: rtl;"></div>
                    @error('page_content')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                <i data-feather="save" class="mr-50"></i>
                حفظ
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">إلغاء</a>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var hiddenInput = document.getElementById('page_content');
    var initialContent = {!! json_encode(old('page_content')) !!} || '';

    var quill = new Quill('#page_content_editor', {
        theme: 'snow',
        placeholder: 'اكتب محتوى صفحة الخدمة هنا...',
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
    if (initialContent) quill.root.innerHTML = initialContent;

    document.getElementById('service-form').addEventListener('submit', function() {
        hiddenInput.value = quill.root.innerHTML;
    });
});
</script>
@endpush
