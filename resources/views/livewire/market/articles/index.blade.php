<div>
    @section('title','Articles')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="This page features specialized articles on Quranic studies, Nahjul Balagha, theology, and personal development by Syed Muhammad Ali Jaffery.">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/articles') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta (Facebook, LinkedIn, WhatsApp, etc.) -->
        <meta property="og:title" content="Articles | Syed Muhammad Ali Jaffery">
        <meta property="og:description" content="Explore specialized articles on Quranic studies, Nahjul Balagha, theology, and personal development.">
        <meta property="og:image" content="{{ asset('market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url('/articles') }}">
        <meta property="og:type" content="website">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Articles | Syed Muhammad Ali Jaffery">
        <meta name="twitter:description" content="Specialized articles on Quranic studies, Nahjul Balagha, theology, and personal development by Syed Muhammad Ali Jaffery.">
        <meta name="twitter:image" content="{{ asset('market/images/about/me.png') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection

    <div class="rts-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center mt-dec-blog-bread">
                        <span class="bg-title">Latest Article</span>
                        <h1 class="title rts-text-anime-style-1">
                            Latest Article
                        </h1>
                        <p class="disc">
                            Follow our latest articles here
                        </p>
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

    <div class="rts-blog-list-area rts-section-gapBottom mt-dec-blog-list ">
        <div class="container">
            <div class="row g-5">
                    <div class="col-xl-8 col-md-12 col-sm-12 col-12 blog-list-style ">
                        <!-- single post -->
                        @foreach($articles ?? [] as $article)
                        <div class="blog-single-post-listing" data-animation="fadeInUp" data-delay="0.2">
                            <div class="thumbnail">
                                <img src="{{asset('storage/'.$article->thumbnail)}}" alt="Business-Blog">
                            </div>
                            <div class="blog-listing-content">
                                <div class="user-info">
                                    <div class="single">
                                        <i class="far fa-user-circle"></i>
                                        <span>by Seyed Ali Jafari</span>
                                    </div>

                                    <div class="single">
                                        <i class="far fa-clock"></i>
                                        <span>{{\Carbon\Carbon::parse($article->created_at)->format('M, d, Y H:i:s')}}</span>
                                    </div>
                                    <!-- single infoe end -->
                                    <!-- single info -->
                                    <div class="single">
                                        <i class="far fa-tags"></i>
                                        <span>{{$article->category->title}}</span>
                                    </div>
                                    <!-- single info end -->
                                </div>
                                <a class="blog-title" href="{{route('article.details',$article->slug)}}">
                                    <h3 class="title animated fadeIn">{{$article->title}}</h3>
                                </a>
                                <p class="disc">
                                    {{$article->description}}
                                </p>
                                <a class="rts-btn btn-primary" href="{{route('article.details',$article->slug)}}">Read Details</a>
                            </div>
                        </div>
                        @endforeach

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">

                                    <div class="pagination">
                                        {{-- دکمه صفحه قبلی --}}
                                        @if ($articles->onFirstPage())
                                            <button disabled><i class="fal fa-angle-double-left"></i></button>
                                        @else
                                            <button wire:click="previousPage"><i class="fal fa-angle-double-left"></i></button>
                                        @endif

                                        {{-- شماره صفحات --}}
                                        @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                                            <button
                                                wire:click="gotoPage({{ $page }})"
                                                class="{{ $page == $articles->currentPage() ? 'active' : '' }}">
                                                {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                            </button>
                                        @endforeach

                                        {{-- دکمه صفحه بعدی --}}
                                        @if ($articles->hasMorePages())
                                            <button wire:click="nextPage"><i class="fal fa-angle-double-right"></i></button>
                                        @else
                                            <button disabled><i class="fal fa-angle-double-right"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt_lg--60 blog-list-style">
                    <!-- single wized start -->
                    <div class="rts-single-wized search1">
                        <div class="wized-header">
                            <h5 class="title">
                                Search Hear
                            </h5>
                        </div>
                        <div class="wized-body">
                            <div class="rts-search-wrapper">
                                <input wire:model.defer="search" class="Search1" type="text" placeholder="Enter Keyword">
                                <button wire:click="searchArticles()"><i class="fal fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- single wized End -->
                    <!-- single wized start -->
                    <div class="rts-single-wized Categories">
                        <div class="wized-header">
                            <h5 class="title">
                                Categories
                            </h5>
                        </div>
                        <div class="wized-body">
                            <!-- single categoris -->
                            @foreach(\App\Models\Category::where('status',1)->get() as $category)
                                <ul class="single-categories">
                                    <li><a href="{{route('category.details',$category->slug)}}">{{$category->title}}<i class="far fa-long-arrow-right"></i></a></li>
                                </ul>
                            @endforeach

                        </div>
                    </div>
                    <!-- single wized End -->
                    <!-- single wized start -->
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                Recent Posts
                            </h5>
                        </div>
                        <div class="wized-body">
                            <!-- recent-post -->
                            @foreach(\App\Models\Post::where('status','published')->latest()->take(4)->get() as $item)
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a href="#"><img width="40px" height="10px" src="{{asset('storage/'.$item->thumbnail)}}" alt="Blog_post"></a>
                                    </div>
                                    <div class="content-area">
                                        <div class="user">
                                            <i class="fal fa-clock"></i>
                                            <span>{{\Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</span>
                                        </div>
                                        <a class="post-title" href="#">
                                            <h6 class="title">{{$item->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- single wized End -->
                    <!-- single wized start -->
                    <div class="rts-single-wized tags">
                        <div class="wized-header">
                            <h5 class="title">
                                Popular Tags
                            </h5>
                        </div>
                        <div class="wized-body">
                            <div class="tags-wrapper">
                                @foreach(\App\Models\Tag::all() as $tag)
                                    <a href="#">{{$tag->name}}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- single wized End -->
                    <!-- single wized start -->
                    <div class="rts-single-wized contact">
                        <div class="wized-header">
                            <a href="#"><h3 class="text-white">Ali Shah</h3></a>
                        </div>
                        <div class="wized-body">
                            <h5 class="title">Need Help? We Are Here
                                To Help You</h5>
                            <a class="rts-btn btn-primary btn-white" href="{{route('contact')}}">Contact Us</a>
                        </div>
                    </div>
                    <!-- single wized End -->
                </div>
                <!-- rts- blog wized end area -->
            </div>
        </div>
    </div>


    <div class="rts-cta-area-inner bg_image ptb--100">
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
