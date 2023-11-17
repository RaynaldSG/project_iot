<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    #profile view
    public function showProfile(){
        return view('dashboard.profile.profile', [
            'title' => 'IoTAbs | Profile'
        ]);
    }

    #edit profile
    public function editProfile(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'card_id' => 'required',
            'image' => 'image'
        ]);

        ProfileController::cropImage($request);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('profile-image');
        }
    }

    private function cropImage(Request $request)
    {
        $size = getimagesize($request->file('image'));
        @dd($size);

        // if ($w < $h) // then keep the width and scale the height
        //     $image = imagecrop($image, array(
        //         "x" => 0,
        //         "y" => ($h - $w) / 2,
        //         "width" => $w,
        //         "height" => $w
        //     ));
        // else if ($h < $w) // then keep the height and scale the width
        //     $image = imagecrop($image, array(
        //         "x" => ($w - $h) / 2,
        //         "y" => 0,
        //         "width" => $h,
        //         "height" => $h
        //     ));
    }
}
