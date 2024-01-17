@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - postcar-welcome-lady</title>
@endsection

@section('content')


<section class="row">
    <div class="col-12 wrap-postcar">
        <div class="container">
            <div class="row wow fadeInDown">
                <div class="col-12 wrap-postwelcome">
                    <div class="topic-postcar-welcome topic-postcar">
                        <div class="topic-imgcar"><img src="{{asset('frontend/images/Isolation_Mode.svg')}}" alt=""></div>
                        <p>ยินดีต้อนรับ</p>
                        <h1>สำหรับคุณผู้หญิงลงขายรถ</h1>
                        <div class="list-txtwelcome">
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> ผู้ลงขาย ชื่อตรงกับเล่มรถ</div>
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> หรือสามารถลงขายแทนสมาชิกในครอบครัวได้ (นามสกุลเดียวกัน)</div>
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> เบอร์ที่ลงขายต้องเป็นเบอร์ promptpay</div>
                        </div>
                        <form method="post" action="{{route('carpostregisterPage')}}" >
                        @csrf
                            <input type="hidden" name="type" value="lady" />
                            <button class="btn-postcar"><img src="{{asset('frontend/images/icon-car.svg')}}" alt=""> ลงขายรถของคุณ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection