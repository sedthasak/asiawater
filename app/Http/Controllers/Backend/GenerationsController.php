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

class GenerationsController extends Controller
{
    public function BN_generations(Request $request)
    {

        $query = GenerationsModel::query()
            ->join('models', 'generations.models_id', '=', 'models.id')
            ->join('brands', 'models.brand_id', '=', 'brands.id')
            ->select(
                'generations.id as generations_id',
                'models.id as models_id',
                'brands.id as brands_id',
                'generations.generations as generations_name',
                'models.model as models_name',
                'brands.title as brands_name'
            )
            ->orderBy('brands_name')
            ->orderBy('models_name')
            ->orderBy('generations_name');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('brands.title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('models.model', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('generations.generations', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 48;
        $query = $query->paginate($resultPerPage);

        return view('backend/generations', [ 
            'default_pagename' => 'โฉมรถ',
            'query' => $query,
        ]);
    }
    public function BN_generations_add(Request $request)
    {
        $models = modelsModel::orderBy('model', 'asc')->get();
        return view('backend/generations-add', [ 
            'default_pagename' => 'เพิ่มโฉมรถ',
            'models' => $models,
        ]);
    }
    public function BN_generations_add_action(Request $request)
    {
        $generationsModel = new generationsModel;

        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'generations-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $generationsModel->feature = $filepath;
        }

        $generationsModel->models_id = $request->models_id;
        $generationsModel->generations = $request->generations;
        $generationsModel->yearfirst = $request->yearfirst;
        $generationsModel->yearlast = $request->yearlast;
        $generationsModel->description = $request->description;
        $generationsModel->save();

        return redirect(route('BN_generations'))->with('success', 'เพิ่มสำเร็จ !');

    }
    public function BN_generations_edit(Request $request, $id)
    {
        $models = modelsModel::orderBy('model', 'asc')->get();
        $mygeneration = generationsModel::find($id);
        return view('backend/generations-edit', [ 
            'default_pagename' => 'แก้ไขโฉมรถ',
            'models' => $models,
            'mygeneration' => $mygeneration,
        ]);
    }
    public function BN_generations_edit_action(Request $request)
    {
        $generationsModel = generationsModel::find($request->id);

        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'generations-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $generationsModel->feature = $filepath;
        }

        $generationsModel->models_id = $request->models_id;
        $generationsModel->generations = $request->generations;
        $generationsModel->yearfirst = $request->yearfirst;
        $generationsModel->yearlast = $request->yearlast;
        $generationsModel->description = $request->description;
        $generationsModel->save();

        return redirect(route('BN_generations'))->with('success', 'แก้ไขสำเร็จ !');
    }
    public function BN_generationsFetch()
    {
        $query = DB::table('generations')
            ->join('models', 'generations.models_id', '=', 'models.id')
            ->get();

        $output = '';
        if($query->count() > 0){
            ?>
                <div class="grid gap-6 mt-5 p-5 box">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="">
                                <tr class="">
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">รุ่น</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">โฉม</td>
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
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->model ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->generations ?></td>
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
