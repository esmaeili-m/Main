<div>
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
                            @foreach(\App\Models\Faq::where('status',1)->get() as $fqa)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{$faq->question}}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div class="right-area">
                                                <p class="disc mb--20">
                                                    {{$faq->answer}}

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
