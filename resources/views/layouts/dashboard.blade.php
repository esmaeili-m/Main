<!DOCTYPE html>
<html lang="en">
<livewire:dashboard.configs.head />

<body class="light rtl">
<livewire:dashboard.configs.sttings />

<div class="page">

<livewire:dashboard.configs.header />
    <livewire:dashboard.configs.sidebar />
    <div class="main-content app-content">
        <div class="container-fluid">
            @yield('breadcrumb')
                {{$slot}}
        </div>
    </div>
</div>
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<livewire:dashboard.configs.foot />
</body>
