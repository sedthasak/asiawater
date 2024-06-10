@extends('../backend/layout/base')

@section('body')
    <body class="py-5 md:py-0 bg-black/[0.15]">
        @yield('content')


        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>

        <script src="{{asset('myassets/js/jquery.min.js')}}"></script>
        <script src="{{asset('myassets/js/jquery-ui.min.js')}}"></script> 
        <script src="{{asset('myassets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('myassets/js/owl.carousel.js')}}"></script>
        <script src="{{asset('myassets/js/wow.min.js')}}"></script>
        <script src="{{asset('myassets/js/fancybox.umd.js')}}"></script>
        <script src="{{asset('myassets/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('myassets/js/bootstrap-datepicker.th.min.js')}}"></script>
        <script src="{{asset('myassets/js/modernizr.custom.js')}}"></script>
        <script src="{{asset('myassets/js/nouislider.min.js')}}"></script>
        <script src="{{asset('myassets/js/wNumb.min.js')}}"></script>
        <script src="{{asset('myassets/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('myassets/js/datatables.min.js')}}"></script>
        <script src="{{asset('myassets/js/ckeditor.js')}}"></script>
        <script src="{{asset('myassets/js/select2.min.js')}}"></script>

        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
        @if(session('success'))
                    
        <script>
            // Swal.fire(
            //     'Success',
            //     '&nbsp;',
            //     'warning'
            // )
            Swal.fire({
                title: '{{session('success')}}',
                // text: "You won't be able to revert this!",
                icon: 'success',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, delete it!'
                // }).then((result) => {
                // if (result.isConfirmed) {
                //     Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                //     )
                // }
            })
        </script>
        @endif
        @if(session('error'))

        <script>
            // Swal.fire(
            //     'Success',
            //     '&nbsp;',
            //     'warning'
            // )
            Swal.fire({
                title: '{{session('error')}}',
                // text: "You won't be able to revert this!",
                icon: 'success',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, delete it!'
                // }).then((result) => {
                // if (result.isConfirmed) {
                //     Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                //     )
                // }
            })
        </script>
        @endif
    </body>
@endsection
