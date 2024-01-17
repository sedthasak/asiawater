<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\DarkModeController;
use App\Http\Controllers\Backend\ColorSchemeController;

use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\LogsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\ModelsController;
use App\Http\Controllers\Backend\GenerationsController;
use App\Http\Controllers\Backend\Sub_modelsController;
use App\Http\Controllers\Backend\PostsController;
use App\Http\Controllers\Backend\CustomersController;
use App\Http\Controllers\Backend\ContactsController;

use App\Http\Controllers\Frontend\QrCodeController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Frontend\SmsController;
use App\Http\Controllers\Frontend\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});

// Route::get('/login-page', [AuthController::class, 'loginView']);
// Route::post('/login', [AuthController::class, 'login']);


Route::controller(FrontendPageController::class)->group(function() {
        

});

Route::middleware('sessionlogin')->group(function() {

    Route::controller(PostController::class)->group(function() {


        // Route::delete('/carpost-delete/{id}', 'PostController@destroy')->name('carpost.destroy');

        Route::post('/carpost-delete', 'carpostdeleteactionPage')->name('carpostdeleteactionPage');
        Route::post('/update-click-count/{car}', 'updateClickCount')->name('updaupdateClickCountteClickCount');
   

        // Route::post('/carpost-delete', 'PostController@carpostdeleteactionPage')->name('carpostdeleteactionPage');



        Route::post('/carpost-select-brand', 'carpostSelectBrand')->name('carpostSelectBrand');
        Route::post('/carpost-select-model', 'carpostSelectModel')->name('carpostSelectModel');
        Route::post('/carpost-select-generations', 'carpostSelectGenerations')->name('carpostSelectGenerations');
        Route::post('/carpost-select-generations-year', 'carpostSelectGenerationsYear')->name('carpostSelectGenerationsYear');
        Route::post('/carpost-select-sub_models', 'carpostSelectSub_model')->name('carpostSelectSub_model');

        Route::get('/carpost-step1', 'carpoststep1Page')->name('carpoststep1Page');
        // Route::get('/carpost-register', 'carpostregisterPage')->name('carpostregisterPage');
        Route::post('/carpost-register', 'carpostregisterPage')->name('carpostregisterPage');
        Route::get('/carpost-register-edit/{post}', 'carpostregistereditPage')->name('carpostregistereditPage');
        Route::get('/carpost-register-success', 'carpostregistersuccessPage')->name('carpostregistersuccessPage');
        Route::post('/carpost-register-submit', 'carpostregisterSubmitPage')->name('carpostregisterSubmitPage');
        Route::post('/carpost-register-edit-submit', 'carpostregistereditubmitPage')->name('carpostregistereditubmitPage');
        Route::post('/exterior-upload', 'exteriorupload')->name('exteriorupload');
    });

    Route::controller(FrontendPageController::class)->group(function() {

        Route::get('/profile', 'profilePage')->name('profilePage');
        Route::post('/update-reserve', 'updatereservePage')->name('updatereservePage');
        Route::post('/update-contackback', 'updatecontackbackPage')->name('updatecontackbackPage');
        Route::post('/update-price', 'updatepricePage')->name('updatepricePage');



        Route::get('/dev', 'DevelopPage')->name('DevelopPage');
        
        
        
        Route::get('/login-welcome', 'loginwelcomePage')->name('loginwelcomePage');
        Route::get('/edit-profile-first', 'editprofilePage_afterregis')->name('editprofilePage_afterregis');
        Route::get('/edit-profile', 'editprofilePage')->name('editprofilePage');
        Route::post('/edit-profile-action', 'editprofileactionPage')->name('editprofileactionPage');

        Route::get('/notification', 'notificationPage')->name('notificationPage');
        Route::get('/termcondition', 'termconditionPage')->name('termconditionPage');
        Route::get('/privacypolicy', 'privacypolicyPage')->name('privacypolicyPage');
        
        Route::get('/postcar-welcome', 'postcarwelcomePage')->name('postcarwelcomePage');
        Route::get('/postcar-welcome-dealer', 'postcarwelcomedealerPage')->name('postcarwelcomedealerPage');
        Route::get('/postcar-welcome-lady', 'postcarwelcomeladyPage')->name('postcarwelcomeladyPage');
        Route::get('/postcar', 'postcarPage')->name('postcarPage');
        Route::get('/carpost-step2', 'carpoststep2Page')->name('carpoststep2Page');
        Route::get('/carpost-step3', 'carpoststep3Page')->name('carpoststep3Page');
        Route::get('/carpost-step4', 'carpoststep4Page')->name('carpoststep4Page');
        
        Route::get('/profile-check', 'profilecheckPage')->name('profilecheckPage');
        Route::get('/profile-editcarinfo', 'profileeditcarinfoPage')->name('profileeditcarinfoPage');
        Route::get('/profile-expire', 'profileexpirePage')->name('profileexpirePage');
        Route::get('/performance', 'performancePage')->name('performancePage');
        Route::get('/performance-viewpost', 'performanceviewpostPage')->name('performanceviewpostPage');
        Route::get('/performance-view', 'performanceviewPage')->name('performanceviewPage');
        Route::get('/check-price', 'checkpricePage')->name('checkpricePage');
        Route::get('/customer-contact', 'customercontactPage')->name('customercontactPage');
        Route::get('/update-carprice', 'updatecarpricePage')->name('updatecarpricePage');

        // Route::post('/update-status', 'contactupdateStatus')->name('contactupdateStatus');
        Route::post('/updateContactStatus/{id}', 'updateContactStatus')->name('updateContactStatus');


        Route::get('/dealer-carpost-step1', 'dealercarpoststep1Page')->name('dealercarpoststep1Page');
        Route::get('/dealer-carpost-step2', 'dealercarpoststep2Page')->name('dealercarpoststep2Page');
        Route::get('/dealer-carpost-step3', 'dealercarpoststep3Page')->name('dealercarpoststep3Page');
        Route::get('/dealer-carpost-step4', 'dealercarpoststep4Page')->name('dealercarpoststep4Page');
        Route::get('/edit-carpost-step1', 'editcarpoststep1Page')->name('editcarpoststep1Page');
        Route::get('/edit-carpost-step2', 'editcarpoststep2Page')->name('editcarpoststep2Page');
        Route::get('/edit-carpost-step3', 'editcarpoststep3Page')->name('editcarpoststep3Page');
        Route::get('/edit-carpost-step4', 'editcarpoststep4Page')->name('editcarpoststep4Page');
        Route::get('/edit-dealer-carpost-step1', 'editdealercarpoststep1Page')->name('editdealercarpoststep1Page');
        Route::get('/edit-dealer-carpost-step2', 'editdealercarpoststep2Page')->name('editdealercarpoststep2Page');
        Route::get('/edit-dealer-carpost-step3', 'editdealercarpoststep3Page')->name('editdealercarpoststep3Page');
        Route::get('/edit-dealer-carpost-step4', 'editdealercarpoststep4Page')->name('editdealercarpoststep4Page');

        Route::get('/profilesearchmodel/{data}', 'profilesearchmodel')->name('profilesearchmodel');
        
        Route::get('/searchprofilepage', 'searchprofilePage')->name('searchprofilePage');
        Route::get('/searchprofilecheckpage', 'searchprofilecheckPage')->name('searchprofilecheckPage');
        Route::get('/searchprofileeditcarinfopage', 'searchprofileeditcarinfoPage')->name('searchprofileeditcarinfoPage');
        Route::get('/searchprofileexpirepage', 'searchprofileexpirePage')->name('searchprofileexpirePage');
    });
});


