@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php

$arrSet = [];
$arrUse = [];
foreach($setFooterModel as $key => $Foote){

    $expldname = explode("_", $Foote->footer_name);
    $expldlink = explode("_", $Foote->footer_link);
    $title = $Foote->heading;
    if($expldname[0] == $expldlink[0]){
        $arrSet[$key]['page'] = $Foote->page;
        $arrSet[$key]['labelname'] = $Foote->footer_name;
        $arrSet[$key]['labellink'] = $Foote->footer_link;
        $arrSet[$key]['setname'] = $expldname[0];
        $arrSet[$key]['pointname'] = $expldname[1];
        $arrSet[$key]['pointlink'] = $expldlink[1];
        $arrSet[$key]['head_title'] = $title;
        $arrSet[$key]['name'] = $Foote->name;
        $arrSet[$key]['link'] = $Foote->link;
    }
}
foreach($arrSet as $key => $setlabel){
    if(!in_array($setlabel['setname'], $arrUse)){
        $arrUse[$setlabel['setname']] = array(
            'title_head' => $setlabel['head_title'],
            'title_head_name' => $setlabel['setname'],
            'value' => [],
        );
    }
}
foreach($arrSet as $keyval => $setvalue){
    $arrUse[$setvalue['setname']]['value'][] = $setvalue;
    // echo "<pre>";
    // print_r($setvalue);
    // echo "</pre>";
}


// echo "<pre>";
// print_r($arrUse);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_categories')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >ย้อนกลับ</a>    
        </div> -->
    </div>
    <form method="post" action="{{route('BN_setfooterupdate')}}"  >
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">บันทึก</button>
                    </div>
                    
                    <div class="p-5">


                        @foreach($arrUse as $keyuse => $use)
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="{{$use['title_head_name']}}" value="{{$use['title_head']}}"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">

                                @foreach($use['value'] as $keysubusename => $subusename)
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="{{$subusename['name']}}" name="{{$subusename['labelname']}}" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                @endforeach

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                @foreach($use['value'] as $keysubuselink => $subuselink)
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="{{$subuselink['link']}}" name="{{$subuselink['labellink']}}" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @endforeach

                        <!-- Head 1 -->
                        <!-- Head 1 -->
                        <!-- Head 1 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head1"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head1_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->

                        <!-- Head 2 -->
                        <!-- Head 2 -->
                        <!-- Head 2 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head2"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head2_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->

                        <!-- Head 3 -->
                        <!-- Head 3 -->
                        <!-- Head 3 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head3"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head3_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->

                        <!-- Head 4 -->
                        <!-- Head 4 -->
                        <!-- Head 4 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head4"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head4_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->

                        <!-- Head 5 -->
                        <!-- Head 5 -->
                        <!-- Head 5 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head5"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head5_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->

                        <!-- Head 6 -->
                        <!-- Head 6 -->
                        <!-- Head 6 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head6"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head6_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->


                        <!-- Head 6 -->
                        <!-- Head 7 -->
                        <!-- Head 7 -->
<!-- 
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head7"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head7_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->


                        <!-- Head 8 -->
                        <!-- Head 8 -->
                        <!-- Head 8 -->

                        <!-- <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">หัวข้อ</label>
                                    <input type="text" class="form-control w-full" id="" name="head8"  autocomplete="off"  />
                                </div>

                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_name1" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_name2" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_name3" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_name4" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_name5" placeholder="ข้อความ" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_name6" placeholder="ข้อความ" autocomplete="off"  />
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_link1" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_link2" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_link3" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_link4" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_link5" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>
                                <div class="mt-3 ">
                                    <input type="text" class="form-control w-full" value="" name="head8_link6" placeholder="ลิ้งก์" autocomplete="off"  />
                                </div>

                            </div>
                        </div> -->

                        

                        

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