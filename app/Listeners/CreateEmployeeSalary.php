<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Models\MasterEmployeeSalary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateEmployeeSalary
{
    /**
     * Create the event listener.
     */
    protected MasterEmployeeSalary $masterEmployeeSalary;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmployeeCreated $event): void
    {
        MasterEmployeeSalary::create([
            'employee_id' => $event->employee->id,
            'salary_components' => 'Gaji Pokok',
            'salary_amount' => $event->employee->basic_salary,
        ]);
    }
}