Route::get('login-system', [AuthController::class, 'backendLogin'])->name('backendLogin');
Route::get('loopidentity', [FrontendPageController::class, 'loopidentity'])->name('loopidentity');
Route::get('/generate-qrcode', [QrCodeController::class, 'index']);
Route::get("/clearsessioncustomer", [FrontendPageController::class, 'clearsessioncustomer']);
Route::get('/login', [FrontendPageController::class, 'loginPage'])->name('loginPage');
Route::get('/', [FrontendPageController::class, 'indexPage'])->name('indexPage');
Route::post('helpcaraction', [FrontendPageController::class, 'helpcaractionPage'])->name('helpcaractionPage');
Route::post('contactcaraction', [FrontendPageController::class, 'contactcaractionPage'])->name('contactcaractionPage');
Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::get('/news', [FrontendPageController::class, 'newsPage'])->name('newsPage');
Route::get('/news-detail/{news_id}', [FrontendPageController::class, 'newsdetailPage'])->name('newsdetailPage');
Route::get('/car', [FrontendPageController::class, 'carPage'])->name('carPage');
Route::get('/car-detail/{post}', [FrontendPageController::class, 'cardetailPage'])->name('cardetailPage');
Route::get('/popup-carsearch-model/{id}', [FrontendPageController::class, 'popupcarsearchmodel'])->name('popupcarsearchmodel');
Route::get('/popup-carsearch-generation/{id}', [FrontendPageController::class, 'popupcarsearchgeneration'])->name('popupcarsearchgeneration');
Route::get('/popup-carsearch-submodel/{id}', [FrontendPageController::class, 'popupcarsearchsubmodel'])->name('popupcarsearchsubmodel');
Route::get('/popup-carsearch-year/{id}', [FrontendPageController::class, 'popupcarsearchyear'])->name('popupcarsearchyear');
Route::get('/searchbrandtext/{brand_name}', [FrontendPageController::class, 'searchbrandtext'])->name('searchbrandtext');
Route::get('/searchmodeltext/{brand_id}/{model_name}', [FrontendPageController::class, 'searchmodeltext'])->name('searchmodeltext');
Route::get('/searchgenerationtext/{model_id}/{generation_name}', [FrontendPageController::class, 'searchgenerationtext'])->name('searchgenerationtext');
Route::get('/searchsubmodeltext/{generation_id}/{submodel_name}', [FrontendPageController::class, 'searchsubmodeltext'])->name('searchsubmodeltext');
Route::get('/search/{brand_id}/{model_id}/{generation_id}/{submodel_id}/{evtype}/{payment}/{pricelow}/{pricehigh}/{color}/{gear}/{power}/{province_id}/{yearlow}/{yearhigh}',  [FrontendPageController::class, 'search'])->name('search');
Route::get('/search2',  [FrontendPageController::class, 'search2']);
Route::get('/brandev', [FrontendPageController::class, 'brandev'])->name('brandev');
Route::get('/brandnotev', [FrontendPageController::class, 'brandnotev'])->name('brandnotev');
Route::get('/search-category/{id}', [FrontendPageController::class, 'searchcategory'])->name('searchcategory');
Route::get('/check-price/{brand_id}/{model_id}', [FrontendPageController::class, 'checkprice'])->name('checkprice');
Route::get('/search-price/{brand_id}/{model_id}/{generation_id}/{price}', [FrontendPageController::class, 'searchprice'])->name('searchprice');
Route::get('/carpost-register', function(){
    return redirect('/');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');        


    Route::get('/backend', [BackendPageController::class, 'backendDashboard'])->name('backendDashboard');
    Route::get('/backend/profile', [UsersController::class, 'BN_profile'])->name('BN_profile');
    Route::get('/backend/profile-edit', [UsersController::class, 'BN_profile_edit'])->name('BN_profile_edit');
    Route::post('/backend/profile-edit-action', [UsersController::class, 'BN_profile_edit_action'])->name('BN_profile_edit_action');


        
    Route::group(['middleware' => ['job_access']], function () {

        Route::prefix('backend')->group(function () {


            Route::prefix('customers')->group(function () {

                Route::get('', [CustomersController::class, 'BN_customers'])->name('BN_customers');
                Route::get('/fetch', [CustomersController::class, 'BN_customersFetch'])->name('BN_customersFetch');
                Route::get('/add', [CustomersController::class, 'BN_customers_add'])->name('BN_customers_add');
                Route::post('/add-action', [CustomersController::class, 'BN_customers_add_action'])->name('BN_customers_add_action');
                Route::get('/edit/{id}', [CustomersController::class, 'BN_customers_edit'])->name('BN_customers_edit');
                Route::post('/edit-action', [CustomersController::class, 'BN_customers_edit_action'])->name('BN_customers_edit_action');
                Route::get('/detail/{id}', [CustomersController::class, 'BN_customers_detail'])->name('BN_customers_detail');

            });

            Route::prefix('posts')->group(function () {

                Route::get('', [PostsController::class, 'BN_posts'])->name('BN_posts');
                Route::get('add', [PostsController::class, 'BN_posts_add'])->name('BN_posts_add');
                Route::get('excelpostsell', [PostsController::class, 'BN_posts_excelpostsell'])->name('BN_posts_excelpostsell');
                Route::post('excelpostsell-store', [PostsController::class, 'BN_posts_excelpostsell_store'])->name('BN_posts_excelpostsell_store');
                Route::get('fetch', [PostsController::class, 'BN_postsFetch'])->name('BN_postsFetch');
                Route::post('add-action', [PostsController::class, 'BN_posts_add_action'])->name('BN_posts_add_action');
                Route::get('detail/{id}', [PostsController::class, 'BN_posts_detail'])->name('BN_posts_detail');
                Route::get('edit/{id}', [PostsController::class, 'BN_posts_edit'])->name('BN_posts_edit');
                Route::post('edit-action', [PostsController::class, 'BN_posts_edit_action'])->name('BN_posts_edit_action');
                Route::post('status-action', [PostsController::class, 'BN_posts_status_action'])->name('BN_posts_status_action');

            });

            Route::prefix('car')->group(function () {

                Route::get('', [BrandsController::class, 'BN_car'])->name('BN_car');

                Route::get('excelcars-add', [BrandsController::class, 'BN_excelcars_add'])->name('BN_excelcars_add');
                Route::post('excelcars-store', [BrandsController::class, 'BN_excelcars_store'])->name('BN_excelcars_store');

                Route::get('brands', [BrandsController::class, 'BN_brands'])->name('BN_brands');
                Route::get('brands-add', [BrandsController::class, 'BN_brands_add'])->name('BN_brands_add');
                Route::get('brands-edit/{id}', [BrandsController::class, 'BN_brands_edit'])->name('BN_brands_edit');
                Route::post('brands-add-action', [BrandsController::class, 'BN_brands_add_action'])->name('BN_brands_add_action');
                Route::post('brands-edit-action', [BrandsController::class, 'BN_brands_edit_action'])->name('BN_brands_edit_action');
                Route::get('brandsfetch', [BrandsController::class, 'BN_brandsFetch'])->name('BN_brandsFetch');
                Route::get('brands-preview/{id}', [BrandsController::class, 'BN_brands_preview'])->name('BN_brands_preview');

                Route::get('models', [ModelsController::class, 'BN_carmd'])->name('BN_carmd');
                Route::get('models-add', [ModelsController::class, 'BN_carmd_add'])->name('BN_carmd_add');
                Route::get('models-edit/{id}', [ModelsController::class, 'BN_carmd_edit'])->name('BN_carmd_edit');
                Route::post('models-add-action', [ModelsController::class, 'BN_carmd_add_action'])->name('BN_carmd_add_action');
                Route::post('models-edit-action', [ModelsController::class, 'BN_carmd_edit_action'])->name('BN_carmd_edit_action');
                Route::get('modelsfetch', [ModelsController::class, 'BN_carmdFetch'])->name('BN_carmdFetch');

                Route::get('generations', [GenerationsController::class, 'BN_generations'])->name('BN_generations');
                Route::get('generations-add', [GenerationsController::class, 'BN_generations_add'])->name('BN_generations_add');
                Route::post('generations-add-action', [GenerationsController::class, 'BN_generations_add_action'])->name('BN_generations_add_action');
                Route::get('generations-edit/{id}', [GenerationsController::class, 'BN_generations_edit'])->name('BN_generations_edit');
                Route::post('generations-edit-action', [GenerationsController::class, 'BN_generations_edit_action'])->name('BN_generations_edit_action');
                Route::get('generationsfetch', [GenerationsController::class, 'BN_generationsFetch'])->name('BN_generationsFetch');

                Route::get('sub_models', [Sub_modelsController::class, 'BN_sub_models'])->name('BN_sub_models');
                Route::get('sub_models-add', [Sub_modelsController::class, 'BN_sub_models_add'])->name('BN_sub_models_add');
                Route::post('sub_models-add-action', [Sub_modelsController::class, 'BN_sub_models_add_action'])->name('BN_sub_models_add_action');
                Route::get('sub_models-edit/{id}', [Sub_modelsController::class, 'BN_sub_models_edit'])->name('BN_sub_models_edit');
                Route::post('sub_models-edit-action', [Sub_modelsController::class, 'BN_sub_models_edit_action'])->name('BN_sub_models_edit_action');
                Route::get('sub_modelsfetch', [Sub_modelsController::class, 'BN_sub_modelsFetch'])->name('BN_sub_modelsFetch');

                // Route::get('generations', [BackendPageController::class, 'BN_generations'])->name('BN_generations');
                // Route::get('sub_models', [BackendPageController::class, 'BN_sub_models'])->name('BN_sub_models');

            });

            Route::prefix('categories')->group(function () {

                Route::get('', [CategoriesController::class, 'BN_categories'])->name('BN_categories');
                Route::get('add', [CategoriesController::class, 'BN_categories_add'])->name('BN_categories_add');
                Route::get('edit/{id}', [CategoriesController::class, 'BN_categories_edit'])->name('BN_categories_edit');
                Route::post('add-action', [CategoriesController::class, 'BN_categories_add_action'])->name('BN_categories_add_action');
                Route::post('edit-action', [CategoriesController::class, 'BN_categories_edit_action'])->name('BN_categories_edit_action');
                Route::get('fetch', [CategoriesController::class, 'BN_categoriesFetch'])->name('BN_categoriesFetch');

            });

            Route::prefix('tags')->group(function () {

                Route::get('', [BackendPageController::class, 'BN_tags'])->name('BN_tags');

            });

            Route::prefix('news')->group(function () {

                Route::get('', [NewsController::class, 'BN_news'])->name('BN_news');
                Route::get('add', [NewsController::class, 'BN_news_add'])->name('BN_news_add');
                Route::get('edit/{id}', [NewsController::class, 'BN_news_edit'])->name('BN_news_edit');
                Route::post('add-action', [NewsController::class, 'BN_news_add_action'])->name('BN_news_add_action');
                Route::post('edit-action', [NewsController::class, 'BN_news_edit_action'])->name('BN_news_edit_action');
                Route::get('fetch', [NewsController::class, 'BN_newsFetch'])->name('BN_newsFetch');
                Route::get('index', [NewsController::class, 'BN_newsIndex'])->name('BN_newsIndex');
                Route::post('store', [NewsController::class, 'BN_news_store'])->name('BN_news_store');

            });

            Route::prefix('users')->group(function () {

                Route::get('', [UsersController::class, 'BN_user'])->name('BN_user');
                Route::get('fetch', [UsersController::class, 'BN_usersFetch'])->name('BN_usersFetch');
                Route::get('add', [UsersController::class, 'BN_user_add'])->name('BN_user_add');
                Route::post('action', [UsersController::class, 'BN_user_add_action'])->name('BN_user_add_action');
                Route::get('edit/{id}', [UsersController::class, 'BN_user_edit'])->name('BN_user_edit');
                Route::post('edit-action', [UsersController::class, 'BN_user_edit_action'])->name('BN_user_edit_action');

            });

            Route::prefix('contacts')->group(function () {

                Route::get('', [ContactsController::class, 'BN_contacts'])->name('BN_contacts');

            });

            Route::prefix('setting')->group(function () {

                Route::get('main', [BackendPageController::class, 'BN_setting'])->name('BN_setting');
                Route::get('slide', [BackendPageController::class, 'BN_slide'])->name('BN_slide');
                Route::get('setfooter', [BackendPageController::class, 'BN_setfooter'])->name('BN_setfooter');
                Route::get('termcondition', [BackendPageController::class, 'BN_termcondition'])->name('BN_termcondition');
                Route::get('privacypolicy', [BackendPageController::class, 'BN_privacypolicy'])->name('BN_privacypolicy');
                Route::post('slide-update', [BackendPageController::class, 'BN_slideupdate'])->name('BN_slideupdate');
                Route::post('slide-delete', [BackendPageController::class, 'BN_slidedelete'])->name('BN_slidedelete');
                Route::post('setfooter-update', [BackendPageController::class, 'BN_setfooterupdate'])->name('BN_setfooterupdate');
                Route::post('termcondition-update', [BackendPageController::class, 'BN_termcondition_update'])->name('BN_termcondition_update');
                Route::post('privacypolicy-update', [BackendPageController::class, 'BN_privacypolicy_update'])->name('BN_privacypolicy_update');


            });

            Route::prefix('logs')->group(function () {

                Route::get('', [LogsController::class, 'BN_logs'])->name('BN_logs');
                Route::get('fetch', [LogsController::class, 'BN_logsFetch'])->name('BN_logsFetch');

            });

            Route::prefix('dev')->group(function () {

                Route::get('', [BackendPageController::class, 'BN_dev'])->name('BN_dev');

            });

            
        });

    });

    





    
    
    

    
    

    

    


    

    

    

    

    

    

    

    


    Route::controller(PageController::class)->group(function() {
        // Route::get('/', 'backendDashboard')->name('backendDashboard');
        // Route::get('login-page', 'login')->name('login');
        
        Route::get('dashboard-overview-1-page', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
        Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
        Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
        Route::get('inbox-page', 'inbox')->name('inbox');
        Route::get('file-manager-page', 'fileManager')->name('file-manager');
        Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
        Route::get('chat-page', 'chat')->name('chat');
        Route::get('post-page', 'post')->name('post');
        Route::get('calendar-page', 'calendar')->name('calendar');
        Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        Route::get('crud-form-page', 'crudForm')->name('crud-form');
        Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
        Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
        Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
        Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
        Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
        Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
        Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
        Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
        Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
        Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
        Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
        Route::get('register-page', 'register')->name('register');
        Route::get('error-page-page', 'errorPage')->name('error-page');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('regular-table-page', 'regularTable')->name('regular-table');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('modal-page', 'modal')->name('modal');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    });
});