<?php

use App\Http\Controllers\CMS\CartController;
use App\Http\Controllers\CMS\PaymentsMethodController;
use App\Http\Controllers\CMS\ShipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\EmployeeController;
use App\Http\Controllers\CMS\ClientController;
use App\Http\Controllers\CMS\ColorController;
use App\Http\Controllers\CMS\CouponsController;
use App\Http\Controllers\CMS\InboxController;
use App\Http\Controllers\CMS\OrderController;
use App\Http\Controllers\CMS\ProductController;
use App\Http\Controllers\CMS\SettingController;
use App\Http\Controllers\CMS\SocialMediaPageController;
use App\Http\Controllers\CMS\StaticPagesController;
use App\Http\Controllers\CMS\ContactUsController;
use App\Http\Controllers\CMS\VisitorController;
use App\Http\Controllers\CMS\ExcelController;
use App\Http\Controllers\Employee\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleAuthController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');;
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle'])->name('google-auth-callback');

Route::post('add-password', [GoogleAuthController::class, 'addPassword'])->name('google.auth.password');

// Route::get('/getRegister', [ClientController::class, 'getRegister'])->name('client.getRegister');
// Route::post('/postRegister', [ClientController::class, 'postRegister'])->name('client.register');


Route::get('/test',function ($lang){

});

Route::get('/excel', [ExcelController::class, 'index']);
Route::post('/import', [ExcelController::class, 'import']);
Route::get('/export', [ExcelController::class, 'export']);



Route::get('/exportOrder', [ExcelController::class, 'exportOrder']);
Route::get('/exportProducts', [ExcelController::class, 'exportProducts']);
Route::get('/exportInbox', [ExcelController::class, 'exportInbox']);
Route::get('/exportCoupon', [ExcelController::class, 'exportCoupon']);
Route::get('/exportVisitor', [ExcelController::class, 'exportVisitor']);
Route::get('/exportPaymentMethod', [ExcelController::class, 'exportPaymentMethod']);
Route::get('/exportShipment', [ExcelController::class, 'exportShipment']);



Route::redirect('/', 'home');
Route::redirect('/', 'login');




Route::controller(GoogleAuthController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/call-back', 'handleFacebookCallback')->name('auth.facebookCallback');
});

// $user->rolses()->attach($role->id)
Route::get('lang/{lang}',function ($lang){
    if ( in_array( $lang, \Config::get( 'app.locales' ) ) )
    {
        session( [ 'locale' => $lang ] );
    }

    return redirect()->back();
})->name('lang');

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth','dashmid'],'prefix' => 'admincp'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admincp');
    // Route::get('/clients', [AdminController::class, 'clients'])->name('clients');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/users', [EmployeeController::class, 'users'])->name('users');
    // Route::POST('/users/data_table', [UserController::class, 'users'])->name('users');
    Route::POST('/users', [EmployeeController::class, 'userStore'])->name('user.store');
    Route::POST('/users/update', [EmployeeController::class, 'userUpdate'])->name('user.update');
    Route::GET('/users/new',[EmployeeController::class , 'empPermissions'])->name('admin.get_emp_permissions');
    Route::POST('/users/new',[EmployeeController::class , 'syncPermission'])->name('admin.sync_emp_permissions');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::POST('/categories', [CategoryController::class, 'category_data'])->name('category.data');
    Route::get('/categories/edit', [CategoryController::class, 'category_edit'])->name('category.edit');
    Route::get('/categories/status', [CategoryController::class, 'status'])->name('category.status');
    // Route::PUT('/categories', [CategoryController::class, 'index'])->name('category.update');
    Route::POST('/categories/new', [CategoryController::class, 'updateOrCreate'])->name('category.store');
    Route::get('/categories/parent', [CategoryController::class, 'getAllparent'])->name('category.parent');
    Route::get('/categories/child', [CategoryController::class, 'getAllChild'])->name('category.child');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/new', [ProductController::class, 'create'])->name('product.create');
    Route::get('/products/update', [ProductController::class, 'edit'])->name('product.edit');
    Route::POST('/products/new', [ProductController::class, 'store'])->name('product.store');
    Route::get('/productsShowRate/', [ProductController::class, 'showRate'])->name('product.showRate');



    Route::POST('/products/image/delete', [ProductController ::class, 'delete_image'])->name('product.delete');
    Route::POST('/products', [ProductController ::class, 'products_data'])->name('product.data');
    Route::GET('/products/supplier/', [ProductController ::class, 'supplierData'])->name('product.supplier_data');
    Route::GET('/products/status/', [ProductController ::class, 'status'])->name('product.status');
    Route::GET('/products/supplier/new', [ProductController ::class, 'supplierCreate'])->name('product.supplier.create');
    Route::POST('/products/supplier/new', [ProductController ::class, 'supplierPost'])->name('product.supplier.store');

    Route::GET('/supplier/edit', [ProductController ::class, 'supplierUpdate'])->name('product.supplier.update');
    Route::POST('/supplier/edit', [ProductController ::class, 'supplierUpdatePost'])->name('product.supplier.updatePost');
    Route::GET('/supplier/delete', [ProductController ::class, 'supplierDelete'])->name('product.supplier.delete');


    //////////////////////////////////////////Colors///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::POST('/colors/new', [ColorController::class, 'storeUpdateColor'])->name('color.store.edit');
   Route::POST('/colors', [ColorController ::class, 'color_data'])->name('color.data');
   Route::get('/colors', [ColorController ::class, 'index'])->name('color.index');

     //////////////////////////////////////////clients///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/clients', [ClientController::class, 'clients'])->name('clients');
    Route::POST('/clients', [ClientController::class, 'client_data'])->name('client.data');
    Route::POST('/clients/new', [ClientController::class, 'updateOrCreate'])->name('client.store');
    Route::get('/clients/edit/', [ClientController::class, 'client_edit'])->name('client.edit');
    Route::get('/clients/new', [ClientController::class, 'client_create'])->name('client.create');
    Route::get('/clients/delete', [ClientController::class, 'delete'])->name('client.delete');
    Route::PUT('/clients', [ClientController::class, 'clients'])->name('client.update');


     //////////////////////////////////////////orders///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/done', [OrderController::class, 'getOrdersDelivery'])->name('prder_accept');
    Route::get('/orders/send', [OrderController::class, 'getOrdersSentShipping'])->name('order_send');
