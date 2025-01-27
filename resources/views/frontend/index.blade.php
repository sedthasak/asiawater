
@extends('frontend.layouts.header')
    @include('frontend.includes.inc_topmenu')
    <div class="col-Language">
        <a class="Box-Language" href="{{ url('set-language/th') }}">
            <img class="IconFlag" src="{{ asset('asiawater/images/icon-th.svg') }}" alt="">
        </a>
        <a class="Box-Language" href="{{ url('set-language/en') }}">
            <img class="IconFlag" src="{{ asset('asiawater/images/icon-eng.svg') }}" alt="">
        </a>
    </div>

    <div class="Col-Logo-Home">
        <img src="{{ asset('asiawater/images/logo.jpg') }}" alt="">
    </div>
    <input name="pages" type="hidden" value="home">
    <input name="playtimes" type="hidden" value="0">
    <div class="Col-Text-HeadHome">
        <p class="text-center TextHeader">
            {{ __('messages.TextHeader') }}
        </p>
        <p class="text-center TextBody">
            {{ __('messages.TextBody') }}
        </p>
    </div>

    <div class="Col-BoxSelect">
        <div class="row">
            <div class="col-4 col-btn-BoxSelect">
                <a href="{{ url('detailwater-ro') }}" class="btn BoxSelect">
                    <img class="Image-wt" src="{{ asset('asiawater/images/ro.gif') }}" alt="">
                    <p class="text-center mt-4 Text-wt">
                        {{ __('messages.ro') }}
                    </p>
                    <p class="text-center mt-0 Text-wt2">
                        {{ __('messages.ro2') }}
                    </p>
                </a>
            </div>
            <div class="col-4 col-btn-BoxSelect">
                <a href="{{ url('detailwater-alkaline') }}" class="btn BoxSelect">
                    <img class="Image-wt" src="{{ asset('asiawater/images/oxygen.gif') }}" alt="">
                    <p class="text-center mt-4 Text-wt">
                        {{ __('messages.alkaline') }}
                    </p>
                    <p class="text-center mt-0 Text-wt2">
                        {{ __('messages.alkaline2') }}
                    </p>
                </a>
            </div>
            <div class="col-4 col-btn-BoxSelect">
                <a href="{{ url('detailwater-oxygen') }}" class="btn BoxSelect">
                    <img class="Image-wt" src="{{ asset('asiawater/images/love.gif') }}" alt="">
                    <p class="text-center mt-4 Text-wt">
                        {{ __('messages.oxygen') }}
                    </p>
                    <p class="text-center mt-0 Text-wt2">
                        {{ __('messages.oxygen2') }}
                    </p>
                </a>
            </div>
        </div>
    </div>