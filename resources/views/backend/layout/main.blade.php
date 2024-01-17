@extends('../backend/layout/base')

@section('body')
    <body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
        @yield('content')


        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>

        <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script> 
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
        <script src="{{asset('frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('frontend/js/fancybox.umd.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap-datepicker.th.min.js')}}"></script>
        <script src="{{asset('frontend/js/modernizr.custom.js')}}"></script>
        <script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
        <script src="{{asset('frontend/js/wNumb.min.js')}}"></script>
        <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('frontend/js/datatables.min.js')}}"></script>
        <script src="{{asset('frontend/js/ckeditor.js')}}"></script>
        <script src="{{asset('frontend/js/select2.min.js')}}"></script>

        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
        {{-- Display SweetAlert on session success --}}
        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif

        {{-- Display SweetAlert on session error --}}
        @if(session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ session('error') }}',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif
        
    </body>
@endsection
