<div>
    <script src="{{asset('dashboard/js/app.min.js')}}"></script>
    <script src="{{asset('dashboard/js/chart.min.js')}}"></script>
    <script src="{{asset('dashboard/js/admin.js')}}"></script>
    <script src="{{asset('dashboard/js/bundles/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('dashboard/js/pages/index.js')}}"></script>
    <script src="{{asset('dashboard/js/sweetalert2@1')}}"></script>
    @livewireScripts
    <script>
        document.addEventListener('livewire:initialized', () => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Signed in successfully"
            });
        })
    </script>
    @yield('scripts')

</div>
