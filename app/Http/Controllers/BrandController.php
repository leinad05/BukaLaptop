<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access-permission-brand');
        $data = Brand::all();
        return view('brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('access-permission-brand');
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
        $this->authorize('access-permission-brand');
        $new_brand = new Brand();
        $new_brand->nama_brand = $request->name;
        $new_brand->save();
        return redirect('brands')->with('sukses', 'Successfully add brand data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('access-permission-brand');
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
        $this->authorize('access-permission-brand');
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
        $this->authorize('access-permission-brand');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $this->authorize('access-permission-brand');
        //
    }

    public function getDataFirst(Request $request){
        $this->authorize('access-permission-brand');
        $id = $request->id_brand;
        $brand = Brand::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg'=>view('brand.editformmodal', compact('brand'))->render()
        ),200);
    }

    public function simpan_edit_brand(Request $request){
        $this->authorize('access-permission-brand');
        $id = $request->id_brand;
        $name = $request->name;

        $brand = Brand::find($id);
        $brand->nama_brand = $name;
        $brand->save();

        return response()->json(array(
            'status' => 'sukses',
            'msg'=> 'Successfully edit brand data'
        ),200);
    }

    public function delete_data_brand_ajax(Request $request){
        $this->authorize('access-permission-brand');
        $brand = Brand::find($request->id_brand);
        try {
            $brand->delete();
            return response()->json(array(
                'status' => 'sukses',
                'msg'=> 'Successfully delete brand data'
            ),200);
        } catch (\PDOException $e) {
            $msg = "Failed to delete data, make sure there is no laptop in this brand!";

            return response()->json(array(
                'status' => 'error',
                'msg'=> $msg
            ),200);
        }
    }

}
