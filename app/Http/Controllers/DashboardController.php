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

        $options = [
            'join' => ', ',
            'parts' => 3,
            'syntax' => CarbonInterface::DIFF_ABSOLUTE,
          ];
          $startTime = Carbon::parse(auth()->user()->shift->start);

          if($time > $startTime){
            $info = "ago";
          }

        return view('dashboard.dashboardView', [
            'title' => 'IoTAbs | Dashboard',
            'countdown' => $time->diffForHumans(auth()->user()->shift->start, $options) . " " . $info,
            'startTime' => $startTime
        ]);
    }
}
