<?php
// app/Providers/ViewDataServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Models\Customer;
use App\Models\brandsModel;
use App\Models\contacts_backModel;
use App\Models\noticeModel;
use App\Models\carsModel;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

class ViewDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            // Retrieve $customerdata from the session
            $customerdata = session('customer');

            // Check if $customerdata is set
            if ($customerdata && isset($customerdata->id)) {
                // $contacts_back = contacts_backModel::orderBy('id', 'desc')
                //     ->where([
                //         ["customer_id", $customerdata->id],
                //         ["status", 'create'],
                //     ])
                //     ->get();

                $contacts_back = DB::table('contacts_back')
                    ->select('contacts_back.*', 'cars.id', 'cars.status', 'cars.customer_id', 'cars.user_id', 
                    'cars.type', 'cars.brand_id', 'cars.model_id', 'cars.modelyear', 'brands.title as brand_title', 
                    'models.model as model_name', 'customer.*', 'contacts_back.created_at')
                    ->join('cars', 'contacts_back.cars_id', '=', 'cars.id')
                    ->join('brands', 'cars.brand_id', '=', 'brands.id')
                    ->join('models', 'cars.model_id', '=', 'models.id')
                    ->join('customer', 'cars.customer_id', '=', 'customer.id')
                    ->where('cars.customer_id', '=', $customerdata->id)
                    ->where('contacts_back.status', '=', 'create')
                    ->orderBy('contacts_back.id', 'desc')
                    ->get();

                $notice = noticeModel::orderBy('id', 'desc')
                    ->where([
                        ["customer_id", $customerdata->id],
                        ["status", 'create'],
                    ])
                    ->get();


                $mycars = DB::table('cars')
                    ->leftjoin('customer', 'cars.customer_id', '=', 'customer.id')
                    ->leftjoin('brands', 'cars.brand_id', '=', 'brands.id')
                    ->leftjoin('models', 'cars.model_id', '=', 'models.id')
                    ->leftjoin('generations', 'cars.generations_id', '=', 'generations.id')
                    ->leftjoin('sub_models', 'cars.sub_models_id', '=', 'sub_models.id')
                    ->where('customer_id', $customerdata->id)
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
                foreach($mycars as $keystatus => $carstatus){
                    $carfromstatus[$carstatus->status][] = $carstatus;
                }   

                // Share the variables with all views
                $view->with('carfromstatus', $carfromstatus);
                $view->with('contacts_back', $contacts_back);
                $view->with('notice', $notice);
                $view->with('customer_id', $customerdata->id);
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // ...
    }
}
