<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Employee Dashboard
     */
    public function dashboard()
    {
    	return view('employee.dashboard');
    }

}
