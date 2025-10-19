<div>
    @section('title','Home')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="description" content="Syed Muhammad Ali Jaffery — Pakistani Arab American scholar bridging technology, theology, and service. Offering Quranic education, Nahjul Balagha studies, and spiritual mentorship toward self and divine recognition.">
        <meta name="keywords" content="Holy Quran, Nahjul Balagha, Belief, Theology, Personal Development, Social Events, Islamic Education, Shia Scholar, Syed Muhammad Ali Jaffery">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <meta property="og:title" content="Syed Muhammad Ali Jaffery | Faith, Knowledge & Community">
        <meta property="og:description" content="A Pakistani Arab American scholar and community leader dedicated to Quranic studies, Nahjul Balagha, theology, and personal spiritual development.">
        <meta property="og:image" content="{{ asset('market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Syed Muhammad Ali Jaffery | Scholar & Community Leader">
        <meta name="twitter:description" content="Teaching Quran, Nahjul Balagha, theology, and self-recognition to empower communities worldwide.">
        <meta name="twitter:image" content="{{ asset('market/images/about/me.png') }}">
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection
    <div class="banner-swiper-two">
        <div class="swiper mySwiper-banner-two">
            <div class="swiper-wrapper" wire:ignore>
                @foreach(\App\Models\Slider::all() as $slider)
                    <div class="swiper-slide">
                        <div class="rts-banner-area-two rts-section-gap bg_image" style="background-image: url(../storage/{{$slider->image}})">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner-inner-two-content">
                                            <p class="pre-title"><span>Welcome!</span> Develop Your Vocabulary Today</p>
                                            <h1 class="title">{{$slider->title}}</h1>
                                            <p class="disc">
                                                {{$slider->description}}
                                            </p>
                                            <a href="#" class="rts-btn btn-primary btn-white">Get Consultant</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shape-area-start">
                                <div class="shape shape-one">
                                    <img src="{{asset('market')}}/images/banner/shape/01.webp" alt="shape-area">
                                </div>
                                <div class="shape shape-two">
                                    <img src="{{asset('market')}}/images/banner/shape/02.webp" alt="shape-area">
                                </div>
                                <div class="shape shape-three">
                                    <img src="{{asset('market')}}/images/banner/shape/03.webp" alt="shape-area">
                                </div>
                                <div class="shape shape-four">
                                    <img src="{{asset('market')}}/images/banner/shape/04.webp" alt="shape-area">
                                </div>
                            </div>
                        </div>
                        <!-- rts banner area end -->
                    </div>
                @endforeach

            </div>
            <div class="swiper-button-next"><i class="fa-light fa-chevron-right"></i></div>
            <div class="swiper-button-prev"><i class="fa-light fa-chevron-left"></i></div>
        </div>
    </div>



    <!-- rts about area start -->
    <div class="rts-about-area-two rts-section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="left-thumbnail-about-area-two">
                        <img style="border-radius: 20px" src="{{asset('market')}}/images/about/me.png" alt="about">
                        <div class="small-image">
                            <img style="border-radius: 20px" src="{{asset('market')}}/images/about/me.jpeg" alt="small">
                        </div>
                        <div class="counter-about-area">
                            <h2 class="counter title"><span class="odometer" data-count="25">00</span>+
                            </h2>
                            <span>Year of experience</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt_sm--80 mt_md--80">
                    <div class="about-inner-content-two">
                        <div class="title-style-two left">
                            <span class="bg-content">About Me</span>
                            <span class="pre">More About Me</span>
                            <h2 class="title rts-text-anime-style-1">Seyed Ali Shah
                            </h2>
                        </div>
                        <div class="about-between-wrapper">
                            <p class="disc">
                                I’m Syed Muhammad Ali Jaffery, a Pakistani Arab American blending technical
                                expertise with spiritual insight. I have studied IT, engineering, and religious sciences,
                                and served Shia communities worldwide with a focus on youth empowerment and faith-based education.
                                My mission is to guide others toward self-understanding and divine recognition through learning, service, and spiritual discovery.
                            </p>
                            <div class="check-wrapper-area">
                                <div class="single-check">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Holy Quran </p>
                                </div>
                                <div class="single-check">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Nahjul Balagha</p>
                                </div>
                                <div class="single-check">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Belief & Theology</p>
                                </div>
                                <div class="single-check">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Personal Development</p>
                                </div>
                                <div class="single-check">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Social Events</p>
                                </div>

                            </div>
                        </div>
                        <div class="call-and-sign-area two">
                            <div class="call-area">
                                <div class="icon">
                                    <i class="fa-sharp fa-regular fa-phone-volume"></i>
                                </div>
                                <div class="information">
                                    <span>Call us anytime</span>
                                    <a href="#">
                                        <h6 class="title">{{$settings['phone']}}</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="sign-area">
                                <img src="assets/images/about/sign.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-area">
            <img src="{{asset('market')}}/images/about/shape/01.svg" alt="shape" class="one">
            <img src="{{asset('market')}}/images/about/shape/02.svg" alt="shape" class="two">
        </div>
    </div>
    <!-- rts about area end -->


    <!-- rts service area start -->
    <div class="rts-service-area pt--40 pb--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-two center">
                        <span class="bg-content">Services</span>
                        <span class="pre">our Service</span>
                        <h2 class="title rts-text-anime-style-1">High Quality Services
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-2 mt--30">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-bg-style-one-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="service-style-swiper-wrapper-two">
                                    <div class="swiper mySwiper-service-1">
                                        <div class="swiper-wrapper">
                                            @foreach(\App\Models\Service::all() as $service)
                                                <div class="swiper-slide">
                                                    <div class="single-service-signle-wrapper">
                                                        <div class="icons">
                                                            <img src="{{asset('market')}}/images/service/icons/01.svg" alt="service">
                                                        </div>
                                                        <div class="information">
                                                            <h5 class="title">{{$service->title}}</h5>
                                                            <p class="disc">
                                                                {!! $service->description !!}
                                                            </p>
                                                            <a href="{{route('services')}}" class="arrow-right">
                                                                <i class="fa-sharp fa-solid fa-arrow-right"></i>
                                                                <span>Read More</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts service area end -->
    <div class="rts-blog-area rts-section-gapBottom ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-two center">
                        <span class="bg-content">Blog</span>
                        <span class="pre">Blog & News</span>
                        <h2 class="title">Recent blog post
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--20">
                <div class="col-lg-12">
                    <div class="blog-swiper-style-one">
                        <div class="swiper mySwiper-blog-one">
                            <div class="swiper-wrapper">
                                @foreach(\App\Models\Article::where('status','published')->latest()->take(3)->get() as $article)
                                    <div class="swiper-slide">
                                        <div class="single-blog-area-one">
                                            <p>{{$article->title}}</p>
                                            <a href="blog-details.html">
                                                <h4 class="title">{{$article->description}}</h4>
                                            </a>
                                            <div class="bottom-details">
                                                <a href="blog-details.html" class="thumbnail">
                                                    <img src="{{asset('storage/'.$article->thumbnail)}}" alt="blog-area">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-case-studies-area rts-section-gapTop mb--50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-three center">
                        <span class="pre">Speeches</span>
                        <div class="bg-title">03</div>
                        <h2 class="title rts-text-anime-style-1">My speeches</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--10">
                @foreach(\App\Models\Post::where('status','published')->with('category')->latest()->take(4)->get() as $post)
                    <div class="col-lg-6">
                        <div class="single-project-style-three">
                            <a href="#" class="thumbnail">
                                <img style="border-radius: 20px" src="{{asset('storage/'.$post->thumbnail)}}" alt="project">
                            </a>
                            <div class="inner-content">
                                <a href="#">
                                    <h4 class="title">{{$post->title}}</h4>
                                </a>
                                <span>{{$post->category?->title}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="appoinment-area-start rts-section-gapBottom rts-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-three center">
                        <span class="pre">Contact</span>
                        <div class="bg-title">01</div>
                        <h2 class="title rts-text-anime-style-1">Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="appoinment-wrapper-one-start">
                        <div class="title-style-two mb--40 left">
                            <span class="bg-content">Hello</span>
                            <span class="pre">Make An Appointment</span>
                            <h2 class="title">Request a free quote</h2>
                        </div>
                        <form wire:submit="save_message()">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="single-input-wrapper">

                                <div class="single-input">
                                    <input class="@error('name') is-invalid @enderror" wire:model.lazy="name" type="text" placeholder="Your Name">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="single-input">
                                    <input class="@error('phone') is-invalid @enderror" wire:model.lazy="phone" type="text" placeholder="Your Phone">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="single-input mb--30">
                                <textarea wire:model.lazy="message" class="@error('message') is-invalid @enderror" placeholder="Type Your Message"></textarea>
                                @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="rts-btn btn-primary">Submit Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="appoinment-thumbnail">
                        <img style="border-radius: 15px" src="{{asset('market')}}/images/contact/Contact-us_person-in-denim-jacket-at-their-phone-and-laptop.png" alt="appoinment">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
