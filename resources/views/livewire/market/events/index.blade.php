<div>
    @section('title','Events')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="Explore upcoming events and ceremonies hosted by Syed Muhammad Ali Jaffery, including Islamic celebrations, religious gatherings, and community programs.">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/events') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta -->
        <meta property="og:title" content="Events | Syed Muhammad Ali Jaffery">
        <meta property="og:description" content="Discover upcoming Islamic events, religious gatherings, and community ceremonies guided by Syed Muhammad Ali Jaffery.">
        <meta property="og:image" content="{{ asset('market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url('/events') }}">
        <meta property="og:type" content="website">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Events | Syed Muhammad Ali Jaffery">
        <meta name="twitter:description" content="Upcoming Islamic celebrations, religious gatherings, and community events led by Syed Muhammad Ali Jaffery.">
        <meta name="twitter:image" content="{{ asset('market/images/about/me.png') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection

    <div class="partner-breadcrumb bg_image" style=" background-position: center bottom;background-image: url({{asset('market/images/event/main.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Events</span>
                        <h1 class="title">
                            Upcoming events
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partners area breadcrumb area end -->



    <!-- case studies area start -->
    <div class="rts-case-studies-area rts-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-style-three center">
                        <span class="pre">Events</span>
                        <div class="bg-title">05</div>
                        <h2 class="title rts-text-anime-style-1"> Upcoming events </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--10 mb--40">
                @foreach($events ?? [] as $event)
                    <div class="col-lg-6">
                        <div class="single-project-style-three">
                            <a href="{{route('events.details',$event->slug)}}" class="thumbnail">
                                <img style="border-radius: 20px" src="{{asset('storage/'.$event->image)}}" alt="project">
                            </a>
                            <div class="inner-content">
                                <a href="{{route('events.details',$event->slug)}}">
                                    <h4 class="title">{{$event->title}}</h4>
                                </a>
                                <i class="far fa-calendar"></i>
                                <span>{{$event->event_date.' '.$event->event_time}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- case studies area end -->

</div>
