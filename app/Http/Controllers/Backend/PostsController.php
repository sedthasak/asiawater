<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\provincesModel;
use App\Models\modelsModel;
use App\Models\brandsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;
use App\Models\carsModel;
use App\Models\Customer;
use App\Models\galleryModel;
use App\Models\categoriesModel;
use App\Models\noticeModel;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Validation\Rules;
// use Illuminate\Database\Eloquent\Builder;

class PostsController extends Controller
{
    public function BN_posts(Request $request)
    {
        $query = carsModel::query()
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc');

        if ($request->filled('status')) {
            $status = $request->input('status');
            $query->where('cars.status', '=', $status);
        }

        if ($request->filled('type')) {
            $type = $request->input('type');
            $query->where('cars.type', '=', $type);
        }

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('customer.firstname', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('customer.lastname', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);



        return view('backend/post', [ 
            'default_pagename' => 'โพสท์ลงขายรถ',
            'query' => $query,
        ]);
    }
    public function BN_posts_add(Request $request)
    {
        $provinces = provincesModel::all();
        $brands = brandsModel::all();
        $models = modelsModel::all();
        $generations = generationsModel::all();
        $sub_models = sub_modelsModel::all();
        $customer = Customer::all();
        $categories = categoriesModel::all();

        return view('backend/post-add', [ 
            'default_pagename' => 'เพิ่มโพสท์ลงขายรถ',
            'provinces' => $provinces,
            'brands' => $brands,
            'models' => $models,
            'generations' => $generations,
            'sub_models' => $sub_models,
            'customer' => $customer,
            'categories' => $categories,
        ]);
    }
    public function BN_posts_add_action(Request $request)
    {
        // dd($request);

        $cars = new carsModel;

        $cars->type = $request->type;
        $cars->user_id = $request->user_id;
        $cars->customer_id = $request->customer_id;
        $cars->brand_id = $request->brand_id;
        $cars->model_id = $request->model_id;
        $cars->generations_id = $request->generations_id;
        $cars->sub_models_id = $request->sub_models_id;
        $cars->modelyear = $request->modelyear;
        $cars->mileage = $request->mileage;
        $cars->vehicle_code = $request->vehicle_code;
        $cars->title = $request->title;
        $cars->price = $request->price;
        $cars->licenseplate = $request->licenseplate;
        $cars->detail = $request->detail;
        $cars->province = $request->province;
        $cars->color = $request->color;
        $cars->gas = $request->gas;
        $cars->ev = $request->ev;
        $cars->gear = $request->gear;
        $cars->warranty_1 = $request->warranty_1;
        $cars->warranty_2 = $request->warranty_2;
        $cars->warranty_3 = $request->warranty_3;
        $cars->warranty_2_input = $request->warranty_2_input;
        $cars->category = json_encode($request->category, true);

        if($request->user_id){
            $cars->status = 'approved';
        }else{
            $cars->status = 'created';
        }
        
        

        if($request->hasFile('feature')){
            $feature = $request->file('feature');
            $destinationPath = public_path('/uploads/feature');
            $filename = $feature->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'feature-'.time() . '.' .$ext;
            $feature->move($destinationPath, $newfilenam);
            $filepath = 'uploads/feature/'.$newfilenam;
            $cars->feature = $filepath;
        }
        if($request->hasFile('licenseplate')){
            $licenseplate = $request->file('licenseplate');
            $destinationPath = public_path('/uploads/licenseplate');
            $filename = $licenseplate->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'licenseplate-'.time() . '.' .$ext;
            $licenseplate->move($destinationPath, $newfilenam);
            $filepath = 'uploads/licenseplate/'.$newfilenam;
            $cars->licenseplate = $filepath;
        }
        $cars->save();
        $carpost_id = $cars->id;

        if($request->hasFile('exterior')){
            $exterior_image = $request->file('exterior');
            foreach($exterior_image as $keyex => $extr){
                $exterior = $extr;
                $destinationPath = public_path('/uploads/exterior');
                $filename = $exterior->getClientOriginalName();

                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $newfilenam = 'exterior-'.time().'-'.$keyex.'.' .$ext;
                $exterior->move($destinationPath, $newfilenam);
                $filepath = 'uploads/exterior/'.$newfilenam;

                $gallery = new galleryModel;
                $gallery->cars_id = $carpost_id;
                $gallery->gallery = $filepath;
                $gallery->type = 'exterior';
                $gallery->save();
            }
        }
        if($request->hasFile('interior')){
            $interior_image = $request->file('interior');
            foreach($interior_image as $keyex => $extr){
                $interior = $extr;
                $destinationPath = public_path('/uploads/interior');
                $filename = $interior->getClientOriginalName();

                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $newfilenam = 'interior-'.time().'-'.$keyex.'.' .$ext;
                $interior->move($destinationPath, $newfilenam);
                $filepath = 'uploads/interior/'.$newfilenam;
                
                $gallery = new galleryModel;
                $gallery->cars_id = $carpost_id;
                $gallery->gallery = $filepath;
                $gallery->type = 'interior';
                $gallery->save();
            }
        }

        

        // $cars2 = carsModel::find($cars->id);
        // $cars2->update();
        
       
        return redirect(route('BN_posts'))->with('success', 'บันทึกสำเร็จ !');
    }
    public function BN_postsFetch()
    {
        $query = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->paginate(12);
        $output = '';

        $arrrole = array(
            'home' => 'ลูกค้าทั่วไป',
            'dealer' => 'นายหน้า',
            'lady' => '',
        );

        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
        if($query->count() > 0){
            foreach($query as $key => $res){
                $classset = '';
                $nameset = '';
                if($res->status == 'created'){
                    $classset = 'cursor-pointer rounded-full bg-pending px-2 py-1 text-xs font-medium text-white';
                    $nameset = 'รออนุมัติ';
                }elseif($res->status == 'approved'){
                    $classset = 'cursor-pointer rounded-full bg-success px-2 py-1 text-xs font-medium text-white';
                    $nameset = 'ออนไลน์';
                }elseif($res->status == 'rejected'){
                    $classset = 'cursor-pointer rounded-full bg-primary px-2 py-1 text-xs font-medium text-white';
                    $nameset = 'รอแก้ไข';
                }elseif($res->status == 'expired'){
                    $classset = 'cursor-pointer rounded-full bg-danger px-2 py-1 text-xs font-medium text-white';
                    $nameset = 'หมดอายุ';
                }elseif($res->status == 'deleted'){
                    $classset = 'cursor-pointer rounded-full bg-danger px-2 py-1 text-xs font-medium text-white';
                    $nameset = 'ถูกลบ';
                }
                ?>
                <tr class="intro-x">
                    <td>
                        <a href="" class="font-medium whitespace-nowrap"><?php echo date('d/m/Y', strtotime($res->created_at)) ?></a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?php echo date('H:i:s', strtotime($res->created_at)) ?> น.</div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap"><?php echo $res->firstname." ".$res->lastname ?></a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?php echo $arrrole[$res->sp_role] ?></div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap"><?php echo $res->modelyear." ".$res->brands_title." ".$res->model_name ?></a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?php echo $res->generations_name." ".$res->sub_models_name ?></div>
                    </td>
                    <td class="text-center"><?php echo  number_format($res->price, 2, '.', ',') ?> ฿</td>
                    <td class="w-40">
                        <div class="flex items-center justify-center text-default">
                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> <span class="<?php echo $classset ?>"> <?php echo $nameset ?> </span>
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <!-- <a class="flex items-center mr-3" href="#">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> แก้ไข
                            </a> -->
                            <a class="flex items-center mr-3" href="<?php echo route('BN_posts_detail', ['id' => $res->id]); ?>">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ดูโพสท์
                            </a>
                            
                        </div>
                    </td>
                </tr>
                <?php
            }  
        }else{
            ?>
            <tr class="intro-x">  
                <td colspan="6" class="px-5 py-3 dark:border-darkmode-300 border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600">Not Found!!!</td>
            </tr>
            <?php
        }
    }

    public function BN_posts_detail(Request $request, $id)
    {
        // $postcar = brandsModel::find($id);
        // $postcar = modelsModel::find($id);
        // $postcar = generationsModel::find($id);
        // $postcar = sub_modelsModel::find($id);
        // $postcar = Customer::find($id);
        // $postcar = galleryModel::find($id);
        // galleryModel
        $postcar = carsModel::find($id);
        $customer = DB::table('customer')->where('id', $postcar->customer_id)->first();
        $gallery = DB::table('gallery')->where('cars_id', $id)->get();
        $brands = DB::table('brands')->where('id', $postcar->brand_id)->first();
        $models = DB::table('models')->where('id', $postcar->model_id)->first();
        $generations = DB::table('generations')->where('id', $postcar->generations_id)->first();
        $sub_models = DB::table('sub_models')->where('id', $postcar->sub_models_id)->first();
        $users = DB::table('users')->where('id', $postcar->user_id)->first();

        $arr_cate = [];
        if(is_array(json_decode($postcar->category)) && (count(json_decode($postcar->category))>0)){
            foreach((json_decode($postcar->category)) as $keycatedecde => $catego){
                $arr_cate[] = categoriesModel::find($catego);
            }
        }
            

        $interior = [];
        $exterior = [];
        foreach($gallery as $gal){
            if($gal->type=='interior'){
                $interior[] = $gal;
            }
            if($gal->type=='exterior'){
                $exterior[] = $gal;
            }
        }

            
        return view('backend/post-detail', [ 
            'default_pagename' => 'รายละเอียดโพสท์ลงขายรถ',
            'postcar' => $postcar,
            'customer' => $customer,
            'brands' => $brands,
            'models' => $models,
            'generations' => $generations,
            'sub_models' => $sub_models,
            'users' => $users,
            'gallery' => $gallery,
            'interior' => $interior,
            'exterior' => $exterior,
            'categories' => $arr_cate,
        ]);
    }





    public function BN_posts_edit(Request $request, $id)
    {
        $postcar = carsModel::find($id);
        $provinces = provincesModel::all();
        $brands = brandsModel::all();
        $models = modelsModel::all();
        $generations = generationsModel::all();
        $sub_models = sub_modelsModel::all();
        $customer = Customer::all();
        $categories = categoriesModel::all();

        return view('backend/post-edit', [ 
            'default_pagename' => 'แก้ไขโพสท์ลงขายรถ',
            'postcar' => $postcar,
            'provinces' => $provinces,
            'brands' => $brands,
            'models' => $models,
            'generations' => $generations,
            'sub_models' => $sub_models,
            'customer' => $customer,
            'categories' => $categories,
        ]);
    }
    public function BN_posts_edit_action(Request $request)
    {
        // dd($request);
        $cars = carsModel::find($request->id);

        

        $cars->type = $request->type;
        $cars->user_id = $request->user_id;
        $cars->customer_id = $request->customer_id;
        $cars->brand_id = $request->brand_id;
        $cars->model_id = $request->model_id;
        $cars->generations_id = $request->generations_id;
        $cars->sub_models_id = $request->sub_models_id;
        $cars->modelyear = $request->modelyear;
        $cars->mileage = $request->mileage;
        $cars->vehicle_code = $request->vehicle_code;
        $cars->title = $request->title;
        $cars->price = $request->price;
        $cars->licenseplate = $request->licenseplate;
        $cars->detail = $request->detail;
        $cars->province = $request->province;
        $cars->color = $request->color;
        $cars->gas = $request->gas;
        $cars->ev = $request->ev;
        $cars->gear = $request->gear;
        $cars->warranty_1 = $request->warranty_1;
        $cars->warranty_2 = $request->warranty_2;
        $cars->warranty_3 = $request->warranty_3;
        $cars->warranty_2_input = $request->warranty_2_input;
        $cars->category = json_encode($request->category, true);
        $cars->status = 'approved';
        

        if($request->hasFile('feature')){
            $feature = $request->file('feature');
            $destinationPath = public_path('/uploads/feature');
            $filename = $feature->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'feature-'.time() . '.' .$ext;
            $feature->move($destinationPath, $newfilenam);
            $filepath = 'uploads/feature/'.$newfilenam;
            $cars->feature = $filepath;
        }
        if($request->hasFile('licenseplate')){
            $licenseplate = $request->file('licenseplate');
            $destinationPath = public_path('/uploads/licenseplate');
            $filename = $licenseplate->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'licenseplate-'.time() . '.' .$ext;
            $licenseplate->move($destinationPath, $newfilenam);
            $filepath = 'uploads/licenseplate/'.$newfilenam;
            $cars->licenseplate = $filepath;
        }
        $cars->save();
        $carpost_id = $request->id;

        if($request->hasFile('exterior')){
            $exterior_image = $request->file('exterior');
            foreach($exterior_image as $keyex => $extr){
                $exterior = $extr;
                $destinationPath = public_path('/uploads/exterior');
                $filename = $exterior->getClientOriginalName();

                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $newfilenam = 'exterior-'.time().'-'.$keyex.'.' .$ext;
                $exterior->move($destinationPath, $newfilenam);
                $filepath = 'uploads/exterior/'.$newfilenam;

                $gallery = new galleryModel;
                $gallery->cars_id = $carpost_id;
                $gallery->gallery = $filepath;
                $gallery->type = 'exterior';
                $gallery->save();
            }
        }
        if($request->hasFile('interior')){
            $interior_image = $request->file('interior');
            foreach($interior_image as $keyex => $extr){
                $interior = $extr;
                $destinationPath = public_path('/uploads/interior');
                $filename = $interior->getClientOriginalName();

                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $newfilenam = 'interior-'.time().'-'.$keyex.'.' .$ext;
                $interior->move($destinationPath, $newfilenam);
                $filepath = 'uploads/interior/'.$newfilenam;
                
                $gallery = new galleryModel;
                $gallery->cars_id = $carpost_id;
                $gallery->gallery = $filepath;
                $gallery->type = 'interior';
                $gallery->save();
            }
        }

        

        // $cars2 = carsModel::find($cars->id);
        // $cars2->update();
        
       
        return redirect(route('BN_posts'))->with('success', 'บันทึกสำเร็จ !');


        // $categories = categoriesModel::find($request->id);
        // if($request->hasFile('feature')){

        //     $oldPath = public_path($categories->feature);
        //     if(File::exists($oldPath)){
        //         File::delete($oldPath);
        //     }

        //     $file = $request->file('feature');
        //     $destinationPath = public_path('/uploads');
        //     $filename = $file->getClientOriginalName();

        //     $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        //     $newfilenam = time() . '.' .$ext;
        //     $file->move($destinationPath, $newfilenam);
        //     $filepath = 'uploads/'.$newfilenam;

        //     $categories->feature = $filepath;
        // }
        
        // $categories->name = $request->name;
        // $categories->description = $request->description;
        
        // $categories->update();

        // if(isset($categories->id)){
        //     $usersavelog = auth()->user();
        //     $idsavelog = auth()->user()->id; 
        //     $emailsavelog = auth()->user()->email;
        //     $para = array(
        //         'part' => 'backend',
        //         'user' => $idsavelog,
        //         'ref' => $categories->id,
        //         'remark' => 'User '.$idsavelog.' Update Category!',
        //         'event' => 'update category',
        //     );
        //     $result = (new LogsSaveController)->create_log($para);
        // }

        // return redirect(route('BN_categories', ['id' => $categories->id]));

    }

    public function BN_posts_status_action(Request $request)
    {
        // dd($request);
        $cars = carsModel::find($request->post_id);

        
        $cars->status = $request->change_status;
        $cars->reason = $request->reason;

        // $cars->user_id = $request->user_id;
        // $cars->customer_id = $request->customer_id;
        if(isset($request->change_status) && $request->change_status=='approved'){  
            $cars->approvedate = time();
            $cars->expiredate = strtotime("+90 days", time());
        }
        if(isset($request->change_status) && $request->change_status=='rejected'){

            $carcar = carsModel::find($request->post_id);
            if($carcar){

                $notice = new noticeModel;
                $notice->customer_id = $carcar->customer_id;
                $notice->status = 'create';
                $notice->title = 'กรุณาแก้ไขรายละเอียดรถยนต์';
                $notice->detail = $request->reason;
                $notice->resource = 'cars';
                $notice->resource_id = $request->post_id;
                $notice->save();
            }   
        }

        $cars->update();
    
        return redirect(route('BN_posts_detail', ['id' => $request->post_id]))->with('success', 'สำเร็จ !');
        // return redirect(route('BN_posts_detail', ['id' => $request->id]));
    }

    public function BN_posts_excelpostsell()
    {
        return view('backend/posts-excelpostsell-add');
    }

    public function BN_posts_excelpostsell_store(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            $fileName = uniqid() . '_' . $request->file('excel_file')->getClientOriginalName();
            $request->file('excel_file')->move(public_path('uploads/temp'), $fileName);
            $path = public_path('uploads/temp/' . $fileName);
            $spreadsheet = IOFactory::load($path);
    
            $worksheetName = 'input';
            $worksheet = $spreadsheet->getSheetByName($worksheetName);
            
            ini_set ( 'max_execution_time', 1200); 
            $row = 3;
            $error = [];
            while (
                $worksheet->getCell('A' . $row)->getValue() != "" ||
                $worksheet->getCell('A' . $row+1)->getValue() != "" ||
                $worksheet->getCell('A' . $row+2)->getValue() != "" ||
                $worksheet->getCell('A' . $row+3)->getValue() != "" ||
                $worksheet->getCell('A' . $row+4)->getValue() != "" ||
                $worksheet->getCell('A' . $row+5)->getValue() != ""
                ) {
                $cellValueA = $worksheet->getCell('A' . $row)->getValue();
                if (empty($cellValueA)) {
                    array_push($error, 'A' . $row);
                }
                else {
                    $qrycustomer = Customer::where("phone", $cellValueA)->first();
                    if (empty($qrycustomer)) {
                        array_push($error, 'A' . $row);
                    }
                    else {
                        $customer_id = $qrycustomer->id;
                        $cellValueB = $worksheet->getCell('B' . $row)->getValue();
                        if (empty($cellValueB)) {
                            array_push($error, 'B' . $row);
                        }
                        else {
                            $qrybrand = brandsModel::where("title", $cellValueB)->first();
                            if (empty($qrybrand)) {
                                array_push($error, 'B' . $row);
                            }
                            else {
                                $brand_id = $qrybrand->id;
                                $cellValueC = $worksheet->getCell('C' . $row)->getValue();
                                if (empty($cellValueC)) {
                                    array_push($error, 'C' . $row);
                                }
                                else {
                                    $qrymodel = modelsModel::where("brand_id", $brand_id)->where("model", $cellValueC)->first();
                                    if (empty($qrymodel)) {
                                        array_push($error, 'C' . $row);
                                    }
                                    else {
                                        $model_id = $qrymodel->id;
                                        $cellValueD = $worksheet->getCell('D' . $row)->getValue();
                                        if (empty($cellValueD)) {
                                            array_push($error, 'D' . $row);
                                        }
                                        else {
                                            $qrygenerations = generationsModel::where("models_id", $model_id)->where("generations", $cellValueD)->first();
                                            if (empty($qrygenerations)) {
                                                array_push($error, 'D' . $row);
                                            }
                                            else {
                                                $generations_id = $qrygenerations->id;
                                                $cellValueE = $worksheet->getCell('E' . $row)->getValue();
                                                if (empty($cellValueE)) {
                                                    array_push($error, 'E' . $row);
                                                }
                                                else {
                                                    $qrysubmodel = sub_modelsModel::where("generations_id", $generations_id)->where("sub_models", $cellValueE)->first();
                                                    if (empty($qrysubmodel)) {
                                                        array_push($error, 'E' . $row);
                                                    }
                                                    else {
                                                        $sub_models_id = $qrysubmodel->id;
                                                        $cellValueF = $worksheet->getCell('F' . $row)->getValue();
                                                        if (empty($cellValueF)) {
                                                            $cellValueG = $worksheet->getCell('G' . $row)->getValue();
                                                            if (empty($cellValueG)) {
                                                                array_push($error, 'F' . $row);
                                                            }
                                                            else {
                                                                $color = $cellValueG;
                                                                $cellValueH = $worksheet->getCell('H' . $row)->getValue();
                                                                if (empty($cellValueH)) {
                                                                    array_push($error, 'H' . $row);
                                                                }
                                                                else {
                                                                    $modelyear = $cellValueH;
                                                                    $cellValueI = $worksheet->getCell('I' . $row)->getValue();
                                                                    if (empty($cellValueI)) {
                                                                        array_push($error, 'I' . $row);
                                                                    }
                                                                    else {
                                                                        $mileage = $cellValueI;
                                                                        $cellValueJ = $worksheet->getCell('J' . $row)->getValue();
                                                                        if ($cellValueJ == "ออโต้") {
                                                                            $gear = "auto";
                                                                        }
                                                                        else {
                                                                            $gear = "manual";
                                                                        }
                                                                        $cellValueK = $worksheet->getCell('K' . $row)->getValue();
                                                                        if (empty($cellValueK)) {
                                                                            array_push($error, 'K' . $row);
                                                                        }
                                                                        else {
                                                                            $gas = $cellValueK;
                                                                            $cellValueL = $worksheet->getCell('L' . $row)->getValue();
                                                                            $vehicle_code = $cellValueL;
                                                                            $cellValueM = $worksheet->getCell('M' . $row)->getValue();
                                                                            if (empty($cellValueM)) {
                                                                                array_push($error, 'M' . $row);
                                                                            }
                                                                            else {
                                                                                $province = $cellValueM;
                                                                                $cellValueN = $worksheet->getCell('N' . $row)->getValue();
                                                                                if (empty($cellValueN)) {
                                                                                    array_push($error, 'N' . $row);
                                                                                }
                                                                                else {
                                                                                    $title = $cellValueN;
                                                                                    $cellValueO = $worksheet->getCell('O' . $row)->getValue();
                                                                                    $detail = $cellValueO;
                                                                                    $cellValueP = $worksheet->getCell('P' . $row)->getValue();
                                                                                    if (empty($cellValueP)) {
                                                                                        array_push($error, 'N' . $row);
                                                                                    }
                                                                                    else {
                                                                                        $price = $cellValueP;
                                                                                        $cellValueQ = $worksheet->getCell('Q' . $row)->getValue();
                                                                                        if (empty($cellValueQ)) {
                                                                                            array_push($error, 'Q' . $row);
                                                                                        }
                                                                                        else {
                                                                                            if ($cellValueQ == "รถบ้าน / เจ้าของรถขายเอง") {
                                                                                                $type_name = "home";
                                                                                            }
                                                                                            else if ($cellValueQ == "ดีลเลอร์ / ลงแบบฝากขาย") {
                                                                                                $type_name = "dealer";
                                                                                            }
                                                                                            else {
                                                                                                $type_name = "lady";
                                                                                            }
                                                                                            $cellValueR = $worksheet->getCell('R' . $row)->getValue();
                                                                                            if ($cellValueR == "มี"){
                                                                                                $warranty_1 = 1;
                                                                                            }
                                                                                            else {
                                                                                                $warranty_1 = 0;
                                                                                            }
                                                                                            $cellValueS = $worksheet->getCell('S' . $row)->getValue();
                                                                                            if ($cellValueS == "มี"){
                                                                                                $warranty_2 = 1;
                                                                                            }
                                                                                            else {
                                                                                                $warranty_2 = 0;
                                                                                            }
                                                                                            $cellValueT = $worksheet->getCell('T' . $row)->getValue();
                                                                                            $warranty_2_input = $cellValueT;
                                                                                            $cellValueU = $worksheet->getCell('U' . $row)->getValue();
                                                                                            $warranty_3 = $cellValueU;
                                                                                            if ($cellValueU == "มี"){
                                                                                                $warranty_3 = 1;
                                                                                            }
                                                                                            else {
                                                                                                $warranty_3 = 0;
                                                                                            }
                                                                                            $cars_data = [
                                                                                                "customer_id"       => $customer_id,
                                                                                                "user_id"           => Auth::user()->id,
                                                                                                "type"              => $type_name,
                                                                                                "title"             => $title,
                                                                                                "brand_id"          => $brand_id,
                                                                                                "model_id"          => $model_id,
                                                                                                "generations_id"    => $generations_id,
                                                                                                "sub_models_id"     => $sub_models_id,
                                                                                                "modelyear"         => $modelyear,
                                                                                                "vehicle_code"      => $vehicle_code,
                                                                                                "gear"              => $gear,
                                                                                                "color"             => $color,
                                                                                                "price"             => $price,
                                                                                                "province"          => $province,
                                                                                                "gas"               => $gas,
                                                                                                "mileage"           => $mileage,
                                                                                                "status"            => "created",
                                                                                                "detail"            => $detail,
                                                                                                "ref_code"          => null,
                                                                                                "warranty_1"        => $warranty_1,
                                                                                                "warranty_2"        => $warranty_2,
                                                                                                "warranty_2_input"  => $warranty_2_input,
                                                                                                "warranty_3"        => $warranty_3
                                                                                            ];
                                                                                            $topcreate = carsModel::create($cars_data);
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        else {
                                                            $color = $cellValueF;
                                                            $cellValueH = $worksheet->getCell('H' . $row)->getValue();
                                                            if (empty($cellValueH)) {
                                                                array_push($error, 'H' . $row);
                                                            }
                                                            else {
                                                                $modelyear = $cellValueH;
                                                                $cellValueI = $worksheet->getCell('I' . $row)->getValue();
                                                                if (empty($cellValueI)) {
                                                                    array_push($error, 'I' . $row);
                                                                }
                                                                else {
                                                                    $mileage = $cellValueI;
                                                                    $cellValueJ = $worksheet->getCell('J' . $row)->getValue();
                                                                    if ($cellValueJ == "ออโต้") {
                                                                        $gear = "auto";
                                                                    }
                                                                    else {
                                                                        $gear = "manual";
                                                                    }
                                                                    $cellValueK = $worksheet->getCell('K' . $row)->getValue();
                                                                    if (empty($cellValueK)) {
                                                                        array_push($error, 'K' . $row);
                                                                    }
                                                                    else {
                                                                        $gas = $cellValueK;
                                                                        $cellValueL = $worksheet->getCell('L' . $row)->getValue();
                                                                        $vehicle_code = $cellValueL;
                                                                        $cellValueM = $worksheet->getCell('M' . $row)->getValue();
                                                                        if (empty($cellValueM)) {
                                                                            array_push($error, 'M' . $row);
                                                                        }
                                                                        else {
                                                                            $province = $cellValueM;
                                                                            $cellValueN = $worksheet->getCell('N' . $row)->getValue();
                                                                            if (empty($cellValueN)) {
                                                                                array_push($error, 'N' . $row);
                                                                            }
                                                                            else {
                                                                                $title = $cellValueN;
                                                                                $cellValueO = $worksheet->getCell('O' . $row)->getValue();
                                                                                $detail = $cellValueO;
                                                                                $cellValueP = $worksheet->getCell('P' . $row)->getValue();
                                                                                if (empty($cellValueP)) {
                                                                                    array_push($error, 'N' . $row);
                                                                                }
                                                                                else {
                                                                                    $price = $cellValueP;
                                                                                    $cellValueQ = $worksheet->getCell('Q' . $row)->getValue();
                                                                                    if (empty($cellValueQ)) {
                                                                                        array_push($error, 'Q' . $row);
                                                                                    }
                                                                                    else {
                                                                                        if ($cellValueQ == "รถบ้าน / เจ้าของรถขายเอง") {
                                                                                            $type_name = "home";
                                                                                        }
                                                                                        else if ($cellValueQ == "ดีลเลอร์ / ลงแบบฝากขาย") {
                                                                                            $type_name = "dealer";
                                                                                        }
                                                                                        else {
                                                                                            $type_name = "lady";
                                                                                        }
                                                                                        $cellValueR = $worksheet->getCell('R' . $row)->getValue();
                                                                                        if ($cellValueR == "มี"){
                                                                                            $warranty_1 = 1;
                                                                                        }
                                                                                        else {
                                                                                            $warranty_1 = 0;
                                                                                        }
                                                                                        $cellValueS = $worksheet->getCell('S' . $row)->getValue();
                                                                                        if ($cellValueS == "มี"){
                                                                                            $warranty_2 = 1;
                                                                                        }
                                                                                        else {
                                                                                            $warranty_2 = 0;
                                                                                        }
                                                                                        $cellValueT = $worksheet->getCell('T' . $row)->getValue();
                                                                                        $warranty_2_input = $cellValueT;
                                                                                        $cellValueU = $worksheet->getCell('U' . $row)->getValue();
                                                                                        $warranty_3 = $cellValueU;
                                                                                        if ($cellValueU == "มี"){
                                                                                            $warranty_3 = 1;
                                                                                        }
                                                                                        else {
                                                                                            $warranty_3 = 0;
                                                                                        }
                                                                                        $cars_data = [
                                                                                            "customer_id"       => $customer_id,
                                                                                            "user_id"           => Auth::user()->id,
                                                                                            "type"              => $type_name,
                                                                                            "title"             => $title,
                                                                                            "brand_id"          => $brand_id,
                                                                                            "model_id"          => $model_id,
                                                                                            "generations_id"    => $generations_id,
                                                                                            "sub_models_id"     => $sub_models_id,
                                                                                            "modelyear"         => $modelyear,
                                                                                            "vehicle_code"      => $vehicle_code,
                                                                                            "gear"              => $gear,
                                                                                            "color"             => $color,
                                                                                            "price"             => $price,
                                                                                            "province"          => $province,
                                                                                            "gas"               => $gas,
                                                                                            "mileage"           => $mileage,
                                                                                            "status"            => "created",
                                                                                            "detail"            => $detail,
                                                                                            "ref_code"          => null,
                                                                                            "warranty_1"        => $warranty_1,
                                                                                            "warranty_2"        => $warranty_2,
                                                                                            "warranty_2_input"  => $warranty_2_input,
                                                                                            "warranty_3"        => $warranty_3
                                                                                        ];
                                                                                        $bottomcreate = carsModel::create($cars_data);
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $row++;
            }
            return redirect(route('BN_posts'))->with('failed', $error);
        } else {
            return redirect()->back()->with('error', 'Please select file to update');
        }
    }
}
