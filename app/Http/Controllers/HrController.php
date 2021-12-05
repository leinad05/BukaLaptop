<?php

namespace App\Http\Controllers;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access-permission-brand');
        $data = DB::table('users')->where('sebagai', '=', 'employee')->get();
        return view('hrm.index', compact('data'));
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
        $this->authorize('access-permission-brand');
        DB::table('users')->insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'sebagai' => 'employee',
                'status' => 'active'
            ]
        );
        return redirect('hr')->with('sukses', 'Successfully add employee data');
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
        $this->authorize('access-permission-brand');
        $id = $request->id_user;
        $employee = User::find($id);

        return response()->json(array(
            'status' => 'oke',
            'msg'=>view('hrm.editformmodal', compact('employee'))->render()
        ),200);
    }

    public function simpan_edit_hr(Request $request){
        $this->authorize('access-permission-brand');
        $id = $request->id_user;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $employee = User::find($id);
        $employee->name = $name;
        $employee->email = $email;
        $employee->password = $password;
        $employee->save();

        return response()->json(array(
            'status' => 'sukses',
            'msg'=> 'Successfully edit employee data'
        ),200);
    }

    public function delete_data_hr_ajax(Request $request){
        $this->authorize('access-permission-brand');
        $employee = User::find($request->id_user);
        try {
            $employee->delete();
            return response()->json(array(
                'status' => 'sukses',
                'msg'=> 'Successfully delete employee data'
            ),200);
        } catch (\PDOException $e) {
            $msg = "Failed to delete data";
            return response()->json(array(
                'status' => 'error',
                'msg'=> $msg
            ),200);
        }
    }

    public function suspend_data_hr_ajax($id){
        $this->authorize('access-permission-brand');
        
        $employee = User::find($id);
        $current_stat = $employee->status;
        $stat = "";
        if ($current_stat == "active") {
            $stat = "suspended";
        } else {
            $stat = "active";
        }
        
        $employee->status = $stat;
        $employee->save();

        return redirect('hr')->with('sukses', 'Successfully update employee status');
    }
}
