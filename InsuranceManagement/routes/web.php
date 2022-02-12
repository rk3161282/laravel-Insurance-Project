<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','\App\Http\Controllers\DesignController@index')->name('dashboard');
Route::get('/auth-login','\App\Http\Controllers\DesignController@auth_login')->name('auth-login');
Route::get('/auth-register','\App\Http\Controllers\DesignController@auth_register')->name('auth-register');
Route::get('/auth-recoverpw','\App\Http\Controllers\DesignController@auth_recoverpw')->name('auth-recoverpw');
Route::get('/auth-lock-screen','\App\Http\Controllers\DesignController@auth_lock_screen')->name('auth-lock-screen');
Route::get('/auth-logout','\App\Http\Controllers\DesignController@auth_logout')->name('auth-logout');
Route::get('/auth-confirm-mail','\App\Http\Controllers\DesignController@auth_confirm_mail')->name('auth-confirm-mail');
Route::get('/auth-email-verification','\App\Http\Controllers\DesignController@auth_email_verification')->name('auth-email-verification');
Route::get('/auth-two-step-verification','\App\Http\Controllers\DesignController@auth_two_step_verification')->name('auth-two-step-verification');

Route::get('/pages-starter','\App\Http\Controllers\DesignController@pages_starter')->name('pages-starter');
Route::get('/pages-maintenance','\App\Http\Controllers\DesignController@pages_maintenance')->name('pages-maintenance');
Route::get('/pages-comingsoon','\App\Http\Controllers\DesignController@pages_comingsoon')->name('pages-comingsoon');
Route::get('/pages-timeline','\App\Http\Controllers\DesignController@pages_timeline')->name('pages-timeline');
Route::get('/pages-faqs','\App\Http\Controllers\DesignController@pages_faqs')->name('pages-faqs');
Route::get('/pages-pricing','\App\Http\Controllers\DesignController@pages_pricing')->name('pages-pricing');
Route::get('/pages-404','\App\Http\Controllers\DesignController@pages_404')->name('pages-404');
Route::get('/pages-500','\App\Http\Controllers\DesignController@pages_500')->name('pages-500');

Route::get('/form-elements','\App\Http\Controllers\DesignController@form_elements')->name('form-elements');
Route::get('/form-validation','\App\Http\Controllers\DesignController@form_validation')->name('form-validation');
Route::get('/form-advanced','\App\Http\Controllers\DesignController@form_advanced')->name('form-advanced');
Route::get('/form-editors','\App\Http\Controllers\DesignController@form_editors')->name('form-editors');
Route::get('/form-uploads','\App\Http\Controllers\DesignController@form_uploads')->name('form-uploads');
Route::get('/form-wizard','\App\Http\Controllers\DesignController@form_wizard')->name('form-wizard');
Route::get('/form-mask','\App\Http\Controllers\DesignController@form_mask')->name('form-mask');

/**
 * project route
 */
Route::get('/product-groups','\App\Http\Controllers\AdminController@index')->name('product-groups');
Route::get('/products','\App\Http\Controllers\AdminController@products')->name('products');
Route::get('/service-tax-gst','\App\Http\Controllers\AdminController@service_tax_gst')->name('service-tax-gst');
Route::get('/insurance-company','\App\Http\Controllers\AdminController@insurance_company')->name('insurance-company');
Route::get('/insurance-branch','\App\Http\Controllers\AdminController@insurance_branch')->name('insurance-branch');
Route::get('/broker-branch','\App\Http\Controllers\AdminController@broker_branch')->name('broker-branch');
