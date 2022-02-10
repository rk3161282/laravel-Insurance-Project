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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    
    Route::get('/', function () {
      echo "Api Running";
    });
    
    Route::post('/AddProductGroup','\App\Http\Controllers\Api\ApiController@AddProductGroup')->name('AddProductGroup');
    Route::post('/ProductGroupList','\App\Http\Controllers\Api\ApiController@ProductGroupList')->name('ProductGroupList');
    Route::post('/UpdateProductGroup','\App\Http\Controllers\Api\ApiController@UpdateProductGroup')->name('UpdateProductGroup');
    Route::post('/DeleteProductGroup','\App\Http\Controllers\Api\ApiController@DeleteProductGroup')->name('DeleteProductGroup');
    Route::post('/productGroupName','\App\Http\Controllers\Api\ApiController@productGroupName')->name('productGroupName');
    
    Route::post('/AddProductSubGroup','\App\Http\Controllers\Api\ApiController@AddProductSubGroup')->name('AddProductSubGroup');
    Route::post('/ProductSubGroupList','\App\Http\Controllers\Api\ApiController@ProductSubGroupList')->name('ProductSubGroupList');
    Route::post('/UpdateProductSubGroup','\App\Http\Controllers\Api\ApiController@UpdateProductSubGroup')->name('UpdateProductSubGroup');
    Route::post('/DeleteProductSubGroup','\App\Http\Controllers\Api\ApiController@DeleteProductSubGroup')->name('DeleteProductSubGroup');

});
