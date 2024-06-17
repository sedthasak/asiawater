@extends('frontend.layouts.header')


    {{-- @include('frontend.includes.inc_topmenu') --}}

    <div class="ColBodyDetail">

        <div class="Col-Logo-Home mt-5 mb-5">
            <img src="{{ asset('asiawater/images/logo.jpg') }}" alt="">
        </div>

        <div class="BoxBody-White">
            <div class="container">
                <div class="WarpCol-Detail">
                    <div class="d-flex flex-column align-items-center">
                        <a class="btn ButtonClose" href="{{ url('/') }}">
                            <img src="{{ asset('asiawater/images/ic-close.svg') }}" alt="">
                        </a>
                        <img class="ImgDetail" src="{{ asset('asiawater/images/love.gif') }}" alt="">
                        <p class="Text-wt-detail">
                            Oxygen Water
                        </p>
                        <p class="TextDetail mt-4 mb-4">
                            น้ำดื่มออกซิเจน
                            คือน้ำดื่มที่มีค่าออกซิเจนที่ละลายอิ่มตัวในน้ำสูงกว่าน้ำดื่มทั่วไป ด้วยวิธี Micro Nanobubble Technology เพิ่มปริมาณก๊าช
                            Oxygen ในเลือด ช่วยเติมความสดชื่น กระปรี้กระเปร่า ช่วยเพิ่มการไหลเวียนของโลหิต ลดความอ่อนเพลียจากการทำงานหนัก
                        </p>
                    </div>
                    <div class="ColPrice">
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease">&minus;</button>
                            <form method="POST" id="myform" action="{{ url('quantity') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="quantity" class="input-box TextNumber" value="1" min="1" max="10">
                                <input type="hidden" name="watertype" value="oxygen">
                            </form>
                            <button class="plus" aria-label="Increase">&plus;</button>
                        </div>

                        <button id="btnsubmit" type="button" class="btn ButtonDone">DONE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#btnsubmit').click(function(e){
            $('#myform').submit();
        });
    </script>

    @include('frontend.includes.inc_script')