<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use DataTables;

class CategoryController extends Controller
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
            $data = Category::latest()->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('date',function($row){
             return $row->created_at;
            })  
            ->addColumn('action',function($row2){
                $btn='<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'"  data-original-title="Edit Category" class="edit_category btn btn-primary btn-sm">Edit</a>';
                return $btn;

            })
            ->rawColumns(['date','action'])
            ->make(true);
        }


    }

    /**
     * Return All Categories Object
     */
    public function Categories()
    {
        $subcategories = Category::orderBy('id','DESC')->get();
        return json_encode($subcategories);
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
            'category_name' => 'required|max:255'
        ]);
        if($validator->passes())
        {
            Category::create([
                'category_name' => $request->category_name
            ]);
            return response()->json(['status'=>'success','success'=>'New Category Successfully Added']);
        }
        else
        {
            return response()->json(['status'=>'error','category_errors'=>$validator->errors()->all()]);
        }
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
        $category = Category::find($id);
        return response()->json($category);
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
        $validator = Validator::make($request->all(),[
            'category_nameu' => 'required|max:255'
        ]);
        $updateData = array(
            'category_name' => $request->category_nameu
          );
          if(Category::where('id','=',$request->hidden_category_id)->update($updateData))
          {
            return response()->json(['category_successu' => 'Category Successfully Updated']);
          }
          else
          {
              return response()->json(['status'=>'error','category_update_errors'=>$validator->errors()->all()]);
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