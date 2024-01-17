@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - car</title>
@endsection

@section('content')


<section class="row">
    <div class="col-12 banner-slidecar">
        <div class="owl-bannercar owl-carousel owl-theme">
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner-car.jpg')}}" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner-car.jpg')}}" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner-car.jpg')}}" alt=""></figure>
            </div>
            <div class="items">
                <figure><img src="{{asset('frontend/images/banner-car.jpg')}}" alt=""></figure>
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-12 wrap-carpage">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 col-xl-3 hide-search-mb">
                    <?php 
                    // require('inc-carsearch.php');
                    ?>
                    @include('frontend.layouts.inc-carsearch')
                </div>
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="wrap-allitem-car">
                        <div class="topic-cardesc"><i class="bi bi-circle-fill"></i> ดูรถพร้อมขาย</div>
                        <div class="result-btn-search">
                            <button class="btn-refresh" onclick="clearall();"><img src="{{asset('frontend/images/icon-clear.svg')}}" alt="">ล้างข้อมูล</button>
                            @if (isset($brandsel))
                                <button class="btn-brand" onclick="delbrand();">{{$brandsel}} <i class="bi bi-x brand"></i></button>
                            @endif
                            @if (isset($modelsel))
                                <button class="btn-model" onclick="delmodel();">{{$modelsel}} <i class="bi bi-x model"></i></button>
                            @endif
                            @if (isset($generationsel))
                                <button class="btn-generation" onclick="delgeneration();">{{$generationsel}} <i class="bi bi-x generation"></i></button>
                            @endif
                            @if (isset($submodelsel))
                                <button class="btn-submodel" onclick="delsubmodel();">{{$submodelsel}} <i class="bi bi-x submodel"></i></button>
                            @endif
                            @if (isset($paymentsel))
                                <button class="btn-payment" onclick="delpayment();">{{$paymentsel}} <i class="bi bi-x payment"></i></button>
                            @endif
                            @if (isset($pricelowsel) && isset($pricehighsel))
                                <button class="btn-price" onclick="delprice();">{{'ราคา '.( is_numeric( preg_replace('/[^0-9]/', '', $pricelowsel) )?number_format( preg_replace('/[^0-9]/', '', $pricelowsel) ):str_replace('-', '', str_replace('ราคา', '', $pricelowsel)) ).' - '.( is_numeric( preg_replace('/[^0-9]/', '', $pricehighsel) )?number_format( preg_replace('/[^0-9]/', '', $pricehighsel) ):$pricehighsel ) }} <i class="bi bi-x price"></i></button>
                            @endif
                            @if (isset($yearlowsel) && isset($yearhighsel))
                                <button class="btn-year" onclick="delyear();">{{$yearlowsel}}{{$yearhighsel}} <i class="bi bi-x year"></i></button>
                            @endif
                            @if (isset($colorsel))
                                <button class="btn-color" onclick="delcolor();">{{$colorsel}} <i class="bi bi-x color"></i></button>
                            @endif
                            @if (isset($gearsel))
                                <button class="btn-gear" onclick="delgear();">{{$gearsel}} <i class="bi bi-x gear"></i></button>
                            @endif
                            @if (isset($powersel))
                                <button class="btn-power" onclick="delpower();">{{$powersel}} <i class="bi bi-x power"></i></button>
                            @endif
                            @if (isset($provincesel))
                                <button class="btn-province" onclick="delprovince();">{{$provincesel}} <i class="bi bi-x province"></i></button>
                            @endif
                        </div>
                        <div class="txt-numresult">ทั้งหมด <span class="total-cars">{{number_format($cars->total())}}</span> รายการ</div>
                        @if (isset($brandx))
                            <div class="btn-boxfilter brand">
                                @foreach ($brand as $rows)
                                <button onclick="brandsel($rows->id);">{{$rows->title}}</button>
                                @endforeach
                            </div>
                        @endif
                        @if (isset($modellist))
                            <div class="btn-boxfilter model">
                                @foreach ($modellist as $rows)
                                <button onclick="modelsel({{$rows->id}}, '{{$rows->model}}');">{{$rows->model}}</button>
                                @endforeach
                            </div>
                        @endif
                        @if (isset($generationlist))
                            <div class="btn-boxfilter generation">
                                @foreach ($generationlist as $rows)
                                <button onclick="generationsel($rows->id, $rows->generations);">{{$rows->generations}}</button>
                                @endforeach
                            </div>
                        @endif
                        @if (isset($submodellist))
                            <div class="btn-boxfilter submodel">
                                @foreach ($submodellist as $rows)
                                <button onclick="submodelsel($rows->id, $rows->sub_models);">{{$rows->sub_models}}</button>
                                @endforeach
                            </div>
                        @endif
                        @if (isset($qrygeneration))
                            <div class="btn-boxfilter year">
                                @for ($i = $qrygeneration->yearfirst; $i <= $qrygeneration->yearlast; $i++)
                                <button onclick="yearsel($i);">{{$i}}</button>
                                @endfor
                            </div>
                        @endif
                        <div class="box-filteritem">
                            <div class="row">
                                <div class="col-4 col-md-4">
                                    <div class="item-filter">
                                        <div><img src="{{asset('frontend/images/icon-filter.svg')}}" alt=""> <span class="filter-hidetxt">เรียงตาม</span></div>
                                        <div>
                                            <select class="form-select">
                                                <option value="">ปีล่าสุด</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 col-md-8 text-end">
                                    <div class="item-filter">
                                        <div class="filter-hidetxt">แสดงราคา</div>
                                        <div>
                                            <select class="form-select">
                                                <option value="">เงินสด</option>
                                                <option value="">ผ่อน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item-filter">
                                        <div class="filter-hidetxt">เปลี่ยนมุมมอง</div>
                                        <div class="box-changelayout">
                                            <button class="btn-list-item"><img src="{{asset('frontend/images/icon-list.svg')}}" class="svg" alt=""></button>
                                            <button class="btn-grid-item active"><img src="{{asset('frontend/images/icon-grid.svg')}}" class="svg" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="caryearcontent" class="infinite-scroll">
                        @include('frontend.car-child')
                    </div>

                    

                    <div class="box-car-article">
                        <h4 class="topic-car-article">Mercedes-Benz ในประเทศไทยรุ่นรถมีอะไรบ้าง</h4>
                        <div class="content-editor">
                            <p>
                            Mercedes-Benz ประเทศไทย มีให้เลือกหลายรุ่นและหลากหลายประเภทรถ โดยมีทั้งกลุ่มรถสมรรถนะสูง Mercedes-AMG, กลุ่มไฟฟ้า Mercedes-EQ และอัลตร้าลักชัวรี่ Mercedes-Maybach ส่วนประเภทรถได้แบ่งเป็นไลน์ คูเป้, เปิดประทุน, เอสยูวี, รถตู้ และซาลูน
                            </p>
                            <p style="text-align:center;"><img src="{{asset('frontend/images/image 7.jpg')}}" alt=""></p>
                            <p>
                            Mercedes-Benz เป็นแบรนด์พรีเมียมที่มียอดขายสูงสุดในไทย และ Mercedes-Benz มือสอง ก็ได้รับความนิยมมากเช่นกัน สามารถสังเกตได้ในเว็บไซต์ RodPromptkai.com มีรถ Mercedes-Benz มือสองจำนวนมากที่ผ่านการตรวจสอบแล้วให้คุณเลือกและเปรียบเทียบก่อนตัดสินใจ
                            </p>
                            <h5 style="color: #000;">Mercedes-Benz รุ่นไหนน่าซื่อที่สุดปี 2023?</h5>
                            <p style="text-align:center;"><img src="{{asset('frontend/images/Group 410.jpg')}}" alt=""></p>
                            <p>
                            Mercedes-Benz SLC คือที่สุดของรถยนต์สายสปอร์ต Roadster ที่มีความคลาสสิกผสมผสานกับความทันสมัยได้อย่างลงตัวราคาเริ่มตั้งแต่ 4,090,000 บาท ถึง 4,990,000 บาทสำหรับใครที่ต้องการตรวจสอบราคารถเบนซ์มือสอง, อยากซื้อรถเบนซ์มือสอง, ซื้อขายเบนซ์ มือสองรถบ้านสภาพดี และรถเบนซ์มือสอง ราคาถูก สามารถเข้าไปดูเพิ่มเติมได้ที่ RodPromptkai.com ตลาดรถให้ข้อมูลที่ดีที่สุดสำหรับการซื้อขายรถยนต์ สำหรับใครที่สนใจอยากตรวจสอบราคารถเบนซ์ มือสอง, ซื้อรถเบนซ์มือสอง, รถเบนซ์ มือ สอง เจ้าของขายเอง สภาพดี, ซื้อขายเบนซ์มือสองรถบ้าน และรถเบนซ์ มือสองราคาถูก สามารถเข้าไปที่ RodPromptkai.com ตลาดรถให้ข้อมูลที่ดีที่สุดสำหรับการซื้อขายรถยนต์มือสองในไทย และใครที่สนใจจะขายรถเบนซ์มือสอง RodPromptkai ก็สามารถช่วยคุณ ได้ ด้วยจำนวนผู้เข้าชมเว็บไซต์กว่า 2 ล้านคน/เดือน คุณจึงมั่นใจได้ว่ารถของคุณที่ลงประกาศขายในเว็บไซต์ RodPromptkai.com จะสามารถเข้าถึงผู้ซื้อได้ง่าย กว่า และโอกาสที่รถของคุณจะขายได้สูงกว่าในราคาที่คุณกำหนดเอง
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script>
    $(document).on("click", ".btn-grid-item", function () {
    //    if ( !$( this ).hasClass( "active" ) ) {
    //         $('.btn-list-item').removeClass('active');
    //         $(this).addClass('active');
    //         $('.col-itemcar').removeClass('col-12 list-item').addClass('col-6 col-xl-4');
    //       }
        if ($(".btn-list-item").hasClass("active")) {
            $(".btn-list-item").removeClass('active');
        }
        else {
            
        }
        if ($(".btn-grid-item").hasClass("active")) {
            // console.log("has class");
        }
        else {
            $(".btn-grid-item").addClass('active');
            $(".list-item").addClass('col-6 col-xl-4').removeClass('col-12 list-item');
        }
    });
    $('.btn-list-item').click(function (event) {
        // if ( !$( this ).hasClass( "active" ) ) {
        //         $('.btn-grid-item').removeClass('active');
        //         $(this).addClass('active');
        //         $('.col-itemcar').removeClass('col-6 col-xl-4').addClass('col-12 list-item');
        //     }
        if ($(".btn-grid-item").hasClass("active")) {
            $(".btn-grid-item").removeClass('active');
        }
        else {
            
        }
        if ($(".btn-list-item").hasClass("active")) {
            
        }
        else {
            $(".btn-list-item").addClass('active');
            $(".col-xl-4").addClass('col-12 list-item').removeClass('col-6 col-xl-4');
        }
    });

