@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - carpost-step4</title>
@endsection

@section('content')


    <section class="row">
        <div class="col-12 wrap-bgstep">
            <div class="container">
                <div class="row wow fadeInDown">
                    <div class="col-12 text-center">
                        <h1>ลงขายรถยนต์</h1>
                        <div class="box-iconstep">
                            <a href="{{route('carpoststep1Page')}}"><img src="{{asset('frontend/images/icon-step1-active.svg')}}" alt=""></a>
                            <div class="active"><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                            <a href="{{route('carpoststep2Page')}}"><img src="{{asset('frontend/images/icon-step2-active.svg')}}" alt=""></a>
                            <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                            <a href="{{route('carpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3-active.svg')}}" alt=""></a>
                            <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                            <a href="{{route('carpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4-active.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-12 wrap-page-step wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="post-success">
                            <img src="{{asset('frontend/images/icon-success.svg')}}" alt="">
                            <h2>ส่งข้อมูลสำเร็จ</h2>
                            <h3>โปรดรอเจ้าหน้าที่ตรวจสอบข้อมูล</h3>
                            <p>หมายเลขอ้างอิง 12345678</p>
                        </div>
                        <a href="{{route('profilePage')}}" class="btn-backpage">กลับสู่หน้าประกาศ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection