<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\brandsModel;
use App\Models\modelsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;
use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BrandsController extends Controller
{

    public function BN_car(Request $request)
    {
        $brands = brandsModel::orderBy('title', 'asc')->get();

        // $query = brandsModel::query()
        //     ->select('brands.id as brands_id', 'models.id as models_id', 'generations.id as generations_id', 'sub_models.id as sub_models_id',
        //             'brands.title as brands_name', 'models.model as models_name', 'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
        //     ->leftJoin('models', 'models.brand_id', '=', 'brands.id')
        //     ->leftJoin('generations', 'generations.models_id', '=', 'models.id')
        //     ->leftJoin('sub_models', 'sub_models.generations_id', '=', 'generations.id')
        //     ->orderBy('brands_name')
        //     ->orderBy('models_name')
        //     ->orderBy('generations_name')
        //     ->orderBy('sub_models_name');

        // if ($request->filled('brand')) {
        //     $brand = $request->input('brand');
        //     $query->where('models.brand_id', '=', $brand);
        // }

        // $resultPerPage = 48;
        // $query = $query->paginate($resultPerPage);

        $myquery = brandsModel::query()
            ->select('brands.id as brands_id', 'models.id as models_id', 'generations.id as generations_id', 'sub_models.id as sub_models_id',
                'brands.title as brands_name', 'models.model as models_name', 'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->leftJoin('models', 'models.brand_id', '=', 'brands.id')
            ->leftJoin('generations', 'generations.models_id', '=', 'models.id')
            ->leftJoin('sub_models', 'sub_models.generations_id', '=', 'generations.id');

        if ($request->filled('brand')) {
            $brand = $request->input('brand');
            $myquery->where('models.brand_id', '=', $brand);
        }

        $totalCount = $myquery->count(); // นับทั้งหมดของแถวโดยไม่ใช้การแบ่งหน้า

        $resultPerPage = 48;
        $query = $myquery->orderBy('brands_name')
            ->orderBy('models_name')
            ->orderBy('generations_name')
            ->orderBy('sub_models_name')
            ->paginate($resultPerPage);

        return view('backend/car', [ 
            'default_pagename' => 'ข้อมูลรถ',
            'brands' => $brands,
            'query' => $query,
            'totalCount' => $totalCount,
        ]);
    }








    public function BN_brands(Request $request)
    {
        $query = brandsModel::query()
            ->orderBy('title', 'asc');
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%');
                    // ->orWhere('customer.lastname', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/brands', [ 
            'default_pagename' => 'ยี่ห้อรถ',
            'query' => $query,
        ]);
    }
    public function BN_brands_add(Request $request)
    {
        return view('backend/brands-add', [ 
            'default_pagename' => 'เพิ่มยี่ห้อรถ',
        ]);
    }
    public function BN_brands_add_action(Request $request)
    {
        $brands = new brandsModel;

        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'logo-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $brands->feature = $filepath;
        }

        $brands->title = $request->title;
        $brands->excerpt = $request->excerpt;
        $brands->content = $request->content;
        $brands->user_id = $request->user_id;
        $brands->save();

        return redirect(route('BN_brands'))->with('success', 'เพิ่มสำเร็จ !');
    }
    public function BN_brands_edit(Request $request, $id)
    {
        $brands = brandsModel::find($id);
        return view('backend/brands-edit', [ 
            'default_pagename' => 'แก้ไขยี่ห้อรถ',
            'brands' => $brands,
        ]);
    }
    public function BN_brands_edit_action(Request $request)
    {
        $brands = brandsModel::find($request->id);

        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'logo-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $brands->feature = $filepath;
        }

        $brands->title = $request->title;
        $brands->excerpt = $request->excerpt;
        $brands->content = $request->content;
        $brands->user_id = $request->user_id;
        $brands->update();

        return redirect(route('BN_brands'))->with('success', 'แก้ไขสำเร็จ !');
    }
    public function BN_brandsFetch()
    {
        $query = brandsModel::all()->sort();
        $output = '';
        if($query->count() > 0){
            foreach($query as $key => $res){
                ?>
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-2 xl:col-span-2">
                    <div class="box">
                        <div class="p-3">
                            <div class="image-fit h-40 overflow-hidden rounded-md before:absolute before:top-0 before:left-0 before:z-10 before:block before:h-full before:w-full before:bg-gradient-to-t before:from-black before:to-black/10 2xl:h-56">
                                <img class="rounded-md" src="<?php echo asset($res->feature) ?>" alt="rodpromtkai-<?php echo $res->title ?>">
                            </div>
                            <div class="mt-5 text-slate-600 dark:text-slate-500">
                                <div class="flex items-center">
                                    <?php echo strtoupper($res->title) ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-center border-t border-slate-200/60 p-5 dark:border-darkmode-400 lg:justify-end">
                            <a class="mr-auto flex items-center text-primary" href="<?php echo route('BN_brands_preview', ['id' => $res->id]); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye stroke-1.5 mr-1 h-4 w-4"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg> 
                            </a>
                            <a class="mr-3 flex items-center" href="<?php echo route('BN_brands_edit', ['id' => $res->id]); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit
                            </a>
                            <!-- <a class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash stroke-1.5 mr-1 h-4 w-4"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg> Delete
                            </a> -->
                        </div>
                    </div>
                </div>
                <?php
            }  
        }else{
            echo "Not Found!!!";
        }
    }
    public function BN_brands_preview(Request $request, $id)
    {
        $brands = brandsModel::find($id);
        return view('backend/brands-preview', [ 
            'default_pagename' => 'ตัวอย่างบทความ',
            'brands' => $brands,
        ]);
    }

    public function BN_excelcars_add()
    {
        return view('backend/brands-excelcars-add');
    }

    public function BN_excelcars_store(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            $fileName = uniqid() . '_' . $request->file('excel_file')->getClientOriginalName();
            $request->file('excel_file')->move(public_path('uploads/temp'), $fileName);
            $path = public_path('uploads/temp/' . $fileName);
            $spreadsheet = IOFactory::load($path);
    
            $worksheetName = 'ยี่ห้อรถ';
            $worksheet = $spreadsheet->getSheetByName($worksheetName);
            
            $brand_title = "";
            $model_name = "";
            $generations_name = "";
            $yearfirst = 2004;
            $yearlast = 2012;
            $sub_models_name = "";
            $sort_no = null;
            $evtype = 0;

            ini_set ( 'max_execution_time', 1200); 
            $row = 2;
            while (
                $worksheet->getCell('F' . $row)->getValue() != "" ||
                $worksheet->getCell('F' . $row+1)->getValue() != "" ||
                $worksheet->getCell('F' . $row+2)->getValue() != "" ||
                $worksheet->getCell('F' . $row+3)->getValue() != "" ||
                $worksheet->getCell('F' . $row+4)->getValue() != "" ||
                $worksheet->getCell('F' . $row+5)->getValue() != ""
                ) {
                $cellValueA = $worksheet->getCell('A' . $row)->getValue();
                if (empty($cellValueA)) {
                    $brand_title = $brand_title;
                }
                else {
                    $brand_title = $cellValueA;
                }
                $cellValueG = $worksheet->getCell('G' . $row)->getValue();
                if (empty($cellValueG)) {
                    $sort_no = null;
                }
                else {
                    $sort_no = $cellValueG;
                }
                $qrybrand = brandsModel::where("title", $brand_title)->first();
                if (empty($qrybrand)) {
                    $brand_data = [
                        "title"     => $brand_title,
                        "user_id"   => Auth::user()->id,
                        "sort_no"   => $sort_no
                    ];
                    $brand = brandsModel::create($brand_data);
                    $brand_id = $brand->id;
                }
                else {
                    $brand_id = $qrybrand->id;
                }
                $cellValueB = $worksheet->getCell('B' . $row)->getValue();
                if (empty($cellValueB)) {
                    $model_name = $model_name;
                }
                else {
                    $model_name = $cellValueB;
                }
                $cellValueH = $worksheet->getCell('H' . $row)->getValue();
                if (empty($cellValueH)) {
                    $evtype = 0;
                }
                else {
                    $evtype = 1;
                }
                $qrymodel = modelsModel::where("brand_id", $brand_id)->where("model", $model_name)->first();
                if (empty($qrymodel)) {
                    $model_data = [
                        "brand_id"      => $brand_id,
                        "model"         => $model_name,
                        "evtype"        => $evtype
                    ];
                    $model = modelsModel::create($model_data);
                    $model_id = $model->id;
                }
                else {
                    $model_id = $qrymodel->id;
                }
                $cellValueC = $worksheet->getCell('C' . $row)->getValue();
                
                if (empty($cellValueC)) {
                    $generations_name = $generations_name;
                }
                else {
                    $generations_name = $cellValueC;
                }
                
                $cellValueD = $worksheet->getCell('D' . $row)->getValue();
                if (empty($cellValueD)) {
                    $yearfirst = $yearfirst;
                }
                else {
                    $yearfirst = $cellValueD;
                }
                
                $cellValueE = $worksheet->getCell('E' . $row)->getValue();
                if (empty($cellValueE)) {
                    $yearlast = $yearlast;
                }
                else {
                    $yearlast = $cellValueE;
                }
                $qrygenerations = generationsModel::where("models_id", $model_id)->where("generations", $generations_name)->where("yearfirst", $yearfirst)->where("yearlast", $yearlast)->first();
                if (empty($qrygenerations)) {
                    $generations_data = [
                        "models_id"     => $model_id,
                        "generations"   => $generations_name,
                        "yearfirst"     => $yearfirst,
                        "yearlast"      => $yearlast
                    ];
                    $generations = generationsModel::create($generations_data);
                    $generations_id = $generations->id;
                }
                else {
                    $generations_id = $qrygenerations->id;
                }
                $cellValueF = $worksheet->getCell('F' . $row)->getValue();
                if (empty($cellValueF)) {
                    $sub_models_name = $sub_models_name;
                }
                else {
                    $sub_models_name = $cellValueF;
                }
                $qrysubmodel = sub_modelsModel::where("generations_id", $generations_id)->where("sub_models", $sub_models_name)->first();
                if (empty($qrysubmodel)) {
                    $submodel_data = [
                        "generations_id"    => $generations_id,
                        "sub_models"        => $sub_models_name
                    ];
                    $submodel = sub_modelsModel::create($submodel_data);
                    $submodel_id = $submodel->id;
                }
                else {
                    $submodel_id = $qrysubmodel->id;
                }
                $row++;
            }
            return redirect(route('BN_car'));
        } else {
            return redirect()->back()->with('error', 'Please select file to update');
        }
    }
}
