@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$arr_color = array(
    'white' => 'ขาว',
    'เขียว' => 'เขียว',
    'แดง' => 'แดง',
    'ดำ' => 'ดำ',
    'ชมพู' => 'ชมพู',
    'ครีม' => 'ครีม',
    'เทา' => 'เทา',
    'เทา-เขียว' => 'เทา-เขียว',
    'เทา-ดำ' => 'เทา-ดำ',
    'เทา-น้ำเงิน' => 'เทา-น้ำเงิน',
    'น้ำเงิน' => 'น้ำเงิน',
    'น้ำตาล' => 'น้ำตาล',
    'บรอนซ์เงิน' => 'บรอนซ์เงิน',
    'บรอนซ์ทอง' => 'บรอนซ์ทอง',
    'ฟ้า' => 'ฟ้า',
    'ม่วง' => 'ม่วง',
    'ส้ม' => 'ส้ม',
    'เหลือง' => 'เหลือง',
);
// $arr_cartype = array(
//     'home' => 'รถบ้าน / เจ้าของรถขายเอง',
//     'dealer' => 'ดีลเลอร์ / ลงแบบฝากขาย',
//     'lady' => 'รถคุณผู้หญิง',
// );

// echo "<pre>";
// print_r($postcar);
// echo "</pre>";
?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <!-- <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_brands')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md" >ย้อนกลับ</a>    
        </div> -->
    </div>
    
        
        
        
    



    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form method="post" action="{{route('BN_posts_edit_action')}}" enctype="multipart/form-data" >
            @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" required />
                <input type="hidden" name="id" value="{{$postcar->id}}"  />
                <!-- <input type="hidden" name="customer_id" value="22" /> -->
                <div class="intro-y box p-5">

                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                <div>
                                    <label for="" class="form-label">ยูสเซอร์</label>
                                    <input type="text" name="user_name" class="form-control" value="{{auth()->user()->name}}" readonly required  >
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">ลูกค้าเจ้าของรถ</label>
                                    <select name="customer_id" id="customer_id" data-search="true" class="tom-select w-full" required >
                                        <option value="">ลูกค้าเจ้าของรถ</option>
                                        @foreach($customer as $keycustomer => $cus)
                                        <option value="{{$cus->id}}" data-role="{{$cus->sp_role}}" {{($postcar->customer_id == $cus->id)?'selected':''}}>{{$cus->firstname}} {{$cus->lastname}} - {{$cus->phone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <!-- <label for="" class="form-label">ประเภทลูกค้า</label>
                                    <input type="text" name="cusrole" id="cusrole" class="form-control" value="" readonly required  > -->
                                    <label for="" class="form-label">ประเภทรถที่ลงขาย</label>
                                    <select name="type" id="type" class="form-select" required >
                                        <option value="home"  {{($postcar->type == 'home')?'selected':''}}>รถบ้าน / เจ้าของรถขายเอง</option>
                                        <option value="dealer" {{($postcar->type == 'dealer')?'selected':''}}>ดีลเลอร์ / ลงแบบฝากขาย</option>
                                        <option value="lady"  {{($postcar->type == 'lady')?'selected':''}}>รถคุณผู้หญิง</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-10">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">ยี่ห้อ</label>
                                    <select name="brand_id" id="brand_id" data-search="true" class="tom-select w-full" required >
                                        <option value="">เลือกยี่ห้อ</option>
                                        @foreach($brands as $keybrands => $brand)
                                        <option value="{{$brand->id}}" {{($postcar->brand_id == $brand->id)?'selected':''}}>{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">โฉม</label>
                                    <select name="generations_id" id="generations_id"  class=" w-full" required >
                                        <option value="">เลือกโฉม</option>
                                        @foreach($generations as $keygenerations => $generation)
                                        @if($generation->id==$postcar->generations_id)
                                        <option value="{{$generation->id}}" selected>{{$generation->generations}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">สี</label>
                                    <select name="color" id="color_sel" class="form-select" required >
                                        <option value="">เลือกสี</option>
                                        @foreach($arr_color as $keycolor => $color)
                                        <option value="{{$color}}" {{($postcar->color == $color)?'selected':''}}>{{$color}}</option>
                                        @endforeach
                                        <option value="999">สีอื่นๆ</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">รุ่นปี</label>
                                    <select name="modelyear" id="modelyear" class=" w-full" required >
                                        <option value="">เลือกรุ่นปี</option>
                                        <option value="{{$postcar->modelyear}}" selected>{{$postcar->modelyear}}</option>                                  
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">เกียร์</label>
                                    <select name="gear" id="gear" class="form-select" required >
                                        <option value="auto">ออโต้</option>
                                        <option value="manual">ธรรมดา</option>
                                    </select>
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เลขทะเบียนรถ</label>
                                    <input type="text" name="vehicle_code" id="" class="form-control" value="{{$postcar->vehicle_code}}" required  >
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">รุ่น</label>
                                    <select name="model_id" id="model_id" class=" w-full" required >
                                        <option value="">เลือกรุ่น</option>
                                        @foreach($models as $keymodels => $model)
                                        @if($model->id==$postcar->model_id)
                                        <option value="{{$model->id}}" selected>{{$model->model}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div> 
                                <div class="mt-3">
                                    <label for="" class="form-label">รุ่นย่อย</label>
                                    <select name="sub_models_id" id="sub_models_id" class=" w-full" required >
                                        <option value="">เลือกรุ่นย่อย</option>
                                        @foreach($sub_models as $keysub_models => $sub_model)

                                        @if($sub_model->id==$postcar->sub_models_id)
                                        <option value="{{$sub_model->id}}" selected>{{$sub_model->sub_models}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สีอื่นๆ</label>
                                    <input type="text" name="other_color" id="other_color" class="form-control" value=""  >
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">เลขไมล์</label>
                                    <input type="text" name="mileage" id="mileage" class="form-control" value="{{$postcar->mileage}}"  required  >
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">แก๊ส</label>
                                    <select id="gas" id="gas" class="form-select" required >
                                        <option value="no">ไม่ติดแก๊ส</option>
                                        <option value="ngv">NGV</option>
                                        <option value="lpg">LPG</option>
                                        <option value="ev">รถไฟฟ้า</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">จังหวัด</label>
                                    <select name="province" id="province" data-search="true" class="tom-select w-full" >
                                        <option value="">เลือกจังหวัด</option>
                                        @foreach($provinces as $keypv => $pv)
                                        <option value="{{$pv->name_th}}" {{($postcar->province == $pv->name_th)?'selected':''}}>{{$pv->name_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">
                                <div class="mt-3">
                                    <label for="" class="form-label">หัวข้อโฆษณา</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$postcar->title}}" required  >
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">รายละเอียดรถ</label>
                                    <textarea name="detail" id="detail" class="form-control" required >{{$postcar->detail}}</textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">ราคา</label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{$postcar->price}}"  required >
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">รูปปก</label>
                                    <input type="file" name="feature" id="feature" class="form-control" accept="image/*" >
                                </div>
                                <div class="mt-5">
                                    <label for="" class="form-label">รูปภายนอกรถ</label>
                                    <input type="file" name="exterior[]" id="exterior" class="form-control" accept="image/*" multiple >
                                </div>
                                <div class="mt-5">
                                    <label for="" class="form-label">รูปภายในรถ</label>
                                    <input type="file" name="interior[]" id="interior" class="form-control" accept="image/*" multiple >
                                </div>
                                <div class="mt-5">
                                    <label for="" class="form-label">รูปเล่มทะเบียนรถ</label>
                                    <input type="file" name="licenseplate" id="licenseplate" class="form-control"  accept="image/*" >
                                </div>
                                <div class="mt-5">
                                    <label>การรับประกันหลังการขาย</label>
                                    <div class="mt-2">
                                        <div data-tw-merge class="flex items-center">
                                            <input type="checkbox" id="warranty_1" name="warranty_1" value="1" {{($postcar->warranty_1 == 1)?'checked':''}} class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type=&#039;radio&#039;]]:checked:bg-primary [&amp;[type=&#039;radio&#039;]]:checked:border-primary [&amp;[type=&#039;radio&#039;]]:checked:border-opacity-10 [&amp;[type=&#039;checkbox&#039;]]:checked:bg-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" />
                                            <label for="warranty_1" class="cursor-pointer ml-2">รถได้รับการตรวจสภาพโดยผู้เชี่ยวชาญ	</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="mt-2">
                                        <div data-tw-merge class="flex items-center">
                                            <input type="checkbox" id="warranty_2" name="warranty_2" value="1" {{($postcar->warranty_2 == 1)?'checked':''}} class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type=&#039;radio&#039;]]:checked:bg-primary [&amp;[type=&#039;radio&#039;]]:checked:border-primary [&amp;[type=&#039;radio&#039;]]:checked:border-opacity-10 [&amp;[type=&#039;checkbox&#039;]]:checked:bg-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" />
                                            <label for="warranty_2" class="cursor-pointer ml-2">มีการรับประกัน กรุณาระบุระยะเวลา</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input class="form-control" type="text" name="warranty_2_input" value="{{$postcar->warranty_2_input}}" placeholder="เช่น 1 ปี / 10,000 กม." />
                                </div>
                                <div class="mt-5">
                                    <div class="mt-2">
                                        <div data-tw-merge class="flex items-center">
                                            <input type="checkbox" id="warranty_3" name="warranty_3" value="1" {{($postcar->warranty_3 == 1)?'checked':''}} class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type=&#039;radio&#039;]]:checked:bg-primary [&amp;[type=&#039;radio&#039;]]:checked:border-primary [&amp;[type=&#039;radio&#039;]]:checked:border-opacity-10 [&amp;[type=&#039;checkbox&#039;]]:checked:bg-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-primary [&amp;[type=&#039;checkbox&#039;]]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50 w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white w-[38px] h-[24px] p-px rounded-full relative before:w-[20px] before:h-[20px] before:shadow-[1px_1px_3px_rgba(0,0,0,0.25)] before:transition-[margin-left] before:duration-200 before:ease-in-out before:absolute before:inset-y-0 before:my-auto before:rounded-full before:dark:bg-darkmode-600 checked:bg-primary checked:border-primary checked:bg-none before:checked:ml-[14px] before:checked:bg-white" />
                                            <label for="warranty_3" class="cursor-pointer ml-2">มีบริการช่วยเหลือฉุกเฉิน 24 ชม.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <label for="" class="form-label">หมวดหมู่</label>
                                    <select data-placeholder="หมวดหมู่" name="category[]" multiple="multiple" class="tom-select w-full">
                                        @foreach($categories as $keycategories => $cate)
                                        @php
                                            if (isset($postcar->category)) {
                                                $selected = (in_array($cate->id, json_decode($postcar->category)))?'selected':'';
                                            }
                                            else {
                                                $selected = '';
                                            }
                                        @endphp
                                        <option value="{{$cate->id}}" {{$selected}}>{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                        </div>
                        

                        <!-- หนี dropdown select -->
                        @for($i=0;$i<30;$i++)
                        <br></br>
                        @endfor



                    </div>
                
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>




@endsection

@section('script')


<script>

    // var roles = [];
    //     @foreach ($customer as $keycustomer => $tomer)
    //     roles[{{$tomer->id}}] = '{{$tomer->sp_role}}';
    //     @endforeach

    // jQuery("#customer_id").on( "change", function() {

    //     var roletype = ['']
    //     roletype['home'] = 'ลูกค้าทั่วไป';
    //     roletype['dealer'] = 'นายหน้า';
    //     var rorororor = $(this).val();
    //     $("#cusrole").val(roletype[roles[rorororor[0]]]);

    // } );

    $("#brand_id").on( "change", function() {
        var brands_id = $(this).val();
        if(brands_id[0]){
            jQuery.ajax({
                url: "{{route('carpostSelectBrand')}}",
                type: "post",
                data: { 
                    brands_id: brands_id[0], 
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    $('#model_id').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    } );
    $("#model_id").on( "change", function() {
        var model_id = $(this).val();
        if(model_id[0]){
            jQuery.ajax({
                url: "{{route('carpostSelectModel')}}",
                type: "post",
                data: { 
                    models_id: model_id[0], 
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    $('#generations_id').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    } );
    $("#generations_id").on( "change", function() {
        var generations_id = $(this).val();
        if(generations_id[0]){
            jQuery.ajax({
                url: "{{route('carpostSelectGenerations')}}",
                type: "post",
                data: { 
                    generations_id: generations_id[0], 
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    $('#sub_models_id').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            jQuery.ajax({
                url: "{{route('carpostSelectGenerationsYear')}}",
                type: "post",
                data: { 
                    generations_id: generations_id[0],
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    $('#modelyear').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        }
    } );



    // jQuery(function() {
    //     fetchPosts();
    //     function fetchPosts(){
    //         jQuery.ajax({
    //             url: '{{route('BN_postsFetch')}}',
    //             method: 'get',
    //             success: function(response){
    //                 jQuery('#fetchPosts').html(response);
    //             }
    //         });
    //     }
    // });
</script>


@endsection