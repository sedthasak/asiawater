@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($Customer);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_categories')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >ย้อนกลับ</a>    
        </div> -->
    </div>
    <form method="post" action="{{route('BN_customers_edit_action')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <input type="hidden" name="id" value="{{$Customer->id}}" />



                    <div class="p-5">

                        
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เบอร์โทร</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->phone}}" name="phone" autocomplete="off" required />
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->firstname}}" name="firstname" autocomplete="off" required />
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานที่นัดดูรถ</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->place}}" name="place" autocomplete="off" />
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ไลน์ไอดี</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->line}}" name="line" autocomplete="off" />
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">โรล</label>
                                    <select name="sp_role" id="sp_role" data-search="true" class=" w-full" required >
                                        <option value="home" {{($Customer->sp_role == 'home')?'selected':''}} >ลูกค้าทั่วไป</option>
                                        <option value="dealer" {{($Customer->sp_role == 'dealer')?'selected':''}} >ดีลเลอร์</option>
                                    </select>
                                </div>
                                
         


                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">อีเมล</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->email}}" name="email"  autocomplete="off" />
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->lastname}}" name="lastname" autocomplete="off" />
                                </div>
                                

                                <div class="mt-3">
                                    <label for="" class="form-label">จังหวัด</label>
                                    <select name="province" id="province" data-search="true" class="tom-select w-full" required >
                                        <option value="">เลือกจังหวัด</option>
                                        @foreach($provinces as $keypv => $pv)
                                        @php
                                        $selected = $Customer->province==$pv->name_th?'selected':'';
                                        @endphp
                                        <option value="{{$pv->name_th}}" {{$selected}} >{{$pv->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">Google Map</label>
                                    <input type="text" class="form-control w-full" value="{{$Customer->google_map}}" name="google_map" autocomplete="off" />
                                </div>
                                

                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รูปโปรไฟล์</label>
                                    <input type="file" class="form-control w-full" id="" name="image"  autocomplete="off" accept="image/*" />
                                </div>
                                @if(isset($Customer->image))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($Customer->image)}}">
                                    </div>
                                </div>
                                @endif
                                
                                
         


                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">แผนที่</label>
                                    <input type="file" class="form-control w-full" id="" name="map"  autocomplete="off" accept="image/*" />
                                </div>
                                @if(isset($Customer->map))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($Customer->map)}}">
                                    </div>
                                </div>
                                @endif
                               

                            </div>
                        </div>


                    </div>


                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">บันทึก</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>




@endsection

@section('script')
<script>

</script>


@endsection