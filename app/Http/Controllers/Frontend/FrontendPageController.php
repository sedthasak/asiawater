<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Customer;
use App\Models\Sms_session;
use App\Models\provincesModel;
use App\Models\brandsModel;
use App\Models\modelsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;
use App\Models\carsModel;
use App\Models\categoriesModel;
use App\Models\setFooterModel;
use App\Models\setting_optionModel;
use App\Models\contactsModel;
use App\Models\contacts_backModel;
use App\Models\newsModel;
use App\Models\noticeModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;


class FrontendPageController extends Controller
{

    public function performanceviewPage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->where('cars.status', 'approved')
            ->where(function ($query) {
                $query->where('cars.clickcount', '<=', 0)
                      ->orWhereNull('cars.viewcount');
            })
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

            $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        return view('frontend/performance-view', [
            'mycars' => $mycars,
            'carstatus' => "approved",
            'brandsearch' => $qrybrandsearch,
        ]);
    }

    public function performanceviewpostPage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->where('cars.status', 'approved')
            ->where('cars.viewcount', '>', 0)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

            $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        return view('frontend/performance-viewpost', [
            'mycars' => $mycars,
            'carstatus' => "approved",
            'brandsearch' => $qrybrandsearch,
        ]);
    }

    public function performancePage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->where('cars.status', 'approved')
            ->where('cars.clickcount', '>', 0)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        return view('frontend/performance', [
            'mycars' => $mycars,
            'carstatus' => "approved",
            'brandsearch' => $qrybrandsearch,
        ]);
    }

    public function updateContactStatus(Request $request, $id)
    {
        // dd($request);
        $contact = contacts_backModel::find($id);
        if (!$contact) {
            return response()->json(['error' => 'Contact not found.'], 404);
        }

        $contact->status = $request->input('status');
        $contact->save();

        return response()->json(['success' => 'Contact status updated successfully.']);

        // try {

        //     dd($request);

        //     $contact = contacts_backModel::find($id);
        //     if (!$contact) {
        //         return response()->json(['error' => 'Contact not found.'], 404);
        //     }

        //     $contact->status = $request->input('status');
        //     $contact->save();

    
        //     return response()->json(['success' => 'Contact status updated successfully.']);
        // } catch (\Exception $e) {
        //     \Log::error('Error updating contact status: ' . $e->getMessage());
        //     return response()->json(['error' => 'Internal Server Error'], 500);
        // }
    }

    public function updatepricePage(Request $request)
    {
        $postId = $request->id;
        $newprice = $request->newprice;
        if($postId && $newprice){
            $carsModel = carsModel::find($postId);

            if ($carsModel && $carsModel->edit_price < 2) {

                $oldValue = $carsModel->edit_price;
                $carsModel->edit_price = $oldValue + 1;
                $carsModel->price = $newprice;
                $carsModel->save();
            }
        }
        return redirect()->back()->with('success', 'บันทึกสำเร็จ !');
    }
    public function updatecontackbackPage(Request $request)
    {
        $postId = $request->id;
        $currentValue = $request->currentValue;
        $newValue = $currentValue == 'create' ? 'contact' : 'create';
        $newValuefornotice = $currentValue == 'create' ? 'read' : 'create';
        contacts_backModel::where('id', $postId)->update([
            'status' => $newValue,
        ]);
        noticeModel::where('resource_id', $postId)
        ->where('resource', 'contacts_back')
        ->update([
            'status' => $newValuefornotice,
        ]);

        return response()->json(['status' => 'success', 'newValue' => $newValue]);
    }
    public function updatereservePage(Request $request)
    {
        $postId = $request->id;
        $currentValue = $request->currentValue;
        $newValue = $currentValue == 1 ? 0 : 1;
        carsModel::where('id', $postId)->update([
            'reserve' => $newValue,
        ]);

        return response()->json(['status' => 'success', 'newValue' => $newValue]);
    }

    public function contactcaractionPage(Request $request)
    {
        // dd($request);

        if(isset($request->cars_id)){
            $contacts = new contacts_backModel;
            $contacts->customer_id = $request->customer_id??999999;
            $contacts->name = $request->name;
            $contacts->tel = $request->tel;
            $contacts->time = $request->time;
            $contacts->remark = $request->remark;
            $contacts->cars_id = $request->cars_id;
            $contacts->status = 'create';
            $contacts->save();

            if(isset($contacts->id)){
                $notice = new noticeModel;
                $notice->customer_id = $request->customer_id??999999;
                $notice->status = 'create';
                $notice->title = 'มีลูกค้ารอติดต่อกลับ';
                $notice->detail = 'ชื่อลูกค้า: '.$request->name;
                $notice->resource = 'contacts_back';
                $notice->resource_id = $contacts->id;
                $notice->save();
            }

            return redirect()->back()->with('success', 'ส่งข้อมูลสำเร็จ !');
        }else{
            return redirect()->back()->with('error', 'ผิดพลาด !');
        }   
            
    }
    public function helpcaractionPage(Request $request)
    {
        // dd($request);

        $contacts = new contactsModel;
        $contacts->customer_id = $request->customer_id;
        $contacts->name = $request->name;
        $contacts->tel = $request->tel;
        $contacts->line = $request->line;
        $contacts->messages = $request->messages;
        $contacts->save();
        return redirect()->back()->with('success', 'ส่งข้อมูลสำเร็จ !');
    }

    // public function helpcaractionPage(Request $request)
    // {
    //     dd($request)
        // $termcondition = DB::table('setting_option')->where('key_option', 'termcondition')->first();
        // return view('frontend/termcondition', [
        //     'default_pagename' => 'ข้อกำหนดในการให้บริการ',
        //     'termcondition' => $termcondition,
        // ]);
    // }


    public function termconditionPage()
    {
        $termcondition = DB::table('setting_option')->where('key_option', 'termcondition')->first();
        return view('frontend/termcondition', [
            'default_pagename' => 'ข้อกำหนดในการให้บริการ',
            'termcondition' => $termcondition,
        ]);
    }
    public function privacypolicyPage()
    {
        $privacypolicy = DB::table('setting_option')->where('key_option', 'privacypolicy')->first();
        return view('frontend/privacypolicy', [
            'default_pagename' => 'นโยบายความเป็นส่วนตัว',
            'privacypolicy' => $privacypolicy,
        ]);
    }

    public function indexPage(Request $request)
    {
        $categories = categoriesModel::all();
        $cars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->where('cars.status', '=', 'approved')
            ->orderBy('id', 'desc')
            ->get();

        $allcarcount = DB::table('cars')->count();
        $allcars6 = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 
                'customer.province as customer_proveince', 'customer.place as customer_place', 
                'customer.map as customer_map', 'customer.google_map as customer_google_map', 
                'customer.phone as customer_phone', 'customer.line as customer_line', 
                'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->where('cars.status', '=', 'approved')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        $qrybrand = brandsModel::orderBy("sort_no")->get();

        $setFooterModel = setFooterModel::all();

        $decde = array();
        $slide = DB::table('setting_option')->where('key_option', 'slide')->first();
        if(isset($slide)){$decde = json_decode($slide->value_option);}
        
        $province = provincesModel::orderBy("name_th", "ASC")->get();

        $news = newsModel::query()
        ->orderBy('id', 'desc')
        ->take(5)->get();

        return view('frontend/index-page', [
            'layout' => 'side-menu',
            'categories' => $categories,
            'cars' => $cars,
            'allcarcount' => $allcarcount,
            'allcars6' => $allcars6,
            'brand' => $qrybrand,
            'slide' => $decde,
            'setFooterModel' => $setFooterModel,
            'news' => $news,
            'province' => $province
        ]);
    }
    public function newsPage()
    {

        $firstTwoPosts = newsModel::query()
        ->orderBy('id', 'desc')
        ->take(2)->get();
        
        // $remainingPosts = newsModel::query()
        // ->orderBy('id', 'desc')
        // ->skip(2)->get();

        // $remainingPosts = newsModel::query()
        // ->orderBy('id', 'desc')
        // ->skip(2)
        // ->paginate(4);

        $remainingPosts = newsModel::query()
        ->orderBy('id', 'desc')
        ->paginate(4);

        $excpt1 = 99998;
        $excpt2 = 99999;
        foreach($remainingPosts as $keyloop => $loop){
            if($keyloop==0){$excpt1 = $loop->id;}
            if($keyloop==1){$excpt2 = $loop->id;}
        }

        $remainingPosts = DB::table('news')
            ->where([
                ["id", "<>", $excpt1],
                ["id", "<>", $excpt2],
            ])
            ->orderBy('id', 'desc')
            // ->where("id", "<>", 14)
            ->offset(2)
            ->limit(99999)
            ->paginate(12);

        // $remainingPosts = DB::table('news')->skip(10)->take(5)->orderBy('id', 'desc')->get();

        return view('frontend/news', [
            'firstTwoPosts' => $firstTwoPosts,
            'remainingPosts' => $remainingPosts,
        ]);
    }
    public function newsdetailPage(Request $request, $news_id)
    {
        $mynews = newsModel::find($news_id);
        $othernews = newsModel::query()
        ->orderBy('id', 'desc')
        ->where("id", "<>", $news_id)
        ->take(5)
        ->get();
        
        return view('frontend/news-detail', [
            'mynews' => $mynews,
            'othernews' => $othernews,
        ]);
    }
    public function profilePage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();
        // ->getBindings();


        return view('frontend/profile', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "approved",
            'brandsum' => $qrybrandsum
        ]);
    }
    public function profilecheckPage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'created')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'created')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();


        return view('frontend/profile-check', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "created",
            'brandsum' => $qrybrandsum
        ]);
    }
    public function profileeditcarinfoPage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'rejected')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'rejected')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();


        return view('frontend/profile-editcarinfo', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "rejected",
            "brandsum" => $qrybrandsum
        ]);
    }
    public function profileexpirePage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }


        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'expired')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'expired')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        return view('frontend/profile-expire', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "expired",
            "brandsum" => $qrybrandsum
        ]);
    }


    public function searchprofilePage(Request $request)
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = null;
        $mycars2 = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id');
            if (isset($request->profile_brand_id)) {
                $mycars2 = $mycars2->where("cars.brand_id", $request->profile_brand_id);
            }
            if (isset($request->profile_model_id)) {
                $mycars2 = $mycars2->where("cars.model_id", $request->profile_model_id);
            }
            if (isset($request->profile_vehicle_code)) {
                $mycars2 = $mycars2->where("cars.vehicle_code", $request->profile_vehicle_code);
            }
            if (isset($request->profile_customer_id)) {
                $mycars2 = $mycars2->where("cars.customer_id", $request->profile_customer_id);
            }
            $mycars2 = $mycars2->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }
        

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();


        return view('frontend/profile', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "approved",
            "mycars2" => $mycars2,
            'brandsum' => $qrybrandsum
        ]);
    }
    public function searchprofilecheckPage(Request $request)
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = null;
        $mycars2 = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id');
            if (isset($request->profile_brand_id)) {
                $mycars2 = $mycars2->where("cars.brand_id", $request->profile_brand_id);
            }
            if (isset($request->profile_model_id)) {
                $mycars2 = $mycars2->where("cars.model_id", $request->profile_model_id);
            }
            if (isset($request->profile_vehicle_code)) {
                $mycars2 = $mycars2->where("cars.vehicle_code", $request->profile_vehicle_code);
            }
            if (isset($request->profile_customer_id)) {
                $mycars2 = $mycars2->where("cars.customer_id", $request->profile_customer_id);
            }
            $mycars2 = $mycars2->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();
            // ->toSql();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );

        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        


        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'created')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'created')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();


        return view('frontend/profile-check', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "created",
            "mycars2" => $mycars2,
            "brandsum" => $qrybrandsum
        ]);
    }
    public function searchprofileeditcarinfoPage(Request $request)
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = null;
        $mycars2 = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id');
            if (isset($request->profile_brand_id)) {
                $mycars2 = $mycars2->where("cars.brand_id", $request->profile_brand_id);
            }
            if (isset($request->profile_model_id)) {
                $mycars2 = $mycars2->where("cars.model_id", $request->profile_model_id);
            }
            if (isset($request->profile_vehicle_code)) {
                $mycars2 = $mycars2->where("cars.vehicle_code", $request->profile_vehicle_code);
            }
            if (isset($request->profile_customer_id)) {
                $mycars2 = $mycars2->where("cars.customer_id", $request->profile_customer_id);
            }
            $mycars2 = $mycars2->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'rejected')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'rejected')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();


        return view('frontend/profile-editcarinfo', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "rejected",
            "mycars2" => $mycars2,
            "brandsum" => $qrybrandsum
        ]);
    }
    public function searchprofileexpirePage(Request $request)
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = null;
        $mycars2 = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id');
            if (isset($request->profile_brand_id)) {
                $mycars2 = $mycars2->where("cars.brand_id", $request->profile_brand_id);
            }
            if (isset($request->profile_model_id)) {
                $mycars2 = $mycars2->where("cars.model_id", $request->profile_model_id);
            }
            if (isset($request->profile_vehicle_code)) {
                $mycars2 = $mycars2->where("cars.vehicle_code", $request->profile_vehicle_code);
            }
            if (isset($request->profile_customer_id)) {
                $mycars2 = $mycars2->where("cars.customer_id", $request->profile_customer_id);
            }
            $mycars2 = $mycars2->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'expired')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        $qrybrandsum = DB::table("cars")->leftJoin("brands", "cars.brand_id", "brands.id")
        ->selectRaw("brands.id, brands.title, brands.feature, COUNT(brands.title) as brandcount")
        ->where("cars.status", 'expired')
        ->where('cars.customer_id', $customer_id)
        ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();


        return view('frontend/profile-expire', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            'brandsearch' => $qrybrandsearch,
            'carstatus' => "expired",
            "mycars2" => $mycars2,
            "brandsum" => $qrybrandsum
        ]);
    }





    public function customercontactPage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;

        $mycars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->where('customer_id', $customer_id)
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            ->get();

        $carfromstatus = array(
            'created' => [],
            'approved' => [],
            'rejected' => [],
            'expired' => [],
        );
        if (isset($mycars)) {
            foreach($mycars as $keystatus => $carstatus){
                $carfromstatus[$carstatus->status][] = $carstatus;
            }
        }

        // $contacts_back = contacts_backModel::where("customer_id", $customer_id)->get();
        // $contacts_back = DB::table('contacts_back')
        // ->select('contacts_back.*', 'cars.*', 'brands.title as brand_title', 'models.model as model_name', 'customer.*')
        // ->where('contacts_back.customer_id', '=', $customer_id)
        // ->join('cars', 'contacts_back.cars_id', '=', 'cars.id')
        // ->join('brands', 'cars.brand_id', '=', 'brands.id')
        // ->join('models', 'cars.model_id', '=', 'models.id')
        // ->join('customer', 'contacts_back.customer_id', '=', 'customer.id')
        // ->get();


        $query_contact_back = DB::table('contacts_back')
            ->select('contacts_back.id as contact_id', 'contacts_back.status as contact_status', 'contacts_back.*', 'cars.id', 'cars.status', 'cars.customer_id', 'cars.user_id', 
            'cars.type', 'cars.brand_id', 'cars.model_id', 'cars.modelyear', 'brands.title as brand_title', 
            'models.model as model_name', 'customer.*', 'contacts_back.created_at')
            ->join('cars', 'contacts_back.cars_id', '=', 'cars.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('customer', 'cars.customer_id', '=', 'customer.id')
            ->where('cars.customer_id', '=', $customer_id)
            ->orderBy('contacts_back.id', 'desc')
            ->paginate(24);


        // $mycontacts = contacts_backModel::select(
        //     'contacts_back.*', // Select all fields from contacts_back
        //     'customer.id as customer_id',
        //     'cars.*', // Select all fields from cars
        //     'brands.title as brand',
        //     'models.model as model', // Replace models.title with models.model
        //     'generations.generations as generation', // Replace generations.title with generations.generations
        //     'sub_models.sub_models as sub_model' // Replace sub_models.title with sub_models.sub_models
        // )
        // ->join('cars', 'contacts_back.cars_id', '=', 'cars.id')
        // ->join('customer', 'contacts_back.customer_id', '=', 'customer.id')
        // ->join('brands', 'cars.brand_id', '=', 'brands.id')
        // ->join('models', 'cars.model_id', '=', 'models.id')
        // ->join('generations', 'cars.generations_id', '=', 'generations.id')
        // ->join('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
        // ->orderBy('contacts_back.created_at', 'desc')
        // ->get();


        

        $qrybrandsearch = carsModel::leftJoin("brands", "cars.brand_id", "brands.id")
        ->select("brands.id", "brands.title", "brands.feature")
        ->where("cars.status", 'approved')
        ->where('cars.customer_id', $customer_id)
        // ->groupBy("brands.id", "brands.title", "brands.feature")
        ->orderBy("brands.sort_no")
        ->get();

        return view('frontend/customer-contact', [
            'customer_id' => $customer_id,
            'mycars' => $mycars,
            'carfromstatus' => $carfromstatus,
            // 'contacts_back' => $contacts_back,
            // 'mycontacts' => $mycontacts,
            'carstatus' => "approved",
            'brandsearch' => $qrybrandsearch,
            'query_contact_back' => $query_contact_back,
        ]);
    }
    /****************************************************************/
    /****************************************************************/
    /****************************************************************/

    public function cardetailPage(Request $request, $post)
    {
        $allcars = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            // ->orderBy('id', 'desc')
            ->take(12)
            ->get();

        $allcars2 = DB::table('cars')
            ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
            ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
            ->leftjoin('models', 'cars.model_id', '=', 'models.id')
            ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
            ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
            ->select('cars.*', 'customer.firstname', 'customer.lastname', 'customer.sp_role', 'customer.province as customer_proveince', 'brands.title as brands_title', 'models.model as model_name', 
                'generations.generations as generations_name', 'sub_models.sub_models as sub_models_name')
            ->orderBy('id', 'desc')
            // ->random()
            ->take(4)
            ->get();

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

        $gallery = DB::table('gallery')->where('cars_id', $post)->get();
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
        $history = [];
        $customerdata = session('customer');
        if(isset($customerdata)){
            $Customer = Customer::find($customerdata->id);
            $history = $Customer->history;

            if($history){
                $jdecd = json_decode($history);
                if(is_array($jdecd)){
                    if(in_array($post, $jdecd)){
                        // if (($key = array_search($post, $jdecd)) !== false) {
                        //     unset($jdecd[$key]);
                        // }
                        $createloop = [];
                        foreach($jdecd as $keyloop => $loop){
                            if($loop != $post){
                                $createloop[] = $loop;
                            }
                        }
                        array_unshift($createloop,$post);

                        $jencd = json_encode($createloop, true);
                        $Customer->history = $jencd;
                        $Customer->update();
                        // $rrr = 'ccc';
                    }else{
                        array_unshift($jdecd,$post);

                        $jencd = json_encode($jdecd, true);
                        $Customer->history = $jencd;
                        $Customer->update();
                        // $rrr = 'dddd';
                    }
                    // $histry = '';
                    

                    
                    
                }
                    
            }else{
                $val_history = [];
                $val_history[] = $post;
                // $rrr = 'bbb';

                $jencd = json_encode($val_history, true);
                $Customer->history = $jencd;
                $Customer->update();
            }
        }
            
        
        
        

        $carcountget = carsModel::find($post);
        $oldcount = $carcountget->viewcount??0;
        $newcount = $oldcount+1;
        $carcountget->viewcount = $newcount;
        $carcountget->update();


        $qryyearprice = DB::table('cars')
        ->select('modelyear', DB::raw('MAX(price) as max_price, MIN(price) as min_price, AVG(price) as avg_price'))
        ->where("brand_id", $mycars->brand_id)
        ->where("model_id", $mycars->model_id)
        ->where("generations_id", $mycars->generations_id)
        ->groupBy('modelyear')
        ->orderBy('modelyear', 'DESC')
        ->get();

        return view('frontend/car-detail', [
            'cars' => $mycars,
            'allcars' => $allcars,
            'allcars2' => $allcars2,
            'interior' => $interior,
            'exterior' => $exterior,
            'gallery' => $gallery,
            'gallery' => $gallery,
            'yearprice' => $qryyearprice
        ]);
    }

    public function editdealercarpoststep4Page()
    {
        return view('frontend/edit-dealer-carpost-step4', [

        ]);
    }
    public function editdealercarpoststep3Page()
    {
        return view('frontend/edit-dealer-carpost-step3', [

        ]);
    }
    public function editdealercarpoststep2Page()
    {
        return view('frontend/edit-dealer-carpost-step2', [

        ]);
    }
    public function editdealercarpoststep1Page()
    {
        return view('frontend/edit-dealer-carpost-step1', [

        ]);
    }
    public function editcarpoststep4Page()
    {
        return view('frontend/edit-carpost-step4', [

        ]);
    }
    public function editcarpoststep3Page()
    {
        return view('frontend/edit-carpost-step3', [

        ]);
    }
    public function editcarpoststep2Page()
    {
        return view('frontend/edit-carpost-step2', [

        ]);
    }
    public function editcarpoststep1Page()
    {
        return view('frontend/edit-carpost-step1', [

        ]);
    }
    public function dealercarpoststep4Page()
    {
        return view('frontend/dealer-carpost-step4', [

        ]);
    }
    public function dealercarpoststep3Page()
    {
        return view('frontend/dealer-carpost-step3', [

        ]);
    }
    public function dealercarpoststep2Page()
    {
        return view('frontend/dealer-carpost-step2', [

        ]);
    }
    public function dealercarpoststep1Page()
    {
        return view('frontend/dealer-carpost-step1', [

        ]);
    }
    public function editprofilePage()
    {
        // $provinces = provincesModel::all()->sort();
        $data = session('customer');
        $provinces = provincesModel::all();
        $Customer = Customer::find($data->id);
        $province = provincesModel::orderBy("name_th", "ASC")->get();

        return view('frontend/edit-profile', [
            'provinces' => $provinces,
            'Customer' => $Customer,
            'province' => $province
        ]);
    }
    public function editprofileactionPage(Request $request)
    {
        $Customer = Customer::find($request->id);
        
        if($request->hasFile('image')){

            if(isset($Customer->image)){
                $oldPath = public_path($Customer->image);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }
                

            $file = $request->file('image');
            $destinationPath = public_path('/uploads/profile/');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'profile-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/profile/'.$newfilenam;

            $Customer->image = $filepath;
        }
        if($request->hasFile('map')){

            if(isset($Customer->map)){
                $oldPath = public_path($Customer->map);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }

            $file = $request->file('map');
            $destinationPath = public_path('/uploads/map/');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = 'map-'.time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/map/'.$newfilenam;

            $Customer->map = $filepath;
        }

        $Customer->email = $request->email;
        $Customer->firstname = $request->firstname;
        $Customer->lastname = $request->lastname;
        $Customer->facebook = $request->facebook;
        $Customer->line = $request->line;
        $Customer->place = $request->place;
        $Customer->province = $request->province;
        $Customer->google_map = $request->google_map;
        $Customer->update();

        // dd($request);
        if(isset($Customer->id)){
            // $usersavelog = auth()->user();
            $idsavelog = $request->id; 
            $phonesavelog = $request->phone; 
            $para = array(
                'part' => 'frontend',
                'user' => $idsavelog,
                'ref' => $phonesavelog,
                'remark' => 'User '.$idsavelog.' Update Profile!',
                'event' => 'update profile',
            );
            $result = (new LogsSaveController)->create_log($para);
        }
        return redirect(route('editprofilePage'))->with('success', 'แก้ไขข้อมูลสำเร็จ !');
    }
    public function editprofilePage_afterregis()
    {
        $provinces = provincesModel::all();
        
        
        return view('frontend/edit-profile-first', [
            'provinces' => $provinces,
        ]);
    }
    public function loginwelcomePage()
    {
        $data = session()->all();
        $customerdata = session('customer');
        return view('frontend/login-welcome', [
            'customerdata' => $customerdata,
        ]);
    }
    public function updatecarpricePage()
    {
        return view('frontend/update-carprice', [

        ]);
    }
    
    public function checkpricePage()
    {
        return view('frontend/check-price', [

        ]);
    }
    
    
    
    
    
    
    
    public function carpoststep4Page()
    {
        return view('frontend/carpost-step4', [

        ]);
    }
    public function carpoststep3Page()
    {
        return view('frontend/carpost-step3', [

        ]);
    }
    public function carpoststep2Page()
    {
        return view('frontend/carpost-step2', [

        ]);
    }
    




    
    public function postcarwelcomeladyPage()
    {
        return view('frontend/postcar-welcome-lady', [

        ]);
    }
    public function postcarwelcomedealerPage()
    {
        return view('frontend/postcar-welcome-dealer', [

        ]);
    }
    public function postcarwelcomePage()
    {
        return view('frontend/postcar-welcome', [

        ]);
    }
    
    public function carPage()
    {
        $brand = brandsModel::orderBy("sort_no", "ASC")->get();

        $qrycar = carsModel::leftJoin('brands', 'cars.brand_id', 'brands.id')
        ->leftJoin('models', 'cars.model_id', 'models.id')
        ->leftJoin('sub_models', 'cars.sub_models_id', 'sub_models.id')
        ->leftJoin('generations', 'cars.generations_id', 'generations.id')
        ->select("cars.*", "brands.title as brand_name", "models.model as model_name", "sub_models.sub_models as submodel_name", "generations.generations as generation_name")
        ->orderBy("cars.modelyear", "DESC")
        ->orderBy("cars.created_at", "DESC")
        ->paginate(30);

        $province = provincesModel::orderBy("name_th", "ASC")->get();
        $category = categoriesModel::orderBy("created_at", "DESC")->get();

        return view('frontend/car', [
            "brand" => $brand,
            "cars" => $qrycar,
            "province" => $province,
            "category" => $category
        ]);
    }
    public function postcarPage()
    {
        return view('frontend/postcar', [

        ]);
    }
    
    

    public function notificationPage()
    {
        $customerdata = session('customer');
        $customer_id = $customerdata->id;
        
        $notice = noticeModel::orderBy('id', 'desc')
        ->where([
            ["customer_id", $customer_id],
        ])
        ->paginate(12);
        return view('frontend/notification', [
            "notice" => $notice,
        ]);
    }
    public function loginPage(Request $request)
    {
        function ranInt(){
            $codetosend = random_int(100000,999999);
            return $codetosend;
        }

        $browserFingerprint = $request->session()->get('browserFingerprint');
        // $request->session()->put('customer', 'Error');
        if (!$browserFingerprint) {
            do {
                $codetosend = ranInt();
                $exists = Sms_session::where("browserFingerprint", $codetosend)->exists();
            } while ($exists);
            $request->session()->put('browserFingerprint', $codetosend);
            // $request->session()->put('customer', 'empty');
        }
        // else{
            // $getcustomersession = Sms_session::where([
            //     ['browserFingerprint', '=', $browserFingerprint],
            // ])->first();
            // if(isset($getcustomersession->id)){
            //     $customer = Customer::where("id", $getcustomersession->customer_id)->first();
            //     $request->session()->put('customer', $customer);
            // }
            
        // }
        return view('frontend/login', [

        ]);
    }
    public function DevelopPage()
    {
        // Session::put('customer_session', '2413320998887778');
        // dd('fd');
        function ranInt(){
            $codetosend = random_int(0,9);
            return $codetosend;
        }
        // $codetosend = ranInt();

        do {
            $codetosend = ranInt();
            $exists = Sms_session::where("customer_session", $codetosend)->exists();

        } while ($exists);

        return view('frontend/develop', [
            'test' => $codetosend,
        ]);
    }
    
    public function loopidentity(Request $request) {
        $browserFingerprint = $request->session()->get('browserFingerprint');
        $qry_session = Sms_session::where("browserFingerprint", $browserFingerprint)->where("messages", $browserFingerprint)->first();
        if(isset($qry_session)){
            $qry_customer = Customer::where("id", $qry_session->customer_id)->first();
            $permanent_session = $browserFingerprint.$qry_customer->phone;

            $session = Sms_session::find($qry_session->id);
            $session->customer_session = $permanent_session;
            $session->browserFingerprint = '';
            $session->messages = '';

            $session->update();

            $request->session()->put('customer_session', $permanent_session);

            $data = ["text" => "success"];
        }else{
            $data = ["text" => "failed"];
        }
            
        return response()->json($data);
    }

    public function TheBooGeyManEncodeIdx($string,$key='PKMONEY'){
        $j=0;$hash=null;$key=sha1($key);$strLen=strlen($string);$keyLen=strlen($key);
        for($i=0;$i<$strLen;++$i){
            $ordStr=ord(substr($string,$i,1));
            if($j==$keyLen){$j=0;}
            $ordKey=ord(substr($key,$j,1));
            ++$j;
            $hash.=strrev(base_convert(dechex($ordStr+$ordKey),16,36));
        }return $hash;
    }
    public function TheBooGeyManDecodeIdx($string,$key='PKMONEY'){
        $j=0;$hash=null;$key=sha1($key);$strLen=strlen($string);$keyLen=strlen($key);
        for($i=0;$i<$strLen;$i+=2){
            $ordStr=hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
            if($j==$keyLen){$j=0;}
            $ordKey=ord(substr($key,$j,1));
            ++$j;
            $hash.=chr($ordStr-$ordKey);
        }return $hash;
    }

    public function popupcarsearchmodel(Request $request, $id) {
        $qrymodel = modelsModel::where("brand_id", $request->brand_id)->get();
        return response()->json($qrymodel);
    }

    public function popupcarsearchgeneration(Request $request, $id) {
        $qrygenertion = generationsModel::where("models_id", $request->models_id)->get();
        return response()->json($qrygenertion);
    }

    public function popupcarsearchsubmodel(Request $request, $id) {
        $qrysubmodel = sub_modelsModel::where("generations_id", $request->generations_id)->get();
        return response()->json($qrysubmodel);
    }

    public function popupcarsearchyear(Request $request, $id) {
        $qryyear = generationsModel::where("id", $request->generations_id)->first();
        return response()->json($qryyear);
    }

    public function clearsessioncustomer() {
        session()->forget('customer_session');
        session()->flush();
        return redirect("/");
    }

    public function searchbrandtext($brand_name) {
        if ($brand_name != "all") {
            $qrybrand = brandsModel::select("brands.title", "brands.id")
            ->where("brands.title", "like", "%".$brand_name."%")
            ->orderBy("sort_no", "ASC")
            ->get();
        }
        else {
            $qrybrand = brandsModel::select("brands.title", "brands.id")
            ->orderBy("sort_no", "ASC")
            ->get();
        }
        return response()->json($qrybrand);
    }

    public function searchmodeltext($brand_id, $model_name) {
        if ($model_name != "all") {
            $qrymodel = modelsModel::select("model", "id")
            ->where("brand_id", $brand_id)
            ->where("model", "like", "%".$model_name."%")
            ->get();
        }
        else {
            $qrymodel = modelsModel::select("model", "id")
            ->where("brand_id", $brand_id)
            ->get();
        }
        return response()->json($qrymodel);
    }

    public function searchgenerationtext($model_id, $generation_name) {
        if ($generation_name != "all") {
            $qrygeneration = generationsModel::select("generations", "id")
            ->where("models_id", $model_id)
            ->where("generations", "like", "%".$generation_name."%")
            ->get();
        }
        else {
            $qrygeneration = generationsModel::select("generations", "id")
            ->where("models_id", $model_id)
            ->get();
        }
        return response()->json($qrygeneration);
    }

    public function searchsubmodeltext($generation_id, $submodel_name) {
        if ($submodel_name != "all") {
            $qrysubmodel = sub_modelsModel::select("sub_models", "id")
            ->where("generations_id", $generation_id)
            ->where("sub_models", "like", "%".$submodel_name."%")
            ->get();
        }
        else {
            $qrysubmodel = sub_modelsModel::select("sub_models", "id")
            ->where("generations_id", $generation_id)
            ->get();
        }
        return response()->json($qrysubmodel);
    }

    // public function search($brand_id, $model_id, $generation_id, $submodel_id, $evtype, $payment, $pricelow, $pricehigh, $color, $gear, $power, $province_id) {
    //     // return "brand = ".$brand_id;
    //     // $brand_id = 1; // BMW
    //     // $model_id = 25; // X1
    //     $qrycar = carsModel::rightJoin('brands', 'cars.brand_id', 'brands.id')
    //     ->rightJoin('models', 'cars.model_id', 'models.id')
    //     ->rightJoin('sub_models', 'cars.sub_models_id', 'sub_models.id')
    //     ->rightJoin('generations', 'cars.generations_id', 'generations.id')
    //     ->when($model_id, function ($query, $model_id) {
    //         return $query->where('cars.model_id', $model_id);
    //     })
    //     ->when($brand_id, function ($query, $brand_id) {
    //         return $query->where('cars.brand_id', $brand_id);
    //     })
    //     ->select("cars.*", "brands.title as brand_name", "models.model as model_name", "sub_models.sub_models as submodel_name", "generations.generations as generation_name")
    //     ->orderBy("cars.modelyear", "DESC")
    //     ->orderBy("cars.created_at", "DESC")
    //     ->get();

    //     return response()->json($qrycar);
    // }

    public function search(Request $request, $brand_id, $model_id, $generation_id, $submodel_id, $evtype, $payment, $pricelow, $pricehigh, $color, $gear, $power, $province_id, $yearlow, $yearhigh) {
        // return "brand = ".$brand_id." model = ".$model_id." generation = ".$generation_id." submodel = ".$submodel_id." payment = ".$payment." pricelow = ".$pricelow." pricehigh = ".$pricehigh;
        
        
        if ($pricelow == "ต่ำสุด") {
            $pricelow = null;
        }
        if ($pricelow == "ต่ำสุด - ") {
            $pricelow = null;
        }
        if ($pricehigh == "สูงสุด") {
            $pricehigh = null;
        }
        if ($yearlow == " ") {
            $yearlow = null;
        }
        if ($yearhigh == "ทุกปี") {
            $yearhigh = null;
        }
        if ($color == "ทุกสี") {
            $color = null;
        }


        if ($brand_id == "null") {
            $brand_id = null;
        }
        if ($model_id == "null") {
            $model_id = null;
        }
        if ($generation_id == "null") {
            $generation_id = null;
        }
        if ($submodel_id == "null") {
            $submodel_id = null;
        }
        if ($evtype == "null") {
            $evtype = null;
        }
        if ($payment == "null") {
            $payment = null;
        }
        if ($pricelow == "null") {
            $pricelow = null;
        }
        if ($pricehigh == "null") {
            $pricehigh = null;
        }
        if ($color == "null") {
            $color = null;
        }
        if ($gear == "null") {
            $gear = null;
        }
        if ($power == "null") {
            $power = null;
        }
        if ($province_id == "null") {
            $province_id = null;
        }
        if ($yearlow == "null") {
            $yearlow = null;
        }
        if ($yearhigh == "null") {
            $yearhigh = null;
        }



        $cars = carsModel::leftJoin('brands', 'cars.brand_id', '=', 'brands.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
        ->leftJoin('generations', 'cars.generations_id', '=', 'generations.id');
        if (!empty($brand_id)) {
            $cars = $cars->where('cars.brand_id', $brand_id);
        }
        if (!empty($model_id)) {
            $cars = $cars->where('cars.model_id', $model_id);
        }
        if (!empty($generation_id)) {
            $cars = $cars->where('cars.generations_id', $generation_id);
        }
        if (!empty($submodel_id)) {
            $cars = $cars->where('cars.sub_models_id', $submodel_id);
        }
        if (!empty($pricelow)) {
            $cars = $cars->where('cars.price', '>=', $pricelow);
        }
        if (!empty($pricehigh)) {
            $cars = $cars->where('cars.price', '<=', $pricehigh);
        }
        if (!empty($yearlow)) {
            $cars = $cars->where('cars.modelyear', '>=', $yearlow);
        }
        if (!empty($yearhigh)) {
            $cars = $cars->where('cars.modelyear', '<=', $yearhigh);
        }
        if (!empty($color)) {
            $cars = $cars->where('cars.color', $color);
        }
        if (!empty($gear)) {
            $cars = $cars->where('cars.gear', $gear);
        }
        if (!empty($power)) {
            if ($power == 1) {
                $cars = $cars->where('cars.gas', 'รถน้ำมัน / hybrid');
            }
            if ($power == 2) {
                $cars = $cars->where('cars.gas', 'รถไฟฟ้า EV 100%');
            }
            if ($power == 3) {
                $cars = $cars->where('cars.gas', 'รถติดแก๊ส');
            }
        }
        if (!empty($province_id)) {
            $cars = $cars->where('cars.province', $province_id);
        }
        if (!empty($status)) {
            $cars = $cars->where('cars.status', 'approved');
        }
        $cars = $cars->select(
            'cars.*',
            'brands.title as brand_name',
            'models.model as model_name',
            'sub_models.sub_models as submodel_name',
            'generations.generations as generation_name'
        )
        ->where('cars.status', 'approved')
        ->orderBy('cars.modelyear', 'DESC')
        ->orderBy('cars.created_at', 'DESC')
        ->paginate(30);
        // ->getBindings();
        // ->get();
        // ->toSql();
        // return dd($cars);

        $brand = brandsModel::orderBy("sort_no", "ASC")->get();

        $province = provincesModel::orderBy("name_th", "ASC")->get();

        if($request->ajax()){
            // return dd(["cars"=>$cars, "brand"=>$brand, "province"=>$province, "total"=>$total]);
            return view('frontend/car-child', ["cars"=>$cars, "brand"=>$brand, "province"=>$province])->render();
        }

        $category = categoriesModel::orderBy("created_at", "DESC")->get();

        

        return view('frontend/car', [
            "brand" => $brand,
            "cars" => $cars,
            "province" => $province,
            "category" => $category
        ]);
    }

    public function search2(Request $request) {
        // return dd($request->yearhigh);
        if ($request->pricelow == "ต่ำสุด") {
            $pricelow = null;
        }
        else {
            $pricelow = $request->pricelow;
        }
        if ($request->pricehigh == "สูงสุด") {
            $pricehigh = null;
        }
        else {
            $pricehigh = $request->pricehigh;
        }
        if ($request->yearlow == "ต่ำสุด -") {
            $yearlow = null;
        }
        else {
            $yearlow = $request->yearlow;
        }
        if ($request->yearhigh == "ทุกปี") {
            $yearhigh = null;
        }
        else {
            $yearhigh = $request->yearhigh;
        }
        if ($request->color == "ทุกสี") {
            $color = null;
        }
        else {
            $color = $request->color;
        }

        $brandsel = null;
        $brand_id = null;
        $qrymodellist = null;
        if (isset($request->brand_id)) {
            $qrybrand = brandsModel::where("id", $request->brand_id)->first();
            $brand_id = $qrybrand->id;
            $brandsel = $qrybrand->title;
            $qrymodellist = modelsModel::where("brand_id", $request->brand_id)->get();
        }
        $modelsel = null;
        $model_id = null;
        $qrygenerationlist = null;
        if (isset($request->model_id)) {
            $qrymodellist = null;
            $qrymodel = modelsModel::where("id", $request->model_id)->first();
            $model_id = $qrymodel->id;
            $modelsel = $qrymodel->model;
            $qrygenerationlist = generationsModel::where("models_id", $qrymodel->id)->get();
        }
        $generationsel = null;
        $generation_id = null;
        $qrysubmodellist = null;
        $qrygeneration = null;
        if (isset($request->generation_id)) {
            $qrygenerationlist = null;
            $qrygeneration = generationsModel::where("id", $request->generation_id)->first();
            $generation_id = $qrygeneration->id;
            $generationsel = $qrygeneration->generations;
            $qrysubmodellist = sub_modelsModel::where("generations_id", $qrygeneration->id)->get();
        }
        $submodelsel = null;
        $submodel_id = null;
        if (isset($request->submodel_id)) {
            $qrysubmodellist = null;
            $qrysubmodel = sub_modelsModel::where("id", $request->submodel_id)->first();
            $submodel_id = $qrysubmodel->id;
            $submodelsel = $qrysubmodel->sub_models;
        }
        $paymentsel = null;
        if(isset($request->payment)) {
            $paymentsel = $request->payment;
        }
        $pricelowsel = null;
        if($request->pricelow == "ต่ำสุด") {
            $pricelowsel = "ราคา ต่ำสุด - ";
        }
        if (isset($pricelow)) {
            $pricelowsel = "ราคา ".$pricelow." - ";
        }
        $pricehighsel = null;
        if($request->pricehigh == "สูงสุด") {
            $pricehighsel = "สูงสุด";
        }
        if (isset($pricehigh)) {
            $pricehighsel = $pricelow;
        }
        $yearlowsel = null;
        if($request->yearlow == "ต่ำสุด -") {
            $yearlowsel = "ปี ต่ำสุด - ";
        }
        if (isset($yearlow)) {
            $yearlowsel = "ปี ".$yearlow;
        }
        $yearhighsel = null;
        if($request->yearhigh == "ทุกปี") {
            $yearlowsel = '';
            $yearhighsel = "ทุกปี";
        }
        if (isset($yearhigh)) {
            $yearhighsel = " ".$yearhigh;
        }
        $colorsel = null;
        if (isset($color)) {
            $qrycolor = carsModel::where("color", $request->color)->first();
            if (empty($qrycolor)) {
                $colorsel = $request->color;
            }
            else {
                $colorsel = $qrycolor->color;
            }
            
        }
        $gearsel = null;
        if ($request->gear == 'auto') {
            $gearsel = "เกียร์อัตโนมัติ";
        }
        if ($request->gear == 'manual') {
            $gearsel = "เกียร์ธรรมดา";
        }
        $powersel = null;
        if (isset($request->power)){
            if ($request->power == 1) {
                $powersel = 'รถน้ำมัน / hybrid';
            }
            if ($request->power == 2) {
                $powersel = 'รถไฟฟ้า EV 100%';
            }
            if ($request->power == 3) {
                $powersel = 'รถติดแก๊ส';
            }
        }
        $provincesel = null;
        if (isset($request->province)) {
            $qryprovince = carsModel::where("province", $request->province)->first();
            if (empty($qryprovince)){
                $provincesel = $request->province;
            }
            else {
                $provincesel = $qryprovince->province;
            }
            
        }


        $cars = carsModel::leftJoin('brands', 'cars.brand_id', '=', 'brands.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
        ->leftJoin('generations', 'cars.generations_id', '=', 'generations.id');
        if (!empty($request->brand_id)) {
            $cars = $cars->where('cars.brand_id', $request->brand_id);
        }
        if (!empty($request->model_id)) {
            $cars = $cars->where('cars.model_id', $request->model_id);
        }
        if (!empty($request->generation_id)) {
            $cars = $cars->where('cars.generations_id', $request->generation_id);
        }
        if (!empty($request->submodel_id)) {
            $cars = $cars->where('cars.sub_models_id', $request->submodel_id);
        }
        if (!empty($request->payment)) {
            $cars = $cars->where('cars.payment', $request->payment);
        }
        if (!empty($pricelow)) {
            $cars = $cars->where('cars.price', '>=', $pricelow);
        }
        if (!empty($pricehigh)) {
            $cars = $cars->where('cars.price', '<=', $pricehigh);
        }
        if (!empty($yearlow)) {
            $cars = $cars->where('cars.modelyear', '>=', $yearlow);
        }
        if (!empty($yearhigh)) {
            $cars = $cars->where('cars.modelyear', '<=', $yearhigh);
        }
        if (!empty($request->color)) {
            $cars = $cars->where('cars.color', $request->color);
        }
        if (!empty($request->gear)) {
            $cars = $cars->where('cars.gear', $request->gear);
        }
        if (!empty($request->power)) {
            if ($request->power == 1) {
                $cars = $cars->where('cars.gas', 'รถน้ำมัน / hybrid');
            }
            if ($request->power == 2) {
                $cars = $cars->where('cars.gas', 'รถไฟฟ้า EV 100%');
            }
            if ($request->power == 3) {
                $cars = $cars->where('cars.gas', 'รถติดแก๊ส');
            }
        }
        if (!empty($request->province_id)) {
            $cars = $cars->where('cars.province', $request->province_id);
        }
        if (!empty($status)) {
            $cars = $cars->where('cars.status', 'approved');
        }
        $cars = $cars->select(
            'cars.*',
            'brands.title as brand_name',
            'models.model as model_name',
            'sub_models.sub_models as submodel_name',
            'generations.generations as generation_name'
        )
        ->where('cars.status', 'approved')
        ->orderBy('cars.modelyear', 'DESC')
        ->orderBy('cars.created_at', 'DESC')
        ->paginate(30);
        // ->getBindings();
        // ->get();
        // ->toSql();
        // return dd($cars);

        $brand = brandsModel::orderBy("sort_no", "ASC")->get();

        $province = provincesModel::orderBy("name_th", "ASC")->get();

        $category = categoriesModel::orderBy("created_at", "DESC")->get();



        return view('frontend/car', [
            "brand" => $brand,
            "cars" => $cars,
            "province" => $province,
            "brandsel" => $brandsel,
            "modelsel" => $modelsel,
            "generationsel" => $generationsel,
            "submodelsel" => $submodelsel,
            "paymentsel" => $paymentsel,
            "pricelowsel" => $pricelowsel,
            "pricehighsel" => $pricehighsel,
            "yearlowsel" => $yearlowsel,
            "yearhighsel" => $yearhighsel,
            "colorsel" => $colorsel,
            "gearsel" => $gearsel,
            "powersel" => $powersel,
            "provincesel" => $provincesel,
            "modellist" => $qrymodellist,
            "generationlist" => $qrygenerationlist,
            "submodellist" => $qrysubmodellist,
            "qrygeneration" => $qrygeneration,
            "brand_id" => $brand_id,
            "model_id" => $model_id,
            "generation_id" => $generation_id,
            "submodel_id" => $submodel_id,
            "category" => $category
        ]);
    }

    public function brandev() {
        $qrybrandev = brandsModel::leftJoin('models', 'brands.id', 'models.brand_id')
        ->select("brands.id", "brands.title")
        // ->where("models.evtype", 1)
        ->groupBy("brands.id", "brands.title")
        ->orderBy("brands.sort_no", "ASC")
        ->get();
        return response()->json($qrybrandev);
    }

    public function brandnotev() {
        $qrybrandnotev = brandsModel::leftJoin('models', 'brands.id', 'models.brand_id')
        ->select("brands.id", "brands.title")
        ->where("models.evtype", 0)
        ->groupBy("brands.id", "brands.title")
        ->orderBy("brands.sort_no", "ASC")
        ->get();
        return response()->json($qrybrandnotev);
    }

    public function searchcategory($category_id) {
        $cars = carsModel::leftJoin('brands', 'cars.brand_id', '=', 'brands.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
        ->leftJoin('generations', 'cars.generations_id', '=', 'generations.id');
        if (!empty($category_id)) {
            $cars = $cars->whereJsonContains('cars.category', $category_id);
        }
        if (!empty($status)) {
            $cars = $cars->where('cars.status', 'approved');
        }
        $cars = $cars->select(
            'cars.*',
            'brands.title as brand_name',
            'models.model as model_name',
            'sub_models.sub_models as submodel_name',
            'generations.generations as generation_name'
        )
        ->where('cars.status', 'approved')
        ->orderBy('cars.modelyear', 'DESC')
        ->orderBy('cars.created_at', 'DESC')
        ->paginate(30);



        $brand = brandsModel::orderBy("sort_no", "ASC")->get();

        $province = provincesModel::orderBy("name_th", "ASC")->get();

        $category = categoriesModel::orderBy("created_at", "DESC")->get();


        return view('frontend/car', [
            "brand" => $brand,
            "cars" => $cars,
            "province" => $province,
            "category" => $category
        ]);
    }

    public function checkprice($brand_id, $model_id) {
        $qrybrandrow = brandsModel::where("id", $brand_id)->first();
        $qrymodelrow = modelsModel::where("id", $model_id)->first();

        $qryyearprice = carsModel::select('cars.modelyear', 'generations.generations as generation_name', 'cars.generations_id')
        ->leftJoin('generations', 'cars.generations_id', '=', 'generations.id')
        ->where('cars.brand_id', $brand_id)
        ->where('cars.model_id', $model_id)
        ->groupBy('cars.generations_id', 'cars.modelyear', 'generations.generations')
        ->orderByDesc('cars.modelyear')
        ->selectRaw('MAX(cars.price) as max_price, MIN(cars.price) as min_price, AVG(cars.price) as avg_price')
        ->get();

        $qrybrand = brandsModel::orderBy("sort_no")->get();
        $province = provincesModel::orderBy("name_th", "ASC")->get();

        $setFooterModel = setFooterModel::all();

        return view('frontend/check-price', [
            "yearprice" => $qryyearprice,
            "brand" => $qrybrand,
            "brandrow" => $qrybrandrow,
            "modelrow" => $qrymodelrow,
            'setFooterModel' => $setFooterModel
        ]);
    }


    public function searchprice($brand_id, $model_id, $generation_id, $price) {
        // return dd($request->yearhigh);
        $pricelow = $price;
        $pricehigh = $price;

        $pricelowsel = $pricelow;
        $pricehighsel = $pricehigh;

        $cars = carsModel::leftJoin('brands', 'cars.brand_id', '=', 'brands.id')
        ->leftJoin('models', 'cars.model_id', '=', 'models.id')
        ->leftJoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
        ->leftJoin('generations', 'cars.generations_id', '=', 'generations.id');
        if (!empty($brand_id)) {
            $cars = $cars->where('cars.brand_id', $brand_id);
        }
        if (!empty($model_id)) {
            $cars = $cars->where('cars.model_id', $model_id);
        }
        if (!empty($generation_id)) {
            $cars = $cars->where('cars.generations_id', $generation_id);
        }
        if (!empty($pricelow)) {
            $cars = $cars->where('cars.price', '>=', $pricelow);
        }
        if (!empty($pricehigh)) {
            $cars = $cars->where('cars.price', '<=', $pricehigh);
        }
        
        $cars = $cars->select(
            'cars.*',
            'brands.title as brand_name',
            'models.model as model_name',
            'sub_models.sub_models as submodel_name',
            'generations.generations as generation_name'
        )
        ->where('cars.status', 'approved')
        ->orderBy('cars.modelyear', 'DESC')
        ->orderBy('cars.created_at', 'DESC')
        ->paginate(30);
        // ->getBindings();
        // ->get();
        // ->toSql();
        // return dd($cars);

        $brand = brandsModel::orderBy("sort_no", "ASC")->get();

        $province = provincesModel::orderBy("name_th", "ASC")->get();

        $category = categoriesModel::orderBy("created_at", "DESC")->get();



        return view('frontend/car', [
            "brand" => $brand,
            "cars" => $cars,
            "province" => $province,
            "category" => $category,
            "pricelowsel" => $pricelowsel,
            "pricehighsel" => $pricehighsel
        ]);
    }

    public function profilesearchmodel(Request $request)
    {
        // $qrymodelsearch = carsModel::leftJoin("models", "cars.model_id", "models.id")
        // ->select("models.id", "models.model")
        // ->where("cars.status", $request->carstatus)
        // ->where('cars.customer_id', $request->customer_id)
        // ->where('cars.brand_id', $request->brand_id)
        // ->orderBy("models.model")
        // ->get();

        $qrymodelsearch = DB::table("cars")->leftJoin("models", "cars.model_id", "models.id")
        ->selectRaw("models.id, models.model, COUNT(models.model) as countmodel")
        ->where("cars.status", $request->carstatus)
        ->where('cars.customer_id', $request->customer_id)
        ->where('cars.brand_id', $request->brand_id)
        ->groupBy('models.id', 'models.model')
        ->orderBy("models.model")
        ->get();




        // ->toSql();
        // ->getBindings();
        // return dd($qrymodelsearch);

        return response()->json(['modelsearch' => $qrymodelsearch]);
    }

    
}
