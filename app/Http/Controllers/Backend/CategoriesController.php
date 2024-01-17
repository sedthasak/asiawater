<?php

// namespace App\Http\Controllers\Backend;

// use App\Http\Controllers\Controller;
// use App\Http\Controllers\LogsSaveController;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Request;


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Customer;
use App\Models\provincesModel;
use App\Models\categoriesModel;

class CategoriesController extends Controller
{
    public function BN_categories()
    {
        return view('backend/categories', [ 
            'default_pagename' => 'หมวดหมู่',
            
        ]);
    }
    public function BN_categories_add(Request $request)
    {
        return view('backend/categories-add', [ 
            'default_pagename' => 'เพิ่มหมวดหมู่',
        ]);
    }
    public function BN_categories_add_action(Request $request)
    {
        $categories = new categoriesModel;

        $file = $request->file('feature');
        $destinationPath = public_path('/uploads');
        $filename = $file->getClientOriginalName();

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $newfilenam = time() . '.' .$ext;
        $file->move($destinationPath, $newfilenam);
        $filepath = 'uploads/'.$newfilenam;
        
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->feature = $filepath;
        $categories->save();

        if(isset($categories->id)){
            $usersavelog = auth()->user();
            $idsavelog = auth()->user()->id; 
            $emailsavelog = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $categories->id,
                'remark' => 'User '.$idsavelog.' Create new Category!',
                'event' => 'create category',
            );
            $result = (new LogsSaveController)->create_log($para);
        }

        return redirect(route('BN_categories'));

    }
    public function BN_categoriesFetch()
    {
        $query = categoriesModel::all()->sort();
        $output = '';
        if($query->count() > 0){
            ?>
                <div class="grid gap-6 mt-5 p-5 box">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="">
                                <tr class="">
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">ชื่อ</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">คำอธิบาย</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">รูปภาพ</td>
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
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->name ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->description ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                        <img width="150" src="<?php echo url($res->feature) ?>" />
                                    </td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><a href="<?php echo route('BN_categories_edit', ['id' => $res->id]); ?>">แก้ไข</a></td>
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
    public function BN_categories_edit(Request $request, $id)
    {
        $categories = categoriesModel::find($id);
        return view('backend/categories-edit', [ 
            'default_pagename' => 'แก้ไขหมวดหมู่',
            'categories' => $categories,
        ]);
    }
    public function BN_categories_edit_action(Request $request)
    {
        $categories = categoriesModel::find($request->id);
        if($request->hasFile('feature')){


            if(isset($categories->feature)){
                $oldPath = public_path($categories->feature);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }


            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;

            $categories->feature = $filepath;
        }
        
        $categories->name = $request->name;
        $categories->description = $request->description;
        
        $categories->update();

        if(isset($categories->id)){
            $usersavelog = auth()->user();
            $idsavelog = auth()->user()->id; 
            $emailsavelog = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $categories->id,
                'remark' => 'User '.$idsavelog.' Update Category!',
                'event' => 'update category',
            );
            $result = (new LogsSaveController)->create_log($para);
        }

        return redirect(route('BN_categories', ['id' => $categories->id]));

    }
}
