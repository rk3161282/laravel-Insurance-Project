<?php
namespace App\Http\Controllers;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
class DesignController extends Controller
{

    /*
    * default method
    */
    public function index(Request $request){

        return view('theme/index');

    }
    /*
    * login page
    */
    public function auth_login(Request $request){

        return view('theme/auth_login');

    }
    /**
     * auth-register page
     */
    public function auth_register(Request $request){

        return view('theme/auth_register');

    }

    /**
     * auth_recoverpw
     */
    public function auth_recoverpw(Request $request){

        return view('theme/auth_recoverpw');

    }

    /**
     * auth_lock_screen
     */
    public function auth_lock_screen(Request $request){

        return view('theme/auth_lock_screen');

    }

     /**
     * auth_logout
     */
    public function auth_logout(Request $request){

        return view('theme/auth_logout');

    }

     /**
     * auth_confirm_mail
     */
    public function auth_confirm_mail(Request $request){

        return view('theme/auth_confirm_mail');

    }

     /**
     * auth_email_verification
     */
    public function auth_email_verification(Request $request){
       
        return view('theme/auth_email_verification');

    }

     /**
     * auth-two-step-verification
     */
    public function auth_two_step_verification(Request $request){

        return view('theme/auth_two_step_verification');

    }

     /**
     * pages_starter
     */
    public function pages_starter(Request $request){

        return view('theme/pages_starter');

    }

     /**
     * pages_maintenance
     */
    public function pages_maintenance(Request $request){

        return view('theme/pages_maintenance');

    }

      /**
     * pages_comingsoon
     */
    public function pages_comingsoon(Request $request){

        return view('theme/pages_comingsoon');

    }

     /**
     * pages_timeline
     */
    public function pages_timeline(Request $request){

        return view('theme/pages_timeline');

    }

    /**
     * pages_faqs
     */
    public function pages_faqs(Request $request){
       
        return view('theme/pages_faqs');

    }

    /**
     * pages_pricing
     */
    public function pages_pricing(Request $request){

        return view('theme/pages_pricing');

    }

    /**
     * pages_404
     */
    public function pages_404(Request $request){

        return view('theme/pages_404');

    }
    /**
     * pages_500
     */
    public function pages_500(Request $request){

        return view('theme/pages_500');

    }
    /**
     * form_elements
     */
    public function form_elements(Request $request){

        return view('theme/form_elements');

    }

    /**
     * form_validation
     */
    public function form_validation(Request $request){

        return view('theme/form_validation');

    }

     /**
     * form_advanced
     */
    public function form_advanced(Request $request){

        return view('theme/form_advanced');

    }

     /**
     * form_editors
     */
    public function form_editors(Request $request){

        return view('theme/form_editors');

    }
    
    /**
     * form_uploads
     */
    public function form_uploads(Request $request){

        return view('theme/form_uploads');

    }

    /**
     * form_wizard
     */
    public function form_wizard(Request $request){

        return view('theme/form_wizard');

    }

    /**
     * form_mask
     */
    public function form_mask(Request $request){

        return view('theme/form_mask');

    }

    /**
     * dthrecharge
     */
    public function dthrecharge(Request $request){

        return view('dthrecharge');

    }

    /**
     * electricityrecharge
     */
    public function electricityrecharge(Request $request){

        return view('electricityrecharge');

    }

    /**
     * addBankAccount
     */
    public function addBankAccount(Request $request){

        return view('addBankAccount');

    }

    /**
     * withdrawMoney
     */
    public function withdrawMoney(Request $request){

        return view('withdrawMoney');

    }

    /**
     * raiseTicket
     */

    public function raiseTicket(Request $request){

        return view('raiseTicket');

    }

    /**
     * ticketReport
     */
    public function ticketReport(Request $request){

        return view('ticketReport');

    }

    /**
     * ticketdetails
     */
    public function ticketdetails(Request $request){
        $id = $request->ticketmasterid;
        return view('ticketdetails',compact('id'));

    }

    /**
     * addPackageAmount
     */
    public function addPackageAmount(Request $request){
        $id = $request->package_id;
        $min_amount = package_master::where('id',$id)->first()->min_amount;
        return view('addPackageAmount',compact('id','min_amount'));

    }

    /**
     * UserPackageDetails
     */
    public function UserPackageDetails(Request $request){
        $user_package_id = $request->user_package_id;
        return view('UserPackageDetails',compact('user_package_id'));

    }
}
