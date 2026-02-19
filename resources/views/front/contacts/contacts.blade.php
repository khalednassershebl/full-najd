<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Main Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Important Meta Tags -->
    <meta name="author" content="{{ $site['seo']['meta_title'] ?? '' }}" />
    <meta name="description" content="{{ $site['seo']['meta_description'] ?? '' }}">
    <meta name="keywords" content="{{ $site['seo']['meta_keywords'] ?? '' }}">

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('nagd-front/assets/scss/libs/bootstrap.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('nagd-front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>{{ $site['seo']['meta_title'] ?? 'تواصل معنا' }} - تواصل معنا</title>
    <link rel="shortcut icon" href="{{ $site['logos']['favicon_url'] ?? asset('nagd-front/assets/images/logos/icon.png') }}" />

</head>

<body>

    @include('front.partials.navbar', ['navbarPageLayout' => true])

            <div class="container">

                <div class="index-header-content">
                    <div class="index-header-content-details">
                        <div class="index-header-head-social">
                            <h1>اتصل بـنجد لحلول الأعمال</h1>
                        </div>
                        <div class="header-bottom-info">
                            <div class="text-button">
                                <p>تُمثل نجد المتكاملة نهجًا احترافيًا متكاملًا في مجال المقاولات. نجمع بين الخبرة الهندسية والكفاءة التشغيلية .

                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="contacts-page">
            <div class="contact-section">
                <div class="container">
                    <!-- Contact Section Header -->
                    <div class="index-section-header-center wow animate__animated animate__fadeInUp">
                        <div class="index-section-header-head">
                            <span>تواصل معنا</span>
                            <h3>نحن هنا لمساعدتك في تحقيق أهدافك</h3>
                        </div>
                        <p class="text">نحن متحمسون لسماع أفكارك ومشاريعك. تواصل معنا اليوم وابدأ رحلتك نحو النجاح مع فريقنا المحترف.</p>
                    </div>

                    <!-- Contact Information Cards -->
                    <div class="contact-info-cards">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="contact-info-card wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                    <div class="contact-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                        </svg>
                                    </div>
                                    <h4>العنوان</h4>
                                    <a href="#">{{ $site['contacts']['address'] ?? 'السعودية - الرياض - شارع الخليفة' }}</a>
                                    <p>مقر الشركة الوحيد في السعودية</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="contact-info-card wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                    <div class="contact-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                        </svg>
                                    </div>
                                    <h4>الهاتف</h4>
                                    <a href="tel:{{ preg_replace('/\s+/', '', $site['contacts']['phone'] ?? '') }}" style="direction: ltr;">{{ $site['contacts']['phone'] ?? '(+20) 1007056732' }}</a>
                                    <p>تواصل معنا للدعم & الاستشارات 24/7</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="contact-info-card wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                    <div class="contact-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                    </div>
                                    <h4>البريد الإلكتروني</h4>
                                    <a href="mailto:{{ $site['contacts']['email'] ?? '' }}">{{ $site['contacts']['email'] ?? 'info@nagd.com' }}</a>
                                    <p>يتم الرد في اقل من 12 ساعة</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form and Map Section -->
                    <div class="contact-form-map-section">
                        <div class="row">
                            <!-- Contact Form -->
                            <div class="col-lg-6">
                                <div class="contact-form-wrapper wow animate__animated animate__fadeInLeft">
                                    <div class="contact-form-header">
                                        <h3>أرسل لنا رسالة</h3>
                                        <p>املأ النموذج أدناه وسنتواصل معك في أقرب وقت ممكن</p>
                                    </div>
                                    @if(session('success'))
                                    <div class="alert alert-success mb-3" role="alert">{{ session('success') }}</div>
                                    @endif
                                    @if($errors->any())
                                    <div class="alert alert-danger mb-3" role="alert">
                                        <ul class="mb-0 list-unstyled">
                                            @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form class="contact-form" action="{{ route('contacts.store') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="الاسم الكامل" value="{{ old('name') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="subject" required>
                                                    <option value="">{{ $site['services_form']['select_label'] ?? $site['services_form']['select_placeholder'] ?? 'اختر موضوع الرسالة' }}</option>
                                                    @foreach($site['services_form']['service_options'] ?? [['value'=>'consultation','label'=>'استشارة مجانية'],['value'=>'development','label'=>'تطوير المواقع'],['value'=>'design','label'=>'تصميم الجرافيك'],['value'=>'marketing','label'=>'التسويق الرقمي'],['value'=>'support','label'=>'دعم فني'],['value'=>'other','label'=>'موضوع آخر']] as $opt)
                                                    <option value="{{ $opt['value'] ?? '' }}" {{ old('subject') === ($opt['value'] ?? '') ? 'selected' : '' }}>{{ $opt['label'] ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="5" placeholder="أخبرنا عن مشروعك أو احتياجاتك..." required>{{ old('message') }}</textarea>
                                        </div>
                                        <button type="submit" class="contact-submit-btn">
                                            <span>إرسال الرسالة</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Map and Additional Info -->
                            <div class="col-lg-6">
                                <div class="contact-map-info wow animate__animated animate__fadeInRight">
                                    <div class="contact-map-wrapper">
                                        @if(!empty($site['contacts']['map_embed']))
                                            {!! $site['contacts']['map_embed'] !!}
                                        @else
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.7714703432!2d46.67529531500078!3d24.71340798413638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba76d13d7b8c5f1d!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1234567890"
                                            width="100%"
                                            height="400"
                                            style="border:0; border-radius: 12px;"
                                            allowfullscreen=""
                                            loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                        @endif
                                    </div>
                                    <div class="contact-social-section">
                                        <h4>تابعنا على وسائل التواصل الاجتماعي</h4>
                                        <div class="contact-social-links">
                                            @php $social = $site['contacts']['social_media_links'] ?? []; @endphp
                                            @if(!empty($social['facebook']))<a href="{{ $social['facebook'] }}" target="_blank" rel="noopener" class="social-link"><span>FACEBOOK</span></a>@endif
                                            @if(!empty($social['instagram']))<a href="{{ $social['instagram'] }}" target="_blank" rel="noopener" class="social-link"><span>INSTAGRAM</span></a>@endif
                                            @if(!empty($social['tiktok']))<a href="{{ $social['tiktok'] }}" target="_blank" rel="noopener" class="social-link"><span>TIKTOK</span></a>@endif
                                            @if(!empty($social['linkedin']))<a href="{{ $social['linkedin'] }}" target="_blank" rel="noopener" class="social-link"><span>LINKEDIN</span></a>@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('front.partials.footer')

    <!-- Main Scripts -->
    <script src="{{ asset('nagd-front/assets/js/libs/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('nagd-front/assets/js/libs/popper.js') }}"></script>
    <script src="{{ asset('nagd-front/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.1.21/tilt.jquery.min.js"></script>
    <!-- Addition Scripts -->
    <!-- Initialize Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            effect: "slide", // flip, fade, coverflow, slide
            // autoplay: {
            //     delay: 3500,
            //     disableOnInteraction: false,
            // },
            // loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


</body>

</html>