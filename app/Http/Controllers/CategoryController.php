<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
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
        $new_category = new Category();
        $new_category->nama_kategori = $request->name;
        $new_category->save();
        return redirect('categories')->with('sukses', 'Successfully add category data');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function getDataFirst(Request $request){
        $id = $request->id_category;
        $category = Category::find($id);
        return response()->json(array(
            'status' => 'sukses',
            'msg'=>view('category.editformmodal', compact('category'))->render()
        ),200);
    }

    public function simpan_edit_category(Request $request){
        $id = $request->id_category;
        $name = $request->name;

        $category = Category::find($id);
        $category->nama_kategori = $name;
        $category->save();

        return response()->json(array(
            'status' => 'sukses',
            'msg'=> 'Successfully edit category data'
        ),200);
    }

    public function delete_data_category_ajax(Request $request){
        $category = Category::find($request->id_category);
        try {
            $category->delete();
            return response()->json(array(
                'status' => 'sukses',
                'msg'=> 'Successfully delete category data'
            ),200);
        } catch (\PDOException $e) {
            $msg = "Failed to delete data";

            return response()->json(array(
                'status' => 'error',
                'msg'=> $msg
            ),200);
        }
    }
}
