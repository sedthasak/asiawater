<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sms_session;
use App\Models\provincesModel;
use App\Models\brandsModel;
use App\Models\modelsModel;
use App\Models\carsModel;
use App\Models\galleryModel;
use App\Models\noticeModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;
use Image;

class PostController extends Controller
{

    public function updateClickCount(Request $request, CarsModel $car)
    {
        $car->clickcount += 1;
        $car->save();

        return response()->json(['success' => true]);
    }


    public function carpostdeleteactionPage(Request $request)
    {
        $postId = $request->input('id');

        // Assuming you have a 'carsModel' model
        $car = carsModel::find($postId);

        if (!$car) {
            // Car not found
            return response()->json(['error' => 'Car not found'], 404);
        }

        // Delete the car
        $car->status = 'deleted';
        $car->update();

        // Return a success response
        return response()->json(['message' => 'ลบสำเร็จ']);
    }

    public function carpostregistereditubmitPage(Request $request) {
        ini_set('post_max_size', '500M');
        ini_set('upload_max_filesize', '500M');
        ini_set('memory_limit', '500M');

        // dd($request);

        $cars = carsModel::find($request->post_id);

        $cars->type = $request->type;
        $cars->customer_id = $request->customer_id;
        $cars->brand_id = $request->brands;
        $cars->model_id = $request->models;
        $cars->generations_id = $request->generations;
        $cars->sub_models_id = $request->sub_models;
        $cars->modelyear = $request->years;
        $cars->mileage = $request->mileage;
        if ($request->gear == "auto") {
            $cars->gear = "auto";
        }
        else {
            $cars->gear = "manual";
        }
        if ($request->gashas == "1") {
            $cars->gas = "รถน้ำมัน / hybrid";
            $cars->ev = "0";
        }
        else if ($request->gashas == "2") {
            $cars->gas = "รถไฟฟ้า EV 100%";
            $cars->ev = "1";
        }
        else {
            $cars->gas = "รถติดแก๊ส";
            $cars->ev = "0";
        }
        $cars->vehicle_code = $request->vehicle_code;
        $cars->title = $request->title;
        $cars->detail = $request->detail;
        $cars->price = str_replace(",", "", $request->price);
        $cars->licenseplate = $request->licenseplate;
        if ($request->has('warranty_1')) {
            $cars->warranty_1 = 1;
        }
        else {
            $cars->warranty_1 = 0;
        }
        if ($request->has('warranty_2')) {
            $cars->warranty_2 = 1;
        }
        else {
            $cars->warranty_2 = 0;
        }
        if ($request->has('warranty_3')) {
            $cars->warranty_3 = 1;
        }
        else {
            $cars->warranty_3 = 0;
        }
        $cars->warranty_2_input = $request->warranty_2_input;

        if($request->status == 'approved'){
            $cars->status = 'approved';
        }elseif($request->status == 'rejected'){
            $cars->status = 'created';
        }

        // if($request->customer_type == 'dealer'){
        //     $cars->status = 'approved';
        // }else{
        //     $cars->status = 'created';
        // }
        $cars->color = ($request->color=='9999999999')?$request->other_color:$request->color;
        $cars->province = $request->province;
        $cars->update();

        if($request->picture_feature){

            $string_pieces = explode( ";base64,", $request->picture_feature);
         
            $image_type_pieces = explode( "image/", $string_pieces[0] );
         
            $image_type = $image_type_pieces[1];

            // Decode the base64 string and save the image
            $imageData = base64_decode($string_pieces[1]);
            
            // Generate a unique filename
            $filename = 'feature-'.time() . '.' .$image_type;

            // Define the path where you want to save the image
            $path = public_path('uploads/feature/' . $filename);
            $filepath1 = 'uploads/feature/' . $filename;

            // Save the image to the defined path
            file_put_contents($path, $imageData);
            carsModel::where("id", $cars->id)->update(["feature" => $filepath1]);
        }
        if($request->hasFile('licenseplate')){
            $licenseplate = $request->file('licenseplate');
            $destinationPath = public_path('/uploads/licenseplate');
            $filename = $licenseplate->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'licenseplate-'.time() . '.' .$ext;
            $licenseplate->move($destinationPath, $newfilenam);
            $filepath2 = 'uploads/licenseplate/'.$newfilenam;
            carsModel::where("id", $cars->id)->update(["licenseplate" => $filepath2]);
        }
        

        if($request->picture_exterior){
            $exterior_image = $request->picture_exterior;
            foreach($request->picture_exterior as $keyex => $extr){
                // Decode the base64 string and save the image
                
                $string_pieces = explode( ";base64,", $extr);
            
                $image_type_pieces = explode( "image/", $string_pieces[0] );
            
                $image_type = $image_type_pieces[1];

                $imageData = base64_decode($string_pieces[1]);

                // Generate a unique filename
                $filename = 'exterior-'.$keyex.'-'.time() . '.' .$image_type;

                // Define the path where you want to save the image
                $path = public_path('uploads/exterior/' . $filename);
                $filepath = 'uploads/exterior/' . $filename;

                // Save the image to the defined path
                file_put_contents($path, $imageData);

                $gallery = new galleryModel;
                $gallery->cars_id = $cars->id;
                $gallery->gallery = $filepath;
                $gallery->type = 'exterior';
                $gallery->save();
            }
        }
        if($request->picture_interior){
            $interior_image = $request->picture_interior;
            foreach($request->picture_interior as $keyin => $intr){

                $string_pieces = explode( ";base64,", $intr);
            
                $image_type_pieces = explode( "image/", $string_pieces[0] );
            
                $image_type = $image_type_pieces[1];

                // Decode the base64 string and save the image
                $imageData = base64_decode($string_pieces[1]);

                // Generate a unique filename
                $filename = 'interior-'.$keyin.'-'.time() . '.' .$image_type;

                // Define the path where you want to save the image
                $path = public_path('uploads/interior/' . $filename);
                $filepath = 'uploads/interior/' . $filename;

                // Save the image to the defined path
                file_put_contents($path, $imageData);
                
                $gallery = new galleryModel;
                $gallery->cars_id = $cars->id;
                $gallery->gallery = $filepath;
                $gallery->type = 'interior';
                $gallery->save();
            }
        }

        $cars2 = carsModel::find($cars->id);
        $strtotime = strtotime($cars2->created_at);

        $cars2->ref_code = $strtotime.$cars2->customer_id;
        $cars2->update();


        $notice = noticeModel::where('resource', 'cars')
            ->where('resource_id', $request->post_id)
            ->first();
        $notice->status = 'read';
        $notice->update();

        return redirect(route('carpostregistersuccessPage'));

    }  
    public function carpostregisterSubmitPage(Request $request) {
        ini_set('post_max_size', '500M');
        ini_set('upload_max_filesize', '500M');
        ini_set('memory_limit', '500M');
        // dd($request);
        // $validatedData = $request->validate([
        //     'title' => ['required', 'unique:posts', 'max:255'],
        //     'body' => ['required'],
        // ]);

        // dd($request);
        $cars = new carsModel;

        $cars->type = $request->type;
        $cars->customer_id = $request->customer_id;
        $cars->brand_id = $request->brands;
        $cars->model_id = $request->models;
        $cars->generations_id = $request->generations;
        $cars->sub_models_id = $request->sub_models;
        $cars->modelyear = $request->years;
        $cars->mileage = $request->mileage;
        if ($request->gear == "auto") {
            $cars->gear = "auto";
        }
        else {
            $cars->gear = "manual";
        }
        if ($request->gashas == "1") {
            $cars->gas = "รถน้ำมัน / hybrid";
            $cars->ev = "0";
        }
        else if ($request->gashas == "2") {
            $cars->gas = "รถไฟฟ้า EV 100%";
            $cars->ev = "1";
        }
        else {
            $cars->gas = "รถติดแก๊ส";
            $cars->ev = "0";
        }
        $cars->vehicle_code = $request->vehicle_code;
        $cars->title = $request->title;
        $cars->detail = $request->detail;
        $cars->price = str_replace(",", "", $request->price);
        $cars->licenseplate = $request->licenseplate;
        if ($request->has('warranty_1')) {
            $cars->warranty_1 = 1;
        }
        else {
            $cars->warranty_1 = 0;
        }
        if ($request->has('warranty_2')) {
            $cars->warranty_2 = 1;
        }
        else {
            $cars->warranty_2 = 0;
        }
        if ($request->has('warranty_3')) {
            $cars->warranty_3 = 1;
        }
        else {
            $cars->warranty_3 = 0;
        }
        $cars->warranty_2_input = $request->warranty_2_input;

        if($request->customer_type == 'dealer'){
            $cars->status = 'approved';
            $cars->adddate = time();
            $cars->approvedate = time();
            $cars->expiredate = strtotime("+90 days", time());
        }else{
            $cars->status = 'created';
            $cars->adddate = time();
        }
        $cars->color = ($request->color=='9999999999')?$request->other_color:$request->color;
        $cars->province = $request->province;
        $cars->save();

        if($request->picture_feature){

            $string_pieces = explode( ";base64,", $request->picture_feature);
         
            $image_type_pieces = explode( "image/", $string_pieces[0] );
         
            $image_type = $image_type_pieces[1];

            // Decode the base64 string and save the image
            $imageData = base64_decode($string_pieces[1]);
            
            // Generate a unique filename
            $filename = 'feature-'.time() . '.' .$image_type;

            // Define the path where you want to save the image
            $path = public_path('uploads/feature/' . $filename);
            $filepath1 = 'uploads/feature/' . $filename;

            // Save the image to the defined path
            file_put_contents($path, $imageData);


            // ทำ ลายน้ำ
            $watermarkPath = public_path('frontend/images/watermark.png');
            $imagePath = public_path('uploads/feature'.'/'.$filename);

            $img = Image::make($imagePath);

            // ปรับขนาดของ watermark เท่ากับ ค่าความกว้างของภาพ imageName หาร 10
            $watermark = Image::make($watermarkPath);
            $watermarkWidth = $img->width() / 3;
            $watermark->resize($watermarkWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // เพิ่ม watermark ลงในรูป
            $img->insert($watermark, 'top-left', 40, 60);

            // บันทึกรูปที่มี watermark
            $img->save(public_path('uploads/feature'.'/'.$filename));







            carsModel::where("id", $cars->id)->update(["feature" => $filepath1]);
        }
        if($request->hasFile('licenseplate')){
            $licenseplate = $request->file('licenseplate');
            $destinationPath = public_path('/uploads/licenseplate');
            $filename = $licenseplate->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'licenseplate-'.time() . '.' .$ext;
            $licenseplate->move($destinationPath, $newfilenam);
            $filepath2 = 'uploads/licenseplate/'.$newfilenam;


            // ทำ ลายน้ำ
            $watermarkPath = public_path('frontend/images/watermark.png');
            $imagePath = public_path('uploads/licenseplate'.'/'.$newfilenam);

            $img = Image::make($imagePath);

            // ปรับขนาดของ watermark เท่ากับ ค่าความกว้างของภาพ imageName หาร 10
            $watermark = Image::make($watermarkPath);
            $watermarkWidth = $img->width() / 3;
            $watermark->resize($watermarkWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // เพิ่ม watermark ลงในรูป
            $img->insert($watermark, 'top-left', 40, 60);

            // บันทึกรูปที่มี watermark
            $img->save(public_path('uploads/feature'.'/'.$newfilenam));



            carsModel::where("id", $cars->id)->update(["licenseplate" => $filepath2]);
        }
        

        if($request->picture_exterior){
            $exterior_image = $request->picture_exterior;
            foreach($request->picture_exterior as $keyex => $extr){
                // Decode the base64 string and save the image
                
                $string_pieces = explode( ";base64,", $extr);
            
                $image_type_pieces = explode( "image/", $string_pieces[0] );
            
                $image_type = $image_type_pieces[1];

                $imageData = base64_decode($string_pieces[1]);

                // Generate a unique filename
                $filename = 'exterior-'.$keyex.'-'.time() . '.' .$image_type;

                // Define the path where you want to save the image
                $path = public_path('uploads/exterior/' . $filename);
                $filepath = 'uploads/exterior/' . $filename;

                // Save the image to the defined path
                file_put_contents($path, $imageData);



                // ทำ ลายน้ำ
                $watermarkPath = public_path('frontend/images/watermark.png');
                $imagePath = public_path('uploads/exterior'.'/'.$filename);

                $img = Image::make($imagePath);

                // ปรับขนาดของ watermark เท่ากับ ค่าความกว้างของภาพ imageName หาร 10
                $watermark = Image::make($watermarkPath);
                $watermarkWidth = $img->width() / 3;
                $watermark->resize($watermarkWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // เพิ่ม watermark ลงในรูป
                $img->insert($watermark, 'top-left', 40, 60);

                // บันทึกรูปที่มี watermark
                $img->save(public_path('uploads/exterior'.'/'.$filename));





                $gallery = new galleryModel;
                $gallery->cars_id = $cars->id;
                $gallery->gallery = $filepath;
                $gallery->type = 'exterior';
                $gallery->save();
            }
        }
        if($request->hasFile('interior_pictures')){

            // version 1
            // $interior_image = $request->picture_interior;
            // foreach($request->picture_interior as $keyin => $intr){

            //     $string_pieces = explode( ";base64,", $intr);
            
            //     $image_type_pieces = explode( "image/", $string_pieces[0] );
            
            //     $image_type = $image_type_pieces[1];

            //     // Decode the base64 string and save the image
            //     $imageData = base64_decode($string_pieces[1]);

            //     // Generate a unique filename
            //     $filename = 'interior-'.$keyin.'-'.time() . '.' .$image_type;

            //     // Define the path where you want to save the image
            //     $path = public_path('uploads/interior/' . $filename);
            //     $filepath = 'uploads/interior/' . $filename;

            //     // Save the image to the defined path
            //     file_put_contents($path, $imageData);
                
            //     $gallery = new galleryModel;
            //     $gallery->cars_id = $cars->id;
            //     $gallery->gallery = $filepath;
            //     $gallery->type = 'interior';
            //     $gallery->save();
            // }


            // version 2
            foreach ($request->file('interior_pictures') as $keyin => $image) {
                // บันทึกไฟล์
                $imageName = 'interior-'.$keyin.'-'.time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/interior'), $imageName);


                // ทำ ลายน้ำ
                $watermarkPath = public_path('frontend/images/watermark.png');
                $imagePath = public_path('uploads/interior'.'/'.$imageName);

                $img = Image::make($imagePath);

                // ปรับขนาดของ watermark เท่ากับ ค่าความกว้างของภาพ imageName หาร 10
                $watermark = Image::make($watermarkPath);
                $watermarkWidth = $img->width() / 3;
                $watermark->resize($watermarkWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // เพิ่ม watermark ลงในรูป
                $img->insert($watermark, 'top-left', 40, 60);

                // บันทึกรูปที่มี watermark
                $img->save(public_path('uploads/interior'.'/'.$imageName));


                $gallery = new galleryModel;
                $gallery->cars_id = $cars->id;
                $gallery->gallery = 'uploads/interior/' . $imageName;
                $gallery->type = 'interior';
                $gallery->save();
            }
        }

        $cars2 = carsModel::find($cars->id);
        $strtotime = strtotime($cars2->created_at);

        $cars2->ref_code = $strtotime.$cars2->customer_id;
        $cars2->update();

        return redirect(route('carpostregistersuccessPage'));
    }


    public function carpostSelectBrand(Request $request) {

        $ech = '';
        $query = DB::table('models')->where('brand_id', $request->brands_id)->get();
        if($query){
            $ech .= '<option value="">เลือกรุ่น</option>';
            foreach($query as $key => $res){
                $ech .= '<option value="'.$res->id.'">'.$res->model.'</option>';
            }
        }
        return response()->json($ech);
    }
    public function carpostSelectModel(Request $request) {

        $ech = '';
        $query = DB::table('generations')->where('models_id', $request->models_id)->get();
        if($query){
            $ech = '<option value="">เลือกโฉม</option>';
            foreach($query as $key => $res){
                $ech .= '<option value="'.$res->id.'">'.$res->generations.'</option>';
            }
        }
        return response()->json($ech);
    }
    public function carpostSelectGenerations(Request $request) {

        $ech = '';
        $query = DB::table('sub_models')->where('generations_id', $request->generations_id)->get();
        if($query){
            $ech = '<option value="">เลือกรุ่นย่อย</option>';
            foreach($query as $key => $res){
                $ech .= '<option value="'.$res->id.'">'.$res->sub_models.'</option>';
            }
        }
        return response()->json($ech);
    }
    public function carpostSelectGenerationsYear(Request $request) {

        $ech = '';
        $query = DB::table('generations')->where('id', $request->generations_id)->first();
        if($query){
            $ech = '<option value="">เลือกรุ่นปี</option>';
            for($y=$query->yearlast;$y>=$query->yearfirst;$y--){
                $ech .= '<option value="'.$y.'">'.$y.'</option>';
            }
        }
        return response()->json($ech);
    }

    public function carpostregistersuccessPage()
    {
        $provinces = provincesModel::all();
        $brands = brandsModel::orderBy("sort_no", "ASC")->get();
        // $models = modelsModel::all();
        // $query = DB::table('generations')->where('id', 1)->first();
        return view('frontend/carpost-register-success', [
            'provinces' => $provinces,
            'brands' => $brands,
            // 'query' => $query,
            // 'a' => 'test',
        ]);
    }
    public function carpostregisterPage()
    {
        $provinces = provincesModel::all();
        $brands = brandsModel::orderBy("sort_no", "ASC")->get();
        // $models = modelsModel::all();
        // $query = DB::table('generations')->where('id', 1)->first();
        return view('frontend/carpost-register', [
            'provinces' => $provinces,
            'brands' => $brands,
            // 'query' => $query,
            // 'a' => 'test',
        ]);
    }

    public function carpostregistereditPage(Request $request, $post)
    {
        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('cars.id', $post)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 
                'customer.province as customer_proveince', 'customer.place as customer_place', 
                'customer.map as customer_map', 'customer.google_map as customer_google_map', 
                'customer.phone as customer_phone', 'customer.line as customer_line', 
                'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name',
                'brands.feature as brands_feature')
            ->orderBy('id', 'desc')
            ->first();

        $provinces = provincesModel::all();
        $brands = brandsModel::orderBy("sort_no", "ASC")->get();
        // $models = modelsModel::all();
        // $query = DB::table('generations')->where('id', 1)->first();
        return view('frontend/carpost-register-edit', [
            'mycars' => $mycars,
            'provinces' => $provinces,
            'brands' => $brands,
            // 'query' => $query,
            // 'a' => 'test',
        ]);
    }


    public function carpoststep1Page()
    {
        $provinces = provincesModel::all();
        $brands = brandsModel::orderBy("sort_no", "ASC")->get();
        $models = modelsModel::all();
        return view('frontend/carpost-step1', [
            'provinces' => $provinces,
            'brands' => $brands,
            'models' => $models,
            'a' => 'test',
        ]);
    }

    public function exteriorupload(Request $request) {
        echo "test exteriorupload";
        $file = $request->file('file');
        // $path = $file->store('uploads', 'public');

        // $licenseplate = $request->file('licenseplate');
        $destinationPath = public_path('/uploads/exterior');
        $filename = $file->getClientOriginalName();

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $newfilenam = 'exteriror-'.time() . '.' .$ext;
        $file->move($destinationPath, $newfilenam);
        $filepath2 = 'uploads/exterior/'.$newfilenam;

        return response()->json(['path' => $destinationPath]);
    }
}
