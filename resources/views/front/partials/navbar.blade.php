{{-- Same navbar as welcome: big-nav (mobile) + header nav with mega menus. Uses $site for logos. --}}
<div class="layout index-layout">
    <nav class="big-nav big-nav-hiddin">
        <div class="nav-links">
            <div class="big-nav-header-title">
                <div class="nav-logo-container">
                    <a href="{{ url('/') }}">
                        <img src="{{ $site['logos']['big_nav_logo_url'] ?? asset('nagd-front/assets/images/logos/logo-dark.png') }}" alt="logo" />
                    </a>
                </div>
                <span class="close-big-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                    </svg>
                </span>
            </div>
            <ul class="list-unstyled p-0">
                <li><div class="li-link"><div class="link-info"><a href="{{ url('/') }}">الرئيسية</a></div></div></li>
                <li><div class="li-link"><div class="link-info"><a href="{{ url('/who-we-are/about') }}">من نحن</a></div></div></li>
                <li><div class="li-link"><div class="link-info"><a href="{{ url('/services') }}">الخدمات</a></div></div></li>
                <li><div class="li-link"><div class="link-info"><a href="{{ url('/blogs') }}">المدونة</a></div></div></li>
                <li><div class="li-link"><div class="link-info"><a href="{{ url('/projects') }}">المشاريع</a></div></div></li>
                <li><div class="li-link"><div class="link-info"><a href="{{ url('/contacts') }}">تواصل معنا</a></div></div></li>
            </ul>
        </div>
    </nav>
    <div class="close-overlay"></div>
</div>

<div class="content">
    <div class="index-header @if(!empty($navbarPageLayout)) index-page-layout @endif">
        <header class="header">
            <div class="container">
                <nav class="navbar">
                    <div class="nav-logo wow animate__animated animate__fadeInLeft">
                        <div class="nav-logo-container">
                            <a href="{{ url('/') }}">
                                <img class="main-logo" src="{{ $site['logos']['navbar_logo_url'] ?? asset('nagd-front/assets/images/logos/logo.png') }}" alt="" />
                                <span>لـحـــلـــول الأعــمـال</span>
                            </a>
                        </div>
                        <div class="nav-mobile-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="nav-links wow animate__animated animate__fadeInDown">
                        <ul class="list-unstyled">
                            <li class="nav-link-active"><a href="{{ url('/') }}">الـرئـيـسـيـة</a></li>
                            <li><a href="{{ url('/who-we-are/about') }}">عن نجد</a></li>
                            @php
                                $megaColumns = isset($site['navbar']['mega_menu_content']['columns']) && is_array($site['navbar']['mega_menu_content']['columns']) ? $site['navbar']['mega_menu_content']['columns'] : [];
                            @endphp
                            @if(count($megaColumns) > 0)
                            <li class="mega-menu-item">
                                <a href="#" class="mega-menu-toggle" onclick="event.preventDefault(); typeof toggleMegaMenu === 'function' && toggleMegaMenu();">
                                    <span>خدماتنا</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 15.0006L7.75732 10.758L9.17154 9.34375L12 12.1722L14.8284 9.34375L16.2426 10.758L12 15.0006Z"></path></svg>
                                </a>
                                <div class="mega-menu" id="megaMenu">
                                    <div class="mega-menu-content">
                                        @foreach($megaColumns as $col)
                                        <div class="mega-menu-column">
                                            <h4>{{ $col['title'] ?? '' }}</h4>
                                            <ul class="list-unstyled">
                                                @foreach($col['links'] ?? [] as $link)
                                                <li><a href="{{ $link['url'] ?? '#' }}">{{ $link['label'] ?? '' }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @else
                            <li><a href="{{ url('/services') }}">خدماتنا</a></li>
                            @endif
                            <li><a href="{{ url('/blogs') }}">المدونة</a></li>
                            <li><a href="{{ url('/projects') }}">المشاريع</a></li>
                            <li><a href="{{ url('/contacts') }}">تواصل معنا</a></li>
                        </ul>
                    </div>

                    <div class="nav-actions wow animate__animated animate__fadeInRight">
                        <a href="{{ route('contacts') }}" class="book-btn">
                            <span>احجز استشارة مجانية</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.0003 13.0001L22.0004 11.0002L5.82845 11.0002L9.77817 7.05044L8.36396 5.63623L2 12.0002L8.36396 18.3642L9.77817 16.9499L5.8284 13.0002L22.0003 13.0001Z"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="nav-actions-lang wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
                        <div class="icon switch-langs">
                            <div class="hover-drop">
                                <span>العربية</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path>
                                </svg>
                                <div class="li-links">
                                    <ul class="list-unstyled">
                                        <li><a href="#">English</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav-big-nav-icon wow animate__animated animate__fadeInRight" data-wow-delay="0.3s">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M6.5 11.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm.5 10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm10-10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0 10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zM6.5 9.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm.5 10a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm10-10a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 10a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"></path>
                        </svg>
                    </div>
                </nav>
            </div>
        </header>
