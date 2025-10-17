<div>
    <header class="header-one header--sticky">
        <div class="header-top-area-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-one-wrapper">
                            <div class="left">
                                <div class="mail">
                                    <a href="mailto:{{$settings['email'] ?? '#'}}"><i class="fal fa-envelope"></i>
                                        {{$settings['email'] ?? '#'}}</a>
                                </div>
                                <div class="working-time">
                                    <p><i class="fal fa-clock"></i> Working: 8.00am - 5.00pm</p>
                                </div>
                            </div>
                            <div class="right">
                                <ul class="top-nav">
{{--                                    <li><a href="{{route('news')}}">Company news</a></li>--}}
                                    <li><a href="{{route('faq')}}">Faq</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                                <ul class="social-wrapper-one">
                                    {{-- Facebook --}}
                                    @if(!empty($settings['facebook']))
                                        <li>
                                            <a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Telegram --}}
                                    @if(!empty($settings['telegram']))
                                        <li>
                                            <a href="{{ $settings['telegram'] }}" target="_blank" rel="noopener">
                                                <i class="fab fa-telegram-plane"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- WhatsApp --}}
                                    @if(!empty($settings['whatsapp']))
                                        <li>
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}" target="_blank" rel="noopener">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Email --}}
                                    @if(!empty($settings['email']))
                                        <li>
                                            <a href="mailto:{{ $settings['email'] }}">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Phone --}}
                                    @if(!empty($settings['phone']))
                                        <li>
                                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}">
                                                <i class="fa fa-phone"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Twitter / X --}}
                                    @if(!empty($settings['twitter']))
                                        <li>
                                            <a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener">
                                                <i class="fab fa-twitter"></i>
                                                {{-- اگه از Font Awesome 5 استفاده می‌کنی بذار: <i class="fab fa-twitter"></i> --}}
                                            </a>
                                        </li>
                                    @endif

                                    {{-- LinkedIn --}}
                                    @if(!empty($settings['linkedin']))
                                        <li>
                                            <a href="{{ $settings['linkedin'] }}" target="_blank" rel="noopener">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Instagram --}}
                                    @if(!empty($settings['instagram']))
                                        <li>
                                            <a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-main-one-wrapper">
                            <div class="thumbnail">
                                <a href="{{route('market')}}">
                                    <h5 class="font-bold" style="margin-bottom: 0px">ALI  Shah</h5>
                                </a>
                            </div>
                            <div class="main-header">
                                <div class="nav-area">
                                    <ul class="">
                                        <li class="main-nav mega-menu project-a-after">
                                            <a href="{{route('market')}}">Home</a>
                                        </li>
                                        <li class="main-nav has-dropdown project-a-after">
                                            <a href="#">Topics</a>
                                            <ul class="submenu parent-nav">
                                                @foreach(\App\Models\Category::where('status',1)->get() as $key => $category)
                                                    <li><a href="{{route('category.details',$category->slug)}}">{{$category->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="main-nav mega-menu project-a-after">
                                            <a href="{{route('speeches')}}">Speeches</a>
                                        </li>
                                        <li class="main-nav mega-menu project-a-after">
                                            <a href="{{route('articles')}}">Articles</a>
                                        </li>
                                        <li class="main-nav mega-menu project-a-after">
                                            <a href="{{route('events')}}">Events</a>
                                        </li>
                                        <li class="main-nav mega-menu project-a-after">
                                            <a href="{{route('about')}}">About Me</a>
                                        </li>
                                        <li class="main-nav mega-menu project-a-after">
                                            <a href="{{route('contact')}}">Contact</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="button-area">
                                    <a href="{{route('contact')}}" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn">Contact Me</a>
                                    <button id="menu-btn" class="menu-btn menu ml--20 ml_sm--5">
                                        <img class="menu-light" src="{{asset('market/images/icons/01.svg')}}" alt="Menu-icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</div>
