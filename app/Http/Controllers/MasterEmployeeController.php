<?php

namespace App\Http\Controllers;

use App\Events\EmployeeCreated;
use App\Http\Requests\EmployeeCreateRequest;
use App\Models\Attendance;
use App\Models\MasterEmployee;
use App\Models\MasterEmployeeSalary;
use App\Models\WorkDaysEmployee;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MasterEmployeeController extends Controller
{
    public function index()
    {
        $employees = MasterEmployee::all();
        $salaries = MasterEmployeeSalary::with('employee')->get();
        $workDays = WorkDaysEmployee::all();

        $date = Carbon::now('Asia/Jakarta')->toDateString();
        $attendances = Attendance::with('employee')->whereDate('attendance_date', $date)->get();

        return Inertia::render('Employee/Index', [
            'employees' => $employees,
            'salaries' => $salaries,
            'workDays' => $workDays,
            'attendances' => $attendances,
        ]);
    }

    public function store(EmployeeCreateRequest $request): RedirectResponse
    {
        $employee = MasterEmployee::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'basic_salary' => $request->basic_salary,
            'position' => $request->position,
        ]);

        event(new EmployeeCreated($employee));

        return Redirect::route('master-employee')->with('success', 'Employee has been added.');
    }

    public function show($id)
    {
        $employee = MasterEmployee::with('salaries')->find($id);

        return Inertia::render('Employee/Show', [
            'employee' => $employee,
        ]);
    }
}