//     //////////////////////////////////////////orders///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       //////////////////////////////////////////Coupons///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    Route::controller(CouponsController::class)->prefix('coupons')->name('coupons.')->group(function () {
          Route::get('/', 'index')->name('all');
          Route::get('getCoupon', 'getCoupons');
          Route::get('/add', 'add')->name('add');
          Route::post('/add', 'store')->name('store');
          Route::get('update-status', 'status')->name('status');
          Route::get('delete', 'delete')->name('delete');
          Route::get('edit', 'edit')->name('edit');
          Route::post('edit', 'update')->name('update');
          Route::get('show', 'show')->name('show');

    });


     //////////////////////////////////////////statstic ///////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors');
     Route::POST('/visitors', [VisitorController::class, 'visitor_data'])->name('visitors.data');
     Route::get('/visitors/status', [VisitorController::class, 'block_visitor'])->name('visitors.blocked');







     //////////////////////////////////////////setting///////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     Route::get('/settings', [SettingController::class, 'index'])->name('setting');
     Route::get('/settings/public', [SettingController::class, 'public'])->name('setting.public');
     //////////////////////////////////////////slider///////////////////////////////////////////////////////////////////////
     Route::get('/settings/slider', [SettingController::class, 'slider'])->name('slider');
     Route::POST('/settings/slider', [SettingController::class, 'sliderSync'])->name('slider.sync');
     Route::GET('/settings/slider_edit', [SettingController::class, 'sliderEdit'])->name('slider.edit');
     //////////////////////////////////////////advertising///////////////////////////////////////////////////////////////////////
     Route::get('/settings/advertising', [SettingController::class, 'advertising'])->name('advertising');
     Route::POST('/settings/advertising', [SettingController::class, 'advertisingStore'])->name('advertising.store');

     //////////////////////////////////////////social///////////////////////////////////////////////////////////////////////
     Route::get('/settings/social-media', [SocialMediaPageController::class, 'index'])->name('social.page');
     Route::POST('/settings/social-media/new', [SocialMediaPageController::class, 'store'])->name('social.add');
     //////////////////////////////////////////permission///////////////////////////////////////////////////////////////////////

     Route::get('/settings/public_links', [SettingController::class, 'pageLink'])->name('setting.pages_link');
     Route::POST('/settings/public_links', [SettingController::class, 'links_data'])->name('setting.pages_data');
       Route::get('/public_links/edit', [SettingController::class, 'editPage'])->name('pages_link.edit');
     Route::POST('/public_links/new', [SettingController::class, 'updateOrCreate'])->name('pages_link.store');
     Route::get('/public_links/parent', [SettingController::class, 'getAllparent'])->name('pages_link.parent');
     Route::get('/public_links/child', [SettingController::class, 'getAllChild'])->name('pages_link.child');

     //////////////////////////////////////////pages///////////////////////////////////////////////////////////////////////

     Route::get('/settings/website-pages', [StaticPagesController::class, 'index'])->name('page.index');
     Route::get('/settings/website-pages/create', [StaticPagesController::class, 'create'])->name('page.create');
     Route::post('/settings/website-pages', [StaticPagesController::class, 'updateOrCreate'])->name('page.store');
     Route::post('/settings/website-pages/show', [StaticPagesController::class, 'page_data'])->name('page.data');
     Route::get('/settings/website-pages/update', [StaticPagesController::class, 'edit'])->name('page.edit');
     Route::get('/settings/website-pages/delete', [StaticPagesController::class, 'delete'])->name('page.delete');

     ////////////////////////////////Contact US ////////////////////////////////////////////////
     Route::get('contact-us', [ContactUsController::class, 'create']);
     Route::get('contact-us/reply', [ContactUsController::class, 'reply'])->name('contact.us.reply');
     Route::post('contact-us/reply', [ContactUsController::class, 'replyPost'])->name('contact.us.replyPost');
    Route::get('contact-chat', [ContactUsController::class, 'chat']);
    Route::get('show-massage', [ContactUsController::class, 'showMassage'])->name('showMassage');

     Route::get('inbox1', [ContactUsController::class, 'index']);
     Route::post('inbox-data', [ContactUsController::class, 'inbox_data'])->name('inbox.data');
    //////////////////////////////////////////Payment Methods///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::controller(PaymentsMethodController::class)->prefix('payments-method')->name('paymentsMethod.')->group(function () {
        Route::get('/', 'index')->name('all');
        Route::get('getPayment', 'getPayment');
         Route::get('/add', 'add')->name('add');
         Route::post('/add', 'store')->name('store');
         Route::get('update-status', 'status')->name('status');
        Route::get('delete', 'delete')->name('delete');
        Route::get('edit', 'edit')->name('edit');
        Route::post('edit', 'update')->name('update');


    });
    //////////////////////////////////////////Order///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('all');
        Route::get('getOrder', 'getOrder');
        Route::get('update-status', 'status')->name('status');
        Route::post('update-status', 'status')->name('post_status');
        Route::get('show-Product', 'showOrderProduct')->name('showOrderProduct');



    });
    //////////////////////////////////////////Shipment///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::controller(ShipmentController::class)->prefix('shipment')->name('shipment.')->group(function () {
        Route::get('/', 'index')->name('all');
        Route::get('getShipment', 'getShipment');
        Route::get('/add', 'add')->name('add');
        Route::post('/add', 'store')->name('store');
        Route::get('update-status', 'status')->name('status');
        Route::get('wallet-shipment/chart', 'chartShipment')->name('chartShipment');
        Route::post('wallet-shipment/chart/filter', 'chartFilterShipmentOrder')->name('chartFilterShipment');
