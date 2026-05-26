<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryStructure;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SalaryStructureController extends Controller
{
    public function index()
    {
        $salaries = SalaryStructure::with('employee')->get();
        return view('salary.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all(); // better than whereDoesntHave (optional fix)
        return view('salary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary_month' => 'required|date',
            'basic_salary' => 'required|numeric|min:0',
            'hra' => 'nullable|numeric',
            'da' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
        ]);

        // prevent duplicate salary for same month
        $exists = SalaryStructure::where('employee_id', $request->employee_id)
            ->where('salary_month', $request->salary_month)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Salary already generated for this month.');
        }

        $gross =
            $request->basic_salary +
            ($request->hra ?? 0) +
            ($request->da ?? 0) +
            ($request->bonus ?? 0);

        $tax = $gross * 0.10;

        $net_salary = $gross - $tax - ($request->deductions ?? 0);

        SalaryStructure::create([
            'employee_id'   => $request->employee_id,
            'salary_month'  => $request->salary_month,
            'basic_salary'  => $request->basic_salary,
            'hra'           => $request->hra ?? 0,
            'da'            => $request->da ?? 0,
            'bonus'         => $request->bonus ?? 0,
            'deductions'    => $request->deductions ?? 0,
            'tax'           => $tax,
            'net_salary'    => $net_salary,
        ]);

        return redirect('/salary')->with('success', 'Salary Saved Successfully');
    }

    public function edit($id)
    {
        $salary = SalaryStructure::findOrFail($id);
        $employees = Employee::all();

        return view('salary.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary_month' => 'required|date',
            'basic_salary' => 'required|numeric|min:0',
        ]);

        $salary = SalaryStructure::findOrFail($id);

        $gross =
            $request->basic_salary +
            ($request->hra ?? 0) +
            ($request->da ?? 0) +
            ($request->bonus ?? 0);

        $tax = $gross * 0.10;

        $net_salary = $gross - $tax - ($request->deductions ?? 0);

        $salary->update([
            'employee_id'  => $request->employee_id,
            'salary_month' => $request->salary_month,
            'basic_salary' => $request->basic_salary,
            'hra'          => $request->hra ?? 0,
            'da'           => $request->da ?? 0,
            'bonus'        => $request->bonus ?? 0,
            'deductions'   => $request->deductions ?? 0,
            'tax'          => $tax,
            'net_salary'   => $net_salary,
        ]);

        return redirect('/salary')->with('success', 'Salary Updated Successfully');
    }

    public function calculateDeduction(Request $request)
    {
        $employee = Employee::find($request->employee_id);

        if (!$employee) {
            return response()->json([
                'deduction' => 0,
                'per_day_salary' => 0,
                'absent' => 0,
                'half' => 0
            ]);
        }

        // BASIC SALARY FROM EMPLOYEE TABLE (FIX)
        $basic = $employee->salary;

        $date = Carbon::parse($request->month);
        $month = $date->month;
        $year = $date->year;

        $daysInMonth = $date->daysInMonth;
        $perDaySalary = $basic / $daysInMonth;

        // ABSENT
        $absent = Attendance::where('employee_id', $employee->id)
            ->whereMonth('attendance_date', $month)
            ->whereYear('attendance_date', $year)
            ->whereRaw('LOWER(status) = "absent"')
            ->count();

        // HALF DAY
        $half = Attendance::where('employee_id', $employee->id)
            ->whereMonth('attendance_date', $month)
            ->whereYear('attendance_date', $year)
            ->whereRaw('LOWER(status) LIKE "%half%"')
            ->count();

        $deduction = ($absent * $perDaySalary) + ($half * ($perDaySalary / 2));

        return response()->json([
            'deduction' => round($deduction, 2),
            'per_day_salary' => round($perDaySalary, 2),
            'absent' => $absent,
            'half' => $half
        ]);
    }

    public function payslipForm()
    {
        $employees = Employee::all();
        return view('payslip.index', compact('employees'));
    }

    public function generatePayslip(Request $request)
{
    $salary = SalaryStructure::with('employee')
        ->where('employee_id', $request->employee_id)
        ->where('salary_month', $request->salary_month)
        ->first();

    if (!$salary) {
        return back()->with('error', 'No salary found');
    }

    return view('payslip.show', compact('salary'));
}

}