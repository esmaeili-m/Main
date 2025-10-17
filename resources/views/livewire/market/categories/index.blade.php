<div>
    <div class="rts-project-area-main-wrapper rts-section-gapTop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-between-area">
                        <div class="title-style-five">
                            <span class="pre">Speeches</span>
                            <h2 class="title rts-text-anime-style-1">My Speeches - {{$category->title ?? ''}}</h2>
                        </div>
                        <a href="{{route('posts')}}" class="rts-btn btn-primary">All Speeches</a>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--0">
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
                                <p class="disc disc-mian">
                                    {{$post->description}}
                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="mb--10">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">

                            <div class="pagination">
                                {{-- دکمه صفحه قبلی --}}
                                @if ($posts->onFirstPage())
                                    <button disabled><i class="fal fa-angle-double-left"></i></button>
                                @else
                                    <button wire:click="previousPage"><i class="fal fa-angle-double-left"></i></button>
                                @endif

                                {{-- شماره صفحات --}}
                                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                    <button
                                        wire:click="gotoPage({{ $page }})"
                                        class="{{ $page == $posts->currentPage() ? 'active' : '' }}">
                                        {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                    </button>
                                @endforeach

                                {{-- دکمه صفحه بعدی --}}
                                @if ($posts->hasMorePages())
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
