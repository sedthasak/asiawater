@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - News Detail</title>
@endsection

@section('content')

<?php
// echo "<pre>";
// print_r($mynews);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 wrap-page wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 news-detail">
                    <h1>{{$mynews->title}}</h1>
                    <div class="news-boxshare">
                        <div class="news-date"><i class="bi bi-calendar3"></i> {{date('d M Y H:i', strtotime($mynews->created_at))}}</div>
                        <div class="news-share">
                            <span><img src="{{asset('frontend/images/icon-share.svg')}}" alt=""> แชร์</span>
                            <a href="#" target="_blank"><img src="{{asset('frontend/images/facebook.svg')}}" alt=""></a>
                            <a href="#" target="_blank"><img src="{{asset('frontend/images/twitter.svg')}}" alt=""></a>
                            <a href="#" target="_blank"><img src="{{asset('frontend/images/line.svg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="content-editor">
                        @php
                        $myfeature_news = ($mynews->feature)?asset($mynews->feature):asset('public/uploads/default-car.jpg');
                        @endphp
                        <img src="{{$myfeature_news}}" alt="" style="width: 100%;">
                        {!!$mynews->content!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
// echo "<pre>";
// print_r($othernews);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 wrap-recentnews">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1 class="topic-insidepage"><i class="bi bi-circle-fill"></i> อัพเดทข่าวยานยนต์</h1>
                </div>
                <div class="col-4 text-end">
                    <a href="{{route('newsPage')}}" class="btn-red">ดูทั้งหมด</a>
                </div>
                <div class="col-12">
                    <div class="owl-recentnews owl-carousel owl-theme">
                    @foreach($othernews as $keynews => $newsres)
                        @php
                        $feature_news = ($newsres->feature)?asset($newsres->feature):asset('public/uploads/default-car.jpg');
                        @endphp

                        <a href="{{route('newsdetailPage', ['news_id' => $newsres->id])}}" class="home-itemnews">
                            <figure>
                                <div class="cover-news">
                                    <img src="{{$feature_news}}" alt="">
                                </div>
                                <figcaption>
                                    <div class="item-topicnews">{{$newsres->title}}</div>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> {{date('d M Y H:i', strtotime($newsres->created_at))}}</div>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                        <!-- <a href="news-detail.php" class="home-itemnews">
                            <figure>
                                <div class="cover-news">
                                    <img src="{{asset('frontend/images/Rectangle 2252.png')}}" alt="">
                                </div>
                                <figcaption>
                                    <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="news-detail.php" class="home-itemnews">
                            <figure>
                                <div class="cover-news">
                                    <img src="{{asset('frontend/images/Rectangle 151.png')}}" alt="">
                                </div>
                                <figcaption>
                                    <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="news-detail.php" class="home-itemnews">
                            <figure>
                                <div class="cover-news">
                                    <img src="{{asset('frontend/images/Rectangle 150.png')}}" alt="">
                                </div>
                                <figcaption>
                                    <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="news-detail.php" class="home-itemnews">
                            <figure>
                                <div class="cover-news">
                                    <img src="{{asset('frontend/images/Rectangle 149.png')}}" alt="">
                                </div>
                                <figcaption>
                                    <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="news-detail.php" class="home-itemnews">
                            <figure>
                                <div class="cover-news">
                                    <img src="{{asset('frontend/images/Rectangle 148.png')}}" alt="">
                                </div>
                                <figcaption>
                                    <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                                </figcaption>
                            </figure>
                        </a> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

