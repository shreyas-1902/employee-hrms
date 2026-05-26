<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryStructureController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('dashboard');
});

Route::resource('employees', EmployeeController::class);

Route::get('/attendance',
    [AttendanceController::class, 'index']);

Route::get('/attendance/create',
    [AttendanceController::class, 'create']);

Route::post('/attendance',
    [AttendanceController::class, 'store']);

Route::get('/attendance/report',
    [AttendanceController::class, 'report']);

Route::post('/attendance/report',
    [AttendanceController::class, 'search']);

Route::get('/attendance/{id}/edit',
    [AttendanceController::class, 'edit']);

Route::put('/attendance/{id}',
    [AttendanceController::class, 'update']);

Route::get('/salary', [SalaryStructureController::class, 'index'])->name('salary.index');
Route::get('/salary/create', [SalaryStructureController::class, 'create'])->name('salary.create');
Route::post('/salary/store', [SalaryStructureController::class, 'store'])->name('salary.store');
Route::get('/salary/edit/{id}', [SalaryStructureController::class, 'edit']);
Route::post('/salary/update/{id}', [SalaryStructureController::class, 'update']);

Route::get('/salary/calc-deduction', [SalaryStructureController::class, 'calculateDeduction']);

Route::get('/', [DashboardController::class, 'index']);