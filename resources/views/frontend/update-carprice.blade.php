@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - update-carprice</title>
@endsection

@section('content')


<section class="row">
    <div class="col-12 wrap-page wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 news-detail">
                    <div class="row head-updateprice">
                        <div class="col-12 col-md-5">
                            <h1>อัพเดทราคารถยนต์</h1>
                        </div>
                        <div class="col-12 col-md-7 text-end">
                            <!-- <div class="updateprice-select">
                                <span>ยี่ห้อรถยนต์</span>
                                <div class="carsearch-input">
                                    <a data-fancybox data-src="#popup-searchcar" href="javascript:;">
                                        <input type="text" readonly disabled value="เลือกยี่ห้อรถยนต์">
                                    </a>
                                </div>

                                <div style="display: none;" id="popup-searchcar">
                                    <div class="popup-carprice frm-contactback">
                                        @include('frontend.layouts.inc-popup-updateprice')
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <nav class="updateprice-nav">
                        <a href="#">Mercedes-Benz</a>
                        <span><i class="bi bi-chevron-right"></i></span>
                        <a href="#">Mercedes-Benz A-Class</a>
                    </nav>
                    <h1>ราคา Mercedes-Benz A-Class 2023: ราคาและตารางผ่อน เมอร์เซเดส-เบนซ์ เอ-คลาส เดือนมิถุนายน 2566</h1>
                    <div class="news-boxshare">
                        <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                        <div class="news-share">
                            <span><img src="{{asset('frontend/images/icon-share.svg')}}" alt=""> แชร์</span>
                            <a href="#" target="_blank"><img src="{{asset('frontend/images/facebook.svg')}}" alt=""></a>
                            <a href="#" target="_blank"><img src="{{asset('frontend/images/twitter.svg')}}" alt=""></a>
                            <a href="#" target="_blank"><img src="{{asset('frontend/images/line.svg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="content-editor">
                        <img src="{{asset('frontend/images/image 27.png')}}" alt="" style="width: 100%;">
                        <p>
                        Mercedes-Benz A 200 AMG Dynamic เปิดตัวเมื่อวันที่ 22 สิงหาคม 2019 ทั้งนี้ยังมาพร้อมกับเครื่องยนต์ 1.3 ลิตร สามารถเลือกชมรายละเอียด ราคา ผ่อน ดาวน์ ราคาและตารางผ่อน 
ดาวน์ของ Mercedes-Benz A 200 AMG Dynamic 2021 ( Mercedes Benz A200 ประกอบไทย ตารางผ่อน ) รุ่นล่าสุดอย่างเป็นทางการ และสามารถหารุ่นอื่น ๆ ที่ท่านต้องการได้ 
Mercedes Benz A200 ราคา 2,490,000 บาท Mercedes Benz A Class 2021 ราคา และตารางผ่อน เริ่มต้นประมาณ 30,000 บาท ต่องวด
                        </p>
                        <p style="text-align: center;"><img src="{{asset('frontend/images/Group 408.png')}}" alt=""></p>
                        <p style="font-size: 1.2rem; color: #333; font-weight: 500;">Mercedes-Benz A 200 AMG Dynamic สีตัวถัง</p>
                        <ul>
                            <li>สีขาว Polar White</li>
                            <li>สีขาวเซรามิก Digital White</li>
                            <li>สีแดง Jupiter Red</li>
                            <li>สีดำ Cosmos Black</li>
                            <li>สีเงิน Iridium Silver</li>
                            <li>สีเทา Mountain Grey</li>
                        </ul>
                        <br>
                        <p><img src="{{asset('frontend/images/Group 406.png')}}" alt="" style="width: 100%;"></p>
                        <p style="font-size: 1.1rem; color: #333; font-weight: 500;">รีวิว ภายนอก Mercedes Benz A Class</p>
                        <p>
                        ในส่วนของภายนอกของ Mercedes-Benz A 200 AMG Dynamic นั้นจะถูกตกแต่งพร้อมใส่ชุด AMG Body Style ทั้งคันเพื่อความสปอร์ตดุดัน ไฟหน้าเป็นโคมไฟแบบ LED High Performance 
ที่มีทรงที่สวยงาม พร้อมกับไฟ LED แบบ Day time Running Light กระจังหน้าเป็นแบบ Diamond Grille สีเงินพร้อมกับโลโก้ดาวสามแฉก ด้านหลังไฟเบรก, ไฟท้าย และ ไฟเบรกดาวที่ 3 แบบ 
LED กระจกมองข้างด้านผู้ขับเป็นกระจกตัดแสง และปรับไฟฟ้า ล้ออัลลอยหรูหราสไตล์ AMG 5 ก้านคู่ ขนาด 18 นิ้ว พร้อมยางซีรี่ย์ 224/45 R18
                        </p>
                        <p><img src="{{asset('frontend/images/Group 407.png')}}" alt="" style="width: 100%;"></p>
                        <p style="font-size: 1.1rem; color: #333; font-weight: 500;">รีวิว ภายใน Mercedes Benz A Class</p>
                        <p>
                        เมื่อเปิดตูเข้ามายังภายในห้องโดยสารของ Mercedes-Benz A 200 AMG Dynamic ความรู้สึกแรกที่สัมผัสได้คือ ความหรูหราที่ขนาดมากับความเป็นสปอร์ตตามแบบฉบับ AMG Design เริ่มไล่
