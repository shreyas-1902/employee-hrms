<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    // Show Attendance List

    public function index()
    {
        $attendances = Attendance::with('employee')->get();

        return view('attendance.index', compact('attendances'));
    }

    // Show Form

    public function create()
    {
        $employees = Employee::all();

        return view('attendance.create', compact('employees'));
    }

    // Store Attendance
    public function store(Request $request)
    {
        $request->validate([
    
            'employee_id' => 'required',
    
            'attendance_date' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
    
            'status' => [
                'required',
                'in:Present,Absent,Half Day'
            ]
    
        ], [
    
            'employee_id.required' => 'Please select employee.',
    
            'attendance_date.required' => 'Attendance date is required.',
    
            'attendance_date.before_or_equal' =>
                'Future dates are not allowed.',
    
            'status.required' => 'Please select attendance status.'
    
        ]);
    
        Attendance::create($request->all());
    
        return redirect('/attendance')
                ->with('success',
                'Attendance Added Successfully');
    }
    // Attendance Report Page

public function report()
{
    $employees = Employee::all();

    return view('attendance.report',
            compact('employees'));
}

// Search Employee Attendance

public function search(Request $request)
{
    $request->validate([

        'employee_id' => 'required'

    ]);

    $employees = Employee::all();

    $attendances = Attendance::where(
                        'employee_id',
                        $request->employee_id
                    )->get();

    return view('attendance.report', compact(
        'employees',
        'attendances'
    ));
}

// Edit Attendance

public function edit($id)
{
    $attendance = Attendance::find($id);

    $employees = Employee::all();

    return view('attendance.edit',
            compact('attendance',
                    'employees'));
}

// Update Attendance

public function update(Request $request, $id)
{
    $request->validate([

        'employee_id' => 'required',

        'attendance_date' => [
            'required',
            'date',
            'before_or_equal:today'
        ],

        'status' => [
            'required',
            'in:Present,Absent,Half Day'
        ]

    ], [

        'employee_id.required' =>
            'Please select employee.',

        'attendance_date.required' =>
            'Attendance date is required.',

        'attendance_date.before_or_equal' =>
            'Future dates are not allowed.',

        'status.required' =>
            'Please select attendance status.'

    ]);

    $attendance = Attendance::find($id);

    $attendance->update($request->all());

    return redirect('/attendance/report')
            ->with('success',
            'Attendance Updated Successfully');
}
}