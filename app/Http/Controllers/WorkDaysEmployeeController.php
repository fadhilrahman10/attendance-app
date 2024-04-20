<?php

namespace App\Http\Controllers;

use App\Models\WorkDaysEmployee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkDaysEmployeeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $workDays = $request->validate([
            'work_day' => 'required',
            'work_day_start' => 'nullable',
            'work_day_end' => 'nullable',
        ]);

        $work = WorkDaysEmployee::find($request->id);

        $work->work_day = $workDays['work_day'];
        $work->work_day_start = $workDays['work_day_start'];
        $work->work_day_end = $workDays['work_day_end'];
        $work->save();

        return Redirect::to('/master-employee');
    }
}
