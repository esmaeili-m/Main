<div>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Invena – A modern and responsive HTML template for consulting businesses. Perfect for finance, corporate, and agency websites. SEO-friendly, fast-loading, and easy to customize. Create a professional online presence today!">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
        <title>Seyed Ali Shah | @yield('title','Home')</title>
        <link rel="stylesheet" href="{{asset('market')}}/css/plugins/fontawesome.css">
        <link rel="stylesheet" href="{{asset('market')}}/css/plugins/swiper.css">
        <link rel="stylesheet" href="{{asset('market')}}/css/plugins/metismenu.css">
        <link rel="stylesheet" href="{{asset('market')}}/css/plugins/magnifying-popup.css">
        <link rel="stylesheet" href="{{asset('market')}}/css/plugins/odometer.css">
        <link rel="stylesheet" href="{{asset('market')}}/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('market')}}/css/style.css">
        <style>
            .clamp {
                display: -webkit-box;        /* مهم: برای فعال کردن خط چندتایی */
                -webkit-box-orient: vertical; /* جهت چیدن خطوط */
                -webkit-line-clamp: 3;       /* تعداد خطوطی که میخوای */
                overflow: hidden;             /* متن اضافی مخفی می‌شه */
            }
        </style>
        @yield('meta_tag')
        @yield('styles')
        @livewireStyles
    </head>
</div>
