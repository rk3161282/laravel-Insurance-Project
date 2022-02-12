<?php
namespace App\Http\Controllers\Api;
use Validator,Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\insurance_branch;
use Hash;
use Auth;
use DB;
use Log;
class InsuranceBranchController extends Controller
{
    
    public function AddInsuranceBranch(Request $request){
        Log::info('InsuranceBranchController AddInsuranceBranch:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
             //Define the validation rules password_confirmation
            $rules = [
                'product_type' => 'required',
                'insurance_company_id' => 'required|unique:insurance_branch',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip_code' => 'required'
            ];
         //Call validation
         $validator = Validator::make($data, $rules);
         //validation fails
         if($validator->fails()){
             Log::info('InsuranceBranchController AddInsuranceBranch: Mandatory field validations failed.');
             return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
         }
       

        $insurance_company_id = $data['insurance_company_id'];
        $insurer_office_name = $data['insurer_office_name'];
        $insurer_office_code = $data['insurer_office_code'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $zip_code = $data['zip_code'];
        $gst_no = $data['gst_no'];
        $fax_number = $data['fax_number'];
        $mobile_number = $data['mobile_number'];
        $phone_number = $data['phone_number'];
        $email = $data['email'];
        $comment = $data['comment'];
        $product_type = $data['product_type'];

        $insurance_branch = new insurance_branch();
        $insurance_branch->insurance_company_id = $insurance_company_id;
        $insurance_branch->product_type = $product_type;
        $insurance_branch->insurer_office_name = $insurer_office_name ;
        $insurance_branch->insurer_office_code = $insurer_office_code ;
        $insurance_branch->address = $address;
        $insurance_branch->city = $city;
        $insurance_branch->state = $state;
        $insurance_branch->country = $country;
        $insurance_branch->zip_code = $zip_code;
        $insurance_branch->gst_no = $gst_no;
        $insurance_branch->fax_number = $fax_number;
        $insurance_branch->mobile_number = $mobile_number;
        $insurance_branch->phone_number = $phone_number;
        $insurance_branch->email = $email;
        $insurance_branch->comment = $comment;
        $insurance_branch->save();
        
        if(!$insurance_branch){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add insurance branch"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Insurance Branch add successfully "],200);
        }
    }

    public function UpdateInsuranceBranch(Request $request){
        Log::info('InsuranceCompanyController UpdateInsuranceBranch:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $insurance_branch_id = $data['insurance_branch_id'];
            //Define the validation rules password_confirmation
            $rules = [
                'product_type' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip_code' => 'required',
                'insurance_company_id' => 'required|unique:insurance_branch,insurance_company_id,'.$insurance_branch_id
            ];
          
        
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('InsuranceBranchController UpdateInsuranceBranch: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $insurance_branch_id = $data['insurance_branch_id'];
        $insurance_company_id = $data['insurance_company_id'];
        $insurer_office_name = $data['insurer_office_name'];
        $insurer_office_code = $data['insurer_office_code'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $zip_code = $data['zip_code'];
        $gst_no = $data['gst_no'];
        $fax_number = $data['fax_number'];
        $mobile_number = $data['mobile_number'];
        $phone_number = $data['phone_number'];
        $email = $data['email'];
        $comment = $data['comment'];
        $product_type = $data['product_type'];

        $insurance_branch = insurance_branch::where('id',$insurance_branch_id)->update([
            'insurance_company_id' => $insurance_company_id,
            'product_type' => $product_type,
            'insurer_office_name' => $insurer_office_name ,
            'insurer_office_code' => $insurer_office_code ,
            'address' => $address,
            'city' => $city,
            'state' => $state ,
            'country' => $country,
            'zip_code' => $zip_code ,
            'gst_no' => $gst_no,
            'fax_number' => $fax_number,
            'mobile_number' => $mobile_number ,
            'phone_number' => $phone_number,
            'email' => $email,
            'comment' => $comment,
        ]);
       
        if(!$insurance_branch){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update insurance branch"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Insurance Branch update successfully "],200);
        }
    }

    public function DeleteInsuranceBranch(Request $request){
        Log::info('InsuranceBranchController DeleteInsuranceBranch:'.($request->getContent()));
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
          Log::info('InsuranceBranchController DeleteInsuranceBranch: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $insurance_branch = insurance_branch::where('id',$id)->delete();
       
        if(!$insurance_branch){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete insurance branch"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Insurane Branch delete successfully "],200);
        }
    }

     /**
     * InsuranceBranchList
     */
    public function InsuranceBranchList(Request $request){
     
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
            $where .= "AND  ic.insurer_name like '%$search_insurer_name%'"	;
		}
        if(isset($search_insurance_type) && !empty($search_insurance_type)){
            $where .= "AND  ib.product_type= '$search_insurance_type'"	;
		}
    
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT ib.id,ib.insurance_company_id,ib.product_type,ib.gst_no,ib.insurer_office_name,ib.insurer_office_code,ib.address,ib.city,ib.state,ib.country,ib.zip_code,ib.gst_no,ib.fax_number,ib.mobile_number,ib.phone_number,ib.email,ib.comment,ic.insurer_name FROM insurance_branch ib left join insurance_company ic on ic.id = ib.insurance_company_id where $where  order by ib.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM insurance_branch ib left join insurance_company ic on ic.id = ib.insurance_company_id where $where  order by ib.created_at desc ";

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
