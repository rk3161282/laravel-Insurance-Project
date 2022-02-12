<?php
namespace App\Http\Controllers\Api;
use Validator,Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use Hash;
use Auth;
use DB;
use Log;
class ProductController extends Controller
{
    
    public function AddProduct(Request $request){
        Log::info('ProductController AddProduct:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
     
        //Define the validation rules password_confirmation
        $rules = [
          'group_type' => 'required',
          'product_name' => 'required|unique:products',
          'product_code' => 'required',
          'main_group_id' => 'required',
          'sub_group_id' => '',
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ProductController AddProduct: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $group_type = $data['group_type'];
        $product_name = $data['product_name'];
        $product_code = $data['product_code'];
        $main_group_id = $data['main_group_id'];
        $sub_group_id = $data['sub_group_id'];

        $products = new products();
        $products->product_type = $group_type;
        $products->product_name = $product_name;
        $products->product_code = $product_code;
        $products->main_group_id = $main_group_id;
        $products->sub_group_id = $sub_group_id;
        $products->status = 1;
        $products->save();
        
        if(!$products){
            return response()->json(['Status'=>404,"Message"=>"Unbale to add product"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product add successfully "],200);
        }
    }

    public function UpdateProduct(Request $request){
        Log::info('ApiController UpdateProduct:'.($request->getContent()));
        $data = json_decode($request->getContent(),true); //true for assoc array--otherwise object return
        // validate reuested payload is json type or not
        if ($data == null) {
            return response()->json(['Status'=>400,"authenticate"=>false,"Message"=>"No payload was found. Please refer to our API documentation."],200);
        }
        $product_id = $data['product_id'];
        //Define the validation rules password_confirmation
        $rules = [
          'product_id' => 'required', 
          'group_type' => 'required',
          'product_code' => 'required',
          'main_group_id' => 'required',
          'sub_group_id' => '',
          'product_name' => 'required|unique:products,product_name,'.$product_id,
        ];
        //Call validation
        $validator = Validator::make($data, $rules);
        //validation fails
        if($validator->fails()){
          Log::info('ApiController UpdateProduct: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $group_type = $data['group_type'];
        $product_name = $data['product_name'];
        $product_code = $data['product_code'];
        $main_group_id = $data['main_group_id'];
        $sub_group_id = $data['sub_group_id'];

        $products = products::where('id',$product_id)->update([
            'product_type' => $group_type,
            'product_name' => $product_name,
            'product_code' => $product_code,
            'main_group_id' => $main_group_id,
            'sub_group_id' => $sub_group_id
        ]);
       
        if(!$products){
            return response()->json(['Status'=>404,"Message"=>"Unbale to update product"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product update successfully "],200);
        }
    }

    public function DeleteProduct(Request $request){
        Log::info('ApiController DeleteProduct:'.($request->getContent()));
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
          Log::info('ApiController DeleteProduct: Mandatory field validations failed.');
          return response()->json(['Status'=>400,'Message'=>$validator->errors()->first()],200);
        }

        $id = $data['id'];

        $products = products::where('id',$id)->delete();
       
        if(!$products){
            return response()->json(['Status'=>404,"Message"=>"Unbale to delete product"],200);
        }else{
          return response()->json(['Status'=>200,"Message"=>"Product delete successfully "],200);
        }
    }

     /**
     * ProductList
     */
    public function ProductList(Request $request){
     
        $current_date = date("Y-m-d");
        $PageIndex = $request->PageIndex;
        $PageSize = $request->PageSize;
        $countQuery = $request->countQuery;
        $TotalItems = $request->TotalItems;
        $TotalPages = $request->TotalPages;
        $start_page = $request->start_page;
        $end_page = $request->end_page;
        $SearchParams = $request->SearchParams;

        $search_product_name = $SearchParams['search_product_name'];
        $search_product_code = $SearchParams['search_product_code'];
        $search_single_select = @$SearchParams['search_single_select'];
        $search_sub_single_select = @$SearchParams['search_sub_single_select'];
        $product_type = $SearchParams['product_type'];

		$where = "";
        if(isset($search_product_name) && !empty($search_product_name)){
            $where .= "AND  p.product_name= '$search_product_name'"	;
		}
        if(isset($search_product_code) && !empty($search_product_code)){
            $where .= "AND  p.product_code= '$search_product_code'"	;
		}
        if(isset($search_single_select) && !empty($search_single_select)){
            $where .= "AND  p.main_group_id= '$search_single_select'"	;
		}
        if(isset($search_sub_single_select) && !empty($search_sub_single_select)){
            $where .= "AND  p.sub_group_id= '$search_sub_single_select'"	;
		}
        if(isset($product_type) && !empty($product_type)){
            $where .= "AND  p.product_type= '$product_type'"	;
		}
      
        if($where != null){
			$where = substr($where, 4);
		}else{
			$where = "1 = 1";
		}

        $range = 1;
        $offset = (($PageIndex - 1) * $PageSize);
        
        $sql = "SELECT p.id,p.product_name,p.product_code,p.product_type,p.main_group_id,p.sub_group_id,p.status,pg.main_group,psg.sub_group_name FROM products p left join product_groups pg on pg.id = p.main_group_id left join product_sub_groups psg on psg.id = p.sub_group_id where $where  order by pg.created_at desc LIMIT $PageSize OFFSET $offset ";

        $lists=\DB::select(\DB::raw($sql) );
        if($countQuery){
        $sql_query = "select count(*) as count FROM products p left join product_groups pg on pg.id = p.main_group_id left join product_sub_groups psg on psg.id = p.sub_group_id where $where  order by pg.created_at desc ";
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
