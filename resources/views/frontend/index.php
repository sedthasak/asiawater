<!doctype html>
<html>

<head>
	<?php require('inc_head.php'); ?>
</head>

<body>

<div class="container-fluid">
	
<?php require('inc_menu.php'); ?>

<section class="row">
    <div class="col-12 col-xl-9 wrapbanner wow fadeInDown">
        <div class="owl-bannerslide owl-carousel owl-theme">
            <div class="items">
                <figure><img src="images/banner02.png" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="images/banner01.png" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="images/banner03.png" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="images/banner04.png" alt=""></figure>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-3 box-search-car">
        <div class="bg-searchcar">
            <div class="topic-carsearch"><img class="svg" src="images/icon-carred.svg" alt=""> ค้นหารถยนต์</div>
            <span class="short-desc-search">ค้นหารถมือสอง รถใหม่ ราคาโดนใจในรถพร้อมขายกับเรา</span>
            <div class="carsearch-input">
                <input type="text" readonly value="ยี่ห้อรถ">
            </div>
            <div class="home-popup-search"><?php require('inc-popup-carsearch.php'); ?></div> 
            <div class="carsearch-radio">
                <label class="car-radio">ซื้อสด
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>
                <label class="car-radio">จัดไฟแนนซ์
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>
            </div>

            <div class="box-searchrange">
                <div class="search-range">
                    <div class="topic-range">
                        <div>งบประมาณ</div>
                        <div>
                            <div id="minprice"></div>
                            <span>-</span>
                            <div id="maxprice"></div>
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
                            <div id="minyear"></div>
                            <div id="maxyear"></div>
                        </div>
                    </div>
                    <div class="box-priceslider">
                        <div id="yearslider"></div>
                    </div>
                </div>
            </div>
            
            <div class="wrap-boxadvance">
                <a href="#" class="btn-advancesearch">ค้นหารถยนต์แบบละเอียด <img src="images/chevron-red.svg" alt=""></a>
                <div class="box-advancesearch">
                    <div class="box-advancesearch-head">
                        <span>ค้นหารถยนต์แบบละเอียด</span>
                        <button class="advance-exit">ยกเลิก</button>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                            <select name="" id="" class="form-select">
                                <option>จังหวัด</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                            <select name="" id="" class="form-select">
                                <option>สี</option>
                                <option>ทุกสี</option>
                                <option>ขาว</option>
                                <option>เขียว</option>
                                <option>ครีม</option>
                                <option>ชมพู</option>
                                <option>ดำ</option>
                                <option>แดง</option>
                                <option>เทา</option>
                                <option>น้ำเงิน</option>
                                <option>น้ำตาล</option>
                                <option>บรอนซ์เงิน</option>
                                <option>บรอนซ์ทอง</option>
                                <option>ฟ้า</option>
                                <option>ม่วง</option>
                                <option>ส้ม</option>
                                <option>เหลือง</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                            <div class="advance-boxgear">
                                <div>เกียร์</div>
                                <div>
                                    <label><input type="radio" name="advance-gear"> <span>อัตโนมัติ</span></label>
                                    <label><input type="radio" name="advance-gear"> <span>ธรรมดา</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-9 col-xl-12">
                            <select name="" id="" class="form-select">
                                <option>แก๊ส</option>
                                <option>ติดแก๊ส</option>
                                <option>ไม่ติดแก๊ส</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3 col-xl-12">
                            <a href="#" class="btn-submitsearch btn-searchcar">ยืนยัน</a>
                        </div>
                    </div>
                </div>

                <div class="boxshow-advance">
                    <button class="btn-resetsearch"><img src="images/icon-reset-white.svg" alt="">ล้าง</button>
                    <button>กรุงเทพฯ <i class="bi bi-x"></i></button>
                    <button>สีขาว<i class="bi bi-x"></i></button>
                    <button>เกียร์อัตโนมัติ<i class="bi bi-x"></i></button>
                </div>

                <a href="#" class="btn-searchcar">ค้นหารถยนต์</a>
            </div>
        </div>
    </div>
