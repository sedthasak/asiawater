@extends('frontend.layouts.header')
@section('content')


    @include('frontend.includes.inc_topmenu')

    <div class="ColBodyDetail">

        <div class="Col-Logo-Home mt-5 mb-5">
            <img src="./images/logo.jpg" alt="">
        </div>

        <div class="BoxBody-White">
            <div class="container">
                <div class="WarpCol-Detail">
                    <div class="d-flex flex-column align-items-center">
                        <a class="btn ButtonClose" href="detailwater-ro.php">
                            <img src="./images/ic-left-as.svg" alt="">
                        </a>
                        <img class="ImgDetail" src="./images/water-drop.gif" alt="">
                        <p class="Text-wt-detail-Select">
                            R.O. Water
                        </p>
                        <div class="BoxCol-Price-Select">
                        </div>
                        <p class="Text-Paymentopton">
                            Please flush the water
                        </p>
                        <p class="TextDetail text-center mb-3">
                            Please bring a container. and gently press to release water
                        </p>
                        <div class="Div-Paymentoption">
                            <div class="ShowNumber">
                                <p class="Text-Head-Shownumber">
                                    5
                                </p>
                                <p class="Text-Detail-Shownumber">
                                    remaining balance
                                </p>
                            </div>
                            <div class="Warp-BoxButton-Push">
                                <button class="btn ButtonStart">
                                    <img src="./images/play-as.png" alt="">
                                    START
                                </button>
                                <button class="btn ButtonStart">
                                    <img src="./images/stop-as.png" alt="">
                                    STOP
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    @include('frontend.includes.inc_script')

    @stop