<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Image;
use Auth;
use DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = DB::table('products')->join('subcategories','subcategories.id','=','products.subcategory_id')
            ->join('categories','categories.id','=','products.product_category')->get(['subcategories.*','categories.*','products.*']);
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('image', function ($prod) { 
                $url= asset('storage/pichas/'.$prod->product_image);
                return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-target="#zoomupModal" data-original-title="Edit Product" class="edit_product btn btn-primary btn-sm">Edit</a>
               ';
                return $btn;

            })
            ->rawColumns(['image','action'])
            
            ->make(true);
        }
    }

    /**Stock Out Alert */
    public function stockOut(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = DB::table('products')->where('products.available_quantity','<',5)->get();
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
    }

    /** End */

    /**
     * Return All Products Object
     */
    public function usersProducts(Request $request)
    {
        $query = DB::table('products')->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('categories','categories.id','=','products.product_category');

        $start = $request->start;
        $end = $request->end;

        if(!empty($request->sub_cat))
        {
           $query->where('subcategories.id','=',$request->sub_cat);
        }
        if(!empty($request->cat) && $request->cat !=="all")
        {
            $query->where('categories.id','=',$request->cat);
        }

        if(!empty($request->start) && !empty($request->end))
        {
            $query->whereBetween('products.product_price',[$start,$end]);
        }
        
       $data =  $query->get(['categories.*','subcategories.*','products.*']);
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate();
        $validator = Validator::make($request->all(),[
            'product_name' => 'required|max:255|unique:products',
            'product_price' => 'required',
            'subcategory_id' => 'required',
            'available_quantity' => 'required',
            'product_photo' => 'required',
            
        ],[
            'product_name.unique' => 'Product Name Already Exists'
        ]);
    $input = $request->all();
    if($image= $request->file('product_photo'))
    {

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
     
        // $destinationPath = public_path('pichas');
        $image = $request->file('product_photo');
        $input['imagename'] = time().'.'.$image->extension();
        $filePath = public_path('storage/pichas/');
        $profileImage = $input['imagename'];
        //$image->move($destinationPath,$profileImage);
        Storage::disk('public')->putFileAs('pichas', $request->file('product_photo'), $profileImage);
        $input['product_photo'] = "$profileImage";

    }
    if($validator->fails())
    {
        return response()->json(['product_errors' => $validator->errors()->all()]);
    }
    else
    {
       $user = Auth::guard('admin')->user();
      
        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_category' => $request->product_category,
            'subcategory_id' =>$request->subcategory_id,
            'product_description'=> $request->product_desc,
            'available_quantity' => $request->available_quantity,
            'added_by' => $user->id,
            'product_image' => $profileImage
        ]);
    
        return response()->json(['success'=>'New Product Successfully Added']);
    }
    
    }

      /**
     * Return All Products Object
     */
    public function Products()
    {
        $products = Product::orderBy('id','DESC')->get();
        return response()->json($products);
    }

     /**
     * Return All Products By Category
     */
    public function ProductsByCategory($category)
    {
        $products = Product::where('product_category','=',$category)->orderBy('id','DESC')->get();
        return response()->json($products);
    }

     /**
     * Return All Products By User
     */
    public function ProductsByUser($user_id)
    {
        $products = Product::where('added_by','=',$user_id)->orderBy('id','DESC')->get();
        return response()->json($products);
    }

    /**
     * Return All Products By Sales Volume
     */
    public function ProductsBySalesVolume()
    {
        $products = DB::table('products')->select(DB::raw('products.product_name,SUM(orderdetails.orderdetails_total) as sales_volume'))
        ->join('orderdetails','orderdetails.product_id','=','products.id')
        ->groupBy('products.product_name')->get();
        return response()->json($products);
    }

    /**
     * Return All Products By Name
     */
    public function ProductsByName($product_name)
    {
        $products = Product::where('product_name','=',$product_name)->orderBy('id','DESC')->get();
        return response()->json($products);
    }
     /**
     * Return All Products By ID
     */
    public function ProductsById($product_id)
    {
        $products = Product::where('id','=',$product_id)->orderBy('id','DESC')->get();
        return response()->json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = DB::table('products')->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('categories','categories.id','=','subcategories.category',)->where('products.id','=',$id)
        ->first();
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
         //$request->validate();
         $validator = Validator::make($request->all(),[
            'product_nameu' => 'required|max:255',
            'product_priceu' => 'required',
            'subcategory_idu' => 'required',
            'available_quantityu' => 'required',
            
        ]);
        if($validator->passes())
        {
            $product = Product::where('id','=',$request->hidden_product_id)->first();
            if ($image=$request->file('product_photou')) {
                $imageName = date('YmdHis') . '.' .  $image->getClientOriginalExtension();;
                // $request->file->storeAs('public/pichas', $imageName);
                Storage::disk('public')->putFileAs('pichas', $request->file('product_photou'), $imageName);

                if ($product->product_image) {
                   Storage::delete('public/pichas/' . $product->product_image);
                }
              } else {
                $imageName = $product->product_image;
              }
              $updateData = array(
                'product_name' => $request->product_nameu,
                'product_price' => $request->product_priceu,
                'subcategory_id' =>$request->subcategory_idu,
                'product_category' => $request->product_categoryu,
                'product_description'=> $request->product_descriptionu,
                'available_quantity' => $request->available_quantityu,
                'product_image' => $imageName
              );
              if(Product::where('id','=',$request->hidden_product_id)->update($updateData))
              {
                return response()->json(['product_success' => 'Product Successfully Updated']);
              }
        }
        else
        {
            return response()->json(['products_update_errors' => $validator->errors()->all()]);


        }
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Products::findOrFail($id);
        //$data->delete();
        if(Storage::delete('public/pichas/' . $data->product_image))
        {
            $data->delete();
        }

    }
}