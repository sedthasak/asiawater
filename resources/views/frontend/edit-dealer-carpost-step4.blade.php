@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - edit-dealer-carpost-step4</title>
@endsection

@section('content')

<section class="row">
    <div class="col-12 wrap-bgstep-edit wrap-bgstep">
        <div class="container">
            <div class="row wow fadeInDown">
                <div class="col-12 text-center">
                    <h1>แก้ไขประกาศ</h1>
                    <div class="box-iconstep">
                        <a href="{{route('editdealercarpoststep1Page')}}"><img src="{{asset('frontend/images/icon-step1-active.svg')}}" alt=""></a>
                        <div class="active"><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('editdealercarpoststep2Page')}}"><img src="{{asset('frontend/images/icon-step2-active.svg')}}" alt=""></a>
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('editdealercarpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3-active.svg')}}" alt=""></a>
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('editdealercarpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4-active.svg')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.layouts.inc_edittotal')
    </div>
</section>
<section class="row">
    <div class="col-12 wrap-page-step wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="post-success">
                        <img src="{{asset('frontend/images/icon-success.svg')}}" alt="">
                        <h2>แก้ไขข้อมูลสำเร็จ</h2>
                        <h3>โปรดรอเจ้าหน้าที่ตรวจสอบข้อมูล</h3>
                    </div>
                    <a href="profile.php" class="btn-backpage">กลับสู่หน้าประกาศ</a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')

@endsection



