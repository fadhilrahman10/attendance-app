<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\WorkDaysEmployee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:master_employee,id',
        ]);

        $day = Carbon::now('Asia/Jakarta')->format('l');
        $time = Carbon::now('Asia/Jakarta')->format('H:i');
        $status = 'on-time';

        $workDay = WorkDaysEmployee::where('work_day', 'Monday')->first();

        $attendCheck = Attendance::where('employee_id', $request->employee_id)->first();

        if (!is_null($attendCheck) && $attendCheck->type == 'leave') {

            if ($workDay->work_day_end < $time) {
                $status = 'too-fast-leave';
            }

            Attendance::create([
                'employee_id' => $request->employee_id,
                'attendance_date' => Carbon::now('Asia/Jakarta'),
                'attendance_time' => Carbon::now('Asia/Jakarta')->toTimeString(),
                'type' => 'leave',
                'status' => $status
            ]);
        } else {

            if ($time > $workDay->work_day_start) {
                $status = 'late';
            }

            Attendance::create([
                'employee_id' => $request->employee_id,
                'attendance_date' => Carbon::now('Asia/Jakarta'),
                'attendance_time' => Carbon::now('Asia/Jakarta')->toTimeString(),
                'status' => $status
            ]);
        }

        return Redirect::back()->with('success', 'Attendance added successfully');

    }
}
