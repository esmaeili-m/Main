<!DOCTYPE html>
<html lang="en">
<livewire:market.configs.head />

<body >
    <livewire:market.configs.header />
        {{$slot}}
    <livewire:market.configs.sidbar />

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
<livewire:market.configs.footer />
<livewire:market.configs.foot />
</body>
