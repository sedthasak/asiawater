@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - profile-expire</title>
@endsection

@section('content')


@include('frontend.layouts.inc_profile')	
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
                        <div class="note-expire">ต่ออายุประกาศ</div>

                        @foreach($carfromstatus['expired'] as $keycarsModel => $cars)
                        @php
                        $profilecar_img = ($cars->feature)?asset($cars->feature):asset('public/uploads/default-car.jpg');
                        @endphp
                        

                        <div class="boxcar-expire">
                            <div class="login-checkbox">
                                <label class="list-checkbox">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
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
                                            <a href="car-detail.php">
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
                                            <div class="col-12">
                                                <div class="mycar-boxprice">
                                                    <div class="mycar-price">{{number_format($cars->price, 0, '.', ',')}}.-</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-mycar-button">
                                    <a href="#" class="btn-mycar btn-mycar-edit"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                    <button class="btn-mycar btn-mycar-delete button-delete"><i class="bi bi-trash3-fill"></i> ลบ</button>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <!-- <div class="boxcar-expire">
                            <div class="login-checkbox">
                                <label class="list-checkbox">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="item-mycar">
                                <div class="item-mycar-cover">
                                    <a href="car-detail.php"><figure><img src="{{asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png')}}" alt=""></figure></a>
                                </div>
                                <div class="mycar-detail-mb">
                                    <a href="car-detail.php">
                                        <div class="mycar-name">2023 BMW X1</div>
                                        <div class="mycar-type">X1 2.0 sDrive18i</div>
                                        <div class="mycar-idcar">4กข 8113</div>
                                    </a>
                                </div>
                                <div class="item-mycar-detail">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <a href="car-detail.php">
                                                <div class="mycar-name">2023 BMW X1</div>
                                                <div class="mycar-type">X1 2.0 sDrive18i</div>
                                                <div class="mycar-idcar">4กข 8113</div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-6 text-end">
                                            <div class="mycar-post">วันที่ลงขาย :  16 มิ.ย. 66</div>
                                            <div class="mycar-expire">วันที่หมดอายุ :  16 ธ.ค. 66</div>
                                        </div>
                                    </div>
                                    <div class="mycar-boxline">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mycar-boxprice">
                                                    <div class="mycar-price">599,000.-</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-mycar-button">
                                    <a href="#" class="btn-mycar btn-mycar-edit"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                    <button class="btn-mycar btn-mycar-delete button-delete"><i class="bi bi-trash3-fill"></i> ลบ</button>
                                </div>
                            </div>
                        </div> -->



                        

                        <!-- <div class="expire-selectall">
                            <div class="login-checkbox">
                                <label class="list-checkbox"><span class="txt-itemcar">เลือกทั้งหมด (5)</span>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div>
                                <span class="txt-itemcar">รวม (0 รายการ)</span>
                                <button>ต่ออายุ</button>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $( ".box-menuprofile > ul > li:nth-child(4) > a" ).addClass( "here" );
    $( ".menu-mycar > ul > li:nth-child(4) > a" ).addClass( "here" );
</script>
<script>
    $(document).on('click', '.button-delete', function(e) {
        Swal.fire({
        title: 'ยืนยันการลบข้อมูล',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#C60D0D',
        cancelButtonColor: '#666',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก',
        denyButtonText: 'ยกเลิก'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'ลบข้อมูลสำเร็จ',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#C60D0D',
            })
        }
        })
  });
</script>
@endsection

