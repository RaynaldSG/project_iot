<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('dashboard.admin.shift.adminShiftV', [
            'title' => 'IoTAbs | Shift',
            'shifts' => $shifts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.shift.createShiftV', [
            'title' => 'IoTAbs | Shift',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:shifts,name',
            'start' => 'required',
            'end' => 'required'
        ]);

        Shift::create($validateData);

        return redirect('/dashboard/shift')->with('success', 'Shift Data Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        // $shift = Shift::where('id', $id)->get();

        return view('dashboard.admin.shift.editShiftV', [
            'title' => 'IoTAbs | Shift',
            'shift' => $shift
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:shifts,name,' . $id,
            'start' => 'required',
            'end' => 'required'
        ]);
        $validateData['updated_at'] = Carbon::now();

        Shift::where('id', $id)->update($validateData);

        return redirect('/dashboard/shift')->with('success', 'Shift Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shift::destroy($id);
        return redirect('/dashboard/shift')->with('success', 'Shift Data Deleted');
    }
}
