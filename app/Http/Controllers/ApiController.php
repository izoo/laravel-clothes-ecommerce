<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apiuser;
use App\Models\Apitoken;
use Validator;
use DataTables;
use Auth;
use Carbon\Carbon;
use DB;



class ApiController extends Controller
{


//List Of Api Users
public function index(Request $request)
 {
        
        //
        if($request->ajax())
        {
            $data = Apiuser::latest()->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('date',function($row){
             return $row->created_at;
            })  
            ->addColumn('action',function($row2){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'"  data-original-title="ASSIGN TOKEN" class="assign_token btn btn-primary btn-sm">Assign Token</a>';
                return $btn;

            })
            ->rawColumns(['date','action'])
            ->make(true);
        }


    }

    //List Of User Access Tokens
public function tokens(Request $request)
{
       
       //
       if($request->ajax())
       {
           $data = DB::table('apitokens')->join('products','products.id','=','apitokens.api_productid')
           ->join('apiusers','apiusers.id','=','apitokens.api_userid')->get();
           return Datatables::of($data)->addIndexColumn()
           ->addColumn('date',function($row){
            return $row->created_at;
           }) 
           ->rawColumns(['date'])
           ->make(true);
       }


   }

    //Register API User

    public function register(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'username' => 'required|max:255|unique:apiusers'
        ]);
        if($validator->passes())
        {
            $length = 10;
           $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  
           $key = substr(str_shuffle($str), 0, $length);
           $user = Auth::guard('admin')->user();
          Apiuser::create([
            'username' => $request->username,
            'key' => $key,
            'added_by' => $user->id,
          ]);
          
          return response()->json(['success'=>'Api User Account Successffully Created']);
        }
        else {
            return response()->json(['api_errors' => $validator->errors()->all()]);
        }
    }

    //Assign Access Token

    public function assignToken(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'api_product_id' => 'required|max:255|',
            'hidden_api_user_id' => 'required|max:255|'
        ]);
        if($validator->passes())
        {
            $length = 17;
           $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  
           $token = substr(str_shuffle($str), 0, $length);
           $user = Auth::guard('admin')->user();
           $currentDateTime = Carbon::now();
           //token expires after one day
           $expires_on= Carbon::now()->addDay();
          Apitoken::create([
            'api_userid' => $request->hidden_api_user_id,
            'api_productid' => $request->api_product_id,
            'api_token' => $token,
            'expires_on' => $expires_on,
          ]);
          
          return response()->json(['success'=>'Api User Account Successffully Created']);
        }
        else {
            return response()->json(['token_errors' => $validator->errors()->all()]);
        }
    }

    //Get Single Api User Details
    public function getApiUser($id)
    {
      $api_user = ApiUser::where('id','=',$id)->first();
      return response()->json($api_user);
    }

}
