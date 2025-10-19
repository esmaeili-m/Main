<div>
    @section('title', $event->title)
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="{{ strip_tags($event->description) }}">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/events/'.$event->slug) }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta -->
        <meta property="og:title" content="{{ $event->title }}">
        <meta property="og:description" content="{{ strip_tags($event->description) }}">
        <meta property="og:image" content="{{ asset($event->image ?? 'market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url('/events/'.$event->slug) }}">
        <meta property="og:type" content="article">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $event->title }}">
        <meta name="twitter:description" content="{{ strip_tags($event->description) }}">
        <meta name="twitter:image" content="{{ asset($event->image ?? 'market/images/about/me.png') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection


    <div class="blog-details-banner-large-image" style="background-image: url({{asset('storage/'.$event->image)}})">

    </div>


    <div class="blog-details-area-main-wrapper pt--80">
        <div class="container-blog-details">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-area-inner-content">
                        <div class="blog-details-top-wrapper">
                            <div class="single">
                                <i class="fa-regular fa-circle-user"></i>
                                <span>by Seyed Ali Jafari</span>
                            </div>
                            <div class="single">
                                <i class="fa-regular fa-clock"></i>
                                <span>{{$event->event_date.' '.$event->event_time}}</span>
                            </div>
                            <div class="single">
                                <i class="fa-regular fa-tags"></i>
                                <span>{{$event?->category?->title ?? ''}}</span>
                            </div>
                        </div>
                        <h2 class="title">{{$event->title}}</h2>
                        <p class="disc">
                            {!! $event->content !!}
                        </p>
                        @foreach($event->comments->where('status','approved') ?? [] as $comment)
                            <div class="author-area-blog">
                                <div class="thumbnail details mb_sm--15">
                                    <img style="height: 60px;width: 60px;" src="{{asset('market/images/user/Untitled.png')}}" alt="finbiz_buseness">
                                </div>
                                <div class="author-details team">
                                    <span>USER</span>
                                    <h5>{{$comment->name}}</h5>
                                    <p class="disc">
                                        {{$comment->content}}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                        <div class="replay-area-details">
                            <h4 class="title">Leave a Reply</h4>
                            @if (session('save_comment'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('save_comment') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form wire:submit.prevent="create_comment">
                                <div class="row g-4">

                                    <div class="col-lg-6">
                                        <input wire:model.defer="name" type="text" placeholder="Your Name" class="form-control">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <input wire:model.defer="email" type="email" placeholder="Your Email" class="form-control">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <textarea wire:model.defer="content" placeholder="Type Your Message" class="form-control"></textarea>
                                        @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                                <button class="btn-primary rts-btn mt--50" type="submit">Submit Message</button>
                            </form>
                        </div>
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
