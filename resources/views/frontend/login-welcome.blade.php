@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - login-welcome</title>
@endsection

@section('content')


<section class="row">
    <div class="col-12 wrap-login">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown">
                    <div class="login-welcome">
                        <img src="{{asset('frontend/images/logo.svg')}}" alt="">
                        <h1>สวัสดีคุณ {{$customerdata->firstname??$customerdata->phone}}</h1>
                        <h2>ยินดีต้อนรับสู่ RodPromptkai</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            var nme = "{{$customerdata->firstname}}";
            setInterval(function () {
                if(nme)
                {
                    window.location.href = "{{route('profilePage')}}";
                }
                else
                {
                    window.location.href = "{{route('editprofilePage')}}";
                }
            }, 3000);
        }); 
    </script>
@endsection
