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

    <div class="intro-y flex flex-col sm:flex-row items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">{{$default_pagename}}</h2>
    </div>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-5">
        <form>
            <div class="sm:flex items-center sm:mr-4">
                <select id="" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                    <option value="">ทั้งหมด</option>
                    <!-- <option value="frontend">เฉพาะหน้าบ้าน</option>
                    <option value="backend">เฉพาะหลังบ้าน</option> -->
                </select>
            </div>
        </form>
    </div>
    <div id="fetchLog"></div>
    <!-- <div class="grid gap-6 mt-5 p-5 box">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="">
                    <tr class="">
                        <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</th>
                        <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">##</th>
                        <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">เวลา</th>
                        <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">กิจกรรม</th>
                        <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">ยูสเซอร์</th>
                        <th class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">1 </td>
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> Angelina </td>
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> Jolie </td>
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> @angelinajolie </td>
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> angelinajolie@gmail.com </td>
                        <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"> 260 W. Storm Street New York, NY 10025. </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->

    <!-- BEGIN: Pagination -->
    <!-- <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
    </div> -->
    <!-- END: Pagination -->

@endsection

@section('script')
    <script>
        jQuery(function() {

            fetchLog();

            function fetchLog(){
                jQuery.ajax({
                    url: '{{route('BN_logsFetch')}}',
                    method: 'get',
                    success: function(response){
                        jQuery('#fetchLog').html(response);
                    }
                });
            }

        });

    </script>

<script>
    
</script>
@endsection
