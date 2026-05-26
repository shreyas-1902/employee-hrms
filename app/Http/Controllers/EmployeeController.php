<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // Show Employees
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    // Add Form
    public function create()
    {
        return view('employee.create');
    }

    // Store Employee
    public function store(Request $request)
    {
        $request->validate([

            'name' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'min:3',
                'max:50'
            ],
        
            'email' => 'required|email|unique:employees,email',
        
            'phone' => 'required|digits:10',
        
            'department' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
        
            'designation' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
        
            'salary' => [
                'required',
                'numeric',
                'min:1000'
            ]
        
        ], [
        
            'name.regex' => 'Name should contain only letters.',
        
            'department.regex' => 'Department should contain only letters.',
        
            'designation.regex' => 'Designation should contain only letters.',
        
            'phone.digits' => 'Phone number must be 10 digits.',
        
            'salary.numeric' => 'Salary should contain only numbers.'
        
        ]);
    
        Employee::create($request->all());
    
        return redirect('/employees')
                ->with('success', 'Employee Added Successfully');
    }
    // Edit Form
    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('employee.edit', compact('employee'));
    }

    // Update Employee
    public function update(Request $request, $id)
    {
        $request->validate([
    
            'name' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'min:3',
                'max:50'
            ],
    
            'email' => 'required|email',
    
            'phone' => 'required|digits:10',
    
            'department' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
    
            'designation' => [
                'required',
                'regex:/^[A-Za-z\s]+$/'
            ],
    
            'salary' => [
                'required',
                'numeric',
                'min:1000'
            ]
    
        ], [
    
            'name.regex' => 'Name should contain only letters.',
    
            'department.regex' => 'Department should contain only letters.',
    
            'designation.regex' => 'Designation should contain only letters.',
    
            'phone.digits' => 'Phone number must be 10 digits.',
    
            'salary.numeric' => 'Salary should contain only numbers.'
    
        ]);
    
        $employee = Employee::find($id);
    
        $employee->update($request->all());
    
        return redirect('/employees')
                ->with('success', 'Employee Updated Successfully');
    }

    // Delete Employee
    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        return redirect('/employees');
    }
}