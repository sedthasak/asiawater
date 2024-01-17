@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - profile-check</title>
@endsection

@section('content')


@include('frontend.layouts.inc_profile')	


<?php

$default_image = asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png');
// echo "<pre>";
// print_r($mycars);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 page-profile">
        <div class="container">
            <div class="row">
                @include('frontend.layouts.inc-menuprofile-search')
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="desc-pageprofile">
                        <div class="wraptopic-pageprofile">
                            <div class="topic-profilepage"><i class="bi bi-circle-fill"></i> รถที่ลงขาย</div>
                            <button class="show-menuprofile"><i class="bi bi-search"></i>ค้นหารถในบัญชี</button>
                        </div>
                        
                        @include('frontend.layouts.inc_menu-mycar')

                        @if (isset($mycars2))


                        @foreach($mycars2 as $keycarsModel => $cars)
                        @php
                        $profilecar_img = ($cars->feature)?asset($cars->feature):asset('public/uploads/default-car.jpg');
                        @endphp
                        <div class="item-mycar">
                            <div class="item-mycar-cover">
                                <a href="{{route('cardetailPage', ['post' => $cars->id])}}"><figure><img src="{{$profilecar_img}}" alt=""></figure></a>
                            </div>
                            <div class="mycar-detail-mb">
                                <a href="{{route('cardetailPage', ['post' => $cars->id])}}">
                                    <div class="mycar-name">{{$cars->modelyear." ".$cars->brands_title." ".$cars->model_name}}</div>
                                    <div class="mycar-type">{{$cars->generations_name." ".$cars->sub_models_name}}</div>
                                    <div class="mycar-idcar">{{$cars->vehicle_code}}</div>
                                </a>
                            </div>
                            <div class="item-mycar-detail">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <a href="{{route('cardetailPage', ['post' => $cars->id])}}">
                                            <div class="mycar-name">{{$cars->modelyear." ".$cars->brands_title." ".$cars->model_name}}</div>
                                            <div class="mycar-type">{{$cars->generations_name." ".$cars->sub_models_name}}</div>
                                            <div class="mycar-idcar">{{$cars->vehicle_code}}</div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <div class="mycar-post">วันที่ลงขาย :  {{date('d m Y', strtotime($cars->created_at))}}</div>
                                        <!-- <div class="mycar-expire">วันที่หมดอายุ :  {{date('d m Y', strtotime($cars->created_at))}}</div> -->
                                    </div>
                                </div>
                                <div class="mycar-boxline">
                                    <div class="row">
                                        <div class="col-8 col-md-8">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">{{number_format($cars->price, 0, '.', ',')}}.-</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        


                        @else
                        @foreach($carfromstatus['created'] as $keycarsModel => $cars)
                        @php
                        $profilecar_img = ($cars->feature)?asset($cars->feature):asset('public/uploads/default-car.jpg');
                        @endphp
                        <div class="item-mycar">
                            <div class="item-mycar-cover">
                                <a href="{{route('cardetailPage', ['post' => $cars->id])}}"><figure><img src="{{$profilecar_img}}" alt=""></figure></a>
                            </div>
                            <div class="mycar-detail-mb">
                                <a href="{{route('cardetailPage', ['post' => $cars->id])}}">
                                    <div class="mycar-name">{{$cars->modelyear." ".$cars->brands_title." ".$cars->model_name}}</div>
                                    <div class="mycar-type">{{$cars->generations_name." ".$cars->sub_models_name}}</div>
                                    <div class="mycar-idcar">{{$cars->vehicle_code}}</div>
                                </a>
                            </div>
                            <div class="item-mycar-detail">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <a href="{{route('cardetailPage', ['post' => $cars->id])}}">
                                            <div class="mycar-name">{{$cars->modelyear." ".$cars->brands_title." ".$cars->model_name}}</div>
                                            <div class="mycar-type">{{$cars->generations_name." ".$cars->sub_models_name}}</div>
                                            <div class="mycar-idcar">{{$cars->vehicle_code}}</div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <div class="mycar-post">วันที่ลงขาย :  {{date('d m Y', strtotime($cars->created_at))}}</div>
                                        <!-- <div class="mycar-expire">วันที่หมดอายุ :  {{date('d m Y', strtotime($cars->created_at))}}</div> -->
                                    </div>
                                </div>
                                <div class="mycar-boxline">
                                    <div class="row">
                                        <div class="col-8 col-md-8">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">{{number_format($cars->price, 0, '.', ',')}}.-</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        
                        @endif
                        




                        <div style="display: none;" id="edit-carprice">
                            <div class="frm-edit-carprice">
                                <div class="text-center">
                                    <div class="txt-editprices">แก้ไขราคา</div>
                                    <div class="txt-editprices2">ท่านสามารถแก้ไขราคาขายได้ 2 ครั้งเท่านั้น</div>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <label>ราคาเดิม</label>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <div class="txt-editprices3">599,000.-</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <label>ราคาใหม่</label>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <input type="text" class="form-control">
                                            <div>จำนวนครั้งที่ท่านสามารถแก้ไขได้  1/2</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="frm-step-button">
                                                <button class="btn-step btn-nextstep">ยืนยันการแก้ไข</button>
                                                <button href="dealer-carpost-step3.php" class="btn-step btn-backstep">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="totop-mb"><a id="button-top">กลับสู่ด้านบน</a></div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

@section('script')
<script>
    $( ".box-menuprofile > ul > li:nth-child(2) > a" ).addClass( "here" );
    $( ".menu-mycar > ul > li:nth-child(2) > a" ).addClass( "here" );
</script>

<script>
    $(document).ready(function(){
      // เมื่อมีการเปลี่ยนแปลงใน input type="text"
      $('.form-control.brand').on('input', function() {
        var searchTerm = $(this).val().toLowerCase(); // ดึงข้อความที่ใส่ใน input
        // วนลูปผ่านทุก <div class="list-mycarsearch">
        $('.list-mycarsearch.brand').each(function() {
          var brandName = $(this).find('div:first-child').text().toLowerCase(); // ดึงข้อความใน div แรก
          // ถ้า brandName ไม่ตรงกับ searchTerm ให้ซ่อน div
          if (brandName.indexOf(searchTerm) === -1) {
            $(this).hide();
          } else {
            $(this).show(); // แสดง div ถ้าตรง
          }
        });
      });


      $('.form-control.model').on('input', function() {
        var searchmodelTerm = $(this).val().toLowerCase(); // ดึงข้อความที่ใส่ใน input
        // วนลูปผ่านทุก <div class="list-mycarsearch">
        $('.list-mycarsearch.model').each(function() {
          var modelName = $(this).find('div:first-child').text().toLowerCase(); // ดึงข้อความใน div แรก
          // ถ้า brandName ไม่ตรงกับ searchTerm ให้ซ่อน div
          if (modelName.indexOf(searchmodelTerm) === -1) {
            $(this).hide();
          } else {
            $(this).show(); // แสดง div ถ้าตรง
          }
        });
      });

    });
    
    </script>


@endsection