<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;
use Auth;
use Hash;

class AdminController extends Controller
{
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
    public function users()
    {
        return view('admin.users');
    }
}
