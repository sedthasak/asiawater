@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - Notification</title>
@endsection

@section('content')

<?php


// $qqq = 7;
// echo "<pre>";
// print_r($notice);
// echo "</pre>";
?>


<section class="row">
    <div class="col-12 page-noti page-profile wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-profilepage"><i class="bi bi-circle-fill"></i> รายการแจ้งเตือน</div>

                    
                    @foreach($notice as $keycont => $notice_show)
                    @php 
                    $url = '#';
                    if($notice_show->resource=='contacts_back'){$url = route('customercontactPage');}
                    elseif($notice_show->resource=='cars'){$url = route('profileeditcarinfoPage');}
                    @endphp 
                    <a href="{{$url}}" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">{{$notice_show->title}}</div>
                            </div>
                            <div class="col-3 text-end">
                                {{date('d/m/Y', strtotime($notice_show->created_at))}}
                            </div>
                            <div class="col-12">
                                <div class="desc-noti">{{$notice_show->detail}}</div>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    <!-- <a href="profile-expire.php" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">รถของคุณจะหมดอายุอีก 3 วัน</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div>
                            <div class="col-12">
                                <div class="desc-noti">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> 
                            </div>
                        </div>
                    </a>
                    <a href="profile-editcarinfo.php" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">กรุณาแก้ไขรายละเอียดรถยนต์</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div>
                            <div class="col-12">
                            <div class="desc-noti">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> 
                            </div>
                        </div>
                    </a>
                    <a href="customer-contact.php" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">มีลูกค้ารอติดต่อกลับ</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div>
                            <div class="col-12">
                                <div class="desc-noti">ชื่อลูกค้า:  สมชาย ใจดี</div>
                            </div>
                        </div>
                    </a>
                    <a href="profile-expire.php" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">รถของคุณจะหมดอายุอีก 3 วัน</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div>
                            <div class="col-12">
                            <div class="desc-noti">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> 
                            </div>
                        </div>
                    </a>
                    <a href="profile-editcarinfo.php" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">กรุณาแก้ไขรายละเอียดรถยนต์</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div>
                            <div class="col-12">
                                <div class="desc-noti">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div> 
                            </div>
                        </div>
                    </a>
                    <a href="customer-contact.php" class="item-noti">
                        <div class="row">
                            <div class="col-9">
                                <div class="title-noti">มีลูกค้ารอติดต่อกลับ</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div>
                            <div class="col-12">
                                <div class="desc-noti">ชื่อลูกค้า:  สมชาย ใจดี</div> 
                            </div>
                        </div>
                    </a> -->

                </div>
            </div>
        </div>
    </div>
</section>


@endsection



