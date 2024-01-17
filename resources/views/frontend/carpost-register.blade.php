@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - carpost-step1</title>
@endsection

@section('content')

<?php

$data = session()->all();
$customerdata = session('customer');
$customerid = $customerdata->id;
$phone = $customerdata->phone??'';
$username = $customerdata->username??'';
$email = $customerdata->email??'';
$image = $customerdata->image??asset('frontend/images/avatar.jpeg');
$firstname = $customerdata->firstname??'';
$lastname = $customerdata->lastname??'';
$place = $customerdata->place??'';
$province = $customerdata->province??'';
$map = $customerdata->map??'';
$google_map = $customerdata->google_map??'';
$facebook = $customerdata->facebook??'';
$line = $customerdata->line??'';

$arr_color = array(
    'white' => 'ขาว',
    'เขียว' => 'เขียว',
    'แดง' => 'แดง',
    'ดำ' => 'ดำ',
    'ชมพู' => 'ชมพู',
    'ครีม' => 'ครีม',
    'เทา' => 'เทา',
    'เทา-เขียว' => 'เทา-เขียว',
    'เทา-ดำ' => 'เทา-ดำ',
    'เทา-น้ำเงิน' => 'เทา-น้ำเงิน',
    'น้ำเงิน' => 'น้ำเงิน',
    'น้ำตาล' => 'น้ำตาล',
    'บรอนซ์เงิน' => 'บรอนซ์เงิน',
    'บรอนซ์ทอง' => 'บรอนซ์ทอง',
    'ฟ้า' => 'ฟ้า',
    'ม่วง' => 'ม่วง',
    'ส้ม' => 'ส้ม',
    'เหลือง' => 'เหลือง',
);
$arr_cartype = array(
    'home' => 'รถบ้าน / เจ้าของรถขายเอง',
    'dealer' => 'ดีลเลอร์ / ลงแบบฝากขาย',
    'lady' => 'รถคุณผู้หญิง',
);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// for ($x = $query->yearlast; $x <= $query->yearfirst; $x++) {
//     echo "The number is: $x <br>";
// }


?>

<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 45px;
        user-select: none;
        -webkit-user-select: none;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 9px;
        right: 12px;
        width: 20px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 43px;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        padding-left: 17px;
        padding-right: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .box-waiting {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.5); /* Black background with 50% opacity */
        z-index: 999; /* Set z-index to 999 */
    }

    .waiting-wrapper-image {
        width: 100%;
        max-width: 400px;
        height: 0;
        padding-bottom: 11.1111%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .waiting-wrapper-image img {
        width: 120px; /* Set the width to 120px */
        height: auto; /* Automatically adjust the height to maintain aspect ratio */
        max-width: 100%; /* Ensure the image doesn't exceed its container */
    }





    #image-preview {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
    }

    .item-photoupload {
        margin: 5px;
        cursor: move;
        box-sizing: border-box;
        position: relative;
        transition: transform 0.2s ease; /* ลดความ sensitive */
        z-index: 1;
    }

    /* .item-photoupload img {
        width: 100%;
        height: auto;
        display: block;
    } */

    .item-photoupload {
        cursor: move;
    }

    #image-preview-exterior {
        min-height: 100px; /* กำหนดความสูงของ droppable area */
        border: 2px dashed #ccc; /* กำหนดเส้นขอบของ droppable area */
        padding: 10px; /* เพิ่ม padding เพื่อให้สามารถลากและวางได้ง่ายขึ้น */
    }



    /* CSS */
    .dropzone {
        min-height: 0px;
        border: 0px solid rgba(0,0,0,.3);
        background: #fff;
        padding: 0px 0px;
    }

    .dropzone .dz-preview {
        position: relative;
        display: inline-block;
        vertical-align: top;
        margin: 8px;
        border: 0px solid #ebebeb;
        background: #f9f9f9;
        padding: 8px;
        text-align: center;
    }

    .dropzone .dz-preview .dz-remove {
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
        font-size: 11px;
        color: white;
        background-color: lightgray;
        border: none;
        z-index: 100000;
        border-radius: 50%; /* เพิ่มบรรทัดนี้เพื่อทำให้มีรูปวงกลม */
        width: 25px; /* Adjust width and height for the desired size */
        height: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* opacity: 90%; */
    }

    .dropzone .dz-remove:hover {
        color: red;
    }

    .dz-details {
        display: none;
    }

    .dz-button {
        display: none;
    }

    .dropzone .dz-remove i {
    /* Style for the trash icon */
        color: white;
    }
    .bi {
        line-height: 2.2;
    }

