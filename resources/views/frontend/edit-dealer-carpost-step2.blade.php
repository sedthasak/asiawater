@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - edit-dealer-carpost-step2</title>
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
                        <a href="{{route('editdealercarpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3.svg')}}" alt=""></a>
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('editdealercarpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4.svg')}}" alt=""></a>
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
                <div class="col-12">
                    <div class="wrap-boxstep">
                        <div class="topic-step"><span>2</span> ข้อมูลผู้ขาย</div>
                        <div class="box-frm-step">
                            <form>
                                <div class="row">
                                    <div class="col-12 frm-step">
                                        <label>หัวข้อโฆษณา<span>*</span></label>
                                        <input type="text" class="form-control" value="รถสภาพดี">
                                        <div class="box-introtext">
                                            <div class="topic-introtext">ข้อความแนะนำ</div>
                                            <div class="btn-introtext">
                                                <button>มีประวัติการเข้าศูนย์</button>
                                                <button>ไม่มีชนหนัก</button>
                                                <button>รถสภาพดี</button>
                                                <button>มีประกัน</button>
                                                <button>ดูแลอย่างดี</button>
                                                <button>รถบ้าน</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 frm-step">
                                        <label>รายละเอียดรถ<span>*</span></label>
                                        <img src="{{asset('frontend/images/editor.jpg')}}" style="width: 100%" alt="">
                                    </div>
                                    <div class="col-12 frm-step">
                                        <label>ตั้งราคาขาย<span>*</span></label>
                                        <div class="txt-noteedit">หลังจากลงขายแล้ว สามารถแก้ไขราคาขายได้ 2 ครั้งเท่านั้น</div>
                                        <input type="text" class="form-control" value="1,234,567">
                                        <div class="frm-totaledit">จำนวนครั้งที่ท่านสามารถแก้ไขได้  1/2</div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="frm-step-button text-center">
                            <a href="edit-dealer-carpost-step1.php" class="btn-step btn-backstep">ย้อนกลับ</a>
                            <a href="edit-dealer-carpost-step3.php" class="btn-step btn-nextstep">ถัดไป</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')

@endsection


