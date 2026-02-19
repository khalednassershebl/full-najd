@extends('admin.layout')

@section('title', 'الإعدادات | لوحة الإدارة')
@section('page-title', 'الإعدادات')

@php
    $g = $settings[$active_tab] ?? collect();
    $val = function($key, $default = '') use ($g) {
        $s = $g[$key] ?? null;
        return $s ? $s->value : $default;
    };
    $imgUrl = function($path) {
        if (!$path) return '';
        return (\Illuminate\Support\Str::startsWith($path, 'settings/') ? asset('storage/'.$path) : asset($path));
    };
    $jsonArr = function($key) use ($val) {
        $v = $val($key);
        if (is_string($v)) { $d = json_decode($v, true); return is_array($d) ? $d : []; }
        return is_array($v) ? $v : [];
    };
    $socialLinks = function() use ($val) {
        $v = $val('social_media_links');
        if (is_string($v)) { $d = json_decode($v, true); return is_array($d) ? $d : []; }
        return is_array($v) ? $v : [];
    };
@endphp

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $active_tab === 'logos' ? 'active' : '' }}" href="{{ route('admin.settings.index', ['tab' => 'logos']) }}">الشعارات والفافيكون</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active_tab === 'navbar' ? 'active' : '' }}" href="{{ route('admin.settings.index', ['tab' => 'navbar']) }}">الشريط والقائمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active_tab === 'footer' ? 'active' : '' }}" href="{{ route('admin.settings.index', ['tab' => 'footer']) }}">الفوتر</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active_tab === 'contacts' ? 'active' : '' }}" href="{{ route('admin.settings.index', ['tab' => 'contacts']) }}">جهات الاتصال</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active_tab === 'services_form' ? 'active' : '' }}" href="{{ route('admin.settings.index', ['tab' => 'services_form']) }}">قائمة الخدمات في النموذج</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active_tab === 'seo' ? 'active' : '' }}" href="{{ route('admin.settings.index', ['tab' => 'seo']) }}">إعدادات SEO</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        @if($active_tab === 'logos')
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="group" value="logos">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label">شعار الشريط (Navbar)</label>
                    @if($val('navbar_logo'))
                    <div class="mb-1"><img src="{{ $imgUrl($val('navbar_logo')) }}" alt="navbar logo" class="img-thumbnail" style="max-height:60px"></div>
                    <label class="d-block"><input type="checkbox" name="remove_navbar_logo" value="1"> حذف الصورة الحالية</label>
                    @endif
                    <input type="file" class="form-control" name="navbar_logo" accept="image/*">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">شعار القائمة الكبيرة (موبايل)</label>
                    @if($val('big_nav_logo'))
                    <div class="mb-1"><img src="{{ $imgUrl($val('big_nav_logo')) }}" alt="big nav logo" class="img-thumbnail" style="max-height:60px"></div>
                    <label class="d-block"><input type="checkbox" name="remove_big_nav_logo" value="1"> حذف الصورة الحالية</label>
                    @endif
                    <input type="file" class="form-control" name="big_nav_logo" accept="image/*">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">شعار الفوتر</label>
                    @if($val('footer_logo'))
                    <div class="mb-1"><img src="{{ $imgUrl($val('footer_logo')) }}" alt="footer logo" class="img-thumbnail" style="max-height:60px"></div>
                    <label class="d-block"><input type="checkbox" name="remove_footer_logo" value="1"> حذف الصورة الحالية</label>
                    @endif
                    <input type="file" class="form-control" name="footer_logo" accept="image/*">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">الفافيكون (PNG فقط)</label>
                    @if($val('favicon'))
                    <div class="mb-1"><img src="{{ $imgUrl($val('favicon')) }}" alt="favicon" class="img-thumbnail" style="max-height:32px"></div>
                    <label class="d-block"><input type="checkbox" name="remove_favicon" value="1"> حذف الصورة الحالية</label>
                    @endif
                    <input type="file" class="form-control" name="favicon" accept=".png,image/png">
                    <small class="text-muted">يُفضّل حجم 32×32 أو 16×16 بكسل</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        @endif

        @if($active_tab === 'navbar')
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="group" value="navbar">
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="navbar_enabled" name="navbar_enabled" value="1" {{ $val('navbar_enabled') == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="navbar_enabled">تفعيل الشريط العلوي</label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="mega_menu_enabled" name="mega_menu_enabled" value="1" {{ $val('mega_menu_enabled') == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="mega_menu_enabled">تفعيل القائمة الميجا</label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">محتوى القائمة الميجا</label>
                    <p class="text-muted small mb-2">أضف أعمدة (مثلاً: خدمات، من نحن) ثم داخل كل عمود أضف الروابط.</p>
                    <div id="mega-menu-columns">
                        @php
                            $megaData = $val('mega_menu_content');
                            $megaColumns = [];
                            if (is_string($megaData)) {
                                $decoded = json_decode($megaData, true);
                                $megaColumns = isset($decoded['columns']) && is_array($decoded['columns']) ? $decoded['columns'] : [];
                            } elseif (is_array($megaData) && isset($megaData['columns'])) {
                                $megaColumns = $megaData['columns'];
                            }
                        @endphp
                        @forelse($megaColumns as $colIndex => $col)
                        <div class="card mb-3 mega-menu-column" data-col-index="{{ $colIndex }}">
                            <div class="card-header py-2 d-flex align-items-center justify-content-between">
                                <input type="text" class="form-control form-control-sm w-auto" name="mega_menu_columns[{{ $colIndex }}][title]" value="{{ $col['title'] ?? '' }}" placeholder="عنوان العمود (مثال: خدمات)">
                                <button type="button" class="btn btn-sm btn-danger remove-mega-col">حذف العمود</button>
                            </div>
                            <div class="card-body py-2">
                                <label class="small text-muted">روابط هذا العمود</label>
                                <div class="mega-links-list">
                                    @foreach(($col['links'] ?? []) as $linkIndex => $link)
                                    <div class="input-group input-group-sm mb-2 mega-link-row">
                                        <input type="text" class="form-control" name="mega_menu_columns[{{ $colIndex }}][links][{{ $linkIndex }}][label]" value="{{ $link['label'] ?? '' }}" placeholder="النص">
                                        <input type="text" class="form-control" name="mega_menu_columns[{{ $colIndex }}][links][{{ $linkIndex }}][url]" value="{{ $link['url'] ?? '' }}" placeholder="الرابط">
                                        <div class="input-group-append"><button type="button" class="btn btn-outline-danger btn-sm remove-mega-link">حذف</button></div>
                                    </div>
                                    @endforeach
                                    <div class="input-group input-group-sm mb-2 mega-link-row">
                                        <input type="text" class="form-control" name="mega_menu_columns[{{ $colIndex }}][links][{{ count($col['links'] ?? []) }}][label]" placeholder="النص">
                                        <input type="text" class="form-control" name="mega_menu_columns[{{ $colIndex }}][links][{{ count($col['links'] ?? []) }}][url]" placeholder="الرابط">
                                        <div class="input-group-append"><button type="button" class="btn btn-outline-danger btn-sm remove-mega-link">حذف</button></div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-sm add-mega-link">+ إضافة رابط</button>
                            </div>
                        </div>
                        @empty
                        <div class="card mb-3 mega-menu-column" data-col-index="0">
                            <div class="card-header py-2 d-flex align-items-center justify-content-between">
                                <input type="text" class="form-control form-control-sm w-auto" name="mega_menu_columns[0][title]" placeholder="عنوان العمود (مثال: خدمات)">
                                <button type="button" class="btn btn-sm btn-danger remove-mega-col">حذف العمود</button>
                            </div>
                            <div class="card-body py-2">
                                <label class="small text-muted">روابط هذا العمود</label>
                                <div class="mega-links-list">
                                    <div class="input-group input-group-sm mb-2 mega-link-row">
                                        <input type="text" class="form-control" name="mega_menu_columns[0][links][0][label]" placeholder="النص">
                                        <input type="text" class="form-control" name="mega_menu_columns[0][links][0][url]" placeholder="الرابط">
                                        <div class="input-group-append"><button type="button" class="btn btn-outline-danger btn-sm remove-mega-link">حذف</button></div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-sm add-mega-link">+ إضافة رابط</button>
                            </div>
                        </div>
                        @endforelse
                        <div class="card mb-3 mega-menu-column d-none" id="mega-column-template" data-col-index="__INDEX__">
                            <div class="card-header py-2 d-flex align-items-center justify-content-between">
                                <input type="text" class="form-control form-control-sm w-auto" name="mega_menu_columns[__INDEX__][title]" placeholder="عنوان العمود">
                                <button type="button" class="btn btn-sm btn-danger remove-mega-col">حذف العمود</button>
                            </div>
                            <div class="card-body py-2">
                                <label class="small text-muted">روابط هذا العمود</label>
                                <div class="mega-links-list">
                                    <div class="input-group input-group-sm mb-2 mega-link-row">
                                        <input type="text" class="form-control" name="mega_menu_columns[__INDEX__][links][0][label]" placeholder="النص">
                                        <input type="text" class="form-control" name="mega_menu_columns[__INDEX__][links][0][url]" placeholder="الرابط">
                                        <div class="input-group-append"><button type="button" class="btn btn-outline-danger btn-sm remove-mega-link">حذف</button></div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-sm add-mega-link">+ إضافة رابط</button>
                            </div>
                        </div>
                        <div id="mega-link-row-tpl" class="d-none">
                            <div class="input-group input-group-sm mb-2 mega-link-row">
                                <input type="text" class="form-control" name="mega_menu_columns[__COL__][links][__LINK__][label]" placeholder="النص">
                                <input type="text" class="form-control" name="mega_menu_columns[__COL__][links][__LINK__][url]" placeholder="الرابط">
                                <div class="input-group-append"><button type="button" class="btn btn-outline-danger btn-sm remove-mega-link">حذف</button></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm" id="add-mega-column">+ عمود جديد</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        @endif

        @if($active_tab === 'footer')
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="group" value="footer">
            <div class="row">
                <div class="col-12 mb-2">
                    <label class="form-label">وصف الفوتر</label>
                    <textarea class="form-control" name="description" rows="3">{{ $val('description') }}</textarea>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">روابط الفوتر</label>
                    <div id="footer-links-repeater" class="repeater-group">
                        @php $footerLinks = $jsonArr('links'); @endphp
                        @forelse($footerLinks as $link)
                        <div class="input-group mb-2 repeater-row">
                            <input type="text" class="form-control" name="links[][label]" value="{{ $link['label'] ?? '' }}" placeholder="النص (مثال: الرئيسية)">
                            <input type="text" class="form-control" name="links[][url]" value="{{ $link['url'] ?? '' }}" placeholder="الرابط (مثال: / أو #hero)">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        @empty
                        <div class="input-group mb-2 repeater-row">
                            <input type="text" class="form-control" name="links[][label]" placeholder="النص">
                            <input type="text" class="form-control" name="links[][url]" placeholder="الرابط">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        @endforelse
                        <div class="input-group mb-2 repeater-row repeater-template d-none" id="footer-link-tpl">
                            <input type="text" class="form-control" name="links[][label]" placeholder="النص">
                            <input type="text" class="form-control" name="links[][url]" placeholder="الرابط">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="add-footer-link">+ إضافة رابط</button>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">الحلول في الفوتر</label>
                    <div id="footer-solutions-repeater" class="repeater-group">
                        @php $footerSols = $jsonArr('solutions'); @endphp
                        @forelse($footerSols as $sol)
                        <div class="input-group mb-2 repeater-row">
                            <input type="text" class="form-control" name="solutions[][title]" value="{{ $sol['title'] ?? '' }}" placeholder="العنوان">
                            <input type="text" class="form-control" name="solutions[][url]" value="{{ $sol['url'] ?? '' }}" placeholder="الرابط">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        @empty
                        <div class="input-group mb-2 repeater-row">
                            <input type="text" class="form-control" name="solutions[][title]" placeholder="العنوان">
                            <input type="text" class="form-control" name="solutions[][url]" placeholder="الرابط">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        @endforelse
                        <div class="input-group mb-2 repeater-row repeater-template d-none" id="footer-solution-tpl">
                            <input type="text" class="form-control" name="solutions[][title]" placeholder="العنوان">
                            <input type="text" class="form-control" name="solutions[][url]" placeholder="الرابط">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="add-footer-solution">+ إضافة حل</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        @endif

        @if($active_tab === 'contacts')
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="group" value="contacts">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label">رقم الهاتف</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $val('phone')) }}" placeholder="+966...">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">رقم واتساب</label>
                    <input type="text" class="form-control" name="whatsapp_number" value="{{ old('whatsapp_number', $val('whatsapp_number')) }}" placeholder="966...">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $val('email')) }}">
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">العنوان</label>
                    <textarea class="form-control" name="address" rows="2">{{ old('address', $val('address')) }}</textarea>
                </div>
                @php $social = $socialLinks(); @endphp
                <div class="col-12 mb-2">
                    <label class="form-label">روابط السوشيال ميديا</label>
                    <div class="row">
                        <div class="col-md-6 mb-1"><label class="small">Facebook</label><input type="url" class="form-control" name="social_media_links[facebook]" value="{{ $social['facebook'] ?? '' }}" placeholder="https://facebook.com/..."></div>
                        <div class="col-md-6 mb-1"><label class="small">Instagram</label><input type="url" class="form-control" name="social_media_links[instagram]" value="{{ $social['instagram'] ?? '' }}" placeholder="https://instagram.com/..."></div>
                        <div class="col-md-6 mb-1"><label class="small">Twitter / X</label><input type="url" class="form-control" name="social_media_links[twitter]" value="{{ $social['twitter'] ?? '' }}" placeholder="https://twitter.com/..."></div>
                        <div class="col-md-6 mb-1"><label class="small">LinkedIn</label><input type="url" class="form-control" name="social_media_links[linkedin]" value="{{ $social['linkedin'] ?? '' }}" placeholder="https://linkedin.com/..."></div>
                        <div class="col-md-6 mb-1"><label class="small">TikTok</label><input type="url" class="form-control" name="social_media_links[tiktok]" value="{{ $social['tiktok'] ?? '' }}" placeholder="https://tiktok.com/..."></div>
                        <div class="col-md-6 mb-1"><label class="small">YouTube</label><input type="url" class="form-control" name="social_media_links[youtube]" value="{{ $social['youtube'] ?? '' }}" placeholder="https://youtube.com/..."></div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">خريطة (كود التضمين iframe أو رابط)</label>
                    <textarea class="form-control" name="map_embed" rows="4" placeholder="<iframe ... أو رابط Google Maps">{{ old('map_embed', $val('map_embed')) }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        @endif

        @if($active_tab === 'services_form')
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="group" value="services_form">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label">نص قائمة الخدمات (Label)</label>
                    <input type="text" class="form-control" name="select_label" value="{{ old('select_label', $val('select_label', 'اختر الخدمة')) }}">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">النص التوضيحي (Placeholder)</label>
                    <input type="text" class="form-control" name="select_placeholder" value="{{ old('select_placeholder', $val('select_placeholder')) }}">
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">خيارات الخدمات (تظهر في قائمة النموذج)</label>
                    <div id="service-options-repeater" class="repeater-group">
                        @php $serviceOpts = $jsonArr('service_options'); @endphp
                        @forelse($serviceOpts as $opt)
                        <div class="input-group mb-2 repeater-row">
                            <input type="text" class="form-control" name="service_options[][value]" value="{{ $opt['value'] ?? '' }}" placeholder="القيمة (مثال: consultation)">
                            <input type="text" class="form-control" name="service_options[][label]" value="{{ $opt['label'] ?? '' }}" placeholder="النص المعروض (مثال: استشارة مجانية)">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        @empty
                        <div class="input-group mb-2 repeater-row">
                            <input type="text" class="form-control" name="service_options[][value]" placeholder="القيمة">
                            <input type="text" class="form-control" name="service_options[][label]" placeholder="النص المعروض">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        @endforelse
                        <div class="input-group mb-2 repeater-row repeater-template d-none" id="service-option-tpl">
                            <input type="text" class="form-control" name="service_options[][value]" placeholder="القيمة">
                            <input type="text" class="form-control" name="service_options[][label]" placeholder="النص المعروض">
                            <div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-row">حذف</button></div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="add-service-option">+ إضافة خيار</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        @endif

        @if($active_tab === 'seo')
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="group" value="seo">
            <div class="row">
                <div class="col-12 mb-2">
                    <label class="form-label">Meta Title (افتراضي)</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $val('meta_title')) }}" maxlength="255">
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="2">{{ old('meta_description', $val('meta_description')) }}</textarea>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords', $val('meta_keywords')) }}" placeholder="كلمة1, كلمة2, ...">
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">OG Image (صورة المشاركة)</label>
                    @if($val('og_image'))
                    <div class="mb-1"><img src="{{ $imgUrl($val('og_image')) }}" alt="og" class="img-thumbnail" style="max-height:80px"></div>
                    <label class="d-block"><input type="checkbox" name="remove_og_image" value="1"> حذف الصورة الحالية</label>
                    @endif
                    <input type="file" class="form-control" name="og_image" accept="image/*">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">OG Title</label>
                    <input type="text" class="form-control" name="og_title" value="{{ old('og_title', $val('og_title')) }}">
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">OG Description</label>
                    <textarea class="form-control" name="og_description" rows="2">{{ old('og_description', $val('og_description')) }}</textarea>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">Twitter Card</label>
                    <input type="text" class="form-control" name="twitter_card" value="{{ old('twitter_card', $val('twitter_card', 'summary_large_image')) }}" placeholder="summary_large_image">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">الرابط الأساسي (Canonical Base URL)</label>
                    <input type="url" class="form-control" name="canonical_base" value="{{ old('canonical_base', $val('canonical_base')) }}" placeholder="https://example.com">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        @endif
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function onRemoveRow(e) {
        var row = e.target.closest('.repeater-row');
        if (!row || row.classList.contains('repeater-template')) return;
        var group = row.closest('.repeater-group');
        if (group && group.querySelectorAll('.repeater-row:not(.repeater-template)').length > 1) row.remove();
    }
    function addRow(templateId) {
        var tpl = document.getElementById(templateId);
        if (!tpl) return;
        var clone = tpl.cloneNode(true);
        clone.classList.remove('d-none', 'repeater-template');
        clone.id = '';
        tpl.parentNode.insertBefore(clone, tpl);
    }
    document.querySelectorAll('.remove-row').forEach(function(btn) {
        btn.addEventListener('click', onRemoveRow);
    });
    document.body.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) onRemoveRow(e);
    });
    var addFooterLink = document.getElementById('add-footer-link');
    if (addFooterLink) addFooterLink.addEventListener('click', function() { addRow('footer-link-tpl'); });
    var addFooterSolution = document.getElementById('add-footer-solution');
    if (addFooterSolution) addFooterSolution.addEventListener('click', function() { addRow('footer-solution-tpl'); });
    var addServiceOption = document.getElementById('add-service-option');
    if (addServiceOption) addServiceOption.addEventListener('click', function() { addRow('service-option-tpl'); });

    // Mega menu: add column
    var addMegaColumn = document.getElementById('add-mega-column');
    var megaColumnTpl = document.getElementById('mega-column-template');
    var megaLinkRowTpl = document.getElementById('mega-link-row-tpl');
    if (addMegaColumn && megaColumnTpl) {
        addMegaColumn.addEventListener('click', function() {
            var container = document.getElementById('mega-menu-columns');
            var cols = container.querySelectorAll('.mega-menu-column:not(#mega-column-template)');
            var nextIndex = cols.length;
            var clone = megaColumnTpl.cloneNode(true);
            clone.id = '';
            clone.classList.remove('d-none');
            clone.dataset.colIndex = nextIndex;
            clone.querySelectorAll('[name]').forEach(function(el) {
                el.name = el.name.replace(/__INDEX__/g, nextIndex);
            });
            container.insertBefore(clone, megaColumnTpl);
            clone.querySelectorAll('.remove-mega-col').forEach(function(b) { b.onclick = onRemoveMegaCol; });
            clone.querySelectorAll('.add-mega-link').forEach(function(b) { b.onclick = onAddMegaLink; });
            clone.querySelectorAll('.remove-mega-link').forEach(function(b) { b.onclick = onRemoveMegaLink; });
        });
    }
    function onRemoveMegaCol(e) {
        var col = e.target.closest('.mega-menu-column');
        if (!col || col.id === 'mega-column-template') return;
        var container = document.getElementById('mega-menu-columns');
        var cols = container.querySelectorAll('.mega-menu-column:not(#mega-column-template)');
        if (cols.length <= 1) return;
        col.remove();
        reindexMegaColumns();
    }
    function onAddMegaLink(e) {
        var col = e.target.closest('.mega-menu-column');
        if (!col || !megaLinkRowTpl) return;
        var colIndex = col.dataset.colIndex;
        var list = col.querySelector('.mega-links-list');
        var linkRows = list.querySelectorAll('.mega-link-row');
        var linkIndex = linkRows.length;
        var clone = megaLinkRowTpl.firstElementChild.cloneNode(true);
        clone.querySelectorAll('[name]').forEach(function(el) {
            el.name = el.name.replace(/__COL__/g, colIndex).replace(/__LINK__/g, linkIndex);
            el.value = '';
        });
        list.appendChild(clone);
        clone.querySelector('.remove-mega-link').onclick = onRemoveMegaLink;
    }
    function onRemoveMegaLink(e) {
        var row = e.target.closest('.mega-link-row');
        if (!row) return;
        var list = row.closest('.mega-links-list');
        if (list && list.querySelectorAll('.mega-link-row').length <= 1) return;
        row.remove();
        reindexMegaColumns();
    }
    function reindexMegaColumns() {
        var container = document.getElementById('mega-menu-columns');
        if (!container) return;
        var cols = container.querySelectorAll('.mega-menu-column:not(#mega-column-template)');
        cols.forEach(function(col, colIdx) {
            col.dataset.colIndex = colIdx;
            col.querySelectorAll('[name^="mega_menu_columns["]').forEach(function(el) {
                el.name = el.name.replace(/^mega_menu_columns\[\d+\]/, 'mega_menu_columns[' + colIdx + ']');
            });
            var linkRows = col.querySelectorAll('.mega-link-row');
            linkRows.forEach(function(row, linkIdx) {
                row.querySelectorAll('[name*="[links]["]').forEach(function(el) {
                    el.name = el.name.replace(/\[links\]\[\d+\]/, '[links][' + linkIdx + ']');
                });
            });
        });
    }
    document.body.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-mega-col')) onRemoveMegaCol(e);
        if (e.target.classList.contains('remove-mega-link')) onRemoveMegaLink(e);
    });
    document.querySelectorAll('.add-mega-link').forEach(function(b) { b.onclick = onAddMegaLink; });
    document.querySelectorAll('.remove-mega-col').forEach(function(b) { b.onclick = onRemoveMegaCol; });
    document.querySelectorAll('.remove-mega-link').forEach(function(b) { b.onclick = onRemoveMegaLink; });
});
</script>
@endpush
@endsection
