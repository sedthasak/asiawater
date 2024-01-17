@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - profile</title>
@endsection

@section('content')


@include('frontend.layouts.inc_profile')	
<?php

$default_image = asset('frontend/images/CAR202304060018_BMW_X5_20230406_101922704_WATERMARK.png');
// echo "<pre>";
// print_r($_POST);
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

                        @foreach($carfromstatus['approved'] as $keycarsModel => $cars)
                        @php
                        $profilecar_img = ($cars->feature)?asset($cars->feature):asset('public/uploads/default-car.jpg');
                        $resve_state = ($cars->reserve==1)?'active':'';
                        @endphp
                        <div class="item-mycar">
                            <div class="item-mycar-cover">
                                <a href="{{route('cardetailPage', ['post' => $cars->id])}}"><figure><img src="{{$profilecar_img}}" alt=""></figure></a>
                            </div>
                            <div class="mycar-detail-mb">
                                <a href="car-detail.php">
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
                                        @if(isset($cars->approvedate))
                                            <div class="mycar-post">วันที่ลงขาย :  {{date('d/m/Y', $cars->approvedate)}}</div>
                                        @endif
                                        @if(isset($cars->expiredate))
                                            <div class="mycar-expire">วันที่หมดอายุ :  {{date('d/m/Y', $cars->expiredate)}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mycar-boxline">
                                    <div class="row">
                                        <div class="col-8 col-md-8">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">{{number_format($cars->price, 0, '.', ',')}}.-</div>
                                                @if((2 - $cars->edit_price) > 0)
                                                <a data-fancybox data-src="#edit-carprice{{$cars->id}}" href="javascript:;" class="mycar-editprice">
                                                    <i class="bi bi-pencil-square"></i> แก้ไขราคา
                                                </a>
                                                @endif 
                                                
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 text-end">
                                            <button class="mycar-reserve {{$resve_state}}" data-post-id="{{ $cars->id }}" data-current-value="{{ $cars->reserve }}" >
                                            <img src="{{asset('frontend/images/icon-check.svg')}}" class="svg" alt=""> จองแล้ว</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-mycar-button">
                                <a href="{{route('carpostregistereditPage', ['post' => $cars->id])}}" class="btn-mycar btn-mycar-edit"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                <button class="btn-mycar btn-mycar-delete button-delete" data-carsid="{{ $cars->id }}">
                                    <i class="bi bi-trash3-fill"></i> ลบ
                                </button>

                            </div>
                        </div>

                        <div style="display: none;" id="edit-carprice{{$cars->id}}" class="box-edit-carprice">
                            <div class="frm-edit-carprice">
                                <div class="text-center">
                                    <div class="txt-editprices">แก้ไขราคา</div>
                                    <div class="txt-editprices2">ท่านสามารถแก้ไขราคาขายได้ 2 ครั้งเท่านั้น</div>
                                </div>
                                <form method="post" action="{{ route('updatepricePage') }}">
                                @csrf
                                    <input type="hidden" name="id" value="{{$cars->id}}" />
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <label>ราคาเดิม</label>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <div class="txt-editprices3">{{number_format($cars->price, 0, '.', ',')}}.-</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <label>ราคาใหม่</label>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <input type="number" name="newprice" class="form-control">
                                            <div>จำนวนครั้งที่ท่านสามารถแก้ไขได้  {{2 - $cars->edit_price}}/2</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="frm-step-button">
                                                <div class="btn-step btn-nextstep btn-confirm-edit-carprice">ยืนยันการแก้ไข</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach

                        

                        <!-- <div class="item-mycar">
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
                                        <div class="col-8 col-md-8">
                                            <div class="mycar-boxprice">
                                                <div class="mycar-price">599,000.-</div>
                                                <a data-fancybox data-src="#edit-carprice" href="javascript:;" class="mycar-editprice"><i class="bi bi-pencil-square"></i> แก้ไขราคา</a>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 text-end">
                                            <button class="mycar-reserve"><img src="{{asset('frontend/images/icon-check.svg')}}" class="svg" alt=""> จองแล้ว</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-mycar-button">
                                <a href="#" class="btn-mycar btn-mycar-edit"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                <button class="btn-mycar btn-mycar-delete button-delete"><i class="bi bi-trash3-fill"></i> ลบ</button>
                            </div>
                        </div> -->


                        
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
    $( ".box-menuprofile > ul > li:nth-child(1) > a" ).addClass( "here" );
    $( ".menu-mycar > ul > li:nth-child(1) > a" ).addClass( "here" );
</script>
<script>

    $(document).ready(function(){
        $(".btn-confirm-edit-carprice").on("click", function () {
            $(this).closest("form").submit();
        });
    });


    document.querySelectorAll('.btn-mycar-delete').forEach(button => {
        button.addEventListener('click', function () {
            var postId = this.getAttribute('data-carsid');

            $('#wait').show();

            Swal.fire({
                title: 'ต้องการจะลบหรือไม่ ?',
                text: 'หากลบแล้ว ข้อมูลจะหายไปทั้งหมด',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {

                $('#wait').hide();

                if (result.isConfirmed) {
                    $('#wait').show();
                    axios.post('{{ route("carpostdeleteactionPage") }}', {
                        id: postId
                    })
                    .then((response) => {
                        $('#wait').hide();
                        Swal.fire({
                            title: 'สำเร็จ !',
                            text: response.data.message,
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch((error) => {
                        $('#wait').hide();
                        Swal.fire(
                            'ล้มเหลว!',
                            'ไม่สามารถทำตามที่ร้องขอได้ !!!',
                            'error'
                        );
                    });
                }
            });
        });
    });


    document.querySelectorAll('.mycar-reserve').forEach(button => {
        button.addEventListener('click', function () {
            var postId = this.getAttribute('data-post-id');
            var currentValue = this.getAttribute('data-current-value');

            // You can customize the Swal.fire() method according to your needs
            Swal.fire({
                title: 'เปลี่ยนสถานะการจอง ?',
                // text: 'You are about to toggle the data for post ' + postId + '!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle the toggle action here using Ajax or any other method
                    // For example, you can use Axios to make an Ajax request
                    axios.post('/update-reserve', {
                        id: postId,
                        currentValue: currentValue,
                        // Other data to be sent for toggle
                    })
                    .then((response) => {
                        // Handle the success response
                        Swal.fire({
                            title: 'สำเร็จ !',
                            // text: 'Your data has been toggled for post ' + postId + '.',
                            icon: 'success'
                        }).then(() => {
                            // Reload the page after clicking "OK"
                            location.reload();
                        });
                        
                        // Update the button's data-current-value attribute after a successful toggle
                        this.setAttribute('data-current-value', response.data.newValue);
                    })
                    .catch((error) => {
                        // Handle the error response
                        Swal.fire(
                            'ล้มเหลว!',
                            'ไม่สามารถทำตามที่ร้องขอได้ !!!',
                            'error'
                        );
                    });
                }
            });
        });
    });


    





    // $(document).on('click', '.button-delete', function(e) {
    //     Swal.fire({
    //     title: 'ยืนยันการลบข้อมูล',
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#C60D0D',
    //     cancelButtonColor: '#666',
    //     confirmButtonText: 'ยืนยัน',
    //     cancelButtonText: 'ยกเลิก',
    //     denyButtonText: 'ยกเลิก'
    //     }).then((result) => {
    //     if (result.isConfirmed) {
    //         Swal.fire({
    //             title: 'ลบข้อมูลสำเร็จ',
    //             icon: 'success',
    //             confirmButtonText: 'ตกลง',
    //             confirmButtonColor: '#C60D0D',
    //         })
    //     }
    //     })
    // });
    
    // $(document).on('click', '.button-delete', function(e) {
    //     Swal.fire({
    //     title: 'ยืนยันการลบข้อมูล',
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#C60D0D',
    //     cancelButtonColor: '#666',
    //     confirmButtonText: 'ยืนยัน',
    //     cancelButtonText: 'ยกเลิก',
    //     denyButtonText: 'ยกเลิก'
    //     }).then((result) => {
    //     if (result.isConfirmed) {
    //         Swal.fire({
    //             title: 'ลบข้อมูลสำเร็จ',
    //             icon: 'success',
    //             confirmButtonText: 'ตกลง',
    //             confirmButtonColor: '#C60D0D',
    //         })
    //     }
    //     })
    // });
</script>


<script>
    // $(".btn-confirm-edit-carprice").on("click", function () {
    //     $(this).closest("form").submit();
    // });

    $(document).ready(function(){
      // เมื่อมีการเปลี่ยนแปลงใน input type="text"
      $('input[type="text"]').on('input', function() {
        var searchTerm = $(this).val().toLowerCase(); // ดึงข้อความที่ใส่ใน input
        // วนลูปผ่านทุก <div class="list-mycarsearch">
        $('.list-mycarsearch').each(function() {
          var brandName = $(this).find('div:first-child').text().toLowerCase(); // ดึงข้อความใน div แรก
          // ถ้า brandName ไม่ตรงกับ searchTerm ให้ซ่อน div
          if (brandName.indexOf(searchTerm) === -1) {
            $(this).hide();
          } else {
            $(this).show(); // แสดง div ถ้าตรง
          }
        });
      });
    });
    </script>

@endsection
