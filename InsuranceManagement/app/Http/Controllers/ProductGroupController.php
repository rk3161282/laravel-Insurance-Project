<?php
namespace App\Http\Controllers;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
class ProductGroupController extends Controller
{

    /*
    * default method
    */
    public function index(Request $request){

        return view('admin/productgroup/list');

    }
    
}
