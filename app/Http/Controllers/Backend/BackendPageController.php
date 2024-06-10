<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\image_blur;
use App\Models\image_watermark;
use App\Models\image_mosaic;

use App\Models\OptionsModel;

use Intervention\Image\Facades\Image;

class BackendPageController extends Controller
{
    public function backendDashboard()
    {
        return view('backend/backend-dashboard', [
            'default_pagename' => 'แดชบอร์ด',
        ]);
    }













    public function BN_settings_defaultprice(Request $request)
    {
        $price_th = OptionsModel::where('option_key', 'price_th')->first();
        $price_en = OptionsModel::where('option_key', 'price_en')->first();

        return view('backend/setting-defaultprice', [
            'default_pagename' => 'defaultprice',
            'price_th' => $price_th ? $price_th->option_value : 0,
            'price_en' => $price_en ? $price_en->option_value : 0,
        ]);
    }


    public function BN_settings_defaultprice_action(Request $request)
    {
        if(isset($request->price_th)){
            OptionsModel::where('option_key', 'price_th')->update(['option_value' => $request->price_th]);
        }
        if(isset($request->price_en)){
            OptionsModel::where('option_key', 'price_en')->update(['option_value' => $request->price_en]);
        }
        return redirect()->back()->with('success', 'อัพเดทสำเร็จ !');
    }







    public function bn_mosaic()
    {
        $image_mosaic = image_mosaic::query()
        ->orderBy('id', 'desc')
        ->paginate(8);

        return view('backend/backend-mosaic', [
            'default_pagename' => 'mosaic',
            'image_mosaic' => $image_mosaic,
        ]);
    }
    public function bn_mosaic_upload(Request $request)
    {
        
        if($request->hasFile('path')){

            
            

            $image_mosaic = new image_mosaic;

            $file = $request->file('path');
            $destinationPath = public_path('/uploads/mosaic');
            $filename = $file->getClientOriginalName();
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = uniqid().time().'-mosaic'.'.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/mosaic/'.$newfilenam;


            


            $image = Image::make(public_path('/uploads/mosaic/'.$newfilenam));

            $x = 0;
            $y = 0;
            $width = $image->width();
            $height = $image->height();
            $blockSize = 10;

            $path_bs10 = '';
            $path_bs30 = '';
            $path_bs50 = '';
            $path_bs70 = '';

            // for($bs=10;$bs<=15;$bs+5){
                
                

                // $path_bs10 = ($bs==10)?$filepath_mosaic:$path_bs10;
                // $path_bs30 = ($bs==15)?$filepath_mosaic:$path_bs30;
                // $path_bs50 = ($bs==20)?$filepath_mosaic:$path_bs50;
                // $path_bs70 = ($bs==70)?$filepath_mosaic:$path_bs70;
            // }


            $croppedImage = $image->crop($width, $height, $x, $y);
                $mosaicImage = $croppedImage->resize($width / $blockSize, $height / $blockSize);
                $mosaicImage = $mosaicImage->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->insert($mosaicImage, 'top-left', $x, $y);
                $name_mosaic = uniqid().time().'-result-mosaic'.'.' .$ext;
                $image->save(public_path('/uploads/mosaic/'.$name_mosaic)); 
                $filepath_mosaic = 'uploads/mosaic/'.$name_mosaic;

            


            

            // $x = ($img->width() - $watermark->width()) / 2;
            // $y = ($img->height() - $watermark->height()) / 2;


            $image_mosaic->path = $filepath;
            $image_mosaic->result = $filepath_mosaic;
            // $image_mosaic->bs30 = $path_bs30;
            // $image_mosaic->bs50 = $path_bs50;
            // $image_mosaic->bs70 = $path_bs70;

            $image_mosaic->save();

            return redirect()->back()->with('success', 'Upload Complete!');
        }
    }


