<script>
    // search หน้า car left side
</script>
<div class="wrap-left-boxsearch">
    <div class="left-boxsearch">
        <div class="left-boxsearch-topic"><img src="{{asset('frontend/images/carred.svg')}}" alt=""> ค้นหารถยนต์</div> 
        <form action="/search2" id="my_form" method="GET">
            @csrf
        <div class="left-boxsearch-desc">
            <div class="left-boxsearch-topic2">รายละเอียดรถยนต์</div>
            <div class="row box-ecocar">
                <div class="col-9">
                    <div class="topic-careco"><img src="{{asset('frontend/images/icon-careco.svg')}}" alt=""> รถยนต์ไฟฟ้า</div>
                </div>
                <div class="col-3 text-end">
                    <label class="switch">
                        <input type="checkbox" checked id="searchev">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div class="carsearch-input">
                <a data-fancybox data-src="#popup-searchcar" href="javascript:;">
                    <input type="text" name="textsearch" id="textsearch" readonly value="ยี่ห้อรถ">
                    <input type="hidden" name="brand_id">
                    <input type="hidden" name="model_id">
                    <input type="hidden" name="generation_id">
                    <input type="hidden" name="submodel_id">
                </a>
                
                
            </div>

            <div class="carsearch-radio">
                <label class="car-radio">ซื้อสด 
                    <input type="radio" name="payment" value="สด" checked>
                    <span class="checkmark"></span>
                </label>
                {{-- <label class="car-radio">จัดไฟแนนซ์
                    <input type="radio" name="payment" value="ผ่อน">
                    <span class="checkmark"></span>
                </label> --}}
            </div>

            <div class="box-searchrange">
                <div class="search-range">
                    <div class="topic-range">
                        <div>งบประมาณ</div>
                        <div>
                            <div id="minprice" class="pricelow"></div>
                            <input type="hidden" name="pricelow">
                            <span>-</span>
                            <div id="maxprice" class="pricehigh"></div>
                            <input type="hidden" name="pricehigh">
                        </div>
                    </div>
                    <div class="box-priceslider">
                        <div id="priceslider"></div>
                    </div>
                </div>
                <div class="search-range">
                    <div class="topic-range">
                        <div>ปี</div>
                        <div>
                            <div id="minyear" class="yearlow"></div>
                            <input type="hidden" name="yearlow">
                            <div id="maxyear" class="yearhigh"></div>
                            <input type="hidden" name="yearhigh">
                        </div>
                    </div>
                    <div class="box-priceslider">
                        <div id="yearslider"></div>
                    </div>
                </div>
            </div>
            <div class="wrap-advancesearch">
                <div class="item_advancesearch">
                    <div class="left-boxsearch-topic2">ค้นหารถยนต์แบบละเอียด <img src="{{asset('frontend/images/chevron-red.svg')}}" alt=""></div>
                    <div class="content_advancesearch">
                        <div class="boxfrm-advancesearch">
                            <label>สี</label>
                            <select name="color" id="color" class="form-select">
                                <option value="">เลือกสี</option>
                                <option value="">ทุกสี</option>
                                <option value="ขาว">ขาว</option>
                                <option value="เขียว">เขียว</option>
                                <option value="ครีม">ครีม</option>
                                <option value="ชมพู">ชมพู</option>
                                <option value="ดำ">ดำ</option>
                                <option value="แดง">แดง</option>
                                <option value="เทา">เทา</option>
                                <option value="น้ำเงิน">น้ำเงิน</option>
                                <option value="น้ำตาล">น้ำตาล</option>
                                <option value="บรอนซ์เงิน">บรอนซ์เงิน</option>
                                <option value="บรอนซ์ทอง">บรอนซ์ทอง</option>
                                <option value="ฟ้า">ฟ้า</option>
                                <option value="ม่วง">ม่วง</option>
                                <option value="ส้ม">ส้ม</option>
                                <option value="เหลือง">เหลือง</option>
                            </select>
                        </div>
                        <div class="boxfrm-advancesearch">
                            <div class="advance-boxgear">
                                <div class="txt-label">เกียร์</div>
                                <div>
                                    <label><input type="radio" name="gear" id="advance-gear" value="auto"> <span>อัตโนมัติ</span></label>
                                    <label><input type="radio" name="gear" value="manual"> <span>ธรรมดา</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="boxfrm-advancesearch">
                            <label>เชื้อเพลิง</label>
                            <select name="power" id="power" class="form-select">
                                <option value="">เลือก</option>
                                <option value="1">รถน้ำมัน / hybrid</option>
                                <option value="2">รถไฟฟ้า EV 100%</option>
                                <option value="3">รถติดแก๊ส</option>
                            </select>
                        </div>
                        <div class="boxfrm-advancesearch">
                            <label>จังหวัด</label>
                            <select name="province" id="province" class="form-select">
                                <option value="">จังหวัด</option>
                                @foreach ($province as $rows)
                                <option value="{{$rows->name_th}}">{{$rows->name_th}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" onclick="search4();" class="btn-searchcar">ค้นหารถยนต์</a>
        </div>
        </form>

        <div class="left-boxsearch-item">
            <div class="left-boxsearch-topic2">รถมือสอง ประเภทอื่นๆ</div>
            <div class="row">
                @if (isset($category))
                @foreach ($category as $rows)
                <div class="col-4 col-lg-6 boxsearch-cartype">
                    <a href="{{url('/search-category').'/'.$rows->id}}">
                        <img src="{{asset($rows->feature)}}" alt="">
                    </a>
                </div>
                
                @endforeach
                @endif
            </div>
        </div>

        <div class="left-boxsearch-item search-carview">
            <div class="left-boxsearch-topic2">รถที่คุณดูล่าสุด</div>
            <div>
                <a href="#" class="item-car">
                    <figure>
                        <div class="cover-car"><img src="{{asset('frontend/images/cover-car.jpg')}}" alt=""></div>
                        <figcaption>
                            <div class="car-name">2016 Honda CR-V </div>
                            <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                            <div class="car-province">กรุงเทพมหานคร</div>
                            <div class="car-price">599,000.-</div>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" class="item-car">
                    <figure>
                        <div class="cover-car"><img src="{{asset('frontend/images/cover-car.jpg')}}" alt=""></div>
                        <figcaption>
                            <div class="car-name">2016 Honda CR-V </div>
                            <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                            <div class="car-province">กรุงเทพมหานคร</div>
                            <div class="car-price">599,000.-</div>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" class="item-car">
                    <figure>
                        <div class="cover-car"><img src="{{asset('frontend/images/cover-car.jpg')}}" alt=""></div>
                        <figcaption>
                            <div class="car-name">2016 Honda CR-V </div>
                            <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                            <div class="car-province">กรุงเทพมหานคร</div>
                            <div class="car-price">599,000.-</div>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" class="item-car">
                    <figure>
                        <div class="cover-car"><img src="{{asset('frontend/images/cover-car.jpg')}}" alt=""></div>
                        <figcaption>
                            <div class="car-name">2016 Honda CR-V </div>
                            <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                            <div class="car-province">กรุงเทพมหานคร</div>
                            <div class="car-price">599,000.-</div>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" class="item-car">
                    <figure>
                        <div class="cover-car"><img src="{{asset('frontend/images/cover-car.jpg')}}" alt=""></div>
                        <figcaption>
                            <div class="car-name">2016 Honda CR-V </div>
                            <div class="car-series">CR-V 2.0 E (MY12) (MNC)</div>
                            <div class="car-province">กรุงเทพมหานคร</div>
                            <div class="car-price">599,000.-</div>
                        </figcaption>
                    </figure>
                </a>
            </div>
        </div>  

    </div>
    <a href="#" target="_blank" class="banner-adv"><img src="{{asset('frontend/images/bannera.jpg')}}" alt=""></a>
</div>

