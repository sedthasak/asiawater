@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($page_name);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <!-- <a href="{{route('BN_customers_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่มรายชื่อลูกค้า</a>     -->
        </div>
    </div>
    <div class="intro-y news xl:w-5/5 p-5 box mt-8">
        <div class="intro-y text-justify leading-relaxed">
            <div class="box">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="" class="rounded-full" src="{{asset($Customer->image)}}">
                        </div>
                        <div class="ml-5">
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$Customer->firstname." ".$Customer->lastname}}</div>
                            <div class="text-slate-500">{{$Customer->phone}}</div>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">ข้อมูลลูกค้า</div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center">
                                <i data-lucide="Circle" class="w-4 h-4 mr-2"></i> {{$Customer->email}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
    <!-- <div id="fetchCustomers"></div> -->
    <!-- <div class="grid gap-6 mt-5 p-5 box">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="">
                    <tr class="">
                        <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</td>
                        <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">เวลา</td>
                        <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">กิจกรรม</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">1 </td>
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> Angelina </td>envelope
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> @angelinajolie </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->




@endsection

@section('script')
<script>

    // jQuery(function() {
    //     fetchCustomers();
    //     function fetchCustomers(){
    //         jQuery.ajax({
    //             url: '{{route('BN_customersFetch')}}',
    //             method: 'get',
    //             success: function(response){
    //                 jQuery('#fetchCustomers').html(response);
    //             }
    //         });
    //     }
    // });
    

</script>


@endsection