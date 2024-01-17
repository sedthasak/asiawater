@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - check-price</title>
@endsection

@section('content')


<section class="row">
    <div class="col-12 bgpage-average wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 average-nopad">
                    <div class="page-average">
                        <div class="topic-average"><img src="{{asset('frontend/images/icon-average.svg')}}" alt=""> Average</div>
                        <div>
                            
                            
                                @php
                                    $generation = "";
                                    $count = 0;
                                    $total = 0;
                                    $topprice = 0;
                                @endphp
                                @if (isset($yearprice))
                                
                                    @php
                                        $total = count($yearprice);
                                        foreach ($yearprice as $rows) {
                                            if ($rows->max_price > $topprice) {
                                                $topprice = $rows->max_price;
                                            }
                                        }
                                    @endphp

                                    @foreach ($yearprice as $index => $rows)

                                        @if ($generation != $rows->generation_name)

                                        <div class="wrap-average">
                                            <div class="box-average">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="brandcar-average">
                                                        <img src="{{asset($brandrow->feature)}}" alt="">
                                                        <span>{{$brandrow->title}} {{$modelrow->model}}</span> {{$rows->generation_name}}
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            @php
                                                $generation = $rows->generation_name;
                                                $count = 0;
                                            @endphp

                                            <div class="average-bar">

                                        @endif


                                        @php
                                            $count++;
                                        @endphp
                                        @if ($count <= 6)
                                        
                                            <div class="item-bar">
                                                <a href="{{url('/search-price').'/'.$brandrow->id.'/'.$modelrow->id.'/'.$rows->generations_id.'/'.$rows->avg_price}}" class="box-avgprice">
                                                    Avg <div>{{number_format(round($rows->avg_price/1000000, 2), 2)."M"}}</div>
                                                </a>
                                                <a href="{{url('/search-price').'/'.$brandrow->id.'/'.$modelrow->id.'/'.$rows->generations_id.'/'.$rows->max_price}}" class="avgprice">{{number_format(round($rows->max_price/1000000, 2), 2)."M"}}</a>
                                                <div class="animated-progress"> <span data-progress="{{ceil( (100/$topprice) * $rows->avg_price )}}"></span></div>
                                                <a href="{{url('/search-price').'/'.$brandrow->id.'/'.$modelrow->id.'/'.$rows->generations_id.'/'.$rows->min_price}}" class="avgprice">{{number_format(round($rows->min_price/1000000, 2), 2)."M"}}</a>
                                                <div class="txt-seeyear">{{$rows->modelyear}}</div>
                                            </div>
                                        
                                        @endif

                                        @if ($count == 6)
                                        </div>
                                        </div>
                                        </div>
                                        @elseif ($index+1 != $total && $generation != $yearprice[$index+1]->generation_name)
                                        </div>
                                        </div>
                                        </div>
                                        @endif

                                    @endforeach
                                @endif
                                    
                                
                            
                            
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@php

$arr = [];
if (isset($setFooterModel)) {
    foreach($setFooterModel as $keyf => $foot){

        if(!empty($foot->name) && !empty($foot->link)){
            $arr[$foot->heading][$keyf]['footer_name'] = $foot->name;
            $arr[$foot->heading][$keyf]['footer_link'] = $foot->link;
        }

    }
}

@endphp

<section class="container box-linkcarseo wow fadeInDown">
    <div class="row">
        @foreach($arr as $keyarray => $arry)
        
        <div class="col-3 box-linkcar">
            <h2>{{$keyarray}}</h2>
            <ul>
                @foreach($arry as $keylst => $lst)
                <li><a href="{{$lst['footer_link']}}" target="_blank">{{$lst['footer_name']}}</a></li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>


@endsection


@section('script')
<script>
$(document).ready(function() {
    $(".animated-progress span").each(function () {
        $(this).animate(
            {
            height: $(this).attr("data-progress") + "%",
            },
            1000
        );
    });
});
</script>
@endsection
