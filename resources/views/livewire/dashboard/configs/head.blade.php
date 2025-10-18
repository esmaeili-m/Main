<div>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Syed Ali Shah | @yield('title','Home')</title>
        <meta name="Description" content="Syed Muhammad Ali Jaffery">
        <meta name="Author" content="Start Web One">
        <meta name="keywords" content="admin,admin dashboard,admin panel">
        <link rel="icon" href="{{asset('dashboard')}}/images/brand-logos/favicon.ico" type="image/x-icon">
        <script src="{{asset('dashboard')}}/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="{{asset('dashboard')}}/js/main.js"></script>
        <link id="style" href="{{asset('dashboard')}}/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
        <link href="{{asset('dashboard')}}/css/styles.min.css" rel="stylesheet" >
        <link href="{{asset('dashboard')}}/css/icons.css" rel="stylesheet" >
        <link href="{{asset('dashboard')}}/libs/node-waves/waves.min.css" rel="stylesheet" >
        <link href="{{asset('dashboard')}}/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="{{asset('dashboard')}}/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="{{asset('dashboard')}}/libs/@simonwep/pickr/themes/nano.min.css">
        <link rel="stylesheet" href="{{asset('dashboard')}}/libs/choices.js/public/assets/styles/choices.min.css">
        <link rel="stylesheet" href="{{asset('dashboard')}}/libs/jsvectormap/css/jsvectormap.min.css">
        <link rel="stylesheet" href="{{asset('dashboard')}}/libs/swiper/swiper-bundle.min.css">
        <style>
            .posts-image{
                width: 80px;
                height: 80px;
                border-radius: 10px;
            }
        </style>
        @yield('styles')
        @livewireStyles
    </head>
</div>
