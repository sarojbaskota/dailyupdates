<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Leave;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
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
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|unique:users',
            'phone' => 'required|numeric',
            'position_in_office' => '',
            'is_admin' =>'',
            'status' => '',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
               'errors' => $validator->errors()->all()
            ]);
        }
        if($request->file('user_avatar')){
            $validator = \Validator::make($request->all(), [
                'user_avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb mimes:jpeg,jpg,png,gif
            ]);
            if ($validator->fails())
            {
                return response()->json([
               'errors' => $validator->errors()->all()
                ]);
            }
            $file = $request->file('user_avatar');
            $avatar = $file->getClientOriginalName();
            $file->move(public_path().'/images/avatar',$avatar);
    
            User::create($request->except('user_avatar')+['avatar' => $avatar]);
            return 'New profile Created Sucessfully !!';
        }
        User::create($request->all());
        return 'New profile Created Sucessfully !!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return response()->json([
            'data' => $user,
            'message' => 'editable data.'
        ]);
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
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|numeric',
            'position_in_office' => '',
            'is_admin' =>'',
            "password" =>"required",
            "password_confirmation" =>"required|same:password"
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
               'errors' => $validator->errors()->all()
            ]);
        }
        if($request->file('user_avatar')){
            $validator = \Validator::make($request->all(), [
                'user_avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb mimes:jpeg,jpg,png,gif
            ]);
            if ($validator->fails())
            {
                return response()->json([
               'errors' => $validator->errors()->all()
                ]);
            }
        $file = $request->file('user_avatar');
        $avatar = $file->getClientOriginalName();
        $file->move(public_path().'/images/avatar',$avatar);

        $user =  User::findOrfail($id);
        $user->update($request->except('user_avatar','password','status')+['avatar' => $avatar]);
        return 'Profile Updated succefully !!';
        }
        $user =  User::findOrfail($id);
        $user->update($request->all());
        return 'Profile Updated succefully !!';
    }
    /**
     * change the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $user = User::findOrfail($id);
        if($user->status==1){
            $user->update([
                $user->status = 0,
                $user->save()
            ]);
            return "User Deactivated !!";
        }else{
            $user->update([
                $user->status = 1,
                $user->save()
            ]);
            return "User Activated !!";
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
        User::findOrfail($id)->delete();
        return "Deleted successfully !!";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leaveHistroy()
    {
        // $leaves = Leave::with('user')->get();
        $leaves = Leave::paginate(1);
        return view('admin.leaves.index',compact('leaves'));
    }
    
}
