@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - dealer-carpost-step3</title>
@endsection

@section('content')

<section class="row">
    <div class="col-12 wrap-bgstep">
        <div class="container">
            <div class="row wow fadeInDown">
                <div class="col-12 text-center">
                    <h1>ลงขายรถยนต์</h1>
                    <div class="box-iconstep">
                        <a href="{{route('dealercarpoststep1Page')}}"><img src="{{asset('frontend/images/icon-step1-active.svg')}}" alt=""></a>
                        <div class="active"><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('dealercarpoststep2Page')}}"><img src="{{asset('frontend/images/icon-step2-active.svg')}}" alt=""></a>
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('dealercarpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3-active.svg')}}" alt=""></a>
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('dealercarpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4.svg')}}" alt=""></a>
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
                <div class="col-12">
                    <div class="wrap-boxstep">
                        <div class="topic-step"><span>3</span> อัพโหลดรูปภาพ</div>
                        <div class="box-frm-step">
                            <form>
                                <div class="row">
                                    <div class="col-12 frm-step">
                                        <div class="topic-notephoto">อัพโหลดรูปรถ</div>
                                        <div class="box-introtext">
                                            <div class="btn-introtext">
                                                <ul>
                                                    <li>ไม่อนุญาตให้มีรายละเอียดช่องทางการติดต่อ หรือโปรโมชั่นต่างๆ ภายในรูปภาพ</li>
                                                    <li>สามารถอัพโหลดรูปภาพทั้งภายนอกและห้องโดยสารรวม 5-25 รูป</li>
                                                    <li>ขนาดรูปภาพจะต้องมีขนาดระหว่าง 10Kb แต่ไม่เกิน 12Mb</li>
                                                    <li>นามสกุลไฟล์รูปภาพที่รองรับคือ .jpg และ .jpeg เท่านั้น</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="box-uploadphoto">
                                                <div class="topic-uploadphoto"><img src="{{asset('frontend/images/icon-upload1.svg')}}" alt=""> รูปภายนอกรถ</div>
                                                <div><label>อัพโหลดรูปภายนอกรถยนต์<span>*</span></label></div>
                                                <div class="row row-photoupload">
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2330.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2331.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2332.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2333.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2334.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2335.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-uploadimg">
                                                    <input type="file">
                                                    <i class="bi bi-plus-circle-fill"></i> อัพโหลดรูปรถ
                                                </div>
                                            </div>
                                            <div class="box-uploadphoto">
                                                <div class="topic-uploadphoto"><img src="{{asset('frontend/images/icon-upload2.svg')}}" alt=""> รูปห้องโดยสาร</div>
                                                <div><label>อัพโหลดรูปห้องโดยสาร<span>*</span></label></div>
                                                <div class="row row-photoupload">
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2338.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2339.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2340.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                        <div class="item-photoupload">
                                                            <button><i class="bi bi-trash3-fill"></i></button>
                                                            <img src="{{asset('frontend/images/Rectangle 2341.jpg')}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-uploadimg">
                                                    <input type="file">
                                                    <i class="bi bi-plus-circle-fill"></i> อัพโหลดรูปรถ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-chceckbox">
                                            <div class="topic-notephoto">การรับประกันหลังการขาย</div>
                                            <div class="login-checkbox">
                                                <label class="list-checkbox">รถได้รับการตรวจสภาพโดยผู้เชี่ยวชาญ
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="list-checkbox">มีการรับประกัน กรุณาระบุระยะเวลา
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="เช่น 1 ปี / 10,000 กม.">
                                                <label class="list-checkbox">มีบริการช่วยเหลือฉุกเฉิน 24 ชม.
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="txt-markpost">
                                            **โปรดระบุข้อมูลที่ตรงกับความเป็นจริงเท่านั้น หากตรวจพบว่าไม่เป็นจริง ทางเว็บไซต์จะลบโพสต์ออกทันที 
                                            </div>
                                        </div>
                                        <div class="step-chceckbox">
                                            <div class="login-checkbox">
                                                <label class="list-checkbox"><a href="#" target="_blank">ยอมรับเงื่อนไขการใช้งาน</a> และ <a href="#" target="_blank">นโยบายของเว็บไซต์</a> RodPromptkai.com
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="frm-step-button text-center">
                            <a href="dealer-carpost-step2.php" class="btn-step btn-backstep">ย้อนกลับ</a>
                            <a href="dealer-carpost-step4.php" class="btn-step btn-nextstep">ถัดไป</a>
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
