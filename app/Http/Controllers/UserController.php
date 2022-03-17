<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Product;
use DataTables;

class UserController extends Controller
{
    

    
    /**
     * Display a list of all users
     */

     public function index(Request $request)
     {
      $users = User::orderBy('id','DESC')->get();
      return response()->json($users);
     }

     //Users List On Admin Side
    public function userAdmin(Request $request)
    {
        
        //
        if($request->ajax())
        {
            $data = User::latest()->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('date',function($row){
             return $row->created_at;
            })  
            ->addColumn('action',function($row2){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'"  data-original-title="Edit Category" class="edit_user btn btn-primary btn-sm">Edit</a>';
                return $btn;

            })
            ->rawColumns(['date','action'])
            ->make(true);
        }


    }

     /**
     * Display a user details by id
     */

    public function userById($id)
    {
     $users = User::where('id','=',$id)->orderBy('id','DESC')->first();
     return response()->json($users);
    }

     /**
     * Display a user details by gender
     */

    public function userByGender($gender)
    {
     $users = User::where('gender','=',$gender)->orderBy('id','DESC')->get();
     return response()->json($users);
    }


    /**
     * Display a user details by gender
     */

    public function userByGenderLike($gender)
    {
     $users = User::where('gender','like','%' . $gender . '%')->orderBy('id','DESC')->get();
     return response()->json($users);
    }
     /**
     * Display a users details by last Purchase Date
     */

    public function userByLastPurchaseDate($date)
    {
     $users =  $data = DB::table('users')
     ->join('orders','orders.customer_id','=','users.id')
     ->orderBy('orders.created_at','DESC')
     ->get(['users.*','orders.*']);
     return response()->json($users);
    }
    /**
     * Display a users who purchased Item in Category
     */

    public function userByItemCategory($item,$category)
    {
        $data = DB::table('products')
        ->join('orderdetails','orderdetails.product_id','=','products.id')
        ->join('orders','.orders.order_no','=','orderdetails.order_id')
        ->join('users','users.id','=','orders.customer_id')
        ->join('categories','categories.id','=','products.product_category')
        ->where('products.product_name','=',$item)
        ->where('categories.category_name','=',$category)
        ->groupBy('users.id')
        ->get(['users.*']);
     return response()->json($data);
    }

    /**
     * Display a users who purchased and item on a specific date
     */

    public function userPurchasedItemDate($item,$date)
    {
     $users = User::where('product_name','=',$item)->where('created_at','=',$date)->orderBy('id','DESC')->get();
     return response()->json($users);
    }
   
   //Users By Last Login Time

   public function UsersByLastLogin($last_login)
   {
    $data = DB::table('userlogins')->join('users','users.id','=','userlogins.user_id')
    ->where('userlogins.login_time','=',$last_login)
    ->orderBy('userlogins.created_at','DESC')->get(['users.*','userlogins.*']);
    return response()->json($data);

   }

     /**
      * Store Users Data
      *
      */

      public function store(Request $request)
      {
          //
          $validator = Validator::make($request->all(),[
              'first_name' => 'required|max:255',
              'last_name' => 'required|max:255',
              'email' => 'required|unique:users',
              'password' => 'required|min:7',
          ]);
          if($validator->passes())
          {
           $user =  User::create([
              'first_name' => $request->first_name,
              'last_name' => $request->last_name,
              'email' => $request->email,
              'gender' => $request->gender,
              'password' => bcrypt($request->password),
              'role' => '2'
            ]);

            $accessToken = $user->createToken('authToken')->accessToken;
            
            return response()->json(['access_token'=>$accessToken,'success'=>'Account Successffully Created']);
          }
          else {
              return response()->json(['user_errors' => $validator->errors()->all()]);
          }

      }


      /** Update  User Details */
      public function update(Request $request)
      {
          //
          $validator = Validator::make($request->all(),[
            'edit_first_name' => 'required|max:255',
            'edit_last_name' => 'required|max:255',
            'edit_email' => 'required|unique:users',
            'edit_password' => 'required|min:7',
          ]);
          $updateData = array(
            'first_name' => $request->edit_first_name,
            'last_name' => $request->edit_last_name,
            'email' => $request->edit_email,
            'gender' => $request->edit_gender,
            'password' => bcrypt($request->edit_password),
            );
            if(User::where('id','=',$request->hidden_user_id)->update($updateData))
            {
              return response()->json(['category_successu' => 'User Details Successfully Updated']);
            }
            else
            {
                return response()->json(['status'=>'error','edit_user_errors'=>$validator->errors()->all()]);
            }
      }


}
