<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class UserControllerR extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.userData.userIndex', [
            'title' => 'IoTAbs | User',
            'users' => User::orderBy('is_admin', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.userData.userEdit', [
            'title' => 'IoTAbs | User',
            'shifts' => Shift::all(),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'card_id' => 'required'
        ]);
        if ($request->shift) {
            if ($request->shift == 'null') {
                $validateData['shift_id'] = null;
            }
            else {

                $validateData['shift_id'] = $request->shift;
            }
        }

        User::where('id', $user->id)->update($validateData);
        return redirect('/dashboard/user')->with('success', 'User Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/user')->with('success', 'User Data Deleted');
    }
}
