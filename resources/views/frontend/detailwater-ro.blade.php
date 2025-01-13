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
                            {{ __('messages.rowater') }}
                        </p>
                        <p class="TextDetail mt-4 mb-4">
                            {{ __('messages.rodesc') }}
                        </p>
                    </div>
                    <div class="ColPrice">
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease">&minus;</button>
                            <form method="POST" id="myform" action="{{ url('quantity') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="quantity" class="input-box TextNumber" value="1" min="1" max="10">
                                <input type="hidden" name="watertype" value="ro">
                            </form>
                            <button class="plus" aria-label="Increase">&plus;</button>
                        </div>

                        <button id="btnsubmit" type="button" class="btn ButtonDone">{{ __('messages.done') }}</button>
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