@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - Login</title>
@endsection

@section('content')
<?php
$data = session()->all();
$browserFingerprint = session('browserFingerprint');
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section class="row">
    <div class="col-12 wrap-login">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 content-txtlogin wow fadeInLeft">
                    <div class="box-txtlogin">
                        <h1>ยินดีต้อนรับสู่ <span>RodPromptkai</span></h1>
                        <div class="txt-login01">เข้าสู่ระบบเพื่อรับสิทธิพิเศษ</div>
                        <div class="list-txtlogin">
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> ลงขายฟรี สำหรับรถบ้านและรถคุณผู้หญิง</div>
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> ลงขายฟรี สำหรับดีลเลอร์คุณภาพ</div>
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> บันทึกรถยนต์ที่คุณสนใจ</div>
                            <div><img src="{{asset('frontend/images/icon-tick.svg')}}" alt=""> สิทธิพิเศษจากบริการของ RodPromptkai</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 wow fadeInRight">
                    <div class="box-login">
                        <h2>เข้าสู่ระบบ</h2>
                        <div class="box-desclogin">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="box-descsms">
                                        <div class="box-descsms-topic1">กรุณาส่ง SMS พิมพ์ <span>{{Session::get('browserFingerprint')}}</span></div>
                                        <div class="box-descsms-topic2">มาที่ <span>098-969-1120</span></div>
                                        เบอร์โทร Rodpromptkai.com
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    {{-- <div class="qrcode-login"><img src="{{asset('frontend/images/qrcode.png')}}" alt=""></div> --}}
                                    {{-- <div class="container mt-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h2>Simple QR Code</h2>
                                            </div>
                                            <div class="card-body"> --}}
                                                {{-- {{ QrCode::size(100)->generate('<a href="sms:+66998741070?&amp;body="'.Session::get('browserFingerprint').'>Goto Website</a>') }} --}}
                                                {{-- {{ QrCode::size(100)->generate('sms://+66989691120;?&body='.Session::get('browser_fingerprint')) }} --}}
                                                {{QrCode::size(100)->generate(url('/api/sendsms?phone=+66989691120&text='.$browserFingerprint))}}
                                            {{-- </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="login-checkbox">
                            <label class="list-checkbox">คุณรับทราบ<a href="#" target="_blank">เงื่อนไขการใช้งาน</a> และ <a href="#" target="_blank">นโยบายความเป็นส่วนตัว</a> ของ RodPromptkai และต้องการสร้างบัญชีด้วยเบอร์โทรศัพท์ของคุณ ซึ่งเราจะใช้เป็นเบอร์ติดต่อสำหรับการซื้อและขายรถยนต์เท่านั้น
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <a href="{{url('/api/sendsms?phone=+66989691120&text='.$browserFingerprint)}}" class="btn-sendsms">ส่ง SMS เพื่อเข้าสู่ระบบ</a>
                        <div class="login-txtnote">หลังจากส่ง SMS กรุณารอสักครู่เพื่อเข้าสู่ระบบโดยอัตโนมัติ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</section>


@endsection

@section('script')
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script> 
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function randomInterval() {
            return Math.random() < 0.5 ? 1000 : 3000;
        }
        $(document).ready(function() {
            setInterval(function () {
                var jqxhr = $.get("{{route('loopidentity')}}", function(data, index) {
                    console.log(data.text);
                    if (data.text == "success") {
                        window.location.href = "{{route('loginwelcomePage')}}";
                    }
                })
                .fail(function() {
                    console.log('failed');
                });
            }, randomInterval());
        }); 
    </script>
@endsection
