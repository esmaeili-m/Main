<div>
    <div class="footer-8-area-bg bg_image pt--65">
        <div class="container pb--65">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo-area-left-8">
                        <a href="#" class="logo">
                            <h1 class="text-white">ALI SHAH</h1>
                        </a>
                        <p class="disc" style="text-align: justify">
                            I’m Syed Muhammad Ali Jaffery, a Pakistani Arab American blending technical expertise with spiritual insight. I have studied IT, engineering, and religious sciences, and served Shia communities worldwide with a focus on youth empowerment and faith-based education.
                        </p>
                        <ul class="social-area-wrapper-two">
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

                            @if(!empty($settings['telegram']))
                                <li>
                                    <a href="{{ $settings['telegram'] }}" target="_blank" rel="noopener">
                                        <i class="fa-brands fa-telegram"></i>
                                    </a>
                                </li>
                            @endif

                            @if(!empty($settings['whatsapp']))
                                <li>
                                    <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" rel="noopener">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </li>
                            @endif

                            @if(!empty($settings['aparat']))
                                <li>
                                    <a href="{{ $settings['aparat'] }}" target="_blank" rel="noopener">
                                        <i class="fa-solid fa-play"></i> {{-- آیکون دلخواه برای آپارات --}}
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
                <div class="offset-lg-1 col-lg-4">
                    <div class="footer-one-single-wized">
                        <div class="wized-title">
                            <h5 class="title">Quick Links</h5>
                            <img src="{{asset('market')}}/images/footer/under-title.png" alt="finbiz_footer">
                        </div>
                        <div class="quick-link-inner">
                            <ul class="links">
                                <li><a href="#"><i class="far fa-arrow-right"></i> Forum Support</a></li>
                                <li><a href="{{route('faq')}}"><i class="far fa-arrow-right"></i> Help &amp; FAQ</a></li>
                                <li><a href="{{route('contact')}}"><i class="far fa-arrow-right"></i> Contact Us</a></li>
                                <li><a href="{{route('speeches')}}"><i class="far fa-arrow-right"></i> Speeches</a></li>
                                <li><a href="{{route('articles')}}"><i class="far fa-arrow-right"></i> Article</a></li>
                            </ul>
                            <ul class="links margin-left-70">
                                <li><a href="{{route('about')}}"><i class="far fa-arrow-right"></i> About Us</a></li>
                                <li><a href="{{route('events')}}"><i class="far fa-arrow-right"></i> Events</a></li>
                                <li><a href="{{route('about')}}"><i class="far fa-arrow-right"></i>Our Company</a></li>
                                <li><a href="{{route('services')}}"><i class="far fa-arrow-right"></i>Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3">
                    <div class="footer-one-single-wized">
                        <div class="wized-title">
                            <h5 class="title">Contact Us</h5>
                            <img src="{{asset('market')}}/images/footer/under-title.png" alt="finbiz_footer">
                        </div>
                        <div class="quick-link-inner d-block">
                            @if(!empty($settings['phone']))
                                <div class="signle-footer-contact-8">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone-alt"></i>
                                    </div>
                                    <div class="inner-content">
                                        <h5 class="title">Call Us 24/7</h5>
                                        <a target="_blank"  href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}">{{ $settings['phone'] }}</a>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($settings['email']))
                                <div class="signle-footer-contact-8">
                                    <div class="icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="inner-content">
                                        <h5 class="title">Work with us</h5>
                                        <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($settings['address']))
                                <div class="signle-footer-contact-8">
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="inner-content">
                                    <h5 class="title">Me Location</h5>
                                    <a href="#">{{$settings['address']}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area-main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-8-wrapper">
                            <p>Invena - Copyright <script>
                                    document.write(
                                        new Date().getFullYear()
                                    )
                                </script>. All rights reserved.</p>
                            <ul>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="terms-of-condition.html">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
