<?php

namespace App\Services;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceReportService
{
    public function getAttendancesByDateRange(string $startDate, string $endDate)
    {
        // Ensure startDate and endDate are Carbon instances
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();
    
        return Attendance::where('user_id', Auth::id())
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('time_in', [$startDate, $endDate])
                      ->orWhereBetween('time_out', [$startDate, $endDate]);
            })
            ->get();
    }
}
