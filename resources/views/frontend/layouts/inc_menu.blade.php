

<?php

$data = session()->all();
$customerdata = session('customer');
// echo "<pre>";
// print_r($notice);
// echo "</pre>";
?>
<header class="row">
    <div class="col-12 wrap_menu">

        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-5 col-lg-6">
                        <div class="logo">
                            <a href="{{route('indexPage')}}">
                                <img src="{{asset('frontend/images/logo.svg')}}" alt="" class="svg">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-7 col-lg-6">
                        <div class="topbar-right">
                            @if(isset($customerdata))
                            
                            <a href="{{route('profilePage')}}" class="btn-login"><i class="bi bi-person-circle"></i> {{$customerdata->firstname??$customerdata->phone}}</a>
                            @else
                            <a href="{{route('loginPage')}}" class="btn-login"><i class="bi bi-person-circle"></i> เข้าสู่ระบบ</a>
                            @endif
                            @if(isset($notice) && count($notice) > 0)
                            <a href="{{route('notificationPage')}}" class="btn-noti"><i class="bi bi-bell"></i> <div>{{count($notice)}}</div></a>
                            @else
                            <a href="{{route('notificationPage')}}" class="btn-noti"><i class="bi bi-bell"></i> </a>
                            @endif
                            
                            <a href="{{route('postcarPage')}}" class="btn-postcar"><img src="{{asset('frontend/images/icon-car.svg')}}" alt=""> ลงขายรถของคุณ <span>ฟรี!</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-mobile">
            <div class="wrap_btn_menu">
                <div class="btn_menu"><i class="bi bi-list"></i></div>
            </div>
        </div>

        <div class="mainmenu">
            <div class="container">
                <div class="row">
                    <nav class="col-12 box-menu">
                        <ul>
                            <li class="logo_menuopen">
                                <div class="logo-mb">
                                    <a href="{{route('indexPage')}}">
                                        <img src="{{asset('frontend/images/logo.svg')}}" alt="" class="svg">
                                    </a>
                                </div>
                                <div class="close_menu"><i class="bi bi-x-circle-fill"></i></div>
                            </li>
                            <li><a href="{{route('indexPage')}}"><i class="bi bi-car-front-fill"></i> ซื้อรถยนต์</a></li>
                            <li><a href="{{route('carPage')}}"><i class="bi bi-car-front"></i> ดูรถพร้อมขาย</a></li>
                            <!-- <li><a href="{{route('carPage')}}"><i class="bi bi-stars"></i> รถใหม่</a></li> -->
                            <li class="hassub">
                                <a><i class="bi bi-newspaper"></i> ข่าวรถ</a>
                                <ul class="submenu">
                                    <li><a href="{{route('newsPage')}}">ข่าวยานยนต์</a></li>
                                    <li><a href="{{route('updatecarpricePage')}}">อัพเดทราคารถยนต์</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="#"><i class="bi bi-line"></i> ติดต่อเรา</a></li> -->
                            <li class="m-logout"><a href="/clearsessioncustomer"><i class="bi bi-box-arrow-right"></i> ออกจากระบบ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</header>