    public function bn_watermark()
    {
        $image_watermark = image_watermark::query()
        ->orderBy('id', 'desc')
        ->paginate(8);

        return view('backend/backend-watermark', [
            'default_pagename' => 'watermark',
            'image_watermark' => $image_watermark,
        ]);
    }
    public function bn_watermark_upload(Request $request)
    {
        // dd($request);
        if($request->hasFile('path')  &&  $request->hasFile('watermark')){

            $image_watermark = new image_watermark;

            $file = $request->file('path');
            $destinationPath = public_path('/uploads/watermark');
            $filename = $file->getClientOriginalName();
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = uniqid().time().'-watermark'.'.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/watermark/'.$newfilenam;


            $file2 = $request->file('watermark');
            $destinationPath2 = public_path('/uploads/watermark');
            $filename2 = $file->getClientOriginalName();
            $ext2 = strtolower(pathinfo($filename2, PATHINFO_EXTENSION));
            $newfilenam2 = uniqid().time().'-watermark-topup'.'.' .$ext2;
            $file2->move($destinationPath2, $newfilenam2);
            $filepath2 = 'uploads/watermark/'.$newfilenam2;

            $img = Image::make(public_path('/uploads/watermark/'.$newfilenam));
            $watermark = Image::make(public_path('/uploads/watermark/'.$newfilenam2));

            $x = ($img->width() - $watermark->width()) / 2;
            $y = ($img->height() - $watermark->height()) / 2;
            $img->insert($watermark, 'top-left', $x, $y);

            $name_watermark = uniqid().time().'-result-watermark'.'.' .$ext;
            $img->save(public_path('/uploads/watermark/'.$name_watermark)); 
            $filepath_watermark = 'uploads/watermark/'.$name_watermark;

            $image_watermark->path = $filepath;
            $image_watermark->watermark = $filepath2;
            $image_watermark->result = $filepath_watermark;

            $image_watermark->save();

            return redirect()->back()->with('success', 'Upload Complete!');
        }
    }

    


    public function bn_blur()
    {
        $image_blur = image_blur::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(8);

        return view('backend/backend-blur', [
            'default_pagename' => 'blur',
            'image_blur' => $image_blur,
        ]);
    }
    public function bn_blur_upload(Request $request)
    {
        // dd($request);

        $image_blur = new image_blur;

        if($request->hasFile('path')){

            // $oldPath = public_path($Customer->path);
            // if(File::exists($oldPath)){
            //     File::delete($oldPath);
            // }

            $file = $request->file('path');
            $destinationPath = public_path('/uploads/blur');
            $filename = $file->getClientOriginalName();
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = uniqid().time().'-path'.'.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/blur/'.$newfilenam;


            $img = Image::make(public_path('/uploads/blur/'.$newfilenam));
            $img->blur(20); // You can adjust the blur level as needed
            $name_blur20 = uniqid().time().'-blur20'.'.' .$ext;
            $img->save(public_path('/uploads/blur/'.$name_blur20)); 
            $filepath_blur20 = 'uploads/blur/'.$name_blur20;

            // $img = Image::make(public_path('/uploads/blur/'.$newfilenam));
            // $img->blur(40); // You can adjust the blur level as needed
            // $name_blur40 = uniqid().time().'-blur40'.'.' .$ext;
            // $img->save(public_path('/uploads/blur/'.$name_blur40)); 
            // $filepath_blur40 = 'uploads/blur/'.$name_blur40;

            $img = Image::make(public_path('/uploads/blur/'.$newfilenam));
            $img->blur(60); // You can adjust the blur level as needed
            $name_blur60 = uniqid().time().'-blur60'.'.' .$ext;
            $img->save(public_path('/uploads/blur/'.$name_blur60)); 
            $filepath_blur60 = 'uploads/blur/'.$name_blur60;

            $img = Image::make(public_path('/uploads/blur/'.$newfilenam));
            $img->blur(90); // You can adjust the blur level as needed
            $name_blur80 = uniqid().time().'-blur80'.'.' .$ext;
            $img->save(public_path('/uploads/blur/'.$name_blur80)); 
            $filepath_blur80 = 'uploads/blur/'.$name_blur80;





            $image_blur->path = $filepath;
            $image_blur->blur20 = $filepath_blur20;
            // $image_blur->blur40 = $filepath_blur40;
            $image_blur->blur60 = $filepath_blur60;
            $image_blur->blur80 = $filepath_blur80;

            $image_blur->save();

            return redirect()->back()->with('success', 'Upload Complete!');
        }


            

        // return view('backend/backend-blur', [
        //     'default_pagename' => 'blur',
        // ]);
    }


    
    


    
    
}
