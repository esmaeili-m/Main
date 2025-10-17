<div>
    <script src="{{asset('dashboard/js/app.min.js')}}"></script>
    <script src="{{asset('dashboard/js/admin.js')}}"></script>
    <script src="{{asset('dashboard/js/pages/index.js')}}"></script>
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
