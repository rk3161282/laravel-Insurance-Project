<?php
namespace App\Http\Controllers;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
class AdminController extends Controller
{

    /*
    * default method
    */
    public function index(Request $request){

        return view('admin/productgroup/list');

    }

    /**
     * products
     */
    public function products(Request $request){

        return view('admin/products/list');

    }

    /**
     * service_tax_gst
     */
    public function service_tax_gst(Request $request){

        return view('admin/service_tax_gst/list');

    }

    /**
     * insurance_company
     */
    public function insurance_company(Request $request){

        return view('admin/insurance_company/list');

    }

    /**
     * insurance_branch
     */
    public function insurance_branch(Request $request){

        return view('admin/insurance_branch/list');

    }

    /**
     * broker-branch
     */
    public function broker_branch(Request $request){

        return view('admin/broker_branch/list');

    }
    
}
