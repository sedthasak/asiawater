@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - Home</title>
@endsection

@section('content')


<?php
$arr_gear = array(
    'auto' => 'เกียร์อัตโนมัติ',
    'manual' => 'เกียร์ธรรมดา',
);
// $tel = '0998741070';
// $SixDigitRandomNumber = rand(100000,999999);
// $message = $SixDigitRandomNumber.$tel;

// echo "<pre>";
// print_r($slide);
// echo "</pre>";
// echo "<pre>";
// print_r($SixDigitRandomNumber);
// echo "</pre>";
// echo "<pre>";
// print_r($allcarcount);
// echo "</pre>";
// echo "<pre>";
// print_r($cars);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 col-xl-9 wrapbanner wow fadeInDown">
        <div class="owl-bannerslide owl-carousel owl-theme">
            @foreach($slide as $keyslide => $sld)
            <div class="items">
                <figure><img src="{{asset($sld)}}" alt=""></figure>
            </div>
            @endforeach
            <!-- <div class="items">
                <figure><img src="{{asset('frontend/images/banner02.png')}}" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner01.png')}}" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner03.png')}}" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner04.png')}}" alt=""></figure>
            </div> -->
        </div>
    </div>
    <div class="col-12 col-xl-3 box-search-car">
        
            <div class="bg-searchcar">
                <form action="/search2" id="my_form" method="GET">
                    @csrf
                <div class="topic-carsearch"><img class="svg" src="{{asset('frontend/images/icon-carred.svg')}}" alt=""> ค้นหารถยนต์</div>
                <span class="short-desc-search">ค้นหารถมือสอง รถใหม่ ราคาโดนใจในรถพร้อมขายกับเรา</span>
                <div class="carsearch-input">
                    <input type="text" readonly value="ยี่ห้อรถ">
                    <input type="hidden" name="brand_id">
                    <input type="hidden" name="model_id">
                    <input type="hidden" name="generation_id">
                    <input type="hidden" name="submodel_id">
                </div>
                <div class="home-popup-search">@include('frontend.layouts.inc-popup-carsearch')</div> 
                <div class="carsearch-radio">
                    <label class="car-radio">ซื้อสด
                        <input type="radio" name="payment" value="สด" checked>
                        <span class="checkmark"></span>
                    </label>
                    {{-- <label class="car-radio">จัดไฟแนนซ์
                        <input type="radio" name="payment" value="ผ่อน">
                        <span class="checkmark"></span>
                    </label> --}}
                </div>

                <div class="box-searchrange">
                    <div class="search-range">
                        <div class="topic-range">
                            <div>งบประมาณ</div>
                            <div>
                                <div id="minprice" class="pricelow"></div>
                                <input type="hidden" name="pricelow">
                                <span>-</span>
                                <div id="maxprice" class="pricehigh"></div>
                                <input type="hidden" name="pricehigh">
                            </div>
                        </div>
                        <div class="box-priceslider">
                            <div id="priceslider"></div>
                        </div>
                    </div>
                    <div class="search-range">
                        <div class="topic-range">
                            <div>ปี</div>
                            <div>
                                <div id="minyear" class="yearlow"></div>
                                <input type="hidden" name="yearlow">
                                <div id="maxyear" class="yearhigh"></div>
                                <input type="hidden" name="yearhigh">
                            </div>
                        </div>
                        <div class="box-priceslider">
                            <div id="yearslider"></div>
                        </div>
                    </div>
                </div>
                
                <div class="wrap-boxadvance">
                    <a href="#" class="btn-advancesearch">ค้นหารถยนต์แบบละเอียด <img src="{{asset('frontend/images/chevron-red.svg')}}" alt=""></a>
                    <div class="box-advancesearch">
                        <div class="box-advancesearch-head">
                            <span>ค้นหารถยนต์แบบละเอียด</span>
                            <button type="button" class="advance-exit">ยกเลิก</button>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                                <select name="province" id="province" class="form-select">
                                    <option value="">จังหวัด</option>
                                    @if (isset($province))
                                        @foreach ($province as $rows)
                                            <option value="{{$rows->name_th}}"> {{$rows->name_th}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                                <select name="color" id="color" class="form-select">
                                <option value="">สี</option>
                                <option value="">ทุกสี</option>
                                <option value="ขาว">ขาว</option>
                                <option value="เขียว">เขียว</option>
                                <option value="ครีม">ครีม</option>
                                <option value="ชมพู">ชมพู</option>
                                <option value="ดำ">ดำ</option>
                                <option value="แดง">แดง</option>
                                <option value="เทา">เทา</option>
                                <option value="น้ำเงิน">น้ำเงิน</option>
                                <option value="น้ำตาล">น้ำตาล</option>
                                <option value="บรอนซ์เงิน">บรอนซ์เงิน</option>
                                <option value="บรอนซ์ทอง">บรอนซ์ทอง</option>
                                <option value="ฟ้า">ฟ้า</option>
                                <option value="ม่วง">ม่วง</option>
                                <option value="ส้ม">ส้ม</option>
                                <option value="เหลือง">เหลือง</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                                <div class="advance-boxgear">
                                    <div>เกียร์</div>
                                    <div>
                                        <label><input type="radio" name="gear" id="advance-gear" value="auto"> <span>อัตโนมัติ</span></label>
                                        <label><input type="radio" name="gear" value="manual"> <span>ธรรมดา</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-9 col-xl-12">
                                <select name="power" id="power" class="form-select">
                                    <option value="">เลือก</option>
                                    <option value="1">รถน้ำมัน / hybrid</option>
                                    <option value="2">รถไฟฟ้า EV 100%</option>
                                    <option value="3">รถติดแก๊ส</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 col-xl-12">
                                <a href="#" class="btn-submitsearch btn-searchcar" onclick="submit1()">ยืนยัน</a>
                            </div>
                        </div>
                    </div>

                    <div class="boxshow-advance">
                        <button type="button" class="btn-resetsearch" onClick="delall()"><img src="{{asset('frontend/images/icon-reset-white.svg')}}" alt="">ล้าง</button>
                    </div>

                    <a href="javascript:void(0);" onclick="search4();" class="btn-searchcar">ค้นหารถยนต์</a>
                </div>
                </form>
            </div>
        
    </div>
</section>

<section class="row wow fadeInDown">
    <div class="col-12 col-lg-4 col-xl-3 bg-findcar">
        <div class="desc-findcar">
            <div class="topic-findcar">
                <img class="svg" src="{{asset('frontend/images/icon-carred.svg')}}" alt=""> ช่วยคุณหารถที่ใช่
            </div>
            <p>ให้รถพร้อมขายช่วยหารถให้คุณ</p>
            <a data-fancybox data-src="#help-carsearch" href="javascript:;">คลิกเลย <i class="bi bi-chat-text-fill"></i></a>
        </div>
    </div>
    <div class="col-12 col-lg-8 col-xl-9 bg-carslide">
        <div class="box-carslide">
            <div class="owl-carslide owl-carousel owl-theme">
                @foreach($categories as $keycate => $cate)
                <div class="items">
                    <a href="{{url('/search-category').'/'.$cate->id}}"><figure><img src="{{asset($cate->feature)}}" alt=""></figure></a> 
                </div>
                @endforeach
                <!-- <div class="items">
                    <a href="{{route('carPage')}}"><figure><img src="{{asset('frontend/images/car01.png')}}" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="{{route('carPage')}}"><figure><img src="{{asset('frontend/images/car02.png')}}" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="{{route('carPage')}}"><figure><img src="{{asset('frontend/images/car03.png')}}" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="{{route('carPage')}}"><figure><img src="{{asset('frontend/images/car04.png')}}" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="{{route('carPage')}}"><figure><img src="{{asset('frontend/images/car05.png')}}" alt=""></figure></a> 
                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-12 home-bestsearch wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 box-topichome">
                    <h3 class="topic-home"><i class="bi bi-circle-fill"></i> รถที่ถูกค้นหามากที่สุด</h3>
                    <a href="{{route('carPage')}}" class="btn-red">ดูทั้งหมด</a>
                </div>
                <div class="col-12">
                    <div class="owl-bestsearch owl-carousel owl-theme">
                        @php
                        $car1count = 0;
                        @endphp
                        @foreach($cars as $keycar1 => $car1)
                        @php
                        $car1count++;
                        if($car1count <= 5){
                        $profilecar_img = ($car1->feature)?asset($car1->feature):asset('public/uploads/default-car.jpg');
                        @endphp
                        <a href="{{route('cardetailPage', ['post' => $car1->id])}}" class="item-car">
                            <figure>
                                <div class="cover-car"><img src="{{$profilecar_img}}" alt=""></div>
                                <figcaption>
                                    <div class="car-name">{{$car1->modelyear." ".$car1->brands_title." ".$car1->model_name}} </div>
                                    <div class="car-series">{{$car1->generations_name." ".$car1->sub_models_name}}</div>
                                    <div class="car-province">@if(!empty($car1->customer_proveince)){{$car1->customer_proveince}}@else{{"-"}}@endif</div>
                                    <div class="row">
                                        <div class="col-8 col-xl-9">
                                            <div class="descpro-car">{{$car1->title}}</div>
                                        </div>
                                        <div class="col-4 col-xl-3 text-end">
                                            <div class="txt-readmore">ดูเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="linecontent"></div>
                                    <div class="row caritem-price">
                                        <div class="col-6">
                                            <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> {{$arr_gear[$car1->gear]??''}}</div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="car-price">{{number_format($car1->price, 0, '.', ',')}}.-</div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                        @php
                        }
                        @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="box-sessioncar">
    <div class="sessioncar-order2">
        <section class="row">
            <div class="col-12 bghome-item">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers wow fadeInLeft">
                                <div class="photocar-number">
                                    <img src="{{asset('frontend/images/Isolation_Mode.svg')}}" alt="">
                                </div>
                                <div class="box-itemnum">
                                    <div class="item-num">
                                        จำนวนรถมาใหม่ <div class="txt-num">0</div>
                                    </div>
                                    <div class="item-num">
                                        จำนวนรถทั้งหมด <div class="txt-num">{{$allcarcount}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="homeitem-button wow fadeInRight">
                                <div class="txt-homeitem">
                                    <div class="topic-homeitem"><img src="{{asset('frontend/images/icon-carred.svg')}}" class="svg" alt=""> รถยนต์แบบไหนที่เหมาะกับฉัน?</div>
                                    <div>ให้เราช่วยคุณค้นหารถที่ใช่ตามความต้องการของคุณ</div>
                                </div>
                                <a data-fancybox data-src="#help-carsearch" href="javascript:;" class="btn-red">ค้นหารถยนต์</a>
                            </div>
                        </div>
                    </div>
                    <div class="row row-item-postcar wow fadeInDown">
                        <div class="col-12 col-lg-4 item-postcar">
                            <a href="{{route('postcarwelcomePage')}}">
                                <figure>
                                    <div class="cover-itempost"><img src="{{asset('frontend/images/banner-carhome.webp')}}" alt=""></div>
                                    <figcaption>
                                        <h3>ลงขายรถของคุณ ฟรี!</h3>
                                        <p>รถมือเดียว รถบ้านเจ้าของขายเอง</p>
                                        <div class="btn-itempostcar btn-itempostcar-home">ลงขายสำหรับรถบ้าน <img src="{{asset('frontend/images/chevron.svg')}}" class="svg" alt=""></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 item-postcar">
                            <a href="{{route('postcarwelcomedealerPage')}}">
                                <figure>
                                    <div class="cover-itempost"><img src="{{asset('frontend/images/banner-cardealer.webp')}}" alt=""></div>
                                    <figcaption>
                                        <h3>ลงขายสำหรับดีลเลอร์</h3>
                                        <p>เต็นท์รถที่น่าเชื่อถือ มีรับประกัน ขับได้สบายใจ</p>
                                        <div class="btn-itempostcar btn-itempostcar-dealer">ลงขายสำหรับดีลเลอร์ <img src="{{asset('frontend/images/chevron.svg')}}" class="svg" alt=""></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 item-postcar">
                            <a href="{{route('postcarwelcomeladyPage')}}">
                                <figure>
                                    <div class="cover-itempost"><img src="{{asset('frontend/images/banner-carlady.webp')}}" alt=""></div>
                                    <figcaption>
                                        <h3>คุณผู้หญิงลงขายรถ</h3>
                                        <p>เจ้าของเล่มรถเป็นผู้หญิง จอดมากกว่าขับ</p>
                                        <div class="btn-itempostcar btn-itempostcar-lady">ลงขายสำหรับคุณผู้หญิง <img src="{{asset('frontend/images/chevron.svg')}}" class="svg" alt=""></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="sessioncar-order1">
        <section class="row wow fadeInDown">
            <div class="col-12 home-newcar">
                <div class="container">
                    <div class="row">
                        <div class="col-12 bg-number">
                            <div class="numbers wow fadeInLeft">
                                <div class="photocar-number">
                                    <img src="{{asset('frontend/images/Isolation_Mode.svg')}}" alt="">
                                </div>
                                <div class="box-itemnum">
                                    <div class="item-num">
                                        จำนวนรถมาใหม่ <div class="txt-num">0</div>
                                    </div>
                                    <div class="item-num">
                                        จำนวนรถทั้งหมด <div class="txt-num">{{$allcarcount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 box-topichome">
                            <h3 class="topic-home"><i class="bi bi-circle-fill"></i> รถมาใหม่</h3>
                            <a href="#" class="btn-red">ดูทั้งหมด</a>
                        </div>
                    </div>
                    <div class="row row-itemcar">

                        @foreach($allcars6 as $post6post)
                        @php
                        $post6post_img = ($post6post->feature)?asset($post6post->feature):asset('public/uploads/default-car.jpg');
                        @endphp
                        <div class="col-6 col-md-4 col-itemcar">
                            <a href="{{route('cardetailPage', ['post' => $post6post->id])}}" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="{{asset('frontend/images/icon-tagnew.svg')}}" alt=""> รถมาใหม่</div>
                                        <img src="{{$post6post_img}}" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="car-name">{{$post6post->modelyear." ".$post6post->brands_title." ".$post6post->model_name}} </div>
                                        <div class="car-series">{{$post6post->generations_name." ".$post6post->sub_models_name}}</div>
                                        <div class="car-province">@if(isset($post6post->customer_proveince)){{$post6post->customer_proveince}}@else{{"-"}}@endif</div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-xl-9">
                                                <div class="descpro-car">{{$post6post->title}}</div>
                                            </div>
                                            <div class="col-12 col-md-4 col-xl-3 text-end">
                                                <div class="txt-readmore">ดูเพิ่มเติม</div>
                                            </div>
                                        </div>
                                        <div class="linecontent"></div>
                                        <div class="row caritem-price">
                                            <div class="col-12 col-md-6">
                                                <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> {{$arr_gear[$post6post->gear]??''}}</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">{{number_format($post6post->price, 0, '.', ',')}}.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        @endforeach
                        
                        <!-- <div class="col-6 col-md-4 col-itemcar">
                            <a href="#" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="{{asset('frontend/images/icon-tagnew.svg')}}" alt=""> รถมาใหม่</div>
                                        <img src="{{asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png')}}" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="car-name">2016 Honda CR-V </div>
                                        <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                        <div class="car-province">กรุงเทพมหานคร</div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-xl-9">
                                                <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                            </div>
                                            <div class="col-12 col-md-4 col-xl-3 text-end">
                                                <div class="txt-readmore">ดูเพิ่มเติม</div>
                                            </div>
                                        </div>
                                        <div class="linecontent"></div>
                                        <div class="row caritem-price">
                                            <div class="col-12 col-md-6">
                                                <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> เกียร์อัตโนมัติ</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-itemcar">
                            <a href="#" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="{{asset('frontend/images/icon-tagnew.svg')}}" alt=""> รถมาใหม่</div>
                                        <img src="{{asset('frontend/images/CAR202304290032_Mini_Cooper_20230429_133309985_WATERMARK.png')}}" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="car-name">2016 Honda CR-V </div>
                                        <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                        <div class="car-province">กรุงเทพมหานคร</div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-xl-9">
                                                <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                            </div>
                                            <div class="col-12 col-md-4 col-xl-3 text-end">
                                                <div class="txt-readmore">ดูเพิ่มเติม</div>
                                            </div>
                                        </div>
                                        <div class="linecontent"></div>
                                        <div class="row caritem-price">
                                            <div class="col-12 col-md-6">
                                                <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> เกียร์อัตโนมัติ</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-itemcar">
                            <a href="#" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="{{asset('frontend/images/icon-tagnew.svg')}}" alt=""> รถมาใหม่</div>
                                        <img src="{{asset('frontend/images/CAR202305090085_MG_HS_20230509_180516497_WATERMARK.png')}}" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="car-name">2016 Honda CR-V </div>
                                        <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                        <div class="car-province">กรุงเทพมหานคร</div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-xl-9">
                                                <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                            </div>
                                            <div class="col-12 col-md-4 col-xl-3 text-end">
                                                <div class="txt-readmore">ดูเพิ่มเติม</div>
                                            </div>
                                        </div>
                                        <div class="linecontent"></div>
                                        <div class="row caritem-price">
                                            <div class="col-12 col-md-6">
                                                <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> เกียร์อัตโนมัติ</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-itemcar">
                            <a href="#" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="{{asset('frontend/images/icon-tagnew.svg')}}" alt=""> รถมาใหม่</div>
                                        <img src="{{asset('frontend/images/CAR202306220012_MG_ZS_20230622_094740224_WATERMARK.png')}}" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="car-name">2016 Honda CR-V </div>
                                        <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                        <div class="car-province">กรุงเทพมหานคร</div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-xl-9">
                                                <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                            </div>
                                            <div class="col-12 col-md-4 col-xl-3 text-end">
                                                <div class="txt-readmore">ดูเพิ่มเติม</div>
                                            </div>
                                        </div>
                                        <div class="linecontent"></div>
                                        <div class="row caritem-price">
                                            <div class="col-12 col-md-6">
                                                <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> เกียร์อัตโนมัติ</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-itemcar">
                            <a href="#" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="{{asset('frontend/images/icon-tagnew.svg')}}" alt=""> รถมาใหม่</div>
                                        <img src="{{asset('frontend/images/CAR202306210019_MG_HS_20230621_105157543_WATERMARK.png')}}" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="car-name">2016 Honda CR-V </div>
                                        <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                        <div class="car-province">กรุงเทพมหานคร</div>
                                        <div class="row">
                                            <div class="col-12 col-md-8 col-xl-9">
                                                <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                            </div>
                                            <div class="col-12 col-md-4 col-xl-3 text-end">
                                                <div class="txt-readmore">ดูเพิ่มเติม</div>
                                            </div>
                                        </div>
                                        <div class="linecontent"></div>
                                        <div class="row caritem-price">
                                            <div class="col-12 col-md-6">
                                                <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> เกียร์อัตโนมัติ</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div> -->

                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?php
// echo "<pre>";
// print_r($news);
// echo "</pre>";
?>
@if(isset($news) && (count($news) > 0))
<section class="row">
    <div class="col-12 home-news wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 box-topichome">
                    <h3 class="topic-home"><i class="bi bi-circle-fill"></i> อัพเดทข่าวยานยนต์</h3>
                    <a href="{{route('newsPage')}}" class="btn-red">ดูทั้งหมด</a>
                </div>
            </div>
            <div class="row">
                @php
                $feature0_news = ($news[0]->feature)?asset($news[0]->feature):asset('public/uploads/default-car.jpg');
                @endphp
                <div class="col-12 col-xl-6 home-news-lg">
                    <a href="{{route('newsdetailPage', ['news_id' => $news[0]->id])}}" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{$feature0_news}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">{{$news[0]->title}}</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> {{date('d M Y H:i', strtotime($news[0]->created_at))}}</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="row">
                        @foreach($news as $keynews => $newsres)
                            @if($keynews != 0)

                            @php
                            $feature_news = ($newsres->feature)?asset($newsres->feature):asset('public/uploads/default-car.jpg');
                            @endphp
                            <div class="col-6">
                                <a href="{{route('newsdetailPage', ['news_id' => $newsres->id])}}" class="home-itemnews">
                                    <figure>
                                        <div class="cover-news">
                                            <img src="{{$feature_news}}" alt="">
                                        </div>
                                        <figcaption>
                                            <div class="item-topicnews">{{$newsres->title}}</div>
                                            <div class="news-date"><i class="bi bi-calendar3"></i> {{date('d M Y H:i', strtotime($newsres->created_at))}}</div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@include('frontend.layouts.inc_carseo')	

<?php

$data = session()->all();
$customerdata = session('customer');
// echo "<pre>";
// print_r($customerdata);
// echo "</pre>";
?>
<div style="display: none;" id="help-carsearch">
    <div class="frm-helpcarsearch">
        <div class="topic-helpcar"><img src="{{asset('frontend/images/carred.svg')}}" alt="" class="svg"> ช่วยคุณหารถที่ใช่</div>
        <p>ให้รถพร้อมขายช่วยหารถให้คุณ</p>
        <form method="post" action="{{route('helpcaractionPage')}}">
            @csrf
            <input type="hidden"  name="customer_id	" value="{{$customerdata->id??''}}" >
            <input type="text" class="form-control" name="name" value="" placeholder="ชื่อ - นามสกุล">
            <input type="text" class="form-control" name="tel" value="" placeholder="เบอร์โทรติดต่อ">
            <input type="text" class="form-control" name="line" value="" placeholder="Line ID">
            <input type="text" class="form-control" name="messages" value="" placeholder="รุ่นรถที่ต้องการ">
            <button type="submit" class="btn-red">ส่งข้อมูล</button>
        </form>
    </div>
</div>

<script>
    function submit1() {
        // console.log($('#province').find('option:selected').text());
        var province = $('#province').find('option:selected').text();
        
        if ($('#province').text() !== "จังหวัด" && $('#province').val() !== "" && $('#province').val() !== "จังหวัด") {
            var newButton = $('<button type="button" onclick="del(this)">'+province+' <i class="bi bi-x"></i></button>');
            $('.boxshow-advance').append(newButton);
        }
        

        // console.log("color="+$('#color').val());
        if($('#color').val() !== "") {
            var newButton = $('<button type="button" onclick="del(this)">'+$('#color').val()+' <i class="bi bi-x"></i></button>');
            $('.boxshow-advance').append(newButton);
        }


        if($("input[name='gear']").val() !== "") {
            console.log($("input[name='gear']").val());
            var newButton;
            if ($("input[name='gear']").val() === "auto") {
                newButton = $('<button type="button" onclick="del(this)">เกียร์อัตโนมัติ <i class="bi bi-x"></i></button>');
            }

            if ($("input[name='gear']").val() === "manual") {
                newButton = $('<button type="button" onclick="del(this)">เกียร์ธรรมดา<i class="bi bi-x"></i></button>');
            }
            
            $('.boxshow-advance').append(newButton);
        }


        if($('#power').val() !== "") {
            var newButton;
            if ($('#power').val() == 1) {
                newButton = $('<button type="button" onclick="del(this)">รถน้ำมัน / hybrid <i class="bi bi-x"></i></button>');
            }
            
            if ($('#power').val() == 2) {
                newButton = $('<button type="button" onclick="del(this)">รถไฟฟ้า EV 100% <i class="bi bi-x"></i></button>');
            }

            if ($('#power').val() == 3) {
                newButton = $('<button type="button" onclick="del(this)">รถติดแก๊ส <i class="bi bi-x"></i></button>');
            }
            $('.boxshow-advance').append(newButton);
        }
    }
    function province(data){
        console.log($(data).find('option:selected').text());
    }
    function del(data){
        $(data).remove();
    }
    function delall(){
        // Remove all buttons within the boxshow-advance container
        $('.boxshow-advance').find('button:not(.btn-resetsearch)').remove();
        $('.boxshow-advance').show();
    }

    function search4() {
        $('input[name="brand_id"]').val(brand_id);
        $('input[name="model_id"]').val(model_id);
        $('input[name="generation_id"]').val(generation_id);
        $('input[name="submodel_id"]').val(submodel_id);
        $('input[name="pricelow"]').val($('.pricelow').text().replace(/,/g, ''));
        $('input[name="pricehigh"]').val($('.pricehigh').text().replace(/,/g, ''));
        $('input[name="yearlow"]').val($('.yearlow').text());
        $('input[name="yearhigh"]').val($('.yearhigh').text());
        $('#my_form').submit();
    }
</script>
@endsection
