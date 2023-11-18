<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use Illuminate\Http\Request;

class IotController extends Controller
{
    public function iotInit(Request $request){
        if(!$request->api){
            return response('API Key not detected', 400);
        }
        if(!IotController::checkAPI($request->api)){
            return response('API False', 403);
        }
        $iot = Iot::where('api_key', $request->api)->first();
        return response($iot->status, 200);
    }

    private function checkAPI($api){
        if(Iot::where('api_key', $api)->exists()){
            return true;
        }
        else{
            return false;
        }
    }
}
