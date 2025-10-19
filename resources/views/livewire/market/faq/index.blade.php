<div>
    @section('title','FAQ')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="Frequently Asked Questions about Syed Muhammad Ali Jaffery’s services, Quranic studies, Nahjul Balagha, theology, and personal development. Find answers to common inquiries here.">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/faq') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta -->
        <meta property="og:title" content="FAQ | Syed Muhammad Ali Jaffery">
        <meta property="og:description" content="Find answers to frequently asked questions about Quranic studies, Nahjul Balagha, personal development, and spiritual guidance by Syed Muhammad Ali Jaffery.">
        <meta property="og:image" content="{{ asset('market/images/news/165279.jpg') }}">
        <meta property="og:url" content="{{ url('/faq') }}">
        <meta property="og:type" content="website">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="FAQ | Syed Muhammad Ali Jaffery">
        <meta name="twitter:description" content="Get answers to common questions about Syed Muhammad Ali Jaffery’s services, Quranic studies, Nahjul Balagha, and personal development.">
        <meta name="twitter:image" content="{{ asset('market/images/news/165279.jpg') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection

    <div class="partner-breadcrumb bg_image" style="background-image: url({{asset('market/images/news/165279.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Faq</span>
                        <h1 class="title">
                            FAQ & HELP
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-details-wrapper-image-top rts-section-gap">
        <div class="container mt--30">
            <div class="row mb--40">
                <div class="col-lg-12">
                    <div class="single-project-info-wrapper-inner">
                        <h4 class="title">Frequently Asked Questions</h4>
                        <p class="disc">
                            In this section, we have gathered the most common questions our users ask while using our services. Our goal is to provide clear and comprehensive answers so you can quickly find the information you need without waiting or contacting support.
                            If you can’t find the answer to your question here, feel free to reach out to our support team or use the contact form, and we’ll get back to you as soon as possible.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt--50">
                    <div class="faq-inner-wrapper-one project-detils">
                        <div class="accordion" id="accordionExample">
                            @foreach(\App\Models\Faq::where('status',1)->get() as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{$faq->question}}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div class="right-area">
                                                <p class="disc mb--20">
                                                    {!! $faq->answer !!}

                                                </p>
                                                <a href="#" class="rts-btn btn-primary">Contact Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div></div>
