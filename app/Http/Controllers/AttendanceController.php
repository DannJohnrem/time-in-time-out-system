<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\AttendanceReportService;
use Illuminate\Support\Facades\Log;

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
        Log::info('Current Time: ' . Carbon::now());
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
        Log::info('Current Time: ' . Carbon::now());
    }

    public function report()
    {
        $attendances = Attendance::where('user_id', Auth::id())->get();
        return view('pages.attendance.report', compact('attendances'));
    }

    public function reportByDateRange(ReportRequest $request, AttendanceReportService $attendanceReportService)
    {
        // Get attendance records using the service
        $attendances = $attendanceReportService->getAttendancesByDateRange(
            $request->input('start_date'),
            $request->input('end_date')
        );

        // Ensure you're passing Carbon instances to the view
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        return view('pages.attendance.report_by_range', [
            'attendances' => $attendances,
            'startDate' => $startDate, // Pass as Carbon instance
            'endDate' => $endDate,     // Pass as Carbon instance
        ]);
    }
}
