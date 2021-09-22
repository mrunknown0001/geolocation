<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;

class ScheduleController extends Controller
{
    // Schedule
    public function schedule()
    {
    	$sched = Schedule::find(1);

    	return $sched;
    }
}
