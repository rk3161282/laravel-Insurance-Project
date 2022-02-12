<?php
namespace App\Http\Controllers\Api;
use Validator,Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service_tax_gst;
use Hash;
use Auth;
use DB;
use Log;
class ServiceTaxController extends Controller
{
    
    public function AddSericeTaxGst(Request $request){
        Log::info('ServiceTaxController AddSericeTaxGst:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
     
        //Define the validation rules password_confirmation
        $rules = [
          'tax_type' => 'required',
          'tax_name' => 'required|unique:service_tax_gst',
          'tax_percentage' => 'required',
          'active' => 'required',
          'tax_description' => '',
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ServiceTaxController AddSericeTaxGst: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $tax_type = $data['tax_type'];
        $tax_name = $data['tax_name'];
        $tax_percentage = $data['tax_percentage'];
        $active = $data['active'];
        $tax_description = $data['tax_description'];

        $service_tax_gst = new service_tax_gst();
        $service_tax_gst->tax_name = $tax_name;
        $service_tax_gst->tax_percentage = $tax_percentage;
        $service_tax_gst->LIFE_tax_type = in_array("LIFE", $tax_type) ? 1 : 0 ;
        $service_tax_gst->NONLIFE_tax_type = in_array("NON LIFE", $tax_type) ? 1 : 0 ;
        $service_tax_gst->tax_description = $tax_description;
        $service_tax_gst->status = $active;
        $service_tax_gst->save();
        
        if(!$service_tax_gst){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add service tax"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Service Tax add successfully "],200);
        }
    }

    public function UpdateSericeTaxGst(Request $request){
        Log::info('ApiController UpdateSericeTaxGst:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $service_tax_id = $data['service_tax_id'];
        //Define the validation rules password_confirmation
        $rules = [
            'service_tax_id' => 'required',
            'tax_type' => 'required',
            'tax_percentage' => 'required',
            'active' => 'required',
            'tax_description' => '',
            'tax_name' => 'required|unique:service_tax_gst,tax_name,'.$service_tax_id,
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController UpdateSericeTaxGst: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $service_tax_id = $data['service_tax_id'];
        $tax_type = $data['tax_type'];
        $tax_percentage = $data['tax_percentage'];
        $active = $data['active'];
        $tax_description = $data['tax_description'];
        $tax_name = $data['tax_name'];

        $products = service_tax_gst::where('id',$service_tax_id)->update([
            'tax_name' => $tax_name,
            'tax_percentage' => $tax_percentage,
            'LIFE_tax_type' => in_array("LIFE", $tax_type) ? 1 : 0 ,
            'NONLIFE_tax_type' => in_array("NON LIFE", $tax_type) ? 1 : 0 ,
            'tax_description' => $tax_description,
            'status' => $active,
        ]);
       
        if(!$products){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update tax service"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"tax Service update successfully "],200);
        }
    }

    public function DeleteSericeTaxGst(Request $request){
        Log::info('ApiController DeleteSericeTaxGst:'.($request->getContent()));
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
          Log::info('ApiController DeleteSericeTaxGst: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $service_tax_gst = service_tax_gst::where('id',$id)->delete();
       
        if(!$service_tax_gst){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete service tac"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Service Tax delete successfully "],200);
        }
    }

     /**
     * SericeTaxGstList
     */
    public function SericeTaxGstList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $search_tax_name = $SearchParams['search_tax_name'];
        $search_tax_type = $SearchParams['search_tax_type'];
        $search_status = $SearchParams['search_status'];

		$where = "";
        if(isset($search_tax_name) && !empty($search_tax_name)){
            $where .= "AND  stg.tax_name= '$search_tax_name'"	;
		}
        if(isset($search_tax_type) && !empty($search_tax_type)){
            if($search_tax_type == "LIFE"){
                $where .= "AND  stg.LIFE_tax_type= '1'"	;
            }else{
                $where .= "AND  stg.NONLIFE_tax_type= '1'"	;
            }   
		}
        if(isset($search_status)){
            $where .= "AND  stg.status= '$search_status'"	;
		}
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT stg.id,stg.tax_name,stg.tax_percentage,stg.LIFE_tax_type,stg.NONLIFE_tax_type,stg.tax_description,stg.status FROM service_tax_gst stg  where $where  order by stg.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM service_tax_gst stg  where $where  order by stg.created_at desc";

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
