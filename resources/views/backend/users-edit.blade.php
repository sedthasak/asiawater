@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($user);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <!-- <a href="{{route('BN_user')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >ย้อนกลับ</a>     -->
        </div>
    </div>
    <form method="post" action="{{route('BN_user_edit_action')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user" value="{{$user->id}}" />
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
                                    <input type="text" class="form-control w-full" value="{{$user->name}}" name="name" autocomplete="off" required />
                                </div>
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">อีเมล</label>
                                    <input type="text" class="form-control w-full" value="{{$user->email}}" name="email"  autocomplete="off" />
                                </div>
                                


                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3">
                                    <label for="" class="form-label">หน้าที่</label>
                                    <select name="role" class="form-control w-full" name="role" required >
                                        <option value="admin" {{($user->role=='admin')?'selected':''}} >Admin</option>
                                        <option value="manager" {{($user->role=='manager')?'selected':''}} >Manager</option>
                                        <option value="assistance" {{($user->role=='assistance')?'selected':''}} >Assistance</option>
                                        <option value="editor" {{($user->role=='editor')?'selected':''}} >Editor</option>
                                        <option value="marketing" {{($user->role=='marketing')?'selected':''}} >Marketing</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">แอคทีฟ</label>
                                    <select class="form-control w-full" name="active" required >
                                        <option value="1" selected >แอคทีฟ</option>
                                        <option value="2" >ไม่แอคทีฟ</option>
                                    </select>
                                </div>
                                <!-- <div class="mt-3 ">
                                    <label for="" class="form-label">พาสเวิร์ด</label>
                                    <input type="password" class="form-control w-full" id="" name="password" >
                                </div> -->

                                
                                

                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รูปโปรไฟล์</label>
                                    <input type="file" class="form-control w-full" id="" name="photo"  autocomplete="off" accept="image/*" />
                                </div>
                                @if(isset($user->photo))
                                <div class="sm:grid grid-cols-1 gap-1 mt-5">
                                    <div class="">
                                        <label for="" class="form-label">รูปภาพปัจจุบัน</label>
                                        <image width="150" src="{{asset($user->photo)}}">
                                    </div>
                                </div>
                                @endif

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