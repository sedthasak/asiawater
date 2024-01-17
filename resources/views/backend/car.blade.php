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
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}} ((พบ {{$totalCount}} ข้อมูล))</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_excelcars_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >Import Excel</a>
            <!-- <a href="{{route('BN_brands_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่ม</a>     -->
        </div>
    </div>
    <div class="lg:flex intro-y mt-5 mb-5">

        <!-- <div class="relative">
            <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="รุ่น..." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg> 
        </div> -->


        <select id="brand" name="brand" onchange="applyFilters()" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
            <option value="">ยี่ห้อ&emsp;&emsp;</option>
            @foreach($brands as $keybrn => $brn)
            <option value="{{$brn->id}}" @if(request()->input('brand') == $brn->id) selected @endif>{{$brn->title}}&emsp;&emsp;</option>
            @endforeach
        </select>
    </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap" width="10%">#</th>
                    <!-- <th class="whitespace-nowrap"></th> -->
                    <th class="whitespace-nowrap">ยี่ห้อ</th>
                    <th class="whitespace-nowrap">รุ่น</th>
                    <th class="whitespace-nowrap">โฉม</th>
                    <th class="whitespace-nowrap">รุ่นย่อย</th>
                    <!-- <th class="text-center whitespace-nowrap"></th> -->
                </tr>
            </thead>
            <tbody>
                
                @foreach($query as $keyres => $res)
                @php
                $feature_img = ($res->feature)?asset($res->feature):asset('uploads/default-car.jpg');
                @endphp
                    <tr class="intro-x">
                        <td class="text-center">{{(($query->currentPage()-1)*48)+$keyres+1}}</td>
                        <!-- <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                    <img alt="{{$res->title}}" class="tooltip " src="{{$feature_img}}" >
                                </div>
                            </div>
                        </td> -->
                        
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->brands_name}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->models_name}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->generations_name}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->sub_models_name}}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <div class="d-flex">
        {!! $query->links() !!}
    </div>


@endsection

@section('script')
<script>

    function applyFilters() {
        var brand = document.getElementById('brand').value;
        // var keyword = document.getElementById('keyword').value;

        var newUrl = `{{ route('BN_car') }}?brand=${brand}`;
        window.location.href = newUrl;
    }
    // document.getElementById('brand').addEventListener('change', applyFilters);
    function handleEnter(event) {
        if (event.key === 'Enter') {
            applyFilters();
        }
    }

    // jQuery(function() {
    //     fetchBrands();
    //     function fetchBrands(){
    //         jQuery.ajax({
    //             url: '{{route('BN_brandsFetch')}}',
    //             method: 'get',
    //             success: function(response){
    //                 jQuery('#fetchBrands').html(response);
    //             }
    //         });
    //     }
    // });
</script>
@endsection