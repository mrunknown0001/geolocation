<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;

class UserController extends Controller
{
    /**
     * User Dashboard
     */
    public function dashboard()
    {
    	return view('user.dashboard');
    }


}
