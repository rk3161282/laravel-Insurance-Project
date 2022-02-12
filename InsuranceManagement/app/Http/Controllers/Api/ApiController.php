<?php
namespace App\Http\Controllers\Api;
use Validator,Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product_groups;
use App\Models\product_sub_groups;
use App\Models\insurance_company;

use App\Models\membership_sales_details;
use App\Models\prime_membership_master;
use Webpatser\Uuid\Uuid;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\Models\verification_codes;
use App\Models\user_balances;
use App\Models\user_bank_details;
use App\Models\user_details;
use App\Models\bank_withdraw_list;
use App\Models\bank_withdraw_list_details;
use App\Models\user_packages;
use App\Models\user_package_details;
use App\Models\User;
use App\Models\ticketmaster;
use App\Models\ticketdetail;
use Hash;
use Auth;
use DB;
use Log;
class ApiController extends Controller
{
    /*
    * default method
    */
    public function index(Request $request){
        
        if(!isset($request->pagename) || !empty($request->pagename)){
            return view($request->pagename);
        }
        

    }

    
    public function AddProductGroup(Request $request){
        Log::info('ApiController AddProductGroup:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
     
        //Define the validation rules password_confirmation
        $rules = [
          'group_type' => 'required',
          'main_group' => 'required|unique:product_groups',
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController AddProductGroup: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $group_type = $data['group_type'];
        $main_group = $data['main_group'];

        $product_groups = new product_groups();
        $product_groups->main_group = $main_group;
        $product_groups->group_type = $group_type;
        $product_groups->status = 1;
        $product_groups->save();
        
        if(!$product_groups){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add product group"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product Group add successfully "],200);
        }
    }

    public function UpdateProductGroup(Request $request){
        Log::info('ApiController UpdateProductGroup:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $main_group_id = $data['main_group_id'];
        //Define the validation rules password_confirmation
        $rules = [
          'main_group_id' => 'required',
          'group_type' => 'required',
          'main_group' => 'required|unique:product_groups,main_group,'.$main_group_id,
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController Register: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $group_type = $data['group_type'];
        $main_group_id = $data['main_group_id'];
        $main_group = $data['main_group'];

        $product_groups = product_groups::where('id',$main_group_id)->update([
            'main_group' => $main_group,
            'group_type' => $group_type
        ]);
       
        if(!$product_groups){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update product group"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product Group update successfully "],200);
        }
    }

