@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - News</title>
@endsection

@section('content')

<?php
// echo "<pre>";
// print_r($firstTwoPosts);
// echo "</pre>";
?>
<section class="row">
    <div class="col-12 wrap-page wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="topic-insidepage"><i class="bi bi-circle-fill"></i> อัพเดทข่าวยานยนต์</h1>
                    <div class="box-latestupdate">
                        @if(isset($firstTwoPosts) && (count($firstTwoPosts)==2))
                        @php 
                        $feature0_news = ($firstTwoPosts[0]->feature)?asset($firstTwoPosts[0]->feature):asset('public/uploads/default-car.jpg');
                        $feature1_news = ($firstTwoPosts[1]->feature)?asset($firstTwoPosts[1]->feature):asset('public/uploads/default-car.jpg');
                        @endphp

                        <a href="{{route('newsdetailPage', ['news_id' => $firstTwoPosts[0]->id])}}" class="row news-latest">
                            <div class="col-12 col-md-7">
                                <figure><img src="{{$feature0_news}}" alt=""></figure>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="desc-latestnews">
                                    <h2>{{$firstTwoPosts[0]->title}}</h2>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> {{date('d M Y H:i', strtotime($firstTwoPosts[0]->created_at))}}</div>
                                    <div class="news-shortdesc">{{$firstTwoPosts[0]->excerpt}}</div>
                                    <div class="btn-red">อ่านต่อ</div>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('newsdetailPage', ['news_id' => $firstTwoPosts[1]->id])}}" class="row news-latest">
                            <div class="col-12 col-md-7">
                                <figure><img src="{{$feature1_news}}" alt=""></figure>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="desc-latestnews">
                                    <h2>{{$firstTwoPosts[1]->title}}</h2>
                                    <div class="news-date"><i class="bi bi-calendar3"></i> {{date('d M Y H:i', strtotime($firstTwoPosts[1]->created_at))}}</div>
                                    <div class="news-shortdesc">{{$firstTwoPosts[1]->excerpt}}</div>
                                    <div class="btn-red">อ่านต่อ</div>
                                </div>
                            </div>
                        </a>
                        @endif
                        

                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($remainingPosts as $keynews => $newsres)
                    @php
                    $feature_news = ($newsres->feature)?asset($newsres->feature):asset('public/uploads/default-car.jpg');
                    @endphp
                    
                    <div class="col-6 col-md-4 col-lg-3 item-allnews">
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
                    </div>
                @endforeach
                <!-- <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 145.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
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
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
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
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 144-1.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 144-2.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 144-3.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 144-4.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 144.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
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
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 148-1.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
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
                </div>
                <div class="col-6 col-md-4 col-lg-3 item-allnews">
                    <a href="news-detail.php" class="home-itemnews">
                        <figure>
                            <div class="cover-news">
                                <img src="{{asset('frontend/images/Rectangle 150-1.png')}}" alt="">
                            </div>
                            <figcaption>
                                <div class="item-topicnews">รวมรถยนต์ไฟฟ้า EV มือสอง ราคาถูก น่าซื้อที่สุดในปี 2023</div>
                                <div class="news-date"><i class="bi bi-calendar3"></i> 30 MAY 2566 15:38</div>
                            </figcaption>
                        </figure>
                    </a>
                </div> -->

                <div class="col-12 box-pagination">
                    {!! $remainingPosts->links() !!}
                </div>
                <!-- <div class="col-12 box-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link-prev"><i class="bi bi-chevron-double-left"></i> ก่อนหน้า</a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">11</a></li>
                            <li class="page-item">
                            <a class="page-link-prev" href="#">ถัดไป <i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div> -->

            </div>
        </div>
    </div>
</section>


@endsection














