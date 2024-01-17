<?php

$arr = [];
if (isset($setFooterModel)) {
    foreach($setFooterModel as $keyf => $foot){

    if(!empty($foot->name) && !empty($foot->link)){
        $arr[$foot->heading][$keyf]['footer_name'] = $foot->name;
        $arr[$foot->heading][$keyf]['footer_link'] = $foot->link;
    }

    // echo "<pre>";
    // print_r($foot);
    // echo "</pre>";
    }
}
// echo "<pre>";
// print_r($arr);
// echo "</pre>";
?>
<!-- </script> -->
<section class="container box-linkcarseo wow fadeInDown">
    <div class="row">
        @foreach($arr as $keyarray => $arry)
        
        <div class="col-3 box-linkcar">
            <h2>{{$keyarray}}</h2>
            <ul>
                @foreach($arry as $keylst => $lst)
                <li><a href="{{$lst['footer_link']}}" target="_blank">{{$lst['footer_name']}}</a></li>
                @endforeach
            </ul>
        </div>
        @endforeach
        
        <!-- <div class="col-3 box-linkcar">
            <h2>ขายรถ Toyota มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">ฟอร์จูนเนอร์มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">ยาริสมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">วีออสมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">วีโก้มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">คัมรี่มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Toyota commuter มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Honda มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">ซีวิคมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">ฮอนด้าแจ๊สมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">แอคคอร์ด มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">CR-V มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Honda City มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">HR-V มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Mazda มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">Mazda 3 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Mazda 2 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">CX-5 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">CX-3 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BT-50 PRO มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BT-50 มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Mitsubishi มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">Xpander มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Pajero Sport มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Lancer EX มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">มิราจมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Mitsubishi Attrage มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Mitsubishi Triton มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Isuzu มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">ดีแม็กมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">MU-7 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">MU-X มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Isuzu Vega มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">ดราก้อนอายมือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Isuzu Elf มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Nissan มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">Nissan Teana มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Nissan Almera มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Nissan X-Trail มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">นิสสัน นาวาร่า NP300 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Nissan March มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Nissan Juke มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Bmw มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">BMW X1 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BMW 320D มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BMW 520D มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BMW X3 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BMW 320I มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">BMW Z4 มือสอง</a></li>
            </ul>
        </div>
        <div class="col-3 box-linkcar">
            <h2>ขายรถ Mercedes-Benz มือสอง สภาพดี</h2>
            <ul>
                <li><a href="{{route('carPage')}}" target="_blank">BMW X1 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Benz CLA250 AMG</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Benz C350 มือสอง</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Mercedes-Benz C250</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Benz E300</a></li>
                <li><a href="{{route('carPage')}}" target="_blank">Benz GLC 250</a></li>
            </ul>
        </div> -->

    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-12 box-linkcarseo-mb box-linkcarseo">
            <div class="owl-linkcarseo owl-carousel owl-theme">
                
                @foreach($arr as $keyarray2 => $arry2)
            
                <div class="box-linkcar">
                    <h2>{{$keyarray2}}</h2>
                    <ul>
                        @foreach($arry2 as $keylst => $lst)
                        <li><a href="{{$lst['footer_link']}}" target="_blank">{{$lst['footer_name']}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach

                <!-- <div class="box-linkcar">
                    <h2>ขายรถ Toyota มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">ฟอร์จูนเนอร์มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">ยาริสมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">วีออสมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">วีโก้มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">คัมรี่มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Toyota commuter มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Honda มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">ซีวิคมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">ฮอนด้าแจ๊สมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">แอคคอร์ด มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">CR-V มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Honda City มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">HR-V มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Mazda มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">Mazda 3 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Mazda 2 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">CX-5 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">CX-3 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BT-50 PRO มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BT-50 มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Mitsubishi มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">Xpander มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Pajero Sport มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Lancer EX มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">มิราจมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Mitsubishi Attrage มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Mitsubishi Triton มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Isuzu มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">ดีแม็กมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">MU-7 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">MU-X มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Isuzu Vega มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">ดราก้อนอายมือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Isuzu Elf มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Nissan มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">Nissan Teana มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Nissan Almera มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Nissan X-Trail มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">นิสสัน นาวาร่า NP300 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Nissan March มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Nissan Juke มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Bmw มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW X1 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW 320D มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW 520D มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW X3 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW 320I มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW Z4 มือสอง</a></li>
                    </ul>
                </div>
                <div class="box-linkcar">
                    <h2>ขายรถ Mercedes-Benz มือสอง สภาพดี</h2>
                    <ul>
                        <li><a href="{{route('carPage')}}" target="_blank">BMW X1 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Benz CLA250 AMG</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Benz C350 มือสอง</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Mercedes-Benz C250</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Benz E300</a></li>
                        <li><a href="{{route('carPage')}}" target="_blank">Benz GLC 250</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</section>