<div>

    <script src="{{asset('dashboard')}}/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="{{asset('dashboard')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('dashboard')}}/js/defaultmenu.min.js"></script>
    <script src="{{asset('dashboard')}}/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('dashboard')}}/js/sticky.js"></script>
    <script src="{{asset('dashboard')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('dashboard')}}/js/simplebar.js"></script>
    <script src="{{asset('dashboard')}}/libs/@simonwep/pickr/pickr.es5.min.js"></script>
    <script src="{{asset('dashboard')}}/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{asset('dashboard')}}/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="{{asset('dashboard')}}/libs/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('dashboard')}}/libs/chart.js/chart.min.js"></script>
    <script src="{{asset('dashboard')}}/js/crm-dashboard.js"></script>
    <script src="{{asset('dashboard')}}/js/custom-switcher.min.js"></script>
    <script src="{{asset('dashboard')}}/js/custom.js"></script>
    <script src="{{asset('dashboard/js/sweetalert2@11')}}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on("alert", (event) => {
                Swal.fire({
                    title: event.message,
                    icon: "success",
                    draggable: true,
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        })
    </script>
    @livewireScripts
    @yield('scripts')
</div>
