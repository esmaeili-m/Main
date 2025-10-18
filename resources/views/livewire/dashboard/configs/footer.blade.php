<div>
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class=" {{request()->routeIs('categories.*') ? 'active' : ''}} ">
                    <a href="{{route('categories.list')}}">
                        <i class="menu-icon ti-menu-alt"></i>
                        <span>دسته بندی ها</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('posts.*') ? 'active' : ''}} ">
                    <a href="{{route('posts.list')}}">
                        <i class="menu-icon ti-instagram"></i>
                        <span>پست ها</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('articles.*') ? 'active' : ''}} ">
                    <a href="{{route('articles.list')}}">
                        <i class="menu-icon ti-book"></i>
                        <span>مقاله ها</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('tags.*') ? 'active' : ''}} ">
                    <a href="{{route('tags.list')}}">
                        <i class="menu-icon ti-tag"></i>
                        <span>تگ ها</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('events.*') ? 'active' : ''}} ">
                    <a href="{{route('events.list')}}">
                        <i class="menu-icon ti-calendar"></i>
                        <span>رویداد ها</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('comments.*') ? 'active' : ''}} ">
                    <a href="{{route('comments.list')}}">
                        <i class="menu-icon ti-comment"></i>
                        <span>نظرات ها</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('messages.*') ? 'active' : ''}} ">
                    <a href="{{route('messages.list')}}">
                        <i class="menu-icon ti-comment"></i>
                        <span>پیام های دریافتی</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('sliders.*') ? 'active' : ''}} ">
                    <a href="{{route('sliders.list')}}">
                        <i class="menu-icon ti-layout"></i>
                        <span>اسلایدر</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('services.*') ? 'active' : ''}} ">
                    <a href="{{route('services.list')}}">
                        <i class="menu-icon ti-layout"></i>
                        <span>خدمات</span>
                    </a>
                </li>
                <li class=" {{request()->routeIs('settings.*') ? 'active' : ''}} ">
                    <a href="{{route('settings.list')}}">
                        <i class="menu-icon ti-settings"></i>
                        <span>تنظیمات عمومی </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
    </aside>

</div>
