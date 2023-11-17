<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Nette\Utils\Strings;

class ProfileController extends Controller
{
    #profile view
    public function showProfile()
    {
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

        if ($request->file('image')) {
            if(request()->user()->image){
                Storage::delete(User::where('id', request()->user()->id)->image);
            }

            $validateData['image'] = request()->file('image')->store('profile-image');
            $imageCrop = ProfileController::cropImage($request);
            Storage::delete($validateData['image']);
            $imageCrop->save('storage/'.$validateData['image']);
        }
        $validateData['username'] = request()->user()->username;
        $validateData['password'] = request()->user()->password;
        $validateData['shift_id'] = request()->user()->shift_id;
        $validateData['is_admin'] = request()->user()->is_admin;
        // dd($validateData);
        User::where('id', request()->user()->id)->update($validateData);

        return redirect('/dashboard/profile')->with('success', "Data Updated");
    }

    private function cropImage(Request $request)
    {
        $image = Image::make($request->file('image'));
        $image->fit(250);

        // if ($width < $height) {
        //     $image = imagecrop($image, array(
        //         "x" => 0,
        //         "y" => ($height - $width) / 2,
        //         "width" => $width,
        //         "height" => $width
        //     ));
        // } else if ($height < $width) {
        //     $image = imagecrop($image, array(
        //         "x" => ($width - $height) / 2,
        //         "y" => 0,
        //         "width" => $height,
        //         "height" => $height
        //     ));
        // }

        return $image;
    }
}
