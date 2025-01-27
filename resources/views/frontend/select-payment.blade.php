@extends('frontend.layouts.header')
@section('content')


    @include('frontend.includes.inc_topmenu')
    <div class="ColBodyDetail">

        <div class="Col-Logo-Home mt-5 mb-5">
            <img src="{{ url('asiawater/images/logo.jpg') }}" alt="">
        </div>
        <input name="pages" type="hidden" value="payment">
        <input name="playtimes" type="hidden" value="0">
        <div class="BoxBody-White">
            <div class="container">
                <div class="WarpCol-Detail">
                    <div class="d-flex flex-column align-items-center">
                        <a class="btn ButtonClose" href="{{ url()->previous() }}">
                            <img src="{{ url('asiawater/images/ic-left-as.svg') }}" alt="">
                        </a>
                        <img class="ImgDetail-Select" src="@if (session('watertype') == 'ro'){{ url('asiawater/images/ro.gif') }}@elseif (session('watertype') == 'alkaline'){{ url('asiawater/images/oxygen.gif') }}@elseif (session('watertype') == 'oxygen'){{ url('asiawater/images/love.gif') }}@endif" alt="">
                        <p class="Text-wt-detail-Select">
                            @if (session('watertype') == 'ro'){{ __('messages.rowater') }} @elseif (session('watertype') == 'alkaline'){{  __('messages.alkalinewater') }} @elseif (session('watertype') == 'oxygen'){{ __('messages.oxygenwater') }}  @endif
                        </p>
                        <div class="BoxCol-Price-Select">
                            <p class="TextPrice-Select-Bath">
                                {{ __('messages.price') }}
                            </p>
                            <p class="Text-wt-detail me-4 ms-4">
                                {{session('price')}}
                            </p>
                            <p class="TextPrice-Select-Bath">
                                {{ __('messages.baht') }}
                            </p>
                        </div>
                        <p class="Text-Paymentopton">
                            Payment options
                        </p>
                        <div class="Div-Paymentoption">
                            <a href="{{ url('push') }}" class="btn Button-Paymentoption">
                                <img src="{{ url('asiawater/images/coin-as.png') }}" alt="">
                                {{ __('messages.cash') }}
                            </a>
                            <a href="{{ url('qr-code') }}" class="btn Button-Paymentoption">
                                <img src="{{ url('asiawater/images/qr-as.png') }}" alt="">
                                {{ __('messages.qrcode') }}
                            </a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>

    </div>


    @include('frontend.includes.inc_script')

    @stop