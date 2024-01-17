@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php


// echo "<pre>";
// print_r($slide);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_categories')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >ย้อนกลับ</a>    
        </div> -->
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    

                    
                    <div class="p-5">

                        <!-- Head 1 -->
                        <!-- Head 1 -->
                        <!-- Head 1 -->

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                

                                @if(isset($slide[0]))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">แบนเนอร์ 1 รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($slide[0])}}">
                                        <form method="post" action="{{route('BN_slidedelete')}}">
                                            @csrf
                                            <input type="hidden" name="key" value="0" />
                                            <button type="submit" class="button btn">ลบออก</button>
                                        </form>
                                    </div>
                                </div>
                                @endif


                                @if(isset($slide[1]))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">แบนเนอร์ 2 รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($slide[1])}}">
                                        <form method="post" action="{{route('BN_slidedelete')}}">
                                            @csrf
                                            <input type="hidden" name="key" value="1" />
                                            <button type="submit" class="button btn">ลบออก</button>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                @if(isset($slide[2]))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">แบนเนอร์ 3 รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($slide[2])}}">
                                        <form method="post" action="{{route('BN_slidedelete')}}">
                                            @csrf
                                            <input type="hidden" name="key" value="2" />
                                            <button type="submit" class="button btn">ลบออก</button>
                                        </form>
                                    </div>
                                </div>
                                @endif


                                @if(isset($slide[3]))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">แบนเนอร์ 4 รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($slide[3])}}">
                                        <form method="post" action="{{route('BN_slidedelete')}}">
                                            @csrf
                                            <input type="hidden" name="key" value="3" />
                                            <button type="submit" class="button btn">ลบออก</button>
                                        </form>
                                    </div>
                                </div>
                                @endif


                                @if(isset($slide[4]))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">แบนเนอร์ 5 รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($slide[4])}}">
                                        <form method="post" action="{{route('BN_slidedelete')}}">
                                            @csrf
                                            <input type="hidden" name="key" value="4" />
                                            <button type="submit" class="button btn">ลบออก</button>
                                        </form>
                                    </div>
                                </div>
                                @endif


                                @if(isset($slide[5]))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">แบนเนอร์ 6 รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($slide[5])}}">
                                        <form method="post" action="{{route('BN_slidedelete')}}">
                                            @csrf
                                            <input type="hidden" name="key" value="5" />
                                            <button type="submit" class="button btn">ลบออก</button>
                                        </form>
                                    </div>
                                </div>
                                @endif


                            </div>

                        </div>
                        

                    </div>

                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    <form method="post" action="{{route('BN_slideupdate')}}" enctype="multipart/form-data" >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    

                    
                    <div class="p-5">

                        <!-- Head 1 -->
                        <!-- Head 1 -->
                        <!-- Head 1 -->

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">แบนเนอร์ 1</label>
                                    <input type="file" class="form-control w-full" id="" name="banner1"   />
                                </div>


                                <div class="mt-3 ">
                                    <label for="" class="form-label">แบนเนอร์ 2</label>
                                    <input type="file" class="form-control w-full" id="" name="banner2"   />
                                </div>


                                <div class="mt-3 ">
                                    <label for="" class="form-label">แบนเนอร์ 3</label>
                                    <input type="file" class="form-control w-full" id="" name="banner3"   />
                                </div>


                                <div class="mt-3 ">
                                    <label for="" class="form-label">แบนเนอร์ 4</label>
                                    <input type="file" class="form-control w-full" id="" name="banner4"   />
                                </div>


                                <div class="mt-3 ">
                                    <label for="" class="form-label">แบนเนอร์ 5</label>
                                    <input type="file" class="form-control w-full" id="" name="banner5"   />
                                </div>



                                <div class="mt-3 ">
                                    <label for="" class="form-label">แบนเนอร์ 6</label>
                                    <input type="file" class="form-control w-full" id="" name="banner6"   />
                                </div>



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
    ClassicEditor
        .create( document.querySelector( '#termcondition' ))
        .catch( error => {
        console.error( error );
    } );
</script>
@endsection