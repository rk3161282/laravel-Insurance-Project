<?php
namespace App\Http\Controllers\Api;
use Validator,Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\insurance_company;
use Hash;
use Auth;
use DB;
use Log;
class InsuranceCompanyController extends Controller
{
    
    public function AddInsuranceCompany(Request $request){
        Log::info('InsuranceCompanyController AddInsuranceCompany:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $insurance_type = $data['insurance_type'];
        if($insurance_type == "LIFE"){
            //Define the validation rules password_confirmation
            $rules = [
                'insurance_type' => 'required',
                'insurer_name' => 'required|unique:insurance_company',
                'brokeragelife_firstyear' => 'required',
                'brokeragelife_secondyear' => 'required',
            ];
          
        }else{
             //Define the validation rules password_confirmation
            $rules = [
                'insurance_type' => 'required',
                'insurer_name' => 'required|unique:insurance_company',
                'brokeragenonlife_BP' => 'required',
                'brokeragenonlife_TP' => 'required',
            ];
           
        }
         //Call validation
         $validator = Validator::make($data, $rules);
         //validation fails
         if($validator->fails()){
             Log::info('InsuranceCompanyController AddInsuranceCompany: Mandatory field validations failed.');
             return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
         }
       

        $insurance_type = $data['insurance_type'];
        $insurer_name = $data['insurer_name'];
        $brokeragelife_firstyear = $data['brokeragelife_firstyear'];
        $brokeragelife_secondyear = $data['brokeragelife_secondyear'];
        $brokeragenonlife_BP = $data['brokeragenonlife_BP'];
        $brokeragenonlife_TP = $data['brokeragenonlife_TP'];
        $brokeragenonlife_rewards = $data['brokeragenonlife_rewards'];
        $brokeragenonlife_terrorism = $data['brokeragenonlife_terrorism'];
        $other = $data['other'];

        $insurance_company = new insurance_company();
        $insurance_company->insurance_type = $insurance_type;
        $insurance_company->insurer_name = $insurer_name;
        $insurance_company->brokeragelife_firstyear = $brokeragelife_firstyear ;
        $insurance_company->brokeragelife_secondyear = $brokeragelife_secondyear ;
        $insurance_company->brokeragenonlife_BP = $brokeragenonlife_BP;
        $insurance_company->brokeragenonlife_TP = $brokeragenonlife_TP;
        $insurance_company->brokeragenonlife_rewards = $brokeragenonlife_rewards;
        $insurance_company->brokeragenonlife_terrorism = $brokeragenonlife_terrorism;
        $insurance_company->other = $other;
        $insurance_company->status = 1;
        $insurance_company->save();
        
        if(!$insurance_company){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add insurance company"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Insurance Company add successfully "],200);
        }
    }

    public function UpdateInsuranceCompany(Request $request){
        Log::info('InsuranceCompanyController UpdateInsuranceCompany:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $insurance_id = $data['insurance_id'];
        //Define the validation rules password_confirmation
        $insurance_type = $data['insurance_type'];
        if($insurance_type == "LIFE"){
            //Define the validation rules password_confirmation
            $rules = [
                'insurance_type' => 'required',
                'insurer_name' => 'required|unique:insurance_company,insurer_name,'.$insurance_id,
                'brokeragelife_firstyear' => 'required',
                'brokeragelife_secondyear' => 'required',
            ];
          
        }else{
             //Define the validation rules password_confirmation
            $rules = [
                'insurance_type' => 'required',
                'insurer_name' => 'required|unique:insurance_company,insurer_name,'.$insurance_id,
                'brokeragenonlife_BP' => 'required',
                'brokeragenonlife_TP' => 'required',
            ];
           
        }
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController InsuranceCompanyController: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $insurance_type = $data['insurance_type'];
        $insurer_name = $data['insurer_name'];
        $brokeragelife_firstyear = $data['brokeragelife_firstyear'];
        $brokeragelife_secondyear = $data['brokeragelife_secondyear'];
        $brokeragenonlife_BP = $data['brokeragenonlife_BP'];
        $brokeragenonlife_TP = $data['brokeragenonlife_TP'];
        $brokeragenonlife_rewards = $data['brokeragenonlife_rewards'];
        $brokeragenonlife_terrorism = $data['brokeragenonlife_terrorism'];
        $other = $data['other'];

        $insurance_company = insurance_company::where('id',$insurance_id)->update([
            'insurance_type' => $insurance_type,
            'insurer_name' => $insurer_name,
            'brokeragelife_firstyear' => $brokeragelife_firstyear ,
            'brokeragelife_secondyear' => $brokeragelife_secondyear ,
            'brokeragenonlife_BP' => $brokeragenonlife_BP,
            'brokeragenonlife_TP' => $brokeragenonlife_TP,
            'brokeragenonlife_rewards' => $brokeragenonlife_rewards ,
            'brokeragenonlife_terrorism' => $brokeragenonlife_terrorism,
            'other' => $other,
        ]);
       
        if(!$insurance_company){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update insurance company"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Insurance Company update successfully "],200);
        }
    }

    public function DeleteInsuranceCompany(Request $request){
        Log::info('InsuranceCompanyController DeleteInsuranceCompany:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        //Define the validation rules password_confirmation
        $rules = [
          'id' => 'required'
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('InsuranceCompanyController DeleteInsuranceCompany: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $insurance_company = insurance_company::where('id',$id)->delete();
       
        if(!$insurance_company){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete insurance company"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Insurane Company delete successfully "],200);
        }
    }

     /**
     * InsuranceCompanyList
     */
    public function InsuranceCompanyList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $search_insurer_name = $SearchParams['search_insurer_name'];
        $search_insurance_type = $SearchParams['search_insurance_type'];

		$where = "";
        if(isset($search_insurer_name) && !empty($search_insurer_name)){
            $where .= "AND  ic.insurer_name= '$search_insurer_name'"	;
		}
        if(isset($search_insurance_type) && !empty($search_insurance_type)){
            $where .= "AND  ic.insurance_type= '$search_insurance_type'"	;
		}
    
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT ic.id,ic.insurance_type,ic.insurer_name,ic.brokeragelife_firstyear,ic.brokeragelife_secondyear,ic.brokeragenonlife_BP,ic.brokeragenonlife_TP,ic.brokeragenonlife_rewards,ic.brokeragenonlife_terrorism,ic.other,ic.status FROM insurance_company ic  where $where  order by ic.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM insurance_company ic  where $where  order by ic.created_at desc";

        $sql_count=\DB::select(\DB::raw($sql_query) );
        // print_r( $sql_count[0]); die;
        $TotalItems =  $sql_count[0]->count;
        $TotalPages = ceil($TotalItems / $PageSize);
        if ($TotalPages > $range) {
            $start_page = ($PageIndex <= $range) ?  1 :  $PageIndex - $range;
            $end_page   = ($TotalPages - $PageIndex >= $range) ? $PageIndex +  $range: $TotalPages;
        }else{
            $start_page = 1;
            $end_page   = $TotalPages;
        } 
    }else{
        $TotalPages = ceil($TotalItems / $PageSize);
        if ($TotalPages > $range) {
            $start_page = ($PageIndex <= $range) ?  1 :  $PageIndex - $range;
            $end_page   = ($TotalPages - $PageIndex >= $range) ? $PageIndex +  $range: $TotalPages;
        }else{
            $start_page = 1;
            $end_page   = $TotalPages;
        } 
    }
      
       echo json_encode(['Pager'=>array('TotalItems'=>$TotalItems,'CurrentPage'=>$PageIndex,'PageSize'=>$PageSize,'TotalPages'=>$TotalPages,'StartPage'=>$start_page,'EndPage'=>$end_page,'Items'=>$lists)]);
    }


   
}
