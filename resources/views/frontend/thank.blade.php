@extends('frontend.layouts.header')
@section('content')


    @include('frontend.includes.inc_topmenu')

    <section id="NavHeader">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img class="Col-Logo" src="./images/logo.jpg" alt="">
                </div>

                <div class="col-10 WarperCol-TextHeader">
                    <p class="TextHeaderNav">
                        {{ __('messages.TextHeaderNav1')}}
                        <span class="TextHeaderNav-Blue">
                            “chang smile”
                        </span>
                        {{ __('messages.TextHeaderNav2')}}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="col-Language">
            <a class="Box-Language" href="{{ url('set-language/th') }}">
                <img class="IconFlag" src="./images/icon-th.svg" alt="">
            </a>
            <a class="Box-Language" href="{{ url('set-language/en') }}">
                <img class="IconFlag" src="./images/icon-eng.svg" alt="">
            </a>
        </div>

        <div class="Col-Logo-Home">
            <img src="./images/logo.jpg" alt="">
        </div>

        <div class="Col-Image-Thank">
            <img class="ImgDetail" src="./images/thk.gif" alt="">
        </div>

        <div class="Col-Text-HeadHome">
            <p class="text-center TextHeader">
                Thank You
            </p>
            <p class="text-center TextBodyThankyou">
                Thank you for using AQUA water dispenser service.
            </p>
        </div>

        <!-- <div class="Col-BoxSelect">
            <div class="row">
                <div class="col-4 col-btn-BoxSelect">
                    <a href="detailwater-ro.php" class="btn BoxSelect">
                        <img class="Image-wt" src="./images/ro.gif" alt="">
                        <p class="text-center mt-4 Text-wt">
                            R.O.
                        </p>
                        <p class="text-center mt-0 Text-wt2">
                            Water
                        </p>
                    </a>
                </div>
                <div class="col-4 col-btn-BoxSelect">
                    <a href="detailwater-alkaline.php" class="btn BoxSelect">
                        <img class="Image-wt" src="./images/oxygen.gif" alt="">
                        <p class="text-center mt-4 Text-wt">
                            alkaline
                        </p>
                        <p class="text-center mt-0 Text-wt2">
                            Water
                        </p>
                    </a>
                </div>
                <div class="col-4 col-btn-BoxSelect">
                    <a href="detailwater-oxygen.php" class="btn BoxSelect">
                        <img class="Image-wt" src="./images/love.gif" alt="">
                        <p class="text-center mt-4 Text-wt">
                            oxygen
                        </p>
                        <p class="text-center mt-0 Text-wt2">
                            Water
                        </p>
                    </a>
                </div>
            </div>
        </div> -->

    </div>

    @include('frontend.includes.inc_script')

    @stop