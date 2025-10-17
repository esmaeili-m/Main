<div>
    <div class="partner-breadcrumb bg_image" style=" background-position: center center;background-image: url({{asset('market/images/speeches/main.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Speeches</span>
                        <h1 class="title">
                           {{$post->title}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project-details-wrapper-image-top rts-section-gap">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-12">
                    <div class="thumbnail with-video-area">
                        <iframe width="560" height="315" src="{{$post->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt--30">
            <div class="row mb--40">
                <div class="col-lg-12">
                    <div class="single-project-info-wrapper-inner">
                        <h4 class="title">{{$post->title}}</h4>
                        <p class="disc">
                            {{$post->description}}
                        </p>
                        <div class="d-flex gap-2">

                            @foreach($post->tags as $tag)
                                <div >
                                    <a href="#" class="rts-btn btn-primary ">{{$tag->name}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-content-bottom">
                        <p class="disc">
                            {!! $post->content !!}
                        </p>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-between-area">
                        <div class="title-style-five">
                            <span class="pre">My other Speeches </span>
                            <h2 class="title rts-text-anime-style-1">Related Posts</h2>
                        </div>
                        <a href="{{route('posts')}}" class="rts-btn btn-primary">View All Speeches</a>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--0 mb--40">
                @foreach($posts ?? [] as $post)
                    <div class="col-lg-4 col-md-6 col-md-6 col-sm-12">
                        <div class="single-project-area-main-wrapper-6">
                            <a href="{{route('post.details',$post->slug)}}" class="thumbnail">
                                <img src="{{asset('storage/'.$post->thumbnail)}}" alt="project">
                            </a>
                            <div class="inner">
                                <a href="{{route('post.details',$post->slug)}}">
                                    <h4 class="title">{{$post->title}}</h4>
                                </a>
                                <p class="disc">
                                    {{$post->description}}
                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
