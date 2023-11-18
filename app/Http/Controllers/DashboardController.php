<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardC()
    {
        $time = Carbon::now();
        $info = "";

        if(auth()->user()->shift_id != null){
            $options = [
                'join' => ', ',
                'parts' => 3,
                'syntax' => CarbonInterface::DIFF_ABSOLUTE,
              ];
              $startTime = Carbon::parse(auth()->user()->shift->start);
              $endTime = Carbon::parse(auth()->user()->shift->end);

              if($time > $startTime){
                $info = "ago";
              }
              $countdown = $time->diffForHumans(auth()->user()->shift->start, $options) . " " . $info;
        }
        else{
            $startTime = "00:00:00";
            $endTime = "00:00:00";
            $countdown = "";
        }

        return view('dashboard.dashboardView', [
            'title' => 'IoTAbs | Dashboard',
            'countdown' => $countdown,
            'startTime' => $startTime,
            'endTime' => $endTime
        ]);
    }
}
