<?php
namespace App\Http\Controllers\Api;
use Validator,Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\broker_branch;
use Hash;
use Auth;
use DB;
use Log;
class BrokerBranchController extends Controller
{
    
    public function AddBrokerBranch(Request $request){
        Log::info('BrokerBranchController AddBrokerBranch:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
             //Define the validation rules password_confirmation
            $rules = [
                'name' => 'required|unique:broker_branch',
                'branch_code' => 'required',
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
             Log::info('BrokerBranchController AddBrokerBranch: Mandatory field validations failed.');
             return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
         }
       

        $name = $data['name'];
        $branch_code = $data['branch_code'];
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

        $broker_branch = new broker_branch();
        $broker_branch->name = $name;
        $broker_branch->branch_code = $branch_code;
        $broker_branch->address = $address;
        $broker_branch->city = $city;
        $broker_branch->state = $state;
        $broker_branch->country = $country;
        $broker_branch->zip_code = $zip_code;
        $broker_branch->gst_no = $gst_no;
        $broker_branch->fax_number = $fax_number;
        $broker_branch->mobile_number = $mobile_number;
        $broker_branch->phone_number = $phone_number;
        $broker_branch->email = $email;
        $broker_branch->comment = $comment;
        $broker_branch->save();
        
        if(!$broker_branch){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add broker branch"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Broker Branch add successfully "],200);
        }
    }

    public function UpdateBrokerBranch(Request $request){
        Log::info('InsuranceCompanyController UpdateBrokerBranch:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $broker_branch_id = $data['broker_branch_id'];
            //Define the validation rules password_confirmation
            $rules = [
                'branch_code' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zip_code' => 'required',
                'name' => 'required|unique:broker_branch,name,'.$broker_branch_id
            ];
          
        
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('InsuranceBranchController UpdateBrokerBranch: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $broker_branch_id = $data['broker_branch_id'];
        $name = $data['name'];
        $branch_code = $data['branch_code'];
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

        $broker_branch = broker_branch::where('id',$broker_branch_id)->update([
            'name' => $name,
            'branch_code' => $branch_code,
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
       
        if(!$broker_branch){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update broker branch"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Broker Branch update successfully "],200);
        }
    }

    public function DeleteBrokerBranch(Request $request){
        Log::info('BrokerBranchController DeleteBrokerBranch:'.($request->getContent()));
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
          Log::info('BrokerBranchController DeleteBrokerBranch: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $broker_branch = broker_branch::where('id',$id)->delete();
       
        if(!$broker_branch){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete broker branch"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Broker Branch delete successfully "],200);
        }
    }

     /**
     * BrokerBranchList
     */
    public function BrokerBranchList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $search_name = $SearchParams['search_name'];
       
		$where = "";
        if(isset($search_insurer_name) && !empty($search_insurer_name)){
            $where .= "AND  bb.name like '%$search_insurer_name%'"	;
		}
      
    
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT bb.id,bb.name,bb.branch_code,bb.gst_no,bb.address,bb.city,bb.state,bb.country,bb.zip_code,bb.gst_no,bb.fax_number,bb.mobile_number,bb.phone_number,bb.email,bb.comment FROM broker_branch bb where $where  order by bb.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM broker_branch bb where $where  order by bb.created_at desc ";

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
