<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Update;
use App\User;

class DailyUpdatesController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function infoEmployeeUpdate()
    {
        $users = User::where('is_admin',0)->get();
        return view('admin.updates.index',compact('users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function historyEmployeeUpdate($id)
    {
        $update = Update::where('user_id',$id)->orderBy('created_at','dec')->get();
        $user_id = $id;
        $employee = User::select('full_name','avatar','created_at')->where('id',$id)->first();
        return view('admin.updates.update',compact('update','user_id','employee'));
    }
    /**
     * Display a listing of the resource. for employee
     *
     * @return \Illuminate\Http\Response
     */
    public function myInfoEmployeeUpdate()
    {
        return view('employee.update');
    }
    
    /**
     * store a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employeeUpdateStore(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'update_of_fullday' => 'required',
            ]);

    if ($validator->fails()) {
       return response()->json(['errors' => $validator->errors()->all()]);
    }

        Update::create($request->all());
        return "Successfully Store Your Updates !!!";
    }
    /**
     * Display the specified resource. for employee
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myHistoryEmployeeUpdate()
    {
        $updates = Update::where('user_id',\Auth::user()->id)->latest()->paginate(7);
        return view('employee.updates_history',compact('updates'));
    }
}
