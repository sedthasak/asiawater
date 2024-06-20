@extends('frontend.layouts.header')
@section('content')


    @include('frontend.includes.inc_topmenu')

    <div class="ColBodyDetail">

        <div class="Col-Logo-Home mt-5 mb-5">
            <img src="{{ asset('asiawater/images/logo.jpg') }}" alt="">
        </div>

        <div class="BoxBody-White">
            <div class="container">
                <div class="WarpCol-Detail">
                    <div class="d-flex flex-column align-items-center">
                        <a class="btn ButtonClose" href="{{ url()->previous() }}">
                            <img src="{{ asset('asiawater/images/ic-left-as.svg') }}" alt="">
                        </a>
                        <img class="ImgDetail" src="{{ asset('asiawater/images/water-drop.gif') }}" alt="">
                        <p class="Text-wt-detail-Select">
                            {{session('watertype')}}
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
                                <p class="Text-Head-Shownumber" id="number-display">
                                    @if(!empty(session('total'))){{session('total')}}@else {{'0'}} @endif
                                </p>
                                <p class="Text-Detail-Shownumber">
                                    remaining balance
                                </p>
                            </div>
                            <div class="Warp-BoxButton-Push">
                                <button class="btn ButtonStart">
                                    <img src="{{ asset('asiawater/images/play-as.png') }}" alt="">
                                    START
                                </button>
                                <button class="btn ButtonStart">
                                    <img src="{{ asset('asiawater/images/stop-as.png') }}" alt="">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var idleTime = 0;
            var idleInterval;
            var previousValue = parseInt($('#number-display').text());

            function redirectToHome() {
                window.location.href = '/';
            }

            function resetIdleTimer() {
                idleTime = 0;
                if (idleInterval) {
                    clearInterval(idleInterval);
                }
                idleInterval = setInterval(function() {
                    idleTime++;
                    console.log('time += '+idleTime);
                    if (idleTime >= 30) { // 30 seconds
                        redirectToHome();
                    }
                }, 1000); // 1 second
            }

            function updateTotal(newValue) {
                $.ajax({
                    url: '{{ route("updateTotal") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        value: newValue
                    },
                    success: function(response) {
                        console.log('Total updated:', response.total);
                    }
                });
            }

            // Observe changes to the number element
            var targetNode = document.querySelector('#number-display');
            var observer = new MutationObserver(function(mutationsList, observer) {
                for (var mutation of mutationsList) {
                    if (mutation.type === 'childList') {
                        var newValue = parseInt(targetNode.textContent);
                        var increment = newValue - previousValue;
                        if (increment > 0) {
                            updateTotal(increment);
                        }
                        previousValue = newValue;
                        resetIdleTimer();
                    }
                }
            });

            observer.observe(targetNode, { childList: true });

            // Reset timer on button clicks
            $('.ButtonStart, .ButtonStop').on('click', function() {
                resetIdleTimer();
            });

            // Initial call to start the timer
            resetIdleTimer();
        });
    </script>
    @include('frontend.includes.inc_script')

    @stop

{{-- @extends('frontend.layouts.header')
@section('content')

@include('frontend.includes.inc_topmenu')

<div class="ColBodyDetail">

    <div class="Col-Logo-Home mt-5 mb-5">
        <img src="{{ asset('asiawater/images/logo.jpg') }}" alt="">
    </div>

    <div class="BoxBody-White">
        <div class="container">
            <div class="WarpCol-Detail">
                <div class="d-flex flex-column align-items-center">
                    <a class="btn ButtonClose" href="{{ url()->previous() }}">
                        <img src="{{ asset('asiawater/images/ic-left-as.svg') }}" alt="">
                    </a>
                    <img class="ImgDetail" src="{{ asset('asiawater/images/water-drop.gif') }}" alt="">
                    <p class="Text-wt-detail-Select">
                        {{session('watertype')}}
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
                                @if(!empty(session('total'))){{session('total')}}@else {{'0'}} @endif
                            </p>
                            <p class="Text-Detail-Shownumber">
                                remaining balance
                            </p>
                        </div>
                        <div class="Warp-BoxButton-Push">
                            <button class="btn ButtonStart">
                                <img src="{{ asset('asiawater/images/play-as.png') }}" alt="">
                                START
                            </button>
                            <button class="btn ButtonStop">
                                <img src="{{ asset('asiawater/images/stop-as.png') }}" alt="">
                                STOP
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.includes.inc_script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var idleTime = 0;
        var idleInterval;

        function redirectToHome() {
            window.location.href = '/';
        }

        function resetIdleTimer() {
            idleTime = 0;
            if (idleInterval) {
                clearInterval(idleInterval);
            }
            idleInterval = setInterval(function() {
                idleTime++;
                if (idleTime >= 30) { // 30 seconds
                    redirectToHome();
                }
            }, 1000); // 1 second
        }

        // Observe changes to the number element
        var targetNode = document.querySelector('.Text-Head-Shownumber');
        var observer = new MutationObserver(function(mutationsList, observer) {
            for (var mutation of mutationsList) {
                if (mutation.type === 'childList') {
                    resetIdleTimer();
                }
            }
        });

        observer.observe(targetNode, { childList: true });

        // Reset timer on button clicks
        $('.ButtonStart, .ButtonStop').on('click', function() {
            resetIdleTimer();
        });

        // Initial call to start the timer
        resetIdleTimer();
    });
</script>

@stop --}}
