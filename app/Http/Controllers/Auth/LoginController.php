<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use App\Models\Userlogin;
use Carbon\Carbon;
use DataTables;
use DB;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect after login
     * 
     * @var string
     */

     protected $redirectTo ='/user';

     /**
      * Create a new controller instance
      *
      *@return void
      */

      public function __construct()
      {
          $this->middleware('guest:user')->except('logout');
      }


      /**
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */
       public function showLoginForm()
       {
           return view('mbele.auth');
       }

       /**
        * @param Request $request
        *@return \Illuminate\Http\RedirectResponse
        *@throws \Illuminate\Validation\ValidationException
        */

       public function login(Request $request)
       {
           $this->validate($request,[
               'email' => 'required|email',
               'password' => 'required|min:6'
           ]);
           if(Auth::guard('user')->attempt([
               'email' => $request->email,
               'password' => $request->password
           ],$request->get('remember')))
           {
               $user_id = Auth::guard('user')->user()->id;
               $current_time = Carbon::now()->toDateTimeString();

               Userlogin::create([
                   'user_id' => $user_id,
                   'user_ip'=> $request->ip(),
                   'login_time'=>$current_time
               ]);

               return redirect()->intended(route('user.checkout'));
           }
           return back()->withInput($request->only('email','remember'));
       }

      public function userLogins(Request $request)
      {
          //
        if($request->ajax())
        {
            $data = DB::table('userlogins')->join('users','users.id','=','userlogins.user_id')->orderBy('userlogins.created_at','DESC')->get(['users.*','userlogins.*']);
            return Datatables::of($data)->addIndexColumn()
            ->make(true);
        }

      }

      


       public function loginApi(Request $request)
       {
           $this->validate($request,[
               'email' => 'required|email',
               'password' => 'required|min:6'
           ]);
           if(Auth::guard('user')->attempt([
               'email' => $request->email,
               'password' => $request->password
           ],$request->get('remember')))
           {
               $user = Auth::guard('user')->user();
               $accessToken = $user->createToken('authToken')->accessToken;
               $user_id = Auth::guard('user')->user()->id;
               $current_time = Carbon::now()->toDateTimeString();

             $user_logged =  Userlogin::create([
                   'user_id' => $user_id,
                   'user_ip'=> $request->ip(),
                   'login_time'=>$current_time
               ]);
               return response()->json(['user_logged'=>$user_logged,'access_token'=>$accessToken]);
           }
           return response()->json(['Error' => 'Invalid Email Or Password']);
       }


       /**
        * @param Request $request
        *@return \Illuminate\Contracts\View\Factory\Illuminate\View\View
        */

        public function logout(Request $request)
        {
            
            $user_id = $request->user_logged;
            $current_time = Carbon::now()->toDateTimeString();
            $last_user_login_record = Userlogin::where('user_id','=',$user_id)->orderBy('id','DESC')->first();
            $update_data = array(
                'logout_time' => $current_time
            );
            $updated_login = Userlogin::where('id','=',$last_user_login_record->id)->update($update_data);
            
            Auth::guard('user')->logout();
            $request->session()->invalidate();
            // return redirect()->route('home');
          return  response()->json(['status'=>'success','user_details'=>$updated_login,'Message','User Logged Out']);
        }


}
