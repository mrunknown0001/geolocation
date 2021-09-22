<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;
use Auth;
use Hash;
use DataTables;
use App\Http\Controllers\GeneralController as GC;

class AdminController extends Controller
{
    /**
     * Change Password
     */
    public function changePassword()
    {
        return view('admin.change-password');
    }


    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();
        if(Hash::check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password Changed!');

        }
        else {
            return redirect()->back()->with('error', 'Current Password Invalid!');
        }
    }

    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
    	return view('admin.dashboard');
    }


    /**
     * Admin Proile
     */
    public function profile()
    {
    	return view('admin.profile');
    }


    /**
     * Users
     */
    public function users(Request $request)
    {
        if($request->ajax()) {
            $users = User::where('active', 1)->get();
 
            $data = collect();
            if(count($users) > 0) {
                foreach($users as $j) {
                    $data->push([
                        'first_name' => $j->first_name,
                        'last_name' => $j->last_name,
                        'action' => 'admin action'
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.users');
    }
}
