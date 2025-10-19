<div>
    @section('title','About')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="I’m Syed Muhammad Ali Jaffery, a Pakistani Arab American blending technical expertise with spiritual insight. I have served Shia communities globally and aim to guide others toward self-understanding and divine recognition.">
        <meta name="keywords" content="Syed Muhammad Ali Jaffery, About, Shia Scholar, Quranic Studies, Nahjul Balagha, Fiqh, Islamic Education, Personal Development">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/about') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta (Facebook, LinkedIn, WhatsApp, etc.) -->
        <meta property="og:title" content="About | Syed Muhammad Ali Jaffery">
        <meta property="og:description" content="A Pakistani Arab American scholar blending technical expertise with spiritual insight, dedicated to serving Shia communities and empowering youth.">
        <meta property="og:image" content="{{ asset('market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url('/about') }}">
        <meta property="og:type" content="website">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="About | Syed Muhammad Ali Jaffery">
        <meta name="twitter:description" content="Blending technical expertise with spiritual insight, serving Shia communities globally, and guiding others toward self-understanding and divine recognition.">
        <meta name="twitter:image" content="{{ asset('market/images/about/me.png') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection

    <div class="shape-area">
        <img src="{{asset('market')}}/images/about/shape/01.png" alt="shape" class="one">
        <img src="{{asset('market')}}/images/about/shape/02.png" alt="shape" class="two">
        <img src="{{asset('market')}}/images/about/shape/03.png" alt="shape" class="three">
    </div>
    <div class="rts-client-review-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left">
                        <span class="pre">About Syed Muhammad Ali Jaffery</span>
                        <span class="bg-title">About Me</span>
                        <h1 class="title rts-text-anime-style-1">
                            Who I Am & My Path
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="testimonials-wrapper-swiper-demo-2">
                        <div class="swiper mySwiper-testimonials-dmeo-2">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="testimonials-main-wrapper-two">
                                        <div class="left-thumbnail">
                                            <img src="{{asset('market/images/about/me.png')}}" alt="testimonials">
                                        </div>
                                        <div class="right-content-testimonials">
                                            <p class="disc about-content"  >
                                                I’m Syed Muhammad Ali Jaffery, a Pakistani Arab American blending technical expertise with spiritual insight.
                                                I studied IT and Engineering in the U.S. and pursued formal religious training in Qom.
                                                My studies focus on Fiqh, Quranic exegesis, Nahjul Balagha, and comparative religion.
                                                I have served Shia communities around the world, including in the U.S., Iran, and Pakistan.
                                                I am passionate about empowering youth, promoting faith-based education, and encouraging civic engagement.
                                                My mission is to guide others toward self-understanding and divine recognition.
                                                My journey is one of continuous learning, service, and spiritual discovery.
                                            </p>
                                            <div class="name-desig">
                                                <h6 class="title">Syed Muhammad Ali Jaffery</h6>
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
    </div>

</div>
