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
                        <a class="btn ButtonClose" href="select-payment.php">
                            <img src="./images/ic-left-as.svg" alt="">
                        </a>
                        <div class="BoxCol-Price-Select">
                            <p class="TextPrice-Select-Bath">
                                price
                            </p>
                            <p class="Text-wt-detail me-4 ms-4">
                                5
                            </p>
                            <p class="TextPrice-Select-Bath">
                                bath
                            </p>
                        </div>
                        <p class="Text-Paymentopton">
                            Make payment
                        </p>
                        <p class="TextDetail mb-3">
                            Choose to pay by scanning qr code.
                        </p>
                        <div class="Col-QRPayment">
                            <div class="Box-QRPayment">
                                <div class="Headbox-QRPayment">
                                    <img src="./images/tqr-as.png" alt="">
                                </div>
                                <div class="Box-DetailQR-Payment">
                                    <img class="logo-PP" src="./images/pp-as.png" alt="">
                                    <img class="IMG-QR-Detail" src="./images/qr-detail-as.png" alt="">
                                    <p class="TextDetail Text-Color-B">
                                        Asia water co.ltd </p>
                                </div>
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