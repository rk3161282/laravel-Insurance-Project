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
    Route::post('/productSubGroupName','\App\Http\Controllers\Api\ApiController@productSubGroupName')->name('productSubGroupName');
    Route::post('/getInsurerName','\App\Http\Controllers\Api\ApiController@getInsurerName')->name('getInsurerName');
    
    
    Route::post('/AddProductSubGroup','\App\Http\Controllers\Api\ApiController@AddProductSubGroup')->name('AddProductSubGroup');
    Route::post('/ProductSubGroupList','\App\Http\Controllers\Api\ApiController@ProductSubGroupList')->name('ProductSubGroupList');
    Route::post('/UpdateProductSubGroup','\App\Http\Controllers\Api\ApiController@UpdateProductSubGroup')->name('UpdateProductSubGroup');
    Route::post('/DeleteProductSubGroup','\App\Http\Controllers\Api\ApiController@DeleteProductSubGroup')->name('DeleteProductSubGroup');

    Route::post('/AddProduct','\App\Http\Controllers\Api\ProductController@AddProduct')->name('AddProduct');
    Route::post('/ProductList','\App\Http\Controllers\Api\ProductController@ProductList')->name('ProductList');
    Route::post('/UpdateProduct','\App\Http\Controllers\Api\ProductController@UpdateProduct')->name('UpdateProduct');
    Route::post('/DeleteProduct','\App\Http\Controllers\Api\ProductController@DeleteProduct')->name('DeleteProduct');

    
    Route::post('/AddSericeTaxGst','\App\Http\Controllers\Api\ServiceTaxController@AddSericeTaxGst')->name('AddSericeTaxGst');
    Route::post('/SericeTaxGstList','\App\Http\Controllers\Api\ServiceTaxController@SericeTaxGstList')->name('SericeTaxGstList');
    Route::post('/UpdateSericeTaxGst','\App\Http\Controllers\Api\ServiceTaxController@UpdateSericeTaxGst')->name('UpdateSericeTaxGst');
    Route::post('/DeleteSericeTaxGst','\App\Http\Controllers\Api\ServiceTaxController@DeleteSericeTaxGst')->name('DeleteSericeTaxGst');

    Route::post('/AddInsuranceCompany','\App\Http\Controllers\Api\InsuranceCompanyController@AddInsuranceCompany')->name('AddInsuranceCompany');
    Route::post('/InsuranceCompanyList','\App\Http\Controllers\Api\InsuranceCompanyController@InsuranceCompanyList')->name('InsuranceCompanyList');
    Route::post('/UpdateInsuranceCompany','\App\Http\Controllers\Api\InsuranceCompanyController@UpdateInsuranceCompany')->name('UpdateInsuranceCompany');
    Route::post('/DeleteInsuranceCompany','\App\Http\Controllers\Api\InsuranceCompanyController@DeleteInsuranceCompany')->name('DeleteInsuranceCompany');

    Route::post('/AddInsuranceBranch','\App\Http\Controllers\Api\InsuranceBranchController@AddInsuranceBranch')->name('AddInsuranceBranch');
    Route::post('/InsuranceBranchList','\App\Http\Controllers\Api\InsuranceBranchController@InsuranceBranchList')->name('InsuranceBranchList');
    Route::post('/UpdateInsuranceBranch','\App\Http\Controllers\Api\InsuranceBranchController@UpdateInsuranceBranch')->name('UpdateInsuranceBranch');
    Route::post('/DeleteInsuranceBranch','\App\Http\Controllers\Api\InsuranceBranchController@DeleteInsuranceBranch')->name('DeleteInsuranceBranch');
    
    Route::post('/AddBrokerBranch','\App\Http\Controllers\Api\BrokerBranchController@AddBrokerBranch')->name('AddBrokerBranch');
    Route::post('/BrokerBranchList','\App\Http\Controllers\Api\BrokerBranchController@BrokerBranchList')->name('BrokerBranchList');
    Route::post('/UpdateBrokerBranch','\App\Http\Controllers\Api\BrokerBranchController@UpdateBrokerBranch')->name('UpdateBrokerBranch');
    Route::post('/DeleteBrokerBranch','\App\Http\Controllers\Api\BrokerBranchController@DeleteBrokerBranch')->name('DeleteBrokerBranch');
    

    
    
    
});
