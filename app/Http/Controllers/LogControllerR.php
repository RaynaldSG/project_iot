<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogControllerR extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.attendance.attendanceView', [
            'title' => 'IoTAbs | Attendance',
            'logs' => Log::where('user_id', auth()->user()->id)->latest()->paginate(10),
        ]);
    }

    public function indexAdmin()
    {
        $logs = Log::orderBy('updated_at', 'desc')->paginate(10);
        return view('dashboard.attendance.attendanceView', [
            'title' => 'IoTAbs | Attendance',
            'logs' => $logs
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
