
@extends('frontend.layouts.header')
    @include('frontend.includes.inc_topmenu')
    <div class="col-Language">
        <a class="Box-Language" href="">
            <img class="IconFlag" src="{{ asset('asiawater/images/icon-th.svg') }}" alt="">
        </a>
        <a class="Box-Language" href="">
            <img class="IconFlag" src="{{ asset('asiawater/images/icon-eng.svg') }}" alt="">
        </a>
    </div>

    <div class="Col-Logo-Home">
        <img src="{{ asset('asiawater/images/logo.jpg') }}" alt="">
    </div>

    <div class="Col-Text-HeadHome">
        <p class="text-center TextHeader">
            Hey, what’s up?
        </p>
        <p class="text-center TextBody">
            Please select water type
        </p>
    </div>

    <div class="Col-BoxSelect">
        <div class="row">
            <div class="col-4 col-btn-BoxSelect">
                <a href="{{ url('detailwater-ro') }}" class="btn BoxSelect">
                    <img class="Image-wt" src="{{ asset('asiawater/images/ro.gif') }}" alt="">
                    <p class="text-center mt-4 Text-wt">
                        R.O.
                    </p>
                    <p class="text-center mt-0 Text-wt2">
                        Water
                    </p>
                </a>
            </div>
            <div class="col-4 col-btn-BoxSelect">
                <a href="{{ url('detailwater-alkaline') }}" class="btn BoxSelect">
                    <img class="Image-wt" src="{{ asset('asiawater/images/oxygen.gif') }}" alt="">
                    <p class="text-center mt-4 Text-wt">
                        alkaline
                    </p>
                    <p class="text-center mt-0 Text-wt2">
                        Water
                    </p>
                </a>
            </div>
            <div class="col-4 col-btn-BoxSelect">
                <a href="{{ url('detailwater-oxygen') }}" class="btn BoxSelect">
                    <img class="Image-wt" src="{{ asset('asiawater/images/love.gif') }}" alt="">
                    <p class="text-center mt-4 Text-wt">
                        oxygen
                    </p>
                    <p class="text-center mt-0 Text-wt2">
                        Water
                    </p>
                </a>
            </div>
        </div>
    </div>