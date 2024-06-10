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
        </div>
    </div>
    <form method="post" action="{{route('BN_users_add_action')}}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    

                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control w-full" value="" name="name" autocomplete="off" required />
                                </div>
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">อีเมล</label>
                                    <input type="text" class="form-control w-full" value="" name="email"  autocomplete="off" />
                                </div>
                                <!-- <div class="mt-3">
                                    <label for="" class="form-label">แอคทีฟ</label>
                                    <select class="form-control w-full" name="active" required >
                                        <option value="1" selected >แอคทีฟ</option>
                                        <option value="2" >ไม่แอคทีฟ</option>
                                    </select>
                                </div> -->


                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3">
                                    <label for="" class="form-label">หน้าที่</label>
                                    <select name="role" class="form-control w-full" name="role" required >
                                        <option value="admin" selected >แอดมิน</option>
                                        <option value="creator" >พนักงาน</option>
                                    </select>
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">พาสเวิร์ด</label>
                                    <input type="password" class="form-control w-full" id="" name="password" >
                                </div>

                                
                                

                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รูปโปรไฟล์</label>
                                    <input type="file" class="form-control w-full" id="" name="photo"  autocomplete="off" accept="image/*" />
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- <div class="mt-3">
                        <div class="sm:grid grid-cols-3 gap-3">
                        <div class="">
                                <label for="" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control w-full" id="" name="name" >
                            </div>
                            <div class="">
                                <label for="" class="form-label">อีเมล</label>
                                <input type="text" class="form-control w-full" id="" name="email" >
                            </div>
                            <div class="">
                                <label for="" class="form-label">พาสเวิร์ด</label>
                                <input type="password" class="form-control w-full" id="" name="password" >
                            </div>
                        </div>
                    </div> -->


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