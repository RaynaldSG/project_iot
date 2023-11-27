<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IotController extends Controller
{
    //give state to IoT device
    public function iotInit(Request $request)
    {
        if (!$request->api) {
            return response('API Key not detected', 400);
        }
        if (!IotController::checkAPI($request->api)) {
            return response('API False', 403);
        }
        $iot = Iot::where('api_key', $request->api)->first();
        return response($iot->status, 200);
    }

    //get input from IoT device
    public function iotCardReadI(Request $request)
    {
        if (!IotController::checkAPI($request->api)) {
            return response('API False', 403);
        }
        if (!$request->card_id) {
            return response('Card ID not detected', 400);
        }
        Iot::where('api_key', $request->api)->update([
            'card_id' => $request->card_id
        ]);

        $resp = IotController::makeLog(Iot::where('api_key', $request->api)->get()->first()->id);
        Iot::where('api_key', $request->api)->get()->first()->update([
            'status' => 'idle',
            'card_id' => null,
        ]);
        return response($resp, 200);
    }

    public function iotCardReadR(Request $request)
    {
        if (!IotController::checkAPI($request->api)) {
            return response('API False', 403);
        }
        if (!$request->card_id) {
            return response('Card ID not detected', 400);
        }
        Iot::where('api_key', $request->api)->update([
            'card_id' => $request->card_id
        ]);

        return response("Success", 200);
    }

    private function checkAPI($api)
    {
        if (Iot::where('api_key', $api)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    private function makeLog($id)
    {
        $iot = Iot::where('id', $id)->get()->first();
        $timeNow = Carbon::now();
        if (User::where('card_id', $iot->card_id)->exists()) {
            $user = User::where('card_id', $iot->card_id)->get()->first();

            if($user->shift_id == null){
                return $user->name .";Tidak Ada Shift";
            }

            if (Log::where('user_id', $user->id)->count() < 1) {
                Log::create([
                    'card_id' => $iot->card_id,
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'shift_start' => ($user->shift_id != null) ? $user->shift->start : null,
                    'shift_end' => ($user->shift_id != null) ? $user->shift->end : null,
                ]);
                return $user->name . ';Shift Dimulai';
            }

            if (Carbon::create(Log::where('user_id', $user->id)->get()->last()->created_at)->isSameDay($timeNow)) {
                $log = Log::where('user_id', $user->id)->get()->last();
                if ($log->out == null) {
                    $log->update([
                        'updated_at' => $timeNow,
                        'out' => $timeNow,
                    ]);
                    return $user->name . ';Shift Selesai';
                } else {
                    $log->update([
                        'updated_at' => $timeNow,
                    ]);
                    return $user->name . ';Pulang Oi!';
                }
            } else {
                Log::create([
                    'card_id' => $iot->card_id,
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'shift_start' => ($user->shift_id != null) ? $user->shift->start : null,
                    'shift_end' => ($user->shift_id != null) ? $user->shift->end : null,
                ]);
                return $user->name . ';Shift Dimulai';
            }
        } else {
            Log::create([
                'card_id' => $iot->card_id,
                'in' => $timeNow
            ]);
            return 'User Unknown';
        }
        return 'somting wong';
    }

    public static function getCardID()
    {
        $iot = Iot::where('id', 1)->get()->first();

        return $iot->card_id;
    }

    public static function iotChangeRegis()
    {
        $iot = Iot::where('id', 1)->get()->first();

        $iot->update([
            'status' => 'register',
        ]);
        return;
    }

    public static function iotChangeIdle()
    {
        $iot = Iot::where('id', 1)->get()->first();

        $iot->update([
            'status' => 'idle',
            'card_id' => null,
        ]);
        return response('Status Set To Register', 200);
    }
}
