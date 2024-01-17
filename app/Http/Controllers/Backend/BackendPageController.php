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
use App\Models\modelsModel;
use App\Models\brandsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;
use App\Models\setFooterModel;
use App\Models\setting_optionModel;

class BackendPageController extends Controller
{

    public function BN_slide()
    {
        $slide = DB::table('setting_option')->where('key_option', 'slide')->first();
        $decde = json_decode($slide->value_option);
        return view('backend/setting-slide', [ 
            'default_pagename' => 'ตั้งค่าแบนเนอร์',
            'slide' => $decde,
            
        ]);
    }
    public function BN_slidedelete(Request $request)
    {
        // dd($request);
        $query = DB::table('setting_option')->where('key_option', 'slide')->first();
        $decde = json_decode($query->value_option);

        // $oldPath = public_path($decde[$request->key]);
        // if(File::exists($oldPath)){
        //     File::delete($oldPath);
        // }
        // if(isset($decde[$request->key])){
        //     $oldPath = public_path($decde[$request->key]);
        //     if(File::exists($oldPath)){
        //         File::delete($oldPath);
        //     }
        // }

        $newarr = [];
        foreach($decde as $keydecde => $decode){
            if($keydecde == $request->key){
                $oldPath = public_path($decode);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }else{
                $newarr[] = $decode;
            }
            
        }
        $newval = '';
        $encde = json_encode($newarr, true);
        if(isset($encde)){$newval = $encde;}
        
        $setting_optionModel = setting_optionModel::find($query->id);
        $setting_optionModel->value_option = $newval;
        $setting_optionModel->update();


        return redirect()->back()->with('success', 'ลบสำเร็จ !');

    }
    public function BN_slideupdate(Request $request)
    {
        // dd($request);
        $query = DB::table('setting_option')->where('key_option', 'slide')->first();
        $decde = json_decode($query->value_option);
        foreach($decde as $keydecde => $decode){
            $oldPath = public_path($decode);
            if(File::exists($oldPath)){
                File::delete($oldPath);
            }
        }

        $arr_path = [];
        if($request->hasFile('banner1')){
            $file = $request->file('banner1');
            $destinationPath = public_path('/uploads/banner');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'banner1-'.time() .uniqid() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/banner/'.$newfilenam;
            $arr_path[] = $filepath;
        }
        if($request->hasFile('banner2')){
            $file = $request->file('banner2');
            $destinationPath = public_path('/uploads/banner');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'banner2-'.time() .uniqid() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/banner/'.$newfilenam;
            $arr_path[] = $filepath;
        }
        if($request->hasFile('banner3')){
            $file = $request->file('banner3');
            $destinationPath = public_path('/uploads/banner');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'banner3-'.time() .uniqid() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/banner/'.$newfilenam;
            $arr_path[] = $filepath;
        }
        if($request->hasFile('banner4')){
            $file = $request->file('banner4');
            $destinationPath = public_path('/uploads/banner');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'banner4-'.time() .uniqid() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/banner/'.$newfilenam;
            $arr_path[] = $filepath;
        }
        $newval = '';
        $encde = json_encode($arr_path, true);
        if(isset($encde)){$newval = $encde;}
        
        $setting_optionModel = setting_optionModel::find($query->id);
        $setting_optionModel->value_option = $newval;
        $setting_optionModel->update();
        
        
        // echo "<pre>";
        // print_r($decde);
        // echo "</pre>";
        // $query = DB::table('setting_option')->where('key_option', 'termcondition')->first();
        // $setting_optionModel = setting_optionModel::find($query->id);
        // $setting_optionModel->value_option = $request->termcondition;
        // $setting_optionModel->update();
        return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');
    }
    public function BN_termcondition()
    {
        $termcondition = DB::table('setting_option')->where('key_option', 'termcondition')->first();
        return view('backend/setting-termcondition', [ 
            'default_pagename' => 'ข้อกำหนดในการให้บริการ',
            'termcondition' => $termcondition,
            
        ]);
    }
    public function BN_termcondition_update(Request $request)
    {
        // dd($request);
        $query = DB::table('setting_option')->where('key_option', 'termcondition')->first();
        $setting_optionModel = setting_optionModel::find($query->id);
        $setting_optionModel->value_option = $request->termcondition;
        $setting_optionModel->update();
        return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');
    }
    public function BN_privacypolicy()
    {
        $privacypolicy = DB::table('setting_option')->where('key_option', 'privacypolicy')->first();
        return view('backend/setting-privacypolicy', [ 
            'default_pagename' => 'นโยบายความเป็นส่วนตัว',
            'privacypolicy' => $privacypolicy,
            
        ]);
    }
    public function BN_privacypolicy_update(Request $request)
    {
        // dd($request);
        $query = DB::table('setting_option')->where('key_option', 'privacypolicy')->first();
        $setting_optionModel = setting_optionModel::find($query->id);
        $setting_optionModel->value_option = $request->privacypolicy;
        $setting_optionModel->update();
        return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');
    }
    public function BN_setfooter()
    {

        // $setFooterModel = setFooterModel::all();
        $setFooterModel = DB::table('footer_setting')->where('page', 'index')->get();
        return view('backend/setting-setfooter', [ 
            'default_pagename' => 'ตั้งค่า footer',
            'setFooterModel' => $setFooterModel,
            
        ]);
    }
    public function BN_setfooterupdate(Request $request)
    {
        $getdata = $request->except('_token');
        $label = [];
        $use = [];
        $create = [];

        foreach($getdata as $keydatalabel => $datalabel){
            $expld = explode("_", $keydatalabel);
            $count = count($expld);
            if($count == 1){
                $label[$expld[0]] = $datalabel;
            }
        }
        
        foreach($getdata as $keydata => $data){
            $expld = explode("_", $keydata);
            $count = count($expld);
            if($count == 2){

                $expldname = explode("_name", $keydata);
                $countname = count($expldname);
                if($countname == 2){
                    $create[$expldname[0]][$expldname[1]]['name'] = $data;
                    $create[$expldname[0]][$expldname[1]]['footer_name'] = $keydata;
                    $create[$expldname[0]][$expldname[1]]['head'] = $expldname[0];
                }
                $expldlink = explode("_link", $keydata);
                $countlink = count($expldlink);
                if($countlink == 2){
                    $create[$expldlink[0]][$expldlink[1]]['link'] = $data;
                    $create[$expldlink[0]][$expldlink[1]]['footer_link'] = $keydata;
                }
            }
            
        }
        $cc = 0;
        foreach($create as $keyforsave => $forsave){
            
            
            foreach($forsave as $keysave => $save){
                $cc++;
                    ${'footer_setting'.$cc} = DB::table('footer_setting')->where('footer_name', $save['footer_name'])->first();
                    $ids = ${'footer_setting'.$cc}->id;

                    ${'setting'.$cc} = setFooterModel::find($ids);
                    ${'setting'.$cc}->heading = $label[$save['head']];
                    ${'setting'.$cc}->name = $save['name'];
                    ${'setting'.$cc}->link = $save['link'];
                    ${'setting'.$cc}->update();
            }
        }


        // echo "<pre>";
        // print_r($label);
        // echo "</pre>";
            
        // $footer_setting1 = DB::table('footer_setting')->where('footer_name', 'head1_name1')->first();
        // $footer_setting1 = setFooterModel::find($footer_setting1->id);
        // $footer_setting1->heading = $request->head1;
        // $footer_setting1->name = $request->head1_name1;
        // $footer_setting1->link = $request->head1_link1;
        // $footer_setting1->update();


        // $footer_setting2 = DB::table('footer_setting')->where('footer_name', 'head1_name2')->first();
        // $footer_setting2 = setFooterModel::find($footer_setting2->id);
        // $footer_setting2->name = $request->head1_name2;
        // $footer_setting2->link = $request->head1_link2;
        // $footer_setting2->update();

        // $footer_setting3 = DB::table('footer_setting')->where('footer_name', 'head1_name3')->first();
        // $footer_setting3 = setFooterModel::find($footer_setting3->id);
        // $footer_setting3->name = $request->head1_name3;
        // $footer_setting3->link = $request->head1_link3;
        // $footer_setting3->update();

        // $footer_setting4 = DB::table('footer_setting')->where('footer_name', 'head1_name4')->first();
        // $footer_setting4 = setFooterModel::find($footer_setting4->id);
        // $footer_setting4->name = $request->head1_name4;
        // $footer_setting4->link = $request->head1_link4;
        // $footer_setting4->update();

        // $footer_setting5 = DB::table('footer_setting')->where('footer_name', 'head1_name5')->first();
        // $footer_setting5 = setFooterModel::find($footer_setting5->id);
        // $footer_setting5->name = $request->head1_name5;
        // $footer_setting5->link = $request->head1_link5;
        // $footer_setting5->update();

        // $footer_setting6 = DB::table('footer_setting')->where('footer_name', 'head1_name6')->first();
        // $footer_setting6 = setFooterModel::find($footer_setting6->id);
        // $footer_setting6->name = $request->head1_name6;
        // $footer_setting6->link = $request->head1_link6;
        // $footer_setting6->update();

        // $footer_setting7 = DB::table('footer_setting')->where('footer_name', 'head2_name1')->first();
        // $footer_setting7 = setFooterModel::find($footer_setting7->id);
        // $footer_setting7->heading = $request->head2;
        // $footer_setting7->name = $request->head2_name1;
        // $footer_setting7->link = $request->head2_link1;
        // $footer_setting7->update();

        // $footer_setting8 = DB::table('footer_setting')->where('footer_name', 'head2_name2')->first();
        // $footer_setting8 = setFooterModel::find($footer_setting8->id);
        // $footer_setting8->name = $request->head2_name2;
        // $footer_setting8->link = $request->head2_link2;
        // $footer_setting8->update();

        // $footer_setting9 = DB::table('footer_setting')->where('footer_name', 'head2_name3')->first();
        // $footer_setting9 = setFooterModel::find($footer_setting9->id);
        // $footer_setting9->name = $request->head2_name3;
        // $footer_setting9->link = $request->head2_link3;
        // $footer_setting9->update();

        // $footer_setting10 = DB::table('footer_setting')->where('footer_name', 'head2_name4')->first();
        // $footer_setting10 = setFooterModel::find($footer_setting10->id);
        // $footer_setting10->name = $request->head2_name4;
        // $footer_setting10->link = $request->head2_link4;
        // $footer_setting10->update();

        // $footer_setting11 = DB::table('footer_setting')->where('footer_name', 'head2_name5')->first();
        // $footer_setting11 = setFooterModel::find($footer_setting11->id);
        // $footer_setting11->name = $request->head2_name5;
        // $footer_setting11->link = $request->head2_link5;
        // $footer_setting11->update();

        // $footer_setting12 = DB::table('footer_setting')->where('footer_name', 'head2_name6')->first();
        // $footer_setting12 = setFooterModel::find($footer_setting12->id);
        // $footer_setting12->name = $request->head2_name6;
        // $footer_setting12->link = $request->head2_link6;
        // $footer_setting12->update();

        // $footer_setting13 = DB::table('footer_setting')->where('footer_name', 'head3_name1')->first();
        // $footer_setting13 = setFooterModel::find($footer_setting13->id);
        // $footer_setting13->heading = $request->head3;
        // $footer_setting13->name = $request->head3_name1;
        // $footer_setting13->link = $request->head3_link1;
        // $footer_setting13->update();

        // $footer_setting14 = DB::table('footer_setting')->where('footer_name', 'head3_name2')->first();
        // $footer_setting14 = setFooterModel::find($footer_setting14->id);
        // $footer_setting14->name = $request->head3_name2;
        // $footer_setting14->link = $request->head3_link2;
        // $footer_setting14->update();

        // $footer_setting15 = DB::table('footer_setting')->where('footer_name', 'head3_name3')->first();
        // $footer_setting15 = setFooterModel::find($footer_setting15->id);
        // $footer_setting15->name = $request->head3_name3;
        // $footer_setting15->link = $request->head3_link3;
        // $footer_setting15->update();

        // $footer_setting16 = DB::table('footer_setting')->where('footer_name', 'head3_name4')->first();
        // $footer_setting16 = setFooterModel::find($footer_setting16->id);
        // $footer_setting16->name = $request->head3_name4;
        // $footer_setting16->link = $request->head3_link4;
        // $footer_setting16->update();

        // $footer_setting17 = DB::table('footer_setting')->where('footer_name', 'head3_name5')->first();
        // $footer_setting17 = setFooterModel::find($footer_setting17->id);
        // $footer_setting17->name = $request->head3_name5;
        // $footer_setting17->link = $request->head3_link5;
        // $footer_setting17->update();

        // $footer_setting18 = DB::table('footer_setting')->where('footer_name', 'head3_name6')->first();
        // $footer_setting18 = setFooterModel::find($footer_setting18->id);
        // $footer_setting18->name = $request->head3_name6;
        // $footer_setting18->link = $request->head3_link6;
        // $footer_setting18->update();

        // $footer_setting19 = DB::table('footer_setting')->where('footer_name', 'head4_name1')->first();
        // $footer_setting19 = setFooterModel::find($footer_setting19->id);
        // $footer_setting19->heading = $request->head4;
        // $footer_setting19->name = $request->head4_name1;
        // $footer_setting19->link = $request->head4_link1;
        // $footer_setting19->update();

        // $footer_setting20 = DB::table('footer_setting')->where('footer_name', 'head4_name2')->first();
        // $footer_setting20 = setFooterModel::find($footer_setting20->id);
        // $footer_setting20->name = $request->head4_name2;
        // $footer_setting20->link = $request->head4_link2;
        // $footer_setting20->update();

        // $footer_setting21 = DB::table('footer_setting')->where('footer_name', 'head4_name3')->first();
        // $footer_setting21 = setFooterModel::find($footer_setting21->id);
        // $footer_setting21->name = $request->head4_name3;
        // $footer_setting21->link = $request->head4_link3;
        // $footer_setting21->update();

        // $footer_setting22 = DB::table('footer_setting')->where('footer_name', 'head4_name4')->first();
        // $footer_setting22 = setFooterModel::find($footer_setting22->id);
        // $footer_setting22->name = $request->head4_name4;
        // $footer_setting22->link = $request->head4_link4;
        // $footer_setting22->update();

        // $footer_setting23 = DB::table('footer_setting')->where('footer_name', 'head4_name5')->first();
        // $footer_setting23 = setFooterModel::find($footer_setting23->id);
        // $footer_setting23->name = $request->head4_name5;
        // $footer_setting23->link = $request->head4_link5;
        // $footer_setting23->update();

        // $footer_setting24 = DB::table('footer_setting')->where('footer_name', 'head4_name6')->first();
        // $footer_setting24 = setFooterModel::find($footer_setting24->id);
        // $footer_setting24->name = $request->head4_name6;
        // $footer_setting24->link = $request->head4_link6;
        // $footer_setting24->update();


        
        return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');


















        // $query = setFooterModel::all()->sort();
        // foreach($query as $keyq => $qry){

        //     $setFooterModel = setFooterModel::find($qry->id);
        //     $setFooterModel->name = $request->$setFooterModel->footer_name;
        //     $setFooterModel->link = $request->$setFooterModel->footer_link;

        //     echo "<pre>";
        //     print_r($request->$setFooterModel->footer_name);
        //     echo "</pre>";
        // }
        // dd($query);

        

        

        // foreach($request as $key => $qry){
        //     $setFooterModel = new setFooterModel;
        //     $setFooterModel->name = $qry;
        //     $setFooterModel->save();
        //     echo "<pre>";
        //     print_r($qry->parameters);
        //     echo "</pre>";
        // }

        // echo "<pre>";
        // print_r($request);
        // echo "</pre>";
        
        
        // 
        // foreach($query as $key => $qry){
        //     echo "<pre>";
        //     print_r($qry);
        //     echo "</pre>";
        // }

        // 
        // return view('backend/setting-setfooter', [ 
        //     'default_pagename' => 'ตั้งค่า footer',
            
        // ]);

        // for($i=1;$i<=8;$i++){
        //     for($j=1;$j<=6;$j++){
        //         $hhhead = 'head'.$i;
        //         $nnname = 'head'.$i.'_name'.$j;
        //         $lllink = 'head'.$i.'_link'.$j;
        //         $setFooterModel = new setFooterModel;
        //         $setFooterModel->heading = $hhhead;
        //         $setFooterModel->name = $nnname;
        //         $setFooterModel->footer_name = $nnname;
        //         $setFooterModel->footer_link = $lllink;
        //         $setFooterModel->save();
        //     }
        // }
    }

    // public function BN_generations()
    // {
    //     return view('backend/models', [ 
    //         'default_pagename' => 'โฉมรถ',
    //     ]);
    // }
    

    

    public function BN_modelsss()
    {
        return view('backend/backend-dashboard', [ 
            'default_pagename' => 'แท็ก',
            
        ]);
    }



    
    public function BN_tags()
    {
        return view('backend/backend-dashboard', [ 
            'default_pagename' => 'แท็ก',
            
        ]);
    }
    
    
    public function BN_setting()
    {
        return view('backend/backend-dashboard', [ 
            'default_pagename' => 'ตั้งค่าระบบ',
        ]);
    }
    
    
    public function BN_dev()
    {
        return view('backend/dev', [ 
            'default_pagename' => 'Development',
        ]);
    }
    

    public function backendDashboard()
    {
        return view('backend/backend-dashboard', [
            // 'layout' => 'side-menu',
            'default_pagename' => 'แดชบอร์ด',
        ]);
    }
    
}
