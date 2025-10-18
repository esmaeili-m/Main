<div>
    <div class="rts-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Login</span>
                        <h1 class="title rts-text-anime-style-1">
                            Login
                        </h1>
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


    <!-- contact areas main -->
    <div class="rts-contact-area-in-page" data-animation="fadeInUp" data-delay="0.2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8 mb--20">
                    <div class="contact-form-p">


                        <form wire:submit.prevent="submit" class="form__content" id="contact-form">
                            <h4 class="title">Login Admin</h4>

                            <input style="margin-bottom: 10px"  class="@error('email') is-invalid @enderror"  wire:model.defer="email" type="text" placeholder="Your Email">
                            @error('email')
                            <div style="margin-bottom: 10px" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <input style="margin-bottom: 10px"  class="@error('password') is-invalid @enderror"  wire:model.defer="password" type="text" placeholder="Enter Your Password">
                            @error('password')
                            <div style="margin-bottom: 10px" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror


                            <button class="rts-btn btn-primary" type="submit">Login</button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
    </div>
</div>
