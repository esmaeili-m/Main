<div>
    @section('title','Contact')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="Get in touch with Syed Muhammad Ali Jaffery for guidance, spiritual mentorship, and inquiries about Quranic studies, Nahjul Balagha, and personal development.">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/contact') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta -->
        <meta property="og:title" content="Contact | Syed Muhammad Ali Jaffery">
        <meta property="og:description" content="Reach out to Syed Muhammad Ali Jaffery for spiritual guidance, Quranic education, and community mentorship.">
        <meta property="og:image" content="{{ asset('market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url('/contact') }}">
        <meta property="og:type" content="website">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Contact | Syed Muhammad Ali Jaffery">
        <meta name="twitter:description" content="Connect with Syed Muhammad Ali Jaffery for guidance on Quranic studies, Nahjul Balagha, theology, and personal development.">
        <meta name="twitter:image" content="{{ asset('market/images/about/me.png') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection

    <div class="rts-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Contact</span>
                        <h1 class="title rts-text-anime-style-1">
                            Contact Us
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-area">
            <img src="{{asset('market')}}/images/about/shape/01.png" alt="shape" class="one">
            <img src="{{asset('market')}}/images/about/shape/02.png" alt="shape" class="two">
            <img src="{{asset('market')}}/images/about/shape/03.png" alt="shape" class="three">
        </div>
    </div>


    <!-- contact areas main -->
    <div class="rts-contact-area-in-page" data-animation="fadeInUp" data-delay="0.2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="contact-info-area-wrapper-p">
                        <div class="single-contact-info">
                            <div class="icon">
                                <i class="fa-solid fa-phone-flip"></i>
                            </div>
                            <div class="info-wrapper">
                                <span>Call Me 24/7</span>
                                <a href="">{{$settings['phone']}}</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info-wrapper">
                                <span>Work with us</span>
                                <a href="#">{{$settings['email']}}</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="info-wrapper">
                                <span>Our Location</span>
                                <a href="#">{{$settings['address']}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="thumbnail-contact-form">
                        <img src="{{asset('market/images/about/Untitled.jpeg')}}" style="border-radius: 20px" alt="contact">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="contact-form-p">
                            @if ($successMessage)
                                <div class="alert alert-success">{{ $successMessage }}</div>
                            @endif

                            <form wire:submit.prevent="submit" class="form__content" id="contact-form">
                                <h4 class="title">Get In Touch</h4>

                                <input style="margin-bottom: 10px"  class="@error('name') is-invalid @enderror"  wire:model.defer="name" type="text" placeholder="Your Name">
                                @error('name')
                                <div style="margin-bottom: 10px" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                                <input style="margin-bottom: 10px"  class="@error('phone') is-invalid @enderror"  wire:model.defer="phone" type="text" placeholder="Enter Your Phone">
                                @error('phone')
                                <div style="margin-bottom: 10px" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <textarea  style="margin-bottom: 10px" class="@error('name') is-invalid @enderror"  wire:model.defer="message" placeholder="Message"></textarea>
                                @error('message')
                                <div style="margin-bottom: 10px" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button class="rts-btn btn-primary" type="submit">Get In Touch</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact areas main end -->

    <!-- map area start -->
    <div class="google-map-area rts-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3248778.1226535137!2d-86.69566092360928!3d37.327475452900615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8842734c8b1953c9%3A0x771f6f4ec5ccdffc!2sKentucky%2C%20USA!5e0!3m2!1sen!2sbd!4v1741757435755!5m2!1sen!2sbd" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rts-cta-area-inner bg_image ptb--100 mt--40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner-content-inner-page">
                        <div class="left-side-content">
                            <span>Subscribe Newsletter</span>
                            <h3 class="title">Stay Updated with <br> the Latest News!</h3>
                        </div>
                        <form wire:submit="create">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <input wire:model.defer="email" class="@error('email') is-invalid @enderror" type="text" placeholder="Enter Email Address">

                            <button  type="submit" class="rts-btn btn-primary btn-white">Subscribe Now</button>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
