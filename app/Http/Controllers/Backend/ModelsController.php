<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\modelsModel;
use App\Models\brandsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;

class ModelsController extends Controller
{
    public function BN_carmd(Request $request)
    {
        $brands = brandsModel::orderBy('title', 'asc')->get();

        $query = modelsModel::query()
            ->select('models.id as model_id', 'brands.id as brand_id', 'brands.title', 'models.model', 'models.*', 'brands.*')
            ->join('brands', 'models.brand_id', '=', 'brands.id')
            ->orderBy('brands.title', 'asc')
            ->orderBy('models.model', 'asc')
            ->orderBy('models.id', 'desc');

        if ($request->filled('brand')) {
            $brand = $request->input('brand');
            $query->where('models.brand_id', '=', $brand);
        }
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('model', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 48;
        $query = $query->paginate($resultPerPage);



        return view('backend/models', [ 
            'default_pagename' => 'รุ่นรถ',
            'brands' => $brands,
            'query' => $query,
        ]);
    }
    public function BN_carmd_add(Request $request)
    {
        $brands = brandsModel::orderBy('title', 'asc')->get();
        return view('backend/models-add', [ 
            'default_pagename' => 'เพิ่มรุ่นรถ',
            'brands' => $brands,
        ]);
    }
    public function BN_carmd_add_action(Request $request)
    {
        $models = new modelsModel;

        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'model-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $models->feature = $filepath;
        }

        $models->brand_id = $request->brand_id;
        $models->model = $request->model;
        $models->evtype = $request->evtype;
        // $models->submodel = $request->submodel;
        $models->description = $request->description;
        $models->save();

        return redirect(route('BN_carmd'))->with('success', 'เพิ่มสำเร็จ !');

    }
    public function BN_carmd_edit(Request $request, $id)
    {
        $brands = brandsModel::orderBy('title', 'asc')->get();
        $model = modelsModel::find($id);
        return view('backend/models-edit', [ 
            'default_pagename' => 'แก้ไขรุ่นรถ',
            'model' => $model,
            'brands' => $brands,
        ]);
    }
    public function BN_carmd_edit_action(Request $request)
    {
        // dd($request);

        $models = modelsModel::find($request->id);

        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'model-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $models->feature = $filepath;
        }

        $models->brand_id = $request->brand_id;
        $models->model = $request->model;
        $models->evtype = $request->evtype;
        $models->description = $request->description;

        $models->update();

        return redirect(route('BN_carmd'))->with('success', 'อัพเดทสำเร็จ !');
    }
    public function BN_carmdFetch()
    {
        // $query = modelsModel::all()->sort();
        $query = DB::table('models')
            ->join('brands', 'models.brand_id', '=', 'brands.id')
            ->get();

        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
        $output = '';
        if($query->count() > 0){
            ?>
                <div class="grid gap-6 mt-5 p-5 box">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="">
                                <tr class="">
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">ยี่ห้อ</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">รุ่น</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">*</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach($query as $key => $res){
                                $count++;
                                ?>
                                <tr class="">
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $count ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->title ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->model ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"></td>
                                    
                                </tr>
                                <?php
                                }
                                ?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
        }else{
            echo "Not Found!!!";
        }
    }
}
