<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CardController;
use App\Http\Controllers\Backend\UserListController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomerAuthController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Backend\AdminOrderController;
use App\Http\Controllers\Backend\ReportController;


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

Route::get('/',[FrontendController::class,'index'])->name('home');

Route::get('/product-category/{id}',[FrontendController::class,'categoryProduct'])->name('product-category');
Route::get('/product-sub-category/{id}',[FrontendController::class,'subCategoryProduct'])->name('product-sub-category');
Route::get('/product-detail-info/{id}',[FrontendController::class,'productDetail'])->name('product-detail-info');
//Card Controller
Route::post('/add-to-card/{id}',[CardController::class,'addToCard'])->name('add-to-card');
Route::get('/show-card-product',[CardController::class,'showCard'])->name('show-card');
Route::post('/update-cart-product/{id}',[CardController::class,'updateCard'])->name('update-cart-product');
Route::get('/delete-card-product/{id}',[CardController::class,'deleteCard'])->name('delete-card-product');
//checkout
Route::get('/checkout',[CheckoutController::class,'createCheck'])->name('checkout');
Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');


Route::get('/get-email-status',[CheckoutController::class,'emailStatus'])->name('get-email-status');



//customer Authentication
Route::get('/customer-login',[CustomerAuthController::class,'login'])->name('customer-login')->middleware('customer_logout_middleware');
Route::post('/customer-login-check',[CustomerAuthController::class,'loginCheck'])->name('customer-login-check');
Route::get('/customer-register',[CustomerAuthController::class,'register'])->name('customer-register')->middleware('customer_logout_middleware');
Route::post('/new-customer-register',[CustomerAuthController::class,'newCustomerRegister'])->name('new-customer-register');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');
//Customer dashboard
Route::get('/customer-dashboard',[CustomerDashboardController::class,'customerDashboard'])->name('customer-dashboard')->middleware('customer_middleware');



//Backend
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard',[BackendController::class,'dashboard'])->name('dashboard');

    //  User List and Role management
    Route::get('/user-list',[UserListController::class,'listUser'])->name('user-list');
// user role
    Route::get('/edit-user-role/{id}',[UserListController::class,'editRoleUser'])->name('edit-user-role');
    Route::post('/update-user-role/{id}',[UserListController::class,'updateRoleUser'])->name('update-user-role');
//  User Delete
    Route::post('/delete-user/{id}',[UserListController::class,'deleteUser'])->name('delete-user');

//CategoryController
    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage-category');
    Route::post('/category.create',[CategoryController::class,'createCategory'])->name('category.create');
    Route::get('/edit.category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update.category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::get('/delete.category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
    Route::get('/status.category/{id}',[CategoryController::class,'changeCategory'])->name('status.category');

//SubCategoryController
   Route::get('/add-sub-category',[SubCategoryController::class,'addSubCategory'])->name('add-sub-category');
   Route::post('/create-sub-category',[SubCategoryController::class,'createSubCategory'])->name('create.sub-category');
   Route::get('/manage-sub-category',[SubCategoryController::class,'manageSubCategory'])->name('manage-sub-category');
   Route::get('/edit-sub-category/{id}',[SubCategoryController::class,'editSubCategory'])->name('edit.sub-category');
   Route::post('/update-sub-category/{id}',[SubCategoryController::class,'updateSubCategory'])->name('update.sub-category');
   Route::post('/delete-sub-category/{id}',[SubCategoryController::class,'deleteSubCategory'])->name('delete.sub-category');
   Route::get('/status-sub-category/{id}',[SubCategoryController::class,'statusSubCategory'])->name('status.sub-category');

   //BrandController
    Route::resource('brands',BrandController::class);
    Route::get('brands-view/{id}', [BrandController::class, 'view'])->name('brands.view');

    //UnitController
    Route::resource('units',UnitController::class);

    //ProductControllerAbc
    Route::get('/products.index',[ProductController::class,'index'])->name('products.index');
    Route::get('/get-sub-category-by-category-id',[ProductController::class,'getSubCategory'])->name('product.sub-category');
    Route::get('/products.create',[ProductController::class,'create'])->name('products.create');
    Route::post('/products.store',[ProductController::class,'store'])->name('products.store');
    Route::get('/products.view/{id}',[ProductController::class,'details'])->name('products.view');
    Route::get('/product-edit/{id}',[ProductController::class,'editProduct'])->name('product-edit');
    Route::get('/products.status/{id}',[ProductController::class,'statusProduct'])->name('products.status');
    Route::post('/products.update/{id}',[ProductController::class,'updateProduct'])->name('products.update');
    Route::post('/product.delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');



    //Admin Order Controller
    Route::get('/admin-order-manage',[AdminOrderController::class,'orderManage'])->name('order-manage');
    Route::get('/admin-order-detail/{id}',[AdminOrderController::class,'orderDetail'])->name('admin-order-detail');
    Route::get('/admin-order-invoice/{id}',[AdminOrderController::class,'orderInvoice'])->name('admin-order-invoice');
    Route::get('/admin-order-print/{id}',[AdminOrderController::class,'orderPrint'])->name('admin-order-print');
    Route::get('/admin-order-edit/{id}',[AdminOrderController::class,'orderEdit'])->name('admin-order-edit');
    Route::post('/admin-order-update/{id}',[AdminOrderController::class,'orderUpdate'])->name('admin-order-update');
    Route::get('/admin-order-delete/{id}',[AdminOrderController::class,'orderDelete'])->name('admin-order-delete');

    //order report
    Route::get('/order-report',[ReportController::class,'reportOrder'])->name('order-report');
    Route::post('/order-report-monthly-show',[ReportController::class,'reportOrderShow'])->name('order-report-monthly-show');
});
