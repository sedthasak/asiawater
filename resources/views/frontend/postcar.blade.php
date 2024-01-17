@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - postcar</title>
@endsection

@section('content')

<?php
$customerdata = session('customer');
$sp_role = $customerdata->sp_role;
// echo "<pre>";
// print_r($sp_role);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 wrap-postcar">
        <div class="container">
            <div class="row wow fadeInDown">
                <div class="col-12 text-center">
                    <div class="topic-postcar-mt topic-postcar">
                        <div class="topic-imgcar"><img src="{{asset('frontend/images/Isolation_Mode.svg')}}" alt=""></div>
                        <h1>ลงขายรถของคุณ<span>ฟรี!</span></h1>
                        <p class="hide-txtmb">กรุณาเลือกประเภท</p>
                    </div>
                    <div class="wrap-itempost">
                        <a href="{{route('postcarwelcomePage')}}" class="item-postcar item-homecar">
                            <img src="{{asset('frontend/images/icon-post01.svg')}}" alt="">
                            <h2>รถบ้าน<br>เจ้าของขายเอง</h2>
                            <div class="btn-select-post">เลือก</div>
                        </a>
                        @if($sp_role=='dealer')
                        <a href="{{route('postcarwelcomedealerPage')}}" class="item-postcar item-dealer">
                            <img src="{{asset('frontend/images/icon-post02.svg')}}" alt="">
                            <h2>ดีลเลอร์/<br>ลงแบบฝากขาย</h2>
                            <div class="btn-select-post">เลือก</div>
                        </a>
                        @endif
                        
                        <a href="{{route('postcarwelcomeladyPage')}}" class="item-postcar item-lady">
                            <img src="{{asset('frontend/images/icon-post03.svg')}}" alt="">
                            <h2>คุณผู้หญิงลงขายรถ</h2>
                            <div class="btn-select-post">เลือก</div>
                        </a>
                    </div>
                    <div class="txt-postcontact">สอบถามข้อมูลเพิ่มเติม ติดต่อ 02-123-4567</div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection