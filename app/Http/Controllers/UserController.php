<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use App\User;
use App\EmployeeLog;
use Auth;
use DB;
use App\Http\Controllers\GeneralController as GC;

class UserController extends Controller
{
    /**
     * User Dashboard
     */
    public function dashboard()
    {
    	return view('user.dashboard');
    }



    public function punches(Request $request)
    {
        if($request->ajax()) {
        	$punches = EmployeeLog::where('manager_id', Auth::user()->id)->get();
 
            $data = collect();
            if(count($punches) > 0) {
                foreach($punches as $j) {
                    $data->push([
                    	'emp' => $j->employee->first_name . ' ' . $j->employee->last_name,
                        'type' => $j->type,
                        'date_time' => date('F j, Y h:i:s A', strtotime($j->created_at)),
                        'ip' => $j->ip_address,
                        'action' => GC::getLocation($j->latitude, $j->longitude)
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);

        }

    	return view('user.punches');
    }


}
