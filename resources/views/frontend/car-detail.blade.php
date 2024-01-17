@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - car detail</title>
@endsection

@section('content')
<?php
$arr_gear = array(
    'auto' => 'เกียร์อัตโนมัติ',
    'manual' => 'เกียร์ธรรมดา',
);

// echo "<pre>";
// print_r($customerdata);
// echo "</pre>";
// echo "<pre>";
// print_r($cars);
// echo "</pre>";
?>


<section class="row">
    <div class="col-12 wrap-pagecardetail wrap-page wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 detail_slide">
                    <div class="slide-wrapper">
                        <div class="tab_pdetail slide_load cover-radius">
                            @if($cars->reserve == 1)
                            <div class="car-booked"><div>จองแล้ว</div></div>
                            @endif
                            
                            <div class="owl-carousel owl-theme slider">
                                <div class="item">
                                    <a href="{{asset($cars->feature)}}" data-fancybox="gallery" class="cover-carthumb"><img src="{{asset($cars->feature)}}"></a>
                                </div>
                                @foreach($exterior as $ext)
                                <div class="item">
                                    <a href="{{asset($ext->gallery)}}" data-fancybox="gallery" class="cover-carthumb"><img src="{{asset($ext->gallery)}}"></a>
                                </div>
                                @endforeach
                                <!-- <div class="item">
                                    <a href="images/c01.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c01.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c02.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c02.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c03.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c03.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c04.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c04.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c05.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c05.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c06.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c06.webp"></a>
                                </div> -->
                            </div>
                        </div>
                        <!-- รูปภายนอก -->
                        <div class="tab_pdetail slide_load cover-radius">
                            <!-- <div class="car-booked"><div>จองแล้ว</div></div> -->
                            <div class="owl-carousel owl-theme slider">
                                <!-- <div class="item">
                                    <a href="{{asset($cars->feature)}}" data-fancybox="gallery" class="cover-carthumb"><img src="{{asset($cars->feature)}}"></a>
                                </div> -->
                                @foreach($interior as $int)
                                <div class="item">
                                    <a href="{{asset($int->gallery)}}" data-fancybox="gallery" class="cover-carthumb"><img src="{{asset($int->gallery)}}"></a>
                                </div>
                                @endforeach
                                <!-- <div class="item">
                                    <a href="images/c07.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c07.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c08.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c08.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c09.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c09.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c10.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c10.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c11.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c11.webp"></a>
                                </div>
                                <div class="item">
                                    <a href="images/c12.webp" data-fancybox="gallery" class="cover-carthumb"><img src="images/c12.webp"></a>
                                </div> -->
                            </div>
                        </div>
                         <!-- รูปห้องโดยสาร -->
                    </div>
                    <div class="bg-thumb">
                        <div class="tab_article_btn">
                            <div class="active">ภายนอก</div>
                            <div>ห้องโดยสาร</div>
                        </div>
                        <div class="slide-wrapper">
                            <div class="tab_pdetail_thumb slide_load">
                                <div id="sync2" class="owl-carousel owl-theme navigation-thumbs">
                                    <div class="item cover-carthumb">
                                        <img src="{{asset($cars->feature)}}">
                                    </div>
                                    @foreach($exterior as $ext)
                                    <div class="item cover-carthumb">
                                        <img src="{{asset($ext->gallery)}}">
                                    </div>
                                    @endforeach
                                    <!-- <div class="item cover-carthumb">
                                        <img src="images/c01.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c02.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c03.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c04.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c05.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c06.webp">
                                    </div> -->
                                </div>
                            </div>
                            <!-- thumb รูปภายนอก -->
                            <div class="tab_pdetail_thumb slide_load">
                                <div id="sync2" class="owl-carousel owl-theme navigation-thumbs">
                                    @foreach($interior as $int)
                                    <div class="item cover-carthumb">
                                        <img src="{{asset($int->gallery)}}">
                                    </div>
                                    @endforeach
                                    <!-- <div class="item cover-carthumb">
                                        <img src="images/c07.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c08.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c09.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c10.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c11.webp">
                                    </div>
                                    <div class="item cover-carthumb">
                                        <img src="images/c12.webp">
                                    </div> -->
                                </div>
                            </div>
                            <!-- thumb รูปห้องโดยสาร -->
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-12 col-lg-6">
                    <div class="desc-cardetail">
                        <h1>{{$cars->modelyear." ".$cars->brands_title." ".$cars->model_name}}</h1>
                        <div class="car-spectype">
                            <div class="car-type01">{{$cars->model_name." ".$cars->sub_models_name}}</div>
                            <span>|</span>
                            <div>{{$arr_gear[$cars->gear]??''}}</div>
                        </div>
                        <div class="car-type02">โฉม {{$cars->generations_name}} </div>
                        <!-- <div class="car-timelogin">เข้าสู่ระบบ 1 วันที่ผ่านมา</div> -->
                        <div class="box-listdesc">
                            <div class="row">
                                <div class="col-3">
                                    <span class="topic-listdesc">ราคา</span>
                                </div>
                                <div class="col-9 text-end">
                                    <span class="car-listprice">{{number_format($cars->price, 0, '.', ',')}}.-</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-listdesc">
                            <div class="row">
                                <div class="col-3">
                                    <span class="topic-listdesc">เลขไมล์</span>
                                </div>
                                <div class="col-9 text-end">
                                    <span class="topic-listdesc">{{$cars->mileage??''}} กม.</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-listdesc">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <span class="topic-listdesc">ดูรถได้ที่</span>
                                </div>
                                <div class="col-12 col-md-9 listdesc-location text-end">
                                   <div class="car-location"><i class="bi bi-geo-alt"></i> {{$cars->customer_proveince.','.$cars->customer_place}}</div>
                                   <div class="car-linkmap">
                                       <a data-fancybox data-src="{{asset($cars->customer_map)}}" href="#" target="_blank">View Location Map</a>
                                       <a href="{{$cars->customer_google_map}}" target="_blank">Google Map</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="box-listdesc">
                            <div class="row">
                                <div class="col-5">
                                    <span class="topic-listdesc"><i class="bi bi-person-circle"></i> ติดต่อผู้ขาย</span>
                                </div>
                                <div class="col-7 text-end">
                                    

                                <a href="tel:{{$cars->customer_phone}}" data-post="{{$cars->id}}" target="_blank" class="btn-red" onclick="updateClickCount({{$cars->id}}, this)">
                                    <i class="bi bi-telephone-fill"></i> {{$cars->firstname}}
                                </a>

                                @if(isset($cars->customer_line))
                                    <a href="https://line.me/ti/p/~{{$cars->customer_line}}" data-post="{{$cars->id}}" target="_blank" class="btnline btn-red" style="background-color:#00b900;" onclick="updateClickCount({{$cars->id}}, this)">
                                        LINE
                                    </a>
                                @endif

                                </div>
                                
                            </div>
                        </div> -->

                        <div class="box-listdesc">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <span class="topic-listdesc"><i class="bi bi-person-circle"></i> ติดต่อผู้ขาย</span>
                                </div>
                                <div class="col-12 col-sm-8 listdesc-contact text-end">
                                    <a href="tel:{{$cars->customer_phone}}" data-post="{{$cars->id}}" target="_blank" class="btn-red" onclick="updateClickCount({{$cars->id}}, this)">
                                        <i class="bi bi-telephone-fill"></i> คุณ{{$cars->firstname}}&nbsp;<div>{{$cars->customer_phone}}</div>
                                    </a>

                                    @if(isset($cars->customer_line))
                                        <a href="https://line.me/ti/p/~{{$cars->customer_line}}" data-post="{{$cars->id}}" target="_blank" class="btnline btn-red" style="background-color:#00b900;" onclick="updateClickCount({{$cars->id}}, this)">
                                            LINE
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="box-listdesc">
                            <div class="row">
                                <div class="col-12 col-md-9">
                                    <a data-fancybox data-src="#contactback" href="javascript:;" class="btn-callback">ฝากข้อมูลให้ผู้ขายติดต่อกลับ <i class="bi bi-chat-text-fill"></i></a>
                                    <div style="display: none;" id="contactback">
                                        <div class="cardesc-frmcontact frm-contactback">
                                            <div class="topic-helpcar">ฝากข้อมูลให้ผู้ขายติดต่อกลับ</div>
                                            <?php

                                            $data = session()->all();
                                            $customerdata = session('customer');
                                            // echo "<pre>";
                                            // print_r($customerdata);
                                            // echo "</pre>";
                                            ?>
                                            <form method="post" action="{{route('contactcaractionPage')}}">
                                                @csrf
                                                <input type="hidden"  name="customer_id" value="{{$customerdata->id??''}}" >
                                                <input type="hidden"  name="cars_id" value="{{$cars->id}}" >
                                                <div class="row">
                                                    <div class="col-12 box-frmcontactback">
                                                        <label> ชื่อ - นามสกุล<span>*</span></label>
                                                        <input type="text" class="form-control" name="name" placeholder="ชื่อ - นามสกุล">
                                                    </div>
                                                    <div class="col-12 col-md-6 box-frmcontactback">
                                                        <label>เบอร์โทรติดต่อ<span>*</span></label>
                                                        <input type="text" class="form-control" name="tel" placeholder="เบอร์โทรติดต่อ">
                                                    </div>
                                                    <div class="col-12 col-md-6 box-frmcontactback">
                                                        <label>เวลาที่สะดวกให้ติดต่อกลับ<span>*</span></label>
                                                        <input type="text" class="form-control" name="time" placeholder="ระบุเวลา">
                                                    </div>
                                                    <div class="col-12 box-frmcontactback">
                                                        <label>หมายเหตุ</label>
                                                        <textarea rows="4" class="form-control" name="remark"></textarea>
                                                    </div>
                                                    <div class="col-12 col-md-9 box-frmcontactback">
                                                        <label class="list-checkbox">ฉันยอมรับ<a href="#" target="_blank">เงื่อนไขและนโยบายของ RodPromptkai</a> 
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="list-checkbox">ฉันยินยอมส่งข้อมูลส่วนตัวแก่ผู้ขาย
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-3 box-frmcontactback">
                                                        <button class="btn-red">ส่งข้อมูล</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 desc-btnshare text-end">
                                   <!-- <a data-fancybox data-src="#popup-share" href="javascript:;" class="btn-sharepost"><img src="{{asset('frontend/images/icon-share2.svg')}}" alt=""> แชร์</a> -->
                                   <div style="display: none;" id="popup-share">
                                        <div class="frm-popupshare frm-contactback">
                                            <div class="topic-popupshare topic-helpcar"><span>แชร์รถยนต์</span><br>2019 Mercedes-Benz S560e</div>
                                            <div class="wrap-btnshare">
                                                <button class="btn-popupshare icon-fb"><i class="bi bi-facebook"></i></button>
                                                <button class="btn-popupshare icon-messenger"><i class="bi bi-messenger"></i></button>
                                                <button class="btn-popupshare icon-line"><i class="bi bi-line"></i></button>
                                            </div>
                                            <div class="txt-copylink text-center">คัดลอกลิงค์</div>
                                            <div class="popupshare-link">
                                                <di class="box-linkname">https://aomz.orangeworkshop.info/rodpromptkai/car-detail.php</di>
                                                <div class="btn-copylink"><i class="bi bi-link-45deg"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-9 col-md-12">
                                    <div class="carprice-open">เปิดตัวในราคา 2,559,000</div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-descpromotion wrap-page wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-descpromotion">{{$cars->title}}</div>
                    <div class="desc-wrapper">
                        <div class="desc content-editor">
                            <!-- {{$cars->detail}} -->
                            {!!$cars->detail!!}
                            <!-- <ul>
                                <li>รถบ้านใช้เอง รุ่นท็อป ไมล์แท้ เจ้าของขายเอง รถเข้าศูนย์ตลอด BSI 10 ปี</li>
                                <li>โฉมล่าสุด LCI, BSI/warranty-2026</li>
                                <li>paddle shift, ชุดแต่ง+แมกซ์+พ.ฟังก์ชั่นM</li>
                                <li>NAVI, ระบบช่วยจอด, brake hold, แมกซ์19”</li>
                                <li>กล้องหลัง, เซ็นเซอร์หน้า+หลัง, ท้ายไฟฟ้า</li>
                            </ul>
                            <p>
                            Lorem ipsum dolor sit amet, ante dignissim, varius elit urna erat odio lectus. Aenean laoreet pellentesque justo maecenas nec, viverra diam cras, lorem at vitae vestibulum, arcu lobortis ac. Netus vitae wisi odio vitae sagittis tortor, cras mauris accumsan sed ornare phasellus pellentesque, tellus morbi non in lectus vel volutpat, arcu eu a, et at urna donec integer suscipit orci. Elit nisl hendrerit mus dui. Commodo eget odio, in nulla eget, curabitur enim sed semper. At malesuada pharetra felis commodo facilisi egestas, in praesent in neque lorem libero nostrud, turpis ac, blandit fringilla vestibulum odio nullam, sit etiam ut. Lectus integer facilisis in fusce erat amet. 
                            </p> -->
                            <br>
                            <div class="topic-descpromotion">การรับประกันหลังการขาย</div>


                            @if ($cars->warranty_1 == 1)
                                <p><i class="bi bi-check"></i> รถได้รับการตรวจสภาพโดยผู้เชี่ยวชาญ</p>
                            @endif

                            @if ($cars->warranty_2 == 1)
                                <p><i class="bi bi-check"></i> มีการรับประกัน </p>
                                @if (!empty($cars->warranty_2_input))
                                    <p>{{ $cars->warranty_2_input }}</p>
                                @endif
                            @endif

                            @if ($cars->warranty_3 == 1)
                                <p><i class="bi bi-check"></i> มีบริการช่วยเหลือฉุกเฉิน 24 ชม.</p>
                            @endif
                        </div>
                    </div>
                    <button class="more-info">
                        <span class="more">รายละเอียดโปรโมชั่น... ดูเพิ่มเติม <img src="{{asset('frontend/images/icon-arrow-blue.svg')}}" alt=""></span>
                        <span class="less">ซ่อนรายละเอียด <img src="{{asset('frontend/images/icon-arrow-blue.svg')}}" alt=""></span>
                    </button>

                    <!-- <div class="recent-carlist">
                        <h2 class="topic-cardesc"><i class="bi bi-circle-fill"></i> รถ S560e โฉมF48 ปี21-ปัจจุบัน ทั้งหมด</h2>
                        <div class="row">
                            <div class="col-6 col-lg-3 mb-recentlist">
                                <a href="car-detail.php" class="item-recentlist">
                                    <figure>
                                        <div class="cover-recentlist"><img src="{{asset('frontend/images/67_1.jpeg')}}" alt=""></div>
                                        <figcaption>
                                            <div class="price-recentlist">1,290,000.-</div>
                                            <span>2023</span>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 mb-recentlist">
                                <a href="car-detail.php" class="item-recentlist">
                                    <figure>
                                        <div class="cover-recentlist"><img src="{{asset('frontend/images/CAR202306290015_Mercedes-Benz_GLA250_20230629_102211629_WATERMARK.png')}}" alt=""></div>
                                        <figcaption>
                                            <div class="price-recentlist">1,290,000.-</div>
                                            <span>2023</span>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 mb-recentlist">
                                <a href="car-detail.php" class="item-recentlist">
                                    <figure>
                                        <div class="cover-recentlist"><img src="{{asset('frontend/images/14_1.jpeg')}}" alt=""></div>
                                        <figcaption>
                                            <div class="price-recentlist">1,290,000.-</div>
                                            <span>2023</span>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 mb-recentlist">
                                <a href="car.php" class="item-recentlist">
                                    <div class="recent-clickall">+55</div>
                                    <figure>
                                        <div class="cover-recentlist"><img src="{{asset('frontend/images/94_1.jpeg')}}" alt=""></div>
                                        <figcaption>
                                            <div class="price-recentlist">1,290,000.-</div>
                                            <span>2023</span>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-12 bg-average wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-average"><img src="{{asset('frontend/images/icon-average.svg')}}" alt=""> Average</div>
                </div>
            </div>
            <div class="row wrap-average">
                <div class="col-12 col-lg-7">
                    <div class="box-average">
                        <div class="row">
                            <div class="col-9">
                                <div class="brandcar-average">
                                    @if (isset($cars->brands_feature))
                                    <img src="{{asset($cars->brands_feature)}}" alt="">
                                    @endif
                                    <span>{{$cars->brands_title." ".$cars->model_name}}</span> โฉม {{$cars->generations_name}}
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <a href="{{url('/check-price').'/'.$cars->brand_id.'/'.$cars->model_id}}" class="average-viewall">ดูทั้งหมด</a>
                            </div>
                        </div>
                        <div class="average-bar">
                            @php
                                $topprice = $cars->price;
                            @endphp



                            @if (isset($yearprice))
                            @foreach ($yearprice as $index => $rows)

                                @if ($rows->modelyear == $cars->modelyear)
                                    @php
                                        if ($rows->max_price > $topprice) {
                                            $topprice = $rows->max_price;
                                        }
                                    @endphp
                                @elseif ($rows->modelyear < $cars->modelyear)
                                    @php
                                        if ($rows->max_price > $topprice) {
                                            $topprice = $rows->max_price;
                                        }
                                    @endphp
                                @endif

                                @if ($index + 1 == 6)
                                    @php
                                        break;
                                    @endphp
                                @endif

                            @endforeach


                            
                            @foreach ($yearprice as $index => $rows)

                                @if ($rows->modelyear == $cars->modelyear)
                                <div class="item-bar active">
                                    <div class="animated-progress"> <span data-progress="{{ceil( (100/$topprice) * $rows->avg_price )}}"></span></div>
                                    <div class="bar-year">{{$rows->modelyear}}</div>
                                    <div class="txt-seeyear">ปีที่คุณดูอยู่</div>
                                </div>
                                @elseif ($rows->modelyear < $cars->modelyear)
                                <div class="item-bar">
                                    <div class="animated-progress"> <span data-progress="{{ceil( (100/$topprice) * $rows->avg_price )}}"></span></div>
                                    <div class="bar-year">{{$rows->modelyear}}</div>
                                </div>
                                @endif

                                @if ($index + 1 == 6)
                                    @php
                                        break;
                                    @endphp
                                @endif

                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 photo-average">
                    <figure><img src="{{asset($cars->feature)}}" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-carreccom wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-cardesc"><i class="bi bi-circle-fill"></i> รถพร้อมขายแนะนำ</div>
                </div>
            </div>
            <div class="row">
                @foreach($allcars as $allcar)
                <div class="col-6 col-lg-3 mb-recentlist">
                    <a href="{{route('cardetailPage', ['post' => $allcar->id])}}" class="item-recentlist">
                        <figure>
                            <div class="cover-recentlist"><img src="{{asset($allcar->feature)}}" alt=""></div>
                            <figcaption>
                                <div class="price-recentlist">{{number_format($allcar->price, 0, '.', ',')}}.-</div>
                                <span>{{$allcar->modelyear}}</span>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
                

            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-alsolike wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-cardesc"><i class="bi bi-circle-fill"></i> รถที่คุณอาจชอบ</div>
                </div>
            </div>
            <div class="row">
                @foreach($allcars2 as $allcar2)
                @php
                $profilecar2_img = ($allcar2->feature)?asset($allcar2->feature):asset('public/uploads/default-car.jpg');
                @endphp
                <div class="col-6 col-lg-3 col-itemcar mb-recentlist">
                    <a href="{{route('cardetailPage', ['post' => $allcar2->id])}}" class="item-car">
                        <figure>
                            <div class="cover-car">
                                <img src="{{$profilecar2_img}}" alt="">
                            </div>
                            <figcaption>
                                <div class="car-name">{{$allcar2->modelyear." ".$allcar2->brands_title." ".$allcar2->model_name}} </div>
                                <div class="car-series">{{$allcar2->generations_name." ".$allcar2->sub_models_name}}</div>
                                <div class="car-province">@if(isset($allcar2->customer_proveince)){{$allcar2->customer_proveince}}@else{{"-"}}@endif</div>
                                <div class="row">
                                    <div class="col-12 col-xl-9">
                                        <div class="descpro-car">{{$allcar2->title}}</div>
                                    </div>
                                    <div class="col-12 col-xl-3 text-end">
                                        <div class="txt-readmore">ดูเพิ่มเติม</div>
                                    </div>
                                </div>
                                <div class="linecontent"></div>
                                <div class="row caritem-price">
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> {{$arr_gear[$allcar2->gear]}}</div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6 text-end">
                                        <div class="car-price">{{number_format($allcar2->price, 0, '.', ',')}}.-</div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
                

            </div>
            <div class="row">
                <div class="col-12">
                    <h6>เพื่อป้องกันการถูกหลอกลวง โปรดตรวจสอบข้อมูลรถและผู้ขายก่อนทำการชำระเงิน</h6>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('script')

