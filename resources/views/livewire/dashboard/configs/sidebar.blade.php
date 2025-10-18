<div>
    <aside class="app-sidebar sticky" id="sidebar">

        <!-- Start::main-sidebar-header -->
        <div class="main-sidebar-header">
            <a href="index.html" class="header-logo">
                <img src="../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                <img src="../assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                <img src="../assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                <img src="../assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
            </a>
        </div>
        <!-- End::main-sidebar-header -->

        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills flex-column sub-open">
                <div class="slide-left" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                </div>
                <ul class="main-menu">
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Main</span></li>
                    <!-- End::slide__category -->

                    <li class="slide">
                        <a href="{{ route('dashboard') }}" class="side-menu__item">
                            <i class="bx bx-home side-menu__icon"></i>
                            <span class="side-menu__label">Dashboard</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('categories.list') }}" class="side-menu__item">
                            <i class="bx bx-category side-menu__icon"></i>
                            <span class="side-menu__label">Categories</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('posts.list') }}" class="side-menu__item">
                            <i class="bx bx-news side-menu__icon"></i>
                            <span class="side-menu__label">Posts</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('articles.list') }}" class="side-menu__item">
                            <i class="bx bx-book-content side-menu__icon"></i>
                            <span class="side-menu__label">Articles</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('tags.list') }}" class="side-menu__item">
                            <i class="bx bx-purchase-tag side-menu__icon"></i>
                            <span class="side-menu__label">Tags</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('events.list') }}" class="side-menu__item">
                            <i class="bx bx-calendar-event side-menu__icon"></i>
                            <span class="side-menu__label">Events</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('comments.list') }}" class="side-menu__item">
                            <i class="bx bx-comment-dots side-menu__icon"></i>
                            <span class="side-menu__label">Comments</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('messages.list') }}" class="side-menu__item">
                            <i class="bx bx-envelope side-menu__icon"></i>
                            <span class="side-menu__label">Messages</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('sliders.list') }}" class="side-menu__item">
                            <i class="bx bx-images side-menu__icon"></i>
                            <span class="side-menu__label">Slider</span>
                        </a>
                    </li>

                    <li class="slide active">
                        <a href="{{ route('services.list') }}" class="side-menu__item">
                            <i class="bx bx-slideshow side-menu__icon"></i>
                            <span class="side-menu__label">Service</span>
                        </a>
                    </li>
                    <li class="slide active">
                        <a href="{{ route('faqs.list') }}" class="side-menu__item">
                            <i class="bx bx-question-mark side-menu__icon"></i>
                            <span class="side-menu__label">Faq</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a href="{{ route('settings.list') }}" class="side-menu__item">
                            <i class="bx bx-cog side-menu__icon"></i>
                            <span class="side-menu__label">Settings</span>
                        </a>
                    </li>
                </ul>
                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->

    </aside>


</div>