</section>

<section class="row wow fadeInDown">
    <div class="col-12 col-lg-4 col-xl-3 bg-findcar">
        <div class="desc-findcar">
            <div class="topic-findcar">
                <img class="svg" src="images/icon-carred.svg" alt=""> ช่วยคุณหารถที่ใช่
            </div>
            <p>ให้รถพร้อมขายช่วยหารถให้คุณ</p>
            <a data-fancybox data-src="#help-carsearch" href="javascript:;">คลิกเลย <i class="bi bi-chat-text-fill"></i></a>
        </div>
    </div>
    <div class="col-12 col-lg-8 col-xl-9 bg-carslide">
        <div class="box-carslide">
            <div class="owl-carslide owl-carousel owl-theme">
                <div class="items">
                    <a href="car.php"><figure><img src="images/car01.png" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="car.php"><figure><img src="images/car02.png" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="car.php"><figure><img src="images/car03.png" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="car.php"><figure><img src="images/car04.png" alt=""></figure></a> 
                </div>
                <div class="items">
                    <a href="car.php"><figure><img src="images/car05.png" alt=""></figure></a> 
                </div>
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
                    <a href="car.php" class="btn-red">ดูทั้งหมด</a>
                </div>
                <div class="col-12">
                    <div class="owl-bestsearch owl-carousel owl-theme">
                        <a href="car-detail.php" class="item-car">
                            <figure>
                                <div class="cover-car"><img src="images/cover-car.jpg" alt=""></div>
                                <figcaption>
                                    <div class="car-name">2016 Honda CR-V </div>
                                    <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                    <div class="car-province">กรุงเทพมหานคร</div>
                                    <div class="row">
                                        <div class="col-8 col-xl-9">
                                            <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                        </div>
                                        <div class="col-4 col-xl-3 text-end">
                                            <div class="txt-readmore">ดูเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="linecontent"></div>
                                    <div class="row caritem-price">
                                        <div class="col-6">
                                            <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="car-price">599,000.-</div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="car-detail.php" class="item-car">
                            <figure>
                                <div class="cover-car"><img src="images/CAR202305230062_MG_MG3_20230523_112434898_WATERMARK.png" alt=""></div>
                                <figcaption>
                                    <div class="car-name">2016 Honda CR-V </div>
                                    <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                    <div class="car-province">กรุงเทพมหานคร</div>
                                    <div class="row">
                                        <div class="col-8 col-xl-9">
                                            <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                        </div>
                                        <div class="col-4 col-xl-3 text-end">
                                            <div class="txt-readmore">ดูเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="linecontent"></div>
                                    <div class="row caritem-price">
                                        <div class="col-6">
                                            <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="car-price">599,000.-</div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="car-detail.php" class="item-car">
                            <figure>
                                <div class="cover-car"><img src="images/CAR202304290032_Mini_Cooper_20230429_133309985_WATERMARK.png" alt=""></div>
                                <figcaption>
                                    <div class="car-name">2016 Honda CR-V </div>
                                    <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                    <div class="car-province">กรุงเทพมหานคร</div>
                                    <div class="row">
                                        <div class="col-8 col-xl-9">
                                            <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                        </div>
                                        <div class="col-4 col-xl-3 text-end">
                                            <div class="txt-readmore">ดูเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="linecontent"></div>
                                    <div class="row caritem-price">
                                        <div class="col-6">
                                            <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="car-price">599,000.-</div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="car-detail.php" class="item-car">
                            <figure>
                                <div class="cover-car"><img src="images/CAR202304210377_BMW_X3_20230421_120846741_WATERMARK.png" alt=""></div>
                                <figcaption>
                                    <div class="car-name">2016 Honda CR-V </div>
                                    <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                    <div class="car-province">กรุงเทพมหานคร</div>
                                    <div class="row">
                                        <div class="col-8 col-xl-9">
                                            <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                        </div>
                                        <div class="col-4 col-xl-3 text-end">
                                            <div class="txt-readmore">ดูเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="linecontent"></div>
                                    <div class="row caritem-price">
                                        <div class="col-6">
                                            <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="car-price">599,000.-</div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="car-detail.php" class="item-car">
                            <figure>
                                <div class="cover-car"><img src="images/CAR202305300181_Mazda_3_20230530_234137900_WATERMARK.png" alt=""></div>
                                <figcaption>
                                    <div class="car-name">2016 Honda CR-V </div>
                                    <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                                    <div class="car-province">กรุงเทพมหานคร</div>
                                    <div class="row">
                                        <div class="col-8 col-xl-9">
                                            <div class="descpro-car">โปรออกรถ 1000 บาท ขับฟรี 15 วัน โปรออกรถ 1000 บาท ขับฟรี 15 วัน</div>
                                        </div>
                                        <div class="col-4 col-xl-3 text-end">
                                            <div class="txt-readmore">ดูเพิ่มเติม</div>
                                        </div>
                                    </div>
                                    <div class="linecontent"></div>
                                    <div class="row caritem-price">
                                        <div class="col-6">
                                            <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="car-price">599,000.-</div>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
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
                                    <img src="images/Isolation_Mode.svg" alt="">
                                </div>
                                <div class="box-itemnum">
                                    <div class="item-num">
                                        จำนวนรถมาใหม่ <div class="txt-num">412</div>
                                    </div>
                                    <div class="item-num">
                                        จำนวนรถทั้งหมด <div class="txt-num">15879</div>
                                    </div>
                                </div>
                            </div>
                            <div class="homeitem-button wow fadeInRight">
                                <div class="txt-homeitem">
                                    <div class="topic-homeitem"><img src="images/icon-carred.svg" class="svg" alt=""> รถยนต์แบบไหนที่เหมาะกับฉัน?</div>
                                    <div>ให้เราช่วยคุณค้นหารถที่ใช่ตามความต้องการของคุณ</div>
                                </div>
                                <a data-fancybox data-src="#help-carsearch" href="javascript:;" class="btn-red">ค้นหารถยนต์</a>
                            </div>
                        </div>
                    </div>
                    <div class="row row-item-postcar wow fadeInDown">
                        <div class="col-12 col-lg-4 item-postcar">
                            <a href="postcar-welcome.php">
                                <figure>
                                    <div class="cover-itempost"><img src="images/banner-carhome.webp" alt=""></div>
                                    <figcaption>
                                        <h3>ลงขายรถของคุณ ฟรี!</h3>
                                        <p>รถมือเดียว รถบ้านเจ้าของขายเอง</p>
                                        <div class="btn-itempostcar btn-itempostcar-home">ลงขายสำหรับรถบ้าน <img src="images/chevron.svg" class="svg" alt=""></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 item-postcar">
                            <a href="postcar-welcome-dealer.php">
                                <figure>
                                    <div class="cover-itempost"><img src="images/banner-cardealer.webp" alt=""></div>
                                    <figcaption>
                                        <h3>ลงขายสำหรับดีลเลอร์</h3>
                                        <p>เต็นท์รถที่น่าเชื่อถือ มีรับประกัน ขับได้สบายใจ</p>
                                        <div class="btn-itempostcar btn-itempostcar-dealer">ลงขายสำหรับดีลเลอร์ <img src="images/chevron.svg" class="svg" alt=""></div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 item-postcar">
                            <a href="postcar-welcome-lady.php">
                                <figure>
                                    <div class="cover-itempost"><img src="images/banner-carlady.webp" alt=""></div>
                                    <figcaption>
                                        <h3>คุณผู้หญิงลงขายรถ</h3>
                                        <p>เจ้าของเล่มรถเป็นผู้หญิง จอดมากกว่าขับ</p>
                                        <div class="btn-itempostcar btn-itempostcar-lady">ลงขายสำหรับคุณผู้หญิง <img src="images/chevron.svg" class="svg" alt=""></div>
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
                                    <img src="images/Isolation_Mode.svg" alt="">
                                </div>
                                <div class="box-itemnum">
                                    <div class="item-num">
                                        จำนวนรถมาใหม่ <div class="txt-num">412</div>
                                    </div>
                                    <div class="item-num">
                                        จำนวนรถทั้งหมด <div class="txt-num">15879</div>
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
                        <div class="col-6 col-md-4 col-itemcar">
                            <a href="car-detail.php" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="images/icon-tagnew.svg" alt=""> รถมาใหม่</div>
                                        <img src="images/CAR202304060092_Mini_Cooper_20230406_153757523_WATERMARK.png" alt="">
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
                                                <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
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
                            <a href="car-detail.php" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="images/icon-tagnew.svg" alt=""> รถมาใหม่</div>
                                        <img src="images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png" alt="">
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
                                                <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
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
                            <a href="car-detail.php" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="images/icon-tagnew.svg" alt=""> รถมาใหม่</div>
                                        <img src="images/CAR202304290032_Mini_Cooper_20230429_133309985_WATERMARK.png" alt="">
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
                                                <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
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
                            <a href="car-detail.php" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="images/icon-tagnew.svg" alt=""> รถมาใหม่</div>
                                        <img src="images/CAR202305090085_MG_HS_20230509_180516497_WATERMARK.png" alt="">
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
                                                <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
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
                            <a href="car-detail.php" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="images/icon-tagnew.svg" alt=""> รถมาใหม่</div>
                                        <img src="images/CAR202306220012_MG_ZS_20230622_094740224_WATERMARK.png" alt="">
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
                                                <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
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
                            <a href="car-detail.php" class="item-car">
                                <figure>
                                    <div class="cover-car">
                                        <div class="tag-newcar"><img src="images/icon-tagnew.svg" alt=""> รถมาใหม่</div>
                                        <img src="images/CAR202306210019_MG_HS_20230621_105157543_WATERMARK.png" alt="">
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
                                                <div class="txt-gear"><img src="images/icon-kear.svg" alt=""> เกียร์อัตโนมัติ</div>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <div class="car-price">599,000.-</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<section class="row">
    <div class="col-12 home-news wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 box-topichome">
                    <h3 class="topic-home"><i class="bi bi-circle-fill"></i> อัพเดทข่าวยานยนต์</h3>
                    <a href="news.php" class="btn-red">ดูทั้งหมด</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-6 home-news-lg">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="images/Rectangle 149.png" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">ต่อใบขับขี่หมดอายุ หรือหาย 2566 ทำยังไง ใช้เอกสารอะไรบ้าง</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="row">
                        <div class="col-6">
                            <a href="news-detail.php" class="home-itemnews">
                                <figure>
                                    <div class="cover-news">
                                        <img src="images/Rectangle 2251.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="item-topicnews">ต่อใบขับขี่หมดอายุ หรือหาย 2566 ทำยังไง</div>
                                        <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="news-detail.php" class="home-itemnews">
                                <figure>
                                    <div class="cover-news">
                                        <img src="images/Rectangle 2252.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="item-topicnews">ต่อใบขับขี่หมดอายุ หรือหาย 2566 ทำยังไง ใช้เอกสารอะไรบ้าง</div>
                                        <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="news-detail.php" class="home-itemnews">
                                <figure>
                                    <div class="cover-news">
                                        <img src="images/Rectangle 151.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="item-topicnews">ต่อใบขับขี่หมดอายุ หรือหาย 2566 ทำยังไง ใช้เอกสารอะไรบ้าง</div>
                                        <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="news-detail.php" class="home-itemnews">
                                <figure>
                                    <div class="cover-news">
                                        <img src="images/Rectangle 145.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div class="item-topicnews">ต่อใบขับขี่หมดอายุ หรือหาย 2566 ทำยังไง ใช้เอกสารอะไรบ้าง</div>
                                        <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require('inc_carseo.php'); ?>