<script>
    function updateClickCount(carId, element) {
        // Send AJAX request to update click count
        fetch(`/update-click-count/${carId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({}),
        })
        .then(response => response.json())
        .then(data => {
            // After the click count is updated, proceed to the link
            if (element && element.getAttribute) {
                window.location.href = element.getAttribute('href');
            } else {
                console.error('Element or attribute not found.');
            }
        })
        .catch(error => {
            console.error('Error updating click count:', error);
        });
    }
</script>





<script>
$(document).ready(function(){
    $( '.tab_article_btn > div' ).click(function (event) {
        $('.tab_pdetail, .tab_pdetail_thumb').removeClass('slide_load');
        var idarticle = $(this).index();
            $('.tab_pdetail, .tab_pdetail_thumb').hide();
            $('.tab_pdetail_thumb').eq(idarticle).show();
            $('.tab_pdetail').eq(idarticle).show();
            $('.tab_article_btn > div').removeClass('active');
            $(this).addClass('active');
        event.stopPropagation();
	});

    $('.detail_slide').each(function(){
        (function(_e){
      var sync1 = $(_e).find(".slider");
      var sync2 = $(_e).find(".navigation-thumbs");

      var thumbnailItemClass = '.owl-item';

      var slides = sync1.owlCarousel({
        video:true,
        startPosition: 0,
        items:1,
        loop:false,
        rewind: true,
        margin:10,
        smartSpeed: 2000,
        autoplayTimeout: 8000,
        autoplay:false,
        autoplayHoverPause: false,
        autoplayHoverPause:false,
        navText: ['<span><i class="fas fa-chevron-left"></i></span>','<span><i class="fas fa-chevron-right"></i></span>'],
        nav: false,
        dots: false
      }).on('changed.owl.carousel', syncPosition);

      function syncPosition(el) {
        $owl_slider = $(this).data('owl.carousel');
        var loop = $owl_slider.options.loop;

        if(loop){
          var count = el.item.count-1;
          var current = Math.round(el.item.index - (el.item.count/2) - .5);
          if(current < 0) {
              current = count;
          }
          if(current > count) {
              current = 0;
          }
        }else{
          var current = el.item.index;
        }

        var owl_thumbnail = sync2.data('owl.carousel');
        var itemClass = "." + owl_thumbnail.options.itemClass;


        var thumbnailCurrentItem = sync2
        .find(itemClass)
        .removeClass("synced")
        .eq(current);

        thumbnailCurrentItem.addClass('synced');

        if (!thumbnailCurrentItem.hasClass('active')) {
          var duration = 300;
          sync2.trigger('to.owl.carousel',[current, duration, true]);
        }   
      }
      var thumbs = sync2.owlCarousel({
        startPosition: 0,
        items:5,
        loop:false,
        margin:13,
        autoplay:false,
        smartSpeed: 2000,
        autoplayTimeout: 8000,
        autoplayHoverPause: false,
        nav: true,
        navText: ['<span><i class="fas fa-chevron-left"></i></span>','<span><i class="fas fa-chevron-right"></i></span>'],
        dots: false,
        responsive:{
            0:{
                items:3,
                margin:10
            },
            500:{
                items:3
            },
            768:{
                items:5
            },
            1000:{
                items:3
            },
            1201:{
                items:5
            }
        },
        onInitialized: function (e) {
          var thumbnailCurrentItem =  $(e.target).find(thumbnailItemClass).eq(this._current);
          thumbnailCurrentItem.addClass('synced');
        },
      })
      .on('click', thumbnailItemClass, function(e) {
          e.preventDefault();
          var duration = 300;
          var itemIndex =  $(e.target).parents(thumbnailItemClass).index();
          sync1.trigger('to.owl.carousel',[itemIndex, duration, true]);
      }).on("changed.owl.carousel", function (el) {
        var number = el.item.index;
        $owl_slider = sync1.data('owl.carousel');
        $owl_slider.to(number, 100, true);
      });
      })(this);
    });

});
</script>

<script>
    $(document).ready(function() {
  
  var descMinHeight = 145;
  var desc = $('.desc');
  var descWrapper = $('.desc-wrapper');

  // show more button if desc too long
  if (desc.height() > descWrapper.height()) {
    $('.more-info').show();
  }
  
  // When clicking more/less button
  $('.more-info').click(function() {
    
    var fullHeight = $('.desc').height();

    if ($(this).hasClass('expand')) {
      // contract
      $('.desc-wrapper').animate({'height': descMinHeight}, 'slow');
    }
    else {
      // expand 
      $('.desc-wrapper').css({'height': descMinHeight, 'max-height': 'none'}).animate({'height': fullHeight}, 'slow');
    }

    $(this).toggleClass('expand');
    return false;
  });



$(window).scroll(testScroll);
    var viewed = false;

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function testScroll() {
        if (isScrolledIntoView($(".bg-average")) && !viewed) {
            viewed = true;
            $(".animated-progress span").each(function () {
            $(this).animate(
                {
                height: $(this).attr("data-progress") + "%",
                },
                1000
            );
            });
        }
    }

});
</script>
@endsection