.dropzone .dz-remove:hover {
    /* Add hover effect if needed */
    background-color: darkred;
}
</style>
<div id="wait" class="box-waiting " style="display:none;"><div class="waiting-wrapper-image"><img src="{{asset('uploads/wait.gif')}}" /></div></div>
<form method="POST" id="regis" action="{{route('carpostregisterSubmitPage')}}" enctype="multipart/form-data">
@csrf
    <div id="topontop"></div>
    <div id="step1">
        <section class="row">
            <div class="col-12 wrap-bgstep">
                <div class="container">
                    <div class="row wow fadeInDown">
                        <div class="col-12 text-center">
                            <h1>ลงขายรถยนต์</h1>
                            <div class="box-iconstep">
                                <div href="{{route('carpoststep1Page')}}"><img src="{{asset('frontend/images/icon-step1-active.svg')}}" alt=""></div>
                                <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                                <div href="{{route('carpoststep2Page')}}"><img src="{{asset('frontend/images/icon-step2.svg')}}" alt=""></div>
                                <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                                <div href="{{route('carpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3.svg')}}" alt=""></div>
                                <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                                <div href="{{route('carpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4.svg')}}" alt=""></div>
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
                                <div class="topic-step"><span>1.1</span> ข้อมูลทั่วไป</div>
                                <input type="hidden" name="customer_id" value="{{$customerid}}" />
                                <input type="hidden" name="customer_type" value="{{$_POST['type']}}" />
                                <div class="box-frm-step">
                                    <div class="row">
                                        <div class="col-12 col-md-6 frm-step">
                                            <label>ชื่่อผู้ลงทะเบียน</label>
                                            <input type="text" name="name" class="form-control" value="{{$firstname.' '.$lastname}}" readonly />
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label>ประเภทการลงทะเบียน</label>
                                            <input type="hidden" name="type" value='{{$_POST["type"]}}' />
                                            <select class="form-select" name="typeshow" id="typeshow" disabled>
                                                @foreach($arr_cartype as $keyarr_cartype => $cartype)
                                                <option value="{{$keyarr_cartype}}" {{($keyarr_cartype==$_POST["type"])?"selected":""}}>{{$cartype}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label>อีเมล</label>
                                            <input type="text" name="email" class="form-control" value="{{$email}}" readonly />
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" name="phone" class="form-control" value="{{$phone}}" readonly  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="wrap-boxstep">
                                <div class="topic-step"><span>1.2</span> รายละเอียดรถยนต์</div>
                                <div class="box-frm-step">
                                    <div class="row">
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="brands_label" >1. ยี่ห้อ<span>*</span></label>
                                            <select aria-labelledby="brands_label" class="form-select select2s" name="brands" id="brands" required>
                                                <option value="">เลือกยี่ห้อ</option>
                                                @foreach($brands as $keybn => $bn)
                                                <option value="{{$bn->id}}">{{$bn->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="models_label">2. รุ่น<span>*</span></label>
                                            <select aria-labelledby="models_label"  class="form-select select2s" name="models" id="models"  required>
                                                <option value="">เลือกรุ่น</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="generations_label">3. โฉม<span>*</span></label>
                                            <select aria-labelledby="generations_label"  class="form-select" name="generations" id="generations" required>
                                                <option value="">เลือกโฉม</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="sub_models_label">4. รุ่นย่อย<span>*</span></label>
                                            <select aria-labelledby="sub_models_label"  class="form-select select2s" name="sub_models" id="sub_models" required>
                                                <option value="">เลือกรุ่นย่อย</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-12 frm-step frm-step-inline">
                                            <label id="color_label">สี<span>*</span></label>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <select aria-labelledby="color_label"  class="form-select" name="color" required >
                                                        <option value="">เลือกสี</option>
                                                        @foreach($arr_color as $keycolor => $color)
                                                        <option value="{{$color}}">{{$color}}</option>
                                                        @endforeach
                                                        <option value="9999999999">สีอื่นๆ</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label id="other_color_label">สีอื่นๆ<span></span></label>
                                                    <input aria-labelledby="other_color_label" type="text" name="other_color" class="form-control" placeholder="สีอื่นๆ โปรดระบุ" value="">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-md-6 frm-step">
                                            <label label id="color_label">สี<span>*</span></label>
                                            <select aria-labelledby="color_label"  class="form-select" name="color" required >
                                                <option value="">เลือกสี</option>
                                                @foreach($arr_color as $keycolor => $color)
                                                <option value="{{$color}}">{{$color}}</option>
                                                @endforeach
                                                <option value="9999999999">สีอื่นๆ</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="other_color_label">สีอื่นๆ<span></span></label>
                                            <input aria-labelledby="other_color_label" type="text" name="other_color" class="form-control" placeholder="สีอื่นๆ โปรดระบุ" value="">
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="years_label">รุ่นปี<span>*</span></label>
                                            <select aria-labelledby="years_label"  class="form-select" name="years" id="years" required>
                                                <option value="">เลือกรุ่นปี</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="mileage_label">เลขไมล์<span>*</span></label>
                                            <input  aria-labelledby="mileage_label"  type="text" name="mileage" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-lg-6 frm-step">
                                            <label>เกียร์<span>*</span></label>
                                            <div class="carsearch-radio">
                                                <label class="car-radio">ออโต้
                                                    <input type="radio" name="gear" value="auto" checked />
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="car-radio">ธรรมดา
                                                    <input type="radio" name="gear" value="manual" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 frm-step">
                                            <label>เชื้อเพลิง<span>*</span></label>
                                            <div class="carsearch-radio">
                                                <label class="car-radio">รถน้ำมัน / hybrid
                                                    <input type="radio" name="gashas" value="1" checked />
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="car-radio">รถไฟฟ้า EV 100%
                                                    <input type="radio" name="gashas" value="2" />
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="car-radio">รถติดแก๊ส
                                                    <input type="radio" name="gashas" value="3" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label>ทะเบียนรถ / รหัสรถ</label>
                                            <input type="text" name="vehicle_code" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 frm-step">
                                            <label id="province_label">จังหวัด<span>*</span></label>
                                            <select aria-labelledby="province_label"  class="form-select select2s" name="province" required >
                                                <option value="">เลือกจังหวัด</option>
                                                @foreach($provinces as $keypv => $pv)
                                                <option value="{{$pv->name_th}}">{{$pv->name_th}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="frm-step-button text-center">
                                    <div class="btn btn-step btn-nextstep btn_to_step2">ถัดไป</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="step2" style="display:none;">
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
                                <a href="{{route('carpoststep3Page')}}"><img src="{{asset('frontend/images/icon-step3.svg')}}" alt=""></a>
                                <div><img src="{{asset('frontend/images/step-arrow.svg')}}" alt=""></div>
                                <a href="{{route('carpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4.svg')}}" alt=""></a>
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
                                <div class="topic-step"><span>2</span> ข้อมูลผู้ขาย</div>
                                <div class="box-frm-step">
                                    <div class="row">
                                        <div class="col-12 frm-step">
                                            <label id="title_label">หัวข้อโฆษณา/โปรโมชั่น<span>*</span></label>
                                            <input aria-labelledby="title_label" type="text" class="form-control" name="title" id="title_txt1" required >
                                            
                                        </div>
                                        <div class="col-12 frm-step">
                                            <label id="detail_label">รายละเอียดรถ<span>*</span></label>
                                            <!-- <img src="{{asset('frontend/images/editor.jpg')}}" style="width: 100%" alt=""> -->
                                            <textarea aria-labelledby="detail_label" class="form-control" id="car_detail"  rows="10" name="detail"></textarea>
                                            <div class="box-introtext">
                                                <div class="topic-introtext">ข้อความแนะนำ</div>
                                                <div class="btn-introtext">
                                                    <div  class="clckads btn btn-default button" data-text="มีประวัติการเข้าศูนย์">มีประวัติการเข้าศูนย์</div>
                                                    <div  class="clckads btn btn-default button" data-text="ไม่มีชนหนัก">ไม่มีชนหนัก</div>
                                                    <div  class="clckads btn btn-default button" data-text="รถสภาพดี">รถสภาพดี</div>
                                                    <div  class="clckads btn btn-default button" data-text="มีประกัน">มีประกัน</div>
                                                    <div  class="clckads btn btn-default button" data-text="ดูแลอย่างดี">ดูแลอย่างดี</div>
                                                    <div  class="clckads btn btn-default button" data-text="รถบ้าน">รถบ้าน</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 frm-step">
                                            <label id="price_label">ตั้งราคาขาย<span>*</span></label>
                                            <div class="txt-noteedit">หลังจากลงขายแล้ว สามารถแก้ไขราคาขายได้ 2 ครั้งเท่านั้น</div>
                                            <input aria-labelledby="price_label" type="text" class="form-control" name="price" id="price" required oninput="formatNumber()">
                                        </div>
                                    </div>
                                </div>
                                <div class="frm-step-button text-center">
                                    <div class="btn btn-step btn-backstep btn_to_step1">ย้อนกลับ</div>
                                    <div class="btn btn-step btn-nextstep btn_to_step3">ถัดไป</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="step3" style="display:none;">
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
                                <a href="{{route('carpoststep4Page')}}"><img src="{{asset('frontend/images/icon-step4.svg')}}" alt=""></a>
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
                                                        <div><label id="exterior_pictures_label">อัพโหลดรูปภายนอกรถยนต์<span>*</span></label></div>

                                                        {{-- <div class="row row-photoupload" id="image-preview-exterior">
                                                            <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                                <div class="item-photoupload">
                                                                    <button type="button"><i class="bi bi-trash3-fill"></i></button>
                                                                    <img src="{{asset('frontend/images/Rectangle 2338.jpg')}}" alt="">
                                                                </div>
                                                            </div>
                                                        </div> --}}


                                                        <div id="my-dropzone" class="dropzone">
                                                            <!-- Dropzone area -->
                                                            {{-- <div class="dz-preview dz-file-preview">
                                                                <!-- Thumbnail and file details -->
                                                                <div class="dz-details">
                                                                    <!-- Other details here -->
                                                                </div>
                                                                <!-- Remove button -->
                                                                <button class="dz-remove" data-dz-remove><i class="bi bi-trash3-fill"></i></button>
                                                            </div> --}}
                                                        </div>


                                                        <div id="hidden-inputs-exterior"></div>
                                                        <div id="hidden-inputs-feature"></div>
                                                        <div class="btn-uploadimg">
                                                            <input aria-labelledby="exterior_pictures_label" type="file" name="exterior_pictures[]" id="exterior_pictures" accept="image/jpeg, image/png" multiple required>
                                                            <i class="bi bi-plus-circle-fill"></i> อัพโหลดรูปรถ
                                                        </div>
                                                    </div>
                                                    <div class="box-uploadphoto">
                                                        <div class="topic-uploadphoto"><img src="{{asset('frontend/images/icon-upload2.svg')}}" alt=""> รูปห้องโดยสาร</div>
                                                        <div><label id="interior_pictures_label">อัพโหลดรูปห้องโดยสาร<span>*</span></label></div>
                                                        
                                                        <div id="image-preview">
                                                            {{-- <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                                <div class="item-photoupload">
                                                                    <button type="button"><i class="bi bi-trash3-fill"></i></button>
                                                                    <img src="{{asset('frontend/images/Rectangle 2338.jpg')}}" alt="">
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div id="hidden-inputs"></div>
                                                        <div class="btn-uploadimg">
                                                            <input aria-labelledby="interior_pictures_label" type="file" name="interior_pictures[]" id="interior_pictures" accept="image/jpeg, image/png" multiple required>
                                                            <i class="bi bi-plus-circle-fill"></i> อัพโหลดรูปรถ
                                                        </div>
                                                    </div>
                                                    <div class="box-uploadphoto dealerlicenseplate">
                                                        <div class="topic-uploadphoto"><img src="{{asset('frontend/images/icon-upload3.svg')}}" alt=""> เล่มทะเบียนรถ</div>
                                                        <div><label>เอกสารชุดนี้จะไม่แสดงในโพสต์<span>*</span></label></div>
                                                        <div class="row row-photoupload" id="image-preview-licenseplate">
                                                            <div class="col-4 col-md-3 col-lg-2 col-photoupload">
                                                                {{-- <div class="item-photoupload">
                                                                    <button type="button"><i class="bi bi-trash3-fill"></i></button>
                                                                    <img src="{{asset('frontend/images/Rectangle 2338.jpg')}}" alt="">
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <div class="btn-uploadimg">
                                                            <input type="file" accept="image/*" name="licenseplate" id="licenseplate" accept="image/jpeg, image/png">
                                                            <i class="bi bi-plus-circle-fill"></i> เพิ่มสำเนา/เล่มทะเบียนรถ
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-chceckbox dealerstepcheck">
                                                    <div class="topic-notephoto">การรับประกันหลังการขาย</div>
                                                    <div class="login-checkbox">
                                                        <label class="list-checkbox">รถได้รับการตรวจสภาพโดยผู้เชี่ยวชาญ
                                                            <input type="checkbox" name="warranty_1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="list-checkbox">มีการรับประกัน กรุณาระบุระยะเวลา
                                                            <input type="checkbox" name="warranty_2">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="เช่น 1 ปี / 10,000 กม." name="warranty_2_input">
                                                        <label class="list-checkbox">มีบริการช่วยเหลือฉุกเฉิน 24 ชม.
                                                            <input type="checkbox" name="warranty_3">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="txt-markpost">
                                                    **โปรดระบุข้อมูลที่ตรงกับความเป็นจริงเท่านั้น หากตรวจพบว่าไม่เป็นจริง ทางเว็บไซต์จะลบโพสต์ออกทันที 
                                                    </div>
                                                </div>
                                                <div class="step-chceckbox">
                                                    <div class="login-checkbox">
                                                        <label class="list-checkbox"><a href="{{route('termconditionPage')}}" target="_blank">ยอมรับเงื่อนไขการใช้งาน</a> และ <a href="{{route('privacypolicyPage')}}" target="_blank">นโยบายของเว็บไซต์</a> RodPromptkai.com
                                                            <input type="checkbox" value="1"  checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="frm-step-button text-center">
                                    <div class="btn btn-step btn-backstep btn_to_step2">ย้อนกลับ</div>
                                    <button type="submit" class="btn btn-step btn-nextstep" id="submit-btn">สร้าง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



</form>






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

    // $(document).ready(function () {
    //     $('#form').submit(function (event) {
    //         // Show the "wait" div when the form is submitted
    //         $('#wait').show();

    //         // You can also disable the submit button to prevent multiple submissions
    //         $('.btn-nextstep').prop('disabled', true);
    //     });
    // });






    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("submit-btn").addEventListener("click", function (event) {
            event.preventDefault();
            validateForm();
        });

        function validateForm() {
            var requiredFields = document.querySelectorAll("[required]");
            var emptyFields = [];

            for (var i = 0; i < requiredFields.length; i++) {
                var fieldValue = requiredFields[i].value.trim();

                // Check if the selected color is "สีอื่นๆ"
                if (requiredFields[i].name === "color" && fieldValue === "9999999999") {
                    // If "สีอื่นๆ" is selected, check if other_color is not empty
                    var otherColorInput = document.querySelector("[name='other_color']");
                    if (otherColorInput.value.trim() === "") {
                        // If other_color is empty, add the label to the emptyFields array
                        var labelId = otherColorInput.getAttribute("aria-labelledby");
                        var label = document.getElementById(labelId);
                        emptyFields.push(label.innerText);
                    }
                } else if (fieldValue === "") {
                    // If other fields are empty, add them to the emptyFields array
                    // console.log(i);
                    var labelId = requiredFields[i].getAttribute("aria-labelledby");
                    var label = document.getElementById(labelId);
                    emptyFields.push(label.innerText);
                }
            }



            // ตรวจสอบขนาดของไฟล์ exterior_pictures
            var files = $("[name='exterior_pictures[]']")[0].files;
            var isValid = true;

            for (var i = 0; i < files.length; i++) {
                var fileSize = files[i].size / 1024; // แปลงเป็น KB

                if (fileSize < 10 || fileSize > 12000) {
                    isValid = false;
                    break;
                }
            }

            // ถ้าขนาดไฟล์ไม่ถูกต้อง ยกเลิกการ submit
            if (!isValid) {
                emptyFields.push("ขนาดภาพไม่ถูกต้องตามเงื่อนไข");
            }

            // ตรวจสอบขนาดของไฟล์ interior_pictures
            var files = $("[name='interior_pictures[]']")[0].files;
            var isValid = true;

            for (var i = 0; i < files.length; i++) {
                var fileSize = files[i].size / 1024; // แปลงเป็น KB

                if (fileSize < 10 || fileSize > 12000) {
                    isValid = false;
                    break;
                }
            }

            // ถ้าขนาดไฟล์ไม่ถูกต้อง ยกเลิกการ submit
            if (!isValid) {
                emptyFields.push("ขนาดภาพไม่ถูกต้องตามเงื่อนไข");
            }
            
            // ตรวจสอบขนาดของไฟล์ licenseplate
            var inputFile = $("[name='licenseplate']")[0];
            if (inputFile.files.length > 0) {
                // ดึงขนาดของไฟล์
                var fileSize = inputFile.files[0].size; // ขนาดไฟล์อยู่ในหน่วย bytes

                // ตรวจสอบว่าขนาดไฟล์อยู่ในช่วงที่กำหนดหรือไม่
                if (fileSize >= 10240 && fileSize <= 12000000) {
                    // ขนาดไฟล์ถูกต้อง
                } else {
                    // ขนาดไฟล์ไม่ถูกต้อง
                    emptyFields.push("ขนาดภาพไม่ถูกต้องตามเงื่อนไข");
                }
            } else {
                // ไม่มีไฟล์ถูกเลือก
            }







            if (emptyFields.length > 0) {
                var errorMessage = "\n";
                for (var j = 0; j < emptyFields.length; j++) {
                    errorMessage += "- " + emptyFields[j] + ",\n";
                }

                Swal.fire({
                    icon: "error",
                    title: "กรุณากรอกข้อมูลให้ครบถ้วน...",
                    text: errorMessage,
                });
            } else {
                // document.getElementById("#form").submit();

                var form = document.querySelector("#regis");
                // console.log(form);
                if (form) {
                    // console.log(form.submit);
                    form.submit();
                    $('#wait').show();

                    // You can also disable the submit button to prevent multiple submissions
                    $('.btn-nextstep').prop('disabled', true);
                }
            }
        }
    });


    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#car_detail'))
            .then(editor => {
                var buttons = document.querySelectorAll('.clckads');
                if (buttons) {
                    buttons.forEach(button => {
                        button.addEventListener('click', function () {
                            var buttonText = button.getAttribute('data-text');
                            var editorInstance = editor;

                            if (editorInstance) {
                                var currentContent = editorInstance.getData();
                                var newText = currentContent + buttonText;
                                editorInstance.setData(newText);
                            } else {
                                console.error('CKEditor instance not found.');
                            }
                        });
                    });
                } else {
                    console.error('Buttons with class "clckads" not found.');
                }
            })
            .catch(error => {
                console.error(error);
            });
    });

    // CKEditor default configuration
    ClassicEditor.defaultConfig = {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                '|',
                'bulletedList',
                'numberedList',
                '|',
                'insertTable',
                '|',
                // 'imageUpload',
                '|',
                'undo',
                'redo'
            ]
        },
        image: {
            toolbar: [
                'imageStyle:full',
                'imageStyle:side',
                '|',
                'imageTextAlternative'
            ]
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        language: 'en'
    };




    Dropzone.options.exteriorDropzone = {
        url: "/fake/location",
        autoProcessQueue: false,
        paramName: "exteriorDropzone",
        clickable: true,
        maxFilesize: 5, //in mb
        addRemoveLinks: true,
        acceptedFiles: '.png,.jpg,.jpeg',
        dictDefaultMessage: "อัพโหลดรูปภายนอกรถยนต์",
        init: function() {
            this.on("sending", function(file, xhr, formData) {
            console.log("sending file");
            });
            this.on("success", function(file, responseText) {
            console.log('great success');
            });
            this.on("addedfile", function(file){
                console.log('file added');
            });
        }
    };


    
    

    $(document).ready(function() {

        $(".btn_to_step1").on( "click", function() {
            $('html, body').animate({
                scrollTop: $("#topontop").offset().top
            }, 100);
            $('#step1').show();
            $('#step2').hide();
            $('#step3').hide();
            $('#step4').hide();
        } );
        $(".btn_to_step2").on( "click", function() {
            $('html, body').animate({
                scrollTop: $("#topontop").offset().top
            }, 100);
            $('#step1').hide();
            $('#step2').show();
            $('#step3').hide();
            $('#step4').hide();
        } );
        $(".btn_to_step3").on( "click", function() {
            $('html, body').animate({
                scrollTop: $("#topontop").offset().top
            }, 100);
            $('#step1').hide();
            $('#step2').hide();
            $('#step3').show();
            $('#step4').hide();
        } );

        $(".clckads").on( "click", function() {
            var oldtext = $("#car_detail").val();
            var thistext = $(this).text();
            var newtext = oldtext+thistext;
            

            add_text(newtext);
        } );


        function add_text(newtext){ 
            document.getElementById("car_detail").value = newtext;
        }






        
        // $(".btn_to_step4").on( "click", function() {
        //     $('#step1').hide();
        //     $('#step2').hide();
        //     $('#step3').hide();
        //     $('#step4').show();
        // } );

        $("#generations").on( "change", function() {
            var generations_id = $(this).val();
            if(generations_id){
                $('#wait').show();
                $.ajax({
                    url: "{{route('carpostSelectGenerations')}}",
                    type: "post",
                    data: { 
                        generations_id: generations_id, 
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        // console.log(response);
                        $('#wait').hide();
                        $('#sub_models').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#wait').hide();
                        console.log(textStatus, errorThrown);
                    }
                });
                $.ajax({
                    url: "{{route('carpostSelectGenerationsYear')}}",
                    type: "post",
                    data: { 
                        generations_id: generations_id, 
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        // console.log(response);
                        $('#wait').hide();
                        $('#years').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#wait').hide();
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        } );

        $("#models").on( "change", function() {
            var models_id = $(this).val();
            if(models_id){
                $('#wait').show();
                $.ajax({
                    url: "{{route('carpostSelectModel')}}",
                    type: "post",
                    data: { 
                        models_id: models_id, 
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        // console.log(response);
                        $('#wait').hide();
                        $('#generations').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#wait').hide();
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        } );

        $("#brands").on( "change", function() {
            var brands_id = $(this).val();
            if(brands_id){
                $('#wait').show();
                $.ajax({
                    url: "{{route('carpostSelectBrand')}}",
                    type: "post",
                    data: { 
                        brands_id: brands_id, 
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        // console.log(response);
                        $('#wait').hide();
                        $('#models').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#wait').hide();
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        } );
    }); 

    
</script>
<script>
    var interior_count = 0;
    var exterior_count = 0;
    $(document).ready(function() {
        // Make items draggable
        $(".item-photoupload").draggable({
            helper: 'clone',
            revert: 'invalid',
            cursor: 'move'
        });

        // Make row droppable
        $(".row-photoupload").droppable({
            accept: '.item-photoupload',
            drop: function (event, ui) {
                // Clone the dragged item and append it to the droppable row
                $(this).append(ui.helper.clone());
                // Remove the delete button from the cloned item
                $(".delete-btn").remove();
            }
        });

        // Additional code for handling file input change
        $("#interior_pictures").on('change', handleFileSelect);

        // Additional code for handling form submission
        $("#yourFormId").on('submit', function(e) {
            e.preventDefault();
            submitForm();
        });

        

        // $('#exterior_pictures').change(function(event){
        //     let filesExterior = event.target.files;
        //     let hiddenInputsExterior = $('#hidden-inputs-exterior');
        //     let imagePreviewExterior = $('#image-preview-exterior');
        //     let hiddenInputsFeature = $('#hidden-inputs-feature');
        //     hiddenInputsExterior.empty(); // เคลียร์ค่าที่เก่าออก

        //     $.each(filesExterior, function(index, file){
        //         let readerExterior = new FileReader();

        //         readerExterior.onload = function(){
        //             // console.log(reader.result);
        //             let base64StringExterior = readerExterior.result; // เอาเฉพาะส่วนที่เป็น base64
                    
        //             // สร้าง input hidden
        //             exterior_count++;
        //             let hiddenInputExterior = '<input type="hidden" name="picture_exterior[]" id="hidden_exterior_'+exterior_count+'" value="'+base64StringExterior+'">';
        //             hiddenInputsExterior.append(hiddenInputExterior);

        //             if (exterior_count == 1) {
        //                 let hiddenInputFeature = '<input type="hidden" name="picture_feature" id="hidden_feature" value="'+base64StringExterior+'">';
        //                 hiddenInputsFeature.empty().append(hiddenInputFeature);
        //             }

        //             // สร้าง image tag
        //             // let imageTag = `<img src="data:image/jpeg;base64,${base64String}" width="100">`;
        //             // imagePreview.append(imageTag);

        //             let imageTagExterior = '<div class="col-4 col-md-3 col-lg-2 col-photoupload" id="border_exterior_'+exterior_count+'"><div class="item-photoupload"><button type="button" id="picture_exterior_'+exterior_count+'" onClick="delexterior(this.id);"><i class="bi bi-trash3-fill"></i></button><img src="'+base64StringExterior+'" alt=""></div></div>';
        //             imagePreviewExterior.append(imageTagExterior);
        //         }

        //         readerExterior.readAsDataURL(file);
        //     });
        // });
        $('#licenseplate').change(function(event){
            let filelicenseplate = event.target.files[0];
            let imagePreviewlicenseplate = $('#image-preview-licenseplate');

            let readerlicenseplate = new FileReader();

            readerlicenseplate.onload = function(){
                let base64Stringlicenseplate = readerlicenseplate.result; // เอาเฉพาะส่วนที่เป็น base64

                // สร้าง image tag
                let imageTaglicenseplate = '<div class="col-4 col-md-3 col-lg-2 col-photoupload"><div class="item-photoupload"><img src="'+base64Stringlicenseplate+'" alt=""></div></div>';
                imagePreviewlicenseplate.empty().append(imageTaglicenseplate); // เพิ่มรูปใหม่เข้าไปแทนที่รูปเดิม (ถ้ามี)
            }

            readerlicenseplate.readAsDataURL(filelicenseplate);
        });
        $(".select2s").select2();
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
        if ($("#typeshow").val() == "dealer") {
            $(".dealerlicenseplate").hide();
            $(".dealerstepcheck").show();
        }
        else {
            $(".dealerlicenseplate").show();
            $(".dealerstepcheck").hide();
        }
        $('#price').on('input', function() {
            let value = $(this).val().replace(/,/g, ''); // ลบ comma เดิม
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // เพิ่ม comma ทุก 3 หลัก

            $(this).val(value);
        });
    });
    $(function() {
        $("#image-preview").sortable({
            update: function(event, ui) {
                // Get the id of the leftmost item after sorting
                // var leftmostItemId = $("#image-preview .col-photoupload:first").attr("id");
                
                // Display the result
                // console.log("Leftmost item id:", leftmostItemId);

                // var base64StringExterior = $('#image-preview img').attr('src');
                // let hiddenInputFeature = '<input type="hidden" name="picture_feature" id="hidden_feature" value="'+base64StringExterior+'">';
                // hiddenInputsFeature.empty().append(hiddenInputFeature);
                // console.log(base64StringExterior);
                updateImageOrder();
            }
            
        });
        $('#image-preview').disableSelection();
        // $("#image-preview-exterior").sortable({
        //     update: function(event, ui) {
        //         // Get the id of the leftmost item after sorting
        //         // var leftmostItemId = $("#image-preview-exterior .col-photoupload:first").attr("id");
                
        //         // Display the result
        //         // console.log("Leftmost item id:", leftmostItemId);

        //         let hiddenInputsFeature = $('#hidden-inputs-feature');
        //         var base64StringExterior = $('#image-preview-exterior .col-photoupload:first img').attr('src');
        //         let hiddenInputFeature = '<input type="hidden" name="picture_feature" id="hidden_feature" value="'+base64StringExterior+'">';
        //         hiddenInputsFeature.empty().append(hiddenInputFeature);
        //         // console.log(base64StringExterior);
        //     }
        // });
        // $('#image-preview-exterior').disableSelection();
    });
    function del(e) {
        id = e.replace("picture_interior_", "");
        $("#hidden_interior_"+id).remove();
        $("#border_interior_"+id).remove();
        interior_count--;
    }
    function delexterior(e) {
        id = e.replace("picture_exterior_", "");
        $("#hidden_exterior_"+id).remove();
        $("#border_exterior_"+id).remove();
        exterior_count--;
    }



    function handleFileSelect() {
        const files = this.files;
        displayImages(files);
    }

    function displayImages(files) {
        const imagePreview = $("#image-preview");
        imagePreview.empty();

        for (const file of files) {
            const item = $('<div class="col-4 col-md-3 col-lg-2 col-photoupload"></div>');
            const innerItem = $('<div class="item-photoupload"></div>');
            const deleteButton = $('<button type="button"><i class="bi bi-trash3-fill"></i></button>');
            const img = $('<img>').attr('src', URL.createObjectURL(file));

            deleteButton.on('click', function() {
                // Code to handle deletion
                $(this).closest('.col-photoupload').remove();
                updateImageOrder();
            });

            innerItem.append(deleteButton);
            innerItem.append(img);
            item.append(innerItem);
            imagePreview.append(item);
        }
    }

    function submitForm() {
        const imagePreview = $("#image-preview");
        const images = imagePreview.find('.col-photoupload img');

        // Use images array to send the images to the server via AJAX or other methods
        // Example: Use $.ajax to send the images to a server endpoint
        /*
        $.ajax({
            url: 'your-server-endpoint',
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                console.log(data);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
        */
    }
    function updateImageOrder() {
        // // อัพเดตลำดับของรูปภาพในแบบฟอร์ม
        // const imageOrder = [];
        // $("#image-preview .item-photoupload").each(function(index) {
        //     imageOrder.push({
        //         index: index + 1,
        //         fileInput: $(this).find('input[type="file"]')
        //     });
        // });

        // // อัพเดต index ของ input file ตามลำดับใหม่
        // imageOrder.forEach(function(image) {
        //     const name = "interior_pictures[" + image.index + "]";
        //     image.fileInput.attr('name', name);
        // });

        // // ทำอย่างไรก็ตามที่คุณต้องการทำกับ imageOrder ก่อนส่งไปยังเซิร์ฟเวอร์
        // console.log("Image Order:", imageOrder);




        // Code to update the order of images
        var order = $("#image-preview").sortable("toArray");
            console.log(order);
            // Implement your logic to save or use the new order
    }
    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
        url: "/exterior-upload",
        clickable: "#exterior_pictures", // Attach the button to trigger file selection
        // Additional configuration options as needed
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        addRemoveLinks: true,  // เพิ่มลิงก์ลบสำหรับแต่ละไฟล์
        maxFilesize: 12,        // ขนาดไฟล์สูงสุด (MB)
        acceptedFiles: ".jpeg,.jpg,.png", // ประเภทไฟล์ที่ยอมรับ
        dictRemoveFile: '<i class="bi bi-trash3-fill"></i>', // Change the text for the remove link

        init: function () {
            this.on("addedfile", function (file) {
                // Add delete icon to each thumbnail
                // var removeButton = Dropzone.createElement('<button class="btn btn-danger btn-sm" style="position:absolute; top:0; right:0;">Remove</button>');

                // var _this = this;

                // removeButton.addEventListener("click", function (e) {
                //     e.preventDefault();
                //     e.stopPropagation();
                //     _this.removeFile(file);
                // });
            });

            
        }
    });

    $(".dropzone").sortable({
        items:'.dz-preview',
        cursor: 'grab',
        opacity: 0.5,
        containment: '.dropzone',
        distance: 20,
        tolerance: 'pointer',
        stop: function () {
        var queue = myDropzone.getAcceptedFiles();
        newQueue = [];
        $('#imageUpload .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {           
                var name = el.innerHTML;
                queue.forEach(function(file) {
                    if (file.name === name) {
                        newQueue.push(file);
                    }
                });
        });
        myDropzone.files = newQueue;
        }
    });
</script>
@endsection