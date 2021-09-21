<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmployeeLog;
use Auth;

use DataTables;

use App\Http\Controllers\GeneralController as GC;

class EmployeeController extends Controller
{
    /**
     * Employee Dashboard
     */
    public function dashboard()
    {
    	// get login and logout today
    	// if logout if available or out, disable punch with error do on front end
    	return view('employee.dashboard');
    }



    /**
     * Pucnh Method : In or Out
     */
    public function punch(Request $request, $lat, $lon)
    {
    	if($request->ajax()) {
    		$log = new EmployeeLog();
    		$log->user_id = Auth::user()->id;
    		$log->manager_id = Auth::user()->manager->id;
    		// in or out condition
    		$log->type = GC::punchType(Auth::user()->id);
    		$log->latitude = $lat;
    		$log->longitude = $lon;
    		// $log->ip_address = $request->ip();
    		$log->ip_address = json_encode($request->ips());

    		if($log->save()) {
    			return 'ok';
    		}
    		else {
    			return 'error saving log';
    		}
    	}
    	else {
    		return 'ajax error';
    	}
    }


    /**
     * punches 
     */
    public function punches (Request $request)
    {
        if($request->ajax()) {
        	$punches = EmployeeLog::where('user_id', Auth::user()->id)->get();
 
            $data = collect();
            if(count($punches) > 0) {
                foreach($punches as $j) {
                    $data->push([
                        'type' => $j->type,
                        'date_time' => date('F j, Y h:i:s A', strtotime($j->created_at)),
                        'action' => GC::getLocation($j->latitude, $j->longitude)
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);

        }

    	return view('employee.punches');
    }
}
