<div>
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- inner menu area desktop start -->
        <div class="rts-sidebar-menu-desktop">
            <a class="logo-1" href="index.html">Syed Ali Shah</a>
            <div class="body d-none d-xl-block">
                <p class="disc">
                    I’m Syed Muhammad Ali Jaffery, a Pakistani Arab American blending technical expertise with spiritual insight. I have studied IT, engineering, and religious sciences, and served Shia communities worldwide with a focus on youth empowerment and faith-based education.

                </p>
                <div class="get-in-touch">
                    <!-- title -->
                    <div class="h6 title">Get In Touch</div>
                    <!-- title End -->
                    <div class="wrapper">
                        <!-- single -->
                        @if(!empty($settings['phone']))
                            <div class="single">
                                <i class="fas fa-phone-alt"></i>
                                <a  href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}">{{ $settings['phone']}}</a>
                            </div>
                        @endif

                        <!-- single ENd -->
                        <!-- single -->

                        @if(!empty($settings['email']))

                            <div class="single">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a>
                            </div>
                        @endif
                        <!-- single ENd -->
                        <!-- single -->
                        <div class="single">
                            <i class="fas fa-globe"></i>
                            <a href="#">{{url('/')}}</a>
                        </div>
                        <!-- single ENd -->
                        <!-- single -->
                        @if(!empty($settings['address']))

                        <div class="single">
                            <i class="fas fa-map-marker-alt"></i>
                            <a href="#">{{$settings['address']}}</a>
                        </div>
                        @endif
                        <!-- single ENd -->
                    </div>
                    <div class="social-wrapper-two menu">
                        @if(!empty($settings['facebook']))
                            <a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif

                        @if(!empty($settings['twitter']))
                            <a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif

                        @if(!empty($settings['instagram']))
                            <a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif

                        @if(!empty($settings['whatsapp']))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @endif

                        <!-- <a href="#"><i class="fab fa-linkedin"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu area start -->
        <div class="mobile-menu d-block d-xl-none">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">
                    <!-- Home -->
                    <li class="main-nav">
                        <a href="{{ route('market') }}">Home</a>
                    </li>

                    <!-- Topics / Categories -->
                    <li class="has-droupdown">
                        <a href="#" class="main" aria-expanded="false">Topics</a>
                        <ul class="submenu mm-collapse">
                            @foreach(\App\Models\Category::where('status',1)->get() as $category)
                                <li><a href="{{ route('category.details', $category->slug) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <!-- Speeches -->
                    <li class="main-nav">
                        <a href="{{ route('speeches') }}">Speeches</a>
                    </li>

                    <!-- Articles -->
                    <li class="main-nav">
                        <a href="{{ route('articles') }}">Articles</a>
                    </li>

                    <!-- Events -->
                    <li class="main-nav">
                        <a href="{{ route('events') }}">Events</a>
                    </li>

                    <!-- About Me -->
                    <li class="main-nav">
                        <a href="{{ route('about') }}">About Me</a>
                    </li>

                    <!-- Contact -->
                    <li class="main-nav">
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

            </nav>

            <div class="social-wrapper-one">
                <ul>
                    @if(!empty($settings['facebook']))
                        <li>
                            <a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                    @endif

                    @if(!empty($settings['twitter']))
                        <li>
                            <a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                    @endif

                    @if(!empty($settings['youtube']))
                        <li>
                            <a href="{{ $settings['youtube'] }}" target="_blank" rel="noopener">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    @endif

                    @if(!empty($settings['linkedin']))
                        <li>
                            <a href="{{ $settings['linkedin'] }}" target="_blank" rel="noopener">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                    @endif

                    @if(!empty($settings['instagram']))
                        <li>
                            <a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    @endif

                    @if(!empty($settings['whatsapp']))
                        <li>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}" target="_blank" rel="noopener">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
        <!-- mobile menu area end -->
    </div>
    <!-- inner menu area desktop End -->


    <!-- offcanvase search -->
    <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    <div id="anywhere-home" class="">
    </div>

    <!-- rtl btn area start -->
{{--    <div class="rtl-ltr-switcher-btn">--}}
{{--        <span class="rtl show">View RTL</span>--}}
{{--        <span class="ltr">View LTR</span>--}}
{{--    </div>--}}
</div>
