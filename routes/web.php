<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MasterEmployeeSalaryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterEmployeeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Attendance', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {

    $report = \App\Models\MasterEmployee::with('salaries')->get();

    return Inertia::render('Dashboard', [
        'report' => $report,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/', [AttendanceController::class, 'store'])->name('attendance.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/master-employee', [MasterEmployeeController::class, 'index'])->name('master-employee');
    Route::post('/master-employee', [MasterEmployeeController::class, 'store'])->name('master-employee.store');

    Route::post('/master-employee-salary', [MasterEmployeeSalaryController::class, 'store'])->name('master-employee-salary.store');

    Route::post('/work-days-employee', [\App\Http\Controllers\WorkDaysEmployeeController::class, 'store'])->name('work-days-employee.store');

    Route::get('/master-employee/{id}', [MasterEmployeeController::class, 'show'])->name('master-employee.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
