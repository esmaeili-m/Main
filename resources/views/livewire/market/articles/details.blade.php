<div>
    <div class="blog-details-banner-large-image" style="background-image: url({{asset('storage/'.$article->thumbnail)}})">

    </div>


    <div class="blog-details-area-main-wrapper  mt-dec-180 rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-area-inner-content">
                        <div class="blog-details-top-wrapper">
                            <div class="single">
                                <i class="fa-regular fa-circle-user"></i>
                                <span>by Seyed Ali Jafari</span>
                            </div>
                            <div class="single">
                                <i class="fa-regular fa-clock"></i>
                                <span>{{\Carbon\Carbon::parse($article->created_at)->format('d M, Y H:i:s')}}</span>
                            </div>
                            <div class="single">
                                <i class="fa-regular fa-tags"></i>
                                <span>{{$article?->category->title}}</span>
                            </div>
                        </div>
                        <h2 class="title">{{$article->title}}</h2>
                        <p class="disc">
                            {!! $article->content !!}
                        </p>


                        <div class="row  align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <!-- tags details -->
                                <div class="details-tag">
                                    <h6>Tags:</h6>
                                    @foreach($article->tags as $i)
                                        <button>{{$i->name}}</button>
                                    @endforeach

                                </div>
                                <!-- tags details End -->
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="details-share">
                                    <h6>Share:</h6>
                                        <button onclick="shareFacebook()"><i class="fab fa-facebook-f"></i></button>
                                        <button onclick="shareTwitter()"><i class="fab fa-twitter"></i></button>
                                        <button onclick="copyLink()"><i class="fab fa-instagram"></i></button>
                                        <button onclick="shareLinkedIn()"><i class="fab fa-linkedin-in"></i></button>
                                </div>
                            </div>
                        </div>
                        @foreach($article->comments->where('status','approved') ?? [] as $comment)
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
                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt_lg--60 blog-list-style pl--30 pl_md--10 pl_sm--10">
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
            </div>
        </div>
    </div>


    <!-- rts brand area end -->


    <!-- rts cta area start -->
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
    @section('scripts')
        <script>
            const pageUrl = encodeURIComponent(window.location.href);
            const pageTitle = encodeURIComponent(document.title);

            // اشتراک فیسبوک
            function shareFacebook() {
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`, '_blank');
            }

            // اشتراک توییتر
            function shareTwitter() {
                window.open(`https://twitter.com/intent/tweet?url=${pageUrl}&text=${pageTitle}`, '_blank');
            }

            // اینستاگرام (API مستقیم نداره، فقط کپی لینک)
            function copyLink() {
                navigator.clipboard.writeText(window.location.href)
                    .then(() => alert("لینک کپی شد!"))
                    .catch(() => alert("خطا در کپی لینک"));
            }

            // لینکدین
            function shareLinkedIn() {
                window.open(`https://www.linkedin.com/shareArticle?mini=true&url=${pageUrl}&title=${pageTitle}`, '_blank');
            }
        </script>
    @endsection
</div>
