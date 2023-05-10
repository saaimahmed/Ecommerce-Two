<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//create api Category url
//http://localhost/OWN%20PROJECT/E-commerce-Vue(project)/Ecommerce-vue/Ecomerce_vue/public/api/all-category
Route::get('/all-category',[ApiController::class,'getAllCategory'])->name('all-category');


//create api Product url
//http://localhost/OWN%20PROJECT/E-commerce-Vue(project)/Ecommerce-vue/Ecomerce_vue/public/api/latest-product
Route::get('/latest-product',[ApiController::class,'getLatestProduct'])->name('latest-product');

//product category api
//http://localhost/OWN%20PROJECT/E-commerce-Vue(project)/Ecommerce-vue/Ecomerce_vue/public/api/product-by-category/id
Route::get('/product-by-category/{id}',[ApiController::class,'getProductByCategory'])->name('product-by-category');

//product details api
//http://localhost/OWN%20PROJECT/E-commerce-Vue(project)/Ecommerce-vue/Ecomerce_vue/public/api/product-by-id/id
Route::get('/product-by-id/{id}',[ApiController::class,'getProductById'])->name('product-by-id');
