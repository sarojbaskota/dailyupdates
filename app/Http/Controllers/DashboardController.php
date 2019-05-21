<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
       $leave_requests = Leave::where('status','pending')->with('user')->get();
       return view('admin.dashboard',compact('leave_requests'));
    }
    /**
     * Show the application employee dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employee()
    {
        $leave_requests = Leave::where('user_id',Auth::user()->id)->where('request_seen','0')->where('status','accept')->get();
        return view('employee.dashboard',compact('leave_requests'));
    }
}
