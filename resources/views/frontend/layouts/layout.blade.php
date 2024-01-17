<!doctype html>
<html>

<head>
    @include('frontend.layouts.inc_head')	
</head>

<body>

<div class="container-fluid">

@include('frontend.layouts.inc_menu')		

@yield('content')

@include('frontend.layouts.inc_carseo')
@include('frontend.layouts.inc_help-carsearch')		
@include('frontend.layouts.inc_footer')		
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

</div>

</body>

</html>
