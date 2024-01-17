@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - dealer-carpost-step1</title>
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
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('dealercarpoststep2Page')}}"><img src="{{asset('frontend/images/icon-step2.svg')}}" alt=""></a>
                        <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                        <a href="{{route('dealercarpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3.svg')}}" alt=""></a>
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
                        <div class="topic-step"><span>1</span> รายละเอียดรถยนต์</div>
                        <div class="box-frm-step">
                            <form>
                                <div class="row">
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>1. ยี่ห้อ<span>*</span></label>
                                        <select class="form-select">
                                            <option value="">เลือกยี่ห้อ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>2. รุ่น<span>*</span></label>
                                        <select class="form-select">
                                            <option value="">เลือกรุ่น</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>3. โฉม<span>*</span></label>
                                        <select class="form-select">
                                            <option value="">เลือกโฉม</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>4. รุ่นย่อย<span>*</span></label>
                                        <select class="form-select">
                                            <option value="">เลือกรุ่นย่อย</option>
                                        </select>
                                    </div>
                                    <div class="col-12 frm-step frm-step-inline">
                                        <label>สี<span>*</span></label>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <select class="form-select">
                                                    <option value="">เลือกสี</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" class="form-control" placeholder="สีอื่นๆ โปรดระบุ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>รุ่นปี<span>*</span></label>
                                        <select class="form-select">
                                            <option value="">เลือกรุ่นปี</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>เลขไมล์<span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 col-lg-6 frm-step">
                                        <label>เกียร์<span>*</span></label>
                                        <div class="carsearch-radio">
                                            <label class="car-radio">ออโต้
                                                <input type="radio" name="gear">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="car-radio">ธรรมดา
                                                <input type="radio" name="gear">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 frm-step">
                                        <label>แก๊ส<span>*</span></label>
                                        <div class="carsearch-radio">
                                            <label class="car-radio">ไม่ติดแก๊ส
                                                <input type="radio" name="gas">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="car-radio">NGV
                                                <input type="radio" name="gas">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="car-radio">LPG
                                                <input type="radio" name="gas">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="car-radio">รถไฟฟ้า
                                                <input type="radio" name="gas">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>ทะเบียนรถ / รหัสรถ</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-6 frm-step">
                                        <label>จังหวัด<span>*</span></label>
                                        <select class="form-select">
                                            <option value="">เลือกจังหวัด</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="frm-step-button text-center">
                            <a href="dealer-carpost-step2.php" class="btn-step btn-nextstep">ถัดไป</a>
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

