<div>
    @section('title','Activities')
    @section('meta_tag')
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 🏷️ SEO Meta Tags -->
        <meta name="description" content="Explore the activities of Syed Muhammad Ali Jaffery, including Quranic recitation and Tajweed, Nahjul Balagha studies, belief & theology, personal spiritual development, and community events.">
        <meta name="robots" content="index, follow">

        <!-- 🧭 Canonical -->
        <link rel="canonical" href="{{ url('/activities') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- 🌍 Open Graph Meta -->
        <meta property="og:title" content="Activities | Syed Muhammad Ali Jaffery">
        <meta property="og:description" content="Discover Syed Muhammad Ali Jaffery’s activities in Quranic education, Nahjul Balagha, theology, personal development, and social events.">
        <meta property="og:image" content="{{ asset('market/images/about/me.png') }}">
        <meta property="og:url" content="{{ url('/activities') }}">
        <meta property="og:type" content="website">

        <!-- 🐦 Twitter Card Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Activities | Syed Muhammad Ali Jaffery">
        <meta name="twitter:description" content="Quranic recitation, Nahjul Balagha studies, theology, personal development, and community events led by Syed Muhammad Ali Jaffery.">
        <meta name="twitter:image" content="{{ asset('market/images/about/me.png') }}">

        <!-- ✍️ Additional Meta -->
        <meta name="author" content="Syed Muhammad Ali Jaffery">
        <meta name="theme-color" content="#0b132b">
    @endsection


    <div class="rts-project-area-main-wrapper rts-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-between-area">
                        <div class="title-style-five">
                            <span class="pre">Activities</span>
                            <h2 class="title rts-text-anime-style-1">Quranic recitation, Nahjul Balagha studies, theology, personal development, and community events led by Syed Muhammad Ali Jaffery.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--0 mb--40">
                @foreach($services ?? [] as $post)
                    <div class="col-lg-4 col-md-6 col-md-6 col-sm-12">
                        <div class="single-project-area-main-wrapper-6">
                            <a href="#" class="thumbnail">
                                <img src="{{asset('storage/'.$post->image)}}" alt="project">
                            </a>
                            <div class="inner">
                                <a href="#">
                                    <h4 class="title">{{$post->title}}</h4>
                                </a>
                                <p class="disc disc-mian">
                                    {{$post->description}}
                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">

                            <div class="pagination">
                                {{-- دکمه صفحه قبلی --}}
                                @if ($services->onFirstPage())
                                    <button disabled><i class="fal fa-angle-double-left"></i></button>
                                @else
                                    <button wire:click="previousPage"><i class="fal fa-angle-double-left"></i></button>
                                @endif

                                {{-- شماره صفحات --}}
                                @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                                    <button
                                        wire:click="gotoPage({{ $page }})"
                                        class="{{ $page == $services->currentPage() ? 'active' : '' }}">
                                        {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                    </button>
                                @endforeach

                                {{-- دکمه صفحه بعدی --}}
                                @if ($services->hasMorePages())
                                    <button wire:click="nextPage"><i class="fal fa-angle-double-right"></i></button>
                                @else
                                    <button disabled><i class="fal fa-angle-double-right"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
