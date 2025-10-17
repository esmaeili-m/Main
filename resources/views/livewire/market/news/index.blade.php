<div>
    <div class="partner-breadcrumb bg_image" style="background-image: url({{asset('market/images/news/165279.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">News</span>
                        <h1 class="title">
                            Latest News
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="rts-project-area-main-wrapper rts-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-between-area">
                        <div class="title-style-five">
                            <span class="pre">New</span>
                            <h2 class="title rts-text-anime-style-1">Latest news</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--0">
                @foreach($news ?? [] as $new)
                    <div class="col-lg-4 col-md-6 col-md-6 col-sm-12">
                        <div class="single-project-area-main-wrapper-6">
                            <a href="#" class="thumbnail">
                                <img src="assets/images/project/12.webp" alt="project">
                            </a>
                            <div class="inner">
                                <a href="#">
                                    <h4 class="title">Business Growth</h4>
                                </a>
                                <p class="disc">
                                    Growth isn’t just about getting bigger—it’s about getting better. At we specialize
                                    in empowering businesses to and strategically.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
