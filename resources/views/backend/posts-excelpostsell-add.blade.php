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
            <!-- <a href="{{route('BN_brands_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >เพิ่ม</a>     -->
        </div>
    </div>
    <!-- <div class="intro-y grid grid-cols-12 gap-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t" id="fetchBrandsaa">
                
            </div>
        </div>
    </div> -->
    <div class=" mt-5 grid grid-cols-12 gap-6" id="fetchBrands">
    <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
			<!-- BEGIN: form -->
			<form method="post" action="{{route('BN_posts_excelpostsell_store')}}" enctype="multipart/form-data">
			    @csrf
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
						Import Excel
                    </h2>
					<a href="{{url('uploads/template/template โพสต์ขาย หลังบ้าน.xlsx')}}" class="btn btn-primary shadow-md mr-2 hidden sm:flex"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Template </a>
                </div>
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5"> 
								
								<div class="col-span-12 2xl:col-span-12">
                                    
                                    <div class="mt-3">
                                        <input class="form-control" id="files01" name="excel_file" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"   />
                                    </div>
                                </div>

								
								
                                
                            </div>
                            <div class="flex justify-end mt-4">
								<button type="submit" class="btn btn-primary w-24">Save</button>
								
							</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            </form>
            <!-- END: form -->
		</div>
    </div>


@endsection

@section('script')
<!-- <script>
    jQuery(function() {
        fetchBrands();
        function fetchBrands(){
            jQuery.ajax({
                url: '{{route('BN_brandsFetch')}}',
                method: 'get',
                success: function(response){
                    jQuery('#fetchBrands').html(response);
                }
            });
        }
    });
</script> -->
@endsection