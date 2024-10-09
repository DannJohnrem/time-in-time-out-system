<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::where('user_id', Auth::id())->latest()->first();
        return view('pages.attendance.index', compact('attendance'));
    }

    public function timeIn(Request $request)
    {
        $attendance = Attendance::create([
            'user_id' => Auth::id(),
            'time_in' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'You have clocked in!');
    }

    public function timeOut(Request $request)
    {
        $attendance = Attendance::where('user_id', Auth::id())->latest()->first();
        if ($attendance && !$attendance->time_out) {
            $attendance->update([
                'time_out' => Carbon::now(),
            ]);

            return redirect()->back()->with('success', 'You have clocked out!');
        }

        return redirect()->back()->with('error', 'You have not clocked in yet!');
    }

    public function report()
    {
        $attendances = Attendance::where('user_id', Auth::id())->get();
        return view('attendance.report', compact('attendances'));
    }
}
