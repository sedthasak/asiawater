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
                        <img class="ImgDetail" src="{{ asset('asiawater/images/ro.gif') }}" alt="">
                        <p class="Text-wt-detail">
                            R.O. Water
                        </p>
                        <p class="TextDetail mt-4 mb-4">
                            น้ำดื่ม R.O.(Reverse Osmosis) น้ำดื่มRo เป็นระบบกรองน้ำซึ่งจะทำให้น้ำที่ได้มานั้นก่อนข้างที่จะมีความบริสุทธิ์สูง และด้วยความละเอียดในการ
                            กรอง 0.00 1 Micron ส่งผลให้เป็นน้ำดื่มที่บริโภคได้อย่างปลอดภัย
                        </p>
                    </div>
                    <div class="ColPrice">
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease">&minus;</button>
                            <input type="number" class="input-box TextNumber" value="1" min="1" max="10">
                            <button class="plus" aria-label="Increase">&plus;</button>
                        </div>

                        <a href="{{ url('select-payment') }}" class="btn ButtonDone">
                            DONE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.includes.inc_script')