                        @php
                            $total = $cars->total();
                            $currentyear="";
                        @endphp
                        
                        @foreach ($cars as $index => $rows)

                            @if ($index == 0)
                                @php
                                    $currentyear = $rows->modelyear;
                                @endphp
                                <input type="hidden" id="total" value="{{number_format($total)}}">
                                <div class="box-itemcar">
                                <div class="car-year">{{$rows->modelyear}}</div>
                                <div class="row row-itemcar">
                            @endif


                            @if ($currentyear != $rows->modelyear)
                                </div>
                                </div>
                                @php
                                    $currentyear = $rows->modelyear;
                                @endphp



                                <div class="box-itemcar">
                                <div class="car-year">{{$rows->modelyear}}</div>
                                <div class="row row-itemcar">
                            @elseif ($currentyear == $rows->modelyear)
                                

                            @endif



                            <div class="col-itemcar col-6 col-xl-4">
                                <a href="{{url('/car-detail').'/'.$rows->id}}" class="item-car">
                                    <figure>
                                        <div class="cover-car">
                                            <img src="{{($rows->feature)?asset($rows->feature):asset('public/uploads/default-car.jpg')}}" alt="">
                                        </div>
                                        <figcaption>
                                            <div class="grid-desccar">
                                                <div class="car-name">{{$rows->modelyear}} {{$rows->brand_name}} {{$rows->model_name}} </div>
                                                <div class="car-series">{{$rows->submodel_name}} {{$rows->generation_name}}</div>
                                                <div class="car-province">{{$rows->province}}</div>
                                                <div class="row">
                                                    <div class="col-12 col-md-8">
                                                        <div class="descpro-car">{{$rows->title}}</div>
                                                    </div>
                                                    <div class="col-12 col-md-4 text-end">
                                                        <div class="txt-readmore">ดูเพิ่มเติม</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="linecontent"></div>
                                            <div class="row caritem-price">
                                                <div class="col-12 col-md-6">
                                                    <div class="txt-gear"><img src="{{asset('frontend/images/icon-kear.svg')}}" alt=""> @if($rows->gear=="auto"){{"เกียร์อัตโนมัติ"}}@else{{"เกียร์ธรรมดา"}}@endif</div>
                                                </div>
                                                <div class="col-12 col-md-6 text-end">
                                                    <div class="car-price">{{number_format($rows->price)}}.-</div>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>

                            

                            @if ($index == $total - 1)
                                </div>
                                </div>
                                @if ($index < 10)
                                <div class="box-frmhelpcar">
                                    <div class="topic-frmhelpcar">
                                        <img src="{{asset('frontend/images/carred.svg')}}" alt=""> <span>ช่วยคุณหารถที่ใช่</span> ให้รถพร้อมขายช่วยหารถให้คุณ
                                    </div>
                                    <form method="post" action="{{route('helpcaractionPage')}}">
                                        @csrf
                                        <div>
                                            <input type="hidden"  name="customer_id	" value="{{$customerdata->id??''}}" >
                                            <input type="text" class="form-control" name="name" placeholder="ชื่อ - นามสกุล">
                                            <input type="text" class="form-control" name="tel" placeholder="เบอร์โทรติดต่อ">
                                            <input type="text" class="form-control" name="line" placeholder="Line ID">
                                            <input type="text" class="form-control" name="messages" placeholder="รุ่นรถที่ต้องการ">
                                        </div>
                                        <button>คลิกเลย <i class="bi bi-chat-text-fill"></i></button>
                                    </form>
                                </div>
                                @endif

                            @elseif ($index < $total - 1)
                                @if (($index+1) > 0 && ($index+1) % 10 == 0)


                                    <div class="box-frmhelpcar">
                                        <div class="topic-frmhelpcar">
                                            <img src="{{asset('frontend/images/carred.svg')}}" alt=""> <span>ช่วยคุณหารถที่ใช่</span> ให้รถพร้อมขายช่วยหารถให้คุณ
                                        </div>
                                        <form method="post" action="{{route('helpcaractionPage')}}">
                                            @csrf
                                            <div>
                                                <input type="hidden"  name="customer_id	" value="{{$customerdata->id??''}}" >
                                                <input type="text" class="form-control" name="name" placeholder="ชื่อ - นามสกุล">
                                                <input type="text" class="form-control" name="tel" placeholder="เบอร์โทรติดต่อ">
                                                <input type="text" class="form-control" name="line" placeholder="Line ID">
                                                <input type="text" class="form-control" name="messages" placeholder="รุ่นรถที่ต้องการ">
                                            </div>
                                            <button>คลิกเลย <i class="bi bi-chat-text-fill"></i></button>
                                        </form>
                                    </div>


                                    <div class="box-itemcar">
                                    <div class="car-year">{{$rows->modelyear}}</div>
                                    <div class="row row-itemcar">

                                    

                                    
                                @endif

                            @endif




                        @endforeach
                        
                        {{ $cars->withQueryString()->links() }}