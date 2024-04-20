<?php

namespace App\Http\Controllers;

use App\Models\MasterEmployeeSalary;
use Illuminate\Http\Request;

class MasterEmployeeSalaryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'salary_components' => 'required',
            'salary_amount' => 'required',
        ]);

        MasterEmployeeSalary::create([
           'employee_id' => $request->employee_id,
           'salary_components' => $request->salary_components,
           'salary_amount' => $request->salary_amount,
        ]);

        return Redirect()->back()->with('success', 'Employee Salary Created Successfully');
    }
}
