<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\TransactionMpesa;
use App\Models\UserWallet;
use App\Models\Product;
use Validator;
use Auth;
use DataTables;
use DB;


class OrdersController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = DB::table('users')
            ->join('orders','orders.customer_id','=','users.id',)->get(['users.*','orders.*']);
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-target="#zoomupModal" data-original-title="Edit Product" class="edit_product btn btn-primary btn-sm">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
    }

    //Fetch Order Details

    public function orderDetails(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = DB::table('products')
            ->join('orderdetails','orderdetails.product_id','=','products.id',)
            ->join('orders','orders.order_no','=','orderdetails.order_id')->get(['products.*','orders.*','orderdetails.*']);
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-target="#zoomupModal" data-original-title="Edit Product" class="edit_product btn btn-primary btn-sm">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
        
    }


    public function getUserReceipt(Request $request)
    {
        $id=$request->id;
        $trans = TransactionMpesa::where('id','=',$id)->first();
         $order_no = $trans->order_no;
         $products_ordered = DB::table('products')
         ->join('orderdetails','orderdetails.product_id','=','products.id',)
         ->join('orders','orders.order_no','=','orderdetails.order_id')
         ->where('orders.order_no','=',$order_no)
         ->get(['products.*','orders.*','orderdetails.*']);

         $payments_details = DB::table('users')
         ->join('transaction_mpesas','transaction_mpesas.user_confirm_id','=','users.id')
         ->where('transaction_mpesas.id','=',$id)->get(['users.*','transaction_mpesas.*']);
         return response()->json(['trans'=>$payments_details,'products'=>$products_ordered]);
    }

        //Fetch User Order Details

        public function userOrders(Request $request)
        {
            //
            $id = $request->user_ordered;
            $category = $request->category_select;
            $price = $request->price_search;
            $date_range = $request->date_range;
            $to = "to";
            $from_date = "";
            $to_date = "";
            $single_date = "";
            if(strpos($date_range,$to) == false)
            {
               $single_date = $date_range;
            }
            else
            {
                $exploded_date = explode('to',$date_range);
                
                $from_date = date('Y-m-d H:i:s',strtotime($exploded_date[0]));
                $to_date = date('Y-m-d H:i:s',strtotime($exploded_date[1]));

                // echo "From " . $from_date . "<br> To : " . $to_date;
            }
            
            if($request->ajax())
            {
                $data = DB::table('products')
                ->join('categories','categories.id','=','products.product_category')
                ->join('orderdetails','orderdetails.product_id','=','products.id')
                ->join('orders','orders.order_no','=','orderdetails.order_id');
               
                if($category)
                {
                    $data->where('products.product_category','=',$category);
                }
                if($price)
                {
                    $data->where('products.product_price','=',$price);
                }
                // if(!empty($single_date))
                // {
                //    $data->whereDate('orders.created_at','=',$single_date);
                // }
                if(!empty($from_date) && !empty($to_date))
                {
                //    $data->whereBetween('orderdetails.created_at',array($from_date,$to_date));
                   $data->whereDate('orderdetails.created_at','>=',$exploded_date[0]);
                   $data->whereDate('orderdetails.created_at','<=',$exploded_date[1]);
                  
                }
               
                $data->where('orders.customer_id','=',$id);
                $data->get(['products.*','categories.*','orders.*','orderdetails.*']);

                return Datatables::of($data)->addIndexColumn()
                ->addColumn('action',function($row){
                    $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-target="#zoomupModal" data-original-title="Edit Product" class="edit_product btn btn-primary btn-sm">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action']) 
                ->make(true);
            }
        }

    //Mpesa Purchases Transactions
    public function mpesaTransactions(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = DB::table('transaction_mpesas')
            ->join('users','users.id','=','transaction_mpesas.user_confirm_id')->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-target="#zoomupModal" data-original-title="Edit Product" class="edit_product btn btn-primary btn-sm">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
    }
    //Mpesa Purchases Transactions
    public function usermpesaTransactions(Request $request)
    {
        //

        $id = $request->user;
        if($request->ajax())
        {
            $data = DB::table('users')
            ->join('transaction_mpesas','transaction_mpesas.user_confirm_id','=','users.id')
            ->where('transaction_mpesas.user_confirm_id','=',$id)->get(['users.*','transaction_mpesas.*']);
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('payment-for',function($row2){
                if($row2->payment_for=='Wallet')
                {
                    $purpose='WALLET TOP UP';
                }
                else
                {
                    $purpose='PRODUCT PURCHASE';
                }
                
                return $purpose;
            })
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-target="#zoomupModal" data-original-title="Print Receipt" class="print_receipt btn btn-primary btn-sm">PRINT </a>';
                return $btn;
            })
            ->rawColumns(['action','purpose']) 
            ->make(true);
        }
    }

    //List Of All Transactions
    public function allTransactions()
    {
        $transactions = DB::table('transaction_mpesas')
        ->join('users','users.id','=','transaction_mpesas.user_confirm_id')->get();
        return response()->json($transactions);
    }

    //List Of All Transactions By Category
    public function allTransactionsByCategory($category)
    {
        $transactions = DB::table('transaction_mpesas')
        ->join('users','users.id','=','transaction_mpesas.user_confirm_id')->get();
        return response()->json($transactions);
    }
    
    //Users Who Purchased A Specific Item
    public function userPurchasedItem($item)
    {
        $users_item_purchased = DB::table('products')->join('orderdetails','orderdetails.product_id','=','products.id')
        ->join('orders','orders.order_no','=','orderdetails.order_id')
        ->join('users','users.id','=','orders.customer_id')
        ->where('products.product_name','=',$item)->get();
        return response()->json($users_item_purchased);
    }
   
    //Users Who Purchased An Item On Specific Date

    public function usersPurchasedItemDate($item,$date)
    {
        $users_item_purchased = DB::table('products')->join('orderdetails','orderdetails.product_id','=','products.id')
        ->join('orders','orders.order_no','=','orderdetails.order_id')
        ->join('users','users.id','=','orders.customer_id')
        ->where('orders.created_at','=',$date)
        ->where('products.product_name','=',$item)->get();
        return response()->json($users_item_purchased);
    }



    //List Of All Transactions By Date Range
    public function allTransactionsByDate($from,$to)
    {
        $transactions = DB::table('transaction_mpesas')
        ->join('users','users.id','=','transaction_mpesas.user_confirm_id')
        ->whereBetween('created_at', [$from, $to])
        ->get();
        return response()->json($transactions);
    }

    // Fetch User MPESA Wallet Transactions 
    public function getMpesaWallet()
    {
        $user = Auth::guard('user')->user();
        //Used To Check If User Payment Exist
        $user_transact = TransactionMpesa::where('user_confirm_id','=',$user->id)->where('payment_for','=','Wallet')->orderBy('id','DESC')->get();
        if($user_transact->count()>0)
        {
            //get saved user response
      $user_transaction = TransactionMpesa::where('user_confirm_id','=',$user->id)->where('payment_for','=','Wallet')->orderBy('id','DESC')->first();
      $amount_added = $user_transaction->amount_paid;
      $user_wallet = UserWallet::where('wallet_user_id','=',$user->id)->get();
      if($user_wallet->count()>0)
      { 
          $wallet = UserWallet::where('wallet_user_id','=',$user->id)->first();
          //Update Wallet Amount
          $new_amount = $amount_added + $wallet->user_wallet_amount;

          $updateData = array(
              "user_wallet_amount" => $new_amount
          );
          if(UserWallet::where('wallet_user_id','=',$user->id)->update($updateData))
          {
            return response()->json(['wallet_update_success' => 'Wallet  Successfully Updated']);
          }
          else
          {
            return response()->json(['wallet_update_errors' => 'Error Updating Wallet Try Again']);

          }

      }
      else
      {
          //Insert Amount To Wallet

          if(User::create(['wallet_user_id'=>$user->id,'user_wallet_amount'=>$amount_added]))
          {
            return response()->json(['wallet_insert_success'=>'Wallet Succesfully Topped Up']);
          }
          else
          {
            return response()->json(['wallet_insert_error'=>'Error Updating Wallet']);

          }
      }
     
        }
 
      return $response()->json($user_transaction);
    }

    //Store user order details

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'mode_payment' => 'required|max:255'
        ]);
        if($validator->passes())
        {
            //Logged In User Id
            $user = Auth::guard('user')->user();
            Order::create([
                'payment_type' => $request->mode_payment,
                'customer_id' => $request->logged,
                'order_amount' => $request->order_amount,
                'transaction_no' => $request->order_no,
                'order_no' => $request->order_no,
                'order_status' => "Pending"
            ]);

            $order = Order::latest()->first();
            
            $product_orders = $request->order_products;

            foreach($product_orders as $product_order)
            {
                $total = $product_order['total'];
                $product_id = $product_order['id'];
                $product_price = $product_order['price'];
                $quantity = $product_order['quantity'];
                $product = Product::where('id','=',$product_id)->first();
                $available_quantity = $product->available_quantity;
                $new_quantity = $available_quantity - $quantity;
                $update_quantity_array = array('available_quantity' => $new_quantity);
                Orderdetail::create([
                    'product_id' => $product_id,
                    'product_price' => $product_price,
                    'order_quantity' => $quantity,
                    'orderdetails_total' => $total,
                    'order_id' => $request->order_no
                ]);

                Product::where('id','=',$product_id)->update($update_quantity_array);
            }

            
            return response()->json(['status'=>'success','success'=>'New Order Successfully Placed']);
        }
        else
        {
            return response()->json(['status'=>'error','order_errors'=>$validator->errors()->all()]);
        }
    }

}
