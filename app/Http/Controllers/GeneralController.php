<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
