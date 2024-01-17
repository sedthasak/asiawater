@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - login-welcome</title>
@endsection

@section('content')

<?php
// $tel = '0998741070';
// $SixDigitRandomNumber = random_int(100000,999999);
// $message = $SixDigitRandomNumber.$tel;

// echo "<pre>";
// print_r($tel);
// echo "</pre>";
// echo "<pre>";
// print_r($SixDigitRandomNumber);
// echo "</pre>";

// $codetosend = rand(100000,999999);
// echo "<pre>";
// print_r($codetosend);
// echo "</pre>";
// session()->put('codetosend', $codetosend);
// session()->flush();
// $currentDateTime = now()->format('YmdHis'); // ดึงวันที่และเวลาปัจจุบันในรูปแบบ YmdHis
// $browserFingerprint = strtotime($currentDateTime) % 1000500; // เข้ารหัสเป็นตัวเลข 6 หลัก
// $sevenDigitRandomNumber = random_int(1000000,9999999);

// function ranInt(){
//     $codetosend = random_int(1000000,9999999);
//     return $codetosend;
// }

// echo "<pre>";
// print_r($test);
// echo "</pre>";

$data = session()->all();
$currentDateTime = now()->format('YmdHis'); // ดึงวันที่และเวลาปัจจุบันในรูปแบบ YmdHis
$date = '20231002013059';
$browserFingerprint = strtotime($date) % 1000000; // เข้ารหัสเป็นตัวเลข 6 หลัก



// echo "<pre>";
// print_r($data);
// echo "</pre>";
// echo "<pre>";
// print_r($dec);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 wrap-login">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown">
                    <div class="login-welcome">
                        <img src="{{asset('frontend/images/logo.svg')}}" alt="">
                        <h1>สวัสดีคุณ Dev</h1>
                        <h2>ยินดีต้อนรับสู่ RodPromptkai</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
