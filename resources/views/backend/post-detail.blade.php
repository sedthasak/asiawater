@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$customerimage = $customer->image;
$img_profile = ($customerimage)?asset($customerimage):asset('img/user-default.png');
$arrsprole = array(
    'home' => 'ลูกค้าทั่วไป',
    'dealer' => 'ดีลเลอร์',
);
// $img_profile = $customer->image??asset('img/user-default.png')
// echo "<pre>";
// print_r($img_profile);
// echo "</pre>";
// echo "<pre>";
// print_r($customer);
// echo "</pre>";
// echo "<pre>";
// print_r($brands);
// echo "</pre>";
// echo "<pre>";
// print_r($models);
// echo "</pre>";
// echo "<pre>";
// print_r($generations);
// echo "</pre>";
// echo "<pre>";
// print_r($sub_models);
// echo "</pre>";
// echo "<pre>";
// print_r($postcar);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium"></h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_posts_edit', ['id' => $postcar->id])}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >แก้ไข</a>    
        </div>
    </div>

    <div class="intro-y news xl:w-5/5 p-5 box mt-8">
        <!-- BEGIN: Blog Layout -->
        <h2 class="intro-y font-medium text-3xl sm:text-3xl">2019 Mercedes-Benz S560e</h2>
        <div class="intro-y text-slate-600 dark:text-slate-500 mt-3 text-xs sm:text-sm mb-6">
            สร้างเมื่อ {{date('d/m/Y', strtotime($postcar->created_at))}}  <span class="mx-1">•</span> <a class="text-primary" href="#">{{date('H:i:s', strtotime($postcar->created_at))}} น.</a> 
        </div>
        <!-- <div class="intro-y mt-6">
            <div class="news__preview image-fit">
                <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{ asset('dist/images/' . $fakers[0]['images'][0]) }}">
            </div>
        </div> -->
        <div class="intro-y text-justify leading-relaxed">
            <div class="box">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="" class="rounded-full" src="{{asset($img_profile)}}">
                        </div>
                        <div class="ml-5">
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$customer->firstname." ".$customer->lastname}}</div>
                            <div class="text-slate-500">{{$customer->phone}}</div>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">ข้อมูลลูกค้า</div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Map Pin" class="w-4 h-4 mr-2"></i>สถานะ : {{$arrsprole[$customer->sp_role]}}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Map Pin" class="w-4 h-4 mr-2"></i>อีเมล : {{$customer->email}}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Map Pin" class="w-4 h-4 mr-2"></i>Line ID : {{$customer->line}}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Map Pin" class="w-4 h-4 mr-2"></i>จังหวัด : {{$customer->province}}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Map Pin" class="w-4 h-4 mr-2"></i>สถานที่รับรถ : {{$customer->place}}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Map" class="w-4 h-4 mr-2"></i>Map : 
                                <?php
                                if(isset($customer->map)){
                                ?>
                                <a href="{{$customer->google_map}}"> Google Map</a>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-5">MAP</div>
                        <div class="">
                            <!-- {{($customer->map)?'<img alt="" data-action="zoom" class="rounded-md" width="100" height="60" src="#">':''}} -->
                            <?php
                            if($customer->map){
                            ?>
                            <img alt="" data-action="zoom" class="rounded-md" width="100" height="60" src="{{asset($customer->map)}}">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
        <div class="intro-y text-justify leading-relaxed">
            <div class="box">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <!-- <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center">
        
                            </div>               
                        </div> -->
                        <?php
                        if(isset($postcar->status) && ($postcar->status == 'created')){
                        ?>
                        <div role="alert" data-tw-merge data-tw-toggle="modal" data-tw-target="#modal-created" class="cursor-pointer alert relative border rounded-md px-5 py-4 bg-warning border-warning text-slate-900 dark:border-warning mb-2 flex items-center"><i data-lucide="alert-circle" width="24" height="24" class="stroke-1.5 mr-2 h-6 w-6 mr-2 h-6 w-6"></i>
                            รออนุมัติ
                        </div>

                        
                        



                        <?php
                        }elseif(isset($postcar->status) && ($postcar->status == 'approved')){
                        ?>
                        <div role="alert" data-tw-merge data-tw-toggle="modal" data-tw-target="#modal-created" class="alert relative border rounded-md px-5 py-4 bg-success border-success text-slate-900 dark:border-success mb-2 flex items-center"><i data-lucide="Check" width="24" height="24" class="stroke-1.5 mr-2 h-6 w-6 mr-2 h-6 w-6"></i>
                            ออนไลน์
                        </div>
                        <?php
                        }elseif(isset($postcar->status) && ($postcar->status == 'rejected')){
                            ?>
                            <div role="alert" data-tw-merge data-tw-toggle="modal" data-tw-target="#modal-created" class="alert relative border rounded-md px-5 py-4 bg-danger border-danger text-slate-900 dark:border-danger mb-2 flex items-center"><i data-lucide="X" width="24" height="24" class="stroke-1.5 mr-2 h-6 w-6 mr-2 h-6 w-6"></i>
                                รอแก้ไข
                            </div>
                            <?php
                        }elseif(isset($postcar->status) && ($postcar->status == 'deleted')){
                        ?>
                        <div role="alert" data-tw-merge data-tw-toggle="modal" data-tw-target="#modal-created" class="alert relative border rounded-md px-5 py-4 bg-danger border-danger text-slate-900 dark:border-danger mb-2 flex items-center"><i data-lucide="X" width="24" height="24" class="stroke-1.5 mr-2 h-6 w-6 mr-2 h-6 w-6"></i>
                            ถูกลบ
                        </div>
                        <?php
                        }
                        ?>
                        

                        <!-- BEGIN: Modal Content -->
                        <div id="modal-created" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" style="width: 1000px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>ปรับสถานะ</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('BN_posts_status_action')}}" id="form_change_status">
                                        @csrf
                                            <input type="hidden" name="post_id" value="{{$postcar->id}}" />
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                                            <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                <div class="col-span-12 sm:col-span-6">
                                                    <label for="modal-form-6" class="inline-block mb-2"> สถานะ</label>
                                                    <select name="change_status" id="select_status" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                                                        <option value="created" {{($postcar->status == 'created')?'selected':''}} >รออนุมัติ</option>
                                                        <option value="approved" {{($postcar->status == 'approved')?'selected':''}} >ออนไลน์</option>
                                                        <option value="rejected" {{($postcar->status == 'rejected')?'selected':''}} >ปฏิเสธ</option>
                                                        <option value="deleted" {{($postcar->status == 'deleted')?'selected':''}} >ถูกลบ</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-12 sm:col-span-6" id="reason_box" style="display:none;">
                                                    <label data-tw-merge for="modal-form-5" class="inline-block mb-2"> เหตุผล </label>
                                                    <!-- <input data-tw-merge id="modal-form-5" type="text" placeholder="เหตุผล" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80" /> -->
                                                    <textarea id="reason" class="form-control" name="reason" placeholder="เหตุผล"></textarea>
                                                </div>
                                                
                                            </div>
                                            <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400">
                                                <button data-tw-merge data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-secondary/20 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-20 mr-1 w-20">Cancel</button>
                                                <button data-tw-merge type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20 w-20">Send</button>
                                            </div>
                                        </form>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Modal Content -->
                    </div>
                    
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
           
                    </div>
                </div>
            </div>    
        </div>
        <div class="intro-y text-justify leading-relaxed">
            <div class="box sm:flex">
                <div class="px-6 py-8 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                    <div class="news__preview image-fit">
                        <img alt="" data-action="zoom" class="rounded-md" src="{{asset($postcar->feature)}}">
                    </div>
                </div>
                <div class="px-6 py-8 flex flex-col justify-center flex-1">
                    
                    <div class="relative text-2xl font-medium mt-12 ml-0.5"> {{$postcar->modelyear." ".$brands->title." ".$models->model}} </div>
                    <div class="mt-4 text-xl text-slate-500">{{$generations->generations." ".$sub_models->sub_models}} <span>|</span>  </div>
                    <!-- <div class="mt-4 text-xl text-slate-500">โฉม F48 ปี21-ปัจจุบัน  </div> -->
                    <div class="pt-5 pb-5">
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> ราคา </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> {{$postcar->price}}.- </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> เลขไมล์ </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> {{$postcar->mileage}} กม. </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> สี </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> {{$postcar->color}} </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> เลขทะเบียน </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> {{$postcar->vehicle_code}} </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> เกียร์ </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> {{$postcar->gear}} </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> แก็ส </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> {{$postcar->gasname}} </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> วันที่ลงขาย </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> 16 มิ.ย. 66 </div>
                        </div>
                        <div class="relative flex items-center mb-2">
                            <div class="mr-auto">
                                <div class="font-medium text-base mr-5 text-slate-500 sm:mr-5"> วันที่หมดอายุ </div>
                            </div>
                            <div class="font-medium text-base text-slate-600 dark:text-slate-500"> 16 ธ.ค. 66 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        <div class="intro-y text-justify leading-relaxed">
            <br><br>
            <h3 class="mb-5">{{$postcar->title}}</h3>
            
            {!!$postcar->detail!!}
            <br><br>
        </div>

        <div class="intro-y text-justify leading-relaxed">
            <div class="box sm:flex">
                <div class="px-6 py-8 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">

                    <div id="" class="p-5">
                        <div class="preview">
                            <div class="mx-6 pb-8">
                                <div class="fade-mode">
                                    @foreach($interior as $keyint => $int)
                                    <div class="h-64 px-2">
                                        <div class="h-full image-fit rounded-md overflow-hidden">
                                            <img data-action="zoom" src="{{asset($int->gallery)}}" />
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="px-6 py-8 flex flex-col justify-center flex-1">
                    
                    <div id="" class="p-5">
                        <div class="preview">
                            <div class="mx-6 pb-8">
                                <div class="fade-mode">
                                    @foreach($exterior as $keyext => $ext)
                                    <div class="h-64 px-2">
                                        <div class="h-full image-fit rounded-md overflow-hidden">
                                            <img data-action="zoom" src="{{asset($ext->gallery)}}" />
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="intro-y text-justify leading-relaxed">
            <div class="box">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-5 -mx-5">
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-5">รูปป้ายทะเบียน</div>
                        <div class="">
                            <!-- {{($customer->map)?'<img alt="" data-action="zoom" class="rounded-md" width="100" height="60" src="#">':''}} -->
                            <?php
                            if($postcar->licenseplate){
                            ?>
                            <img alt="" data-action="zoom" class="rounded-md" width="100" height="60" src="{{asset($postcar->licenseplate)}}">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">ข้อมูลการรับประกัน</div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">

                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="{{($postcar->warranty_1 == '1')?'Check':'X'}}" class="w-4 h-4 mr-2"></i> รถได้รับการตรวจสภาพโดยผู้เชี่ยวชาญ	
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="{{($postcar->warranty_2 == '1')?'Check':'X'}}" class="w-4 h-4 mr-2"></i> มีการรับประกัน ระยะเวลา {{$postcar->warranty_2_input??''}}
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="{{($postcar->warranty_3 == '1')?'Check':'X'}}" class="w-4 h-4 mr-2"></i> มีบริการช่วยเหลือฉุกเฉิน 24 ชม.	
                            </div>

                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">หมวดหมู่</div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            @if(is_array($categories) && (count($categories)>0))
                                @foreach($categories as $keycatedecde => $catego)
                                <div class="truncate sm:whitespace-normal flex items-center">
                                    <i data-lucide="Bookmark" class="w-4 h-4 mr-2"></i> {{$catego->name}}	
                                </div>
                                @endforeach
                            @endif
                                
                            

                        </div>
                    </div>
                    
                </div>
            </div>    
        </div>
        <?php

        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        ?>
        <div class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="flex items-center">
                <div class="w-12 h-12 flex-none image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ asset('uploads/1695725433.jpg') }}">
                </div>
                <div class="ml-3 mr-auto">
                    <div class="font-medium">kongphopots</div>
                    <div class="text-slate-500">kk.supernova00@gmail.com</div>
                </div>
            </div>
        </div>
        <!-- END: Blog Layout -->

    </div>




    
<!-- BEGIN: Modal Content -->
<!-- <div data-tw-backdrop="static" aria-hidden="true" tabindex="-1" id="modal-created" class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s]">
    <div class="w-[90%] ml-auto h-screen flex flex-col bg-white relative shadow-md transition-[margin-right] duration-[0.6s] -mr-[100%] group-[.show]:mr-0 dark:bg-darkmode-600 sm:w-[460px]"><a class="absolute top-0 left-0 right-auto mt-4 -ml-10 sm:-ml-12" data-tw-dismiss="modal" href="#">
            <i data-lucide="x" width="24" height="24" class="stroke-1.5 w-8 h-8 text-slate-400 w-8 h-8 text-slate-400"></i>


        </a>
        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400 p-5">
            <h2 class="mr-auto text-base font-medium">
                Slide Over With Close Button
            </h2>
        </div>
        <div class="p-5 overflow-y-auto flex-1">This is totally awesome slide over with close button!</div>
    </div>
</div> -->
<!-- END: Modal Content -->



<!-- BEGIN: Modal Toggle -->
<!-- <div class="text-center">
    <a data-tw-merge data-tw-toggle="modal" data-tw-target="#basic-modal-preview" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">Show Modal</a>
</div> -->
<!-- END: Modal Toggle -->
<!-- BEGIN: Modal Content -->
<!-- <div data-tw-backdrop="static" aria-hidden="true" tabindex="-1" id="modal-created" class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s]">
    <div class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
        
    </div>
</div> -->
<!-- <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="basic-modal-preview" class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s]">
    <div class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]    p-10 text-center">This is totally awesome blank modal!</div>
</div> -->
<!-- END: Modal Content -->



@endsection

@section('script')
<script>

    $("#select_status").on( "change", function() {
        var _status = $("#select_status").val();
        if(_status[0] == 'rejected'){
            $('#reason_box').show();
        }else{
            $('#reason_box').hide();
        }
        // console.log(_status);
    } );
</script>
@endsection