    public function DeleteProductGroup(Request $request){
        Log::info('ApiController DeleteProductGroup:'.($request->getContent()));
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
          Log::info('ApiController DeleteProductGroup: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $product_groups = product_groups::where('id',$id)->delete();
       
        if(!$product_groups){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete product group"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product Group delete successfully "],200);
        }
    }

     /**
     * ProductGroupList
     */
    public function ProductGroupList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

		$where = "";
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT pg.id,pg.main_group,pg.group_type,pg.status FROM product_groups pg where $where  order by pg.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM product_groups pg where $where  order by pg.created_at desc ";
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

    public function productGroupName(Request $request){
        $product_groups = product_groups::get();
       
        return response()->json(['Status'=>200,"Message"=>"Product Group Name fetch","data"=>$product_groups],200);
       
    }

    public function getInsurerName(Request $request){
        $data = json_decode($request->getContent(),true); 
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $insurance_type = $data['insurance_type'];

        $insurance_company = insurance_company::where('insurance_type',$insurance_type)->get();
       
        return response()->json(['Status'=>200,"Message"=>"Insurer Company Name fetch","data"=>$insurance_company],200);
       
    }


    public function productSubGroupName(Request $request){
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $parent_group_id = $data['parent_group_id'];
        $product_sub_groups = product_sub_groups::where('parent_group_id',$parent_group_id)->get();
       
        return response()->json(['Status'=>200,"Message"=>"Product Sub Group Name fetch","data"=>$product_sub_groups],200);
       
    }


    public function AddProductSubGroup(Request $request){
        Log::info('ApiController AddProductSubGroup:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
     
        //Define the validation rules password_confirmation
        $rules = [
          'parent_group_id' => 'required',
          'sub_group_name' => 'required|unique:product_sub_groups',
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController AddProductSubGroup: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $parent_group_id = $data['parent_group_id'];
        $sub_group_name = $data['sub_group_name'];

        $product_sub_groups = new product_sub_groups();
        $product_sub_groups->parent_group_id = $parent_group_id;
        $product_sub_groups->sub_group_name = $sub_group_name;
        $product_sub_groups->status = 1;
        $product_sub_groups->save();
        
        if(!$product_sub_groups){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add product sub group"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product Sub Group add successfully "],200);
        }
    }

     /**
     * ProductSubGroupList
     */
    public function ProductSubGroupList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

		$where = "";
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT psg.id,psg.parent_group_id,psg.sub_group_name,pg.status,pg.main_group FROM product_sub_groups psg  left join product_groups pg on pg.id = psg.parent_group_id where $where  order by psg.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM product_sub_groups psg  left join product_groups pg on pg.id = psg.parent_group_id where $where  order by psg.created_at desc ";
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

    public function UpdateProductSubGroup(Request $request){
        Log::info('ApiController UpdateProductSubGroup:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $sub_group_id = $data['sub_group_id'];
        //Define the validation rules password_confirmation
        $rules = [
          'parent_group_id' => 'required',
          'sub_group_id' => 'required',
          'sub_group_name' => 'required|unique:product_sub_groups,sub_group_name,'.$sub_group_id,
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController Register: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $parent_group_id = $data['parent_group_id'];
        $sub_group_id = $data['sub_group_id'];
        $sub_group_name = $data['sub_group_name'];

        $product_sub_groups = product_sub_groups::where('id',$sub_group_id)->update([
            'parent_group_id' => $parent_group_id,
            'sub_group_name' => $sub_group_name
        ]);
       
        if(!$product_sub_groups){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update product sub group"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product Sub Group update successfully "],200);
        }
    }

    public function DeleteProductSubGroup(Request $request){
        Log::info('ApiController DeleteProductSubGroup:'.($request->getContent()));
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
          Log::info('ApiController DeleteProductSubGroup: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $product_sub_groups = product_sub_groups::where('id',$id)->delete();
       
        if(!$product_sub_groups){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete sub product group"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product Sub Group delete successfully "],200);
        }
    }


    public function UpdateUser(Request $request){
        Log::info('ApiController UpdateUser:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $id = $data['id'];
        //Define the validation rules password_confirmation
        $rules = [
          'first_name' => 'required|min:3|max:50',
          'last_name' => 'required|min:1|max:50',
          'email' => 'required|email|unique:users,email,'.$id,
          'mobile_number' => 'required|digits:10|unique:users,mobile_number,'.$id,
          'password' => '',
          'mdr_id' => 'required',
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('WebApiController Register: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $mobile_number = $data['mobile_number'];
        $password = md5($data['password']);
        $mdr_id = $data['mdr_id'];
        $id = $data['id'];

        $user_update = User::where('id',$id)->update([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'password' => $password,
            'c_password' => $data['password']
        ]);
        if(!$user_update){
            return response()->json(['Status'=>404,"Message"=>"updation failed"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"updatte data successfully "],200);
        }
      }

    public function AddUser(Request $request){
        Log::info('ApiController createAccount:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        //Define the validation rules password_confirmation
        $rules = [
          'first_name' => 'required|min:3|max:50',
          'last_name' => 'required|min:1|max:50',
          'email' => 'required|email',
          'mobile_number' => 'required|digits:10',
          'sponsor_id' => ''
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('WebApiController Register: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }
    
        $cpassword = rand(111111,999999);
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $password = md5($cpassword);
        $mobile_number = $data['mobile_number'];
        $sponsor_id = $data['sponsor_id'];
       
         //  //check user email or phone with specific role
         $user = User::where(['email'=>$email])->first();
         if($user){
           return response()->json(['Status'=>400,'Message'=>'User Email Already exits.'],200);
         }
         $user = User::where(['mobile_number'=>$mobile_number])->first();
         if($user){
           return response()->json(['Status'=>400,'Message'=>'User Phone Already exits.'],200);
         }
    
         $uuid = Uuid::generate()->string;
         $jwtToken = $this->jwt($uuid,$mobile_number);
    
         $sponsor_id = User::where('mdr_id',$sponsor_id)->first();
        if(empty($sponsor_id)){
            return response()->json(['Status'=>400,'Message'=>'Incorrect Sponsor Value.'],200);
        }

         $mdr_id = rand(111111111,999999999);
         $mdr_id_spo = $sponsor_id->id;
        $user = new User();
        $user->mdr_id = $mdr_id;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->mobile_number = $mobile_number;
        $user->password = $password;
        $user->mobile_verify = 1;
        $user->status = 1; 
        $user->token = $jwtToken;
        $user->sponsor_id = $mdr_id_spo?$mdr_id_spo:env('ADMIN_SPONSOR_ID');
        $user->uuid = $uuid;
        $user->save();
        if(!$user){
          
            //user email not found
            return response()->json(['Status'=>404,"Message"=>"Registartion failed"],200);
        }else{
    
          $insert_id = $user->id;
    
          $user_balances = new user_balances();
          $user_balances->user_id = $insert_id;
          $user_balances->mudra_balance = 0;
          $user_balances->service_balance = 0;
          $user_balances->coinsafe_balance = 0;
          $user_balances->inr_balance = 0;
          $user_balances->save();
    
        //   $user_bank_details = new user_bank_details();
        //   $user_bank_details->user_id = $insert_id;
        //   $user_bank_details->bank_name	 = "";
        //   $user_bank_details->account_number = "";
        //   $user_bank_details->branch_name	 = "";
        //   $user_bank_details->ifsc_number	 = "";
        //   $user_bank_details->save();
    
          $user_details = new user_details();
          $user_details->user_id = $insert_id;
          $user_details->save();
    
          try {
            $data = ['subject'=>"DGMudra Registartion","member_id"=>$insert_id,"is_automatic"=>'automatic',"purpose"=>1,'username'=>$mobile_number,"password"=>$cpassword];
            sendMail($email,$data);
           sendSMS($mobile_number,$data);
          } catch (\Exception $e) {
      
          }
    
         $user = User::where('id',$insert_id)->first();
    
          return response()->json(['Status'=>200,"Message"=>"You have successfully registered","data"=>array("id"=>$user->id,"uuid"=>$uuid,"token"=>$jwtToken,"first_name"=>$user->first_name,"last_name"=>$user->last_name,"email"=>$user->email,"mobile_number"=>$user->mobile_number,'sponsor_id'=>$user->sponsor_id,"mobile_verify"=>$user->mobile_verify,"email_verify"=>$user->email_verify,"status"=>$user->status,"allow_multiple_login"=>$user->allow_multiple_login,"mudra_balance"=>0,"service_balance"=>0,"coinsafe_balance"=>0,"inr_balance"=>0)],200);
        }
      }


        /**
     * Create a new token.
     *
     * @param  \App\User   $user
     * @return string
     */
    public function jwt($uuid,$phone) {
        $payload = [
            'iss' => "tajika-jwt", // Issuer of the token
            'sub' => [$uuid,$phone], // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];
  
        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    }
  
    public function DecodeToken($token)
    {          
        $decoded = JWT::decode($token, $this->key, array('HS256'));
        $decodedData = (array) $decoded;
        return $decodedData;
    }
  
    function generateRandomString($length = 10) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }


    /**
     * StaffList
     */
    public function StaffList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $from="";
		$to="";
        
        $FromDate = @$SearchParams['FromDate'];
        $ToDate = @$SearchParams['ToDate'];

        $email = @$SearchParams['email'];
        $phone = @$SearchParams['phone'];
       
        $user_id = @$SearchParams['user_id'];  
        $role_id = @$SearchParams['role_id'];
        
       
        

        if(isset($FromDate) || $FromDate!=null){
			$from=date('Y-m-d', strtotime($FromDate));
			
		}
		if(isset($ToDate) || $ToDate!=null){
			$to=date('Y-m-d', strtotime($ToDate));
		}

		$where = "";

        if($email){
            $where .= "AND  u.email= '$email'"	;
		}

        if($phone){
            $where .= "AND  u.mobile_number= '$phone'"	;
		}

        if($from){
			$where .= "AND u.created_at >= '$from 00:00:00' "	;
		}
		if($to){
			$where .= "AND u.created_at <= '$to 23:59:59' "	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT u.id,u.first_name,u.last_name,u.mobile_number,u.email,u.role_id,u.status,u.last_login_time,r.role_name
        FROM staffs u
        left join role_master r on r.id = u.role_id
        where $where  order by u.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count
        FROM staffs u
        left join role_master r on r.id = u.role_id 
	    where $where  order by u.created_at desc ";
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


    /**
     * UserList
     */
    public function UserList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $from="";
		$to="";
        
        $FromDate = @$SearchParams['FromDate'];
        $ToDate = @$SearchParams['ToDate'];

        $name = @$SearchParams['name'];
        $mdr_id = @$SearchParams['mdr_id'];
        $sponsor_id = @$SearchParams['sponsor_id'];
        $email = @$SearchParams['email'];
        $phone = @$SearchParams['phone'];
       
        $user_id = @$SearchParams['user_id'];  
        $role_id = @$SearchParams['role_id'];
        $last_status = @$SearchParams['last_status'];
        
       
        

        if(isset($FromDate) || $FromDate!=null){
			$from=date('Y-m-d', strtotime($FromDate));
			
		}
		if(isset($ToDate) || $ToDate!=null){
			$to=date('Y-m-d', strtotime($ToDate));
		}

		$where = "";

        if($name){
            $where .= "AND  u.first_name= '$name' or u.last_name= '$name'"	;
		}
        if($mdr_id){
            $where .= "AND  u.mdr_id= '$mdr_id'"	;
		}
        if($sponsor_id){
            $where .= "AND  u.sponsor_id= '$sponsor_id'"	;
		}
        if($email){
            $where .= "AND  u.email= '$email'"	;
		}

        if(isset($last_status)){
            $where .= "AND  u.status= '$last_status'"	;
		}


        if($phone){
            $where .= "AND  u.mobile_number= '$phone'"	;
		}

        if($from){
			$where .= "AND u.created_at >= '$from 00:00:00' "	;
		}
		if($to){
			$where .= "AND u.created_at <= '$to 23:59:59' "	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT u.id,u.mdr_id,u.first_name,u.last_name,u.mobile_number,u.email,u.sponsor_id,u.status,u.mobile_verify,u.email_verify,u.allow_multiple_login,ub.mudra_balance,ub.service_balance,ub.coinsafe_balance,ub.inr_balance,ud.address,ud.pincode,ud.city,ud.state,ud.country_id,m.membership_plan_id
        FROM users u
        left join user_balances ub on ub.user_id = u.id
        left join user_details ud on ud.user_id = u.id
        left join membership_sales_details m on u.id = m.user_id
        where $where  order by u.created_at desc LIMIT $PageSize OFFSET $offset ";
        
        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count
        FROM users u
        left join user_balances ub on ub.user_id = u.id
        left join user_details ud on ud.user_id = u.id
        left join membership_sales_details m on m.id = m.user_id
	    where $where  order by u.created_at desc ";
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


     /**
     * UserMemberPlanList
     */
    public function UserMemberPlanList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $from="";
		$to="";
        
        $FromDate = @$SearchParams['FromDate'];
        $ToDate = @$SearchParams['ToDate'];

        $account_id = @$SearchParams['account_id'];
        $Status = @$SearchParams['Status'];

        $user_id = @$SearchParams['user_id'];  
        $role_id = @$SearchParams['role_id'];
        
       
        

        if(isset($FromDate) || $FromDate!=null){
			$from=date('Y-m-d', strtotime($FromDate));
			
		}
		if(isset($ToDate) || $ToDate!=null){
			$to=date('Y-m-d', strtotime($ToDate));
		}

		$where = "";

        if($account_id){
            $where .= "AND  ms.user_id= '$account_id'"	;
		}
        if($Status){
            $where .= "AND  ms.status= '$Status'"	;
		}

        // if($phone){
        //     $where .= "AND  u.mobile_number= '$phone'"	;
		// }

        if($from){
			$where .= "AND ms.created_at >= '$from 00:00:00' "	;
		}
		if($to){
			$where .= "AND ms.created_at <= '$to 23:59:59' "	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT ms.id,ms.user_id,ms.membership_plan_id,ms.payment_from,ms.reference_id,ms.payment_gateway_txn_id,ms.mode,ms.source,ms.amount,ms.gst,ms.total,ms.start_plan_date,ms.end_plan_date,ms.status,ms.created_at,pm.name as plan_name,u.first_name,u.last_name
        FROM membership_sales_details ms
        left join prime_membership_master pm on ms.membership_plan_id = pm.id
        left join users u on ms.user_id = u.id
        where $where  order by ms.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count
        FROM membership_sales_details ms
        left join prime_membership_master pm on ms.membership_plan_id = pm.id
        left join users u on ms.user_id = u.id
        where $where  order by ms.created_at desc";
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


    /**
     * changeUserMemberShipPlanStatus
     */
    public function changeUserMemberShipPlanStatus(Request $request){
        $id = $request->id;
        $status = $request->status;
        $membership_plan_id = $request->membership_plan_id;
        $prime_membership_master = prime_membership_master::select('id','name','amount','gst','total','validity_in_months')->where('id',$membership_plan_id)->first();
        $validity_in_months = $prime_membership_master->validity_in_months;
        $start_plan_date = date("Y-m-d");
        $end_plan_date = date('Y-m-d', strtotime($start_plan_date . "+$validity_in_months months") );
   
        $update = membership_sales_details::where('id',$id)->update(['status'=>$status,"start_plan_date"=>$start_plan_date,"end_plan_date"=>$end_plan_date]);

        if($update){
            echo json_encode(["Status"=>200,"Message"=>"Plan Update Successfully"]);
        }else{
            echo json_encode(["Status"=>400,"Message"=>"Unable to update plan"]);
        }

    }


     /**
     * UserPackageList
     */
    public function UserPackageList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $from="";
		$to="";
        
        $FromDate = @$SearchParams['FromDate'];
        $ToDate = @$SearchParams['ToDate'];

        $account_id = @$SearchParams['account_id'];
        $package_id = @$SearchParams['package_id'];

        $user_id = @$SearchParams['user_id'];  
        $role_id = @$SearchParams['role_id'];
        $last_status = @$SearchParams['last_status'];
       
        

        if(isset($FromDate) || $FromDate!=null){
			$from=date('Y-m-d', strtotime($FromDate));
			
		}
		if(isset($ToDate) || $ToDate!=null){
			$to=date('Y-m-d', strtotime($ToDate));
		}

		$where = "";

        if($account_id){
            $where .= "AND  up.user_id= '$account_id'"	;
		}
        if($package_id){
            $where .= "AND  up.package_id= '$package_id'"	;
		}

        if($last_status){
            $where .= "AND  up.last_status= '$last_status'"	;
		}

        if($from){
			$where .= "AND up.created_at >= '$from 00:00:00' "	;
		}
		if($to){
			$where .= "AND up.created_at <= '$to 23:59:59' "	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT up.id,up.user_id,up.package_id,up.amount,up.reference_id,up.last_status,up.created_at,up.updated_at,p.name as package_name,u.first_name,u.last_name
        FROM user_packages up
        left join package_master p on up.package_id = p.id
        left join users u on up.user_id = u.id
        where $where  order by up.created_at desc LIMIT $PageSize OFFSET $offset ";
        
        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count
        FROM user_packages up
        left join package_master p on up.package_id = p.id
        left join users u on up.user_id = u.id
        where $where  order by up.created_at desc";
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


    /**
     * changeUserPackagePlanStatus
     */
    public function changeUserPackagePlanStatus(Request $request){
        $id = $request->id;
        $status = $request->status;
        $user_id = $request->user_id;

        $update = user_packages::where('id',$id)->update(['last_status'=>$status,"approved_by"=>$user_id]);

        $user_packages = user_packages::where('id',$id)->first();
        $user_package_details_data = user_package_details::where(['user_package_id'=>$id,'status'=>"Pending"])->first();
        $user_package_details = new user_package_details();
        $user_package_details->user_id = $user_packages->user_id;
        $user_package_details->user_package_id = $id;
        $user_package_details->status = $status;
        $user_package_details->mode = "Cash";
        $user_package_details->payment_mode = "CASH";
        $user_package_details->approved_by_user = $user_id;
        $user_package_details->bank_name = $user_package_details_data->bank_name;
        $user_package_details->payment_info = "Package Payment Approved";
        $user_package_details->save();

        if($update){
            echo json_encode(["Status"=>200,"Message"=>"Package Status Update Successfully"]);
        }else{
            echo json_encode(["Status"=>400,"Message"=>"Unable to update Package"]);
        }

    }

     /**
     * changeWithdrawStatus
     */
    public function changeWithdrawStatus(Request $request){
        $id = $request->id;
        $status = $request->status;
        $user_id = $request->user_id;

        $update = bank_withdraw_list::where('id',$id)->update(['last_status'=>$status,"approved_by"=>$user_id]);

        $bank_withdraw_list = bank_withdraw_list::where('id',$id)->first();

        $bank_withdraw_list_details = new bank_withdraw_list_details();
        // $bank_withdraw_list_details->user_id = $user_packages->user_id;
        $bank_withdraw_list_details->bank_withdraw_id = $id;
        $bank_withdraw_list_details->status = $status;
        $bank_withdraw_list_details->approved_by_user = $user_id;
        $bank_withdraw_list_details->created_by = $bank_withdraw_list->user_id;
        $bank_withdraw_list_details->remarks = "Withdraw Payment Approved";
        $bank_withdraw_list_details->save();

        if($update){
            echo json_encode(["Status"=>200,"Message"=>"Withdraw Status Update Successfully"]);
        }else{
            echo json_encode(["Status"=>400,"Message"=>"Unable to update Withdraw"]);
        }

    }

     /**
   * withdraw_amount_list
   */
  public function withdraw_amount_list(Request $request){
    $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $from="";
		$to="";
        
        $FromDate = @$SearchParams['FromDate'];
        $ToDate = @$SearchParams['ToDate'];

        $account_id = @$SearchParams['account_id'];
        $Status = @$SearchParams['Status'];

        $user_id = @$SearchParams['user_id'];  
        $role_id = @$SearchParams['role_id'];
        
       
        

        if(isset($FromDate) || $FromDate!=null){
			$from=date('Y-m-d', strtotime($FromDate));
			
		}
		if(isset($ToDate) || $ToDate!=null){
			$to=date('Y-m-d', strtotime($ToDate));
		}

		$where = "";

        if($account_id){
            $where .= "AND  bwl.user_id= '$account_id'"	;
		}
        if($Status){
            $where .= "AND  bwl.last_status= '$Status'"	;
		}

        // if($phone){
        //     $where .= "AND  u.mobile_number= '$phone'"	;
		// }

        if($from){
			$where .= "AND bwl.created_at >= '$from 00:00:00' "	;
		}
		if($to){
			$where .= "AND bwl.created_at <= '$to 23:59:59' "	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
    

        $sql = "SELECT bwl.id,bwl.amount_in_inr,bwl.amount_in_mdr,bwl.last_status,bwl.mdr_rate_id,bwl.remarks,bwl.opening_balance,bwl.created_at,bwld.status,bwld.remarks as remarks1,u.first_name,u.last_name,ubd.bank_name,ubd.account_number
        FROM bank_withdraw_list bwl
        left join bank_withdraw_list_details bwld on bwl.id = bwld.bank_withdraw_id
        left join users u on bwl.user_id = u.id
        left join user_bank_details ubd on bwl.user_bank_id = ubd.id
        where $where  order by bwl.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count
        FROM bank_withdraw_list bwl
        left join bank_withdraw_list_details bwld on bwl.id = bwld.bank_withdraw_id
        left join users u on bwl.user_id = u.id
        left join user_bank_details ubd on bwl.user_bank_id = ubd.id
        where $where  order by bwl.created_at desc";
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

     /**
   * support_ticket_list
   */
  public function support_ticket_list(Request $request){
    $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $from="";
		$to="";
        
        $FromDate = @$SearchParams['FromDate'];
        $ToDate = @$SearchParams['ToDate'];

        $account_id = @$SearchParams['account_id'];
        $Status = @$SearchParams['Status'];

        $user_id = @$SearchParams['user_id'];  
        $role_id = @$SearchParams['role_id'];
        
       
        

        if(isset($FromDate) || $FromDate!=null){
			$from=date('Y-m-d', strtotime($FromDate));
			
		}
		if(isset($ToDate) || $ToDate!=null){
			$to=date('Y-m-d', strtotime($ToDate));
		}

		$where = "";

        if($account_id){
            $where .= "AND  tm.ticket_submited_by= '$account_id'"	;
		}
        if($Status){
            $where .= "AND  tm.ticket_status= '$Status'"	;
		}

        // if($phone){
        //     $where .= "AND  u.mobile_number= '$phone'"	;
		// }

        if($from){
			$where .= "AND tm.created_at >= '$from 00:00:00' "	;
		}
		if($to){
			$where .= "AND tm.created_at <= '$to 23:59:59' "	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
    

        $sql = "SELECT tm.id,tm.head,tm.ticket_submited_by,tm.ticket_status,tm.created_at,u.first_name,u.last_name
        FROM ticketmaster tm
        left join users u on tm.ticket_submited_by = u.id
        where $where  order by tm.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count
        FROM ticketmaster tm
        left join users u on tm.ticket_submited_by = u.id
        where $where  order by tm.created_at desc";
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

  public function GetParticularTicketDetails(Request $request){
   
    $ticketmasterid = $request->ticket_id;
    // $ticketdetaildata = ticketdetail::where('ticketmasterid',$ticketmasterid)->get();
    $sql = "SELECT td.id,td.ticketmasterid,td.message,td.entry_by,td.ticket_status,td.created_at,u.first_name,u.last_name
        FROM ticketdetail td
        left join users u on td.entry_by = u.id
        where td.ticketmasterid = $ticketmasterid  order by td.created_at asc";

        $lists=\DB::select(\DB::raw($sql) );
    echo json_encode(['status'=>200,"message"=>"Ticket Submitted Successfully","data"=>$lists]);
}

  /**
   * generateSupportDetailsadmin
   */
  public function generateSupportDetailsadmin(Request $request){
    Log::info('WebApiController generateSupportDetailsadmin:'.($request->getContent()));
    $data = json_decode($request->getContent(),true); 
    if ($data == null) {
        return response()->json(['status'=>400,"authenticate"=>false,"message"=>"No payload was found. Please refer to our API documentation."],200);
    }
    //Define the validation rules
    $rules = [
      'ticket_id' => 'required',
      'message' => 'required',
      'user_id' => 'required',
      'ticket_status' => 'required'
    ];
    //Call validation
    $validator = Validator::make($data, $rules);
    //validation fails
    if($validator->fails()){
      Log::info('WebApiController generateSupportDetailsadmin: Mandatory field validations failed.');
      return response()->json(['status'=>400,'message'=>$validator->errors()->first()],200);
    }
    $message = $data['message'];
    $ticket_id = $data['ticket_id'];
    $user_id = $data['user_id'];
    $ticket_status = $data['ticket_status'];

     $insert_id = $ticket_id;

     $ticketdetail = new ticketdetail();
     $ticketdetail->ticketmasterid = $insert_id;
     $ticketdetail->message = $message;
     $ticketdetail->ticket_status = $ticket_status;
     $ticketdetail->entry_by =$user_id;
     $ticketdetail->save();

     $update = ticketmaster::where('id',$ticket_id)->update(['ticket_status' => $ticket_status ]);

    
     if($ticketdetail){
      return json_encode(['status'=>200,"message"=>"Message Send Successfully"]);
     }else{
      return json_encode(['status'=>400,"message"=>"Unable to generate ticket"]);
     }
    

  }

  /**
   * getParticularUserDetails
   */
  public function getParticularUserDetails(Request $request){
   
    $sponsor_id_text = $request->sponsor_id_text;

    // $lists = User::where('mdr_id',$sponsor_id_text)->first();
    $lists =DB::table('users')
                ->join('users as u', 'u.id', '=', 'users.sponsor_id')
                ->select('users.id','users.sponsor_id','users.mdr_id','users.first_name', 'users.last_name','users.mobile_number','users.email','users.password','users.c_password','users.mobile_verify','users.email_verify','u.first_name as fname','u.last_name as lname','u.mdr_id as mmdr_id')
                ->where('users.mdr_id',$sponsor_id_text)
                ->first();
    if($lists){
        echo json_encode(['status'=>200,"message"=>"Member Found","data"=>$lists]);
    }else{
        echo json_encode(['status'=>400,"message"=>"No Member Found"]);
    }
    
}

/**
 * search_sponsor_user
 */
public function search_sponsor_user(Request $request){
   
    $sponsor_id_text = $request->sponsor_id_text;

    $lists = User::where('first_name', 'like', '%' . $sponsor_id_text . '%')->orWhere('last_name', 'like', '%' . $sponsor_id_text . '%')->orWhere('mdr_id', 'like', '%' . $sponsor_id_text . '%')->get();
    if($lists){
        echo json_encode(['status'=>200,"message"=>"Member Found","data"=>$lists]);
    }else{
        echo json_encode(['status'=>400,"message"=>"No Member Found"]);
    }
    
}

   
}
