<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->apiResource("product","Api\ProductsController");
Route::put("product/put/{productId}","Api\ProductsController@update");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/users/data","Api\UserController@data");
Route::get('/merhaba',function (){
    return "Restfull Api";
});

Route::post('/uploads','Api\UploadController@upload_form');


Route::get("/users/insert","Api\UserController@store");
Route::get("/users/customer12","Api\UserController@custom12");
Route::get('product/custom12','Api\ProductController@custom12');
Route::get('product/custom1','Api\ProductController@custom1')->middleware('auth:api');

Route::get('categories/custom1','Api\CategoriesController@custom1');

Route::get('product/custom2','Api\ProductController@custom2');
Route::get('categories/report1','Api\CategoriesController@report1');
Route::get('product/listwithcategories','Api\ProductController@listWithCategories');





Route::apiResource("/categories","Api\CategoriesController");
Route::apiResource("/users","Api\UserController");

Route::middleware('auth.basic')->get('/user-basic',function(Request $request){
   return $request->user();
});
Route::post('/auth/login','Api\AuthController@login');





Route::middleware('api-token')->group(function(){
    Route::get('/auth/token', function (Request $request) {
        $user = $request->user();
        return response()->json([
            'name' => $user->name,
            'access_token' => $user->api_token
        ]);
    });
});


