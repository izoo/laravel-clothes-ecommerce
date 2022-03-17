<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use DB;
class SubcategoryController extends Controller
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
            $data = DB::table('subcategories')->join('categories','categories.id','=','subcategories.category')->get(['categories.*','subcategories.*']);
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('date',function($row){
             return $row->created_at;
            })  
            ->addColumn('action',function($row2){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'"  data-original-title="Edit Category" class="edit_subcategory btn btn-primary btn-sm">Edit</a>
               ';
                return $btn;

            })
            ->rawColumns(['date','action'])
            ->make(true);
        }

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
        //
        $validator = Validator::make($request->all(),[
            'sub_category_name' => 'required|max:255',
            'category_id' => 'required|max:255'

        ]);
        if($validator->passes())
        {
            Subcategory::create([
                'subcategory_name' => $request->sub_category_name,
                'category' => $request->category_id
            ]);
            return response()->json(['status'=>'success','success'=>'New Sub Category Successfully Added']);
        }
        else
        {
            return response()->json(['status'=>'error','sub_category_errors'=>$validator->errors()->all()]);
        }
    }


    /**
     * Return All SubCategories Object
     */
    public function subCategories()
    {
        $subcategories = Subcategory::orderBy('id','DESC')->get();
        return json_encode($subcategories);
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
        $subcategory = DB::table('subcategories')->join('categories','categories.id','=','subcategories.category')
        ->where('subcategories.id','=',$id)
        ->first();
        return response()->json($subcategory);
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
        //
        $validator = Validator::make($request->all(),[
            'subcategory_nameu' => 'required|max:255',
            'category_idu' => 'required|max:255'
        ]);
        $updateData = array(
            'subcategory_name' => $request->subcategory_nameu,
            'category' => $request->category_idu
          );
          if(Subcategory::where('id','=',$request->hidden_subcategory_id)->update($updateData))
          {
            return response()->json(['category_successu' => 'Category Successfully Updated']);
          }
          else
          {
              return response()->json(['status'=>'error','subcategory_update_errors'=>$validator->errors()->all()]);
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
    }
}