@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - {{$default_pagename}}</title>
@endsection

@section('content')


<section class="row">
    <div class="col-12 page-noti page-profile wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-profilepage"><i class="bi bi-circle-fill"></i> {{$default_pagename}}</div>
                    <a href="profile-expire.php" class="item-noti">
                        <div class="row">
                            <!-- <div class="col-9">
                                <div class="title-noti">รถของคุณจะหมดอายุอีก 3 วัน</div>
                            </div>
                            <div class="col-3 text-end">
                                31/07/2023
                            </div> -->
                            <div class="col-12">
                                <div class="">{!!$termcondition->value_option!!}</div> 
                            </div>
                        </div>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