<div style="display: none;" id="help-carsearch">
    <div class="frm-helpcarsearch">
        <div class="topic-helpcar"><img src="images/carred.svg" alt="" class="svg"> ช่วยคุณหารถที่ใช่</div>
        <p>ให้รถพร้อมขายช่วยหารถให้คุณ</p>
        <form>
            <input type="text" class="form-control" placeholder="ชื่อ - นามสกุล">
            <input type="text" class="form-control" placeholder="เบอร์โทรติดต่อ">
            <input type="text" class="form-control" placeholder="Line ID">
            <input type="text" class="form-control" placeholder="รุ่นรถที่ต้องการ">
            <button class="btn-red">ส่งข้อมูล</button>
        </form>
    </div>
</div>

	
<?php require('inc_footer.php'); ?>
		
<script>
    $( document ).ready(function() {
        $('.box-search-car .carsearch-input input').click(function (event) {
            if (  $( ".box-search-car .carsearch-popup" ).is( ":hidden" ) ) {
                $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.stopPropagation();
        });
        
        $('.box-search-car .carsearch-exit').click(function (event) {
            $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
            $('.box-search-car .carsearch-lv1').show();
            $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });
        
        $('.box-search-car .carsearch-head').click(function (event) {
            if (  $(this).parents('.box-search-car .carsearch-lv1').length) {
                $('..box-search-car carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
                $('.box-search-car .carsearch-lv1').show();
                $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.box-search-car .carsearch-lv2').length) {
                $('.box-search-car .carsearch-lv1').fadeIn();
                $('.box-search-car .carsearch-lv2').hide();
            }else if (  $(this).parents('.box-search-car .carsearch-lv3').length) {
                $('.box-search-car .carsearch-lv2').fadeIn();
                $('.box-search-car .carsearch-lv3').hide();
            }else if (  $(this).parents('.box-search-car .carsearch-lv4').length) {
                $('.box-search-car .carsearch-lv3').fadeIn();
                $('.box-search-car .carsearch-lv4').hide();
            }
            event.stopPropagation();
        });

        $('.box-search-car .carsearch-ul > li > button').click(function (event) {
            $('.box-search-car .carsearch-input input').val($(this).attr('rel'));
            if ( $(this).hasClass('carsearch-select-all')){
                $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
                $('.box-search-car .carsearch-lv1').show();
                $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.box-search-car .carsearch-lv1').length) {
                $('.box-search-car .carsearch-lv2').fadeIn();
                $('.box-search-car .carsearch-lv1').hide();
            }else if (  $(this).parents('.box-search-car .carsearch-lv2').length) {
                $('.box-search-car .carsearch-lv3').fadeIn();
                $('.box-search-car .carsearch-lv2').hide();
            }else if (  $(this).parents('.box-search-car .carsearch-lv3').length) {
                $('.box-search-car .carsearch-lv4').fadeIn();
                $('.box-search-car .carsearch-lv3').hide();
            }else if (  $(this).parents('.box-search-car .carsearch-lv4').length) {
                $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
                $('.box-search-car .carsearch-lv1').show();
                $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }
            event.stopPropagation();
        });

        $('.box-search-car .btn-selectall-car button').click(function (event) {
            $('.box-search-car .carsearch-input input').val($(this).attr('rel'));
                $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
                $('.box-search-car .carsearch-lv1').show();
                $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.box-search-car .btn-advancesearch').click(function (event) {
            if (  $( ".box-search-car .box-advancesearch" ).is( ":hidden" ) ) {
                $( ".box-search-car .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.preventDefault();
        });

        $('.box-search-car .advance-exit').click(function (event) {
            $( ".box-search-car .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.box-search-car .btn-submitsearch').click(function (event) {
            $( ".box-search-car .boxshow-advance" ).show();
            $( ".box-search-car .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.preventDefault();
        });

        $('.box-search-car .btn-resetsearch').click(function (event) {
            $( ".box-search-car .boxshow-advance" ).hide();
            event.stopPropagation();
        });
        
    });
</script>

<!-- ตัวเลขวิ่ง -->
<script>
        $(document).ready(function() {

			testScroll();

$(window).scroll(testScroll);
var viewedth = false;
var viewedvn = false;
function isScrolledIntoView(elem) {
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();

	var elemTop = $(elem).offset().top;
	var elemBottom = elemTop + $(elem).height();

	return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function testScroll() {
	if (isScrolledIntoView($(".numbers")) && !viewedth) {
		viewedth = true;
		$('.numbers').find('.txt-num').not('.active').each(function () {
			$(this).prop('Counter',0).addClass('active').animate({
				Counter: $(this).text()
			}, {
				duration: 1500,
				easing: 'swing',
				step: function (now) {
				// $(this).text(commaSeparateNumber(Math.ceil(now)));
				$(this).text(Math.ceil(now));
				}
			});
		});
	} 

	function commaSeparateNumber(val){
		while (/(\d+)(\d{3})/.test(val.toString())){
		val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		}
		return val;
	}
}
    });

	</script>

<script>
var priceslider = document.getElementById('priceslider');

var minrange = 0;
var maxrange = 3000000;

noUiSlider.create(priceslider, {
    start: [minrange, maxrange],
    connect: true,
    snap: true,
    range: {
        'min': minrange,
        '8%': 100000,
        '16%': 200000,
        '24%': 300000,
        '32%': 400000,
        '40%': 500000,
        '48%': 600000,
        '56%': 700000,
        '64%': 800000,
        '72%': 900000,
        '80%': 1000000,
        '88%': 2000000,
        'max': maxrange
    },
      format: wNumb({
        decimals: 0,
        thousand: ',',
        postfix: '',
    })
});

var formatValues = [
    document.getElementById('minprice'),
    document.getElementById('maxprice')
];

priceslider.noUiSlider.on('update', function (values, handle) {
    if (values[handle].replace(/[^0-9.-]+/g,"") == minrange){
        formatValues[handle].innerHTML = "ต่ำสุด"
    }else if (values[handle].replace(/[^0-9.-]+/g,"") == maxrange){
        formatValues[handle].innerHTML = "สูงสุด"
    }else{
        formatValues[handle].innerHTML = values[handle];
    }
    
});

//year

var yearslider = document.getElementById('yearslider');

var minyearrange = 2010;
var maxyearrange = 2023;


noUiSlider.create(yearslider, {
    start: [minyearrange, maxyearrange],
    connect: true,
    snap: true,
    range: {
        'min': minyearrange,
        '10%': 2012,
        '20%': 2013,
        '30%': 2015,
        '50%': 2017,
        '60%': 2019,
        '70%': 2020,
        '90%': 2021,
        'max': maxyearrange
    },
      format: wNumb({
        decimals: 0,
    })
});

var formatYear = [
    document.getElementById('minyear'),
    document.getElementById('maxyear')
];

yearslider.noUiSlider.on('update', function (values, handle) {
    console.log(values[1],values[2]);
    if (values[0] == minyearrange && values[1] == maxyearrange){
        formatYear[0].innerHTML = " ";
        formatYear[1].innerHTML = "ทุกปี";
    }else if (values[0] != minyearrange && values[1] == maxyearrange){
        formatYear[0].innerHTML = values[0] + " - ";
        formatYear[1].innerHTML = maxyearrange;
    }else if (values[0] == minyearrange && values[1] != maxyearrange){
        formatYear[0].innerHTML = "ต่ำสุด - ";
        formatYear[1].innerHTML = values[1];
    }else {
        formatYear[0].innerHTML = values[0] + " - ";
        formatYear[1].innerHTML = values[1];
    }
});
</script>

</div>

</body>

</html>