มาตั้งแต่คอนโซลหน้าแบ่งสัดส่วนอุปกรณ์อำนวยความสะดวกต่าง ๆ อย่างเป็นระบบระเบียบสะอาดตา และสิ่งที่อยากให้โฟกัสก็คือ หน้าจอแบบ Wide screen ขนาด 10.25 นิ้วจำนวน 2 จอติด
กันเป็นแนวยาวที่ประกอบด้วยมาตรวัดแบบดิจิตอลแบบ All-Digital instrument display และ หน้าจอมัลติมีเดียแบบ MBUX พร้อมระบบสัมผัส นอกจากนี้บรรยากาศในห้องโดยสารอีกหนึ่ง
อย่างที่จะช่วยผู้ขับมีอารมณ์ร่วมในการขับขี่อย่าง Ambient Light ที่ปรับได้ถึง 64 เฉดสี ในส่วนของเบาะเป็นวัสดุสุดหรู Artico สลับกับ Dinamic Microfiber สีดำ ตัดด้วยด้ายสีแดง พร้อมปรับ
ไฟฟ้าและบรรทึกความจำในด้านผู้ขับ พวงมาฃับเป็นทรงสปอร์ตหุ้มหนัง Nappa พร้อมกับ ปุ่มควบคุมมัลติมีเดียและดูข้อมูลของรถ นอกเหนือจากนี้การความคุมยังสามารถที่ได้อีกทางผ่านชุด 
Touchpad ที่อยู่คอนโซลกลางอีกด้วย คู่แข่งในกลุ่ม
                        </p>
                        <ul>
                            <li><a href="#">Bmw Series 2</a></li>
                            <li><a href="#">Audi A1</a></li>
                        </ul>
                        <br>
                        <p>
                        Mercedes-Benz A 200 AMG Dynamic 2021 เป็นรถเก๋งขนาด Compact ที่เป็นตัวประกอบไทยเพื่อลดต้นทุนการผลิต ทำให้ ราคา A Class จับต้องได้ง่ายขึ้น และยังคงเทคโนโลยีสุดล้ำสมัย 
ทั้งนี้ ราคา Benz A Class 200 AMG Dynamic 2021 มีราคาเพียง 2,490,000 บาท
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('script')
<script>
    $( document ).ready(function() {
        $('.carsearch-input input').click(function (event) {
            if (  $( ".carsearch-popup" ).is( ":hidden" ) ) {
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.stopPropagation();
        });
        
        $('.carsearch-exit').click(function (event) {
            $('.carsearch-lv2').hide();
            $('.carsearch-lv1').show();
            $.fancybox.close();
            // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });
        
        $('.carsearch-head').click(function (event) {
            if (  $(this).parents('.carsearch-lv1').length) {
                $('.carsearch-lv2').hide();
                $('.carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.carsearch-lv2').length) {
                $('.carsearch-lv1').fadeIn();
                $('.carsearch-lv2').hide();
            }
            event.stopPropagation();
        });

        $('.carsearch-ul > li > button').click(function (event) {
            $('.carsearch-input input').val($(this).attr('rel'));
            if ( $(this).hasClass('carsearch-select-all')){
                $('.carsearch-lv2').hide();
                $('.carsearch-lv1').show();
                $.fancybox.close();
                //$( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.carsearch-lv1').length) {
                $('.carsearch-lv2').fadeIn();
                $('.carsearch-lv1').hide();
            }else if (  $(this).parents('.carsearch-lv2').length) {
                $('.carsearch-lv2').hide();
                $('.carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }
            event.stopPropagation();
        });

        $('.btn-selectall-car button').click(function (event) {
            $('.carsearch-input input').val($(this).attr('rel'));
                $('.carsearch-lv2').hide();
                $('.carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.btn-advancesearch').click(function (event) {
            if (  $( ".box-advancesearch" ).is( ":hidden" ) ) {
                $( ".box-advancesearch" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.preventDefault();
        });

        $('.advance-exit').click(function (event) {
            $( ".box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.btn-submitsearch').click(function (event) {
            $( ".boxshow-advance" ).show();
            $( ".box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.preventDefault();
        });

        $('.btn-resetsearch').click(function (event) {
            $( ".boxshow-advance" ).hide();
            event.stopPropagation();
        });
        
    });
</script>
@endsection