//        Route::get('wallet-shipment/chart/filter', 'chartFilterShipmentOrder')->name('chartFilterShipment');

//        Route::get('update-status', 'status')->name('status');
//        Route::get('edit', 'edit')->name('edit');
//        Route::post('edit', 'update')->name('update');
//        Route::get('shipmentOrder', 'shipmentOrder')->name('shipmentOrder');
//        Route::get('updateOrderStatue', 'updateOrderStatue')->name('updateOrderStatue');
//        Route::get('updateOrderStatueVIEW', 'updateOrderStatueVIEW')->name('updateOrderStatueVIEW');
//        Route::Post('delivery-statue', 'deliveryOrderStatue')->name('deliveryOrderStatue');

    });
        /////////////////////////////////////////Cart///////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
            Route::get('/', 'index')->name('all');
            Route::post('/add', 'store')->name('store');

//            Route::get('setProductCart', 'setProductCart');

    });
});

Route::group(['middleware' => ['auth','dashmid'],'prefix' => 'shippingcp'], function () {

    Route::get('/', [ShipmentController::class, 'shipmentOrder'])->name('shippingcp');
    Route::get('shipment/getShipmentOrder', [ShipmentController::class, 'getShipmentOrder'])->name('getShipmentOrder');
    //////////////////////////////////////////Shipment///////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::controller(ShipmentController::class)->prefix('shipment')->name('shipment.')->group(function () {
        Route::get('shipmentOrder', 'shipmentOrder')->name('shipmentOrderTEST');
        Route::get('updateOrderStatue', 'updateOrderStatue')->name('updateOrderStatue');
        Route::get('updateOrderStatueVIEW', 'updateOrderStatueVIEW')->name('updateOrderStatueVIEW');
        Route::Post('delivery-statue', 'deliveryOrderStatue')->name('deliveryOrderStatue');
        Route::get('wallet', 'walletShipment')->name('walletShipment');
        Route::get('show-Product-shipment', 'showOrderProduct')->name('showOrderProductShipment');
        Route::get('exportShipmentOrder', 'exportShipmentOrder')->name('exportShipmentOrder');
        Route::get('wallet/chart', 'chartShipmentOrder')->name('chartShipmentOrder');
        Route::post('wallet/chart/filter', 'chartFilterShipmentOrder')->name('chartFilterShipmentOrder');



    });


});
