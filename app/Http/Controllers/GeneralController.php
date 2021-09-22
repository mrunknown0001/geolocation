<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\EmployeeLog;
use DB;

class GeneralController extends Controller
{
    /**
     * Get Location
     */
    public static function getLocation($lat, $lon)
    {
    	// Latlon.net
    	// $action = "<a href='https://www.latlong.net/c/?lat=" . $lat . "&long=" . $lon . "' target='_blank'>Location</a>";
    	
    	// google search :)
    	$action = "<a href='https://www.google.com/search?q=" . $lat . "%2C+" . $lon . "' target='_blank'>Location</a>";

    	return $action;
    }



    public static function showLogs($id)
    {
        $action = '<a href="' . route('user.show.emp.log', $id) . '">Show Logs</a>';

        return $action;
    }



    /**
     * Time in and out 
     */
    public static function punchType($id)
    {
    	$log = EmployeeLog::where('user_id', $id)
    					->whereDate('created_at', DB::raw('CURDATE()'))
    					->first();

    	if(empty($log)) {
    		return 'In';
    	}
    	else {
    		return 'Out';
    	}

    }
}