</script>
<script>
    var brand_id=@if(isset($brand_id)){{$brand_id}}@else{{'null'}}@endif;
    var model_id=@if(isset($model_id)){{$model_id}}@else{{"null"}}@endif;
    var generation_id=@if(isset($generation_id)){{$generation_id}}@else{{"null"}}@endif;
    var submodel_id=@if(isset($submodel_id)){{$submodel_id}}@else{{'null'}}@endif;
    var evtype=null;
    var payment="@if(isset($paymentsel)){{$paymentsel}}@else{{'null'}}@endif";
    var pricelow = @if(isset($pricelowsel)) @if(is_numeric($pricelowsel)){{$pricelowsel}}@else{{'null'}}@endif @else{{'null'}}@endif;
    var pricehigh= @if(isset($pricehighsel)) @if(is_numeric($pricehighsel)){{$pricehighsel}}@else{{'null'}}@endif @else{{'null'}}@endif;
    var color=@if(isset($colorsel)){{$colorsel}}@else{{'null'}}@endif;
    var gear=@if(isset($gearsel)){{$gearsel}}@else{{'null'}}@endif;
    var power=@if(isset($powersel)){{$powersel}}@else{{'null'}}@endif;
    var province_id=@if(isset($provincesel))@else{{'null'}}@endif;
    var yearlow= @if(isset($yearlowsel)) @if(is_numeric($yearlowsel)){{$yearlowsel}}@else{{'null'}}@endif @else{{'null'}}@endif;
    var yearhigh= @if(isset($yearhighsel)) @if(is_numeric($yearhighsel)){{$yearhighsel}}@else{{'null'}}@endif @else{{'null'}}@endif;
    
    var brand_sel=null;
    
    
    $( document ).ready(function() {
            // range price
    var priceslider = document.getElementById('priceslider');

var minrange = 0;
var maxrange = 3000000;

// noUiSlider.create(priceslider, {
//     start: [minrange, maxrange],
//     connect: true,
//     snap: true,
//     range: {
//         'min': minrange,
//         '8%': 100000,
//         '16%': 200000,
//         '24%': 300000,
//         '32%': 400000,
//         '40%': 500000,
//         '48%': 600000,
//         '56%': 700000,
//         '64%': 800000,
//         '72%': 900000,
//         '80%': 1000000,
//         '88%': 2000000,
//         'max': maxrange
//     },
//       format: wNumb({
//         decimals: 0,
//         thousand: ',',
//         postfix: '',
//     })
// });

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


// noUiSlider.create(yearslider, {
//     start: [minyearrange, maxyearrange],
//     connect: true,
//     snap: true,
//     range: {
//         'min': minyearrange,
//         '10%': 2012,
//         '20%': 2013,
//         '30%': 2015,
//         '50%': 2017,
//         '60%': 2019,
//         '70%': 2020,
//         '90%': 2021,
//         'max': maxyearrange
//     },
//       format: wNumb({
//         decimals: 0,
//     })
// });

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

    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            // refresh: true,
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="{{asset("frontend/images/loading.gif")}}" alt="Loading..." />',
            padding: 1000,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });

    if($('#searchev').is(':checked')) {
            $.get('/brandev', function(data, status) {
                // console.log(data);
                var param2 = "";
                var html='<li><button rel="ทุกยี่ห้อ" onclick="brand2(0, \'ทุกยี่ห้อ\')">ทุกยี่ห้อ</button></li>';
                $.each(data, function(index, value){
                    html+='<li><button rel="'+value.title+'" onclick="brand2('+value.id+', \''+value.title+'\')"> '+value.title+'</button></li>';
                });
                $('.carsearch-lv1 .carsearch-ul').empty().append(html);
            });
        }
        else {
            $.get('/brandnotev', function(data, status) {
                // console.log(data);
                var param2 = "";
                var html='<li><button rel="ทุกยี่ห้อ" onclick="brand2(0, \'ทุกยี่ห้อ\')">ทุกยี่ห้อ</button></li>';
                $.each(data, function(index, value){
                    html+='<li><button rel="'+value.title+'" onclick="brand2('+value.id+', \''+value.title+'\')"> '+value.title+'</button></li>';
                });
                $('.carsearch-lv1 .carsearch-ul').empty().append(html);
            });
        }


    $('#searchev').click(function(){
        if($('#searchev').is(':checked')) {
            $.get('/brandev', function(data, status) {
                // console.log(data);
                var param2 = "";
                var html='<li><button rel="ทุกยี่ห้อ" onclick="brand2(0, \'ทุกยี่ห้อ\')">ทุกยี่ห้อ</button></li>';
                $.each(data, function(index, value){
                    html+='<li><button rel="'+value.title+'" onclick="brand2('+value.id+', \''+value.title+'\')"> '+value.title+'</button></li>';
                });
                $('.carsearch-lv1 .carsearch-ul').empty().append(html);
            });
        }
        else {
            $.get('/brandnotev', function(data, status) {
                // console.log(data);
                var param2 = "";
                var html='<li><button rel="ทุกยี่ห้อ" onclick="brand2(0, \'ทุกยี่ห้อ\')">ทุกยี่ห้อ</button></li>';
                $.each(data, function(index, value){
                    html+='<li><button rel="'+value.title+'" onclick="brand2('+value.id+', \''+value.title+'\')"> '+value.title+'</button></li>';
                });
                $('.carsearch-lv1 .carsearch-ul').empty().append(html);
            });
        }
    });

    // $(".result-btn-search button").not(".btn-refresh").remove();
    if (brand_sel === null) {
        
        $('.btn-boxfilter.brand').show();
        $('.btn-boxfilter.model').show();
        $('.btn-boxfilter.generation').show();
        $('.btn-boxfilter.submodel').show();
        $('.btn-boxfilter.year').show();
    }

    
});
    function search2() {
        $.get("{{url('/search')}}"+"/"+brand_id+"/"+model_id+"/"+generation_id+"/"+submodel_id+"/"+evtype+"/"+payment+"/"+pricelow+"/"+pricehigh+"/"+color+"/"+gear+"/"+power+"/"+province_id+"/"+yearlow+"/"+yearhigh, function(data, status){
            // console.log("Data: " + data + "\nStatus: " + status);
            var html="", currentyear="";
            // var total = data.data.length;
            // console.log(total);
            
            // console.log(data.total);
            // console.log(data.data.total);
            $.each(data.data, function( index, value ) {
                // เริ่มต้น
                if (index == 0) {
                    currentyear = value.modelyear;
                    // section year
                    html+='<div class="box-itemcar">';
                    html+='<div class="car-year">'+value.modelyear+'</div>';
                    html+='<div class="row row-itemcar">';


                    // section car
                    html+='<div class="col-itemcar col-6 col-xl-4">';
                    html+='<a href="{{url('')}}/car-detail/'+value.id+'" class="item-car">';
                    html+='<figure>';
                    html+='<div class="cover-car">';
                    html+='<img src="{{asset('')}}'+value.feature+'" alt="">';
                    html+='</div>';
                    html+='<figcaption>';
                    html+='<div class="grid-desccar">';
                    html+='<div class="car-name">'+value.modelyear+' '+value.brand_name+' '+value.model_name+' </div>';
                    html+='<div class="car-series">'+value.submodel_name+' '+value.generation_name+'</div>';
                    html+='<div class="car-province">'+value.province+'</div>';
                    html+='<div class="row">';
                    html+='<div class="col-12 col-md-8">';
                    html+='<div class="descpro-car">'+value.title+'</div>';
                    html+='</div>';
                    html+='<div class="col-12 col-md-4 text-end">';
                    html+='<div class="txt-readmore">ดูเพิ่มเติม</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='<div class="linecontent"></div>';
                    html+='<div class="row caritem-price">';
                    html+='<div class="col-12 col-md-6">';
                    html+='<div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> '+(value.gear==="auto"?'เกียร์อัตโนมัติ':'เกียร์ธรรมดา')+'</div>';
                    html+='</div>';
                    html+='<div class="col-12 col-md-6 text-end">';
                    html+='<div class="car-price">'+value.price.toLocaleString("en-US")+'.-</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='</figcaption>';
                    html+='</figure>';
                    html+='</a>';
                    html+='</div>';
                    // end section car
                }
                else {
                    // section car
                    html+='<div class="col-itemcar col-6 col-xl-4">';
                    html+='<a href="{{url('')}}/car-detail/'+value.id+'" class="item-car">';
                    html+='<figure>';
                    html+='<div class="cover-car">';
                    html+='<img src="{{asset('')}}'+value.feature+'" alt="">';
                    html+='</div>';
                    html+='<figcaption>';
                    html+='<div class="grid-desccar">';
                    html+='<div class="car-name">'+value.modelyear+' '+value.brand_name+' '+value.model_name+' </div>';
                    html+='<div class="car-series">'+value.submodel_name+' '+value.generation_name+'</div>';
                    html+='<div class="car-province">'+value.province+'</div>';
                    html+='<div class="row">';
                    html+='<div class="col-12 col-md-8">';
                    html+='<div class="descpro-car">'+value.title+'</div>';
                    html+='</div>';
                    html+='<div class="col-12 col-md-4 text-end">';
                    html+='<div class="txt-readmore">ดูเพิ่มเติม</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='<div class="linecontent"></div>';
                    html+='<div class="row caritem-price">';
                    html+='<div class="col-12 col-md-6">';
                    html+='<div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> '+(value.gear==="auto"?'เกียร์อัตโนมัติ':'เกียร์ธรรมดา')+'</div>';
                    html+='</div>';
                    html+='<div class="col-12 col-md-6 text-end">';
                    html+='<div class="car-price">'+value.price.toLocaleString("en-US")+'.-</div>';
                    html+='</div>';
                    html+='</div>';
                    html+='</figcaption>';
                    html+='</figure>';
                    html+='</a>';
                    html+='</div>';
                    // end section car
                }
                if (index === total - 1){
                    // end section year
                    html+='</div>';
                    html+='</div>';
                    // html+='</div>';
                }
                if ((index+1) > 0 && (index+1) % 10 === 0) {
                    if (index === total - 1) {
                        // แทรกค้นหารถ ทุกๆ 10 คัน
                        html+='<div class="box-frmhelpcar">';
                        html+='<div class="topic-frmhelpcar">';
                        html+='<img src="{{asset("frontend/images/carred.svg")}}" alt=""> <span>ช่วยคุณหารถที่ใช่</span> ให้รถพร้อมขายช่วยหารถให้คุณ';
                        html+='</div>';
                        html+='<form action="">';
                        html+='<div>';
                        html+='<input type="text" class="form-control" placeholder="ชื่อ - นามสกุล">';
                        html+='<input type="text" class="form-control" placeholder="เบอร์โทรติดต่อ">';
                        html+='<input type="text" class="form-control" placeholder="Line ID">';
                        html+='<input type="text" class="form-control" placeholder="รุ่นรถที่ต้องการ">';
                        html+='</div>';
                        html+='<button>คลิกเลย <i class="bi bi-chat-text-fill"></i></button>';
                        html+='</form>';
                        html+='</div>';
                    }
                    else {
                        // end section year
                        html+='</div>';
                        html+='</div>';
                        // html+='</div>';

                        // แทรกค้นหารถ ทุกๆ 10 คัน
                        html+='<div class="box-frmhelpcar">';
                        html+='<div class="topic-frmhelpcar">';
                        html+='<img src="{{asset("frontend/images/carred.svg")}}" alt=""> <span>ช่วยคุณหารถที่ใช่</span> ให้รถพร้อมขายช่วยหารถให้คุณ';
                        html+='</div>';
                        html+='<form action="">';
                        html+='<div>';
                        html+='<input type="text" class="form-control" placeholder="ชื่อ - นามสกุล">';
                        html+='<input type="text" class="form-control" placeholder="เบอร์โทรติดต่อ">';
                        html+='<input type="text" class="form-control" placeholder="Line ID">';
                        html+='<input type="text" class="form-control" placeholder="รุ่นรถที่ต้องการ">';
                        html+='</div>';
                        html+='<button>คลิกเลย <i class="bi bi-chat-text-fill"></i></button>';
                        html+='</form>';
                        html+='</div>';

                        // section year
                        html+='<div class="box-itemcar">';
                        html+='<div class="car-year">'+value.modelyear+'</div>';
                        html+='<div class="row row-itemcar">';
                    }
                }
                if (currentyear !== value.modelyear){
                    if (currentyear === "") {

                    }
                    else if ((index+1) > 0 && (index+1) % 10 === 0) {
                        
                    }
                    else {
                        // end section year
                        html+='</div>';
                        html+='</div>';
                        // html+='</div>';

                        // section year
                        html+='<div class="box-itemcar">';
                        html+='<div class="car-year">'+value.modelyear+'</div>';
                        html+='<div class="row row-itemcar">';
                    }
                    currentyear = value.modelyear;
                }
            });
            // $('#caryearcontent').empty().append(html);
            $('#caryearcontent').html(data);
            // console.log("data="+data);
        });
    }

    function search3() {
        if ($('input[name="payment"]').is(':checked')) {
            payment = $('input[name="payment"]:checked').val();
        } else {
            payment = null;
        }
        pricelow = $('.pricelow').text().replace(/,/g, '');
        pricehigh = $('.pricehigh').text().replace(/,/g, '');
        yearlow = $('.yearlow').text();
        yearhigh = $('.yearhigh').text();
        if ($('#carcolor').is(':selected')) {
            color = $('#carcolor').find(":selected").val();
            if (color === "") {
                color = null;
            }
        } else {
            color = null;
        }
        if ($('input[name="advance-gear"]').is(':checked')) {
            gear = $('input[name="advance-gear"]:checked').val();
        } else {
            gear = null;
        }
        if ($('#power').is(':selected')) {
            power = $('#power').find(":selected").val();
            if (power === "") {
                power = null;
            }
        } else {
            power = null;
        }
        if ($('#power').is(':selected')) {
            province = $('#province').find(':selected').text();
            if (province === "") {
                province = null;
            }
        } else {
            province = null;
        }
        

        $('.infinite-scroll').data('jscroll', null);
        $.get("{{url('/search')}}"+"/"+brand_id+"/"+model_id+"/"+generation_id+"/"+submodel_id+"/"+evtype+"/"+payment+"/"+pricelow+"/"+pricehigh+"/"+color+"/"+gear+"/"+power+"/"+province_id+"/"+yearlow+"/"+yearhigh, function(data, status){
            // $('#caryearcontent').empty();
            $('#caryearcontent').html(data);
            $('.total-cars').text($('#total').val());


            // Initialization
            // if (_nextHref !== undefined) {
            //     $e.data('jscroll', $.extend({}, _data, {initialized: true, waiting: false, nextHref: _nextHref}));
            //     _wrapInnerContent();
            //     _preloadImage();
            //     _setBindings();
            // } else {
            //     _debug('warn', 'jScroll: nextSelector not found - destroying');
            //     _destroy();
            //     return false;
            // }

            $('ul.pagination').hide();
            $(function() {
                $('.infinite-scroll').jscroll({
                    // refresh: true,
                    autoTrigger: true,
                    loadingHtml: '<img class="center-block" src="{{asset("frontend/images/loading.gif")}}" alt="Loading..." />',
                    padding: 1000,
                    nextSelector: 'li.page-item a.page-link[rel="next"]',
                    contentSelector: 'div.infinite-scroll',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });
            });



            // $('.infinite-scroll').jscroll({
            //     // refresh: true,
            //     autoTrigger: true,
            //     loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
            //     padding: 0,
            //     nextSelector: '.pagination li.active + li a',
            //     contentSelector: 'div.infinite-scroll',
            //     callback: function() {
            //         $('ul.pagination').remove();
            //     }
            // });
        });
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

    function brandsel(value){
        // console.log($(value).text());
        brand_sel = $(value).text();
        $(".result-btn-search button").not(".btn-refresh").remove();


        // Create a new button element

        var newButton = $('<button>'+brand_sel+' <i class="bi bi-x brand"></i></button>');

        // Append the new button to the result-btn-search element
        $('.result-btn-search').append(newButton);

        
    }
    function modelsel(rowid, rowname){
        model_sel = rowname;
        model_id = rowid;



        $('.bi.bi-x.model').parent().remove();
        $('.bi.bi-x.generation').parent().remove();
        $('.bi.bi-x.submodel').parent().remove();

        // Create a new button element

        var newButton = $('<button class="btn-model" onclick="delmodel();">'+model_sel+' <i class="bi bi-x model"></i></button>');

        // Append the new button to the result-btn-search element
        $('.result-btn-search').children().eq(1).after(newButton);

        // แสดงตัวเลือกโฉม
        $.get('/popup-carsearch-generation/a?models_id='+model_id, function(data, status) {
            // console.log(data);
            var html='';
            $.each(data, function(index, value){
                html+='<button onclick="generationsel('+value.id+', \''+value.generations+'\');">'+value.generations+'</button>';
            });
            $('.btn-boxfilter.model').empty();
            $('.btn-boxfilter.generation').empty().append(html);
        });



        search3();
    }

    function generationsel(rowid, rowname){
        generation_sel = rowname;
        generation_id = rowid;



        $('.bi.bi-x.generation').parent().remove();
        $('.bi.bi-x.submodel').parent().remove();

        // Create a new button element

        var newButton = $('<button class="btn-generation" onclick="delgeneration();">'+generation_sel+' <i class="bi bi-x generation"></i></button>');

        // Append the new button to the result-btn-search element
        $('.result-btn-search').children().eq(2).after(newButton);

        // แสดงตัวเลือกรุ่นย่อย
        $.get('/popup-carsearch-submodel/a?generations_id='+generation_id, function(data, status) {
            // console.log(data);
            var html='';
            $.each(data, function(index, value){
                html+='<button onclick="submodelsel('+value.id+', \''+value.sub_models+'\');">'+value.sub_models+'</button>';
            });
            $('.btn-boxfilter.generation').empty();
            $('.btn-boxfilter.submodel').empty().append(html);
        });

        // แสดงรุ่นปี
        $.get('/popup-carsearch-year/a?generations_id='+generation_id, function(data, status) {
            // console.log(data);
            var html='';
            for(i=data.yearfirst; i<=data.yearlast; i++){
                html+='<button onclick="yearsel(\''+i+'\');">'+i+'</button>';
            }
            $('.btn-boxfilter.generation').empty();
            $('.btn-boxfilter.year').empty().append(html);
        });


        search3();
    }

    function submodelsel(rowid, rowname){
        submodel_sel = rowname;
        submodel_id = rowid;



        
        $('.bi.bi-x.submodel').parent().remove();

        // Create a new button element

        var newButton = $('<button class="btn-submodel" onclick="delsubmodel();">'+submodel_sel+' <i class="bi bi-x submodel"></i></button>');

        // Append the new button to the result-btn-search element
        $('.result-btn-search').children().eq(3).after(newButton);
        $('.btn-boxfilter.submodel').empty();

        search3();
    }

    function yearsel(rowid){
        year = rowid;
        yearlow = year;
        yearhigh = year;



        
        $('.bi.bi-x.year').parent().remove();

        // Create a new button element

        var newButton = $('<button class="btn-year" onclick="delyear();">'+year+' <i class="bi bi-x year"></i></button>');

        // Append the new button to the result-btn-search element
        $('.result-btn-search').children().eq(4).after(newButton);
        $('.btn-boxfilter.year').empty();

        search3();
    }
</script>

<script type="text/javascript">
    
</script>

<script>
    function delbrand() {
        brand_id=null;
        model_id=null;
        generation_id=null;
        submodel_id=null;
        
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-brand').remove();
        $('.btn-model').remove();
        $('.btn-generation').remove();
        $('.btn-submodel').remove();
        $('.btn-year').remove();

        $('.btn-boxfilter.model').empty();
        $('.btn-boxfilter.generation').empty();
        $('.btn-boxfilter.submodel').empty();
        $('.btn-boxfilter.year').empty();

        search3();
    }
    function delmodel() {
        model_id=null;
        generation_id=null;
        submodel_id=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-model').remove();
        $('.btn-generation').remove();
        $('.btn-submodel').remove();
        $('.btn-year').remove();

        $('.btn-boxfilter.generation').empty();
        $('.btn-boxfilter.submodel').empty();
        $('.btn-boxfilter.year').empty();

        // แสดงตัวเลือกรุ่น
        $.get('/popup-carsearch-model/a?brand_id='+brand_id, function(data, status) {
            var html='';
            $.each(data, function(index, value){
                html+='<button onclick="modelsel('+value.id+', \''+value.model+'\');">'+value.model+'</button>';
            });
            $('.btn-boxfilter.brand').empty();
            $('.btn-boxfilter.model').empty().append(html);
        });

        search3();
    }
    function delgeneration() {
        generation_id=null;
        submodel_id=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-generation').remove();
        $('.btn-submodel').remove();
        $('.btn-year').remove();

        $('.btn-boxfilter.submodel').empty();
        $('.btn-boxfilter.year').empty();

        // แสดงตัวเลือกโฉม
        $.get('/popup-carsearch-generation/a?models_id='+model_id, function(data, status) {
            // console.log(data);
            var html='';
            $.each(data, function(index, value){
                html+='<button onclick="generationsel('+value.id+', \''+value.generations+'\');">'+value.generations+'</button>';
            });
            $('.btn-boxfilter.model').empty();
            $('.btn-boxfilter.generation').empty().append(html);
        });


        search3();
    }
    function delsubmodel() {
        submodel_id=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-submodel').remove();
        $('.btn-year').remove();


        $('.btn-boxfilter.year').empty();

        // แสดงตัวเลือกรุ่นย่อย
        $.get('/popup-carsearch-submodel/a?generations_id='+generation_id, function(data, status) {
            // console.log(data);
            var html='';
            $.each(data, function(index, value){
                html+='<button onclick="submodelsel('+value.id+', \''+value.sub_models+'\');">'+value.sub_models+'</button>';
            });
            $('.btn-boxfilter.generation').empty();
            $('.btn-boxfilter.submodel').empty().append(html);
        });

        // แสดงรุ่นปี
        $.get('/popup-carsearch-year/a?generations_id='+generation_id, function(data, status) {
            // console.log(data);
            var html='';
            for(i=data.yearfirst; i<=data.yearlast; i++){
                html+='<button onclick="yearsel(\''+i+'\');">'+i+'</button>';
            }
            $('.btn-boxfilter.generation').empty();
            $('.btn-boxfilter.year').empty().append(html);
        });


        search3();
    }
    function delpayment() {
        payment=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-payment').remove();
        search3();
    }
    function delprice() {
        pricelow='ต่ำสุด';
        pricehigh='สูงสุด';
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-price').remove();
        search3();
    }
    function delyear() {
        yearlow=' ';
        yearhigh='ทุกปี';
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-year').remove();

        // แสดงรุ่นปี
        $.get('/popup-carsearch-year/a?generations_id='+generation_id, function(data, status) {
            // console.log(data);
            var html='';
            for(i=data.yearfirst; i<=data.yearlast; i++){
                html+='<button onclick="yearsel(\''+i+'\');">'+i+'</button>';
            }
            $('.btn-boxfilter.generation').empty();
            $('.btn-boxfilter.year').empty().append(html);
        });


        search3();
    }
    function delcolor() {
        color=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-color').remove();
        search3();
    }
    function delgear() {
        gear=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-gear').remove();
        search3();
    }
    function delpower() {
        power=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-power').remove();
        search3();
    }
    function delprovince() {
        province_id=null;
        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btnprovince').remove();
        search3();
    }
    function clearall() {
        $('.result-btn-search button:not(:first-child)').remove();
        brand_id=null;
        model_id=null;
        generation_id=null;
        submodel_id=null;
        evtype=null;
        payment=null;
        pricelow = null;
        pricehigh= null;
        color=null;
        gear=null;
        power=null;
        province_id=null;
        yearlow= null;
        yearhigh=null;

        // นำปุ่มที่ถูกคลิกออกจาก DOM
        $('.btn-brand').remove();
        $('.btn-model').remove();
        $('.btn-generation').remove();
        $('.btn-submodel').remove();
        $('.btn-year').remove();
        $('.btn-color').remove();
        $('.btn-payment').remove();
        $('.btn-price').remove();
        $('.btn-gear').remove();
        $('.btn-power').remove();
        $('.btnprovince').remove();

        
        

        $('.btn-boxfilter.model').empty();
        $('.btn-boxfilter.generation').empty();
        $('.btn-boxfilter.submodel').empty();
        $('.btn-boxfilter.year').empty();

        search3();
    }
</script>

@endsection





